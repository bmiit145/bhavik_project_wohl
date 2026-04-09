import { Component, signal } from '@angular/core';
import { CurrencyPipe, NgIf, NgFor, NgClass } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { CartService } from '../../core/services/cart.service';
import { OrderService } from '../../core/services/order.service';
import { Router } from '@angular/router';

declare var Razorpay: any;

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

    if (!this.customerName || !this.email || !this.address) {
      this.status.set('Please fill out all checkout fields.');
      return;
    }

    this.isSubmitting.set(true);

    const amount = this.cart.total();
    
    const options = {
      key: "rzp_test_RDMVIBCYmVJ6py",
      amount: amount * 100,
      name: "Wohl Reactions | Premium Skincare & Grooming",
      description: "Test Transaction",
      image: "https://i.pinimg.com/originals/50/98/0c/50980c03b2e1238431c084e4001dcf57.jpg",
      handler: (response: any) => {
        this.submitOrder(response.razorpay_payment_id);
      },
      prefill: {
        name: this.customerName,
        email: this.email
      },
      theme: {
        color: "#3399cc"
      }
    };
    
    if (typeof Razorpay === 'undefined') {
      this.status.set('Payment gateway failed to load.');
      this.isSubmitting.set(false);
      return;
    }

    const rzp = new Razorpay(options);
    rzp.on('payment.failed', (response: any) => {
      this.status.set('Payment failed or was closed.');
      this.isSubmitting.set(false);
    });
    rzp.open();
  }

  private submitOrder(paymentId: string): void {
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
        total: this.cart.total(),
        paymentId
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
