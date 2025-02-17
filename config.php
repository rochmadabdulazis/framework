<?php
// dsn mysql:host=127.0.0.1;port=;dbname=
// dsn sqlite:/path/to/file.db
$db_dsn = "";
$db_user = "";
$db_passwd = "";

$rootDir = ""; //harus di isi

$baseUrl = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$rootDir;
define('BASE_URL', $baseUrl);

$requestUri = $_SERVER['REQUEST_URI']; // 	/mcb/index.php?text=123&q=abc

define('COOKIE_KEY', 'change me'); // untuk encrypt cookie

$prosesUri = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
define('PROSES_URI', $prosesUri);

$referer = base64_encode($prosesUri);
define('REFERER', $referer);
