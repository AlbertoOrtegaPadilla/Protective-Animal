import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ModuleDogComponent } from './module-dog.component';

describe('ModuleDogComponent', () => {
  let component: ModuleDogComponent;
  let fixture: ComponentFixture<ModuleDogComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModuleDogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ModuleDogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
