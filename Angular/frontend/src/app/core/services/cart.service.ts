import { Injectable, signal, computed } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Product } from '../models/product.model';
import { AuthService } from './auth.service';
import { Router } from '@angular/router';
import Swal from 'sweetalert2';

@Injectable({ providedIn: 'root' })
export class CartService {
  private readonly _items = signal<Product[]>([]);
  readonly items = this._items.asReadonly();
  
  readonly total = computed(() => 
    this.items().reduce((sum, item) => sum + (item.price * (item.quantity || 1)), 0)
  );

  constructor(
    private readonly http: HttpClient,
    private readonly authService: AuthService,
    private readonly router: Router
  ) {
    this.sync();
  }

  sync(): void {
    if (!this.authService.getToken()) {
      this._items.set([]);
      return;
    }

    this.http.get<Product[]>('/cart').subscribe({
      next: (items) => this._items.set(items),
      error: () => this._items.set([])
    });
  }

  add(item: Product): void {
    if (!this.authService.getToken()) {
      Swal.fire({
        title: 'Login Required',
        text: 'Please login or register to add items to your cart.',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Go to Login'
      }).then((result) => {
        if (result.isConfirmed) {
          void this.router.navigate(['/login']);
        }
      });
      return;
    }

    this.http.post('/cart/items', { productId: item.id }).subscribe({
      next: () => {
        this.sync();
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'success',
          title: 'Added to cart!',
          showConfirmButton: false,
          timer: 1500
        });
      }
    });
  }

  updateQuantity(productId: number, quantity: number): void {
    if (quantity < 1) {
      this.remove(productId);
      return;
    }

    this.http.put(`/cart/items/${productId}`, { quantity }).subscribe({
      next: () => this.sync()
    });
  }

  remove(id: number): void {
    if (!this.authService.getToken()) {
      return;
    }

    this.http.delete(`/cart/items/${id}`).subscribe({
      next: () => this.sync()
    });
  }

  clear(): void {
    if (!this.authService.getToken()) {
      this._items.set([]);
      return;
    }

    this.http.delete('/cart').subscribe({
      next: () => this._items.set([])
    });
  }
}
