<?php

$arr = [];

error_reporting(0);

for($i = 1; $i <= 10; $i++){
    
    if($_POST['id' . $i] && $_POST['quantity' . $i]){
        $arr[] = [
            'id' =>  $_POST['id' . $i],
            'quantity' => $_POST['quantity'. $i] 
        ];
    }
}
echo "<pre>";
print_r($arr);
echo "</pre>";

?>