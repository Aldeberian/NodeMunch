import Graph from '../functions/Graphs.ts';

const grap = new Graph();

function Play() {
    const handleButtonClick = () => {
        grap.afficherPos();
    }

    return (
        <h1 onClick={handleButtonClick}>Jouer</h1>
    )
}

export default Play;
