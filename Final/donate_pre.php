<?php
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');

$amount = filter_input(INPUT_POST, 'amount');
if (!empty($firstname)){
if (!empty($amount)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "donate_info";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO donate(firstname,lastname,phone,email,amount)
values ('$firstname','$lastname','$phone','$email','$amount')";
if ($conn->query($sql)){
echo "<body bgcolor='#e5ffcc'>";
echo "</br></br></br></br><center><h1>Thanks for providing your information!</h1></center>";
echo "<center><h1>Check Out for the payment</h1></center>";
echo "<center><h3>Click the button below</h3></center>";
echo "<center><button><a href='donate.php'>PAY</a></button></center>";
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
