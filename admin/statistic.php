<?php
require '../vendor/connect.php';

session_start();

if (!$_SESSION) {
    header('Location: ../login/log.php');
}
elseif ($_SESSION['user']['role'] != 1) {
    header('Location: ../login/log.php');
}

$current_date = date('Y-m');

$money_for_mounth = mysqli_query($conn, "SELECT `order_price` FROM `check` WHERE `order_date` LIKE '$current_date%' AND `status` = 1;");

$money_for_mounth = mysqli_fetch_all($money_for_mounth);

$all_for_mounth = NULL;

foreach($money_for_mounth as $receipts){
    $all_for_mounth += $receipts[0];
}

$money = mysqli_query($conn, "SELECT `order_price` FROM `check` WHERE `status` = 1;");

$money = mysqli_fetch_all($money);

$all = NULL;

foreach($money as $receipts){
    $all += $receipts[0];
}

$all_orders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `check` WHERE `status` = 1"));

$orders_for_mounth = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `check` WHERE `order_date` LIKE '$current_date%' AND `status` = 1;"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<title>Admin</title>
</head>
<body>
    <div id="header">
		<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 p-3 border-bottom">
	      <a href="admin.php" id="1" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
	      	<img src="../assets/img/3248924.png" class="bi me-2" width="40" height="40">
	      	<h1 aria-label="Bootstrap">Панель</h1>
	      </a>
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="admin.php" class="nav-link" aria-current="page">Касири</a></li>
            <li class="nav-item"><a href="drugs.php" class="nav-link">Ліки</a></li>
            <li class="nav-item"><a href="discount.php" class="nav-link">Система знижок</a></li>
            <li class="nav-item"><a href="statistic.php" class="nav-link active">Статистика</a></li>
        </ul>
	    </header>
    </div>

    <main style="max-width: 1000px; margin: 0 auto;">
        <table class="table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Загальна виручка</th>
            <th scope="col">Загальна к-сть замовлень</th>
            <th scope="col">Виручка за місяць</th>
            <th scope="col">К-сть замовлень за місяць</th>
            </tr>
        </thead>
        <tbody>
                <td><?=$all . ' грн'?></td>
                <td><?=$all_orders?></td>
                <td><?=$all_for_mounth . ' грн'?></td>
                <td><?=$orders_for_mounth?></td>
            </tbody>
        </table>
        </main>

<script src="../assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
</body>
</html>