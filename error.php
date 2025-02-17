<?php
	switch ($_GET['code']) {
		case '403':
			$title = "403 Forbidden";
			$body = "<h1>403</h1><p>You don't have permission to access the requested directory.</p>";
			break;
		case '404':
			$title = "404 Not Found";
			$body = "<h1>404</h1><p>The requested URL was not found on this server.</p>";
			break;
		case '500':
			$title = "500 Internal Server Error";
			$body = "<h1>500</h1><p>The server encountered an internal error and was unable to complete your request.</p>";
			break;
		default:
			$title = "404 Not Found";
			$body = "<h1>404</h1><p>The requested URL was not found on this server.</p>";
			break;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo($title); ?></title>
</head>
<body>
	<?php echo($body); ?>
</body>
</html>