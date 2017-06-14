import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ModuleCatComponent } from './module-cat.component';

describe('ModuleCatComponent', () => {
  let component: ModuleCatComponent;
  let fixture: ComponentFixture<ModuleCatComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModuleCatComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ModuleCatComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
