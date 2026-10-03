<!DOCTYPE html>
<html>
<head>
    <title>Category Dropdown</title>

    <script>
        function loadCategories() {

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("category").innerHTML =
                        this.responseText;

                }

            };

            xhttp.open("GET", "b5.php?load=yes", true);
            xhttp.send();
        }
    </script>
</head>

<body onload="loadCategories()">

<h2>Select Category</h2>

<select id="category">

    <option>Loading...</option>

</select>

</body>
</html>

<?php

if (isset($_GET["load"])) {

    $conn = pg_connect(
        "host=localhost dbname=collage user=postgres password=vrushali"
    );

    if (!$conn) {
        die("Database connection failed");
    }

    $result = pg_query(
        $conn,
        "SELECT * FROM category"
    );

    while ($row = pg_fetch_assoc($result)) {

        echo "<option value='" . $row["cid"] . "'>";
        echo $row["cname"];
        echo "</option>";

    }
}

?>
