<?php
include_once("../Controllers/ArticlesController.php");
$article = new ArticlesController();
$delete = $article->delete($_POST['id']);
?>