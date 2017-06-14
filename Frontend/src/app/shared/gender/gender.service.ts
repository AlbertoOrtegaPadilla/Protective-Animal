import { Injectable } from '@angular/core';
import { Http } from '@angular/http';


@Injectable()
export class GenderService {

  public url = 'https://www.alberto.tocode.es';

  constructor(private http: Http) { }

  getGenders() {
    return this.http.get(this.url + '/gender/list').map(res => res.json());
  }
}
