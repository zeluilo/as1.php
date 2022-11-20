<!DOCTYPE html>
		<html>

		<head>
			<title>ibuy Auctions</title>
			<link rel="stylesheet" href="ibuy.css" />
		</head>

		<body>
			<?php 
			
			if (isset($_SESSION['loggedin'])) {
				echo "WELCOME, " . $_SESSION['userDetails']['name'] . '<br>' . " <a href='logout.php'>LOGOUT HERE</a>";
				if ($_SESSION['userDetails']["checkadmin"] == "ADMIN") {
				echo "<a href='addAdmin.php'> . <button class='addcat'>Add Admin</button></a>
					<a href='manageAdmin.php'> . <button class='addcat'>Manage Admins</button></a>
					<a href='addCategory.php'> . <button class='addcat'>Add Category</button></a>
					<a href='addAuction.php'> . <button class='addcat'>Add Auctions</button></a>
					<a href='adminCategories.php'> . <button class='addcat'>Manage Category</button></a>";
				} else {
				echo "<div> HELLO,<a href='login.php'>LOGIN</a> OR <a href='register.php'>REGISTER</a></div>";
				}
			}
			?>
		<?php require 'head.php'; ?>
		<?php require 'navbar.php';?>
		<main>
			<h1>Latest Listings</h1>
			<?php require "body.php"; ?>
			<?php require "foot.php"; ?>
		</main>
	<style>
		.addcat {
			font-family: "Roboto", sans-serif;
			font-size: 16px;
			font-weight: bold;
			background: blue;
			width: 190px;
			color: white;
			padding: 10px 0px;
			text-align: center;
			text-decoration: none;
			border-radius: 5px;
			cursor: pointer;
			box-shadow: 0 0 10px rgb(0 0 0 / 10%);
			position: relative;
			margin-top: 15px;
		}
	</style>
</body>
</html>