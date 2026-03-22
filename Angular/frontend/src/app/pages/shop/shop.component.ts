import { Component, OnInit } from '@angular/core';
import { NgFor } from '@angular/common';
import { ActivatedRoute } from '@angular/router';

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

  // ✅ ALL PRODUCTS
  products: Product[] = [];

  // ✅ FILTERED PRODUCTS (SEARCH RESULT)
  filteredProducts: Product[] = [];

  constructor(
    private readonly productService: ProductService,
    private readonly route: ActivatedRoute
  ) {}

  ngOnInit(): void {

    // 👉 Load all products
    this.productService.getProducts().subscribe((items) => {
      this.products = items;

      // 👉 Listen for search query
      this.route.queryParams.subscribe((params) => {
        const search = (params['search'] || '').toLowerCase();

        if (!search) {
          this.filteredProducts = this.products;
        } else {
          this.filteredProducts = this.products.filter((product) =>
            product.name.toLowerCase().includes(search) ||
            product.category.toLowerCase().includes(search)
          );
        }
      });
    });
  }
}