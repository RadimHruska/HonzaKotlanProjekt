<?php
// Inicializuje sesion
session_start();
 
// zkontroluje jestly je uživatel přihlášen a jestly má správnou roly pro přístup do tebulky uživatelů
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] == 1){
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
    <title>carsshop</title>
</head>
<style>
   
</style>
        <?php include("scripts.php"); ?>

<body>
<?php include("nav.php"); 

$sql = "SELECT id, username, role, phone, email FROM users";


?>
    <div id="obalovaci">
        <div id="backgroundBlock">
            <table style="margin: auto;">
        <?php 
       
        echo  "<tr>";
        echo "<th>ID</th>";
        echo "<th>Uživatelské jméno</th>";
        echo "<th>Telefon</th>";
        echo "<th>Email</th>";
        echo "<th>role</th>";
        echo "</tr>";

    //dotaz a následný výpis uživatelů
        $query = mysqli_query($link, $sql);
        if ($query->num_rows > 0) {   
            while($row = $query->fetch_assoc()) {
                echo  "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>" .$row['username']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['role']."</td>";
                echo "</tr>";
              
            }
            }
            echo "</table>";
        ?>
        </div>
</div>
<?php include("footer.php"); ?>
</body>
</html>