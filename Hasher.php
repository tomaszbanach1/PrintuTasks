<?php

class Hasher
{
    private const REORDER_ARRAY = [3,5,7,0,9,1,6,4,2,8];
    private const HASH_NUMBERS = [5,6,4,7,3,8,3,9,1,0,2];
    public static function hashOrder(int $number): string
    {
        $numberArray = str_split($number);
        $hashedArray = [5,5,5,5,5,5,5,5,5,5];
        foreach ($numberArray as $key => $value)
        {
            $hashedArray[self::REORDER_ARRAY[$key]] = self::HASH_NUMBERS[$value];
        }
        return (string)implode("",$hashedArray);
    }
}