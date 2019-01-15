<?php

include_once("../Controllers/UsersController.php");

$user = new UsersController();

$delete = $user->show($id);

?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <body>
    <div class="container">
    <table class = "table table-hover myTable">
    <thead class = "thead-light">
    <tr>
    <th>Username</th>
    <th>Email</th>
    <th>Creation date</th>
    <th>Modification date</th>
    <th>Group name</th>
    <th>Status</th>
    <th>id</th>
    <th class="text-center">Options</th>
    </tr>
    </thead>


    
    <tr>
        <td><?php echo $show2['username'];?></td>
        <td><?php echo $show2['email'];?></td>
        <td><?php echo $show2['creation_date'];?></td>
        <td><?php echo $show2['modification_date'];?></td>
        <td><?php echo $show2['group_name'];?></td>
        <td><?php echo $show2['status'];?></td>
        <td><?php echo $show2['id'];?></td>
        <td class="text-right">
        <a class="btn btn-outline-danger" href="/PHP_Rush_MVC/Users/delete/<?php echo $show2['id']?>"> Delete </a>
        <a class="btn btn-outline-success" href="/PHP_Rush_MVC/Users/update/<?php echo $show2['id']?>"> Edit </a>
        <a class="btn btn-outline-primary" href="/PHP_Rush_MVC/Users/show/<?php echo $show2['id']?>"> Show </a>

        <td>
    </tr>
    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </table>
    </div>