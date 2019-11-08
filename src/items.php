<?php

if( '' != filesize('listCategories.txt')){

    $categories = fopen('listCategories.txt', 'r');

    $categoriesData = fread($categories, filesize('listCategories.txt'));

    $categoriesDataArr = explode(PHP_EOL, $categoriesData);

    $categoriesArr = [];
    foreach ($categoriesDataArr as $data) {
        $data = unserialize($data);
        if ($data != '') {
            $categoriesArr[] = $data;
            //print_r($categoriesArr); // массив названий файлов products ( [0] => 123, [1] => qwe );
        }
    }
} else {
    $categoriesArr = [];
}
if(isset($_POST['itemName'])){
    $itemName = $_POST['itemName'];
}else {
    $itemName = [];
}
if ($itemName != []) {
    $postItems = $_POST['itemCategory'];
    file_put_contents("products/$postItems", serialize($_POST) . PHP_EOL, FILE_APPEND);
}

//header('Location: /');