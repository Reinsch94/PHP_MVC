<?php

include_once("../Controllers/UsersController.php");

$bann = new UsersController();

$banned = $bann->ban($_POST['id']);

?>