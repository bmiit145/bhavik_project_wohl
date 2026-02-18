import { Component, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { NgIf } from '@angular/common';
import { Router, RouterLink } from '@angular/router';
import { AuthService } from '../../core/services/auth.service';
import { CartService } from '../../core/services/cart.service';
import { WishlistService } from '../../core/services/wishlist.service';

@Component({
  standalone: true,
  selector: 'app-login',
  imports: [FormsModule, NgIf, RouterLink],
  templateUrl: './login.component.html'
})
export class LoginComponent {
  email = '';
  password = '';
  loading = signal(false);
  message = signal('');

  constructor(
    private readonly authService: AuthService,
    private readonly cartService: CartService,
    private readonly wishlistService: WishlistService,
    private readonly router: Router
  ) {}

  onSubmit(): void {
    this.message.set('');

    if (!this.email || !this.password) {
      this.message.set('Please enter email and password.');
      return;
    }

    this.loading.set(true);
    this.authService.login(this.email, this.password).subscribe({
      next: () => {
        this.cartService.sync();
        this.wishlistService.sync();
        this.loading.set(false);
        void this.router.navigateByUrl('/');
      },
      error: (error) => {
        this.loading.set(false);
        this.message.set(error?.error?.message || 'Login failed');
      }
    });
  }
}
