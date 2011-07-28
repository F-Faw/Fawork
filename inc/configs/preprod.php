<?php
/* 
 * Fichier de config de pr�-production
 * Auteur : RezA
 */

$config = array(
    'BDD' => array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'base' => 'speedy',
        'prefix' => 'site_',
    ),
    'SITE' => array(
        'require_connexion' => true,
        'nom' => 'SpeedyModo (PréProd)',
        'url' => 'http://localhost/Speedy/',
        'module_defaut' => 'Accueil',
        'module_connexion' => 'Auth',
        'action_defaut' => 0,
        'layout_defaut' => 'default',
    )
);
?>
