import { Component, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';
import { Observable } from 'rxjs';
import 'rxjs/Rx';

import { PriceQuote } from '../price-quote/price-quote.component';

@Component({
  selector: 'app-bind',
  templateUrl: './bind.component.html',
  styleUrls: ['./bind.component.css']
})
export class BindComponent implements OnInit {

	imgUrl:string = "http://placehold.it/400x200";

  size:number = 2;

  inputStr:string;

  newPrice: PriceQuote = new PriceQuote('', 0);

  buyPrice: PriceQuote = new PriceQuote('', 0);

  constructor() {
    setTimeout(() => {
      this.titleClass = {
        bgc: true,
        fontcolor: true,
        fontsize: true
      }
    }, 3000);
    setTimeout(() => {
      this.titleStyle = {
        backgroundColor: 'black',
        fontSize: '1em'
      }
    }, 6000);

    // 响应式编程
    // Observable.from()用于发射被观察者，可以发射任何数据，这里是数组
    Observable.from([1,2,3,4])
    .filter(e => e%2 == 0)
    .map(e => e*e)
    // subscribe()是观察者，用于处理发射的数据
    .subscribe(
      e => console.log(e), // 必要，处理流的方法
      err => console.log(err), // 可选，抛出异常的处理
      () => console.log("end") // 可选，在执行完之后调用
      );

    this.searchInput.valueChanges
    // 延时500毫秒再输出结果
    .debounceTime(500)
    .subscribe(search => this.outputSearch(search));
  }

  ngOnInit() {
  }

  doOnClick(event: any) {
  	alert('Hi')
  }

  doOnInput(event: any) {
    // 这里的value是DOM元素的value属性，存储的是当前的值
    console.log(event.target.value);
    // 这里的value是html的属性，存储的是初始设定的值
    console.log(event.target.getAttribute("value"));
    // 每次改变输入框的值时，DOM属性都会发生改变，而html属性则不会改变

    // 模板绑定是通过绑定DOM属性和事件来工作的而不是html属性
  }
  // class绑定使用的对象
  titleClass:object = {
    bgc: false,
    fontcolor: false,
    fontsize: false
  }
  // 样式绑定使用的对象
  titleStyle:object = {
   
  }

  onKey(value:string) {
    console.log(value);
  }

  searchInput: FormControl = new FormControl();

  outputSearch(value:string) {
    console.log(value);
  }

  priceChangeHandler(e: PriceQuote) {
    this.newPrice = e;
  }

  buyHandler(e: PriceQuote) {
    this.buyPrice = e;
  }

}
