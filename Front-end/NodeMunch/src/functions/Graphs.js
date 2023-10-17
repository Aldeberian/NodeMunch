"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
require("../../node_modules/typescript");
var NodeP = /** @class */ (function () {
    function NodeP(posX, posY) {
        this.posX = posX;
        this.posY = posY;
    }
    NodeP.prototype.afficher = function () {
        console.log(this.posX, " test ", this.posY);
    };
    return NodeP;
}());
var Graph = /** @class */ (function () {
    function Graph(type) {
        if (type === void 0) { type = "auto"; }
        if (type == "auto") {
            this.nodes = [new NodeP(2, 1), new NodeP(2, 1), new NodeP(3, 1)];
        }
        else {
            this.nodes = [];
        }
    }
    Graph.prototype.afficherG = function () {
        this.nodes.forEach(function (node) { return console.log(node.afficher); });
    };
    return Graph;
}());
var grap = new Graph("auto");
grap.afficherG();
