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
