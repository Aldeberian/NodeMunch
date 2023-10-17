import * as G from '../functions/Graphs.ts';

const grap = new G.Graph();
const node = new G.NodeP(4, 1, 3);
const link = new G.Link(1, 4)

function Play() {
    const handleButtonClick = () => {
        grap.printPosition();
        grap.addNode(node);
        grap.printPosition();
        grap.printLinks();
        grap.addLink(link);
        grap.printLinks();
    }

    return (
        <h1 onClick={handleButtonClick}>Jouer</h1>
    )
}

export default Play;
