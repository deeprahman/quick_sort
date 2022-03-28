<?php

interface ISort
{
    public function sort(\SplFixedArray &$array, int $bgn_indx, int $end_indx);
}