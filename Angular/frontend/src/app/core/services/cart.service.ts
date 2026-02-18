import { Injectable, signal } from '@angular/core';
import { Product } from '../models/product.model';

@Injectable({ providedIn: 'root' })
export class CartService {
  private readonly _items = signal<Product[]>([]);
  readonly items = this._items.asReadonly();

  add(item: Product): void {
    this._items.update((prev) => [...prev, item]);
  }

  remove(id: number): void {
    this._items.update((prev) => prev.filter((item) => item.id !== id));
  }

  clear(): void {
    this._items.set([]);
  }
}
