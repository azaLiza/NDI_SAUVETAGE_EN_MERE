<?php
// Alert to show off for invalid arguments
$showAlert = false;
$showError = false;
$exists = false;

//POST METHOD Yaf_Request_Abstract
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // code...
  //Include file which makes the database connection
  include 'connectionDB.php';

  //Attributes for user registration
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];

  // Check if the user exists dba_firstkey
  $sqlGetUsers = "SELECT * FROM Utilisateur WHERE pseudo='$username'";

  $result = mysqli_query($conn, $sqlGetUsers);
  $num = mysqli_num_rows($result);

  // This sql query is use to check if
    // the username is already present
    // or not in our Database
    if ($num == 0) {
      // code...
      if (($password == $confirmPassword) && $exists == false) {
        // code...
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sqlInsertUser = "INSERT INTO Utilisateur (pseudo, mail, motDePasse, access) VALUES ('$username', 'mail', '$password', 1)";


        $result = mysqli_query($conn, $sqlInsertUser);

        if ($result) {
          // code...
          $showAlert = true;
        }
      } else {
        $showError = "Passwords do not match";
      }
    }

    if ($num > 0) {
      // code...
      $exists = "The username is not available";
    }
}
 ?>

 <!doctype html>

<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1,
        shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity=
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">
</head>

<body>

<?php

    if($showAlert) {

        echo ' <div class="alert alert-success
            alert-dismissible fade show" role="alert">

            <strong>Success!</strong> Your account is
            now created and you can login.
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
    }

    if($showError) {

        echo ' <div class="alert alert-danger
            alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'

       <button type="button" class="close"
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span>
       </button>
     </div> ';
   }

    if($exists) {
        echo ' <div class="alert alert-danger
            alert-dismissible fade show" role="alert">

        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close"
            data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
       </div> ';
     }

?>

<div class="container my-4 ">

    <h1 class="text-center">Signup Here</h1>
    <form action="register_form.php" method="POST">

        <div class="form-group">
            <label for="username">Username</label>
        <input type="text" class="form-control" id="username"
            name="username" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control"
            id="password" name="password">
        </div>

        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control"
                id="confirmPassword" name="confirmPassword">
        </div>

        <button type="submit" class="btn btn-primary">
        SignUp
        </button>
    </form>
</div>

</body>
</html>
