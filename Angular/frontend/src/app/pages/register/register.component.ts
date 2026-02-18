import { Component, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { NgIf } from '@angular/common';
import { Router, RouterLink } from '@angular/router';
import { AuthService } from '../../core/services/auth.service';

@Component({
  standalone: true,
  selector: 'app-register',
  imports: [FormsModule, NgIf, RouterLink],
  templateUrl: './register.component.html'
})
export class RegisterComponent {
  fullName = '';
  email = '';
  password = '';
  confirmPassword = '';
  loading = signal(false);
  message = signal('');
  success = signal(false);

  constructor(
    private readonly authService: AuthService,
    private readonly router: Router
  ) {}

  onSubmit(): void {
    this.message.set('');
    this.success.set(false);

    if (this.password !== this.confirmPassword) {
      this.message.set('Password and confirm password do not match.');
      return;
    }

    if (this.password.length < 6) {
      this.message.set('Password must be at least 6 characters.');
      return;
    }

    this.loading.set(true);
    this.authService
      .register({ fullName: this.fullName, email: this.email, password: this.password })
      .subscribe({
        next: () => {
          this.loading.set(false);
          this.success.set(true);
          this.message.set('Registration successful. Please login.');
          setTimeout(() => {
            void this.router.navigateByUrl('/login');
          }, 600);
        },
        error: (error) => {
          this.loading.set(false);
          this.message.set(error?.error?.message || 'Registration failed');
        }
      });
  }
}
