import { Component, OnInit } from '@angular/core';
import { NgFor } from '@angular/common';
import { ProductCardComponent } from '../../shared/product-card/product-card.component';
import { ProductService } from '../../core/services/product.service';
import { Product } from '../../core/models/product.model';

@Component({
  standalone: true,
  selector: 'app-shop',
  imports: [NgFor, ProductCardComponent],
  templateUrl: './shop.component.html'
})
export class ShopComponent implements OnInit {
  products: Product[] = [];

  constructor(private readonly productService: ProductService) {}

  ngOnInit(): void {
    this.productService.getProducts().subscribe((items) => (this.products = items));
  }
}
