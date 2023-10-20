<?php

namespace model;

use GatewayGraph;
use GatewayUser;
use GatewayLink;
use model\Connection;


class model
{
    /*public static function getAllDataFromGateways() {

        try {

            $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
            echo "Connection à la base dbbabrunet";

        } catch (\PDOException $e) {

            echo "PDOException";
        }


        $gatewayGraph = new GatewayGraph($connection);
        $gatewayLink = new GatewayLink($connection);
        $gatewayUser = new GatewayUser($connection);

        $graphs = $gatewayGraph->getDataGraph();
        $users = $gatewayUser->getDataUser();
        $links = $gatewayLink->getDataLink();

        $data = ['Graph' => $graphs, 'User' => $links, 'User' => $users];

        return $data;

    }*/


}
