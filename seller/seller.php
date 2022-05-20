<?php
session_start();

if (!$_SESSION) {
    header('Location: ../login/log.php');
}
elseif ($_SESSION['user']['role'] != 0) {
    header('Location: ../login/log.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Admin</title>
</head>
<body>
	<h1>Welcome to Seller Panel)</h1>
    <?php
        var_dump($_SESSION['user']);
    ?>
</body>
</html>