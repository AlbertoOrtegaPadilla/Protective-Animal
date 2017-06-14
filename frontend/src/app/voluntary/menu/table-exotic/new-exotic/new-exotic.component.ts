import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';

import { GenderService } from '../../../../shared/gender/gender.service';
import { SizeService } from '../../../../shared/size/size.service';
import { StatusService } from '../../../../shared/status/status.service';
import { TypeExoticService } from '../../../../shared/typeExotic/typeExotic.service';
import { ExoticService } from '../../../../shared/exotic/exotic.service';
import { LoginService } from '../../../../shared/security/login.service';

@Component({
  selector: 'app-new-exotic',
  templateUrl: './new-exotic.component.html',
  styleUrls: ['./new-exotic.component.css']
})
export class NewExoticComponent implements OnInit {

  public typeExotics;
  public genders;
  public sizes;
  public status;
  public mostrarDatos: boolean;
  public errorMessage;
  active = true;

  exoticForm: FormGroup;
  constructor(
    private fb: FormBuilder,
    private genderService: GenderService,
    private sizeService: SizeService,
    private statusService: StatusService,
    private typeExoticService: TypeExoticService,
    private exoticService: ExoticService,
    private loginService: LoginService,
    private router: Router
  ) { }

  ngOnInit() {
    this.buildForm();
    this.getAllGenders();
    this.getAllSizes();
    this.getAllStatus();
    this.getAllTypeExotics();
  }

  buildForm(): void {
    this.exoticForm = this.fb.group({
      id_user: ['1'],
      id_type_exotic: ['', Validators.required],
      id_gender: ['', Validators.required],
      id_size: ['', Validators.required],
      id_status: ['', Validators.required],
      breed: ['', Validators.required],
      name: ['',
        [Validators.required,
        Validators.minLength(4),
        Validators.maxLength(24)]
      ],
      description: ['', Validators.required],
      contact_person: ['', Validators.required],
      phone: ['', Validators.required],
      age: ['', Validators.required],
      email: ['', Validators.required],
      url_video: ['', Validators.required]
    });

    this.exoticForm.valueChanges
      .subscribe(data => this.onValueChanged(data));

    this.onValueChanged(); // (re)set validation messages now
  }

  onValueChanged(data?: any) {
    if (!this.exoticForm) { return; }
    const form = this.exoticForm;

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
    'name': '',
    'id_type_exotic': '',
    'id_gender': '',
    'id_size': '',
    'id_status': '',
    'age': '',
    'contact_person': '',
    'phone': '',
    'email': '',
    'url_video': '',
    'description': '',
    'breed': ''
  };

  // tslint:disable-next-line:member-ordering
  validationMessages = {
    'name': {
      'required': 'Name is required.',
      'minlength': 'Name must be at least 4 characters long.',
      'maxlength': 'Name cannot be more than 24 characters long.'
    },
    'id_gender': {
      'required': 'Es requerido.'
    },
    'id_size': {
      'required': 'Es requerido.'
    },
    'id_status': {
      'required': 'Es requerido.'
    },
    'age': {
      'required': 'Es requerido.'
    },
    'contact_person': {
      'required': 'Es requerido.'
    },
    'phone': {
      'required': 'Es requerido.'
    },
    'email': {
      'required': 'Es necesario un email.'
    },
    'url_video': {
      'required': 'Es requerido.'
    },
    'description': {
      'required': 'Este cambio es requerido.'
    },
    'breed': {
      'required': 'Este cambio es requerido.'
    },
    'id_type_exotic': {
      'required': 'Es requerido.'
    }
  };

  onSubmit() {
    const token = this.loginService.getToken();

    this.exoticService.newExotic(token, this.exoticForm.value).subscribe(
      response => {
        window.location.href = '/table-exotic';
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

  onShowHide(value) {
    this.mostrarDatos = value;
  }

  getAllGenders() {
    this.genderService.getGenders().subscribe(
      response => {
        this.genders = response.data;
      }
    );
  }

  getAllSizes() {
    this.sizeService.getSizes().subscribe(
      response => {
        this.sizes = response.data;
      }
    );
  }

  getAllStatus() {
    this.statusService.getStatus().subscribe(
      response => {
        this.status = response.data;
      }
    );
  }

  getAllTypeExotics() {
    this.typeExoticService.getTypeExotics().subscribe(
      response => {
        this.typeExotics = response.data;
      }
    );
  }

}
