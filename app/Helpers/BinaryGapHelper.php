<?php

namespace App\Helpers;

class BinaryGapHelper
{
    //Exclude Negative Numbers
    public function solution(int $int): int
    {
        if ($int <= 0) {
            return 0;
        }

        $binary = decbin($int);
        $binaryArray = str_split($binary);
        $binaryGap = 0;

        $binaryGapArray = [];
        foreach ($binaryArray as $key => $value) {
            if ($value == 0) {
                $binaryGap++;
            } else {
                $binaryGapArray[] = $binaryGap;
                $binaryGap = 0;
            }
        }
        return max($binaryGapArray);
    }
}
