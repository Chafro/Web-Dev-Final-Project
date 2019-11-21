<?php
	require"header.php";
?>

	<main>
		<div>
			<section>
				<h1>Sign Up</h1>
				<?php
					if (isset($_GET['error'])) {
						if ($_GET['error']== "emptyfields") {
							echo "<p class="signuperror">Fill in all fields</p>"
						}
						else if ($_GET['error']== "passwordcheck") {
							echo "<p class="signuperror">Password down match</p>"
						}
					}
				?>
				<form action="includes/signup.inc.php" method="post">
					<input type="text" name="firstname" placeholder="First Name">
					<input type="text" name="lastname" placeholder="Last Name">
					<input type="text" name="uid" placeholder="Username">
					<input type="text" name="mail" placeholder="E-mail">
					<input type="password" name="pwd" placeholder="Password">
					<input type="password" name="pwd-repeat" placeholder="Confirm Password">
					<button type="submit" name="signup-submit">Sign Up</button>
					
				</form>

			</section>
		</div>
	</main>

<?php
	require " footer.php";
?>