<?php

$a = $_GET['id'];

if(!empty($a)){
    ?>
    <input type="hidden" name="id<?=$a?>" value="<?=$a?>">
        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white col" >
            <div class="list-group list-group-flush border-bottom scrollarea">
                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1"><?=$a?></strong>
                    <small>Wed</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
                <input type="number" name="quantity<?=$a?>" value="1">
                <button onclick="clearBox('message<?=$a?>')">Delete</button>  
            </div>
        </div> 
    <?php
}else{
    ?>
    <script>
        alert('Error adding drug!');
    </script>
    <?php
}
?>