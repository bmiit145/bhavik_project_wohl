import { Injectable, signal } from '@angular/core';

@Injectable({ providedIn: 'root' })
export class AdminSessionService {
  private readonly key = 'wohl-admin-auth';
  private readonly _isAuthenticated = signal(localStorage.getItem(this.key) === '1');
  readonly isAuthenticated = this._isAuthenticated.asReadonly();

  login(username: string, password: string): boolean {
    const valid = username === 'admin' && password === 'admin123';

    if (valid) {
      localStorage.setItem(this.key, '1');
      this._isAuthenticated.set(true);
    }

    return valid;
  }

  logout(): void {
    localStorage.removeItem(this.key);
    this._isAuthenticated.set(false);
  }
}
