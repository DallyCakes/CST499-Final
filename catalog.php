<?php 

include 'autoloader.php';

session_start();

if (!isset($_SESSION['userID'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSSION['userID']);
  header("location: login.php");
}


$userID = $_SESSION['userID'];

$host = "localhost";
$database = "CST499";
$user = "root";
$pass = "";

$connection = mysqli_connect($host, $user, $pass, $database);

function fetchCourses($connection)
{
	$sql = "select * from catalog";

	$result = mysqli_query($connection, $sql);
	if($result && mysqli_num_rows($result) > 0)
	{
		return $result;
	}
	die;
}

$courses = fetchCourses($connection);

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
      <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only"></span></a>
      <a class="nav-item nav-link" href="profile.php">Profile</a>
      <a class="nav-item nav-link" href="catalog.php">Course Catalog</a>
      <a class="nav-item nav-link" href="contactUs.php">Contact Us</a>
    </div>
  </div>
</nav>
</head>
<h1>Course catalog</h1>
<body>
<?php if(isset($_SESSION['userID'])) : ?>
  <p>Welcome <?php echo $_SESSION['userID']; ?></p>
  <p> <a href="index.php?logout='1'" style="color: red;">logout</a></p>
  <?php endif ?>
<body>


<div class="container">
  <h1>Classes</h1>
</div>
<br/>
<?php foreach ($courses as $x) {
  $courseName = $x['courseName'];
  $semester = $x['semester'];
  $registeredStudents = $x['studentCount'];
  $maxStudents = $x['studentMax'];
  $professor = $x['professor'];

  echo " <div class='container'>
    Course: $courseName <br>
    Semester: $semester <br>
    Registered Students: $registeredStudents / $maxStudents <br>
    Instructor: $professor <br><br>

  <form action ='courseAdder.php'>
    <input type='hidden' name='course' id='course' value='$courseName' />
    <input type='hidden' name='user' id='user' value='$userID' />
    <button>Enroll</button>
  </form>
  </div>";
} ?>


</body>
</html>