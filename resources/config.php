<?php
    //ob_start();
    session_start();
    //session_destroy();

    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

    defined("UPLOAD_FOLDER") ? null : define("UPLOAD_FOLDER", __DIR__ . DS . "Uploads");

    $connection = mysqli_connect("localhost", "root", "", "ecomdb");

    require_once("functions.php");