<?php
session_start();
unset($_SESSION["logged"]);
header("location: " . $_SESSION['page']);
?>