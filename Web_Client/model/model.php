<?php

namespace model;

use model\classes\Connection;
use model\gateways\GatewayGraph;
use model\gateways\GatewayUser;
use model\gateways\GatewayLink;

require_once ('classes/Connection.php');
require ('gateways/GatewayGraph.php');
require ('gateways/GatewayUser.php');
require ('gateways/GatewayLink.php');


class model
{
    /**
     * !Really important method!
     *  Primary function that get all the data from different gateways and save it in $data then return it.
     */
    public static function getAllDataFromGateways() {

        try {

            $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
            echo "Connection à la base dbbabrunet";

        } catch (\PDOException $e) {

            echo "PDOException";
        }


        $gatewayGraph = new GatewayGraph($connection); //l'IDE râle car peut-être pas définie, raison : instanciation dans un try and catch, il aime pas
        $gatewayLink = new GatewayLink($connection);
        $gatewayUser = new GatewayUser($connection);

        $graphs = $gatewayGraph->getDataGraph(); //Pour chaque Gateway, on require son code et on use. Avec l'autoloading psr4 il y aura plus besoin.
        $users = $gatewayUser->getDataUser();
        $links = $gatewayLink->getDataLink();

        $data = ['Graph' => $graphs, 'Link' => $links, 'User' => $users];

        var_dump($data);

        //return $data; //La fonction sera appelée et à terme devra retourner la $data, appelée dans un controlleur

    }


}

//model::getAllDataFromGateways();