<?php

require_once('../model/GatewayGraph.php');

//En gros jsais pas comment installer twig sans les permissions de l'IUT
//jsais pas c'est bizarre, faut que je code de chez moi les permissions de l'IUT sont infames
require_once('/vendor/autoload.php');

class GuestController
{
    private GatewayGraph $gwGraph;

    function __construct(){
        global $twig;
        session_start();
        $errTab = [];

        //load de twig (normalement)
        $loader = new Twig_Loader_Filesystem('templates'); 
        $twig = new Twig_Environment($loader, array( 'cache'
        => false ));

        try{
            //on récupère la requête GET ou POST
            $action = $_REQUEST['action'] ?? null;
            switch($action){
                //récupère les données du graphe et après faudrait les retourner au JavaScript qui s'occupera de les afficher
                case 'getGraph':
                    try {
                        if (!isset($_REQUEST['graphId'])) {
                            throw new InvalidArgumentException("Le champ 'userId' n'est pas renseigné.");
                        }
                        $this->displayProfile($_REQUEST['graphId']);
                    } catch (InvalidArgumentException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }
                    break;
                //envois les données du profil d'un utilisateur à la vue userProfileView
                case 'seeProfile':
                    try {
                        if (!isset($_REQUEST['userId'])) {
                            throw new InvalidArgumentException("Le champ 'userId' n'est pas renseigné.");
                        }
                        $this->displayProfile($_REQUEST['userId']);
                    } catch (InvalidArgumentException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }
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

    //fonctions qui sont appelées par le constructeur plus haut 

    //return les données du graph au JS
    function getGraph() {

    }

    //$twig->render userProfileView avec les données de userId en théorie
    function displayProfile(int $userId) {

    }
}