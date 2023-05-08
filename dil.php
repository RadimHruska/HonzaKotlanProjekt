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
<?php $thisPage="Dil"; ?>

<body>
<?php include("nav.php"); ?>

<div id="obalovaci"> 
    <div class="space"></div> 
<div class="productContainer">   

<?php
//přidá navigaci a home menu



 //výběr položek
$typ = "dil";
$sql = "SELECT id, nazev, typ, cena, pocet, pic FROM zbozi where typ = 'dil'";

if($stmt = mysqli_prepare($link, $sql)){
    // přidání proměných k dotazu
    //mysqli_stmt_bind_param($stmt, "enum", $param_typ);
    $param_typ = $typ;
 $query = mysqli_query($link, $sql);
    if ($query->num_rows > 0) {   
        while($row = $query->fetch_assoc()) {
            echo " <a class='nemuField' href='dodavka.php'> ";
            echo  "<div class='menuFieldDiv'>";
            echo "<img src='"."pic/products/".$row['pic']."' width='100%'></img>";
            echo $row['id'];
            echo $row['nazev'];
            echo $row['typ'];
            echo $row['cena'];
            echo $row['pocet'];
            echo "</div>";
            echo "</a>";
        }
        }
}
?>
</div>
</div>
</body>
</html>