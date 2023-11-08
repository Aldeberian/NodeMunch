<?php
class Validation{
    public static function validAction()
    {
        $action = (isset($_REQUEST['action'])) ? 'null' : $_REQUEST['action'];
        if ($action == 'null')
        {
            throw new Exception('Empty action');
        }        
    }

    //We'll have to give this function once the pseudo is trimed
    public static function validPseudo(string $pseudo)
    {
        if (!isset($pseudo) or $pseudo == '')
        {
            $dataErrorView[] = 'pseudoError';
            $pseudo = '';
        }        
    }

    public static function validMail(string $mail)
    {
        if (!isset($mail) or $mail == '' or $mail == " ")
        {
            $dataErrorView[] = 'emptyMailError';
            $mail = '';
        }
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            $dataErrorView[] = 'badMailError';
            $mail = '';
        }
    }

    public static function cleanPseudo(string $pseudo)
    {
        if (trim($pseudo, " \n\r\t\v\x00") != $pseudo)
            $dataErrorView[] = 'pseudoNotWantedChar';
        return trim($pseudo," \n\r\t\v\x00");
    }
    
   
}
