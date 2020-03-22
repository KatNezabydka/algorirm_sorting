<?php

const ARRAY_COUNT = 1_000_000;

$arrayForQuickSort = getArray(ARRAY_COUNT);
$time_start = microtime(true);
quick_sort($arrayForQuickSort, 0, count($arrayForQuickSort) - 1);
$time_end = microtime(true);
$time = $time_end - $time_start;
echo 'Quick Sort - ' . $time . '<br>';

//$time_start = microtime(true);
//bubble_sort(getArray(ARRAY_COUNT));
//$time_end = microtime(true);
//$time = $time_end - $time_start;
//echo 'Bubble sort - ' . $time . '<br>';

$arrayForMergeSort = getArray(ARRAY_COUNT);
$time_start = microtime(true);
merge_sort($arrayForMergeSort, 0, count($arrayForMergeSort) - 1);
$time_end = microtime(true);
$time = $time_end - $time_start;
echo 'Merdge Sort - ' . $time . '<br>';

function getArray($count){
    $arr = range(0, $count);
    shuffle($arr);

    return $arr;
}

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

function bubble_sort(&$arr)
{
    $sorted = false;
    while (!$sorted) {
        $sorted = true;
        for ($i = 0; $i < count($arr) - 1; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                $sorted = false;
                $temp = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $temp;
                unset($temp);
            }
        }
    }
}

function merge_sort(&$arr, $l, $r)
{
    if ($r <= $l) return;
    $mid = intval(($r + $l) / 2);

    merge_sort($arr, $l, $mid);
    merge_sort($arr, $mid + 1, $r);

    $res = [];
    $i = $l;
    $j = $mid + 1;
    while ($i <= $mid && $j <= $r) {
        if ($arr[$i] < $arr[$j]) {
             $res[] = $arr[$i++];
        } else {
            $res[] = $arr[$j++];
        }
    }

    while ($i <= $mid) $res[] = $arr[$i++];
    while ($j <= $r) $res[] = $arr[$j++];
    for ($i = $l; $i <= $r; $i++) {
        $arr[$i] = $res[$i - $l];
    }

}

function selection_sort(&$arr){

}