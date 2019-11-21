<?php
	require"header.php";
?>

	<main>
		<div>
			<section>
				<?php
					if (isset($_SESSION['id']) || isset($_SESSION['uidUsers'])) {
						echo'<p class="login-status">You are logged in!</p>';
					}
					else{
						echo'<p class="login-status">You are logged coke out !</p>';
					}
				?>

			</section>
		</div>
	</main>

<?php
	require "footer.php";
?>