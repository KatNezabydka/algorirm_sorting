<?php

$arr = range(0, 1000000);
shuffle($arr);

$time_start = microtime(true);
quick_sort($arr, 0, count($arr) - 1);
$time_end = microtime(true);
$time = $time_end - $time_start;
echo 'Time - ' . $time;
//echo '<pre>';
//print_r($arr);
//echo '</pre>';

function quick_sort(&$arr, $startIndex, $endIndex)
{
    $x = $arr[(($startIndex + $endIndex) / 2) ?? 0];
    $l = $startIndex;
    $r = $endIndex;

    while ($l <= $r) {
        while ($arr[$l] < $x) $l++;
        while ($arr[$r] > $x) $r--;
        if ($l <= $r) {
            $temp = $arr[$l];
            $arr[$l] = $arr[$r];
            $arr[$r] = $temp;
            unset($temp);
            $l++;
            $r--;
        }
    }
    if ($l < $endIndex) {
        quick_sort($arr, $l, $endIndex);
    }
    if ($r > $startIndex) {
        quick_sort($arr, $startIndex, $r);
    }
}
