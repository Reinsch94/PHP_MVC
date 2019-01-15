<?php

include_once("../Controllers/UsersController.php");

$user = new UsersController();

$delete = $user->delete($_POST['id']);

?>

