import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TableExoticComponent } from './table-exotic.component';

describe('TableExoticComponent', () => {
  let component: TableExoticComponent;
  let fixture: ComponentFixture<TableExoticComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TableExoticComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TableExoticComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
