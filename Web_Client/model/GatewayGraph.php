<?php

require_once('Connection.php');

class GatewayGraph
{

    public Connection $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }


    public function createGraph(int $nodes, int $links) {

        $query = "INSERT INTO Graph VALUES(:id, :nodes, :links)";

        try {
            $this->connection->executeQuery($query, array(':id' => array(NULL, PDO::PARAM_INT), ':nodes' => array($nodes, PDO::PARAM_INT), ':links' => array($links, PDO::PARAM_INT)));
        }

        catch (PDOException $e) {

            echo 'Insertion ratée';
        }

        catch(Exception $e) {
            echo $e->getMessage();

        }

        echo 'Insertion réussie';
    }


    public function readGraph() {

        $query = "SELECT * FROM Graph";

        try {

            $this->connection->executeQuery($query, array());

            /*
            $displayResult = $this->connection->getResults();

            foreach ($displayResult as $value) {

                echo "[$value[0]]"." => "."Nodes : $value[1] / Links : $value[2]"."<br>";
            }
            */
        }

        catch (PDOException $e) {

            echo 'Affichage raté';
        }

        catch(Exception $e) {
            echo $e->getMessage();

        }
    }


    public function updateGraph(int $idGraph, string $field, $value) {

        $query = "UPDATE Graph SET $field = $value WHERE id=$idGraph";

        try {
            $this->connection->executeQuery($query, array());
        }

        catch (PDOException $e) {

            echo 'Modification ratée';
        }

        catch(\Exception $e) {
            echo $e->getMessage();

        }
    }

    public function deleteGraph(int $idGraph) {

        $query = "DELETE FROM Graph WHERE id=$idGraph";

        try {
            $this->connection->executeQuery($query, array());
        }

        catch (PDOException $e) {

            echo 'Modification ratée';
        }

        catch(\Exception $e) {
            echo $e->getMessage();

        }
    }
}