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

            switch($action) {

                case null :
                    $this->displayGraphs($dataErrorView);
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


    /**
     * Function that search for a matching pattern in an ensemble of variables.
     *
     * @param $searchVal the pattern that is being searched
     * @param $ensembleToSearch the ensemble of objects that are being searched
     * @param $variable the attribute that is being looked into for the pattern in those objects
     * @return array an array of objects that had their variable containing the pattern wanted
     */
    private function search($searchVal, $ensembleToSearch, $variable): array
    {
        $foundElements = null;

        var_dump($searchVal);
        foreach ($ensembleToSearch as $element){
            var_dump($element);

            $value = strtolower($element[$variable]);

            if(strpos($value, $searchVal) !== false){
                var_dump($value);
                $foundElements[] = $element;
            }
        }
        var_dump("found");
        var_dump($foundElements);
        return $foundElements;
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

        if(isset($_GET['search']) and $_GET['search'] != ''){
            $searchVal = strtolower($_GET['search']);

            $dataView = ['graphs' => $this->search($searchVal, $graphs, 'name'), 'userInfo' => $users];
        }else{
            $dataView = ['graphs' => $graphs, 'userInfo' => $users];
        }

        echo $twig->render('displayGraph.html', ['dataView' => $dataView, 'dataErrorView' => $dataErrorView]);
    }

    public function deleteGraph($dataErrorView) {

        $idGraph = $_POST['idGraph'];

        Model::deleteGraphById($idGraph);

        $this->displayGraphs($dataErrorView);
    }

    public function banUser($dataErrorView) {

        $idUser = $_POST['idUser'];

        Model::banUser($idUser);

        $this->initialPage($dataErrorView);
    }

    public function unBanUser($dataErrorView) {

        $idUser = $_POST['idUser'];

        Model::unBanUser($idUser);

        $this->initialPage($dataErrorView);
    }
}
