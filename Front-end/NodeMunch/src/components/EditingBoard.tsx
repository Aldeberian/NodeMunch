import Graph from '../functions/Graph';
import Link from '../functions/Link';
import NodeP from '../functions/Node';
import drawGraph from '../functions/DrawingGraph';
import React, { useState, MouseEvent } from 'react';

import './EditingBoard.css'

let graph = new Graph("custom");

export default function EditBoard() {
    const [position, setPosition] = useState<{ x: number; y: number }>({ x: 0, y: 0 });

    const [idCustom, setId] = useState<string>("0");

    const [graphContent, setGraphContent] = useState<JSX.Element | null>(null);

    const [isSecondClic, setSecondClic] = useState<{ state : boolean; idNode : string}>({ state : false, idNode : " "});
    
    const handleMouseMove = (e: React.MouseEvent) => {
        const editBoard = document.getElementById("editingBoard");

        if(!editBoard) return;
        const x = e.clientX / 12.6 - (editBoard.getBoundingClientRect().left / 12.6);
        const y = e.clientY / 12.6 - (editBoard.getBoundingClientRect().top / 12.6);
        setPosition({ x, y });
    };

    const nodeClicked = (id : string, graph : Graph) => {
        console.log(id);
        if(isSecondClic.state) {
            let newLink = new Link(idCustom+"l", id, isSecondClic.idNode);

            setId((Number(idCustom) + 1).toString());

            graph.addLink(newLink);

            setGraphContent(drawGraph(graph, {eventOnClick : nodeClicked }));

            setSecondClic({ state : false , idNode : " "});
        }
        else {
            setSecondClic({ state : true , idNode : id });
        }
    }

    const boardClicked = (e: MouseEvent) => {

        // Call handleMouseMove to get the current mouse position
        handleMouseMove(e);

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