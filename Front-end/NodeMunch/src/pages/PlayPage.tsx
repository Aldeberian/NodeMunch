import { Connect } from 'vite';
import Graph from '../functions/Graph';
import Link from '../functions/Link';
import NodeP from '../functions/Node';
import 'typescript';

const grap = new Graph();
const node = new NodeP(4, 10, 3);
const link = new Link(1, 3);

function Play() {
    const handleButtonClick = () => {
        grap.printLinks();
        grap.addLink(link);
        console.log("add");
        grap.printLinks();
        let connectionsId : number[] = grap.findConnections(2);
        for (let id of connectionsId) {
            grap.removeNode(id);
        }
        grap.removeNode(2);
        console.log("affichage des positions :");
        grap.printPosition();
        console.log("affichage des liens : ");
        grap.printLinks();
    }

    return (
        <h1 onClick={handleButtonClick}>Jouer</h1>
    )
}

export default Play;
