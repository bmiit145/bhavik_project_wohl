import { Component } from '@angular/core';
import { NgFor, NgIf, CurrencyPipe } from '@angular/common';
import { RouterLink } from '@angular/router';
import { CartService } from '../../core/services/cart.service';

@Component({
  standalone: true,
  selector: 'app-cart',
  imports: [NgFor, NgIf, CurrencyPipe, RouterLink],
  templateUrl: './cart.component.html'
})
export class CartComponent {
  constructor(public readonly cart: CartService) {}
}
