import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListDogComponent } from './list-dog.component';

describe('ListDogComponent', () => {
  let component: ListDogComponent;
  let fixture: ComponentFixture<ListDogComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListDogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListDogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
