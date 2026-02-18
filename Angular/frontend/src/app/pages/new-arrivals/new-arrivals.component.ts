import { Component, OnInit } from '@angular/core';
import { NgFor, NgIf } from '@angular/common';
import { ProductCardComponent } from '../../shared/product-card/product-card.component';
import { ProductService } from '../../core/services/product.service';
import { Product } from '../../core/models/product.model';

@Component({
  standalone: true,
  selector: 'app-new-arrivals',
  imports: [NgFor, NgIf, ProductCardComponent],
  templateUrl: './new-arrivals.component.html',
  styleUrl: './new-arrivals.component.scss'
})
export class NewArrivalsComponent implements OnInit {
  products: Product[] = [];

  constructor(private readonly productService: ProductService) {}

  ngOnInit(): void {
    this.productService.getProducts('new').subscribe((items) => (this.products = items));
  }
}
