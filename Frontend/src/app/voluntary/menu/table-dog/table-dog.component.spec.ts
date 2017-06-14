import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TableDogComponent } from './table-dog.component';

describe('TableDogComponent', () => {
  let component: TableDogComponent;
  let fixture: ComponentFixture<TableDogComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TableDogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TableDogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
