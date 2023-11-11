<?php

namespace model;

use model\metier\Connection;
use model\gateways\GatewayGraph;

class GraphModel
{

    /**
     *  Gets all graphs from the database via the GatewayGraph.
     */
    public static function getAllGraphs() : array {

        $gatewayGraph = new GatewayGraph(new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86"));

        return $gatewayGraph->getDataGraph();
    }


    public static function deleteGraphById($graphId){

        $gatewayGraph = new GatewayGraph(new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86"));

        $gatewayGraph->deleteGraph($graphId);
    }
}