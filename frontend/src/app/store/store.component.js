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
var StoreComponent = (function () {
    function StoreComponent(restangular) {
        this.restangular = restangular;
        this.jobOffers = [];
    }
    StoreComponent.prototype.ngOnInit = function () {
        var _this = this;
        // GET http://localhost:8000/api/
        this.restangular.one('joboffers').get().subscribe(function (response) {
            _this.jobOffers = response.data;
        });
    };
    return StoreComponent;
}());
StoreComponent = __decorate([
    core_1.Component({
        selector: 'store',
        templateUrl: './store.component.html',
        styleUrls: ['./store.component.css']
    }),
    __metadata("design:paramtypes", [ngx_restangular_1.Restangular])
], StoreComponent);
exports.StoreComponent = StoreComponent;
//# sourceMappingURL=store.component.js.map