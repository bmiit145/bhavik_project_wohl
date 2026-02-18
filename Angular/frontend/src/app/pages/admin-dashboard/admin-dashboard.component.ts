import { Component, OnInit } from '@angular/core';
import { CurrencyPipe, DatePipe, NgFor, NgIf } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Product } from '../../core/models/product.model';
import { Order } from '../../core/models/order.model';
import { AdminService } from '../../core/services/admin.service';
import { AdminSessionService } from '../../core/services/admin-session.service';
import { Router } from '@angular/router';

@Component({
  standalone: true,
  selector: 'app-admin-dashboard',
  imports: [NgFor, NgIf, FormsModule, CurrencyPipe, DatePipe],
  templateUrl: './admin-dashboard.component.html',
  styleUrl: './admin-dashboard.component.scss'
})
export class AdminDashboardComponent implements OnInit {
  products: Product[] = [];
  orders: Order[] = [];

  form: Omit<Product, 'id'> = {
    name: '',
    category: 'new',
    price: 0,
    image: '',
    description: ''
  };

  constructor(
    private readonly adminService: AdminService,
    private readonly adminSession: AdminSessionService,
    private readonly router: Router
  ) {}

  ngOnInit(): void {
    this.loadProducts();
    this.loadOrders();
  }

  loadProducts(): void {
    this.adminService.getProducts().subscribe((products) => (this.products = products));
  }

  loadOrders(): void {
    this.adminService.getOrders().subscribe((orders) => (this.orders = orders));
  }

  addProduct(): void {
    this.adminService.createProduct(this.form).subscribe(() => {
      this.form = { name: '', category: 'new', price: 0, image: '', description: '' };
      this.loadProducts();
    });
  }

  deleteProduct(id: number): void {
    this.adminService.deleteProduct(id).subscribe(() => this.loadProducts());
  }

  logout(): void {
    this.adminSession.logout();
    void this.router.navigateByUrl('/admin/login');
  }
}
