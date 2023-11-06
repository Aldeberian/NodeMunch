<?php

namespace controller;

use Twig_Environment;
use Twig_Loader_Filesystem;

//En gros jsais pas comment installer twig sans les permissions de l'IUT
//jsais pas c'est bizarre, faut que je code de chez moi les permissions de l'IUT sont infames
require_once('/vendor/autoload.php');

class GuestController
{
    /**
     * When the Controller is created, he has to start a session
     */
    public function __construct()
    {
        global $twig;
        session_start();
        $errTab = [];

        //load de twig (normalement)
        //$loader = new Twig_Loader_Filesystem('templates');
        //$twig = new Twig_Environment($loader, array('cache' => false));

        try {
            //on récupère la requête GET ou POST
            $action = $_REQUEST['action'] ?? null;
            switch ($action) {

                //récupère les données du graphe et après faudrait les retourner au JavaScript qui s'occupera de les afficher
                case 'getGraph':
                    if (!isset($_REQUEST['graphId'])) {
                        throw new InvalidArgumentException("Le champ 'userId' n'est pas renseigné.");
                    }
                    else{
                        $this->getGraph($_REQUEST['graphId']);
                    }

                    break;

                //envois les données du profil d'un utilisateur à la vue userProfileView
                case 'seeProfile':
                    if (!isset($_REQUEST['userId'])) {
                        throw new InvalidArgumentException("Le champ 'userId' n'est pas renseigné.");
                    }
                    else{
                        $this->displayProfile($_REQUEST['userId'], $errTab);
                    }

                    break;

                case null:
                    $this->initialPage($errTab);
                    break;

                default:
                    $errTab[] = "Erreur d'appel php";
                    //Render la vue d'erreur avec le message d'erreur

                    break;
            }

        } catch (PDOException $e) {
            $errTab[] = "Erreur inattendue !";
        } catch (Exception $e) {
            echo "erreur";
        }
    }

    public function initialPage($errTab){
        global $twig;
        $model = new Model();
        $users = $model->getAllUsers();
        $dataView = ['users' => $users];
        echo $twig->render('userList.html', ['dataView' => $dataView, 'dataErrorView' => $errTab]);
    }

    public function getGraph(int $graphId) {
        $data = Model::getDataGraphsFromGateways();
        foreach($data as $graph){
            if($graph->getId()==$graphId){
                return $graph;
            }
        }
    }

    public function displayProfile(int $userId, $errTab) {
        $data = Model::getDataUsersFromGateways();
        foreach($data as $user){
            if($user->getId()==$userId){
                $usr = $user;
            }
        }
        global $twig;
        $viewData = ['user' => $usr];
        echo $twig->render('userProfileView.html', ['dataView' => $viewData, 'dataErrorView' => $errTab]);
    }
}