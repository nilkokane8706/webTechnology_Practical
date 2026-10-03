<?php

$books = array(
    "Java Programming",
    "PHP Programming",
    "Python Basics",
    "HTML and CSS",
    "JavaScript",
    "Database Management",
    "Computer Networks"
);

$search = "";

if (isset($_GET["search"])) {
    $search = $_GET["search"];
}

for ($i = 0; $i < count($books); $i++) {

    if ($search == "" ||
        stripos($books[$i], $search) !== false) {

        echo $books[$i] . "<br>";
    }
}

?>
