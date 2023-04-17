<?php
$host = "mysql";
$username = "root";
$password = "s123123";
$dbname = "mysql";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo('success');
}
mysqli_close($conn);

require '../backend/Classes/Main.php';
require '../backend/Controllers/MainController.php';

?>
<h1>Hello world</h1>