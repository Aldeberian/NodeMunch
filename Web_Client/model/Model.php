<?php

namespace model;

use model\classes\Connection;
use model\gateways\GatewayGraph;
use model\gateways\GatewayUser;
use model\gateways\GatewayLink;

require_once ('classes/Connection.php');
require ('gateways/GatewayGraph.php');
require ('gateways/GatewayUser.php');
//require ('gateways/GatewayLink.php');


class Model
{
    /**
     * !Really important method!
     *  Primary function that get all the data from different gateways and save it in $data then return it.
     */
    public static function getAllDataFromGateways() : array{

        try {

            $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
            echo "Connection à la base dbbabrunet";

        } catch (\PDOException $e) {

            echo "PDOException";
        }

        $gatewayGraph = new GatewayGraph($connection); //l'IDE râle car peut-être pas définie, raison : instanciation dans un try and catch, il aime pas
        //$gatewayLink = new GatewayLink($connection);
        $gatewayUser = new GatewayUser($connection);

        $graphs = $gatewayGraph->getDataGraph(); //Pour chaque Gateway, on require son code et on use. Avec l'autoloading psr4 il y aura plus besoin.
        $users = $gatewayUser->getDataUser();
        //$links = $gatewayLink->getDataLink();

        $data = ['Graph' => $graphs, /*'Link' => $links,*/'users' => $users];

        return $data;

    }

    public static  function getDataGraphsFromGateways() : array {

        try {

            $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
            echo "Connection à la base dbbabrunet";

        } catch (\PDOException $e) {

            echo "PDOException";
        }

        $gatewayGraph = new GatewayGraph($connection);

        $data = $gatewayGraph->getDataGraph(); //Pour chaque Gateway, on require son code et on use. Avec l'autoloading psr4 il y aura plus besoin.

        var_dump($data);

        return $data;
    }

    public static function getDataUsersFromGateways() : array {

        try {

            $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
            echo "Connection à la base dbbabrunet";

        } catch (\PDOException $e) {

            echo "PDOException";
        }

        $gatewayUser = new GatewayUser($connection);

        $data = $gatewayUser->getDataUser();

        return $data;
    }


}


/*model::getAllDataFromGateways();
model::getDataGraphsFromGateways();
model::getDataUsersFromGateways();*/