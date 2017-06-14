import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListExoticComponent } from './list-exotic.component';

describe('ListExoticComponent', () => {
  let component: ListExoticComponent;
  let fixture: ComponentFixture<ListExoticComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListExoticComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListExoticComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
