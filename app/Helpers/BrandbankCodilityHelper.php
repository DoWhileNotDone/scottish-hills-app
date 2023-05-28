<?php

namespace App\Helpers;

class BrandbankCodilityHelper
{
    public function solution(string $filePath, int $numberToReturn): string
    {
        $file = fopen($filePath, 'r');

        $headers = fgetcsv($file);

        $orders = [];

        while (!feof($file)) {
            $row = fgetcsv($file);
            $order_type = $row[0];
            $order_number = $row[1];
            if (!isset($orders[$order_number])) {
                $orders[$order_number] = 0;
            }

            if ($order_type === 'PRD') {
                $price = $row[3];
                $quantity = $row[4];

                $orders[$order_number] += ($price * $quantity);
            } else {
                $orders[$order_number] -= $row[2];
            }
        }

        arsort($orders);

        $results = [];

        $resultsLine = 1;

        foreach ($orders as $order_number => $order_value) {
            $results[] = [
                'rank' => $resultsLine,
                'orderNo' => $order_number,
                'value' => $order_value,
            ];
            $resultsLine++;
            if ($resultsLine == $numberToReturn + 1) {
                break;
            }
        }

        return json_encode($results);
    }
}
