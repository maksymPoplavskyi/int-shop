<?php

require_once 'items.php';

for ($i = 0; $i < count($categoriesArr); $i++) {
    if ('' != filesize("products/$categoriesArr[$i]")) {

        $categoryName = fopen("products/$categoriesArr[$i]", 'r+');

        $categoryNameData = fread($categoryName, filesize("products/$categoriesArr[$i]"));

        $categoryNameDataArr = explode(PHP_EOL, $categoryNameData);

        $arr = [];
        foreach ($categoryNameDataArr as $data) {
            $arr[] = unserialize($data);
        }

        foreach ($arr as $value) {
            if ($value['itemCategory'] == $_GET['validate_name']) {
                foreach ($value as $key) {
                    print_r($key);
                    echo '<br>';
                }
                echo '<br>';
            }
        }
        fclose($categoryName);
    }
}