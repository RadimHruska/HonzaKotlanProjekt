<?php
session_start();
// přidá konfigurační soubor config.php
require_once "config.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] != 2){
    header("location: index.php");
    exit;
}

// inicializuje proměné s prázdnými řetězci
$username = $password = $confirm_password = $phone = $email= "";
$username_err = $password_err = $confirm_password_err = "";
 
// zpracování dat, po tom co je potvrzen formulář
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // kontrola vstupních chyb před pokusem o zápis
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO zbozi (nazev, typ, cena, pocet, pic, description) VALUES (?, ?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // přidání proměných k sql dotazu
            mysqli_stmt_bind_param($stmt, "ssiiss", $param_name, $param_typ, $param_cena, $param_pocet,$param_pic ,$param_des);
            
            // Set parameters
            $param_name = $_POST['name'];
            $param_typ = $_POST['type'];
            $param_cena = $_POST['cost'];
            $param_pocet = $_POST['amount'];
            $param_pic = $_POST['url'];
            $param_des = $_POST['des'];
            
            // pokus o provedení dotazu
            if(mysqli_stmt_execute($stmt)){
                //přesměrováné na login page, po úspěšné registraci
                header("location: login.php");
            } else{
                //Error při vytváření uživatele
                echo "Oops! Něco se pokazilo, skuste to znovu později.";
            }

            // Zavření dotazu
            mysqli_stmt_close($stmt);
        }
    }
    
    // Zavření připojení
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hadry</title>
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
    <?php $thisPage="register"; ?>
    <?php include("scripts.php"); ?>
</head>
<body>
<?php include("nav.php");?>
<div class="space"></div>
    <div class="wrapper">
        <h2>Přidat produkt</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Název</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>typ</label>
                <select name="type">
                <option value="tricka">Tričko</option>
                <option value="boty">Boty</option>
                <option value="kalhoty">Kalhoty</option>
                </select>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>cena</label>
                <input type="number" name="cost" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>pocet</label>
                <input type="number" name="amount" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>url Obrázku</label>
                <input type="text" name="url" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Popis</label>
                <textarea name="des" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>"></textarea>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Přidat">
            </div>
        </form>
    </div>  
    <?php include("footer.php"); ?>  
</body>
</html>