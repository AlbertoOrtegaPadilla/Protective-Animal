import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NewExoticComponent } from './new-exotic.component';

describe('NewExoticComponent', () => {
  let component: NewExoticComponent;
  let fixture: ComponentFixture<NewExoticComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NewExoticComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NewExoticComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
