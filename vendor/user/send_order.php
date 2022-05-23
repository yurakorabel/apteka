<?php
session_start();
require_once "../connect.php";

$phone_number = $_POST['phone_number'];
$total_price = 0;

if (count($_POST) > 1) {
    mysqli_query(
        $conn,
        "INSERT INTO `check` (`order_date`, `status`)
				VALUES (NOW(), 0)"
    );
    $check_id = mysqli_insert_id($conn);

    if (strlen($phone_number) == 0){ // without discount
        $drug_order_count = count($_POST) - 1;

        for ($i = 0; $i <= $drug_order_count; $i = $i + 2){
            $id_info = array_values($_POST)[$i];
            if (strlen($id_info) != 0) {
                $id_info = ltrim($id_info, $id_info[0]);
                $concat_id_count = "drug_count_" . $id_info;
                $drug_count = $_POST[$concat_id_count];

                mysqli_query(
                    $conn,
                    "INSERT INTO `order` (`order_count`, `drug_sklad_id_drug_sklad`, `drug_sklad_drug_info_id_info`, check_id_check)
				VALUES ('$drug_count', '$id_info', '$id_info', '$check_id')"
                );

//                $drug_count_db = mysqli_query(
//                    $conn,
//                    "SELECT `drug_count` FROM `drug_sklad` WHERE `id_drug_sklad` = '$id_info'"
//                );
//                $drug_count_db = mysqli_fetch_assoc($drug_count_db);
//                $drug_count_db = $drug_count_db['drug_count'];
//                $drug_count_db = $drug_count_db - $drug_count;
//
//                mysqli_query(
//                    $conn,
//                    "UPDATE `drug_sklad` SET `drug_count`='$drug_count_db' WHERE `id_drug_sklad` = '$id_info'"
//                );

                $price = mysqli_query(
                    $conn,
                    "SELECT `price` FROM `drug_sklad` WHERE `id_drug_sklad` = '$id_info'"
                );
                $price = mysqli_fetch_assoc($price);
                $price = $price['price'];
                $total_price = $total_price + $price * $drug_count;
            }
        }
        mysqli_query(
            $conn,
            "UPDATE `check` SET `order_price`='$total_price' WHERE `id_check` = '$check_id'"
        );
        $_SESSION['message'] = "Замовлення відправлено!";
        header('Location: ../../user/user.php');
    }
}
else {
    $_SESSION['message'] = "Ви не вибрали жодного елемента";
    header('Location: ../../user/user.php');
}
?>