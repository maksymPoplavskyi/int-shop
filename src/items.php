<?php

require_once 'categoriesSeeder.php';
require_once 'saveItem.php';

if(isset($_POST['itemName'])){
    $postName = $_POST['itemName'];
}else {
    $postName = [];
}
if ($postName != []) {
    $postDescription = $_POST['itemDescription'];
    $postCategory = $_POST['itemCategory'];
    $postCount = $_POST['count'];

//    saveItem($postCategory, $postDescription, $postCount);
    if (filesize("products/$postCategory") == '') {
        file_put_contents("products/$postCategory", serialize($_POST) . PHP_EOL, FILE_APPEND);
    } else {
        $file = fopen("products/$postCategory", 'r+');
        $fileData = fread($file, filesize("products/$postCategory"));
        $fileDataArr = explode(PHP_EOL, $fileData);

        echo '<pre>';
        print_r($fileDataArr);

        $arr = [];
        foreach ($fileDataArr as $data) {
            if ($data != '') {
                $arr[] = unserialize($data);
            }
        }
        print_r($arr);

//        if (isset($postName, $postDescription)) {
//            echo 'yes <br>';
//        } else {
//            echo 'no <br>';
//        }

//       if ($postName === $value['itemName'] && $postDescription === $value['itemDescription']) {


        foreach ($arr as $key => $value) {
            if ($postName === $value['itemName'] && $postDescription === $value['itemDescription']) {
                print_r($value);
                $value['count']++;
                $item = serialize($value);
                print_r($item);
//                $file1 = fopen("products/$postCategory", 'a+');
//                str_replace("products/$postCategory", serialize($value), $value);
//                fwrite($file1, $item . PHP_EOL);
                file_put_contents("products/$postCategory", $item . PHP_EOL);
                die;
            } else {
                file_put_contents("products/$postCategory", serialize($_POST) . PHP_EOL, FILE_APPEND);
                die;
            }
        }
    }
//    header('Location: /');
}