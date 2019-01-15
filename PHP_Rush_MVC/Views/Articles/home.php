<?php 
include_once("../Controllers/ArticlesController.php");

$article = new ArticlesController();
$var = $article->home();

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
    <div class="container">
    <table class = "table table-hover myTable">
    <thead class = "thead-light">
    <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Content</th>
    <th>Category_id</th>

    <th class="text-center">Options</th>
    </tr>
    </thead>
<?php
    foreach($var as $row)
{
    
    ?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['content'];?></td>
        <td><?php echo $row['category_id'];?></td>
        <td class="text-right">
        <?php if(isset($_SESSION["group_name"]) && $_SESSION['group_name'] != 0) :?>

        <a class="btn btn-outline-danger" href="/PHP_Rush_MVC/Articles/delete/<?php echo $row['id']?>"> Delete </a>
        <a class="btn btn-outline-success" href="/PHP_Rush_MVC/Articles/update/<?php echo $row['id']?>"> Edit </a>
        <?php endif; ?>

        <a class="btn btn-outline-primary" href="/PHP_Rush_MVC/Articles/show/<?php echo $row['id']?>"> Show </a>
        
        </td>
    </tr>

<?php	
}
?>
