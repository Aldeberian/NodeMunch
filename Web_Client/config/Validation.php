<?php
class Validation{
    public static function validAction()
    {
        $action = (isset($_REQUEST['action'])) ? 'none' : $_REQUEST['action'];
        if ($action == 'none')
        {
            throw new Exception('Empty action');
        }        
    }

    public static function validPseudo(string $pseudo)
    {
        if (!isset($pseudo) or $pseudo == '')
        {
            $tabError[] = 'pseudoError';
            $pseudo = '';
        }        
    }

    public static function validMail(string $mail)
    {
        if (!isset($mail) or $mail == '')
        {
            $tabError[] = 'emptyMailError';
            $mail = '';
        }
        if (!filter_var($mail, FILTER_VALIDATE_MAIL))
        {
            $tabError[] = 'badMailError';
            $mail = '';
        }
    }

    //require_once('errors.php'); don't know where to put this 
}
