<?php
  session_start();

  include "../classes/user.php";

  $user = new User;
  $user_details = $user->getUser($_SESSION["user_id"]);

  $success ="<p class='alert alert-success text-center'>Photo uploaded successfully</p>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Profile</title>
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
    <?php
    if (!empty($_GET["upload"]) && $_GET["upload"] == "success"){
      echo $success;
    }
    ?>
    <main class="card w-25 mx-auto my-5">
      <img src="../images/<?= $user_details["photo"] ?>" alt="Profile Picture" class="card-img-top">
      <div class="card-body">
        <form action="../actions/upload-photo.php" method="post" enctype="multipart/form-data">
          <div class="custom-file mb-2">
            <label for="photo" class="custom-file-label">Choose Photo</label>
            <input type="file" name="photo"  id="photo" class="custom-file-input" required>
          </div>
          <button type="submit" class="btn btn-outline-secondary btn-sm btn-block">Update Photo</button>
        </form>
      </div>
      <div class="card-footer border-0 bg-white">
        <p class="lead font-weight-bold bg-0"><?= $user_details["first_name"]." ". $user_details["last_name"] ?></p>
        <p class="lead"><?= $user_details["username"] ?></p>
      </div>
    </main>


  
  <script src="https://kit.fontawesome.com/62ab48940b.js" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>