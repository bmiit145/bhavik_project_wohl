import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Product } from '../models/product.model';
import { Order } from '../models/order.model';

@Injectable({ providedIn: 'root' })
export class AdminService {
  private readonly adminToken = 'admin-secret';

  constructor(private readonly http: HttpClient) {}

  private headers(): HttpHeaders {
    return new HttpHeaders({ 'x-admin-token': this.adminToken });
  }

  getProducts(): Observable<Product[]> {
    return this.http.get<Product[]>('/admin/products', { headers: this.headers() });
  }

  createProduct(payload: Omit<Product, 'id'>): Observable<Product> {
    return this.http.post<Product>('/admin/products', payload, { headers: this.headers() });
  }

  updateProduct(id: number, payload: Omit<Product, 'id'>): Observable<Product> {
    return this.http.put<Product>(`/admin/products/${id}`, payload, { headers: this.headers() });
  }

  deleteProduct(id: number): Observable<void> {
    return this.http.delete<void>(`/admin/products/${id}`, { headers: this.headers() });
  }

  getOrders(): Observable<Order[]> {
    return this.http.get<Order[]>('/admin/orders', { headers: this.headers() });
  }
}
