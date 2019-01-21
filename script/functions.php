<?php

/**
 * Get script params
 * var_dump(getScriptParams(["--startTime='2018-01-01 00:00:00'", "--endTime='2018-01-21 00:00:00'", "qaz=wsx"], '-'));
 */
if (!function_exists('getScriptParams')) {
    function getScriptParams($params, $prefix = '--')
    {
        $matches = [];
        foreach ($params as $param) {
            if (substr_compare($param, $prefix, 0, strlen($prefix)) !== 0) continue;
            $param = substr($param, strlen($prefix));
            $arr = [];
            parse_str($param, $arr);
            $matches = array_merge($matches, $arr);
        }
        return $matches;
    }
}
