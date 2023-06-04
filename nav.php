<?php
// přidá konfigurační soubur config.php
require_once "config.php";

//Zkontroluje zda je uživatel přihlášen, pokud ne ukáže navigaci pro nepřihlášeného uživatele
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
?>
<nav>  
<ul>
<li>

<img src="pic/Untitled.png" width="5%" alt="">

<a href="index.php" <?php if ($thisPage=="Home") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-house" style="#000000;"></i> Domů</a>


<a href="tricka.php" <?php if ($thisPage=="Dil") 
echo " id=\"currentpage\""; ?>> Trička</a>

<a href="kalhoty.php" <?php if ($thisPage=="Dodavka") 
echo " id=\"currentpage\""; ?>> Kalhoty</a>

<a href="boty.php" <?php if ($thisPage=="Doplnek") 
echo " id=\"currentpage\""; ?>>Boty</a>

<a href="login.php" <?php if ($thisPage=="login") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-right-to-bracket" style="#000000;"></i> Přihlásit</a>

<a href="register.php" <?php if ($thisPage=="register") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-user-plus" style="#000000;"></i> Register</a>
</nav>
<?php       
}
else
{
    //pokud je uživatel přihlášený a není admin, ukáže se mu menu pro neadmina
    if(!isset($_SESSION["loggedin"]) || $_SESSION["role"] == 1){
        ?>    
<nav>  
<ul>
<li>
<img src="pic/Untitled.png" width="5%" alt="">
<a href="index.php" <?php if ($thisPage=="Home") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-house" style="#000000;"></i> Domů</a>

<a href="tricka.php" <?php if ($thisPage=="Dil") 
echo " id=\"currentpage\""; ?>> Trička</a>

<a href="kalhoty.php" <?php if ($thisPage=="Dodavka") 
echo " id=\"currentpage\""; ?>>Kalhoty</a>

<a href="boty.php" <?php if ($thisPage=="Doplnek") 
echo " id=\"currentpage\""; ?>> Boty</a>



<a href="reset-password.php" <?php if ($thisPage=="Resset") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-key" style="#000000;"></i> Změna hesla</a>


<a href="logout.php" <?php if ($thisPage=="logout") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-right-from-bracket" style="#000000;"></i> Odhlásit</a>

<a href="cart.php" <?php if ($thisPage=="cart") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-cart-shopping" style="color: #000000;"></i></a>

<a  href="itemsInCart.php" <?php if ($thisPage=="userPage") 
echo " id=\"currentpage\""; ?>><?php echo  $_SESSION["username"];?></a>






</nav>
 <?php  

    }
    else{
        //ve všech ostatních případech je uživatel admin a ukáže se mu menu pro admina
        ?>    
<nav>  
<ul>
<li>
<img src="pic/Untitled.png" width="5%" alt="">
<a href="index.php" <?php if ($thisPage=="Home") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-house" style="#000000;"></i> AdminDomů</a>

<a href="reset-password.php" <?php if ($thisPage=="Resset") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-key" style="#000000;"></i> Změna hesla</a>


<a href="logout.php" <?php if ($thisPage=="logout") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-right-from-bracket" style="#000000;"></i> Odhlásit</a>
<a  <?php if ($thisPage=="logout") 
echo " id=\"currentpage\""; ?>><?php echo  $_SESSION["username"];?></a>
</nav>




        <?php  
    }
}
?>
