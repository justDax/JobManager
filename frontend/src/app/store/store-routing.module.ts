import { NgModule }                 from '@angular/core';
import { RouterModule, Routes }     from '@angular/router';

import { StoreComponent }           from './store.component';
import { StoreJobOfferComponent }   from './job-offer/store.job-offer.component';


const storeRoutes: Routes = [
  { path: 'store', component: StoreComponent },
  { path: 'store/joboffers/:id', component: StoreJobOfferComponent }
];

@NgModule({
  imports: [ RouterModule.forChild(storeRoutes) ],
  exports: [ RouterModule ]
})


export class StoreRoutingModule {}