import Graph from '../functions/Graph';
import Link from '../functions/Link';
import NodeP from '../functions/Node';
import drawGraph from '../functions/DrawingGraph';
import React, { useState, MouseEvent } from 'react';

import './EditingBoard.css'

let graph = new Graph("auto");

const nodeClicked = () => {
    console.log("test")
}

export default function EditBoard() {
    const [position, setPosition] = useState<{ x: number; y: number }>({ x: 0, y: 0 });

    const [idCustom, setId] = useState<string>("0");

    const [graphContent, setGraphContent] = useState<JSX.Element | null>(null);
    
    const handleMouseMove = (e: React.MouseEvent) => {
        const editBoard = document.getElementById("editingBoard");

        if(!editBoard) return;
        const x = e.clientX - editBoard.getBoundingClientRect().left;
        const y = e.clientY - editBoard.getBoundingClientRect().top;
        setPosition({ x, y });
    };

    const boardClicked = (e: MouseEvent) => {
        // Call handleMouseMove to get the current mouse position
        console.log(position.x, position.y);
        handleMouseMove(e);
        console.log(position.x, position.y);

        let newNode = new NodeP(idCustom, position.x, position.y);
    
        setId((Number(idCustom) + 1).toString());
    
        graph.addNode(newNode);
        console.log(graph)

        setGraphContent(drawGraph(graph, { eventOnClick: nodeClicked }));
    };
    
    return (
        <div id="editingBoard" onMouseMove={handleMouseMove} onClick={boardClicked}>
            {graphContent}
        </div>
    )
}