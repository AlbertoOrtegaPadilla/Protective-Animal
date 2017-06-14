import { Route } from '@angular/router';

import { MenuComponent } from './voluntary/menu/menu.component';
import { LoginComponent } from './login/login.component';
import { HomeComponent } from './home/home.component';
import { ContactComponent } from './home/contact/contact.component';
import { ProtectiveAnimalsComponent } from './home/protective-animals/protective-animals.component';
import { CollaborateComponent } from './home/collaborate/collaborate.component';

import { ListExoticComponent } from './home/list-exotic/list-exotic.component';
import { ListCatComponent } from './home/list-cat/list-cat.component';
import { ListDogComponent } from './home/list-dog/list-dog.component';
import { ListSponsorComponent } from './home/list-sponsor/list-sponsor.component';

import { CatDetailComponent } from './home/list-cat/cat-detail/cat-detail.component';
import { DogDetailComponent } from './home/list-dog/dog-detail/dog-detail.component';
import { ExoticDetailComponent } from './home/list-exotic/exotic-detail/exotic-detail.component';
import { SponsorDetailComponent } from './home/list-sponsor/sponsor-detail/sponsor-detail.component';


import { TableCatComponent } from './voluntary/menu/table-cat/table-cat.component';
import { TableDogComponent } from './voluntary/menu/table-dog/table-dog.component';
import { TableExoticComponent } from './voluntary/menu/table-exotic/table-exotic.component';

import { EditCatComponent } from './voluntary/menu/table-cat/edit-cat/edit-cat.component';
import { EditDogComponent } from './voluntary/menu/table-dog/edit-dog/edit-dog.component';
import { EditExoticComponent } from './voluntary/menu/table-exotic/edit-exotic/edit-exotic.component';


export const AppRoute: Route[] = [
    {
    path: 'index',
    component : HomeComponent,
    },
    {
      path: 'collaborate',
      component : CollaborateComponent
    },
    {
      path: 'ProtectiveAnimals',
      component : ProtectiveAnimalsComponent
    },
    {
      path: 'contact',
      component : ContactComponent
    },
    {
      path: 'dog',
      component : ListDogComponent
    },
    {
      path: 'dog/:page',
      component: ListDogComponent
    },
    {
      path: 'dog-detail/:id',
      component: DogDetailComponent
    },
    {
      path: 'cat',
      component : ListCatComponent
    },
    {
      path: 'cat/:page',
      component: ListCatComponent
    },
    {
      path: 'cat-detail/:id',
      component: CatDetailComponent
    },
    {
      path: 'exotic',
      component : ListExoticComponent
    },
    {
      path: 'exotic/:page',
      component: ListExoticComponent
    },
    {
      path: 'exotic-detail/:id',
      component: ExoticDetailComponent
    },
    {
      path: 'sponsor',
      component : ListSponsorComponent
    },
    {
      path: 'sponsor/:page',
      component : ListSponsorComponent
    },
    {
      path: 'sponsor-detail/:id',
      component: SponsorDetailComponent
    },
    {
      path: 'login',
      component : LoginComponent
    },
    {
      path: 'login/:id',
      component : LoginComponent
    },
    {
      path: 'menu',
      component : MenuComponent
    },
    {
      path: 'table-cat',
      component : TableCatComponent
    },
    {
      path: 'table-cat/:page',
      component : TableCatComponent
    },
    {
      path: 'edit-cat/:id',
      component: EditCatComponent
    },
    {
      path: 'table-dog',
      component : TableDogComponent
    },
    {
      path: 'table-dog/:page',
      component : TableDogComponent
    },
    {
      path: 'edit-dog/:id',
      component: EditDogComponent
    },
    {
      path: 'table-exotic',
      component : TableExoticComponent
    },
    {
      path: 'table-exotic/:page',
      component : TableExoticComponent
    },
    {
      path: 'edit-exotic/:id',
      component: EditExoticComponent
    },
    {
      path: '',
      redirectTo: 'index',
      pathMatch: 'full'
    }
];
