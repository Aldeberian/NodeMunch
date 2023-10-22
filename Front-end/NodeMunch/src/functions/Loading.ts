import Graph from "./Graph";
import NodeP from "./Node";
import Link from "./Link";

export function loadingDefault(graph: Graph) {
  //Table of nodes to load by default in a graph
  let autoTabNode: Array<NodeP> = [
    new NodeP(1, 1, 3),
    new NodeP(2, 7, 4),
    new NodeP(3, 8, 9),
  ];

  //Table of links to load by default in a graph
  let autoTabLink: Array<Link> = [
    new Link(1, 2),
    new Link(3, 1)
  ];

  graph.nodes = autoTabNode;
  graph.links = autoTabLink;
}

export function loadingCustom(graph: Graph) {
  graph.nodes = [];
  graph.links = [];
}
