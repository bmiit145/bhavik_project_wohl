import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Product } from '../models/product.model';

@Injectable({ providedIn: 'root' })
export class ProductService {
  constructor(private readonly http: HttpClient) {}

  getProducts(category?: string): Observable<Product[]> {
    const query = category ? `?category=${category}` : '';
    return this.http.get<Product[]>(`/products${query}`);
  }
}
