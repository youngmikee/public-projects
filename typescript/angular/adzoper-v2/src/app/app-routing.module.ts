import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { TestComponent } from './test/test.component';

const aRoutes: Routes = [
  {path: 'test', component: TestComponent}
]

@NgModule({

})
export class AppRoutingModule {

}
