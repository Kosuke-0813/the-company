<?php
  session_start();
  
  include "../classes/user.php";

  $user = new User;
  $user_details = $user->getUser($_GET["user_id"]);
  $full_name = $user_details["first_name"]. " " .$user_details["last_name"];
  // $full_name = "Micheh Paffnf";
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
<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
      <h1><a href="dashboard.php" class="navbar-brand ">The Company</a></h1>
      <div class="ml-auto">
        <ul class="navbar-nav">
            <li class="nav-item">
              <?php
                 echo "<a href='#'class='nav-link text-muted'>".$_SESSION["username"]."</a>"." ";
               ?>
            </li>
            <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Logout</a></li>
        </ul>
      </div>
    </nav>
    <main class="container" style="padding-top: 80px">
      <div class="card w-50 mx-auto border-0">
        <div class="card-header bg-white border-0">
          <h2 class="text-center text-danger">DELETE USER</h2>
        </div>
        <div class="card-body">
          <div class="text-center mb-4">
            <i class="fas fa-exclamation-triangle text-warning display-4 d-block mb-2"></i>
            <p class="font-weight-bold mb-0">Are you sure want to delete "<?= $full_name ?>"?</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <a href="dashboard.php" class="btn btn-secondary btn-block">Cancel</a>
          </div>
          <div class="col">
            <a href="../actions/delete-user.php?user_id=<?= $user_details["id"] ?>" class="btn btn-outline-danger btn-block">Delete</a>
          </div>
        </div>
      </div>
    </main>


  
  <script src="https://kit.fontawesome.com/62ab48940b.js" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>