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

$sql = 'INSERT INTO registeredCourses(courseName, userID) 
VALUES (' . '\'' . $courseName . '\', '.'\'' . $userID  . '\')'; 

if (mysqli_query($connection, $sql)) {
    echo "courses signed up for successfully";
    header('location: profile.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }

  mysqli_close($connection);

?>