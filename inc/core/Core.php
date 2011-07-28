<?php
/* 
 * Coeur du système
 * Auteur : RezA
 */

abstract class Core{

    public static $module;
    public static $action;
    public static $controller;

    public static function Demarrage(){
        self::$module = (isset($_GET['module'])) ? self::cleanModule($_GET['module']) : Sg::$default_module;
        self::$action = (isset($_GET['act'])) ? intval($_GET['act']) : Sg::$default_action;
        if(!file_exists(CHEMIN_ACCES.'/inc/controleurs/'.self::$module.'.php'))
            self::$module = Sg::$default_module;
        require(CHEMIN_ACCES.'/inc/controleurs/'.self::$module.'.php');
        self::$controller = new self::$module();
        if(Sg::$require_connexion && self::$controller->requireConnexion == true){
            require(CHEMIN_ACCES.'/inc/controleurs/'.Sg::$connexion_module.'.php');
            self::$controller = new Sg::$connexion_module();
            self::$controller->action(Sg::$default_action);
        }else{
            self::$controller->action(self::$action);
        }
    }

    private static function cleanModule($module){
        $module = str_replace('/','',$module);
        if(strpos($module,'\0') !== false)
            $module = Sg::$default_module;
        return  ucfirst(strtolower(trim($module)));
    }

}
?>
