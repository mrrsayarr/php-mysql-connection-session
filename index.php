<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Çıkış</a>
	<h1>Buraası anasayfa olacak</h1>

	<br>
	Merhaab, <?php echo $user_data['user_name']; ?>
</body>
</html>