<?php

namespace model\gateways;
use model\metier\Node;
class GeneratorData
{

    public function generateRandomNodes()
    {
        $nbNodes = rand(13,40);
        $tabNode = [];
        for($i = 1 ; $i <= $nbNodes ; $i++)
        {
            //2 - 100 les extrémités x de la div avant qu'une node sorte de la zone
            //2 - 49 en y
            $valX = floatVal(rand(2, 99).'.'.rand(1, 9));
            $valY = floatVal(rand(2, 48).'.'.rand(1, 9));
            if (GatewayNode::findCloseNode($tabNode, $valX, $valY) || !GatewayNode::unusedId($tabNode, $i))
            {
                $i--;
                continue;
            }
            $tabNode[] = new Node($i, $valX, $valY, array());
        }
        return $tabNode;
    }


}