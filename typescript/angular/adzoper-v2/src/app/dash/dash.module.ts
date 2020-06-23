import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';

import { DashComponent } from './dash/dash.component';
import { ListingComponent } from './listing/listing.component';
import { AuthGuard } from '../auth-gaurd.service';

const dashRoutes: Routes = [
  {path: 'dash', canActivate: [AuthGuard], component: DashComponent},
  {path: 'listing', component: ListingComponent}
];

@NgModule({
  declarations: [DashComponent, ListingComponent],
  imports: [
    CommonModule,
    RouterModule.forRoot(dashRoutes)
  ],
  exports: [
    DashComponent,
    RouterModule
  ]
})
export class DashModule { }
