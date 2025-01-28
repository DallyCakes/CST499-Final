<?php 

include 'autoloader.php'; 

session_start();

$userID = '';
$password = '';
$error = array();

$host = "localhost";
$database = "CST499";
$user = "root";
$pass = "";

$connection = mysqli_connect($host, $user, $pass, $database);



if (!$connection){
    die("Can't access" . mysqli_connecterror());
}; 

if (isset($_POST['login'])) {
    $userID = mysqli_real_escape_string($connection, $_POST['userID']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($userID)) {
        array_push($error, "Username required");
    }

    if(empty($password)) {
        array_push($error, "Password required");
    }

    if (count($error) == 0) {
        $sql = "SELECT * FROM tblStudent WHERE userID='$userID' AND password='$password'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['userID'] = $userID;
            $_SESSION['success'] = "Logged in!";
            header('location: profile.php');
        } else {
            array_push($error, "Wrong username/password");
        }
    }


}

?>
