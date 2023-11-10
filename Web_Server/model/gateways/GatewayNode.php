<?php

namespace model\gateways;

use model\metier\Connection;

/**
 * Class that manages the acces to links using SQL queries
 */
class GatewayNode extends Gateway
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
     * This function insert a node into the database 
     * @param int $id ID of the node
     * @param int $posX X position of the node
     * @param int $posY Y position of the node
     * @return string
     */
    public function insertNodeIntoDatabase(int $id, int $posX, int $posY)
    {
        $query = "INSERT INTO Node VALUES(:id, :pX, :pY)";
        $this->connectAndExecute($query, array(':id'=> array($id, \PDO::PARAM_INT),':pX'=> array($posX, \PDO::PARAM_INT),':pY'=> array($posY, \PDO::PARAM_INT)));
    }


    /**
     * This function adds a node into a graph
     * @param int $idGraph ID of the graph
     * @param int $idNode ID of the node
     * @return string
     */
    public function insertNodeIntoCompoNode(int $idGraph, int $idNode)
    {
        $query = "INSERT INTO CompositionNode VALUES (:idG, :idN)";
        $this->connectAndExecute($query, array(':idG'=> array($idGraph, \PDO::PARAM_INT),':idN'=> array($idNode, \PDO::PARAM_INT)));
    }


   
}