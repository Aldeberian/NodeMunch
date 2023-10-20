<?php

require_once('../classes/Connection.php');

use model\Connection;

class GatewayLink
{
    public Connection $connection;

    public function __construct(Connection $connection) {

        $this->connection = $connection;
    }

    public function createLink(int $nodeA, int $nodeB) {


        $query = "INSERT INTO Link VALUES (:nodeA, :nodeB)";

        try {

            $this->connection->executeQuery($query, array(':nodeA' => array($nodeA, PDO::PARAM_INT), ':nodeB' => array($nodeB, PDO::PARAM_INT)));
        }

        catch (PDOException $e) {

            echo $e->getMessage();

        }

        echo 'insertion reussie';
    }

}