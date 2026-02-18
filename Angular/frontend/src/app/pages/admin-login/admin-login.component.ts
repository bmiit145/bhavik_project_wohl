import { Component, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { NgIf } from '@angular/common';
import { Router } from '@angular/router';
import { AdminSessionService } from '../../core/services/admin-session.service';

@Component({
  standalone: true,
  selector: 'app-admin-login',
  imports: [FormsModule, NgIf],
  templateUrl: './admin-login.component.html'
})
export class AdminLoginComponent {
  username = '';
  password = '';
  error = signal('');

  constructor(
    private readonly adminSession: AdminSessionService,
    private readonly router: Router
  ) {}

  onSubmit(): void {
    if (this.adminSession.login(this.username, this.password)) {
      void this.router.navigateByUrl('/admin');
      return;
    }

    this.error.set('Invalid admin credentials. Use admin/admin123');
  }
}
