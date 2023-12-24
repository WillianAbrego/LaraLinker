<?php

namespace App\Classes;

class CodeGenerator
{
    protected $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    public function get_code($key)
    {
        $random_num = $this->get_random_num($key);
        $base62_num = $this->get_base62($random_num);
        $random_key = $this->chars[rand(0, 61)];
        $code = $random_key . $base62_num;
        return $code;
    }

    private function get_random_num($key)
    {
        list($microseg, $seg) = explode(' ', microtime());
        $seg = $seg - 1703000000;
        $microseg = round($seg * 1000);
        $microseg = ($microseg < 100) ? $microseg * 10 : $microseg;
        $num = (int)($seg . $microseg);
        $num = $num + $key;

        return $num;
    }

    private function get_base62($cociente)
    {
        $status = true;
        $base62_num = "";
        do {
            if ($cociente > 62) {
                $residuo = $cociente % 62;
                $cociente = intdiv($cociente, 62);
                $base62_num .= $this->chars[$residuo];
            } else {
                $status = false;
                $base62_num .= $this->chars[$cociente];
            }
        } while ($status);

        $base62_num = strrev($base62_num);
        return $base62_num;
    }
}
