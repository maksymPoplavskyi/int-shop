<?php

require_once 'categoriesSeeder.php';

function save($category) {
    $categoryData = serialize($category);

    if (in_array($category, categoriesArr())) {
        //echo "такая категория '$category' уже есть \n\t";
        //как вывести пользователю что <<такая категория уже есть>> чтобы работал header()
    } else {
        file_put_contents("products/$category", '', FILE_APPEND);
        file_put_contents(LIST_CATEGORIES, $categoryData . PHP_EOL, FILE_APPEND);
    }
}
