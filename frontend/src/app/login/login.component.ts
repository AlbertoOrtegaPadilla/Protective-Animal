import { Component, OnInit } from '@angular/core';
import { Validators, FormGroup, FormBuilder } from '@angular/forms';
import { Router, ActivatedRoute, Params } from '@angular/router';

import { LoginService } from '../shared/security/login.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  public errorMessage;
  public identity;
  public token;
  form: FormGroup;

  constructor(private fb: FormBuilder,
    private router: Router,
    private route: ActivatedRoute,
    private loginService: LoginService) {
  }

  ngOnInit() {

    this.route.params.forEach((params: Params) => {
      const logout = +params['id'];
      if (logout === 1) {
        localStorage.removeItem('identity');
        localStorage.removeItem('token');
        this.identity = null;
        this.token = null;

        window.location.href = '/login';
        // this._router.navigate(["/index"]);
      }
    });

    const identity = this.loginService.getIdentity();
    if (identity != null && identity.sub) {
      this.router.navigate(['/index']);
    }

    this.buildForm();
  }

  login() {
    const formValue = this.form.value;
    console.log(formValue);

    this.loginService.signup(formValue).subscribe(
      response => {
        const identity = response;
        this.identity = identity;

        if (this.identity.length <= 1) {
          alert('Error en el servidor');
        } else {
          if (!this.identity.status) {
            localStorage.setItem('identity', JSON.stringify(identity));

            // GET TOKEN
            formValue.gethash = 'true';
            this.loginService.signup(formValue).subscribe(
              response => {
                const token = response;
                this.token = token;

                if (this.token.length <= 0) {
                  alert('Error en el servidor');
                } else {
                  if (!this.token.status) {
                    localStorage.setItem('token', token);

                    // REDIRECCION
                    window.location.href = '/';
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

  }

  buildForm(): void {
    this.form = this.fb.group({
      email: ['', Validators.required],
      password: ['', Validators.required],
      gethash: ['true']
    });
  }

  onValueChanged(data?: any) {
    if (!this.form) { return; }
    const form = this.form;

    for (const field of Object.keys(this.formErrors)) {
      // clear previous error message (if any)
      this.formErrors[field] = '';
      const control = form.get(field);

      if (control && control.dirty && !control.valid) {
        const messages = this.validationMessages[field];
        for (const key of Object.keys(control.errors)) {
          this.formErrors[field] += messages[key] + ' ';
        }
      }
    }
  }
  // tslint:disable-next-line:member-ordering
  formErrors = {
    'email': '',
    'password': '',
  };

  // tslint:disable-next-line:member-ordering
  validationMessages = {
    'email': {
      'required': 'El email es necesario para loguearse.'
    },
    'password': {
      'required': 'La contraseña es requerida.'
    }
  };

}
