<?php
session_start();
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$conn = mysqli_connect($host, $user, $pass, 'ceh');

if (!$conn) {
    die("Connection failed");
} 

if((isset($_POST["username"]) && isset($_POST["password"]))) {
print("WTF");
	$username = $_POST["username"];
	$password = $_POST["password"];

	$sql = "SELECT name FROM users WHERE username='$username' AND password='$password';";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);

	if($count==1) {
		$_SESSION["logged"] = true;
		$_SESSION["name"] = mysqli_fetch_row($result)[0];
		header("location: " . $_SESSION['page']);
	}
}
?>
<html>
<head>
<title>NOT Vulnerable Web App</title>
<link rel="stylesheet" href="login.css" />
</head>
<body>
<form action="login.php" method="POST">
	<div id="img"><img src="images/index.jpeg" width="225" /></div>
	<input type="text" placeholder="username" name="username"/><br/>
	<input type="password" placeholder="password" name="password"/><br/>
	<input type="submit" value="Login" /><br/>
</form>

</body>
</html>
