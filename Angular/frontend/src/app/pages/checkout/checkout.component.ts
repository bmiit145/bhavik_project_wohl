import { Component, signal } from '@angular/core';
import { CurrencyPipe, NgIf, NgFor, NgClass } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { CartService } from '../../core/services/cart.service';
import { OrderService } from '../../core/services/order.service';
import { Router } from '@angular/router';

@Component({
  standalone: true,
  selector: 'app-checkout',
  imports: [NgIf, NgFor, NgClass, FormsModule, CurrencyPipe],
  templateUrl: './checkout.component.html'
})
export class CheckoutComponent {
  customerName = '';
  email = '';
  address = '';
  status = signal('');
  isSubmitting = signal(false);

  constructor(
    public readonly cart: CartService,
    private readonly orderService: OrderService,
    private readonly router: Router
  ) {}

  placeOrder(): void {
    if (this.cart.items().length === 0) {
      this.status.set('Cart is empty. Please add items before checkout.');
      return;
    }

    this.isSubmitting.set(true);
    this.orderService
      .checkout({
        customerName: this.customerName,
        email: this.email,
        address: this.address,
        items: this.cart.items().map((item) => ({ 
          id: item.id, 
          name: item.name, 
          price: item.price,
          quantity: item.quantity || 1 
        })),
        total: this.cart.total()
      })
      .subscribe({
        next: ({ order }) => {
          this.status.set(`Order #${order.id} placed successfully.`);
          this.cart.clear();
          this.isSubmitting.set(false);
          setTimeout(() => this.router.navigate(['/orders']), 2000);
        },
        error: (err) => {
          this.status.set(err.error?.message || 'Failed to place order.');
          this.isSubmitting.set(false);
        }
      });
  }
}
