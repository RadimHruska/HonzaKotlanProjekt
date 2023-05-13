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
<?php $thisPage="Detail"; ?>

<body>
<?php
//přidá navigaci a home menu
include("nav.php"); 


$sql = "SELECT id, nazev, typ, cena, pocet, pic, description FROM zbozi WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // přidání proměných k dotazu
            mysqli_stmt_bind_param($stmt, "s", $param_id);
            
            // nastavení parametrů dozazu
            $param_id = $_GET['id'];
            
            // pokus o vykonání dotazu na přihlášení
            if(mysqli_stmt_execute($stmt)){
                // uložení výsledku
                mysqli_stmt_store_result($stmt);
                
                // zkontroluje jestly existuje uživatel, pokud ano, pokračuje se ke kontrole hesla
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // připojení výsledků k proměným
                    mysqli_stmt_bind_result($stmt, $id, $nazev, $typ, $cena, $pocet, $pic, $description);
                    if(mysqli_stmt_fetch($stmt)){
                    ?>
                
                    <div id="obalovaci">
                    <div class="space"></div>
                    <div id="backgroundBlock">

                    <?php
                        echo "<h1>$nazev </h1>";
                        echo "<img src='"."pic/products/".$pic."' width='90%' style='padding: 15px;'></img>";
                        echo "<h3 style='color: green;'> $cena,- </h3>";

                        echo "<h3>Popis:</h3>";
                        echo $pocet;
                        
                        echo $description;
                    ?>
                    </div>
                    <div class="space"></div>
                    </div>
                    <?php
                    }
                }
            } 
        }       


?>

<?php include("footer.php"); ?>
</body>
</html>