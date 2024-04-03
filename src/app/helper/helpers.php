<?php
if (!function_exists('hasConvenio')) {
    function hasConvenio($value)
    {
        if ($value === 'Não') {
            return false;
        }
        return true;
    }
}
if (!function_exists('is_ssl')) {
    function is_ssl()
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == "https") {
            return true;
        } elseif (isset($_SERVER['HTTPS'])) {
            return true;
        } elseif ($_SERVER['SERVER_PORT'] == 443) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('my_asset')) {
    function my_asset($path)
    {
        return asset($path, env('REDIRECT_HTTPS'));
    }
}
