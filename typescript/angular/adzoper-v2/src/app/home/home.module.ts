import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeComponent } from './home.component';

import { Routes, RouterModule } from '@angular/router';

const homeRoutes: Routes = [
  {path: '', component: HomeComponent}
]


@NgModule({
  declarations: [HomeComponent],
  imports: [
    CommonModule,
    RouterModule.forRoot(homeRoutes)
  ],
  exports: [
    RouterModule
  ]
})
export class HomeModule { }
