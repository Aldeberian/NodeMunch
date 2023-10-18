<?php

require_once('Connection.php');

class GatewayGraph
{

    public Connection $connection;

    /**
     * @param Connection $connection This parameter is used to create the connection, used in other functions
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param int $nodes 
     * @param int $links
     */
    public function createGraph(int $nodes, int $links) {
        $query = "INSERT INTO Graph VALUES(:id, :nodes, :links)";

        $this->connection->executeQuery($query, array(
            ':id' => array(NULL, PDO::PARAM_INT),
            ':nodes' => array($nodes, PDO::PARAM_INT),
            ':links' => array($links, PDO::PARAM_INT)));
    }

    public function updateGraphLink(int $idGraph, int $idLink) {
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

    /*public function readGraph() {

        $query = "SELECT * FROM Graph";

        try {
            $this->connection->executeQuery($query, array());

            //$displayResult = $this->connection->getResults();
            //foreach ($displayResult as $value) {
            //    echo "[$value[0]]"." => "."Nodes : $value[1] / Links : $value[2]"."<br>";
            //}
        }

        catch (PDOException $e) {

            echo 'Affichage raté';
        }

        catch(Exception $e) {
            echo $e->getMessage();

        }
    }*/
}