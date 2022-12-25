<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: UAS.php");
} 
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: UAS.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
  </head>
  <body>
    <div class="container mb-3">
      <div class="card login form"></div>
      
    </div>
    
    <form class="" action="" method="post" autocomplete="off">
    <h1 class="text-center">Login</h2>
    <div class="mb-3 mt-3">
    <label for="usernameemail">Username or Email : </label>
    <input type="text" name="usernameemail" id = "usernameemail" required value="" placeholder="Username Or Email">
    </div>

    <div class="mb-3 ">
    <label for="password">Password : </label>
    <input type="password" name="password" id = "password" required value="" placeholder="Password">
    </div>
      
      <button type="submit" class="btn btn-dark btn-lg btn-block" name="submit" >Login</button>
      <h5>Don't have an account?</h5>
    <a href="registration.php">Registration</a>
    </form>
    <br>
    
  </body>
</html>

<style type="text/css">
  body{
    background-color:  rgb(217, 217, 217);
  }

  form {
        margin: 250px auto;
        width: 400px;
        padding: 10px;
        border: 3px solid #ccc;
        border-color: black;
        background: white;
    }
    input[type=text], input[type=password] {
        margin: 5px auto;
        width: 100%;
        padding: 10px;
    }
    input[type=submit] {
        margin: 5px auto;
        float: right;
        padding: 5px;
        width: 90px;
        border: 1px solid #fff;
        color: #fff;
        background: red;
        cursor: pointer;
    }

</style>