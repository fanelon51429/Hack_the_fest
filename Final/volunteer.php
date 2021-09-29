<?php

$email = filter_input(INPUT_POST, 'email');



if (!empty($email)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "volunteer";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO ngo_volunteer(email)
values ('$email')";
if ($conn->query($sql)){
echo "<body bgcolor='#ffffe6'>";
echo "</br></br></br></br><center><h1>Thank You for showing your interest in!</h1></center>";
echo "<center><h1>volunteering Us!</h1></center>";
echo "<center><h3>Go back to home page</h3></center>";
echo "<center><button><a href='index.html'>Home</a></button></center>";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "email should not be empty";
die();
}

?>