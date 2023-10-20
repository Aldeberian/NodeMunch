<?php

require_once('../model/gateways/GatewayGraph.php');

class GuestController
{
    private GatewayGraph $gwGraph;


    /**
     * When the Controller is created, he has to start a session
     */
    public function __construct(){
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

    /**
     * As a guest user, the user can display any graph from the community list or from the built-in graphs
     */
    public function printGraph() {



    }

    /**
     * As a guest user, the user can get to any profile so he needs to display it
     */
    public function displayProfile() {


    }
}