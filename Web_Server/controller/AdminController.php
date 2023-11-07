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

    public function initialPage($dataErrorView) {

        global $twig;

        $model = new Model();

        $users = $model->getAllUsers();

        $dataView = ['users' => $users];

        echo $twig->render('banUnBanUsers.html', ['dataView' => $dataView, 'dataErrorView' => $dataErrorView]);
    }


    public function displayGraphs($dataErrorView) {

        global $twig;

        $model = new Model();

        $graphs = $model->getAllGraphs();
        $users = $model->getAllUsers();

        $dataView = ['graphs' => $graphs, 'userInfo' => $users];
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

        $model = new Model();

        $model->unBanUser($idUser);

        $this->initialPage($dataErrorView);
    }


}


//Ancienne fonction unBanUser qui était appelée depuis initialPage à la suite d'un submit du formulaire
//elle unbannait le user puis l'affichait dans une view 'unBanUserStatement'
//Pour plus de dynamisme je ne fais que bannir ou unbannir puis je raffiche le formulaire directement
/*public function unBanUser($dataErrorView) {

    global $twig;

    $idUser = $_POST['idUser'];

    $model = new Model();

    $model->unBanUser($idUser);

    $user = $model->getUserWithId($idUser);

    $dataView = ['user' => $user];

    echo $twig->render('unBanUserStatement.html', ['dataView' => $dataView, 'dataErrorView' => $dataErrorView]);
}



code de la vue 'unBanUserStatement' :
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UNBAN {{dataView.user[0].pseudo}}</title>
</head>
<body>

<h2>The user unbanned :</h2>
<ul>
    <li>
        <p>Pseudo :{{dataView.user[0].pseudo}}</p>
        <p>Mail :{{dataView.user[0].email}}</p>
    </li>
</ul>

</body>
</html>
*/