import { Component, OnInit } from '@angular/core';
import { CurrencyPipe, DatePipe, NgFor, NgIf } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Product } from '../../core/models/product.model';
import { Order } from '../../core/models/order.model';
import { AdminService } from '../../core/services/admin.service';
import { AdminSessionService } from '../../core/services/admin-session.service';
import { Router } from '@angular/router';
import Swal from 'sweetalert2';

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

  // Tabs
  currentTab: 'dashboard' | 'products' | 'orders' = 'dashboard';

  // Products Pagination
  productsCurrentPage = 1;
  productsPageSize = 5;

  get paginatedProducts(): Product[] {
    const startIndex = (this.productsCurrentPage - 1) * this.productsPageSize;
    return this.products.slice(startIndex, startIndex + this.productsPageSize);
  }

  get productsTotalPages(): number {
    return Math.ceil(this.products.length / this.productsPageSize) || 1;
  }

  // Orders Pagination
  ordersCurrentPage = 1;
  ordersPageSize = 5;

  get paginatedOrders(): Order[] {
    const startIndex = (this.ordersCurrentPage - 1) * this.ordersPageSize;
    return this.orders.slice(startIndex, startIndex + this.ordersPageSize);
  }

  get ordersTotalPages(): number {
    return Math.ceil(this.orders.length / this.ordersPageSize) || 1;
  }

  switchTab(tab: 'dashboard' | 'products' | 'orders'): void {
    this.currentTab = tab;
  }

  form = {
    name: '',
    category: 'new' as 'men' | 'women' | 'kid' | 'new',
    price: 0,
    description: ''
  };

  selectedFile: File | null = null;
  imagePreview: string | null = null;

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

  onFileSelected(event: Event): void {
    const input = event.target as HTMLInputElement;
    if (input.files && input.files[0]) {
      this.selectedFile = input.files[0];
      // Create preview
      const reader = new FileReader();
      reader.onload = () => {
        this.imagePreview = reader.result as string;
      };
      reader.readAsDataURL(this.selectedFile);
    }
  }

  clearFile(): void {
    this.selectedFile = null;
    this.imagePreview = null;
  }

  addProduct(): void {
    const formData = new FormData();
    formData.append('name', this.form.name);
    formData.append('category', this.form.category);
    formData.append('price', String(this.form.price));
    formData.append('description', this.form.description);

    if (this.selectedFile) {
      formData.append('image', this.selectedFile, this.selectedFile.name);
    }

    this.adminService.createProduct(formData).subscribe(() => {
      this.form = { name: '', category: 'new', price: 0, description: '' };
      this.clearFile();
      this.loadProducts();
      
      Swal.fire({
        title: 'Success!',
        text: 'Product created successfully',
        icon: 'success',
        timer: 1500,
        showConfirmButton: false
      });
    });
  }

  deleteProduct(id: number): void {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#dc3545',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        this.adminService.deleteProduct(id).subscribe({
          next: () => {
            this.loadProducts();
            Swal.fire({
              title: 'Deleted!',
              text: 'The product has been deleted.',
              icon: 'success',
              timer: 1500,
              showConfirmButton: false
            });
          },
          error: () => {
             Swal.fire('Error', 'Failed to delete the product.', 'error');
          }
        });
      }
    });
  }

  logout(): void {
    this.adminSession.logout();
    void this.router.navigateByUrl('/admin/login');
  }
}

