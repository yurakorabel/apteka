<?php
session_start();
require_once "../connect.php";

$id_div = $_GET['id'];
$id_info = $_GET['name'];

$sql = mysqli_query(
    $conn,
    "SELECT `name`, `price`, `drug_count` FROM `drug_sklad` JOIN `drug_info` ON `drug_info_id_info` = `id_info` WHERE `id_drug_sklad` = '$id_info' AND `drug_count` > 0"
);
$row = mysqli_fetch_assoc($sql);

$js_concat = ltrim($id_info, $id_info[0]);

if(!empty($id_div)){ ?>
    <input type="hidden" name="id_info<?=$id_info?>" value="<?=$id_info?>">

    <ul>
        <p><?= $row['name'] ?></p>
        <p id="price_<?=$js_concat?>"><?= $row['price'] ?></p>
        <p><input type="number" name="drug_count<?=$id_info?>" id="count_<?=$js_concat?>" value="1" min="1" max="<?= $row['drug_count'] ?>"></p>
        <p><button onclick="clearBox('message<?=$id_div?>', 'msg<?=$id_div?>');" id="<?=$id_div?>">Delete</button></p>
    </ul>
    <script>
        function change_price_<?=$js_concat?>() {
            let input = document.getElementById('count_<?=$js_concat?>');
            price_<?=$js_concat?>.textContent = <?=$row['price']?> * input.value;
        }
        count_<?=$js_concat?>.addEventListener('change', change_price_<?=$js_concat?>);
    </script>
    <?php
}else{ ?>
    <script>
        alert('Error adding drug!');
    </script>
    <?php
} ?>