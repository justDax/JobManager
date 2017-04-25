"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
Object.defineProperty(exports, "__esModule", { value: true });
var core_1 = require("@angular/core");
var router_1 = require("@angular/router");
var store_component_1 = require("./store.component");
var store_job_offer_component_1 = require("./job-offer/store.job-offer.component");
var storeRoutes = [
    { path: 'store', component: store_component_1.StoreComponent },
    { path: 'store/joboffers/:id', component: store_job_offer_component_1.StoreJobOfferComponent }
];
var StoreRoutingModule = (function () {
    function StoreRoutingModule() {
    }
    return StoreRoutingModule;
}());
StoreRoutingModule = __decorate([
    core_1.NgModule({
        imports: [router_1.RouterModule.forChild(storeRoutes)],
        exports: [router_1.RouterModule]
    })
], StoreRoutingModule);
exports.StoreRoutingModule = StoreRoutingModule;
//# sourceMappingURL=store-routing.module.js.map