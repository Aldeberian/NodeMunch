const canvas = document.getElementById('myCanvas');
const context = canvas.getContext('2d');

//boutons
const un = document.getElementById('un');
const deux = document.getElementById('deux');
const trois = document.getElementById('trois');

const nodesUn = [
    { x: 200, y: 150 },
    { x: 300, y: 200 },
    { x: 250, y: 300 },
    { x: 400, y: 150 },
    { x: 450, y: 250 },
    { x: 350, y: 300 },
    { x: 500, y: 350 },
    { x: 550, y: 450 },
    { x: 450, y: 350 },
    { x: 350, y: 430 }
  ];
  
  const edgesUn = [
    { start: 0, end: 1 },
    { start: 1, end: 2 },
    { start: 2, end: 3 },
    { start: 3, end: 4 },
    { start: 4, end: 5 },
    { start: 5, end: 0 },
    { start: 5, end: 6 },
    { start: 6, end: 7 },
    { start: 7, end: 8 },
    { start: 8, end: 9 },
    { start: 9, end: 6 }
  ];

  const nodesDeux = [
    { x: 100, y: 200 },
    { x: 150, y: 250 },
    { x: 50, y: 300 },
    { x: 200, y: 300 },
    { x: 250, y: 400 },
    { x: 300, y: 350 },
    { x: 400, y: 250 },
    { x: 350, y: 200 },
    { x: 450, y: 150 },
    { x: 500, y: 250 }
  ];
  
  const edgesDeux = [
    { start: 0, end: 1 },
    { start: 1, end: 2 },
    { start: 2, end: 3 },
    { start: 3, end: 4 },
    { start: 4, end: 5 },
    { start: 5, end: 6 },
    { start: 6, end: 7 },
    { start: 7, end: 8 },
    { start: 8, end: 9 },
    { start: 9, end: 0 }
  ];

const nodesTrois = [
  { x: 100, y: 100 },
  { x: 200, y: 150 },
  { x: 300, y: 200 },
  { x: 400, y: 150 },
  { x: 450, y: 250 },
  { x: 350, y: 300 },
  { x: 500, y: 350 },
  { x: 550, y: 450 },
  { x: 450, y: 350 },
  { x: 350, y: 430 }
];

const edgesTrois = [
  { start: 0, end: 1 },
  { start: 1, end: 2 },
  { start: 2, end: 3 },
  { start: 3, end: 4 },
  { start: 4, end: 5 },
  { start: 5, end: 6 },
  { start: 6, end: 7 },
  { start: 7, end: 8 },
  { start: 8, end: 9 },
  { start: 9, end: 0 },
  { start: 1, end: 5 },
  { start: 2, end: 8 }
];


const nodeRadius = 10;

function reduce(nodeId)  {
  for(const edge of edgesUn) {
    if(edge.start > nodeId) {
      edge.start--;
    }
    if(edge.end > nodeId) {
      edge.end--;
    }
  }
}

function splicing(nodeId, premier) {
  console.log(nodeId, premier);

  nodesUn.splice(nodeId, 1);
  console.log('On splice node : ', nodesUn[nodeId], ' parce que lien avec ', nodeId);
  reduce(nodeId);

  for(let i = 0; i < edgesUn.length ; i++) {
    const edge = edgesUn[i];
    if(edge.start == nodeId) {
      edgesUn.splice(i, 1);
      console.log('On splice edge : ', edgesUn[i], ' parce que lien avec ', nodeId);
      if(premier == 0) {
        splicing(edge.end, 1);
      }
    }
    else if(edge.end == nodeId) {
      edgesUn.splice(i, 1);
      console.log('On splice edge : ', edgesUn[i], ' parce que lien avec ', nodeId);
      if(premier == 0) {
        splicing(edge.start, 1);
      }
    }
  }
}

function handleNodeClick(event) {
  const nodeId = event.target.id;  // Récupérer l'ID du nœud
  console.log('Node clicked:', nodeId);

  splicing(nodeId, 0);
  console.log('On splice node : ', nodeId, ' parce que lien avec ', nodeId);
  
  drawUn();
}

function drawNode(x, y, nodeId) {
  context.beginPath();
  context.arc(x, y, nodeRadius, 0, 2 * Math.PI);
  context.fillStyle = 'lightblue';
  context.fill();
  context.stroke();

  const node = document.createElement('div');
  node.id = nodeId;
  node.style.position = 'absolute';
  node.style.left = x - nodeRadius + 'px';
  node.style.top = y - nodeRadius + 'px';
  node.style.width = 2 * nodeRadius + 'px';
  node.style.height = 2 * nodeRadius + 'px';
  node.addEventListener('click', handleNodeClick);
  document.getElementById('canvas').appendChild(node);
}

function drawEdge(startNode, endNode) {
  context.beginPath();
  context.moveTo(startNode.x, startNode.y);
  context.lineTo(endNode.x, endNode.y);
  context.strokeStyle = 'black';
  context.lineWidth = 2;
  context.stroke();
}

function drawGraphUn() {
  for (let i = 0; i < edgesUn.length; i++) {
    drawEdge(nodesUn[edgesUn[i].start], nodesUn[edgesUn[i].end]);
  }

  for (let i = 0; i < nodesUn.length; i++) {
    drawNode(nodesUn[i].x, nodesUn[i].y, i);
  }
}

function drawGraphDeux() {
  for (const edge of edgesDeux) {
    drawEdge(nodesDeux[edge.start], nodesDeux[edge.end]);
  }

  for (let i = 0; i < nodesDeux.length; i++) {
    drawNode(nodesDeux[i].x, nodesDeux[i].y, i);
  }
}

function drawGraphTrois() {
  for (const edge of edgesTrois) {
    drawEdge(nodesTrois[edge.start], nodesTrois[edge.end]);
  }

  for (let i = 0; i < nodesTrois.length; i++) {
    drawNode(nodesTrois[i].x, nodesTrois[i].y, i);
  }
}

function drawUn() {
  context.clearRect(0, 0, canvas.width, canvas.height);
  un.style.backgroundColor = 'lightblue';
  deux.style.backgroundColor = 'white';
  trois.style.backgroundColor = 'white';
  drawGraphUn();
}

function drawDeux() {
  context.clearRect(0, 0, canvas.width, canvas.height);
  deux.style.backgroundColor = 'lightblue';
  un.style.backgroundColor = 'white';
  trois.style.backgroundColor = 'white';
  drawGraphDeux();
}

function drawTrois() {
  context.clearRect(0, 0, canvas.width, canvas.height);
  un.style.backgroundColor = 'white';
  deux.style.backgroundColor = 'white';
  trois.style.backgroundColor = 'lightblue';
  drawGraphTrois();
}
