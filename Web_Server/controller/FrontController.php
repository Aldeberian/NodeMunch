<?php

namespace controller;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class FrontController
{

    public function __construct() {

        $currentSession = $_SESSION;

        $adminActionsList = array('login', 'disconnect', 'banUser', 'unBanUser', 'deleteGraph');
        $connectedUserActionsList = array('login', 'disconnect', 'editGraph', 'deleteMyGraph', 'createGraph', 'saveGraphInFav', 'likeGraph');
        $guestActionList = array('getGraph', 'seeProfile', '');


        $dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) {

            $routeCollector->addRoute(['GET', 'POST'], '/user', ConnectedPlayerController::class);

        });

        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {

            case Dispatcher::NOT_FOUND :
                echo '404 NOT FOUND';
                //Url  not found, it doesn't match
                break;

            case Dispatcher::METHOD_NOT_ALLOWED :
                echo '405 METHOD NOTALLOWED';
                //Trying to access to a route with a wrong httpMethod
                break;

            case Dispatcher::FOUND :

                $controller = $routeInfo[1];

                $parameters = $routeInfo[2];

                break;
        }


    }




}


/*require 'AltoRouter.php';
require 'Controller/UserController.php';
$router = new AltoRouter();
$router->setBasePath('/routeur');
//$router->map('GET', '/', 'AppController#create');
$router->map('GET', '/', 'AppController');
$router->map('GET|POST', '/user/[i:id]/[a:action]?', 'UserController');

$id = 0;
$match = $router->match();
//var_dump($match);

$action = array();
$id = array();
if (!$match) {
    echo "404";
    die;
}

if ($match) {
//list($controller, $action) = explode('#', $match['target'] );
    $controller = $match['target'] ?? null;
    $action = $match['params']['action'] ?? null;
    $id = $match['params']['id'] ?? null;
    print 'user Id received ' . $id . '<br>';
    print 'controleur appelé ' . $controller . '<br>';
    print $action . '<br>';
    print $id . '<br>';





    try {
        $controller = '\\Controller\\' . $controller;
        $controller = new $controller;
        if (is_callable(array($controller, $action))) {
            call_user_func_array(array($controller, $action),
                array($match['params']));
        }
    } catch (Error $error) {
        print 'pas de controller';
    }
}*/
