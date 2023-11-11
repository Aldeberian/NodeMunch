<?php

namespace model;

use model\metier\Connection;
use model\gateways\GatewayUser;

class UserModel
{
    /**
     *  Gets all users from the database via the GatewayUser.
     */
    public static function getAllUsers() : array {

        $gatewayUser = new GatewayUser(new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86"));

        return $gatewayUser->getDataUser();
    }

    /**
     *  Gets a specific user by its id via the GatewayUser.
     */
    public static function getUserWithId($userId) : array {

        $gatewayUser = new GatewayUser(new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86"));

        return $gatewayUser->readUser($userId);
    }

    /**
     *  Sets 'isBan' field in '1' --> "yes" via the gateways User.
     */
    public static function banUser($userId) {

        $gatewayUser = new GatewayUser(new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86"));

        $gatewayUser->updateUserBan($userId);
    }

    /**
     *  Sets 'isBan' field in '0' --> "no" via the gateways User.
     */
    public static function unBanUser($userId) {

        $gatewayUser = new GatewayUser(new Connection("mysql:host=londres.uca.local;dbname=dbbabrunet", "babrunet", "kalou86"));

        $gatewayUser->updateUserDeBan($userId);
    }
}