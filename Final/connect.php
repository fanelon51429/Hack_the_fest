<?php
$Name = filter_input(INPUT_POST, 'Name');
$email = filter_input(INPUT_POST, 'email');
$subject = filter_input(INPUT_POST, 'subject');
$message = filter_input(INPUT_POST, 'message');
if (!empty($Name)){
if (!empty($email)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "contact_ngo";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO entries_form1(Name,email,subject,message)
values ('$Name','$email','$subject','$message')";
if ($conn->query($sql)){
echo "<body bgcolor='#e5ffcc'>";
echo "</br></br></br></br><center><h1>We've recieved your message!</h1></center>";
echo "<center><h1>Thank You!</h1></center>";
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
}
else{
echo "Name  should not be empty";
die();
}
?>
