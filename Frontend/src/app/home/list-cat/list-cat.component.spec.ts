import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListCatComponent } from './list-cat.component';

describe('ListCatComponent', () => {
  let component: ListCatComponent;
  let fixture: ComponentFixture<ListCatComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListCatComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListCatComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
