import { Component, OnInit, EventEmitter, Output } from '@angular/core';

@Component({
  selector: 'app-price-quote',
  templateUrl: './price-quote.component.html',
  styleUrls: ['./price-quote.component.css']
})
export class PriceQuoteComponent implements OnInit {

	code: string = "SP1";
	price: number;

	// 这里可以给Output参数来改变名字
	@Output('priceChange')
	latestPrice: EventEmitter<PriceQuote> = new EventEmitter();

	// 如果不改名字则默认是buy
	@Output()
	buy: EventEmitter<PriceQuote> = new EventEmitter();

  constructor() {
  	setInterval(()=> {
  		let newPrice:PriceQuote = new PriceQuote(this.code, 100*Math.random()); 
  		this.price = newPrice.price;
  		this.latestPrice.emit(newPrice);
  	}, 1000);
  }

  ngOnInit() {
  }

  buyHandler() {
  	this.buy.emit(new PriceQuote(this.code, this.price));
  }

}

export class PriceQuote {
	constructor(public code:string, public price:number) {

	}
}
