<?php
// Inicializuje sesion
session_start();
 
// zkontroluje jestly je uživatel přihlášen a jestly má správnou roly pro přístup do tebulky uživatelů
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] == 2){
    header("location: index.php");
    exit;
}
?>
<?php $thisPage="userPage"; ?>
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
$id =  $_SESSION["id"];
$sql = "SELECT id, datum, adresa FROM uctenka where iduzivatele = $id";


?>
    <div id="obalovaci">
    <div class="space"></div>
        <div id="backgroundBlock">
        <?php 
       
    //dotaz a následný výpis uživatelů
        $query = mysqli_query($link, $sql);
        if ($query->num_rows > 0) {   
            while($row = $query->fetch_assoc()) {
                echo "<table style='margin: auto;'>";
                echo  "<tr>";
                echo "<th>ID</th>";
                echo "<th>Datum</th>";
                echo "<th>Adresa</th>";
                echo "</tr>";
                echo  "<tr>";
                echo "<td>".$row['id']."</td>";
                $idUctenky = $row['id'];
                echo "<td>" .$row['datum']."</td>";
                echo "<td>".$row['adresa']."</td>";
                echo "</tr>";
              echo "</table>";
              $sql1 = "SELECT poloznanauctence.idzbozi, poloznanauctence.mnoztvi as mno, poloznanauctence.aktualnicena as cena, zbozi.nazev as jme
              FROM poloznanauctence
              INNER JOIN zbozi ON poloznanauctence.idzbozi = zbozi.id where poloznanauctence.iductenka = $idUctenky";
              $query1 = mysqli_query($link, $sql1);
              if ($query1->num_rows > 0) {   
                 echo "<table style='margin: auto;'>";
                      echo  "<tr>";
                      echo "<th>Zboží</th>";
                      echo "<th>Množství</th>";
                      echo "<th>Cena</th>";
                      echo "</tr>";
                      echo  "<tr>";
                  while($row1 = $query1->fetch_assoc()) {
                     
                      echo "<td>".$row1['jme']."</td>";
                      echo "<td>" .$row1['mno']."</td>";
                      echo "<td>".$row1['cena']."</td>";
                      echo "</tr>";
                    } 
                  echo "</table>";
                  
                  }
echo "<hr>";
            }
            }
            
        ?>
        </div>
        <div class="space"></div>
</div>
<?php include("footer.php"); ?>
</body>
</html>