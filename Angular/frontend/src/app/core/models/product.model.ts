export interface Product {
  id: number;
  name: string;
  category: 'men' | 'women' | 'kid' | 'new';
  price: number;
  image: string;
  description: string;
}
