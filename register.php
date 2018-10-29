<? 
	include('connect.php') 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/register.css" class="css">
</head>

<body>
	<form action="register.php" method="post" class="text-center" id="registration-form">
		<div class="upper text-center">
			<h2>BitHub</h2>
		</div>
		<div class="fields">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text span-text">Person</span>
				</div>
				<input type="text" class="form-control span-body" placeholder="First Name" name="firstName">
				<input type="text" class="form-control span-body" placeholder="Last Name" name="lastName">
			</div>
			<div class="input-group mb-3">
				<input type="text" class="form-control span-body" placeholder="Your Email" id="mail" name="email">
				<div class="input-group-append">
					<span class="input-group-text span-text">@somaiya.edu</span>
				</div>
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text span-text">Password</span>
				</div>
				<input type="password" class="form-control span-body" placeholder="Password" id="pwd" name="password">
			</div>
			<button type="submit" class="btn btn-primary" name="reg_user">Sign In</button>
			<div class="linker">
				<span class="linker">Already a user ? <a href="login.php" class="href">Login here</a></span>
			</div>
		</div>
	</form>
	
<?
		
?>		
</body>
</html>