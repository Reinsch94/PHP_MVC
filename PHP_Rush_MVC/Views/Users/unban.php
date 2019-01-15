<?php

include_once("../Controllers/UsersController.php");

$unbann = new UsersController();

$unbanned = $unbann->unban($_POST['id']);

?>