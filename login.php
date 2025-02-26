<?php
/*configruation*/

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'aditya1';

/*establish data connection */
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

/* check for connection error */
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/*check if form is submited */
if (isset($_POST['sb'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    /* valid ata user input */
    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        /*prepae and exicute the query*/
        $query = "INSERT INTO adii (username, password) VALUES ('$username', '$password')";
        $run = mysqli_query($conn, $query);

        /* check if query is exicuted */
        if (!$run) {
            die("Query failed: " . mysqli_error($conn));
        } else {
            echo "User  created successfully";
        }
    }
}

/* close the data base connection */
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Andev Web</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="adii.php" method="post">
  <canvas id="matrixCanvas"></canvas>
  <section>
    <div class="signin">
      <div class="content">
        <h2>Login</h2>
        <div class="form">
          <div class="inputBox">
            <input type="text" name="username" required>
            <i>Username</i>
          </div>
          <div class="inputBox">
            <input type="password" name="password" required>
            <i>Password</i>
          </div>
          <div class="links">
            <a href="#">Forgot Password</a>
            <a href="#">Register</a>
          </div>
          <div class="inputBox">
            <input type="submit" name="sb" value="Login">
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="script.js"></script>
    </form>
</body>
</html>
            