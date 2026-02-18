import { Component } from '@angular/core';
import { CurrencyPipe, NgFor, NgIf } from '@angular/common';
import { WishlistService } from '../../core/services/wishlist.service';

@Component({
  standalone: true,
  selector: 'app-wishlist',
  imports: [NgIf, NgFor, CurrencyPipe],
  templateUrl: './wishlist.component.html'
})
export class WishlistComponent {
  constructor(public readonly wishlist: WishlistService) {}
}
