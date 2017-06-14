import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';


@Injectable()
export class CatService {

 public url = 'https://www.alberto.tocode.es';

  constructor(private http: Http) { }

  getCats(page = null) {
    if (page == null) {
      page = 1;
    }

    return this.http.get(this.url + '/cat/list?page=' + page).map(res => res.json());
  }

  getCat(id) {
    return this.http.get(this.url + '/cat/detail/' + id).map(res => res.json());
  }

  newCat(token, cat) {
    const json = JSON.stringify(cat);
    const params = 'json=' + json + '&authorization=' + token;
    console.log(params);
    const headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });

    return this.http.post(this.url + '/cat/new', params, { headers: headers })
      .map(res => res.json());
  }

  deleteCat(token, id) {
    const params = 'authorization=' + token;
    const headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });

    return this.http.post(this.url + '/cat/delete/' + id, params, { headers: headers })
      .map(res => res.json());
  }

  update(token, cat, id) {
    const json = JSON.stringify(cat);
    const params = 'json=' + json + '&authorization=' + token;
    const headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });

    return this.http.post(this.url + '/cat/edit/' + id, params, { headers: headers })
      .map(res => res.json());
  }

  search(search = null, page = null) {
    if (page == null) {
      page = 1;
    }

    let http: any;
    if (search == null) {
      http = this.http.get(this.url + '/cat/search').map(res => res.json());
    } else {
      http = this.http.get(this.url + '/cat/search/' + search + '?page=' + page)
        .map(res => res.json());
    }

    return http;
  }

}
