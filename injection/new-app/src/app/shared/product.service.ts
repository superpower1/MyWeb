import { Injectable } from '@angular/core';

@Injectable()
export class ProductService {

  constructor() { }
  getProduct():Product {
  	return new Product(0, "Blue eyes", "300", "The strongest dragon");
  }
}

export class Product {
	
	constructor(
		public id:number,
		public title:string,
		public price:string,
		public desc:string
		) {

	}
}
