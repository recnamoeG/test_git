<?php
session_start();
if (!isset($_SESSION['authentication'])){
	header('Location: login.php');
	exit();
}
if (!isset($_SESSION['logout'])){
	session_destroy();
	header('Location: content.php');
	exit();
}