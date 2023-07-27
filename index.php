<?php
$name = "Wole";
define("age", 1111); //constant definition in php

echo (age);
echo '<br>';

$num1 = 1112; //Integer
$num2 = 11.22; //Float

$arr1 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, );
$arr2 = ["Adewole", "Adeleke", "Samuel2", "Samuel1", "Aishat", "Ewatomi", "Issac"];

print_r($arr2);
echo '<br>';
print_r($arr2[4]);

$arr3 = [
    "name" => "Samuel2",
    "age" => 17,
    "color" => "Black",
    "club" => "Liverpool",
];
echo '<br>';
print_r($arr3);
echo '<br>';
print_r($arr3["name"]);

//Concatenation in php
$br = "<br>";

$newText = 'My name is' . $arr3["name"] . '. I am ' . $arr3['age'] . 'years old';
print_r($newText);
echo $br;

$newText2 = "My name is $arr2[0]";
print_r($newText);
echo $br;
print_r($newText2);
echo $br;
print_r("My name is {$arr2[4]}");

//Some string functions in php
echo $br;
$name = "Adeleke";
$length = strlen($name); //Returns the length pf a string
echo $length;

$introduce = "My name is Aishat. I come from Oyo state";
echo $br;
echo str_word_count($introduce); //Returns the number of words in a string

$rev = "Ewatomi";
echo $br;
echo strrev($rev); //Returns the reverse of a string

$pos = "My name is Ewatomi. I come from Taraba state";
echo $br;
echo strpos($pos, 'Taraba'); //Returns the position of a string from index 0

$rep = "My name is Ewatomi. I come from Taraba state";
echo $br;
echo str_replace("Taraba", "Ogun", $rep);

//Some number functions in php
echo $br;
$num1 = 3.756789;
echo floor($num1); //Returns the floor of a number
echo $br;
echo ceil($num1); //Returns the ceil of a number
echo $br;
echo round($num1, 0); //Returns the round of a number

//Some array functions in php
echo $br;
$arr3 = [1, 2, 3, 4, 5, 6, 7, 8, 9];
array_push($arr3, 10); //Adds an element to the end of an array
print_r($arr3);
echo $br;
array_pop($arr3); //Removes an element from the end of an array
function filterNum($num)
{
    return ($num % 2 === 0);
}
print_r(array_filter($arr3, "filterNum")); //Filters an array based on a function
print_r(count($arr3)); //Returns the length of an array


//Multidimensional array
echo $br;
$arr7 = ["Adewole", "Adeleke", "Samuel2", "Samuel1", "Aishat", "Ewatomi", "Issac"];
for ($i = 0; $i < count($arr7); $i++) {
    print_r("My name is $arr7[$i] <br>");
}

$arr4 = [
    ["name" => "Ewatomi", "Age" => 1111, "color" => "Black"],
    ["name" => "Aishat", "Age" => 1112, "color" => "White"],
    ["name" => "Samuel", "Age" => 1113, "color" => "Brown"],
    ["name" => "Issac", "Age" => 1114, "color" => "Blue"],
    ["name" => "Adewole", "Age" => 1115, "color" => "Red"],
    ["name" => "Adeleke", "Age" => 1116, "color" => "Green"],
];
echo $br;
for ($i = 0; $i < count($arr4); $i++) {
    print_r("My name is " . $arr4[$i]['name'] . ". I am " . $arr4[$i]['Age'] . ' Years old' . "<br>");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="row">
        <div class="col-sm-8 card shadow-lg mx-auto my-5">
            <?php
                for ($i = 0; $i < count($arr4); $i++) {
                    print_r("<h6 class='display-6 text-muted text-center my-3'>
                    "."My name is " . $arr4[$i]['name'] . ". I am " . $arr4[$i]['Age'] . ' Years old' . "</h6>");
                }
            ?>
        </div>

    </div>
</body>
</html>


