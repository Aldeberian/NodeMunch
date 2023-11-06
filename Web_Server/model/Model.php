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
     *  Gets all users from the database via the GatewayUser.
     */
    public static function getAllUsers() : array {

        $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");

        $gatewayUser = new GatewayUser($connection);

        $res = $gatewayUser->getDataUser();

        if($res[1] != "") {
            throw new \Exception($res[1]);
        } else {
            return $res[0];
        }
    }

    /**
     *  Gets all graphs from the database via the GatewayGraph.
     */
    public static function getAllGraphs() : array {

        $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");

        $gatewayGraph = new GatewayGraph($connection);

        $res = $gatewayGraph->getDataGraph();

        if($res[1] != "") {
            throw new \Exception($res[1]);
        } else {
            return $res[0];
        }
    }

    /**
     *  Gets a specific user by its id via the GatewayUser.
     */
    public static function getUserWithId($userId) : array {

        $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");

        $gatewayUser = new GatewayUser($connection);

        $res = $gatewayUser->readUser($userId);

        if($res[1] != "") {
            throw new \Exception($res[1]);
        } else {
            return $res[0];
        }

    }

    /**
     *  Sets 'isBan' field in '1' --> "yes" via the gateways User.
     */
    public static function banUser($userId) {

        $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");

        $gatewayUser = new GatewayUser($connection);

        $res = $gatewayUser->updateUserBan($userId);

        if($res!=""){
            throw new \Exception($res);
        }
    }

    /**
     *  Sets 'isBan' field in '0' --> "no" via the gateways User.
     */
    public static function unBanUser($userId) {

        $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");

        $gatewayUser = new GatewayUser($connection);

        $res = $gatewayUser->updateUserDeBan($userId);

        if($res!=""){
            throw new \Exception($res);
        }
    }

    public static function deleteGraphById($graphId){

        $connection = new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86");

        $gatewayGraph = new GatewayGraph($connection);

        $res = $gatewayGraph->deleteGraph($graphId);

        if($res!=""){
            throw new \Exception($res);
        }
    }
}


//var_dump(Model::getAllUsers());
//model::getUserWithId(2);
//Model::banUser(2);
//Model::unBanUser(2);
