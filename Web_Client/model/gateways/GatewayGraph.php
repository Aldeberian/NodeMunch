<?php

namespace model\gateways;

use model\classes\Connection;

/**
 * Class that manages the acces to graphs using SQL queries
 */
class GatewayGraph
{
    public Connection $connection;

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
     */
    public function insertGraphIntoDatabase(string $name, string $idImage) { //Should pass directly the object ?
        $query = "INSERT INTO Graph VALUES(:id, :nm, idImage)";

        try {
        $this->connection->executeQuery($query, array(
            ':id' => array(NULL, \PDO::PARAM_INT),
            ':nm' => array($name, \PDO::PARAM_STR),
            ':idImage' => array($idImage, \PDO::PARAM_STR)));
        }
        catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }

    /**
     * This function updates the name of the given graph ID
     * @param int $id ID of the graph
     * @param string $name New name of the graph
     */
    public function updateGraphName(int $id, string $name) { //
        $query = "UPDATE Graph SET 'name' = :nm WHERE id=:id";

        try {
        $this->connection->executeQuery($query, array(
            ':nm' => array($name, \PDO::PARAM_STR),
            ':id' => array($id, \PDO::PARAM_INT)));
        }
        catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }

    /**
     * This function deletes the graph for the given ID
     * @param int $idGraph ID of the graph that will be deleted
     */
    public function deleteGraph(int $id) {
        $query = "DELETE FROM Graph WHERE id=:id";

        try {
        $this->connection->executeQuery($query, array(':id' => array($id, \PDO::PARAM_INT)));
        }
        catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }

    /**
     * !Really important method!
     * Get all the graphs from the database as an array
     * @return array
     */
    public function getDataGraph() : array {
        $query = "SELECT * FROM Graph";

        try {
        $this->connection->executeQuery($query);
        }
        catch (\PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
        return $this->connection->getResults();
    }
}
