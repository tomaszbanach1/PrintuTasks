<?php

echo findUniqueString("hashthegame");
/*
 * return index of first unique character, if string don't have any return -1
 */
function findUniqueString(string $s = "adelajda"): int
{
    $uniqueCharacters = count_chars($s, 1);
    print_r($uniqueCharacters);
    $uniqueIndex = -1;

    foreach ($uniqueCharacters as $character => $count) {
        //echo $count;
        if (1 === $count) {
            $position = strpos($s, chr($character));
            if (-1 === $uniqueIndex || $position < $uniqueIndex) {
                $uniqueIndex = $position + 1;
            }
        }
    }

    return $uniqueIndex;
}

