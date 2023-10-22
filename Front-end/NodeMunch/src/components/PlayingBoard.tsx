import Graph from "../functions/Graph";
import Node from "../functions/Node";
import Link from "../functions/Link";
import { useId } from "react";
import "./PlayingBoard.css";

interface GraphProps {
  graph: Graph;
}

const randColor = () =>  {
    return "#" + Math.floor(Math.random()*16777215).toString(16).padStart(6, '0').toUpperCase();
}

function drawNode(nodes: Array<Node>) {
  return nodes.map((node, index) => (
      <circle
        key={index}
        cx={node.posX}
        cy={node.posY}
        r={2}
        stroke="black"
        strokeWidth={0.5}
        fill="red"
        id={node.id}
      />
  ));
}

function drawLink(links: Array<Link>, graph: Graph) {
  return links.map((link) => (
      <line
        x1={graph.findNodeById(link.id1)?.posX}
        y1={graph.findNodeById(link.id1)?.posY}
        x2={graph.findNodeById(link.id2)?.posX}
        y2={graph.findNodeById(link.id2)?.posY}
        stroke={randColor()}
        strokeWidth={0.5}
      />
  ));
}

export default function PlayingBoard({ graph }: GraphProps) {
  return (
    <div id="playingBoard">
        <svg viewBox="0 0 100 100">
            {drawLink(graph.links, graph)}
            {drawNode(graph.nodes)}
        </svg>
    </div>
  );
}
