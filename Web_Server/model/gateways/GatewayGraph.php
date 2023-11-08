<?php

namespace model\gateways;

use model\classes\Connection;

/**
 * Class that manages the acces to graphs using SQL queries
 */
class GatewayGraph extends Gateway
{
    /**
     * @param Connection $connection This parameter is used to create the connection, used in other methods
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }


    /**
     * This function inserts a graph into the database
     * @param string $name Name of the graph
     * @param string $idImage ID of the image
     * @return string
     */
    public function insertGraphIntoDatabase(string $name, string $idImage) { //Should pass directly the object ?
        $query = "INSERT INTO Graph VALUES(:id, :nm, idImage)";
        $this->connectAndExecute($query, array(':id' => array(NULL, \PDO::PARAM_INT),':nm' => array($name, \PDO::PARAM_STR),':idImage' => array($idImage, \PDO::PARAM_STR)));
    }

    /**
     * This function updates the name of the given graph ID
     * @param int $id ID of the graph
     * @param string $name New name of the graph
     * @return string
     */
    public function updateGraphName(int $id, string $name) { //
        $query = "UPDATE Graph SET 'name' = :nm WHERE id=:id";
        $this->connectAndExecute($query, array(':nm' => array($name, \PDO::PARAM_STR),':id' => array($id, \PDO::PARAM_INT)));
    }

    /**
     * This function deletes the graph for the given ID
     * @param int $idGraph ID of the graph that will be deleted
     * @return string
     */
    public function deleteGraph(int $id) {
        $query = "DELETE FROM Graph WHERE id=:id";
        $this->connectAndExecute($query, array(':id' => array($id, \PDO::PARAM_INT)));
    }

    /**
     * !Really important method!
     * Get all the graphs from the database as an array
     * @return array
     */
    public function getDataGraph() : array {
        $query = "SELECT * FROM Graph";
        $this->connectAndExecute($query);
        return $this->connection->getResults();
    }
}
