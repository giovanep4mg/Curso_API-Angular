import { NgModule,  CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { HttpClientModule} from '@angular/common/http'
import { FormsModule } from '@angular/forms';
import { CursoComponent } from './curso/curso.component';


@NgModule({
  declarations: [
    AppComponent,
    CursoComponent,


  ],
  imports: [
    BrowserModule,
     HttpClientModule,
     AppRoutingModule,

    FormsModule,
  ],
  providers: [],
  bootstrap: [AppComponent],
  schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class AppModule {


}
