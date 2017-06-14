import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';
import { LoginService } from '../../shared/security/login.service';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent implements OnInit {

  public identity;
  public token;

  constructor(private router: Router,
    private route: ActivatedRoute,
    private loginService: LoginService
  ) { }

  ngOnInit() {

    const identity = this.loginService.getIdentity();
    this.identity = identity;

    if (identity == null) {
      this.router.navigate(['/index']);
    }
  }

}
