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
<li><a href="status.php">Status</a></li>
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
<section class="status">
<h4 style="width:100%; text-align:center;">System Status</h4>
<form id="con" action="status.php" method="GET">
<p>Status</p><input type="text" id="status_command" name="status_command" value="uptime" />
<input type="submit" value="Refresh Status" />
</form>
<p id="output">
<?php
$status_command = !empty($_GET["status_command"]) ? $_GET["status_command"] : 'uptime';
$output = shell_exec($status_command);
print($output);

?>
</p>
</section>
<aside>
<img src="images/300.jpeg" alt="Random Image" />
</aside>
<footer>
</footer>
</body>
</html>
