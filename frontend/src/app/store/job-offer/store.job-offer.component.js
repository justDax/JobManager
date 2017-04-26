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
var router_1 = require("@angular/router");
var StoreJobOfferComponent = (function () {
    function StoreJobOfferComponent(restangular, route) {
        this.restangular = restangular;
        this.route = route;
    }
    StoreJobOfferComponent.prototype.ngOnInit = function () {
        var _this = this;
        // GET http://localhost:8000/api/joboffer/:id/workers
        this.route.params.subscribe(function (params) {
            _this.id = +params.id;
        });
        this.restangular.one('joboffer', this.id).one("workers").get().subscribe(function (response) {
            _this.workers = response.data;
        });
    };
    return StoreJobOfferComponent;
}());
StoreJobOfferComponent = __decorate([
    core_1.Component({
        templateUrl: './store.job-offer.html',
        styleUrls: ['./store.job-offer.css']
    }),
    __metadata("design:paramtypes", [ngx_restangular_1.Restangular, router_1.ActivatedRoute])
], StoreJobOfferComponent);
exports.StoreJobOfferComponent = StoreJobOfferComponent;
//# sourceMappingURL=store.job-offer.component.js.map