<?php
  session_start();
  include "../classes/user.php";

  // object 
  $users = new User;
  $user_list = $users->getAllUsers($_SESSION["user_id"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Dashboard</title>
</head>
<body class="bg-light">
  <div style="heght: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
      <h1><a href="dashboard.php" class="navbar-brand ">The Company</a></h1>
      <div class="ml-auto">
        <ul class="navbar-nav">
            <li class="nav-item">
              <?php
                 echo "<a href='profile.php' class='nav-link text-muted'>".$_SESSION["username"]."</a>"." ";
               ?>
            </li>
            <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="row">
    <div class="col-6 mx-auto mt-5">
        <h2 class="text-muted">User List</h2>
       <table class="table table-sm">
         <thead class="bg-secondary">
           <tr>
             <th>#</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Username</th>
             <th></th>
             <th></th>
             <th></th>
           </tr>
          </thead>
          <tbody>
            <?php
              while($user_details = $user_list->fetch_assoc()){
            ?>
            <tr>
              <td><?= $user_details["id"]?></td>
              <td><?= $user_details["first_name"]?></td>
              <td><?= $user_details["last_name"]?></td>
              <td><?= $user_details["username"]?></td>
              <td><a href="edit-user.php?user_id=<?= $user_details["id"] ?>" class="text-warning"><i class="fas fa-pen-square"></i></a></td>
              <td><a href="delete-user.php?user_id=<?= $user_details["id"] ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
              <td></td>
            </tr>
            <?php
              }
            ?>
           </tbody>
        </table>
        </div>
    </div>
  </div>


  
  <script src="https://kit.fontawesome.com/62ab48940b.js" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>