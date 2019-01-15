<?php

include_once("../Controllers/UsersController.php");

$update = new UsersController();

$up = $update->update($id);

?>

<form action="" method="post">
<fieldset>
    <legend>Update</legend>

    Username : 
    <input name="username" type="text" placeholder="Username" minlength="3" maxlength="10" value="<?php echo $task['username'];?>"><br>
    <!-- <small>Entre 3 et 10 caractères.</small> -->

    Email : 
    <input name="email" type="email" minlength="8" maxlength="20" value="<?php echo $task['email'];?>"><br>
    <!-- <small>Entre 8 et 20 caractères.</small> -->

    
    Group:
    <input type="radio" name="group" value=0>User
    <input type="radio" name="group" value=1>Writer
    <input type="radio" name="group" value=2>Admin
    <br>


    Status:
    <input type="radio" name="status" value=0>Ok
    <input type="radio" name="status" value=1>Ban
    <br>

    

    Password : 
    <input name="password" type="password" > <br>

    Confirmation : 
    <input name="password_conf" type="password" > <br>

    <button type="submit">Send</button>
</fieldset>

</form>
