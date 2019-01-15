<?php 
include_once("../Controllers/ArticlesController.php");
$article = new ArticlesController();
$var = $article->show($id);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<div class="container">
    <table class = "table table-hover myTable">
    <h1> <?php echo $var['title'];?><span class="badge badge-secondary"></span></h1>

<div class="container">
    <label for="exampleFormControlTextarea1"></label>

    <div class="d-print-none"><?php echo $var['content'];?>
</div>
  <a class="btn btn-outline-primary" href="/PHP_Rush_MVC/Articles/home"> Back </a>