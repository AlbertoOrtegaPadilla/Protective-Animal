import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';

import { LoginService } from '../../../shared/security/login.service';
import { DogService } from '../../../shared/dog/dog.service';

@Component({
  selector: 'app-table-dog',
  templateUrl: './table-dog.component.html',
  styleUrls: ['./table-dog.component.css']
})
export class TableDogComponent implements OnInit {

  public searchString: string;
  public mostrarDatos: boolean;
  public identity;
  public dogs;
  public errorMessage;
  public status;
  public loading;
  public pages;
  public pagePrev = 1;
  public pageNext = 1;

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private loginService: LoginService,
    private dogService: DogService
  ) { }

  ngOnInit() {
    this.mostrarDatos = false;
    const identity = this.loginService.getIdentity();
    this.identity = identity;

    if (identity == null) {
      this.router.navigate(['/index']);
    }
  }

  search() {
    if (this.searchString === null) {
      this.mostrarDatos = false;
    } else {
      this.mostrarDatos = true;

      this.route.params.forEach((params: Params) => {

        let page: any = +params['page'];
        if (!page) {
          page = 1;
        }

        if (!this.searchString || this.searchString.trim().length === 0) {
          this.searchString = null;
          // this.mostrarDatos = false;
          this.dogService.getDogs(page).subscribe(
            response => {
              this.status = response.status;

              if (this.status !== 'success') {
                this.status = 'error';
              } else {
                this.dogs = response.data;
                this.loading = 'hide';

                this.pages = [];
                for (let i = 0; i < response.total_pages; i++) {
                  this.pages.push(i);
                }

                if (page >= 2) {
                  this.pagePrev = (page - 1);
                } else {
                  this.pagePrev = page;
                }

                if (page < response.total_pages || page === 1) {
                  this.pageNext = (page + 1);
                } else {
                  this.pageNext = page;
                }

              }
            }
          );
        }



        this.dogService.search(this.searchString, page).subscribe(
          response => {
            this.status = response.status;

            if (this.status !== 'success') {
              this.status = 'error';
            } else {
              this.dogs = response.data;
              this.loading = 'hide';

              this.pages = [];
              for (let i = 0; i < response.total_pages; i++) {
                this.pages.push(i);
              }

              if (page >= 2) {
                this.pagePrev = (page - 1);
              } else {
                this.pagePrev = page;
              }

              if (page < response.total_pages || page === 1) {
                this.pageNext = (page + 1);
              } else {
                this.pageNext = page;
              }

            }
          }
        );

      });
    }
  }

  delete(id) {
    const token = this.loginService.getToken();
    this.dogService.deleteDog(token, id).subscribe(
      response => {
        window.location.href = '/table-dog';
      },
      error => {
        this.errorMessage = <any>error;

        if (this.errorMessage != null) {
          console.log(this.errorMessage);
          alert('Error en la petición');
        }
      }
    );
  }

}
