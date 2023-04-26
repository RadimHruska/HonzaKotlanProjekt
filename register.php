<?php
// Přidá konfigurační soubor config.php
require_once "config.php";
if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
    header("location: index.php");
    exit;
}
// definice proměných pro zápis do databáze
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// zpracovává data po potvrzení formuláře
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Zadejte jméno.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Uživatelské jméno může obsahovat pouze malá a velká písmena, číslice a podtržítko.";
    } else{
        // kontrola duplicity jmen?
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // přidá username jako parametr s
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Uživatel s tímto jménem již existuje.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Něco se pokazilo, zkuste to znovu později.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    

    
    // Zkontroluje chyby v databázi
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // příprava insert dotazu
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Nastavení parametrů
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Vytvoření hashe hesla (bazpečtnostní praktika pro uchování hesel, tak aby se nedaly ukrást)
            
            // provede sql command
            if(mysqli_stmt_execute($stmt)){
                // Přesněruje na indes page po registaci
                header("location: index.php");
            } else{
                echo "Oops! Něco se pokazilo, skuste to znovu později.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif;  background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 100vh;}
        .wrapper{ width: 360px;  margin: auto; padding: auto; background-color: white; padding: 20px; border-radius: 10px;   text-align: center;}
        .space{height: 10vh;}

    </style>
    <?php $thisPage="Register"; ?>
    <?php include("scripts.php"); ?>
</head>
<body>
<?php include("nav.php"); ?>
<div class="space"></div>
    <div class="wrapper">
        <h2>Registrace</h2>
        <p>Pro registraci dalšího zákazníka vyplňtě tento formulář.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Příjmení</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registrovat">
            </div>
        </form>
    </div>    
</body>
</html>