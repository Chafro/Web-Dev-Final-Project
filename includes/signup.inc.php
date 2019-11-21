<?php
if (isset($_POST['signup-submit'])) {
	
	require 'dbh.inc.php';

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$pwd = $_POST['pwd'];
	$pwdRepeat = $_POST['pwd-repeat'];
	$dateJoin = date("Y-m-d");

	if (empty($firstname) || empty($lastname) ||empty($username) ||empty($email) ||empty($pwd) ||empty($pwdRepeat)) {
		header("Location: ../signup.php?error=emptyfields&firstname=".$firstname."&lastname=".$lastname."&uid=".$username."&mail=".$email);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username ) && filter_var($email,FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmailuid&firstname=".$firstname."&lastname=".$lastname);
		exit();
	}

	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmail&firstname=".$firstname."&lastname=".$lastname."&uid=".$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username )) {
		header("Location: ../signup.php?error=invaliduid&firstname=".$firstname."&lastname=".$lastname."&mail=".$email);
		exit();
	}
	elseif ($pwd !== $pwdRepeat) {
		header("Location: ../signup.php?error=passwordcheck&firstname=".$firstname."&lastname=".$lastname."&uid=".$username."&mail=".$email);
		exit();
	}
	else{

		$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location: ../signup.php?error=sqlerror");
		exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../signup.php?error=usernametaken&firstname=".$firstname."&lastname=".$lastname."&mail=".$email);
				exit();
			}
			else{
				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, firstname, lastname,date_joined) VALUES (?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}
				else{
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt,"ssssss",$username, $email, $hashedPwd, $firstname, $lastname, $dateJoin);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);	
}
else{
	header("Location: ../signup.php");
	exit();
}
