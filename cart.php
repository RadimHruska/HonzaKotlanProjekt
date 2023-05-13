<?php
//  inicializuje sesion (paměť v prohlížeči)

include("cartItem.php");
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
<?php $thisPage="cart"; ?>

<body>
<?php
//přidá navigaci a home menu
include("nav.php"); ?>



<?php
$cartItems = 0;
?>
    <div id="obalovaci">
    <div class="space"></div>
        <div id="backgroundBlock">
<table style="margin: auto;">
<tr>
        <th>Id</th>
        <th>Produkt</th>
        <th>Počet</th>
        <th>Cena</th>
</tr>

<?php
$cart = $_SESSION["cart"]; 
foreach($cart as $item)
{    
    
    echo  "<tr>";
    echo "<td>".$item ->get_Id()."</td>";
    echo "<td>" .$item -> get_Nazev()."</td>";
    echo "<td>".$item -> get_Pocet()."</td>";
    echo "<td>".$item -> get_Cena()."</td>";
    echo "</tr>"; 

}
?>
</table>
<form method="post" action="handle_form.php">
    <input type="submit" name="submit_button" value="Nakoupit" />
</form>
        </div>
        <div class="space"></div>
    </div>
<?php include("footer.php"); ?>
</body>
</html>