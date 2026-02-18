export interface Order {
  id: number;
  customerName: string;
  email: string;
  address: string;
  items: Array<{ id: number; name: string; price: number }>;
  total: number;
  status: string;
  createdAt: string;
}
