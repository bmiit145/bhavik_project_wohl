import { Injectable, signal } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, tap } from 'rxjs';

export interface AuthUser {
  id: string;
  fullName: string;
  email: string;
  role: 'customer' | 'admin';
}

export interface LoginResponse {
  accessToken: string;
  user: AuthUser;
}

@Injectable({ providedIn: 'root' })
export class AuthService {
  private readonly tokenKey = 'wohl-auth-token';
  private readonly userKey = 'wohl-auth-user';

  // Reactive Signal for Authentication State
  readonly currentUser = signal<AuthUser | null>(this.getInitialUser());

  constructor(private readonly http: HttpClient) {}

  private getInitialUser(): AuthUser | null {
    const raw = localStorage.getItem(this.userKey);
    if (!raw) return null;
    try {
      return JSON.parse(raw) as AuthUser;
    } catch {
      return null;
    }
  }

  login(email: string, password: string): Observable<LoginResponse> {
    return this.http
      .post<LoginResponse>('/auth/login', { email, password })
      .pipe(tap((response) => {
        this.persistSession(response.accessToken, response.user);
        this.currentUser.set(response.user); // Update signal reactively
      }));
  }

  register(payload: {
    fullName: string;
    email: string;
    password: string;
  }): Observable<{ message: string; user: AuthUser }> {
    return this.http.post<{ message: string; user: AuthUser }>('/auth/register', payload);
  }

  logout(): void {
    localStorage.removeItem(this.tokenKey);
    localStorage.removeItem(this.userKey);
    this.currentUser.set(null); // Clear signal reactively
    window.dispatchEvent(new Event('wohl-auth-logout'));
  }

  getToken(): string | null {
    return localStorage.getItem(this.tokenKey);
  }

  private persistSession(token: string, user: AuthUser): void {
    localStorage.setItem(this.tokenKey, token);
    localStorage.setItem(this.userKey, JSON.stringify(user));
  }
}
