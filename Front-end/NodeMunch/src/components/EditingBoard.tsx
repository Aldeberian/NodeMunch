import Graph from '../functions/Graph';
import Link from '../functions/Link';
import NodeP from '../functions/Node';

import './EditingBoard.css'

//Component that displays the graph during the game
let grap = new Graph("auto");

interface boardStatus {
    status : boolean;
}

export default function EditBoard() {
    return (
        <div id='editingBoard'>
            <h1>Edit Board</h1>
        </div>
    )
}