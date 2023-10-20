<?php

namespace model;

use model\classes\Connection;
use model\gateways\GatewayGraph;

require_once ('classes/Connection.php');
require ('gateways/GatewayGraph.php');


class model
{
    public static function getAllDataFromGateways() {

        try {

            $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
            echo "Connection à la base dbbabrunet";

        } catch (\PDOException $e) {

            echo "PDOException";
        }


        $gatewayGraph = new GatewayGraph($connection);
        //$gatewayLink = new GatewayLink($connection);
        //$gatewayUser = new GatewayUser($connection);

        $gatewayGraph->getDataGraph();
        //$graphs = $gatewayGraph->getDataGraph();
        //$users = $gatewayUser->getDataUser();
        //$links = $gatewayLink->getDataLink();

        //$data = ['Graph' => $graphs, 'User' => $links, 'User' => $users];

        //return $data;

    }


}

model::getAllDataFromGateways();