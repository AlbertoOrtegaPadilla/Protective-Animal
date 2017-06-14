import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Router, ActivatedRoute, Params } from '@angular/router';

import { GenderService } from '../../../../shared/gender/gender.service';
import { SizeService } from '../../../../shared/size/size.service';
import { StatusService } from '../../../../shared/status/status.service';
import { DogService } from '../../../../shared/dog/dog.service';
import { LoginService } from '../../../../shared/security/login.service';

import { Dog } from '../../../../shared/model/dog.model';


@Component({
  selector: 'app-edit-dog',
  templateUrl: './edit-dog.component.html',
  styleUrls: ['./edit-dog.component.css']
})
export class EditDogComponent implements OnInit {

  public dog;
  public genders;
  public sizes;
  public status;
  public mostrarDatos: boolean;
  public errorMessage;
  active = true;

  detail = new Dog('', '', '', '', '', '', '', '', '', '', '', '');

  dogForm: FormGroup;

  constructor(
    private fb: FormBuilder,
    private genderService: GenderService,
    private sizeService: SizeService,
    private statusService: StatusService,
    private dogService: DogService,
    private loginService: LoginService,
    private router: Router,
    private route: ActivatedRoute
  ) { }

  ngOnInit() {
    this.route.params.forEach((params: Params) => {

      const id = +params['id'];

      this.dogService.getDog(id).subscribe(
        response => {
          this.dog = response.data;
          this.detail = new Dog(
            this.dog.id,
            this.dog.breed,
            this.dog.idGender,
            this.dog.idSize,
            this.dog.idStatus,
            this.dog.name,
            this.dog.description,
            this.dog.contactPerson,
            this.dog.phone,
            this.dog.age,
            this.dog.email,
            this.dog.urlVideo);
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

    this.dogForm = this.fb.group({
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

    this.dogForm.valueChanges
      .subscribe(data => this.onValueChanged(data));

    this.onValueChanged(); // (re)set validation messages now
  }

  onValueChanged(data?: any) {
    if (!this.dogForm) { return; }
    const form = this.dogForm;

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

  updateDog() {

    this.route.params.forEach((params: Params) => {

      const id = +params['id'];
      console.log('aqui ' + id);
      const token = this.loginService.getToken();

      this.dogService.update(token, this.dogForm.value, id).subscribe(
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

