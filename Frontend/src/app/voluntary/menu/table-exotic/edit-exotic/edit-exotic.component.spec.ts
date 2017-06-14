import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EditExoticComponent } from './edit-exotic.component';

describe('EditExoticComponent', () => {
  let component: EditExoticComponent;
  let fixture: ComponentFixture<EditExoticComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditExoticComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EditExoticComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
