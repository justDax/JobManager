import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { RouterModule, Routes } from '@angular/router';
import { StoreRoutingModule } from './store/store-routing.module';
import { WorkerRoutingModule } from './worker/worker-routing.module';
import { IndexRoutingModule } from './index-routing.module';

import { AppComponent }  from './app.component';
import { IndexComponent }  from './index.component';

import { StoreComponent } from './store/store.component';
import { StoreJobOfferComponent } from './store/job-offer/store.job-offer.component';
import { WorkerComponent } from './worker/worker.component';

import { RestangularModule, Restangular } from 'ngx-restangular';

// quick homepage route
const appRoutes: Routes = [
  { path: '', redirectTo: '/index', pathMatch: 'full' }
];

// Function for settting the default restangular configuration
export function RestangularConfigFactory (RestangularProvider: any) {
  // RestangularProvider.setDefaultHeaders({'Authorization': 'Bearer UDXPx-Xko0w4BRKajozCVy20X11MRZs1'});
  RestangularProvider.setBaseUrl('http://localhost:8000/api');
}


@NgModule({
  imports:      [ 
    BrowserModule,
    StoreRoutingModule,
    WorkerRoutingModule,
    IndexRoutingModule,
    // WorkerRoutingModule,
    RouterModule.forRoot(appRoutes),
    RestangularModule.forRoot(RestangularConfigFactory)
  ],
  declarations: [ 
    AppComponent,
    StoreComponent,
    StoreJobOfferComponent,
    WorkerComponent,
    IndexComponent
  ],
  bootstrap:    [ AppComponent ]
})

export class AppModule { 

}
