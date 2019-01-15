<?php
include_once("../Controllers/ArticlesController.php");
include_once("../Controllers/CategoryController.php");
$Article = new ArticlesController();
$category= new CategoryController();
$var=$category->homecat();
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
    <label class="form-group mb-2" >Titre Article</label>
    <input type="text" class="form-control form-control-sm" name="title" placeholder="Title">
  </div>
  <div class="">
    <label >Content</label>
    <textarea class="form-control" name="content" rows="10"></textarea>
  </div>
  <div class="">
    <label for="exampleFormControlSelect1">Catégorie</label>
    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
  <?php
    foreach($var as $row)
    {
    ?>
      <option value=<?php echo $row['id'];?> ><?php echo $row['id'].": ".$row['name'];?></option>
    <?php
    }
    ?>
    </select>
  </div>
  <div>
  <input type="submit" value="send">
    </div>
</form>
    
</body>
</html>