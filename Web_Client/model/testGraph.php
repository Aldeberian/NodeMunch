<?php

require ('Connection.php');
require ('GatewayGraph.php');


try {

    $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
    echo "Connection à la base dbbabrunet";
}

catch (PDOException $e) {

    echo "PDOException";
}

$gatewayGraph = new GatewayGraph($connection);


//$gatewayGraph->createGraph(24, 9);
//$gatewayGraph->readGraph();
//$gatewayGraph->updateGraph(1, 'nodes', 10);
//$gatewayGraph->deleteGraph(9);