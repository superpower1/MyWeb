import { Injectable } from '@angular/core';
import { Product, ProductService } from './product.service';
import { LogService } from './log.service';

@Injectable()
export class Product2Service implements ProductService{

	getProduct(): Product {
		this.printout.log("我是在product2服务中注入log服务打印出来的");
		return new Product(1, "Red eyes", "150", "Normal dragon");
	}

  constructor(private printout:LogService) { 

  }

}
