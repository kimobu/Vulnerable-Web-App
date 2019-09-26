<?php
session_start();
$_SESSION['page'] = "catalog.php";
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
<section>
<h4>Search</h4>
<form action="" method="get">
<input type="text" name="search" id="search"/>
<br />
<input type="submit" value="Search" />
</form>
<div id="results">


<?php
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$conn = mysqli_connect($host, $user, $pass, 'ceh');

if (!$conn) {
    die("Connection failed");
} 

$search = $_GET['search'];
//$sql = "show tables;";
$sql = "SELECT * FROM catalog WHERE item='$search';";
$result = mysqli_query($conn, $sql);
print("<table border='1' style='margin: 10px 10px 10px 10px; width: 97%;'>");
print("<tr><th>ID</th><th>Item</th><th>Price</th><th>Quantity</th></tr>");
for($c=0; $row=mysqli_fetch_row($result); $c++) {
	print("<tr>");
	foreach($row as $key => $value)
		print("<td style='width:25%;'>$value</td>");
	print("</tr>");
}
print("</table>");
?>


</div>
</section>
<aside>
<img src="images/300.jpeg" alt="Random Image" />
</aside>
<footer>
Vulnerable Web App &copy; Steven Karschnia 2019
</footer>
</body>
</html>