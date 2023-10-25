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
        pass;
    }

}