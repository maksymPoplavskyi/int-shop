<?php

$category = $_POST['categoryName'];
$categoryData = serialize($category);

require_once 'items.php';

if (in_array($category, $categoriesArr)) { //почему его нужно назначить, если я подтаскиваю $categoriesArr с items.php

    //как вывести пользователю что такая категория уже есть чтобы работал header()
    echo "такая категория '$category' уже есть \n\t";
} else {
    file_put_contents("products/$category", '', FILE_APPEND);
    file_put_contents('listCategories.txt', $categoryData . PHP_EOL, FILE_APPEND);
    }
header('Location: /');