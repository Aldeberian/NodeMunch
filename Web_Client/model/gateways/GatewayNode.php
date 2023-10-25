<?php

namespace model\gateways;

use model\classes\Connection;

/**
 * Class that manages the acces to links using SQL queries
 */
class GatewayNode
{
    public Connection $connection;

    /**
     * This gateway reach the link class in the database, it needs to get a connection (to the database) as parameter
     * @param Connection $connection
     */
    public function __construct(Connection $connection) 
    {
        $this->connection = $connection;
    }


    /**
     * This function insert a node into the database 
     */
    public function insertNodeIntoDatabase(int $id, int $posX, int $posY)
    {
        $query = "INSERT INTO Node VALUES(:id, :pX, :pY)";

        try {
        $this->connection->executeQuery($query, array(
            ':id'=> array($id, \PDO::PARAM_INT),
            ':pX'=> array($posX, \PDO::PARAM_INT),
            ':pY'=> array($posY, \PDO::PARAM_INT)));
        }
        catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }


    public function insertNodeIntoCompoNode(int $idGraph, int $idNode)
    {
        $query = "INSERT INTO CompositionNode VALUES (:idG, :idN)";

        try {
        $this->connection->executeQuery($query, array(
            ':idG'=> array($idGraph, \PDO::PARAM_INT),
            ':idN'=> array($idNode, \PDO::PARAM_INT)));
        }
        catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }


   
}