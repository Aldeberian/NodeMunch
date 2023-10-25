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




    public function insertNodeIntoDatabase(int $id, int $posX, int $posY)
    {
        $query = "INSERT INTO Node VALUES(:id, :pX, :pY)";

        $this->connection->executeQuery($query, array(
            ':id'=> array($id, \PDO::PARAM_INT),
            ':pX'=> array($posX, \PDO::PARAM_INT),
            ':pY'=> array($pY, \PDO::PARAM_INT)));
    }


    /**
     * Insert a link in the database, it needs 2 nodes as parameters, the id is auto-generated and auto-incremented
     * @param int $nodeA
     * @param int $nodeB
     */
    public function insertEdgeIntoDatabase(int $nodeA, int $nodeB) 
    {
        $query = "INSERT INTO Edge VALUES (:nodeA, :nodeB)";

        try {

            $this->connection->executeQuery($query, array(':nodeA' => array($nodeA, \PDO::PARAM_INT), ':nodeB' => array($nodeB, \PDO::PARAM_INT)));
        }

        catch (\PDOException $e) {

            echo $e->getMessage();

        }

        echo 'insertion reussie';
    }

    /**
     * !Really important method!
     * Get all the links from the database as an array
     * @return array
     */
    public function getDataLink() : array 
    {
        $query = "SELECT * FROM Edge";

        $this->connection->executeQuery($query, array());

        return $this->connection->getResults();
    }

}