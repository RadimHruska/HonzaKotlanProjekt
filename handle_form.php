<?php

if (isset($_POST['submit_button'])) { // Kontroluje, zda byl odeslán formulář

    WriteToDatabase(); // Volání funkce pro zápis do databáze
}

// Funkce pro zápis do databáze
function WriteToDatabase() {
    require_once "config.php"; // Načtení externího souboru config.php, který obsahuje konfiguraci databáze
    include("cartItem.php"); // Načtení souboru cartItem.php, který obsahuje třídu pro položky v košíku
    session_start(); // Spuštění session

    $datum = date("Y-m-d"); // Získání aktuálního data ve formátu "YYYY-MM-DD"

    // Příprava SQL dotazu pro vložení záznamu do tabulky "uctenka"
    $sql = "INSERT INTO uctenka (iduzivatele, datum, adresa) VALUES (?, ?,?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Vázání proměnných k SQL dotazu
        mysqli_stmt_bind_param($stmt, "iss", $param_idu, $param_Date, $param_addres);

        $param_idu = $_SESSION["id"]; // Parametr iduzivatele
        $param_Date = $datum; // Parametr datumu
        $param_addres = "sdfdf"; // Parametr adresy

        // Pokus o provedení SQL dotazu
        if (mysqli_stmt_execute($stmt)) {
            $lastInsertedId = mysqli_insert_id($link); // Získání ID posledně vloženého záznamu
            mysqli_stmt_close($stmt); // Uzavření připraveného dotazu

            $cart = $_SESSION["cart"]; // Získání košíku z session
            foreach ($cart as $item) {
                // Příprava SQL dotazu pro vložení záznamu do tabulky "poloznanauctence"
                $sql = "INSERT INTO poloznanauctence (idzbozi, mnoztvi, aktualniCena, iductenka) VALUES (?, ?,?,?)";

                if ($stmt = mysqli_prepare($link, $sql)) {
                    // Vázání proměnných k SQL dotazu
                    mysqli_stmt_bind_param($stmt, "iiii", $param_Idz, $param_Mnozstvi, $param_price, $param_uctenka);

                    $param_Idz = $item->get_Id(); // Parametr ID zboží
                    $param_Mnozstvi = $item->get_Pocet(); // Parametr množství
                    $param_price = $item->get_Cena(); // Parametr cena
                    $param_uctenka = $lastInsertedId; // Parametr ID účtenky

                    if (mysqli_stmt_execute($stmt)) {
                        // Záznam byl úspěšně vložen do databáze
                    } else {
                        echo "Oops! Něco se pokazilo, zkuste to znovu později."; // Chybová zpráva při neúspěšném provedení dotazu
                    }

                    mysqli_stmt_close($stmt); // Uzavření připraveného dotazu
                }
            }

            $_SESSION["cart"] = array(); // Vyprázdnění košíku v session
            header("location: index.php"); // Přesměrování na jinou stránku po úspěšném provedení akce
        } else {
            echo "Oops! Něco se pokazilo, zkuste to znovu později."; // Chybová zpráva při neúspěšném provedení dotazu
        }
    }
}
?>
