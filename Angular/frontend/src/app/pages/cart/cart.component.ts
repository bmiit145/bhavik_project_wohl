import { Component } from '@angular/core';
import { NgFor, CurrencyPipe } from '@angular/common';
import { CartService } from '../../core/services/cart.service';

@Component({
  standalone: true,
  selector: 'app-cart',
  imports: [NgFor, CurrencyPipe],
  templateUrl: './cart.component.html'
})
export class CartComponent {
  constructor(public readonly cart: CartService) {}
}
