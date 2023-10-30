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

                    $this->initialPage();

                    break;

                /*case 'deleteAGraph' :

                    $this->deleteAGraph();
                    break;*/

                case 'banUser' :

                    $this->banUser($dataErrorView);
                    break;

/*                case 'unBanUser' :

                    $this->unBanUser();
                    break;*/

                default :

                    $dataErrorView = "Call error";
                    echo $twig->render('testBanUserButton.html', ['dataErrorView' => $dataErrorView]);
                    break;
            }
        }

        catch (Exception $exception) {

            $dataErrorView = "Unexpected error";

            echo $twig->render('errorView.html', ['dataErrorView' => $dataErrorView]);
        }
    }

    public function initialPage() {

        global $twig;

        $dataView = ['id' => 'give an id'];

        echo $twig->render('testBanUserButton', ['dataview' => $dataView]);
    }


    public function deleteAGraph($idGraph) {

    }

    public function banUser($dataErrorView) {

        global $twig;

        $idUser = $_POST['idUser'];

        $model = new Model();

        $user = $model->getUserWithId($idUser);

        $dataView = ['user' => $user, 'id' => ''];

        echo $twig->render('testBanUserButton.html', ['dataView' => $dataView, 'dataErrorView' => $dataErrorView]);
    }

    public function unBanUser() {

    }


}