<?php

$arr = range(0, 10);
shuffle($arr);

echo '<pre>';
print_r(quick_sort($arr, 0, count($arr) - 1));
echo '</pre>';

function quick_sort(&$arr, $startIndex, $endIndex)
{
    $x = $arr[(($startIndex + $endIndex) / 2) ?? 0];
    $l = $startIndex;
    $r = $endIndex;

    echo $x . '</br>';
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