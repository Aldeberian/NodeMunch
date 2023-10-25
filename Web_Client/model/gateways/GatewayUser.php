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

    public function readUser(int $idUser) 
    {
        $query = "SELECT * FROM User WHERE id = :id";

        $this->connection->executeQuery($query, array(
            ':id'=>array($idUser, \PDO::PARAM_INT)));
        return $this->connection->getResults();
    }

    /**
     * @param int $idUser The user to be ban by the admin.
     */
    public function updateUserBan(int $idUser) 
    {
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
    public function updateUserDeBan(int $idUser) 
    {
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
    public function deleteUser(int $idUser) 
    {
        $query = "DELETE FROM User WHERE id = :idUser";

        $this->connection->executeQuery($query, array(
            ':idUser'=>array($idUser, \PDO::PARAM_INT)));
    }

    /**
     * @param int $idGraph The id of the graph that is going to be saved.
     */
    public function saveGraph(int $idGraph, int $idUser) : void 
    {
        $query = "INSERT INTO Savedgraph VALUES (:idUser, :idGraph)";

        $this->connection->executeQuery($query, array(
            ':idUser'=>array($idUser, \PDO::PARAM_INT),
            ':idGraph'=>array($idGraph, \PDO::PARAM_INT)));
    }


 /**
     * @param int $idGraph The id of the graph that will be unsaved.
     */
    public function unsaveGraph(int $idGraph, int $idUser) : void 
    {
        $query = "DELETE FROM Savedgraph WHERE idUser = :idUser AND idGraph = :idGraph";

        $this->connection->executeQuery($query, array(
            ':idUser'=>array($idUser, \PDO::PARAM_INT),
            ':idGraph'=>array($idGraph, \PDO::PARAM_INT)));
    }



    /**
     * @param int $idGraph The id of the graph that will be liked by the user.
     */
    public function likeGraph(int $idGraph, int $idUser) : void 
    {
        $query = "INSERT INTO Likedgraph VALUES (:idUser, :idGraph)";

        $this->connection->executeQuery($query, array(
            ':idUser'=>array($idUser, \PDO::PARAM_INT),
            ':idGraph'=>array($idGraph, \PDO::PARAM_INT)));
    }



        /**
     * @param int $idGraph The id of the graph that will be unliked by a certain user.
     */
    public function unlikeGraph(int $idGraph, int $idUser) : void 
    {
        $query = "DELETE FROM Likedgraph WHERE idUser = :idUser AND idGraph = :idGraph";

        $this->connection->executeQuery($query, array(
            ':idUser'=>array($idUser, \PDO::PARAM_INT),
            ':idGraph'=>array($idGraph, \PDO::PARAM_INT)));
    }


    public function addFriend(int $idUser1, int $idUser2)
    {   
        #First, we have to test if the relation of friendship between the two users already exist in the database
        $queryVerification = "SELECT * FROM Friend WHERE (idUser1 = :id1 AND idUser2 = :id2)
                                                    OR (idUser1 = :id2 AND idUser2 = :id1)";

        $this->connection->executeQuery($queryVerification, array(
            ':id1'=> array($idUser1, \PDO::PARAM_INT),
            ':id2'=> array($idUser2, \PDO::PARAM_INT)));

        if ($this->connection->getResults()==NULL) #if the relation between these two users doesn't exist
        {
            $query = "INSERT INTO Friend VALUES (:id1, :id2)";

            $this->connection->executeQuery($query, array(
                ':id1'=> array($idUser1, \PDO::PARAM_INT),
                ':id2'=> array($idUser2, \PDO::PARAM_INT)));
        }       
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