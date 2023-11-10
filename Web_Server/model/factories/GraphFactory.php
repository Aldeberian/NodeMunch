<?php

namespace model\factories;

class GraphFactory extends Factory
{
    public static function create(array $data){
        return new Graph($data[0],                                      //id
                        $data[1],                                       //name
                        $data[2],                                       //creator
                        ThumbnailModel::getThumbnailById($data[3]),     //thumbnail
                        NodeModel::getNodes($data[0]));                 //nodes
    }
}