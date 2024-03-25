<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "22211_dongochieu_22");
define("BASE_URL", $_SERVER["DOCUMENT_ROOT"] . "/web/");

spl_autoload_register(function ($className) {
    require_once BASE_URL . "app/models/$className.php";
});