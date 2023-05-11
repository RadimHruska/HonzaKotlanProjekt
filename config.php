<?php
/* konfigurace databáze */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'carsshop');
 
/* pokus o připojení k databázi */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// kontrola připojení, když není připojeno, vyhodí error
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>