import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Order } from '../models/order.model';

@Injectable({ providedIn: 'root' })
export class OrderService {
  constructor(private readonly http: HttpClient) {}

  checkout(payload: {
    customerName: string;
    email: string;
    address: string;
    items: Array<{ id: number; name: string; price: number }>;
    total: number;
  }): Observable<{ message: string; order: Order }> {
    return this.http.post<{ message: string; order: Order }>('/orders/checkout', payload);
  }
}
