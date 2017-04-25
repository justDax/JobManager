"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
Object.defineProperty(exports, "__esModule", { value: true });
var core_1 = require("@angular/core");
var platform_browser_1 = require("@angular/platform-browser");
var router_1 = require("@angular/router");
var store_routing_module_1 = require("./store/store-routing.module");
var worker_routing_module_1 = require("./worker/worker-routing.module");
var index_routing_module_1 = require("./index-routing.module");
var app_component_1 = require("./app.component");
var index_component_1 = require("./index.component");
var store_component_1 = require("./store/store.component");
var store_job_offer_component_1 = require("./store/job-offer/store.job-offer.component");
var worker_component_1 = require("./worker/worker.component");
var ngx_restangular_1 = require("ngx-restangular");
// quick homepage route
var appRoutes = [
    { path: '', redirectTo: '/index', pathMatch: 'full' }
];
// Function for settting the default restangular configuration
function RestangularConfigFactory(RestangularProvider) {
    // RestangularProvider.setDefaultHeaders({'Authorization': 'Bearer UDXPx-Xko0w4BRKajozCVy20X11MRZs1'});
    RestangularProvider.setBaseUrl('http://localhost:8000/api');
}
exports.RestangularConfigFactory = RestangularConfigFactory;
var AppModule = (function () {
    function AppModule() {
    }
    return AppModule;
}());
AppModule = __decorate([
    core_1.NgModule({
        imports: [
            platform_browser_1.BrowserModule,
            store_routing_module_1.StoreRoutingModule,
            worker_routing_module_1.WorkerRoutingModule,
            index_routing_module_1.IndexRoutingModule,
            // WorkerRoutingModule,
            router_1.RouterModule.forRoot(appRoutes),
            ngx_restangular_1.RestangularModule.forRoot(RestangularConfigFactory)
        ],
        declarations: [
            app_component_1.AppComponent,
            store_component_1.StoreComponent,
            store_job_offer_component_1.StoreJobOfferComponent,
            worker_component_1.WorkerComponent,
            index_component_1.IndexComponent
        ],
        bootstrap: [app_component_1.AppComponent]
    })
], AppModule);
exports.AppModule = AppModule;
//# sourceMappingURL=app.module.js.map