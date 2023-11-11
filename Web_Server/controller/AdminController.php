<?php

namespace controller;

use Exception;
use model\UserModel;
use model\GraphModel;
use model\NodeModel;
use PDOException;

class AdminController
{

    public function __construct() {

        global $twig;

        session_start();

        $dataErrorView = [];

//        array of strings that corresponds to the baseAdminMenu's options
        $menuOptions = ['Users', 'Graphs'];

        try {

            $action = $_REQUEST['action'] ?? null;

            switch($action) {

                case null :
                    $this->baseAdminMenu($dataErrorView, $menuOptions);
                    break;

                case 'Users' :
                    $this->displayUsers($dataErrorView);
                    break;

                case 'Graphs' :
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

                case 'testGenerator':
                    $this->affNodes($dataErrorView);
                    break;

                default :
                    $dataErrorView = "Call error";
                    echo $twig->render('baseAdminMenu.html', ['dataErrorView' => $dataErrorView, 'menuOptions' => $menuOptions]);
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

        foreach ($ensembleToSearch as $element){

            $value = strtolower($element[$variable]);

            if(strpos($value, $searchVal) !== false){
                var_dump($value);
                $foundElements[] = $element;
            }
        }
        return $foundElements;
    }

    public function baseAdminMenu($dataErrorView, $menuOptions) {

        global $twig;

        $dataView = ['menuOptions' => $menuOptions];

        echo $twig->render('baseAdminMenu.html', ['dataView' => $dataView, 'dataErrorView' => $dataErrorView]);

    }

    public function displayUsers($dataErrorView) {

        global $twig;

        $users = UserModel::getAllUsers();

        $dataView = ['users' => $users];

        echo $twig->render('displayUsers.html', ['dataView' => $dataView, 'dataErrorView' => $dataErrorView]);
    }


    public function displayGraphs($dataErrorView) {

        global $twig;

        $graphs = GraphModel::getAllGraphs();
        $users = UserModel::getAllUsers();

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

        GraphModel::deleteGraphById($idGraph);

        $this->displayGraphs($dataErrorView);
    }

    public function banUser($dataErrorView) {

        $idUser = $_POST['idUser'];

        UserModel::banUser($idUser);

        $this->displayUsers($dataErrorView);
    }

    public function unBanUser($dataErrorView) {

        $idUser = $_POST['idUser'];

        UserModel::unBanUser($idUser);

        $this->displayUsers($dataErrorView);
    }



    public function affNodes($dataErrorView)
    {
        global $twig;
        $nodes = NodeModel::getNodesRandom();
        $dataView = ['nodes' => $nodes];
        echo $twig->render('test.html', ['dataView' => $dataView, 'dataErrorView' => $dataErrorView]);
    }

}
