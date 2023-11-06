<?php

require_once __DIR__ . '/config/config.php';

require __DIR__ . '/vendor/autoload.php';

use controller\GuestController;

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

//$adminController = new AdminController();
$guestController = new GuestController();