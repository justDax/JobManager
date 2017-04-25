import { Component } from '@angular/core';
import { RestangularModule, Restangular } from 'ngx-restangular';
import { JobOffer } from '../job-offer';
import { Router, ActivatedRoute, Params } from '@angular/router';

@Component({
  templateUrl: './worker.html',
  styleUrls: ['./worker.css']
})



export class WorkerComponent { 
  jobOffers: JobOffer[] = [];

  constructor(private restangular: Restangular) {
  }

  ngOnInit() {
    // GET http://localhost:8000/api/
    this.restangular.one('alljoboffers').get().subscribe( (response: any) => {
      this.jobOffers = response.data;
    })
  }

  
  likeOffer(jobOffer: JobOffer){
    this.restangular.one('joboffer', jobOffer.id).one("interest").post().subscribe( (response: Object) => {
      alert("Announce " + jobOffer.title + " Liked");
    }, (errorResponse: any) => {
      console.log(errorResponse);
      this.displayError(errorResponse);
    });
  }

  
  unlikeOffer(jobOffer: JobOffer){
    this.restangular.one('joboffer', jobOffer.id).one("interest").remove().subscribe( (response: any) => {
      alert("You don't like " + jobOffer.title + " anymore.");
    }, (errorResponse: any) => {
      this.displayError(errorResponse);
    })
  }


  displayError(restangularResponse: any){
    var res = restangularResponse.data;
    var message = [];
    if ( res.error !== null ){
      for (var k in res.error){
        message.push(res.error[k]);
      }
    }
    alert( message.join(" - ") );
  }

}