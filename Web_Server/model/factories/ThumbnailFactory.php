<?php

namespace model\factories;

class ThumbnailFactory extends Factory
{
    public static function create(array $data){
        return new Thumbnail($data[0],          //id
                            $data[1],           //size
                            $data[2]);          //thumbnail
    }
}