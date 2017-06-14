import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';


@Injectable()
export class DogService {

  public url = 'https://www.alberto.tocode.es';

  constructor(private http: Http) { }

  getDogs(page = null) {
    if (page == null) {
      page = 1;
    }

    return this.http.get(this.url + '/dog/list?page=' + page).map(res => res.json());
  }

  getDog(id) {
    return this.http.get(this.url + '/dog/detail/' + id).map(res => res.json());
  }

  newDog(token, cat) {
    const json = JSON.stringify(cat);
    const params = 'json=' + json + '&authorization=' + token;
    console.log(params);
    const headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });

    return this.http.post(this.url + '/dog/new', params, { headers: headers })
      .map(res => res.json());
  }

  deleteDog(token, id) {
    const params = 'authorization=' + token;
    const headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });

    return this.http.post(this.url + '/dog/delete/' + id, params, { headers: headers })
      .map(res => res.json());
  }

  update(token, cat, id) {
    const json = JSON.stringify(cat);
    const params = 'json=' + json + '&authorization=' + token;
    const headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' });

    return this.http.post(this.url + '/dog/edit/' + id, params, { headers: headers })
      .map(res => res.json());
  }

  search(search = null, page = null) {
    if (page == null) {
      page = 1;
    }

    let http: any;
    if (search == null) {
      http = this.http.get(this.url + '/dog/search').map(res => res.json());
    } else {
      http = this.http.get(this.url + '/dog/search/' + search + '?page=' + page)
        .map(res => res.json());
    }

    return http;
  }
}
