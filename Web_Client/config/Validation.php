class Validation{
    public static function validAction(){
        $action = (isset($_REQUEST['action'])) ? 'none' : $_REQUEST['action'];
        if ($action == 'none')
        {
            throw new Exception('Empty action');
        }        
    }

    public static function validName(string $pseudo){
        if (!isset($pseudo) or $pseudo == '')
        {
            $tabError[] = 'pseudoError';
            $pseudo = '';
        }
    }
}