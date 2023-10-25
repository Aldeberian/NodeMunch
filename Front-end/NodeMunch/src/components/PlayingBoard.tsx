import Graph from "../functions/Graph";
import drawGraph from "../functions/DrawingGraph";
import "./PlayingBoard.css";

interface GraphProps {
  graph: Graph;
}

const nodeClicked = (id: string, graph : Graph) => {
  let idToDelete : string[] = graph.findConnections(id);

  idToDelete.push(id);

  idToDelete.forEach((id) => {
    const element = document.getElementById(id);
    element?.remove();
  });

  idToDelete.forEach((id) => {
    let linkToDelete : string[] = graph.findLinksToNode(id);

    linkToDelete.forEach((link) => {
      console.log("link : id1 : " + link)
      const element = document.getElementById(link);
      element?.remove();
    });
  })
}

export default function PlayingBoard({ graph }: GraphProps) {
  return (
    <div id="playingBoard">
        <svg viewBox="0 0 100 100">
            {drawGraph(graph, { eventOnClick: nodeClicked })}
        </svg>
    </div>
  );
}
