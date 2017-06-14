import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';

import { SponsorService } from '../../../shared/sponsor/sponsor.service';

@Component({
  selector: 'app-sponsor-detail',
  templateUrl: './sponsor-detail.component.html',
  styleUrls: ['./sponsor-detail.component.css']
})
export class SponsorDetailComponent implements OnInit {

  public errorMessage;
  public detail;
  public status;
  public loading = 'show';
  public identity;
  public mostrarDatos: boolean;

  constructor(
    private sponsorService: SponsorService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit() {

    this.route.params.forEach((params: Params) => {
      this.loading = 'show';

      const id = +params['id'];

      this.sponsorService.getSponsor(id).subscribe(
        response => {
          this.detail = response.data;
          this.status = response.status;

          if (this.status !== 'success') {
            this.router.navigate(['/index']);
          }

          this.loading = 'hide';
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
