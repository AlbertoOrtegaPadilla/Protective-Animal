import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';

import { ExoticService } from '../../../shared/exotic/exotic.service';

@Component({
  selector: 'app-exotic-detail',
  templateUrl: './exotic-detail.component.html',
  styleUrls: ['./exotic-detail.component.css']
})
export class ExoticDetailComponent implements OnInit {

  public errorMessage;
  public detail;
  public status;
  public loading = 'show';
  public identity;
  public mostrarDatos: boolean;

  constructor(
    private exoticService: ExoticService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit() {

    this.route.params.forEach((params: Params) => {
      this.loading = 'show';

      const id = +params['id'];

      this.exoticService.getExotic(id).subscribe(
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

  onShowHide(value) {
    this.mostrarDatos = value;
  }

}
