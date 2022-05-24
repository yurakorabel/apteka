<?php

require '../../connect.php';

$names = mysqli_query($conn, "SELECT `name`, `id_info` FROM `drug_info`");
$names = mysqli_fetch_all($names);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div id="header">
		<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 p-3 border-bottom">
	      <a href="../../../admin/drugs.php" id="1" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
	      	<img src="../../../assets/img/3248924.png" class="bi me-2" width="40" height="40">
	      	<h1 aria-label="Bootstrap">Додавання</h1>
	      </a>
	    </header>
	</div>
    <form style="width: 700px; margin: 0 auto;" action="adding.php" method="POST">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Лікарство</label>
        <select class="form-control" id="exampleFormControlSelect1" name="drug_info">
            <?php
            foreach($names as $name){
                ?>
                <option value="<?=$name[1]?>"><?=$name[0]?></option>
                <?php      
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Ціна</label>
        <input type="number" class="form-control" id="exampleInputPassword1" name="price" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">К-сть</label>
        <input type="number" class="form-control" id="exampleInputPassword1" name="amount" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Дата поступлення</label>
        <input type="date" class="form-control" id="exampleInputPassword1" name="date" required>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top: 16px; width: 700px;">Створити</button>
    </form>
</body>
</html>