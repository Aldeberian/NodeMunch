import '../../node_modules/typescript'

//Named NodeP because you can't name something Node in typescript, it's taken already
class NodeP{
    id : number;
    posX : number;
    posY : number;

    constructor(id : number, posX : number, posY : number){
        this.id = id;
        this.posX = posX;
        this.posY = posY;
    }

    printCoordinates(): string{
        return 'Node : ' + this.id + 'Position X : ' + this.posX + ', Position Y : ' + this.posY;
    }
}

//Table of nodes to load by default in a graph
let autoTabNode : Array<NodeP> = [
    new NodeP(1, 1, 3),
    new NodeP(2, 7, 4),
    new NodeP(3, 8, 9)
];

//Takes two Ids of node
class Link {
    id1 : number;
    id2 : number;
    
    constructor(id1 : number, id2 : number) {
        this.id1 = id1;
        this.id2 = id2;
    }

    printLink() : string {
        return 'Link from the node ' + this.id1 + ' to the node ' + this.id2 + '. ';
    }
}

//Table of links to load by default in a graph
let autoTabLink : Array<Link> = [
    new Link(1, 2),
    new Link(2, 3),
    new Link(1, 3)
];

export default class Graph{
    nodes : Array<NodeP>;
    links : Array<Link>;

    //Default constructor generate a graph with a default values table
    //Else it starts an empty graph and you then have to fill it
    constructor(type="auto"){
        if(type=="auto") {
            this.nodes = autoTabNode;
            this.links = autoTabLink;
        } else {
            this.nodes = [];
            this.links = [];
        }
    }

    //Print the coordinates of each nodes of the graph
    printPosition() {
        this.nodes.forEach((node) => {
            console.log(node.printCoordinates());
        });
    }

    //Print the links in the graph
    printLinks() {
        this.links.forEach((link) => {
            console.log(link.printLink());
        });
    }
}