<?php $thisPage="Resset"; ?>
<?php
//  inicializuje sesion (paměť v prohlížeči)
session_start();
 
// zjistí jetly je uživatel přihlášený, pokud ne, přesěruje ho na domovskou stránku, protože tady nemá co dělat
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
 

// přidá konfigurační souboer config.php pro připojení k databázi
require_once "config.php";
 
// definice proměných s prázdnými řetězci (používají se pro ověření správně zadaných hodnot)
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// zpracování dat z formuláře po jeho odesláné
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Kontrola parametrů nového hesla
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Zadejte nové heslo.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Heslo musí mít nejméně šest znaků.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // kontrola shody hesel
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Prosím potvrdtě heslo.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Hesla se neschodují.";
        }
    }
        
    // kontrola chyb před pokusem o uložení dat do databáze
    if(empty($new_password_err) && empty($confirm_password_err)){
        // příprava aktualizačního sql dotazu
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // přidání proměných do dotazu
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // pokus o vykonání dotazu
            if(mysqli_stmt_execute($stmt)){
                // heslo se aktualizovalo správně, zavře sesion a přesměruje na login, pro nové přihlášení
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                //Chyba, ukáže chybu
                echo "Oops! Něco se pokazilo, skuste to znovu později.";
            }

            // zavře dotaz
            mysqli_stmt_close($stmt);
        }
    }
    
    // Czavře připojení do databáze
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>carsshop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <style>
        body{ font: 14px sans-serif; background-image: url("pic/loginBackground.jpeg");  background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 100vh;}
        .wrapper{ width: 360px;  margin: auto; margin-top:100px; padding: auto; background-color: white; padding: 20px; border-radius: 10px;   text-align: center;}
        .space{height: 10vh;}
    </style>
        <?php include("scripts.php"); ?>
</head>
<body>
<?php include("nav.php"); ?>
    <div class="wrapper">
        <h2>Změna hesla</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <label>Nové heslo</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Potvrďte nové heslo</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Potvrdit">
                <a class="btn btn-link ml-2" href="index.php">Zrušit</a>
            </div>
        </form>
    </div>    
</body>
</html>