<?php
/* 
 * Classe parente � tous les contr�leurs
 * Elle permet de faire disposer � ses classes filles
 * des outils n�c�ssaire au bon fonctionnement de l'appli
 * Auteur : RezA
 */

class Controller{

    protected $layout;
    protected $params;
    protected $params_e;
    public $requireConnexion;
    private $variables = array();

    public function  __construct() {
        $this->layout = Sg::$default_layout;
        $this->requireConnexion = Sg::$site_require_connexion;
        $this->params = $_GET['params'];
        $this->params_e = explode('-',$this->params);
    }

    protected function chargeModele($model){
        require_once(CHEMIN_ACCES.'/inc/modeles/'.$model.'.php');
        $this->$model = new $model();
    }

    protected function set($var){
        $this->variables = array_merge($this->variables, $var);
    }

    protected function affichage($vue){
        extract($this->variables);
        ob_start();
        require_once(CHEMIN_ACCES.'/inc/vues/'.get_class($this).'/'.$vue.'.php');
        $contenu_layout = ob_get_clean();
        if(!$this->layout)
            echo $contenu_layout;
        else
            require_once(CHEMIN_ACCES.'/inc/vues/layout/'.$this->layout.'.php');
    }

}
?>
