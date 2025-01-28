<?php 

include 'autoloader.php';

session_start();


$email = $_GET['email'];
$pwd = $_GET['pwd'];
$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];
$userID = $_GET['userID'];


$host = "localhost";
$database = "CST499";
$user = "root";
$pass = "";

$connection = mysqli_connect($host, $user, $pass, $database);

if (!$connection){
    die("unable to connect" . mysqli_connecterror());
} 

$sql = 'INSERT INTO tblStudent (userID, firstName, lastName, email, password) 
VALUES(' . '\'' . $userID . '\',' . '\'' . $firstName . '\', ' . '\'' . $lastName . '\', ' . '\'' . $email . '\', ' . '\'' . $$pwd . '\', ' . ')';


if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
    header('location: login.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }

  mysqli_close($connection);

?>

