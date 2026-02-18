import { Injectable, signal } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Product } from '../models/product.model';
import { AuthService } from './auth.service';

@Injectable({ providedIn: 'root' })
export class WishlistService {
  private readonly _items = signal<Product[]>([]);
  readonly items = this._items.asReadonly();

  constructor(
    private readonly http: HttpClient,
    private readonly authService: AuthService
  ) {
    this.sync();
  }

  sync(): void {
    if (!this.authService.getToken()) {
      this._items.set([]);
      return;
    }

    this.http.get<Product[]>('/wishlist').subscribe({
      next: (items) => this._items.set(items),
      error: () => this._items.set([])
    });
  }

  add(productId: number): void {
    if (!this.authService.getToken()) {
      return;
    }

    this.http.post('/wishlist/items', { productId }).subscribe({
      next: () => this.sync()
    });
  }

  remove(productId: number): void {
    if (!this.authService.getToken()) {
      return;
    }

    this.http.delete(`/wishlist/items/${productId}`).subscribe({
      next: () => this.sync()
    });
  }
}
