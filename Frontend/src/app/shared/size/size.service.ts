import { Injectable } from '@angular/core';
import { Http } from '@angular/http';


@Injectable()
export class SizeService {

  public url = 'https://www.alberto.tocode.es';

  constructor(private http: Http) { }

  getSizes() {
    return this.http.get(this.url + '/size/list').map(res => res.json());
  }
}
