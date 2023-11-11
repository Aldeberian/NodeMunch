<?php

namespace model;

use model\metier\Connection;
use model\gateways\GatewayNode;
use model\gateways\GeneratorData;

class NodeModel
{
    public static function getNodesRandom()
    {
        $genRandom = new GeneratorData();
        $nodes = $genRandom->generateRandomNodes();
        return $nodes;
    }
}