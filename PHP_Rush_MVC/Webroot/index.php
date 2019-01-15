<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// require("../Controllers/ArticlesController.php");
require("../Config/core.php");

$test = new Router();
$params=$test->parse();


session_start();

if(empty($_SESSION))
{
    if($_SERVER['REQUEST_URI'] != '/PHP_Rush_MVC/Users/login')
    {
        if($_SERVER['REQUEST_URI'] != '/PHP_Rush_MVC/Users/add_user')
        {
            header('Location: /PHP_Rush_MVC/Users/login');
        }
    }
}

?>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/PHP_Rush_MVC/">Blog MVC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="/PHP_Rush_MVC/Articles/home">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="/PHP_Rush_MVC/Users/login">Connexion</a>
    <?php if(isset($_SESSION["group_name"]) && $_SESSION['group_name'] == 2) :?>
      <a class="nav-item nav-link" href="/PHP_Rush_MVC/Users/show_all">Admin</a>
<?php endif; ?>
    </div>
  </div>
</nav>
</header>
</body>
<?php
$dispatch= new Dispatcher();
$dispatch->dispatch($params);
?>