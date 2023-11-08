<?php

namespace controller;

use Exception;
use model\Model;
use PDOException;

class AdminController
{

    public function __construct() {

        global $twig;

        session_start();

        $dataErrorView = [];

        try {

            $action = $_REQUEST['action'] ?? null;
            $searchVal = $_REQUEST['search'] ?? null;

            switch($action) {

                case null :
                    $this->initialPage($dataErrorView);
                    break;

                case 'banUser' :

                    $this->banUser($dataErrorView);
                    break;

                case 'unBanUser' :

                    $this->unBanUser($dataErrorView);
                    break;

                case 'deleteGraph' :

                    $this->deleteGraph($dataErrorView);
                    break;

                default :

                    $dataErrorView = "Call error";
                    echo $twig->render('banUnBanUsers.html', ['dataErrorView' => $dataErrorView]);
                    break;
            }
        }

        catch (Exception $exception) {

            $dataErrorView = "Unexpected error";

            echo $exception->getMessage();

            echo $twig->render('errorView.html', ['dataErrorView' => $dataErrorView]);
        }
    }

    public function initialPage($dataErrorView) {

        global $twig;

        $users = Model::getAllUsers();

        $dataView = ['users' => $users];

        echo $twig->render('banUnBanUsers.html', ['dataView' => $dataView, 'dataErrorView' => $dataErrorView]);
    }


    public function displayGraphs($dataErrorView) {

        global $twig;

        $graphs = Model::getAllGraphs();
        $users = Model::getAllUsers();

        $foundGraphs = null;
        if(isset($_GET['search']) and $_GET['search'] != ''){
            $searchVal = strtolower($_GET['search']);
            foreach ($graphs as $graph){
                $name = strtolower($graph['name']);
                if(strpos($name, $searchVal) !== false){
                    $foundGraphs[] = $graph;
                }
            }
            $dataView = ['graphs' => $foundGraphs, 'userInfo' => $users];
        }else{
            $dataView = ['graphs' => $graphs, 'userInfo' => $users];
        }

        echo $twig->render('displayGraph.html', ['dataView' => $dataView, 'dataErrorView' => $dataErrorView]);
    }

    public function deleteGraph($dataErrorView) {

        $idGraph = $_POST['idGraph'];

        $model = new Model();

        $model->deleteGraphById($idGraph);

        $this->displayGraphs($dataErrorView);
    }

    public function banUser($dataErrorView) {

        $idUser = $_POST['idUser'];

        $model = new Model();

        $model->banUser($idUser);

        $this->initialPage($dataErrorView);
    }

    public function unBanUser($dataErrorView) {

        $idUser = $_POST['idUser'];

        Model::unBanUser($idUser);

        $this->initialPage($dataErrorView);
    }
}
