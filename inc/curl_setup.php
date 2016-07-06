<?php

if (!function_exists('curl_setup'))
{
    /**
     * @param string $url
     * @param array|null $post
     * @param string|null $cookie
     * @param string|null $ip
     * @param string|null $port
     * @return resource
     */
    function curl_setup(string $url,
                  array $post = null,
                  string $cookie = null,
                  string $ip = null,
                  string $port = null)
    {
        // Initialize
        $ch = curl_init();

        // URL
        curl_setopt($ch, CURLOPT_URL, $url);

        // Post
        if (is_array($post))
        {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        }

        // Cookie
        if ($cookie)
        {
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
        }

        // IP
        if ($ip)
        {
            // Proxy
            if ($port)
            {
                curl_setopt($ch, CURLOPT_PROXY, $ip.':'.$port);
            }
            // Failover
            else
            {
                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                curl_setopt($ch, CURLOPT_INTERFACE, $ip);
            }
        }

        // Options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        return $ch;
    }
}
