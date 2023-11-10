<?php

namespace model\metier;

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