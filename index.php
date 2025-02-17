<?php
session_start();

include "./config.php";
include "./Core/messageHandler.php";
include "./Core/database.php";
include "./Core/route.php";
include "./Core/theme.php";
include "./Core/cookie.php";

$scan = scandir("./App");
foreach ($scan as $file) {
    if (is_file("./App/$file")) include "./App/$file";
}

menu_execute_active_handler();
?>
