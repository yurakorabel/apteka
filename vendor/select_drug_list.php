<?php
session_start();
require_once "connect.php";

//count of rows
$sql = mysqli_query(
    $conn,
    "SELECT COUNT(1) FROM `drug_sklad`"
);
$rows_count = intval(mysqli_fetch_array($sql)[0]);

//creating list of drugs
$list = '<ul class="list-unstyled ps-0">';

$a = 1;
for ($i=1; $i <= $rows_count; $i++) {
    $sql = mysqli_query(
        $conn,
        "SELECT `name`, `price` FROM `drug_sklad` JOIN `drug_info` ON `drug_info_id_info` = `id_info` WHERE `id_drug_sklad` = '$i' AND `drug_count` > 0"
    );
    $row = mysqli_fetch_assoc($sql);
    if (!is_null($row)) {
        $list .= '<li class="mb-1">' . $row['name'] . ' ціна - ' . $row['price'] . ' грн. ' . '<a href="#" id="el' . $a . '"' . '>+</a></li>';
        $a += 1;
    }
}
$list .= '</ul>';

//creating divs
$div = "";
$b = 1;
for ($i=1; $i <= $rows_count; $i++) {
    $sql = mysqli_query(
        $conn,
        "SELECT `id_drug_sklad` FROM `drug_sklad` WHERE `id_drug_sklad` = '$i' AND `drug_count` > 0"
    );
    $row = mysqli_fetch_assoc($sql);
    if (!is_null($row)) {
        $div .= '<div id="message' . $b . '"></div>';
        $b += 1;
    }
}

$_SESSION['list'] = $list;
$_SESSION['divs'] = $div;

header('Location: ../user/user.php');

?>

