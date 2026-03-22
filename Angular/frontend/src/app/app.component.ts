import { Component, HostListener, effect } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { MatToolbarModule } from '@angular/material/toolbar';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import { MatButtonModule } from '@angular/material/button';
import { MatIconModule } from '@angular/material/icon';
import { MatMenuModule } from '@angular/material/menu';
import { MatBadgeModule } from '@angular/material/badge';
import { MatDividerModule } from '@angular/material/divider';
import { AuthService } from './core/services/auth.service';
import { CartService } from './core/services/cart.service';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [
    CommonModule,
    RouterModule,
    FormsModule,
    MatToolbarModule,
    MatFormFieldModule,
    MatInputModule,
    MatButtonModule,
    MatIconModule,
    MatMenuModule,
    MatBadgeModule,
    MatDividerModule
  ],
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss'
})
export class AppComponent {
  searchText = '';
  year = new Date().getFullYear();
  isScrolled = false;
  mobileMenuOpen = false;
  searchOpen = false;
  userMenuOpen = false;

  constructor(
    public readonly auth: AuthService,
    public readonly cart: CartService
  ) {
    // Sync cart whenever login state changes (from null to user)
    effect(() => {
      const user = this.auth.currentUser();
      if (user) {
        this.cart.sync();
      }
    });
  }

  @HostListener('window:scroll')
  onScroll() {
    this.isScrolled = window.scrollY > 10;
  }

  @HostListener('document:click', ['$event'])
  onDocumentClick(event: MouseEvent) {
    const target = event.target as HTMLElement;
    if (!target.closest('.user-menu-wrap')) {
      this.userMenuOpen = false;
    }
  }

  isCustomerLoggedIn() {
    return this.auth.currentUser() !== null;
  }

  logoutCustomer() {
    this.auth.logout();
    this.userMenuOpen = false;
  }

  customerName() {
    return this.auth.currentUser()?.fullName || 'User';
  }
}
