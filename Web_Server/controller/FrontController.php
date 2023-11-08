<?php

namespace controller;

class FrontController
{

    public function __construct() {

        $currentSession = $_SESSION;

        $adminActionsList = array('login', 'disconnect', 'banUser', 'unBanUser', 'deleteGraph');
        $connectedUserActionsList = array('login', 'disconnect', 'editGraph', 'deleteMyGraph', 'createGraph', 'saveGraphInFav', 'likeGraph');
        $guestActionList = array('getGraph', 'seeProfile', '');


        //$router = new AltoRouter();


    }




}