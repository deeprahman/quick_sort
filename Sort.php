<?php
include_once __DIR__ . "/AQuickSort.php";
final class Sort extends AQuickSort
{
    public function sort(\SplFixedArray &$array, int $bgn_indx, int $end_indx)
    {
        if($bgn_indx >= $end_indx || $array->count() === 1){
            return;
        }
        $pivot = $this->partition($array,$bgn_indx, $end_indx);
        $this->sort($array,$bgn_indx, $pivot-1);
        $this->sort($array, $pivot+1, $end_indx);
    }

    protected function partition(\SplFixedArray  &$array, int $bgn_indx, int $end_indx):int  // BUG: Problem when duplicate items in the array
    {
        /**
         * NOTE: This algorithm is form   https://www.programiz.com/dsa/quick-sort
         */

        // Select the rightmost index as pivot
        $pivot = $array[$end_indx];
        // Pointer to the assumed grater element
        $i = ($bgn_indx - 1);
        // traverse each element of the array and compare with the pivot
        for($j = $bgn_indx; $j < $end_indx; $j++){
            if($array[$j] <= $pivot){
                // If element smaller than the pivot is found, swap with the grater element pointed by $i
                $i++;
                $this->swap($array,$i,$j);
            }
        }
        // swap the grater element with the grater element at $i
        $this->swap($array,($i + 1), $end_indx);
        return ($i + 1);
    }

    protected function swap(\SplFixedArray &$array, int $indx_1, int $indx_2)
    {
        if($indx_1 === $indx_2) return;
        $array[$indx_1] = $array[$indx_1] ^ $array[$indx_2];
        $array[$indx_2] = $array[$indx_1] ^ $array[$indx_2];
        $array[$indx_1] = $array[$indx_1] ^ $array[$indx_2];
    }
}
