<?php
	session_start();

	if(!empty($_POST)){
		include_once('connection.php');
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT email, wachtwoord FROM users WHERE email='$email'";
		$qry = $conn->query($query);
		$result = $qry->fetch_assoc();

		if($qry->num_rows == 1){
			if(password_verify($password, $result['wachtwoord'])){
				$_SESSION['aangemeld'] = true;
				header('Location: index.php');
			}else{
				echo "Foute aanmeldgegevens, probeer opnieuw";
			}
		}else{
			echo "Dit email adres bestaat nog niet.";
		}
	}
?><!DOCTYPE html>
<html lang="nl">
<head>
	<!-- Standardzz -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page</title>

	<!-- Stylezz - You need a sass-compiler -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.min.css">

	<!-- Fontzz -->
</head>
<body>
	<header>
		<nav class="navbar navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<button type="button" class="navbar-toggle-left navbar-toggle collapsed" data-toggle="collapse" data-target="#date">
						<i class="fa fa-caret-down"></i> Donderdag 19 mei 2016 <span>- Chris Lomme</span>
					</button>
				</div>

				<div class="collapse navbar-collapse" id="menu">
					<ul class="nav navbar-nav">
						<li><a href="#">Link</a></li>
						<li><a href="#">Link</a></li>
						<li><a href="#">Link</a></li>
						<li><a href="#">Link</a></li>
					</ul>
				</div><!-- #/menu ./navbar-collapse -->
				<div class="collapse navbar-collapse" id="date">
					<ul class="nav navbar-nav">
						<li><a href="#">Woensdag 18 mei 2016 <span>- Chris Lomme</span></a></li>
						<li><a href="#">Dinsdag 17 mei 2016 <span>- Chris Lomme</span></a></li>
						<li><a href="#">Donderdag 12 mei 2016 <span>- Chris Lomme</span></a></li>
						<li><a href="#">Woensdag 11 mei 2016 <span>- Chris Lomme</span></a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- ./container-fluid -->
		</nav>
	</header>

	<div class="content container">
		<div class="login">
			<h2>Aanmelden</h2>
			<form action="" method="post">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="email" class="form-control" name="email" placeholder="Email">
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password" class="form-control" name="password" placeholder="Wachtwoord">
				</div>
				<button type="submit" class="btn btn-diw-blue">Aanmelden</button><br>
				<a href="registreren.php">Wachtwoord vergeten?</a><br>
				<a href="#!">Een nieuw account registreren</a>
			</form>
		</div><!-- ./login -->
	</div><!-- ./content container -->

	<!-- Scriptzz -->
	<script src="assets/js/jquery-1.12.3.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>