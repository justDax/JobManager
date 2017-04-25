import { NgModule }                 from '@angular/core';
import { RouterModule, Routes }     from '@angular/router';
import { WorkerComponent }          from './worker.component';


const workerRoutes: Routes = [
  { path: 'worker', component: WorkerComponent }
];

@NgModule({
  imports: [ RouterModule.forChild(workerRoutes) ],
  exports: [ RouterModule ]
})


export class WorkerRoutingModule {}