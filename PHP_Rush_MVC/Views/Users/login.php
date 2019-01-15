<?php

include_once("../Controllers/UsersController.php");

$login = new UsersController();

session_start();
?>

<form action="" method="post">
<fieldset>
    <legend>Login</legend>

    Username : 
    <input name="username" type="text" placeholder="Username" minlength="3" maxlength="10"> <br>

    Email :
    <input name="email" type="text" placeholder="your@email.com"><br>

    Password : 
    <input name="password" type="password" > <br>

    Remember me:
    <input type="checkbox" name="remember_me"><br>
    
    <button type="submit">Login</button><br>

    <a type="button" href="/PHP_Rush_MVC/Users/logout"> Logout </a><br>


    Pas encore inscrit ? <br>
    <a type="button" href="/PHP_Rush_MVC/Users/add_user">Inscription</a>
    </fieldset>