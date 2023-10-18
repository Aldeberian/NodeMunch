<?php


require('Connection.php');
require('GatewayGraph.php');
require('GatewayLink.php');

try {

    $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
    echo "Connection à la base dbbabrunet";

} catch (PDOException $e) {

    echo "PDOException";
}


//==== BIEN FAIRE LES TRY/CATCH ICI, LORS DE L'APPEL DES FONCTIONS ====


$gatewayGraph = new GatewayGraph($connection);
$gatewayLink = new GatewayLink($connection);

//Ici les methodes de GatewayGraph ne fonctionneront pas tant que la table Graphe n'existe pas dans la base de données

//$gatewayGraph->createGraph(24, 9);
//$gatewayGraph->readGraph();
//$gatewayGraph->updateGraph(1, 'nodes', 7);
//$gatewayGraph->deleteGraph(9);

//La table Link est définie donc l'insertion est possible, il suffit de décommenter la ligne ci-dessous et de paramètrer un couple qui n'existe pas encore dans la base de données

//$gatewayLink->createLink(1, 3);