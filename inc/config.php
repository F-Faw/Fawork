<?php
/* 
 * Configuration du système
 * Auteur : RezA
 */


if(file_exists(CHEMIN_ACCES.'/inc/configs/prod.php')){
    require_once(CHEMIN_ACCES.'/inc/configs/prod.php');
    Sg::$prod = true;
}
else{
    require_once(CHEMIN_ACCES.'/inc/configs/preprod.php');
}

Sg::$site_nom = $config['SITE']['nom'];
Sg::$site_url = $config['SITE']['url'];
Sg::$table_prefix = $config['BDD']['prefix'];
Sg::$default_module = $config['SITE']['module_defaut'];
Sg::$default_action = $config['SITE']['action_defaut'];
Sg::$default_layout = $config['SITE']['layout_defaut'];
Sg::$default_layout = $config['SITE']['layout_defaut'];
Sg::$site_require_connexion = $config['SITE']['require_connexion'];
Sg::$connexion_module = $config['SITE']['module_connexion'];

try
{
    Sg::$Db = new PDO('mysql:dbname='.$config['BDD']['base'].';host='.$config['BDD']['host'],$config['BDD']['user'] ,$config['BDD']['pass']);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


unset($config);
?>
