<?php
/**
 * return the result for two array  
 *
 * @param array $arr1
 * @param array $arr2
 * @return array
 */
function mergeArray(array $arr1, array $arr2): array
{
    $result = [];
    // associate the key to result
    foreach ($arr1 as $index => $value) {
        
        if (isset($arr2["$index"])) {
            $result += [ $index => $arr2["$index"] ];
        } else {
            $result+= [ $index  => null];
        }
    }
    return $result;
}

$firstArray = array("field1" => "first", "field2" => "second", "field3" => "third","field4"=>"hello");
$secondArray = array("field1" => "dinosaur", "field2" => "pig", "field3" => "platypus");
$result = mergeArray($firstArray, $secondArray);
// print data
print_r($result);