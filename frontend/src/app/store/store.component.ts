import { Component } from '@angular/core';
import { RestangularModule, Restangular } from 'ngx-restangular';
import { JobOffer } from '../job-offer';
import { Router, ActivatedRoute, Params } from '@angular/router';

@Component({
  selector: 'store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.css']
})



export class StoreComponent { 
  jobOffers: JobOffer[] = [];

  constructor(private restangular: Restangular) {
  }

  ngOnInit() {
    // GET http://localhost:8000/api/
    this.restangular.one('joboffers').get().subscribe( (response: any) => {
      this.jobOffers = response.data;
    })
  }

}