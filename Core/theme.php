<?php
function htmlPage($title, $body, $header = null, $footer = null)
{
    global $rootDir, $baseUrl, $prosesUri;
    $page = <<<DATA
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$title</title>
    <link rel="shortcut icon" href="{$baseUrl}/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="194x194" href="{$baseUrl}/Aset/favicon.png">
    <link rel="stylesheet" href="{$baseUrl}/Aset/style.css">
</head>
<body>
<div class="container">
    $header
    <article>
        $body
    </article>
    $footer
</div>
</body>
</html>
DATA;
echo $page;
}
?>
