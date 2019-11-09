<?php

require_once 'categoriesSeeder.php';
require_once 'saveItem.php';

if(isset($_POST['itemName'])){
    $itemName = $_POST['itemName'];
}else {
    $itemName = [];
}
if ($itemName != []) {
    $postItems = $_POST['itemCategory'];

    saveItem($postItems);

    header('Location: /');
}