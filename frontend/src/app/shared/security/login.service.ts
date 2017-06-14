import { Injectable } from '@angular/core';
import { Http, Response, Headers } from '@angular/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class LoginService {

  public url = 'https://www.alberto.tocode.es';
  public identity;
  public token;

  constructor(private http: Http) { }

  signup(user_to_login) {
    const json = JSON.stringify(user_to_login);
    const params = 'json=' + json;
    console.log(params);
    const headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });


    return this.http.post(this.url + '/login', params, { headers: headers })
      .map(res => res.json());
  }

  getIdentity() {
    const identity = JSON.parse(localStorage.getItem('identity'));

    if (identity !== 'undefined') {
      this.identity = identity;
    } else {
      this.identity = null;
    }

    return this.identity;
  }

  getToken() {
    const token = localStorage.getItem('token');

    if (token !== 'undefined'){
      this.token = token;
    }else {
      this.token = null;
    }

    return this.token;
  }

}
