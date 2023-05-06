<?php
// Include config file
require_once "config.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
?>
<nav>  
<ul>
<li>
<a href="index.php" <?php if ($thisPage=="Home") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-house" style="color: gray;"></i> Domů</a>

<a href="login.php" <?php if ($thisPage=="login") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-right-to-bracket" style="color: gray;"></i> Přihlásit</a>

<a href="register.php" <?php if ($thisPage=="register") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-user-plus" style="color: gray;"></i> Register</a>
</nav>
<?php       
}
else
{
    if(!isset($_SESSION["loggedin"]) || $_SESSION["role"] == 1){
        ?>    
<nav>  
<ul>
<li>
<a href="index.php" <?php if ($thisPage=="Home") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-house" style="color: gray;"></i> Domů</a>

<a href="reset-password.php" <?php if ($thisPage=="Resset") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-key" style="color: gray;"></i> Změna hesla</a>


<a href="logout.php" <?php if ($thisPage=="logout") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-right-from-bracket" style="color: gray;"></i> Odhlásit</a>
</nav>




        <?php  

    }
    else{
        ?>    
<nav>  
<ul>
<li>
<a href="index.php" <?php if ($thisPage=="Home") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-house" style="color: gray;"></i> Domů</a>

<a href="reset-password.php" <?php if ($thisPage=="Resset") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-key" style="color: gray;"></i> Změna hesla</a>


<a href="logout.php" <?php if ($thisPage=="logout") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-right-from-bracket" style="color: gray;"></i> Odhlásit</a>
</nav>




        <?php  
    }
}
?>
