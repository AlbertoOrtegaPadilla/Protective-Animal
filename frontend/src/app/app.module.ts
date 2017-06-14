import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';

// Router
import { RouterModule } from '@angular/router';
import { AppRoute } from './app.route';

// Forms
import { ReactiveFormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { CollaborateComponent } from './home/collaborate/collaborate.component';
import { ContactComponent } from './home/contact/contact.component';
import { ListCatComponent } from './home/list-cat/list-cat.component';
import { ListDogComponent } from './home/list-dog/list-dog.component';
import { ListExoticComponent } from './home/list-exotic/list-exotic.component';
import { ProtectiveAnimalsComponent } from './home/protective-animals/protective-animals.component';
import { LoginComponent } from './login/login.component';
import { ListSponsorComponent } from './home/list-sponsor/list-sponsor.component';
import { CatDetailComponent } from './home/list-cat/cat-detail/cat-detail.component';

// Services
import { LoginService } from './shared/security/login.service';
import { CatService } from './shared/cat/cat.service';
import { DogService } from './shared/dog/dog.service';
import { ExoticService } from './shared/exotic/exotic.service';
import { SponsorService } from './shared/sponsor/sponsor.service';
import { GenderService } from './shared/gender/gender.service';
import { SizeService } from './shared/size/size.service';
import { StatusService } from './shared/status/status.service';
import { TypeExoticService } from './shared/typeExotic/typeExotic.service';

// Pipes
import { DatePipe } from './pipes/date.pipe';
import { SanitizeHtmlPipe } from './pipes/sanitize-html.pipe';
import { MenuComponent } from './voluntary/menu/menu.component';
import { TableCatComponent } from './voluntary/menu/table-cat/table-cat.component';
import { TableDogComponent } from './voluntary/menu/table-dog/table-dog.component';
import { TableExoticComponent } from './voluntary/menu/table-exotic/table-exotic.component';
import { DogDetailComponent } from './home/list-dog/dog-detail/dog-detail.component';
import { ExoticDetailComponent } from './home/list-exotic/exotic-detail/exotic-detail.component';
import { SponsorDetailComponent } from './home/list-sponsor/sponsor-detail/sponsor-detail.component';
import { NewCatComponent } from './voluntary/menu/table-cat/new-cat/new-cat.component';
import { EditCatComponent } from './voluntary/menu/table-cat/edit-cat/edit-cat.component';
import { ModuleCatComponent } from './voluntary/menu/table-cat/module-cat/module-cat.component';
import { ModuleDogComponent } from './voluntary/menu/table-dog/module-dog/module-dog.component';
import { EditDogComponent } from './voluntary/menu/table-dog/edit-dog/edit-dog.component';
import { NewDogComponent } from './voluntary/menu/table-dog/new-dog/new-dog.component';
import { ModuleExoticComponent } from './voluntary/menu/table-exotic/module-exotic/module-exotic.component';
import { NewExoticComponent } from './voluntary/menu/table-exotic/new-exotic/new-exotic.component';
import { EditExoticComponent } from './voluntary/menu/table-exotic/edit-exotic/edit-exotic.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    CollaborateComponent,
    ContactComponent,
    ListCatComponent,
    ListDogComponent,
    ListExoticComponent,
    ProtectiveAnimalsComponent,
    LoginComponent,
    ListSponsorComponent,
    CatDetailComponent,
    DatePipe,
    SanitizeHtmlPipe,
    MenuComponent,
    TableCatComponent,
    TableDogComponent,
    TableExoticComponent,
    DogDetailComponent,
    ExoticDetailComponent,
    SponsorDetailComponent,
    NewCatComponent,
    EditCatComponent,
    ModuleCatComponent,
    ModuleDogComponent,
    EditDogComponent,
    NewDogComponent,
    ModuleExoticComponent,
    NewExoticComponent,
    EditExoticComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    ReactiveFormsModule,
    RouterModule.forRoot(AppRoute)
  ],
  providers: [
    LoginService,
    CatService,
    DogService,
    ExoticService,
    SponsorService,
    GenderService,
    SizeService,
    StatusService,
    TypeExoticService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
