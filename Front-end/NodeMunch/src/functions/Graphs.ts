import '../../node_modules/typescript'

class NodeP{
    posX : number = 0;
    posY : number;
    constructor(posX : number, posY : number){
        this.posX = posX;
        this.posY = posY;
    }

    afficher(): string{
        return this.posX.toString();
    }
}

export default class Graph{
    nodes : Array<NodeP>;

    constructor(type="auto"){
        if(type=="auto") {
            this.nodes = [new NodeP(2, 1),new NodeP(2, 7), new NodeP(3, 1)];
        } else {
            this.nodes = [];
        }
    }

    afficherPos() {
        this.nodes.forEach((node, index) => {
            console.log(`NodeP ${index + 1}: posX = ${node.posX} posY = ${node.posY}`);
        });
    }
}