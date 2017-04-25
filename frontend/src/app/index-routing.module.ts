import { NgModule }             from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { IndexComponent }   from './index.component';

const indexRoutes: Routes = [
  { path: 'index',  component: IndexComponent }
];

@NgModule({
  imports: [ RouterModule.forRoot(indexRoutes) ],
  exports: [ RouterModule ]
})

export class IndexRoutingModule {}