import Graph from "./Graph";
import NodeP from "./Node";
import Link from "./Link";

export function loadingDefault(graph: Graph) {
  //Table of nodes to load by default in a graph
  //2 - 100 les extrémités x de la div avant qu'une node sorte de la zone
  //2 - 49 en y
  let autoTabNode: Array<NodeP> = [
    new NodeP("1", 306.234567, 117.123456),
    new NodeP("2", 45.987654, 21.543210),
    new NodeP("3", 69.876543, 12.345678),
    new NodeP("4", 33.123456, 36.987654),
    new NodeP("5", 87.432109, 42.765432),
    new NodeP("6", 55.876543, 19.234567),
    new NodeP("7", 76.987654, 30.987654),
    // Ajoutez d'autres nœuds selon vos besoins
];

let autoTabLink: Array<Link> = [
    new Link("1l", "1", "2"),
    new Link("2l", "1", "3"),
    new Link("3l", "2", "3"),
    new Link("4l", "4", "5"),
    new Link("5l", "5", "6"),
    new Link("6l", "6", "7"),
    // Ajoutez d'autres liens pour connecter les nœuds
];

  graph.nodes = autoTabNode;
  graph.links = autoTabLink;
}

export function loadingCustom(graph: Graph) {
  graph.nodes = [];
  graph.links = [];
}
