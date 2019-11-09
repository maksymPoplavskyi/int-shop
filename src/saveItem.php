<?php

require_once 'items.php';

function saveItem($postItems) {
    file_put_contents("products/$postItems", serialize($_POST) . PHP_EOL, FILE_APPEND);
}