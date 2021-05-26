<?php
    define("DB_SRV", "127.0.0.1");
    define("DB_USER", "root");
    define("DB_PASSWD", "passwd");
    define("DB_DB", "QuizzIT");

    $DB = new PDO("mysql:host=" . DB_SRV . ";dbname=" . DB_DB, DB_USER, DB_PASSWD);
?>
