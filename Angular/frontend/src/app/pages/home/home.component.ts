import { Component, OnInit } from '@angular/core';
import { NgFor, NgIf, CurrencyPipe } from '@angular/common';
import { RouterLink } from '@angular/router';
import { ProductCardComponent } from '../../shared/product-card/product-card.component';
import { ProductService } from '../../core/services/product.service';
import { CartService } from '../../core/services/cart.service';
import { Product } from '../../core/models/product.model';

@Component({
  standalone: true,
  selector: 'app-home',
  imports: [RouterLink, NgFor, NgIf, CurrencyPipe, ProductCardComponent],
  templateUrl: './home.component.html',
  styleUrl: './home.component.scss'
})
export class HomeComponent implements OnInit {
  featured: Product[] = [];
  randomPick: Product | null = null;
  allProducts: Product[] = [];

  categories = [
    { key: 'men', label: 'Men', icon: '🧔', desc: 'Grooming essentials', route: '/men' },
    { key: 'women', label: 'Women', icon: '💄', desc: 'Beauty & skincare', route: '/women' },
    { key: 'kid', label: 'Kids', icon: '🧸', desc: 'Gentle care products', route: '/kid' },
    { key: 'new', label: 'New Arrivals', icon: '✨', desc: 'Latest additions', route: '/new' }
  ];

  stats = [
    { value: '500+', label: 'Products' },
    { value: '10K+', label: 'Customers' },
    { value: '4.8', label: 'Avg Rating' },
    { value: '24/7', label: 'Support' }
  ];

  constructor(
    private readonly productService: ProductService,
    private readonly cartService: CartService
  ) {}

  ngOnInit(): void {
    this.productService.getProducts().subscribe((items) => {
      this.allProducts = items;
      this.featured = items.slice(0, 6);
      this.pickRandom();
    });
  }

  pickRandom(): void {
    if (this.allProducts.length === 0) return;
    const idx = Math.floor(Math.random() * this.allProducts.length);
    this.randomPick = this.allProducts[idx];
  }

  addRandomToCart(): void {
    if (this.randomPick) {
      this.cartService.add(this.randomPick);
    }
  }
}
