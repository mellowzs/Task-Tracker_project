<?php

require 'authentication.php'; // admin authentication check 

// auth check
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}
$page_name="home";
include("include/sidebar.php");
// check admin
$user_role = $_SESSION['user_role'];

$page_name="login";
include("include/sidebar.php");

$user_role = $_SESSION['user_role'];
if($user_role == 1){

		header('location:home.php');
	}
	else if($user_role == 2){

		header('location:home.php');

	}
?>