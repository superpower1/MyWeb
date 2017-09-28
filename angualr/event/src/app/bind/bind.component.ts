import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-bind',
  templateUrl: './bind.component.html',
  styleUrls: ['./bind.component.css']
})
export class BindComponent implements OnInit {

	imgUrl:string = "http://placehold.it/400x200";

  constructor() { }

  ngOnInit() {
  }

  doOnClick(event: any) {
  	alert('Hi')
  }

}
