<?php 

include 'autoloader.php';

session_start();

$courseName = $_GET['course'];
$userID = $_GET['user'];

$host = "localhost";
$database = "CST499";
$user = "root";
$pass = "";



$connection = mysqli_connect($host, $user, $pass, $database);

if (!$connection){
    die("unable to connect" . mysqli_connecterror());
} 

$sql = 'DELETE FROM registeredCourses
WHERE courseName = '. '\'' . $courseName . '\''.' AND userID = ' . '\''. $userID . '\''; 

if (mysqli_query($connection, $sql)) {
    echo "courses removed ";
    header('location: profile.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }

  mysqli_close($connection);

?>