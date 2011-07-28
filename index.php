<?php

define('CHEMIN_ACCES',dirname(__FILE__));
define('PREPROD',false);

ob_start();

include(CHEMIN_ACCES.'/inc/initialisation.php');
Core::Demarrage();

ob_end_flush();

?>