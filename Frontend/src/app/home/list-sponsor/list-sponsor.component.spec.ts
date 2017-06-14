import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListSponsorComponent } from './list-sponsor.component';

describe('ListSponsorComponent', () => {
  let component: ListSponsorComponent;
  let fixture: ComponentFixture<ListSponsorComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListSponsorComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListSponsorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
