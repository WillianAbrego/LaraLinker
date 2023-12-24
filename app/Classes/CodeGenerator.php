<?php

namespace App\Classes;

class CodeGenerator
{
    protected $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    public function get_code($key)
    {
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
    }
}
