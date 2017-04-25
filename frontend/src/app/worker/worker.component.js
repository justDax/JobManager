"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
Object.defineProperty(exports, "__esModule", { value: true });
var core_1 = require("@angular/core");
var ngx_restangular_1 = require("ngx-restangular");
var WorkerComponent = (function () {
    function WorkerComponent(restangular) {
        this.restangular = restangular;
        this.jobOffers = [];
    }
    WorkerComponent.prototype.ngOnInit = function () {
        var _this = this;
        // GET http://localhost:8000/api/
        this.restangular.one('alljoboffers').get().subscribe(function (response) {
            _this.jobOffers = response.data;
        });
    };
    WorkerComponent.prototype.likeOffer = function (jobOffer) {
        var _this = this;
        this.restangular.one('joboffer', jobOffer.id).one("interest").post().subscribe(function (response) {
            alert("Announce " + jobOffer.title + " Liked");
        }, function (errorResponse) {
            console.log(errorResponse);
            _this.displayError(errorResponse);
        });
    };
    WorkerComponent.prototype.unlikeOffer = function (jobOffer) {
        var _this = this;
        this.restangular.one('joboffer', jobOffer.id).one("interest").remove().subscribe(function (response) {
            alert("You don't like " + jobOffer.title + " anymore.");
        }, function (errorResponse) {
            _this.displayError(errorResponse);
        });
    };
    WorkerComponent.prototype.displayError = function (restangularResponse) {
        var res = restangularResponse.data;
        var message = [];
        if (res.error !== null) {
            for (var k in res.error) {
                message.push(res.error[k]);
            }
        }
        alert(message.join(" - "));
    };
    return WorkerComponent;
}());
WorkerComponent = __decorate([
    core_1.Component({
        templateUrl: './worker.html',
        styleUrls: ['./worker.css']
    }),
    __metadata("design:paramtypes", [ngx_restangular_1.Restangular])
], WorkerComponent);
exports.WorkerComponent = WorkerComponent;
//# sourceMappingURL=worker.component.js.map