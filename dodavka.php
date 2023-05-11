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
<?php $thisPage="Dodavka"; ?>

<body>
<?php include("nav.php"); ?>

<div id="obalovaci"> 
    <div class="space"></div> 
<div class="productContainer">   

<?php
//přidá navigaci a home menu



 //výběr položek
$sql = "SELECT id, nazev, typ, cena, pocet, pic FROM zbozi where typ = 'dodavka'";

if($stmt = mysqli_prepare($link, $sql)){
    // přidání proměných k dotazu
    //mysqli_stmt_bind_param($stmt, "enum", $param_typ);
 $query = mysqli_query($link, $sql);
    if ($query->num_rows > 0) {   
        while($row = $query->fetch_assoc()) {
            echo " <a class='nemuField' href='detail.php?id=".$row['id']."' style='border-radius: 10px;  background-color: white;'> ";
            echo "<img src='"."pic/products/".$row['pic']."' width='90%' style='padding: 15px;'></img>";
            echo "<h1 style='text-align: center;'>".$row['nazev']." </h1><br>";
            echo " <div style='text-align: right; padding: 30px;'>";
            echo $row['cena'].",-<br>";
            echo "Skladem ".$row['pocet']." kusů"."<br>";
            echo "</div>";
            echo "</a>";
        }
        }
}
?>
</div>
<div class="space"></div> 
</div>

<?php include("footer.php"); ?>
</body>
</html>