<?php

namespace App\Helpers;

class FibonnaciHelper
{
    //Write a function that fibonnaci series  0 1 1 2 3 5 8 13 21 34 55 89 144 233 377 610

    public static function fibonnaci($n)
    {
        $first = 0;
        $second = 1;
        $fib = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($i <= 1) {
                $fib = $i;
            } else {
                $fib = $first + $second;
                $first = $second;
                $second = $fib;
            }
            echo $fib . " ";
        }
    }

    public static function fibonnaciRecursive($n)
    {
        if ($n <= 1) {
            return $n;
        }
        return self::fibonnaciRecursive($n - 1) + self::fibonnaciRecursive($n - 2);
    }

    public static function fibonnaciRecursivePrint($n)
    {
        for ($i = 0; $i < $n; $i++) {
            echo self::fibonnaciRecursive($i) . " ";
        }
    }

    public static function fibonnaciRecursivePrint2($n)
    {
        if ($n <= 1) {
            return $n;
        }
        echo self::fibonnaciRecursivePrint2($n - 1) + self::fibonnaciRecursivePrint2($n - 2) . " ";
    }

    public static function fibonnaciRecursivePrint3($n, $first = 0, $second = 1)
    {
        if ($n <= 1) {
            return $n;
        }
        $fib = $first + $second;
        $first = $second;
        $second = $fib;
        echo $fib . " ";
        self::fibonnaciRecursivePrint3($n - 1, $first, $second);
    }

    public static function fibonnaciRecursivePrint4($n, $first = 0, $second = 1)
    {
        if ($n <= 1) {
            return $n;
        }
        $fib = $first + $second;
        $first = $second;
        $second = $fib;
        self::fibonnaciRecursivePrint4($n - 1, $first, $second);
        echo $fib . " ";
    }
}
