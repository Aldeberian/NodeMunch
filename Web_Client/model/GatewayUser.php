<?php

require('User.php');

use user\User;

class GatewayUser
{
    public static function createUser() {



    }

    public static function readUser(User $user) {


    }

    /**
     * @param int $idUser The user to be updated by the admin.
     */
    public static function updateUser(int $idUser) {

    }

    /**
     * @param int $idUser The user to delete in the list.
     */
    public static function deleteUser(int $idUser) {

    }

    /**
     * @param int $idGraph The id of the graph that is going to be saved.
     */
    public function saveGraph(int $idGraph) : void {

    }

    /**
     * @param int $idGraph The id of the graph that will be liked by the user.
     */
    public function likeGraph(int $idGraph) : void {

    }

}