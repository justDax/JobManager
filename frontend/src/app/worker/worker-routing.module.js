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
var worker_component_1 = require("./worker.component");
var workerRoutes = [
    { path: 'worker', component: worker_component_1.WorkerComponent }
];
var WorkerRoutingModule = (function () {
    function WorkerRoutingModule() {
    }
    return WorkerRoutingModule;
}());
WorkerRoutingModule = __decorate([
    core_1.NgModule({
        imports: [router_1.RouterModule.forChild(workerRoutes)],
        exports: [router_1.RouterModule]
    })
], WorkerRoutingModule);
exports.WorkerRoutingModule = WorkerRoutingModule;
//# sourceMappingURL=worker-routing.module.js.map