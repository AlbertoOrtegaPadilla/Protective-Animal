import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';
import { LoginService } from '../../shared/security/login.service';
import { SponsorService } from '../../shared/sponsor/sponsor.service';

@Component({
  selector: 'app-list-sponsor',
  templateUrl: './list-sponsor.component.html',
  styleUrls: ['./list-sponsor.component.css']
})
export class ListSponsorComponent implements OnInit {

  public identity;
  public sponsors;
  public errorMessage;
  public status;
  public loading;
  public pages;
  public pagePrev = 1;
  public pageNext = 1;

  constructor(
    private loginService: LoginService,
    private sponsorService: SponsorService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit() {

    this.loading = 'show';

    this.identity = this.loginService.getIdentity();
    this.getAllSponsors();
  }

  getAllSponsors() {

    this.route.params.forEach((params: Params) => {
      let page = +params['page'];
      if (!page) {
        page = 1;
      }

      this.loading = 'show';
      this.sponsorService.getSponsors(page).subscribe(
        response => {
          this.status = response.status;

          if (this.status !== 'success') {
            this.status = 'error';
          } else {
            this.sponsors = response.data;
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
        },
        error => {
          this.errorMessage = <any>error;

          if (this.errorMessage != null) {
            console.log(this.errorMessage);
            alert('Error en la petición');
          }
        }
      );
    });
  }

}
