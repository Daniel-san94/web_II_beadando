<?php

//alkalmazás gyökér könyvtára a szerveren
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/web_II_beadando/');

//URL cím az alkalmazás gyökeréhez
define('SITE_ROOT', 'http://localhost/web_II_beadando/');

// a router.php vezérlõ betöltése
require_once(SERVER_ROOT . 'controllers/' . 'router.php');

?>