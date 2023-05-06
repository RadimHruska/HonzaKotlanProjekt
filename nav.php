<nav>  
<ul>
<li>
<a href="home.php" <?php if ($thisPage=="Home") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-house" style="color: #000000;"></i> Domů</a>
<a href="stravenky.php" <?php if ($thisPage=="MealTickets") 
echo " id=\"currentpage\""; ?>> <i class="fa-solid fa-receipt" style="color: #000000;"></i> Stravenky</a>


<a href="Users.php" <?php if ($thisPage=="Users") 
echo " id=\"currentpage\""; ?>> <i class="fa-solid fa-users" style="color: #000000;"></i> Uživatelé</a>

<a href="reset-password.php" <?php if ($thisPage=="Resset") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-key" style="color: #000000;"></i> Změna hesla</a>
<a href="logout.php" <?php if ($thisPage=="Logout") 
echo " id=\"currentpage\""; ?>> <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ff0000;"></i>  Odhlásit</a></li>

       </nav>