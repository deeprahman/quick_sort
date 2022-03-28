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

    protected function partition(\SplFixedArray  &$array, int $bgn_indx, int $end_indx):int
    {
        $pivot = $array[$bgn_indx];
        $l_indx = $bgn_indx;
        $r_indx = $end_indx;
        while($l_indx < $r_indx){
            while($array[$l_indx] < $pivot){
                $l_indx++;
            }
            while($array[$r_indx] > $pivot){
                $r_indx--;
            }
            if($l_indx < $r_indx){
                $this->swap($array, $l_indx, $r_indx);
            }
        }
        return $r_indx; 
    }

    protected function swap(\SplFixedArray &$array, int $indx_1, int $indx_2)
    {
        $array[$indx_1] = $array[$indx_1] ^ $array[$indx_2];
        $array[$indx_2] = $array[$indx_1] ^ $array[$indx_2];
        $array[$indx_1] = $array[$indx_1] ^ $array[$indx_2];
    }
}