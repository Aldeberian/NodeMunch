import Graph from '../functions/Graphs.ts'

let grap = new Graph("auto");

function Play() {
    return (
        <h1 onClick={grap.afficherG}>Jouer</h1>
    )
}

export default Play