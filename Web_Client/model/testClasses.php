<?php


use graph\Graph;

require('classes/Connection.php');
require('gateways/GatewayGraph.php');
require('gateways/GatewayLink.php');

try {

    $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
    echo "Connection à la base dbbabrunet";

} catch (PDOException $e) {

    echo "PDOException";
}

$graph = new Graph(1);
$graph2 = new Graph(2, "Nice graph");
$graph3 = new Graph(3, "Nice graph", 12345654321);

echo $graph;
echo $graph2;
echo $graph3;


//==== BIEN FAIRE LES TRY/CATCH ICI, LORS DE L'APPEL DES FONCTIONS ====


//$gatewayGraph = new GatewayGraph($connection);
//$gatewayLink = new GatewayLink($connection);

//Ici les methodes de GatewayGraph ne fonctionneront pas tant que la table Graphe n'existe pas dans la base de données

//$gatewayGraph->createGraph(24, 9);
//$gatewayGraph->readGraph();
//$gatewayGraph->updateGraph(1, 'nodes', 7);
//$gatewayGraph->deleteGraph(9);

//La table Link est définie donc l'insertion est possible, il suffit de décommenter la ligne ci-dessous et de paramètrer un couple qui n'existe pas encore dans la base de données

//$gatewayLink->createLink(1, 3);