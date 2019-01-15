<?php 
include_once("../Controllers/ArticlesController.php");
$article = new ArticlesController();
$var = $article->update($id);
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
<body>
<form method="post">
  <div class="form-inline">
    <input type="text" class="form-control form-control-sm" name="title" placeholder="Title" value="<?php echo $var['title']?>">
  </div>
  <div class="">
    <label >Content</label>
    <textarea class="form-control" name="content" rows="10"><?php echo $var['content']?></textarea>
  </div>
  <a class="btn btn-outline-primary" href="/PHP_Rush_MVC/Articles/home"> Back </a>
  <button class="btn btn-outline-primary" type="submit"> Update</button>
  