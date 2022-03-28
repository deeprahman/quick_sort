<?php
include_once __DIR__ . "/ISort.php";
abstract class AQuickSort implements ISort
{
    public abstract function sort(\SplFixedArray &$array, int $bgn_indx, int $end_indx);
    protected abstract function partition(\SplFixedArray  &$array, int $bgn_indx, int $end_indx): int;
    protected abstract function swap(\SplFixedArray &$array, int $indx_1, int $indx_2);
}
