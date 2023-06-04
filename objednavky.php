<?php
// Inicializuje sesion
session_start();
 
// zkontroluje jestly je uživatel přihlášen a jestly má správnou roly pro přístup do tebulky uživatelů
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] != 2){
    header("location: index.php");
    exit;
}
?>
<?php $thisPage="objednavky"; 
require_once "config.php";

if(isset($_GET["id"]))
    {
        $sql = "UPDATE uctenka SET vyryzeno = 'ano' WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $_GET["id"];
            if(!mysqli_stmt_execute($stmt))
            {
                echo "Oops! Něco se pokazilo, skuste to znovu později.";
            }
            mysqli_stmt_close($stmt);
        }
    }

?>
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
$sql = "SELECT id, datum, adresa, vyryzeno FROM uctenka";


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
                echo "<th> <a href=\"objednavky.php?id=".$row['id']."\"> <i class=\"fa-solid fa-circle-check\" style=\"color: #32d25a;\"></i> </a></th>";
                echo "</tr>";
                echo  "<tr>";
                echo "<td>".$row['id']."</td>";
                $idUctenky = $row['id'];
                echo "<td>" .$row['datum']."</td>";
                echo "<td>".$row['adresa']."</td>";
                echo "<td>".$row['vyryzeno']."</td>";
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