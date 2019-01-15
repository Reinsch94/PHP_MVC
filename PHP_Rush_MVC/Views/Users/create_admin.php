<?php

include_once("../Controllers/UsersController.php");

$user = new UsersController();


?>

<form action="" method="post">
<fieldset>
    <legend>Create</legend>

    Username : 
    <input name="username" type="text" placeholder="Username" minlength="3" maxlength="10"> <br>
    <!-- <small>Entre 3 et 10 caractères.</small> -->

    Email : 
    <input name="email" type="email" minlength="8" maxlength="20"><br>
    <!-- <small>Entre 8 et 20 caractères.</small> -->

    Password : 
    <input name="password" type="password" > <br>

    Confirmation : 
    <input name="password_conf" type="password" > <br>

    Group :
    <input type="radio" name="group" value=0 checked> User<br>
    <input type="radio" name="group" value=1> Writer<br>
    <input type="radio" name="group" value=2> Admin  

    <button type="submit">Send</button>
</fieldset>


?>