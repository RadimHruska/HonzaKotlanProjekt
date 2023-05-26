<?php
//přidá třídu cartItem která se musí přidat před prací s košíkem, jinak nebudou v košíku vidět správně položky
include("cartItem.php");
//nastartuje sesion, což je pamět v prohlížeči
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Carsshop</title>
    <?php //přidá skrypty potřebné pro ikonky
    include("scripts.php"); ?>
</head>
<?php //nastaví proměnou thisPage na název stránky, aby se v navigaci zobrazovalo zvíraznění 
$thisPage="cart"; ?>

<body>
<?php
//přidá navigaci
include("nav.php"); ?>
<?php
?>
    <!-- element který se stará o centrování obsahu na stránce-->
    <div id="obalovaci">
        <!--Prostě jenom mezera-->
    <div class="space"></div>
    <!-- Blok pozadí za obsahem stránky (to bílé)-->
        <div id="backgroundBlock">
            <!--Tabulka ve které se vypisují položky košíku-->
<table style="margin: auto;">
            <!--Nadpis tabulky tr a ve vnitř její jednotlivé buňky th-->
<tr>
        <th>Id</th>
        <th>Produkt</th>
        <th>Počet</th>
        <th>Cena</th>
</tr>

<?php
//načtení košíku se sesion do proměnné cart, pro lepší práci s daty
$cart = $_SESSION["cart"]; 

//cyklus pro výpis jednotlivých položek v poly cart
foreach($cart as $item)
{    
    //každá položka v košíku je objekt (instance třídy cartItem), košík je potom pole těchto tříd
    //my bereme, pomocí cyklu foreach, každá objekt z tohoto pole a zpracovávámé ho
    //každá proměná v tom objektu se nastavuje a získavají se z ní data pomocí metod, co jsou tam napsané
    //my zde používáme metody pro získání jednotlivých proměných z objektu, který je schovaný v proměné item
    echo  "<tr>";
    echo "<td>".$item ->get_Id()."</td>";
    echo "<td>" .$item -> get_Nazev()."</td>";
    echo "<td>".$item -> get_Pocet()."</td>";
    echo "<td>".$item -> get_Cena()."</td>";
    echo "</tr>"; 

}
?>
</table>
<!--formulář, jehož jediným účelem je potvrdit že chce uživatel nakoupit a provede akci v souboru handle_form.php-->
<form method="post" action="handle_form.php">
    <input type="submit" name="submit_button" value="Nakoupit" />
</form>
        </div>
        <div class="space"></div>
    </div>
<?php //přidá patičku webu
 include("footer.php"); ?>
</body>
</html>