<?php

/*
 * Classe permettant d'inisialiser les variables nécéssaires
 * et d'inclure les fichier nécéssaires au bon fonctionnement.
 * Elle ajuste aussi quelques réglages.
 * Auteur : RezA
 */

//Gestion des sessions.
session_start();
session_regenerate_id();

//fonction permettant d'inclure facilement les classes
function __autoload($classeNom)
{
    require(CHEMIN_ACCES.'/inc/class/'.$classeNom.'.class.php');
}


//inclusion du coeur du système de gestion
require(CHEMIN_ACCES.'/inc/SiteGlobal.php');
require(CHEMIN_ACCES.'/inc/config.php');
require(CHEMIN_ACCES.'/inc/core/Controller.php');
require(CHEMIN_ACCES.'/inc/core/Model.php');
require(CHEMIN_ACCES.'/inc/core/Core.php');


//Permet un débugage plus facile en pré-production.
if(PREPROD){
    error_reporting(E_ALL | E_STRICT);
}
?>
