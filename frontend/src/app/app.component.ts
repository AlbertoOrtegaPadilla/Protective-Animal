import { Component, OnInit } from '@angular/core';

import { LoginService } from './shared/security/login.service';

// Declaramos las variables para jQuery
declare var jQuery: any;
declare var $: any;

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  public identity;
  public token;

  constructor(
    private _loginService: LoginService,
  ) { }

  ngOnInit() {
    this.identity = this._loginService.getIdentity();
    this.token = this._loginService.getToken();
  }

}
