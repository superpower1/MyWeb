import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { Product1Component } from './product1/product1.component';
import { ProductService } from './shared/product.service';
import { Product2Service } from './shared/product2.service';
import { Product2Component } from './product2/product2.component';
import { LogService } from './shared/log.service';


@NgModule({
  declarations: [
    AppComponent,
    Product1Component,
    Product2Component
  ],
  imports: [
    BrowserModule
  ],
  providers: [{
    provide: ProductService,
    useFactory: (printOut: LogService, appConfig) => {
      if (appConfig.isDev) { 
        return new ProductService;
      } else {
        return new Product2Service(printOut);
      }
    },
    deps: [LogService, "APP_CONFIG"]
  }, 
  LogService,
  {
    provide: "APP_CONFIG", useValue: { isDev: true }
  }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
