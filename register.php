<?php 

session_start();
$_SESSION['email'] = $email;
$_SESSION['pwd'] = $pwd;
$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['userID'] = $userID;
$_SESSION['major'] = $major;


include 'autoloader.php';

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
 <a class="navbar-brand" href="#">Student Portal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Home <span class="sr-only"></span></a>
      <a class="nav-item nav-link" href="login.php">Login</a>
      <a class="nav-item nav-link active" href="register.php">Register</a>
      <a class="nav-item nav-link" href="catalog.php">Course Catalog</a>
      <a class="nav-item nav-link" href="contactUs.php">Contact Us</a>
    </div>
  </div>
</nav>
</head>
<h1>Register here</h1>
<body>
    <form action="Rcomplete.php">

    <label for="email">Email</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="pwd">Password</label>
    <input type="text" id="pwd" name="pwd"><br><br>

    <label for="firstName">First Name</label>
    <input type="text" id="firstName" name="firstName"><br><br>

    <label for="lastName">Last Name</label>
    <input type="text" id="lastName" name="lastName"><br><br>

    <label for="userID">Unique User ID</label>
    <input type="text" id="userID" name="userID"><br><br>

    <input type="submit" value="submit"><br><br>

    </form>
</body>
</html>