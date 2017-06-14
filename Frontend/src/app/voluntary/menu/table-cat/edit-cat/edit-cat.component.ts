import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Router, ActivatedRoute, Params } from '@angular/router';

import { GenderService } from '../../../../shared/gender/gender.service';
import { SizeService } from '../../../../shared/size/size.service';
import { StatusService } from '../../../../shared/status/status.service';
import { CatService } from '../../../../shared/cat/cat.service';
import { LoginService } from '../../../../shared/security/login.service';

import { Cat } from '../../../../shared/model/cat.model';

@Component({
  selector: 'app-edit-cat',
  templateUrl: './edit-cat.component.html',
  styleUrls: ['./edit-cat.component.css']
})
export class EditCatComponent implements OnInit {

  public cat;
  public genders;
  public sizes;
  public status;
  public mostrarDatos: boolean;
  public errorMessage;
  active = true;

  detail = new Cat('', '', '', '', '', '', '', '', '', '', '', '');

  catForm: FormGroup;
  constructor(
    private fb: FormBuilder,
    private genderService: GenderService,
    private sizeService: SizeService,
    private statusService: StatusService,
    private catService: CatService,
    private loginService: LoginService,
    private router: Router,
    private route: ActivatedRoute
  ) { }

  ngOnInit() {
    this.route.params.forEach((params: Params) => {

      const id = +params['id'];

      this.catService.getCat(id).subscribe(
        response => {
          this.cat = response.data;
          this.detail = new Cat(
            this.cat.id,
            this.cat.breed,
            this.cat.idGender,
            this.cat.idSize,
            this.cat.idStatus,
            this.cat.name,
            this.cat.description,
            this.cat.contactPerson,
            this.cat.phone,
            this.cat.age,
            this.cat.email,
            this.cat.urlVideo);

          console.log(this.cat);
          console.log(this.detail);
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

    this.buildForm();
    this.getAllGenders();
    this.getAllSizes();
    this.getAllStatus();
  }

  buildForm(): void {

    this.catForm = this.fb.group({
      breed: ['', Validators.required],
      id_gender: ['', Validators.required],
      id_size: ['', Validators.required],
      id_status: ['', Validators.required],
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

    this.catForm.valueChanges
      .subscribe(data => this.onValueChanged(data));

    this.onValueChanged(); // (re)set validation messages now
  }

  onValueChanged(data?: any) {
    if (!this.catForm) { return; }
    const form = this.catForm;

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
    }
  };

  updateCat() {

    this.route.params.forEach((params: Params) => {

      const id = +params['id'];
      console.log('aqui ' + id);
      const token = this.loginService.getToken();
      const cat = this.catForm.value;

      this.catService.update(token, this.catForm.value, id).subscribe(
        response => {
          window.location.href = '/table-cat';
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

}
