<?php

session_start();
print_r(session_id());
echo '<br><br><br><br>';

require_once 'items.php';
require_once 'categoriesSeeder.php';

$categoriesArr = categoriesArr();
$itemsCategoryArr = [];

for ($i = 0; $i < count($categoriesArr); $i++) {
    if ('' != filesize("products/$categoriesArr[$i]")) {
        $categoryName = fopen("products/$categoriesArr[$i]", 'r+');

        $categoryData = fread($categoryName, filesize("products/$categoriesArr[$i]"));

        $categoryDataArr = explode(PHP_EOL, $categoryData);


        $categoryArr = [];
        foreach ($categoryDataArr as $data) {
            $categoryArr[] = unserialize($data);
        }

        foreach ($categoryArr as $value) {
            if ($value['itemCategory'] == $_GET['category_name']) {
                foreach ($categoryDataArr as $key => $data) {
                    if ($data != '') {
                        $itemsCategoryArr[] = $data;
                    }
                }
                break;
            }
            break;
        }
        fclose($categoryName);
    }
}
$itemsCategoryArr = array_count_values($itemsCategoryArr);
//Array ( [a:4:{s:8:"itemName";s:7:"iphone7";s:15:"itemDescription";s:5:"white";s:12:"itemCategory";s:5:"apple";s:5:"count";s:1:"1";}] => 2 )

foreach ($itemsCategoryArr as $key => $value) {
    $key = unserialize($key); // Array ( [itemName] => iphone7 [itemDescription] => white [itemCategory] => apple [count] => 1 )

    echo "<form action='saveProduct-list.php' method='post'>";

    foreach ($key as $item) {
        if ($key != 'itemCategory') {
            echo "<input type='hidden' name='$item' value='$item'> $item <br>";
            // $_POST = Array ( [iphone7] => iphone7 [white] => white [apple] => apple [1] => 1 [count] => 3 ) count - сколько мы указали при отправке формы
        }
    }

    echo "купить(шт): <input type='number' name='buy'>
    <input type='submit' value='купить'></form>";
}

