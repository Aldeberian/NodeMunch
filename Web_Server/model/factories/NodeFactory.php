<?php

namespace model\factories;

class NodeFactory extends Factory
{
    public static function create(array $data){
        return new Node($data[0],                                       //id
                        $data[1],                                       //posX
                        $data[2],                                       //posY
                        NodeModel::getNeighboursId($data[0]));          //neighbours
    }
}