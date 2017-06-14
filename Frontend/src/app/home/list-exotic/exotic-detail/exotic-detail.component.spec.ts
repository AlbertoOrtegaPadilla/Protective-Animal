import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ExoticDetailComponent } from './exotic-detail.component';

describe('ExoticDetailComponent', () => {
  let component: ExoticDetailComponent;
  let fixture: ComponentFixture<ExoticDetailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ExoticDetailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ExoticDetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
