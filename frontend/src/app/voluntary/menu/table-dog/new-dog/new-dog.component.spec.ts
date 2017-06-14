import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NewDogComponent } from './new-dog.component';

describe('NewDogComponent', () => {
  let component: NewDogComponent;
  let fixture: ComponentFixture<NewDogComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NewDogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NewDogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
