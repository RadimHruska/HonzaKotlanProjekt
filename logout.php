<?php
// //  inicializuje sesion (paměť v prohlížeči)
session_start();
 
//vynuluje všechny paraetry sesion
$_SESSION = array();
 
//Zničí sesion
session_destroy();
 
// přesměrování na domovskou obrazovku
header("location: index.php");
exit;
?>