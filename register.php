<?php
// Include config file
require_once "config.php";
if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
    header("location: index.php");
    exit;
}
// Define variables and initialize with empty values
$username = $password = $confirm_password = $phone = $email= "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Zadejte jméno.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Uživatelské jméno může obsahovat pouze malá a velká písmena, číslice a podtržítko.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Uživatel s tímto jménem již existuje.";
                } else{
                    $username = trim($_POST["username"]);
                    $password = trim($_POST["password"]);
                    $email = trim($_POST["email"]);
                    $phone = trim($_POST["phone"]);
                }
            } else{
                echo "Oops! Něco se pokazilo, zkuste to znovu později (debug: inicializece).";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    

    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, Phone, Email) VALUES (?, ?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_phone, $param_email);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_phone = $phone;
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: home.php");
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
    <link rel="stylesheet" href="style.css" type="text/css" />
    <style>
        body{ font: 14px sans-serif; background-image: url("pic/loginBackground.jpeg");  background-repeat: no-repeat;
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
<?php include("nav.php");  //TODO: e-mail a telefon do databáze?>
<div class="space"></div>
    <div class="wrapper">
        <h2>Registrace</h2>
        <p>Pro registraci vyplňte formulář.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Uživatelské jméno</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Telefon</label>
                <input type="text" name="phone" pattern="[0-9]{9}" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>e-mail</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Heslo</label>
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