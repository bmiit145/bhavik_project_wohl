import { Component, OnInit } from '@angular/core';
import { NgFor, NgIf } from '@angular/common';
import { ProductCardComponent } from '../../shared/product-card/product-card.component';
import { ProductService } from '../../core/services/product.service';
import { Product } from '../../core/models/product.model';

@Component({
  standalone: true,
  selector: 'app-women',
  imports: [NgFor, NgIf, ProductCardComponent],
  templateUrl: './women.component.html',
  styleUrl: './women.component.scss'
})
export class WomenComponent implements OnInit {
  products: Product[] = [];

  constructor(private readonly productService: ProductService) {}

  ngOnInit(): void {
    this.productService.getProducts('women').subscribe((items) => (this.products = items));
  }
}
