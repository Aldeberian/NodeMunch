import "typescript";
import Link from "./Link";
import NodeP from "./Node";
import * as Loading from "./Loading";

export default class Graph {
  //Un ide malicieux pourrait souligner nodes et links en rouge sous pretexte qu'ils ne sont pas initialisés dans
  //le constructeur. Cependant, ils sont initialisés dans le fichier Loading.ts, donc échec et mat monsieur l'ide
  nodes: Array<NodeP>;
  links: Array<Link>;

  //Default constructor generate a graph with a default values table
  //Else it starts an empty graph and you then have to fill it
  constructor(type = "auto") {
    if (type == "auto") {
      Loading.loadingDefault(this);
    } else {
      Loading.loadingCustom(this);
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

  //Todo Handle error messages in error cases
  addNode(node: NodeP) {
    if (this.nodes.find((item) => item.id == node.id)) {
      console.log(
        "ERROR : This id already exists in the graph. The node : " +
          node.printCoordinates() +
          " was not added"
      );
    } else if (
      this.nodes.find((item) => item.posX == node.posX) &&
      this.nodes.find((item) => item.posY == node.posY)
    ) {
      console.log(
        "ERROR : A node is the graph already got those coordinates. The node : " +
          node.printCoordinates() +
          " was not added"
      );
    } else {
      this.nodes.push(node);
    }
  }

  addLink(link: Link) {
    if (this.nodes.every((element) => element.id != link.id1)) {
      console.log(
        "ERROR : The node " + link.id1 + " does not exist in the graph"
      );
    } else if (this.nodes.every((element) => element.id != link.id2)) {
      console.log(
        "ERROR : The node " + link.id2 + " does not exist in the graph"
      );
    } else if (
      this.links.find((item) => item.id1 == link.id1 && item.id2 == link.id2) ||
      this.links.find((item) => item.id1 == link.id2 && item.id2 == link.id1)
    ) {
      console.log(
        "ERROR : A link from " +
          link.id1 +
          " to " +
          link.id2 +
          " already exists. The link was not added"
      );
    } else {
      this.links.push(link);
    }
  }

  removeNode(nodeId: string) {
    this.nodes = this.nodes.filter((item) => item.id != nodeId);
    this.links = this.links.filter(
      (item) => item.id1 != nodeId && item.id2 != nodeId
    );
  }

  removeLink(linkId1 : string, linkId2 : string) {
    this.links = this.links.filter(
      (item) => item.id1 != linkId1 || item.id2 != linkId2
    );
    this.links = this.links.filter(
      (item) => item.id1 != linkId2 || item.id2 != linkId1
    );
  }

  findConnections(nodeId: string): string[] {
    let connections: Array<string> = [];
    this.links.forEach((link) => {
      if (link.id1 == nodeId) {
        connections.push(link.id2);
      } else if (link.id2 == nodeId) {
        connections.push(link.id1);
      }
    });
    return connections;
  }

  findNodeById(nodeId: string) {
    return this.nodes.find((item) => item.id == nodeId);
  }
}
