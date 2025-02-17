<?php
$menu_registry = array();

function menu_register($items) {
	foreach ($items as $url => $item) {
		$GLOBALS['menu_registry'][$url] = $item;
	}
}

function menu_execute_active_handler() {
	$q = (isset($_GET['q'])) ? $_GET['q'] : "";
	$query = (array) explode('/', $q);
	$GLOBALS['page'] = $query[0];
	$page = $GLOBALS['menu_registry'][$GLOBALS['page']];
	if (!$page) {
        headerTo('/error.php?code=404');
		die();
	}

	// if (isset($page['security']) and $page['security']) user_ensure_authenticated();

	if (function_exists($page['callback']))
	return call_user_func($page['callback'], $query);

	return false;
}

function headerTo($link)
{
	header("Location: ".BASE_URL.$link);
}
function refTo()
{
	$link = "";
    if (isset($_GET['ref'])) {
        $link = base64_decode($_GET['ref']);
    }
    $link = ($link != false or !empty($link)) ? $link : BASE_URL;
	header("Location: ".$link);
}
