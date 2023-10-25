<?php

namespace controller;

use Exception;
use model\Model;
use PDOException;

class AdminController
{

    public function __construct() {

        //global $twig;
        global $views, $directory;
        session_start();

        $errorView = [];

        try {

            $action = $_REQUEST['action'] ?? null;

            switch($action) {

                case null :

                    break;

                case 'deleteAGraph' :

                    $this->deleteAGraph();
                    break;

                case 'banUser' :

                    $this->banUser();
                    break;

                case 'unBanUser' :

                    $this->unBanUser();
                    break;

                default :

                    $errorView = "Call error";
                    //echo $twig->render('vuephp1.html', ['errorView' => $errorView]);
                    break;
            }
        }

        catch (PDOException $exception) {

            $errorView = "Unexpected data acces error";
        }

        catch (Exception $exception) {

            $errorView = "Unexpected error";
        }
    }


    public function deleteAGraph($idGraph) {

        //global $twig;

        global $directory, $views;

        $model = new Model();

        $data = $model->getDataGraphsFromGateways();

        require $directory . $views['testCommunityGraphsAndDelButton'];
    }

    public function banUser() {

        global $directory, $views;

        $model = new Model();

        $data = $model->getDataUsersFromGateways();

        require $directory . $views['testBanUnbanUserButton'];

    }

    public function unBanUser() {

        global $directory, $views;

        $model = new Model();

        $data = $model->getDataUsersFromGateways();

        require $directory . $views['testBanUnbanUserButton'];

    }


}