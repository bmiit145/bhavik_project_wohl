import { Component, OnInit } from '@angular/core';
import { NgFor, NgIf } from '@angular/common';
import { ProductCardComponent } from '../../shared/product-card/product-card.component';
import { ProductService } from '../../core/services/product.service';
import { Product } from '../../core/models/product.model';

@Component({
  standalone: true,
  selector: 'app-kid',
  imports: [NgFor, NgIf, ProductCardComponent],
  templateUrl: './kid.component.html',
  styleUrl: './kid.component.scss'
})
export class KidComponent implements OnInit {
  products: Product[] = [];

  constructor(private readonly productService: ProductService) {}

  ngOnInit(): void {
    this.productService.getProducts('kid').subscribe((items) => (this.products = items));
  }
}
