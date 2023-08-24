<?php


$unique = [];
echo "Starting test ...." . PHP_EOL;
$start = microtime(true);

for ($i = 1; $i <= 999999; $i++) {
    $result = Hasher::hashOrder($i);

    if (!preg_match("/^[0-9]{7}$/", $result)) {
        throw new InvalidArgumentException("Result {$result} does not match regex");
    }

    if (!empty($unique[$result])) {
        throw new InvalidArgumentException("Colision detected for key {$i}:{$unique[$result]} and result {$result}");
    }

    $unique[$result] = $i;
}

$time_elapsed_secs = microtime(true) - $start;

if ($time_elapsed_secs > 60) {
    throw new InvalidArgumentException("Could not finish test in 60 seconds");
}

echo "Finished in {$time_elapsed_secs}";


class Hasher
{
    private const REORDER_ARRAY = [3, 5, 0, 1, 6, 4, 2];
    private const HASH_NUMBERS = [5, 6, 4, 7, 3, 8, 9, 1, 0, 2];

    public static function hashOrder(int $number): string
    {
        $numberArray = str_split($number);
        $lenght = strlen($number);
        $hashedArray = [5, 5, 5, 5, 5, 5, 5];
        foreach ($numberArray as $key => $value) {
            $hashedArray[self::REORDER_ARRAY[$lenght - $key - 1]] = self::HASH_NUMBERS[$value];
        }
        return (string)implode("", $hashedArray);
    }
}