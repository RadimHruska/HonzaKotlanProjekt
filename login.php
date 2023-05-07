<?php
//  inicializuje sesion (paměť v prohlížeči)
session_start();
 
// Zkontroluje jestly už je uživatel přihlášený, pokud ano, přesměruje ho na domovskou obrazovku
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// // přidá konfigurační soubur config.php
require_once "config.php";
 
// Definuje proměné s prázdnými řetězci (používá se pro kontrolu dat)
$username = $password = $role = "";
$username_err = $password_err = $login_err = "";
 
// zpracování dat po potvrzení formuláře
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Kontroluje jestly je vyplněné uživatelské jméno
    if(empty(trim($_POST["username"]))){
        $username_err = "Prosím zadejte uživatelské jméno.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Kontroluje jestly je vyplněné hesko
    if(empty(trim($_POST["password"]))){
        $password_err = "Prosím zadejte heslo.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // ověření přihlašovacích údajů
    if(empty($username_err) && empty($password_err)){
        // příprava sql select dotazu
        $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // přidání proměných k dotazu
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // nastavení parametrů dozazu
            $param_username = $username;
            
            // pokus o vykonání dotazu na přihlášení
            if(mysqli_stmt_execute($stmt)){
                // uložení výsledku
                mysqli_stmt_store_result($stmt);
                
                // zkontroluje jestly existuje uživatel, pokud ano, pokračuje se ke kontrole hesla
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // připojení výsledků k proměným
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // heslo je zprávné
                            session_start();
                            
                            // Uložení všech dat do sesion proměných
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; 
                            $_SESSION["role"] = $role;                             
                            
                            // přesměrování na home page
                            header("location: index.php");
                        } else{
                            //Chyby při přihlášení, zobrazí error
                            $login_err = "Nesprávné uživatelské jméno nebo heslo.";
                        }
                    }
                } else{
                    // Uživatel neexistuje, zobrazí se chyba
                    $login_err = "Nesprávné uživatelské jméno nebo heslo.";
                }
            } else{
                echo "Oops! Něco se pokazilo, skuste to znovu později.";
            }

            // zavře dotaz
            mysqli_stmt_close($stmt);
        }
    }
    
    //zavře připojení
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <style>
        body{ font: 14px sans-serif; background-image: url("pic/loginBackground.jpeg");  background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 100vh;}
        .wrapper{ width: 360px;  margin: auto; padding: auto; background-color: white; padding: 20px; border-radius: 10px;   text-align: center;}
        .space{height: 10vh;}

    </style>
        <?php $thisPage="login"; ?>
    <?php include("scripts.php"); ?>
</head>
<body>
<?php include("nav.php");?>
    <div class="space"></div>
    <div class="wrapper">
        <h2>Chmela Cars Shop</h2>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Uživatelské jméno</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Heslo</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Přihlásit">
            </div>

        </form>
    </div>
</body>
</html>