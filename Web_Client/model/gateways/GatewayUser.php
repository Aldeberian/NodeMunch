<?php

namespace model\gateways;

use model\classes\Connection;

/**
 * Class that manages the acces to users using SQL queries
 */
class GatewayUser
{

    public Connection $connection;


    public function __construct(Connection $connection) {

        $this->connection = $connection;
    }


    public function createUser() {

    }

    public function readUser(int $idUser) {


    }

    /**
     * @param int $idUser The user to be ban by the admin.
     */
    public function updateUserBan(int $idUser) {
        $query = "UPDATE User SET isBan = 1 WHERE id = :idUser";
        try {
            $this->connection->executeQuery($query, array(
                ':idUser' => array($idUser, \PDO::PARAM_INT)));
        }
        catch (\PDOException $e) {
            echo $e->getMessage();
        }

    }

    /**
     * @param int $idUser The user to be unban by the admin.
     */
    public function updateUserDeBan(int $idUser) {
        $query = "UPDATE User SET isBan = 0 WHERE id = :idUser";
        try {
            $this->connection->executeQuery($query, array(
                ':idUser' => array($idUser, \PDO::PARAM_INT)));
        }
        catch (\PDOException $e) {
            echo $e->getMessage();
        }

    }

    /**
     * @param int $idUser The user to delete in the list.
     */
    public function deleteUser(int $idUser) {
        $query = "DELETE FROM User WHERE id = :idUser";
        $this->connection->executeQuery($query, array(
            ':idUser'=>array($idUser, \PDO::PARAM_INT)));
    }

    /**
     * @param int $idGraph The id of the graph that is going to be saved.
     */
    public function saveGraph(int $idGraph, int $idUser) : void {
        $query = "INSERT INTO Savedgraph VALUES (:idUser, :idGraph)";
        $this->connection->executeQuery($query, array(
            ':idUser'=>array($idUser, \PDO::PARAM_INT),
            ':idGraph'=>array($idGraph, \PDO::PARAM_INT)));
    }


 /**
     * @param int $idGraph The id of the graph that will be unsaved.
     */
    public function unsaveGraph(int $idGraph, int $idUser) : void {
        $query = "DELETE FROM Savedgraph WHERE idUser = :idUser AND idGraph = :idGraph";
        $this->connection->executeQuery($query, array(
            ':idUser'=>array($idUser, \PDO::PARAM_INT),
            ':idGraph'=>array($idGraph, \PDO::PARAM_INT)));
    }



    /**
     * @param int $idGraph The id of the graph that will be liked by the user.
     */
    public function likeGraph(int $idGraph, int $idUser) : void {
        $query = "INSERT INTO Likedgraph VALUES (:idUser, :idGraph)";
        $this->connection->executeQuery($query, array(
            ':idUser'=>array($idUser, \PDO::PARAM_INT),
            ':idGraph'=>array($idGraph, \PDO::PARAM_INT)));
    }



        /**
     * @param int $idGraph The id of the graph that will be unliked by a certain user.
     */
    public function unlikeGraph(int $idGraph, int $idUser) : void {
        $query = "DELETE FROM Likedgraph WHERE idUser = :idUser AND idGraph = :idGraph";
        $this->connection->executeQuery($query, array(
            ':idUser'=>array($idUser, \PDO::PARAM_INT),
            ':idGraph'=>array($idGraph, \PDO::PARAM_INT)));
    }



    /**
     * !Really important method!
     * Get all the users from the database as an array
     * @return array
     */
    public function getDataUser() : array {

        $query = "SELECT * FROM User";

        $this->connection->executeQuery($query, array());

        return $this->connection->getResults();
    }

}