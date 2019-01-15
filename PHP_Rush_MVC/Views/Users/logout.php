<?php

include_once("../Controllers/UsersController.php");

$user = new UsersController();

$logout = $user->logout();

?>