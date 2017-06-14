import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProtectiveAnimalsComponent } from './protective-animals.component';

describe('ProtectiveAnimalsComponent', () => {
  let component: ProtectiveAnimalsComponent;
  let fixture: ComponentFixture<ProtectiveAnimalsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProtectiveAnimalsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProtectiveAnimalsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
