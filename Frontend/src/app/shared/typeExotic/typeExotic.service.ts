import { Injectable } from '@angular/core';
import { Http } from '@angular/http';


@Injectable()
export class TypeExoticService {

  public url = 'https://www.alberto.tocode.es';

  constructor(private http: Http) { }

  getTypeExotics() {
    return this.http.get(this.url + '/type-exotic/list').map(res => res.json());
  }
}
