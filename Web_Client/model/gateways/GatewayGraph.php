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
    public function insertGraphIntoDatabase(string $name) {
        $query = "INSERT INTO Graph VALUES(:id, :nm)";

        $this->connection->executeQuery($query, array(
            ':id' => array(NULL, \PDO::PARAM_INT),
            ':nm' => array($name, \PDO::PARAM_STR)));
    }

    /**
     * @param string $name
     */
    public function updateGraphName(string $name) {
        $query = "UPDATE Graph SET 'links' = :link WHERE id=:idGraph";

        /*$this->connection->executeQuery($query, array(
            ':link' => array($idLink, PDO::PARAM_INT),
            ':idGraph' => array($idGraph, PDO::PARAM_INT)));*/
    }

    /**
     * @param int $idGraph
     * @param int $idLink
     * @return void
     */
    public function updateGraphNode(int $idGraph, int $idLink) {
        $query = "UPDATE Graph SET 'nodes' = :node WHERE id=:idGraph";

        $this->connection->executeQuery($query, array(
            ':node' => array($idLink, PDO::PARAM_INT),
            ':idGraph' => array($idGraph, PDO::PARAM_INT)));
    }

    /**
     * @param int $idGraph
     * @return void
     */
    public function deleteGraph(int $idGraph) {
        $query = "DELETE FROM Graph WHERE id=:idGraph";

        $this->connection->executeQuery($query, array(':idGraph' => array($idGraph, \PDO::PARAM_INT)));
    }

    /**
     * !Really important method!
     * Get all the graphs from the database as an array
     * @return array
     */
    public function getDataGraph() : array {

        $query = "SELECT * FROM Graph";

        $this->connection->executeQuery($query, array());

        return $this->connection->getResults();
    }
}
