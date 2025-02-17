<?php
function saveCookie($cookieName, $data)
{
    $method = 'AES-256-CBC';
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
    $encrypt = openssl_encrypt($data, $method, COOKIE_KEY, 0, $iv);
    $encrypt = base64_encode($iv.$encrypt);
    setcookie($cookieName, $encrypt, strtotime("+1 year"), $GLOBALS['rootDir']);
}

function getCookie($cookieName, $setSession = false)
{
    if (isset($_COOKIE[$cookieName]) and base64_decode($_COOKIE[$cookieName], true) != false) {
        $encrypt = base64_decode($_COOKIE[$cookieName]);
        $method = 'AES-256-CBC';
        $iv = substr($encrypt, 0, openssl_cipher_iv_length($method));
        $encrypt = substr($encrypt, openssl_cipher_iv_length($method));
        $output = openssl_decrypt($encrypt, $method, COOKIE_KEY, 0, $iv);
        if ($setSession) $_SESSION[$cookieName] = $output;
        return $output;
    } else {
        return false;
    }
}

function clearCookie($cookieName)
{
    if (isset($_COOKIE[$cookieName])) setcookie($cookieName, "", strtotime("-1 day"), $GLOBALS['rootDir']);
    if (isset($_SESSION[$cookieName])) unset($_SESSION[$cookieName]);
}