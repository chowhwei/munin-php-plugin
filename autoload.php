<?php

const MUNIN_PHP_PLUGIN_NS = 'Chowhwei\\MuninPhpPlugin\\';
const MUNIN_PHP_PLUGIN_PATH = 'src\\MuninPhpPlugin\\';

function classLoader($class)
{
    if (!str_starts_with($class, MUNIN_PHP_PLUGIN_NS)) {
        return;
    }
    $path = str_replace(MUNIN_PHP_PLUGIN_NS, MUNIN_PHP_PLUGIN_PATH, $class);
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    $file = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
}

if (version_compare(PHP_VERSION, '8.0.0', '<')) {
    function str_starts_with($haystack, $needle)
    {
        if ($needle == '') {
            return true;
        }

        if (strlen($haystack) < strlen($needle)) {
            return false;
        }

        if (substr($haystack, 0, strlen($needle)) != $needle) {
            return false;
        }

        return true;
    }
}

spl_autoload_register('classLoader');