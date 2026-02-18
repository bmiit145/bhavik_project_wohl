import { Component, OnInit, computed, signal } from '@angular/core';
import { CurrencyPipe, DatePipe, NgClass, NgFor, NgIf } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { Product } from '../../core/models/product.model';
import { Order } from '../../core/models/order.model';
import { AdminService } from '../../core/services/admin.service';
import { AdminSessionService } from '../../core/services/admin-session.service';

type DashboardTab = 'overview' | 'products' | 'orders';

@Component({
  standalone: true,
  selector: 'app-admin-dashboard',
  imports: [NgFor, NgIf, NgClass, FormsModule, CurrencyPipe, DatePipe],
  templateUrl: './admin-dashboard.component.html',
  styleUrl: './admin-dashboard.component.scss'
})
export class AdminDashboardComponent implements OnInit {
  products: Product[] = [];
  orders: Order[] = [];

  readonly activeTab = signal<DashboardTab>('overview');
  readonly search = signal('');
  readonly selectedCategory = signal('all');

  editingProductId: number | null = null;
  isSubmitting = false;

  form: Omit<Product, 'id'> = {
    name: '',
    category: 'new',
    price: 0,
    image: '',
    description: ''
  };

  readonly filteredProducts = computed(() => {
    const query = this.search().trim().toLowerCase();
    const category = this.selectedCategory();

    return this.products.filter((product) => {
      const matchesCategory = category === 'all' || product.category === category;
      const matchesQuery =
        query.length === 0 ||
        product.name.toLowerCase().includes(query) ||
        product.description.toLowerCase().includes(query);

      return matchesCategory && matchesQuery;
    });
  });

  readonly productCount = computed(() => this.products.length);
  readonly orderCount = computed(() => this.orders.length);
  readonly totalRevenue = computed(() => this.orders.reduce((sum, order) => sum + order.total, 0));

  constructor(
    private readonly adminService: AdminService,
    private readonly adminSession: AdminSessionService,
    private readonly router: Router
  ) {}

  ngOnInit(): void {
    this.refreshData();
  }

  refreshData(): void {
    this.loadProducts();
    this.loadOrders();
  }

  setTab(tab: DashboardTab): void {
    this.activeTab.set(tab);
  }

  loadProducts(): void {
    this.adminService.getProducts().subscribe((products) => (this.products = products));
  }

  loadOrders(): void {
    this.adminService.getOrders().subscribe((orders) => (this.orders = orders));
  }

  startCreate(): void {
    this.editingProductId = null;
    this.form = { name: '', category: 'new', price: 0, image: '', description: '' };
  }

  editProduct(product: Product): void {
    this.editingProductId = product.id;
    this.form = {
      name: product.name,
      category: product.category,
      price: product.price,
      image: product.image,
      description: product.description
    };

    this.activeTab.set('products');
  }

  submitProductForm(): void {
    this.isSubmitting = true;

    if (this.editingProductId) {
      this.adminService.updateProduct(this.editingProductId, this.form).subscribe(() => {
        this.isSubmitting = false;
        this.startCreate();
        this.loadProducts();
      });
      return;
    }

    this.adminService.createProduct(this.form).subscribe(() => {
      this.isSubmitting = false;
      this.startCreate();
      this.loadProducts();
    });
  }

  deleteProduct(id: number): void {
    this.adminService.deleteProduct(id).subscribe(() => {
      if (this.editingProductId === id) {
        this.startCreate();
      }
      this.loadProducts();
    });
  }

  logout(): void {
    this.adminSession.logout();
    void this.router.navigateByUrl('/admin/login');
  }
}
