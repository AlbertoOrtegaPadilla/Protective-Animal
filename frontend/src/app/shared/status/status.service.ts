import { Injectable } from '@angular/core';
import { Http } from '@angular/http';


@Injectable()
export class StatusService {

  public url = 'https://www.alberto.tocode.es';

  constructor(private http: Http) { }

  getStatus() {
    return this.http.get(this.url + '/status/list').map(res => res.json());
  }
}
