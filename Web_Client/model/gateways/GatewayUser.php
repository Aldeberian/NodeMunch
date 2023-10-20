<?php

require_once('../classes/Connection.php');

use model\Connection;


class GatewayUser
{

    public Connection $connection;


    public function __construct(Connection $connection) {

        $this->connection = $connection;
    }


    public function createUser() {



    }

    public function readUser(int $idUser) {


    }

    /**
     * @param int $idUser The user to be updated by the admin.
     */
    public function updateUser(int $idUser) {

    }

    /**
     * @param int $idUser The user to delete in the list.
     */
    public function deleteUser(int $idUser) {

    }

    /**
     * @param int $idGraph The id of the graph that is going to be saved.
     */
    public function saveGraph(int $idGraph) : void {

    }

    /**
     * @param int $idGraph The id of the graph that will be liked by the user.
     */
    public function likeGraph(int $idGraph) : void {

    }

}