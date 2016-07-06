<?php

if (!function_exists('curl'))
{
    /**
     * @param resource $ch
     * @return string
     */
    function curl($ch)
    {
        return curl_exec($ch);
    }
}
