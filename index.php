<?php
//  inicializuje sesion (paměť v prohlížeči)
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Kalasová stravování</title>
    <?php //přidá skrypty potřebné pro ikonky
    include("scripts.php"); ?>
</head>
<style>
    body{height: 100vh;}
    </style>
<?php $thisPage="Home"; ?>

<body>
<?php
//přidá navigaci a home menu
include("nav.php"); ?>
<?php include("homeMenu.php");?>
</body>
</html>