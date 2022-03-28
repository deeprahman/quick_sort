<?php
declare(strict_types=1);
include_once __DIR__ . "/Sort.php";
final class TestSort
{
    public static $arr;
    public static $org_arr;

    public static function test()
    {
        self::$arr = self::initiateArray(); 
        self::$org_arr = self::initiateArray();
        $sort = new Sort();
        $sort->sort(self::$arr,0,3);
        self::printArray();
    }

    public static function printArray()
    {
        printf("Before Sorting:\n");
        print_r(self::$org_arr);
        printf("After Sorting:\n");
        print_r(self::$arr);
    }

    public static function initiateArray()
    {
        $arr=new \SplFixedArray(4);

        $arr[0] = 1; // TODO: Fix problem when duplicate
        $arr[1] = 4;
        $arr[2] = 1; // TODO: Fix problem when duplicate
        $arr[3] = 3;

        return $arr;

    }

}

TestSort::test();