<?php

namespace controller;

use Exception;
use PDOException;

class AdminController
{

    public function __construct() {
        global $twig;
        session_start();

        $errorView = [];

        try {

            $action = $_REQUEST['action'] ?? null;

            switch($action) {

                case null :

                    $this->reInit();
                    break;

                case 'validate' :

                    $this->validate();
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

    /**
     * In the case
     */
    public function reInit() {


    }

    public function validate() {


    }


    public function deleteAGraph() {


    }

    public function banUser() {


    }

    public function unBanUser() {



    }


}