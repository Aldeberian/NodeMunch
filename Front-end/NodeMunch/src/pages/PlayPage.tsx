import Graph from '../functions/Graphs.ts';

const grap = new Graph();

function Play() {
    const handleButtonClick = () => {
        grap.printPosition();
        grap.printLinks();
    }

    return (
        <h1 onClick={handleButtonClick}>Jouer</h1>
    )
}

export default Play;
