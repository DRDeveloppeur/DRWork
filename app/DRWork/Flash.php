<?php
namespace DRWork;

class Flash
{
    public function __construct()
    {   
        $bStatut = false;
        if (php_sapi_name() !== 'cli' ) {
            $bStatut = (session_status() === PHP_SESSION_ACTIVE ? true : false);
        }    
        if ($bStatut === false) session_start();
    }
 
    /**
     * Enregistrement d'un message
     * @param string message à afficher
     * @param string type success | warning
     */
    public function set($message, $type = 'success')
    {
        $_SESSION['flashbag'] = [
            'type'  => $type,
            'message' => $message
        ];
    }
 
    /**
    * Retourne le message et le type de message se trouvant dans
    * la session flash (tableau vide si pas de message)
    *
    * @return array
    */
    public function get()
    {
        if (isset($_SESSION['flashbag']) && is_array($_SESSION['flashbag'])) {
            $return = $_SESSION['flashbag'];
            unset($_SESSION['flashbag']);
            return $return;
        }
    }
}
