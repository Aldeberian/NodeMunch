<?php

namespace model\classes;

class ModelAdmin
{
    public function connection() {

    }

    public function disconnection() {

        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public function isAdmin() {

    }

}