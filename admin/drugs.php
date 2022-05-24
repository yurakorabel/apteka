<?php
require '../vendor/connect.php';

session_start();

if (!$_SESSION) {
    header('Location: ../login/log.php');
}
elseif ($_SESSION['user']['role'] != 1) {
    header('Location: ../login/log.php');
}

error_reporting(0);

$drugs = mysqli_query($conn, "SELECT `id_drug_sklad`, `name`, `price`, `group`, `drug_count` , `in_date`  FROM `drug_sklad` JOIN `drug_info` ON `drug_info_id_info` = `id_info`");

$drugs = mysqli_fetch_all($drugs);

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
            <li class="nav-item"><a href="drugs.php" class="nav-link active">Ліки</a></li>
            <li class="nav-item"><a href="discount.php" class="nav-link">Система знижок</a></li>
            <li class="nav-item"><a href="statistic.php" class="nav-link">Статистика</a></li>
        </ul>
	    </header>
    </div>
    <main style="max-width: 1000px; margin: 0 auto;">
        <table class="table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Назва</th>
            <th scope="col">Ціна</th>
            <th scope="col">Група</th>
            <th scope="col">К-сть</th>
            <th scope="col">Дата постачання</th>
            <th scope="col">Редагування</th>
            <th scope="col">Видалення</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($drugs as $drug){
                    ?>
                    <tr>
                        <th scope="row"><?=$drug[0]?></th>
                        <td><?=$drug[1]?></td>
                        <td><?=$drug[2]?></td>
                        <td><?=$drug[3]?></td>
                        <td><?=$drug[4]?></td>
                        <td><?=$drug[5]?></td>
                        <td><a href="../vendor/admin/drugs/edit.php?id=<?=$drug[0]?>">Редагувати</a></td>
                        <td><a href="../vendor/admin/drugs/deleting.php?id=<?=$drug[0]?>">Видалити</a></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
        </table>

        <a type="button" class="btn btn-success" style="width: 100%; border-radius: 0;" href="../vendor/admin/drugs/add.php">Додати лікарство</a>
    </main>  
    <?php
        if($_SESSION['check'] == 1){
            ?>
            <script>alert("Успішно")</script>
            <?php
            unset($_SESSION['check']);
        }elseif($_SESSION['check'] == 2){
            ?>
            <script>alert("Помилка")</script>
            <?php
            unset($_SESSION['check']);
        }
    ?>

<script src="../assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
</body>
</html>        