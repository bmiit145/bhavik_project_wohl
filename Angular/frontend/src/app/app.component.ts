import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { NgIf } from '@angular/common';
import { AuthService } from './core/services/auth.service';
import { CartService } from './core/services/cart.service';
import { WishlistService } from './core/services/wishlist.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, RouterLink, NgIf],
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss'
})
export class AppComponent {
  readonly year = new Date().getFullYear();

  constructor(
    private readonly authService: AuthService,
    private readonly cartService: CartService,
    private readonly wishlistService: WishlistService,
    private readonly router: Router
  ) {}

  isCustomerLoggedIn(): boolean {
    return !!this.authService.getToken();
  }

  customerName(): string {
    return this.authService.getUser()?.fullName || 'Customer';
  }

  logoutCustomer(): void {
    this.authService.logout();
    this.cartService.clear();
    this.wishlistService.sync();
    void this.router.navigateByUrl('/login');
  }
}
