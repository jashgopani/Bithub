<?php
session_start();

// initializing variables
$firstName = "";
$lastName = "";
$email = "";
$password = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'bithub_db');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstName)) { array_push($errors, "firstName is required"); }
  if (empty($lastName)) { array_push($errors, "lastName is required"); }
  if (empty($email)) { array_push($errors, "email is required"); }
  if (empty($password)) { array_push($errors, "password is required"); }
    
//  if ($password_1 != $password_2) {
//	array_push($errors, "The two passwords do not match");
//  }

  // first check the database to make sure 
  // a user does not already exist with the same firstName and/or lastName
    
  $user_check_query = "SELECT * FROM users_tb WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO users_tb (firstName, lastName, email, upassword) 
  			  VALUES('$firstName', '$lastName', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "----------------";
  	header('location: dash.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM users_tb WHERE email='$email' AND upassword='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) != 0) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "----------------";
  	  header('location: dash.php');
  	}else {
//  		array_push($errors, "Wrong email/password combination");
			echo"<script>alert('User is not registered maccha')</script>";
			header('location: register.php');
  	}
  }
}

?>
