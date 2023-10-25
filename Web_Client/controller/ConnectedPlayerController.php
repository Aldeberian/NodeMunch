<?php

namespace controller;

use Twig_Environment;
use Twig_Loader_Filesystem;

require_once('/vendor/autoload.php');

class ConnectedPlayerController
{
    public function __construct()
    {
        //global $twig;
        session_start();
        $errTab = [];

        //load de twig (normalement)
        //$loader = new Twig_Loader_Filesystem('templates');
        //$twig = new Twig_Environment($loader, array('cache' => false));

        try{
            //on récupère la requête GET ou POST
            $action = $_REQUEST['action'] ?? null;
            switch($action){
                case null:
                    break;

                case 'editGraph':
                    if (!isset($_REQUEST['graphId'])) {
                        throw new InvalidArgumentException("Le champ 'graphId' n'est pas renseigné.");
                    }
                    else{
                        $this->getGraph($_REQUEST['graphId']);
                    }

                    break;
                
                case 'deleteGraph':
                    if (!isset($_REQUEST['graphId'])) {
                        throw new InvalidArgumentException("Le champ 'graphId' n'est pas renseigné.");
                    }
                    else{
                        $this->deleteGraph($_REQUEST['graphId']);
                    }

                    break;
                
                case 'createGraph':
                    $this->createGraph();
                    break;
                
                case 'saveGraphInFav':
                    if (!isset($_REQUEST['graphId'])) {
                        throw new InvalidArgumentException("Le champ 'graphId' n'est pas renseigné.");
                    }
                    else{
                        $this->saveGraphInFav($_REQUEST['graphId']);
                    }
                
                case 'likeGraph':
                    if (!isset($_REQUEST['graphId'])) {
                        throw new InvalidArgumentException("Le champ 'graphId' n'est pas renseigné.");
                    }
                    else{
                        $this->likeGraph($_REQUEST['graphId']);
                    }
                
                default:
                    $errorView = "Call error";
                    //echo $twig->render('vuephp1.html', ['errorView' => $errorView]);
                    break;
            }
        } catch (PDOException $e) {
            $errTab[] = "Erreur inattendue !";
        } catch (Exception $e) {
            echo "erreur";
        }

    }

    public function editGraph($graphId)
    {
        pass;
    }

    public function deleteGraph($graphId)
    {
        Model::deleteGraphById($graphId);
    }

    public function createGraph()
    {
        pass;
    }

    public function saveGraphInFav($graphId)
    {
        $user = &$_SESSION['userId'];
        $user = Model::addFavGraph($user, $graphId);
        Model::updateUser($user);
    }

    public function likeGraph($graphId)
    {
        $user = &$_SESSION['userId'];
        $user = Model::addLikeGraph($user, $graphId);
        Model::updateUser($user);
    }

}