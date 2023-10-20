<?php

require_once('../model/GatewayGraph.php');

class GuestController
{
    private GatewayGraph $gwGraph;

    function __construct(){
        global $twig;
        session_start();
        $errTab = [];

        try{
            $action = $_POST['action'] ?? null;
            switch($action){
                case 'printGraph':
                    $this->printGraph();
                    break;
                case 'seeProfile':
                    $this->displayProfile();
                    break;
                case null:
                    break;
                default:
                    $errTab[]="Erreur d'appel php";
                    echo $twig->render('../views/userProfileView.html', ['../views/errorView.html' => $errTab]);
                    break;
            }

        } catch (PDOException $e){
            $errTab[]="Erreur inattendue !";
        }
    }
}