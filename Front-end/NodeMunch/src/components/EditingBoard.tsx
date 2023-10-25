import Graph from '../functions/Graph';
import Link from '../functions/Link';
import NodeP from '../functions/Node';
import drawGraph from '../functions/DrawingGraph';
import React, { useState } from 'react';

import './EditingBoard.css'

let graph = new Graph("custom");

const nodeClicked = () => {
    console.log("test")
}

export default function EditBoard() {
    const [position, setPosition] = useState<{ x: number; y: number }>({ x: 0, y: 0 });

    const [idCustom, setId] = useState<string>("0");
    
    const handleMouseMove = (e: React.MouseEvent<HTMLDivElement>) => {
        const editBoard = document.getElementById("editingBoard");

        if(!editBoard) return;
        const x = e.clientX - editBoard.getBoundingClientRect().left;
        const y = e.clientY - editBoard.getBoundingClientRect().top;
        setPosition({ x, y });
    };

    const boardClicked : React.FC = () =>  {
    
        let newNode = new NodeP( idCustom, position.x, position.y);

        setId((Number(idCustom)+1).toString());
    
        graph.addNode(newNode);

        return (
            <svg height="100%" width="100%">        
            <circle
            cx={position.x}
            cy={position.y}
            r={2}
            fill="red"
            /></svg>
        )

        // console.log(graph);
    
        // return ( drawGraph(graph, { eventOnClick: nodeClicked }) )
    };

    return (
      <div id="editingBoard" onMouseMove={handleMouseMove} onClick={boardClicked}>

      </div>
    )
}