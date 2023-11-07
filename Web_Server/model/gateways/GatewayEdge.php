<?php

namespace model\gateways;

use model\classes\Connection;

/**
 * Class that manages the acces to links using SQL queries
 */
class GatewayEdge extends Gateway
{
    /**
     * This gateway reach the link class in the database, it needs to get a connection (to the database) as parameter
     * @param Connection $connection
     */
    public function __construct(Connection $connection) 
    {
        $this->connection = $connection;
    }


 /**
     * Insert a link in the database, it needs 2 nodes as parameters, the id is auto-generated and auto-incremented
     * @param int $nodeA
     * @param int $nodeB
     * @param int $id
     * @return string
     */
    public function insertEdgeIntoDatabase(int $nodeA, int $nodeB, int $id) 
    {
        $query = "INSERT INTO Edge VALUES (:nodeA, :nodeB, :id)";      

        return $this->connectAndExecute($query, array(':nodeA'=> array($nodeA, \PDO::PARAM_INT), ':nodeB'=> array($nodeB, \PDO::PARAM_INT),':id'=> array($id, \PDO::PARAM_INT)));

        #echo 'insertion reussie'; #when we need to test to see if something happened
    }

    /**
     * !Really important method!
     * Get all the links from the database as an array
     * @return array
     */
    public function getDataLink() : array 
    {
        $query = "SELECT * FROM Edge";

        $err = $this->connectAndExecute($query, array());

        return array($this->connection->getResults(),$err);
    }

}