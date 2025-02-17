<?php
$msg = array();

function addMsg($stt, $msg)
{
    if ($stt) {
        $GLOBALS['msg']['success'][] = $msg;
    } else {
        $GLOBALS['msg']['errors'][] = $msg;
    }
}

function validateError()
{
    return (!isset($GLOBALS['msg']['errors']) or empty($GLOBALS['msg']['errors'])) ? true : false;
}

function getMsg()
{
    $output = $errors = $success = "";
    if (!empty($GLOBALS['msg'])) {
        if (!empty($GLOBALS['msg']['success'])) {
            foreach ($GLOBALS['msg']['success'] as $val1) {
                $success .= "<p>$val1</p>";
            }
            $success = <<<DATA
<div class="success">
    $success
</div>
DATA;
        }

        if (!empty($GLOBALS['msg']['errors'])) {
            foreach ($GLOBALS['msg']['errors'] as $val2) {
                $errors .= "<p>$val2</p>";
            }
            $errors = <<<DATA
<div class="errors">
    $errors
</div>
DATA;
        }

        $output = <<<DATA
<div class="sysMsg">
    $success
    $errors
</div>
DATA;
    }
    return $output;
}