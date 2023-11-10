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

    public static function validPseudo(string $pseudo)
    {
        $pseudo = self::cleanPseudo($pseudo);
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
        $cleanPseudo = trim($pseudo, " \n\r\t\v\x00");
        if ( $cleanPseudo!= $pseudo)
        {
            $dataErrorView[] = 'pseudoNotWantedChar';
            $cleanPseudo='';
        }
        return $cleanPseudo;
    }

   
}
