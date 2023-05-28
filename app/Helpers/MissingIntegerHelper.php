<?php

namespace App\Helpers;

class MissingIntegerHelper
{
    public function solution(array $numbers): int
    {
        if (max($numbers) <= 0) {
            return 1;
        }

        $positiveNumber = 0;

        for ($i = max($numbers); $i > 0; $i--) {
            if (!in_array($i, $numbers)) {
                $positiveNumber = $i;
                break;
            }
        }

        if ($positiveNumber == 0) {
            return max($numbers) + 1;
        } else {
            return $positiveNumber;
        }
    }
}
