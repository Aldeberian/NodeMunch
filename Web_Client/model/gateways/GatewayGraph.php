<?php

require_once('Connection.php');

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


    /** This function inserts a graph into the database
     * @param string $name Name of the graph
     */
    public function insertGraphIntoDatabase(string $name) {
        $query = "INSERT INTO Graph VALUES(:id, :nm)";

        $this->connection->executeQuery($query, array(
            ':id' => array(NULL, PDO::PARAM_INT),
            ':nm' => array($name, PDO::PARAM_STR)));
    }

    /**
     * @param int $idGraph
     * @param int $idLink
     */
    public function updateGraphName(string $name) {
        $query = "UPDATE Graph SET 'links' = :link WHERE id=:idGraph";

        $this->connection->executeQuery($query, array(
            ':link' => array($idLink, PDO::PARAM_INT),
            ':idGraph' => array($idGraph, PDO::PARAM_INT)));
    }

    public function updateGraphNode(int $idGraph, int $idLink) {
        $query = "UPDATE Graph SET 'nodes' = :node WHERE id=:idGraph";

        $this->connection->executeQuery($query, array(
            ':node' => array($idLink, PDO::PARAM_INT),
            ':idGraph' => array($idGraph, PDO::PARAM_INT)));
    }

    public function deleteGraph(int $idGraph) {
        $query = "DELETE FROM Graph WHERE id=:idGraph";

        $this->connection->executeQuery($query, array(':idGraph' => array($idGraph, PDO::PARAM_INT)));
    }
}
