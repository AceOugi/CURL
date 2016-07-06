<?php

if (!function_exists('curl'))
{
    /**
     * @param resource $ch
     * @return string
     */
    function curl(resource $ch)
    {
        return curl_exec($ch);
    }
}
