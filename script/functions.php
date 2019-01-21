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

/**
 * Get script param
 * var_dump(getScriptParam(["--startTime='2018-01-01 00:00:00'", "--endTime='2018-01-21 00:00:00'", "qaz=wsx"], 'startTime', '--'));
 */
if (!function_exists('getScriptParam')) {
    function getScriptParam($params, $name, $prefix = '--')
    {
        if (is_array($params)) {
            foreach ($params as $param) {
                if (substr_compare($param, $prefix, 0, strlen($prefix)) !== 0) continue;
                $arr = [];
                parse_str(substr($param, strlen($prefix)), $arr);
                if (isset($arr[$name])) return $arr[$name];
            }
        }
        return NULL;
    }
}