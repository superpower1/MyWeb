import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { BindComponent } from './bind/bind.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MultiplePipe } from './pipe/multiple.pipe';
import { ChildComponent } from './child/child.component';
import { PriceQuoteComponent } from './price-quote/price-quote.component';

@NgModule({
  declarations: [
    AppComponent,
    BindComponent,
    MultiplePipe,
    ChildComponent,
    PriceQuoteComponent
  ],
  imports: [
    BrowserModule,  
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
