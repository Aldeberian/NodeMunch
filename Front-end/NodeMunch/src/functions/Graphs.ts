import '../../node_modules/typescript'

class NodeP{
    posX : number;
    posY : number;
    constructor(posX : number, posY : number){
        this.posX = posX;
        this.posY = posY;
    }

    afficher(): void{
        console.log(this.posX, " test ", this.posY)
    }
}

export default class Graph{
    nodes : Array<NodeP>;

    constructor(type="auto"){
        if(type=="auto") {
            this.nodes = [new NodeP(2, 1),new NodeP(2, 1), new NodeP(3, 1)];
        } else {
            this.nodes = [];
        }
    }

    afficherG(): void {
        this.nodes.forEach((node) => console.log(node.afficher));
    }

    afficherTest() : void {
        console.log("test");
    }
}