import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { BindComponent } from './bind/bind.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MultiplePipe } from './pipe/multiple.pipe';
import { ChildComponent } from './child/child.component';

@NgModule({
  declarations: [
    AppComponent,
    BindComponent,
    MultiplePipe,
    ChildComponent
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
