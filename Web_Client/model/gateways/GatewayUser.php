<?php

namespace model\gateways;

use model\classes\Connection;

/**
 * Class that manages the acces to users using SQL queries
 */
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

    /**
     * !Really important method!
     * Get all the users from the database as an array
     * @return array
     */
    public function getDataUser() : array {

        $query = "SELECT * FROM User";

        $this->connection->executeQuery($query, array());

        return $this->connection->getResults();
    }

}