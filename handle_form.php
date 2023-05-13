<?php

if (isset($_POST['submit_button'])) {
    // Volání vaší funkce nebo vykonání potřebných akcí
    WriteToDatabase();
}

// Vaše funkce, kterou chcete volat po kliknutí na tlačítko
function WriteToDatabase() {
require_once "config.php";
include("cartItem.php");
session_start();

$datum = date("Y-m-d"); // Aktuální datum ve formátu "YYYY-MM-DD"
$sql = "INSERT INTO uctenka (iduzivatele, datum, adresa) VALUES (?, ?,?)";
if($stmt = mysqli_prepare($link, $sql)){
    // přidání proměných k sql dotazu
    mysqli_stmt_bind_param($stmt, "iss", $param_idu, $param_Date, $param_addres);
    
    // Set parameters
    $param_idu = $_SESSION["id"];
    $param_Date = $datum; 
    $param_addres = "sdfdf";
    
    // pokus o provedení dotazu
    if(mysqli_stmt_execute($stmt)){
        //přesměrováné na login page, po úspěšné registraci

        $lastInsertedId = mysqli_insert_id($link);
        mysqli_stmt_close($stmt);
        $cart = $_SESSION["cart"]; 
        foreach($cart as $item)
        {
    $sql = "INSERT INTO poloznanauctence (idzbozi, mnoztvi, aktualniCena, iductenka) VALUES (?, ?,?,?)";
         
    if($stmt = mysqli_prepare($link, $sql)){
        // přidání proměných k sql dotazu
        mysqli_stmt_bind_param($stmt, "iiii", $param_Idz, $param_Mnozstvi, $param_price, $param_uctenka);
        
        // Set parameters
        $param_Idz = $item ->get_Id();
        $param_Mnozstvi = $item -> get_Pocet(); 
        $param_price = $item -> get_Cena();
        $param_uctenka = $lastInsertedId;
        if(mysqli_stmt_execute($stmt)){

        } else{
            //Error při vytváření uživatele
            echo "Oops! Něco se pokazilo, skuste to znovu později.";
        }

        // Zavření dotazu
        mysqli_stmt_close($stmt);
    }

    

}

        header("location: index.php");
    } else{
        //Error při vytváření uživatele
        echo "Oops! Něco se pokazilo, skuste to znovu později.";
    }





    // Zavření dotazu
 
}

}
?>