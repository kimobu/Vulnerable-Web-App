<?php
session_start();
$_SESSION['page'] = "comment.php";
?>
<html>
<head>
<title>NOT Vulnerable Web App</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>Template For Web App Lab</h1>
<nav><ul>
<li><a href="template.php">Home</a></li>
<li><a href="catalog.php">Catalog</a></li>
<li><a href="comment.php">Comment</a></li>
<li id="login">
<?php
if(isset($_SESSION['logged'])) {
	print("<a href='logout.php'>Welcome ".$_SESSION['name']."! &nbsp;Logout</a>");
}
else {
	print("<a href='login.php'>Login</a>");
}
?>
</li>
</ul></nav>
</header>
<section class="contact">
<h4 style="width:100%; text-align:center;">Leave a Comment</h4>
<form id="con" action="comment.php" method="GET">
<p>Name</p><input type="text" id="name" name="name" />
<p>Email</p><input type="text" id="email" name="email" />
<p>Message</p><textarea rows="6" cols="30" id="message" name="message"></textarea>
<br />
<input type="submit" value="Post Comment" />
</form>
<p id="output">
<?php
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$conn = mysqli_connect($host, $user, $pass, 'ceh');

if (!$conn) {
    die("Connection failed");
} 

$name = $_GET["name"];
$email = $_GET["email"];
$message = $_GET["message"];

if(!(is_null($name) && is_null($email) && is_null($message))) {
	$sql = "INSERT INTO comments (name, email, message) VALUES ('$name', '$email', '$message');";
	$result = mysqli_query($conn, $sql);
}
$sql1 = "SELECT name, message FROM comments;";
if($result1 = mysqli_query($conn, $sql1)) {
	print("<h4>Comments</h4>");
	print("<div style='overflow:auto;height:325px;width:30%;'>");
	for($c=0; $row=mysqli_fetch_row($result1); $c++) {
		print("<p style='
			width: 100%;
			float: left;
			background: white;
			'><b>User:</b> $row[0]<br />$row[1]</p>");
		print("<hr style='width:99%;float:left; margin:auto;'/>");
	}
	print("</div>");
}
?>
</p>
</section>
<aside>
<img src="images/300.jpeg" alt="Random Image" />
</aside>
<footer>
Vulnerable Web App &copy; Steven Karschnia 2019
</footer>
</body>
</html>