<?php

$name = $_GET["name"];

if($name == "") 
{
    echo "Stranger, please tell me your name!";
}
else if(
    $name == "Rohit" ||
    $name == "Virat" ||
    $name == "Dhoni" ||
    $name == "Ashwin" ||
    $name == "Harbhajan" ) 

    {
        echo "Hello, master " . $name . "!";
    }
else 
    {
        echo $name . ", I don't know you!";
    }
?>