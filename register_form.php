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
  $sqlGetUsers = "SELECT * FROM Utilisateur WHERE username='$username'";

  $result = mysqli_query($conn, $sqli);
  $num = mysqli_num_rows($result);

  // This sql query is use to check if
    // the username is already present
    // or not in our Database
    if ($num == 0) {
      // code...
      if (($password == $confirmPassword) && $exists == false) {
        // code...
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sqlInsertUser = "INSERT INTO 'Utilisateur' ( 'pseudo', 'mail', 'motDePasse') values ('$username', '$email', '$hash')";

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
