<?php

require_once 'saveCategory.php';

$category = $_POST['categoryName'];

save($category);

header('Location: /');