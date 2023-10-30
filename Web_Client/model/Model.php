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
     *  Gets a specific user by its id via the GatewayUser.
     */
    public static function getUserWithId($userId) : array {

        $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
        echo "Connection à la base dbbabrunet";


        $gatewayUser = new GatewayUser($connection);

        return $gatewayUser->readUser($userId);
    }

    /**
     *  Sets 'isBan' field in '1' --> "yes" via the gateways User.
     */
    public static function banUser($userId) {

        $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
        echo "Connection à la base dbbabrunet";


        $gatewayUser = new GatewayUser($connection);

        $gatewayUser->updateUserBan($userId);
    }

    /**
     *  Sets 'isBan' field in '0' --> "no" via the gateways User.
     */
    public static function unBanUser($userId) {

        $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");
        echo "Connection à la base dbbabrunet";


        $gatewayUser = new GatewayUser($connection);

        $gatewayUser->updateUserDeBan($userId);
    }
}

//model::getUserWithId(2);
//Model::banUser(2);
//Model::unBanUser(2);