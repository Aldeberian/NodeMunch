<?php

namespace model\gateways;

use model\classes\Connection;

/**
 * Class that manages the acces to links using SQL queries
 */
class Gateway
{
    public Connection $connection;

    /**
     * This gateway reach the link class in the database, it needs to get a connection (to the database) as parameter
     * @param Connection $connection
     */
    public function __construct(Connection $connection) 
    {
        $this->connection = $connection;
    }

    protected function connectAndExecute(String $query, array $params = NULL) {
        try {
            if ($params == NULL)
                $this->connection->executeQuery($query);
            else {
                $this->connection->executeQuery($query, $params);
            }
        }
        catch (\PDOException $e) {

            echo $e->getMessage();  //On fait quoi dans ce cas ?
        }
    }
}