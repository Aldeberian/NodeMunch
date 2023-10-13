<?php

require ('Connection.php');

class GatewayLink
{
    public Connection $connection;

    public function __construct(Connection $connection) {

        $this->connection = $connection;
    }


}