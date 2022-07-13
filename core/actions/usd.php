<?php

if (!$_SERVER['DOCUMENT_ROOT'])
    $_SERVER['DOCUMENT_ROOT'] = '/var/www/html';

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/include/prolog.php';

new  Core\Currency\Usd();
