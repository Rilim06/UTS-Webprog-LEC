<?php
define("DSN", "mysql:host=localhost;dbname=contoh_database");
define("DBUSER", "root");
define("DBPASS", "");

$db = new PDO(DSN, DBUSER, DBPASS);