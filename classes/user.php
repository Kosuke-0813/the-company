<?php
include "database.php";
class User extends Database{
  public function createUser($first_name, $last_name, $username, $password){
    // query command
    $sql ="INSERT INTO users(`first_name`, `last_name`, `username`, `password`, `photo`) VALUES ('$first_name', '$last_name', '$username', '$password', 'default.png')";

    // execute
    if ($this->conn->query($sql)){
      // redirect to Views

      header("location: ../views");
      exit;
    }else{
      die("Error creating user: ".$this->conn->error);
    }



  }

  public function login($username, $password){
    $sql = "SELECT id, username, `password` from users where username = '$username'";

    if($result = $this->conn->query($sql)){
      // print_r($user_details);
      if($result->num_rows == 1){
        // username is found
        $user_details = $result->fetch_assoc();
        // fetch the result as an associative array.
        // print_r($user_details);
        if(password_verify($password, $user_details["password"])){
          session_start();

          $_SESSION["user_id"] = $user_details["id"];
          $_SESSION["username"] = $user_details["username"];

          header("location: ../views/dashboard.php");
          exit;
        }else{
          // password is incorect.
          die("Password is incorrect.");
        }
      }else{
        // Username dose not exist
        die("Username not found.");
      }
    }else{
      // SELECT query failed.
    }
  }

  public function getAllusers($user_id){
    $sql = "SELECT id, first_name, last_name, username FROM users WHERE id != $user_id ";

    if($result = $this->conn->query($sql)){
      // expecting one or more rows

      return $result;
    }else{
      die("Error retrieving all users: ".$this->conn->error);
    }
  }

  public function getUser($user_id){
    
    $sql = "SELECT id, first_name, last_name, username, photo from users where id = $user_id";

    if($result = $this->conn->query($sql)){
      // expecting one row only
      return $result->fetch_assoc();
    }else{
      die ("Error retrieving user: ".$this->conn->error);
    }
  }

  public function updateUser($user_id, $first_name, $last_name, $username){
    $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' where id = $user_id";

    if($this->conn->query($sql)){
      header("location: ../views/dashboard.php");
      exit;
    }else{
      die("Error saving your change: ". $this->conn->error);
    }
  }

  public function deleteUser($user_id){
    $sql = "DELETE from users where id = $user_id";

    if($this->conn->query($sql)){
      header("location: ../views/dashboard.php");
      exit;
    }else{
      die("Error deleting user: ".$this->conn->error);
    }
  }

  public function updatePhoto($user_id, $image_name, $tmp_name){
    $sql = "UPDATE users SET photo = '$image_name' where id = $user_id ";

    if ($this->conn->query($sql)){

      $destination = "../images/$image_name";
      if(move_uploaded_file($tmp_name, $destination)){
        header ("location: ../views/profile.php?upload=success");
        exit;
      }else{
        die ("Error moving the photo.");
      }
    }else{
      die ("Error uploading photo". $this->conn->error);
    }
  }
}



?>