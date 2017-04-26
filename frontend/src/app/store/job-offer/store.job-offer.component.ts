import { Component } from '@angular/core';
import { RestangularModule, Restangular } from 'ngx-restangular';
import { JobOffer } from '../../job-offer';
import { Router, ActivatedRoute, Params } from '@angular/router';
import { Worker } from '../../worker/worker';


@Component({
  templateUrl: './store.job-offer.html',
  styleUrls: ['./store.job-offer.css']
})


export class StoreJobOfferComponent{
  id: number;
  workers: Worker[];

  constructor(private restangular: Restangular, private route: ActivatedRoute) {
  }

  ngOnInit() {
    // GET http://localhost:8000/api/joboffer/:id/workers
    this.route.params.subscribe( params => {
      this.id = +params.id;  
    });
    

    this.restangular.one('joboffer', this.id).one("workers").get().subscribe( (response: any) => {
      this.workers = response.data;
    })
  }
}
