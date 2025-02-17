<?php
menu_register([
    '' => [
        'callback' => 'helloWorld'
    ]
]);

function helloWorld()
{
    htmlPage('Hello world', 'Hello world');
}