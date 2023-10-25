import Graph from "../functions/Graph";


interface eventOnClickProps {
    eventOnClick : (id : string, graph : Graph) => void;
}

const randColor = () =>  {
    return "#" + Math.floor(Math.random()*16777215).toString(16).padStart(6, '0').toUpperCase();
}

function drawNode(graph : Graph, {eventOnClick} : eventOnClickProps) {

    return graph.nodes.map((node, index) => (
        <circle
          key={index}
          cx={node.posX}
          cy={node.posY}
          r={2}
          stroke="black"
          strokeWidth={0.5}
          fill="red"
          id={node.id}
          onClick={() => eventOnClick(node.id, graph)}
        />
    ));
  }
  
function drawLink(graph: Graph) {

    return graph.links.map((link, index) => (
        <line
          key={index}
          x1={graph.findNodeById(link.id1)?.posX}
          y1={graph.findNodeById(link.id1)?.posY}
          x2={graph.findNodeById(link.id2)?.posX}
          y2={graph.findNodeById(link.id2)?.posY}
          stroke={randColor()}
          strokeWidth={0.5}
          id={link.id}
        />
    ));
}

export default function drawGraph(graph : Graph, {eventOnClick} : eventOnClickProps) {
    return (
        <svg id="svgContainer">
            {drawLink(graph)}
            {drawNode(graph, { eventOnClick: eventOnClick })}
        </svg>
    )
}
