<?php
if (isset($db_dsn) and !empty($db_dsn)) {
    try {
        $database = new PDO($db_dsn, $db_user, $db_passwd);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function dbQuery($sql, $params = [])
{
    global $database;
    $stmt = $database->prepare($sql);
    $stmt->execute($params);
    $return = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $return;
}
function dbExec($sql, $params = [], &$stmt = null)
{
    global $database;
    $stmt = $database->prepare($sql);
    return $stmt->execute($params);
}