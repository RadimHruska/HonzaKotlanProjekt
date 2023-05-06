<nav>  
<ul>
<li>
<a href="home.php" <?php if ($thisPage=="Home") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-house" style="color: gray;"></i> Domů</a>
<a href="stravenky.php" <?php if ($thisPage=="MealTickets") 
echo " id=\"currentpage\""; ?>> <i class="fa-solid fa-receipt" style="color: gray;"></i> Stravenky</a>


<a href="Users.php" <?php if ($thisPage=="Users") 
echo " id=\"currentpage\""; ?>> <i class="fa-solid fa-users" style="color: gray;"></i> Uživatelé</a>

<a href="reset-password.php" <?php if ($thisPage=="Resset") 
echo " id=\"currentpage\""; ?>><i class="fa-solid fa-key" style="color: gray;"></i> Změna hesla</a>
<a href="logout.php" <?php if ($thisPage=="Logout") 
echo " id=\"currentpage\""; ?>> <i class="fa-solid fa-arrow-right-from-bracket" style="color: gray;"></i>  Odhlásit</a></li>

       </nav>