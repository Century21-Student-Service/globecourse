<?php
$a = 'a:7:{i:0;s:38:"uploads/image/20181220/1545279205.jpg,";i:1;s:38:"uploads/image/20181220/1545279740.jpg,";i:2;s:38:"uploads/image/20181220/1545283252.jpg,";i:3;s:38:"uploads/image/20181220/1545283899.jpg,";i:4;s:38:"uploads/image/20181220/1545287496.jpg,";i:5;s:38:"uploads/image/20181220/1545281394.jpg,";i:6;s:38:"uploads/image/20181220/1545289203.jpg,";}';
$arr = unserialize($a);
// print_r($arr);

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Make a big, honkin test array
// You may need to adjust this depth to avoid memory limit errors
$testArray = fillArray(0, 5);

// Time json encoding
$start = microtime(true);
json_encode($testArray);
$jsonTime = microtime(true) - $start;
echo "JSON encoded in $jsonTime seconds\n";

// Time serialization
$start = microtime(true);
serialize($testArray);
$serializeTime = microtime(true) - $start;
echo "PHP serialized in $serializeTime seconds\n";

// Compare them
if ($jsonTime < $serializeTime) {
    printf("json_encode() was roughly %01.2f%% faster than serialize()\n", ($serializeTime / $jsonTime - 1) * 100);
} else if ($serializeTime < $jsonTime) {
    printf("serialize() was roughly %01.2f%% faster than json_encode()\n", ($jsonTime / $serializeTime - 1) * 100);
} else {
    echo "Impossible!\n";
}

function fillArray($depth, $max)
{
    static $seed;
    if (is_null($seed)) {
        $seed = array('a', 2, 'c', 4, 'e', 6, 'g', 8, 'i', 10);
    }
    if ($depth < $max) {
        $node = array();
        foreach ($seed as $key) {
            $node[$key] = fillArray($depth + 1, $max);
        }
        return $node;
    }
    return 'empty';
}
