<?php

if (!function_exists('curl_multi'))
{
    /**
     * @param resource[] ...$ch_list
     * @return string[]
     */
    function curl_multi(...$ch_list)
    {
        $mh = curl_multi_init();

        foreach ($ch_list as $ch)
            curl_multi_add_handle($mh, $ch);

        do
        {
            curl_multi_exec($mh, $running);
            curl_multi_select($mh);
        } while ($running > 0);

        $result = [];

        foreach ($ch_list as $ch)
            $result[] = curl_multi_getcontent($ch);

        return $result;
    }
}
