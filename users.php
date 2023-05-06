<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<?php $thisPage="Users"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Kalasová stravování</title>
</head>
<style>
   
</style>
        <?php include("scripts.php"); ?>

<body>
<?php include("nav.php"); ?>
    <div id="obalovaci">
        <div id="backgroundBlock">
   
        
</div>

</div>
</body>
</html>