<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
		<title>BugMe Issue Tracker</title>
		<link href="home.css" type="text/css" rel="stylesheet" />
		<script src="home.js" type="text/javascript"></script>
	</head>
	<body>
		<header>
			
			<h1>BugMe Issue Tracker</h1>
			<nav>
				<img src="http://www.pngall.com/wp-content/uploads/1/World.png" height="50" width="50">
				<ul>
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="#">Portfolio</a>
					</li>
					<li>
						<a href="#">About me</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
				</ul>
				<div class=" header-login">
					<?php
						if (isset($_SESSION['id']) || isset($_SESSION['uidUsers'])) {
							echo'<form action="includes/logout.inc.php" method="post">
							<button type="submit" name="logout-submit">Logout</button>
							</form>';
						}
						else{
							echo'<form action="includes/login.inc.php" method="post">
							<input type="text" name="mailuid" placeholder="Email/Username">
							<input type="password" name="pwd" placeholder="Password">
							<button type="submit" name="login-submit">Login</button>
							</form>
							<a href="signup.php">Signup</a>';
						}
					?>	

				</div>

			</nav>

		</header>

		<main>

		</main>

	</body>
</html>