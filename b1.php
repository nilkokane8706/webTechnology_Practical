<!DOCTYPE html>
<html>
<head>
    <title>Teacher Details</title>

    <script>
        function showTeacher() {

            var tno = document.getElementById("teacher").value;

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML =
                        this.responseText;
                }

            };

            xhttp.open("GET", "b1.php?tno=" + tno, true);
            xhttp.send();
        }
    </script>
</head>

<body>

<h2>Select Teacher</h2>

<?php

$conn = pg_connect("host=localhost dbname=collage port=5432 user=postgres password=vrushali");

if (!$conn) {
    die("Database connection failed");
}

if (!isset($_GET["tno"])) {

    $result = pg_query($conn, "SELECT * FROM teacher");

    echo "<select id='teacher' onchange='showTeacher()'>";
    echo "<option value=''>Select Teacher</option>";

    while ($row = pg_fetch_assoc($result)) {
        echo "<option value='" . $row["tno"] . "'>";
        echo $row["tname"];
        echo "</option>";
    }

    echo "</select>";
}

?>

<br><br>

<div id="result"></div>

<?php

if (isset($_GET["tno"])) {

    $tno = $_GET["tno"];

    $result = pg_query(
        $conn,
        "SELECT * FROM teacher WHERE tno = $tno"
    );

    $row = pg_fetch_assoc($result);

    echo "Teacher Number: " . $row["tno"] . "<br>";
    echo "Teacher Name: " . $row["tname"] . "<br>";
    echo "Qualification: " . $row["qualification"] . "<br>";
    echo "Salary: " . $row["salary"];

}

?>

</body>
</html>
