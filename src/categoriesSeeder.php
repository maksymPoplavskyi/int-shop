<?php

const LIST_CATEGORIES = 'listCategories.txt';

function categoriesArr() {
    if( '' != filesize(LIST_CATEGORIES)){
        $categories = fopen(LIST_CATEGORIES, 'r');
        $categoriesData = fread($categories, filesize(LIST_CATEGORIES));

        $categoriesDataArr = explode(PHP_EOL, $categoriesData);

        $categoriesArr = [];

        foreach ($categoriesDataArr as $data) {
            $data = unserialize($data);
            if ($data != '') {
                $categoriesArr[] = $data;
                //print_r($categoriesArr); // массив названий файлов products ( [0] => 123, [1] => qwe );
            }
        }
        fclose($categories);

        return $categoriesArr;
    } else {
        return $categoriesArr = [];
    }
}

global $categoriesArr;