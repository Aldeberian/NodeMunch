<?php

namespace model\factories;

class UserFactory extends Factory
{
    public static function create(array $data){
        return new User($data[0],                               //id
                        $data[1],                               //pseudo
                        $data[2],                               //password
                        $data[3],                               //email
                        GraphModel::getMyGraphsId($data[0]),    //myGraphs
                        GraphModel::getFavGraphsId($data[0]),   //favGraphs
                        $data[4],                               //ban
                        UserModel::getFriendsId($data[0]));     //friends
    }
}