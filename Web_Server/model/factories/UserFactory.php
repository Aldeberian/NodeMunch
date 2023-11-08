<?php

namespace model\factories;

class UserFactory extends Factory
{
    public static function create(array $data){
        $user = new User();
        $user->setId($data[0]);
        $user->setPseudo($data[1]);
        $user->setPassword($data[2]);
        $user->setEmail($data[3]);
        $user->setMyGraphs($data[4]);
        $user->setFavGraphs($data[5]);
        $user->setBan($data[6]);
        $user->setFriends($data[7]);
        return $user;
    }

    private static function getMyGraphs($idUsr){
        return;
    }
}