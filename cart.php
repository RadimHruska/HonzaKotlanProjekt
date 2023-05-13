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
<?php $thisPage="cart"; ?>

<body>
<?php
//přidá navigaci a home menu
include("nav.php"); ?>



<?php
$cartItems = 0;
$cart = $_SESSION["cart"]; 
?>
<table>
<tr>
        <th>Id produktu</th>
        <th>Produkt</th>
        <th>Počet</th>
        <th>Cena</th>
</tr>

<?php
include("cartItem.php");
foreach($cart as $item)
{
    //$item = unserialize($SerItem);
    //echo  "<tr>";
    //echo "<td>".$item -> get_Id."</td>";
    //echo "<td>" .$item -> get_Nazev."</td>";
    //echo "<td>".$$item -> get_Pocet."</td>";
    //echo "<td>".$$item -> get_Cena."</td>";
    //echo "</tr>"; 
    echo "<pre>";
    print_r($_SESSION['cart']); 
    echo "</pre>";
}
?>
</table>
<?php include("footer.php"); ?>
</body>
</html>