import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ModuleExoticComponent } from './module-exotic.component';

describe('ModuleExoticComponent', () => {
  let component: ModuleExoticComponent;
  let fixture: ComponentFixture<ModuleExoticComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModuleExoticComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ModuleExoticComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
