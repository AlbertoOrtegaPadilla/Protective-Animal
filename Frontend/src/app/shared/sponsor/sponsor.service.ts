import { Injectable } from '@angular/core';
import { Http } from '@angular/http';


@Injectable()
export class SponsorService {

  public url = 'https://www.alberto.tocode.es';

  constructor(private http: Http) { }

  getSponsors(page = null) {
    if (page == null) {
      page = 1;
    }

    return this.http.get(this.url + '/sponsor/list?page=' + page).map(res => res.json());
  }

  getSponsor(id) {
    return this.http.get(this.url + '/sponsor/detail/' + id).map(res => res.json());
  }
}
