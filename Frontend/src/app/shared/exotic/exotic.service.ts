import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';


@Injectable()
export class ExoticService {

  public url = 'https://www.alberto.tocode.es';

  constructor(private http: Http) { }

  getExotics(page = null) {
    if (page == null) {
      page = 1;
    }

    return this.http.get(this.url + '/exotic/list?page=' + page).map(res => res.json());
  }

  getExotic(id) {
    return this.http.get(this.url + '/exotic/detail/' + id).map(res => res.json());
  }

  newExotic(token, exotic) {
    const json = JSON.stringify(exotic);
    const params = 'json=' + json + '&authorization=' + token;
    const headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });

    return this.http.post(this.url + '/exotic/prueba', params, { headers: headers })
      .map(res => res.json());
  }

  deleteExotic(token, id) {
    const params = 'authorization=' + token;
    const headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });

    return this.http.post(this.url + '/exotic/delete/' + id, params, { headers: headers })
      .map(res => res.json());
  }

  update(token, exotic, id) {
    const json = JSON.stringify(exotic);
    const params = 'json=' + json + '&authorization=' + token;
    const headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });

    return this.http.post(this.url + '/exotic/edit/' + id, params, { headers: headers })
      .map(res => res.json());
  }

  search(search = null, page = null) {
    if (page == null) {
      page = 1;
    }

    let http: any;
    if (search == null) {
      http = this.http.get(this.url + '/exotic/search').map(res => res.json());
    } else {
      http = this.http.get(this.url + '/exotic/search/' + search + '?page=' + page)
        .map(res => res.json());
    }

    return http;
  }
}
