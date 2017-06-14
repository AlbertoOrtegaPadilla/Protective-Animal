import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TableCatComponent } from './table-cat.component';

describe('TableCatComponent', () => {
  let component: TableCatComponent;
  let fixture: ComponentFixture<TableCatComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TableCatComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TableCatComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
