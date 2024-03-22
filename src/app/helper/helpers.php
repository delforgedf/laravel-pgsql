<?php
if (!function_exists('hasConvenio')) {
    function hasConvenio($value)
    {
        if ($value === 'NÃO POSSUI') {
            return false;
        }
        return true;
    }
}
