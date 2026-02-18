import { Component, signal } from '@angular/core';
import { CurrencyPipe, NgIf } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { CartService } from '../../core/services/cart.service';
import { OrderService } from '../../core/services/order.service';

@Component({
  standalone: true,
  selector: 'app-checkout',
  imports: [NgIf, FormsModule, CurrencyPipe],
  templateUrl: './checkout.component.html'
})
export class CheckoutComponent {
  customerName = '';
  email = '';
  address = '';
  status = signal('');

  constructor(
    public readonly cart: CartService,
    private readonly orderService: OrderService
  ) {}

  get total(): number {
    return this.cart.items().reduce((sum, item) => sum + item.price, 0);
  }

  placeOrder(): void {
    if (this.cart.items().length === 0) {
      this.status.set('Cart is empty. Please add items before checkout.');
      return;
    }

    this.orderService
      .checkout({
        customerName: this.customerName,
        email: this.email,
        address: this.address,
        items: this.cart.items().map((item) => ({ id: item.id, name: item.name, price: item.price })),
        total: this.total
      })
      .subscribe(({ order }) => {
        this.status.set(`Order #${order.id} placed successfully.`);
        this.cart.clear();
      });
  }
}
