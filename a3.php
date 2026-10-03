<?php

$cities = [
    "Mumbai",
    "Pune",
    "Nashik",
    "Nagpur",
    "Delhi",
    "Bangalore",
    "Chennai",
    "Hyderabad"
];

$search = $_GET["search"];

foreach ($cities as $city) {

    if ($search == "" || stripos($city, $search) !== false) {

        echo $city . "<br>";

    }

}

?>