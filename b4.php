<!DOCTYPE html>
<html>
<head>
    <title>Product Search</title>

    <script>
        function searchProduct() {

            var pid = document.getElementById("pid").value;

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML =
                        this.responseText;
                }

            };

            xhttp.open("GET", "b4.php?pid=" + pid, true);
            xhttp.send();
        }
    </script>
</head>

<body>

<h2>Search Product</h2>

Enter Product ID:

<input type="text" id="pid">

<button onclick="searchProduct()">Search</button>

<br><br>

<div id="result"></div>

<?php

if (isset($_GET["pid"])) {

    $pid = $_GET["pid"];

    $conn = pg_connect(
        "host=localhost dbname=collage user=postgres password=vrushali"
    );

    if (!$conn) {
        die("Database connection failed");
    }

    $result = pg_query(
        $conn,
        "SELECT * FROM product WHERE pid = $pid"
    );

    if (pg_num_rows($result) > 0) {

        $row = pg_fetch_assoc($result);

        echo "Product ID: " . $row["pid"] . "<br>";
        echo "Product Name: " . $row["pname"] . "<br>";
        echo "Price: " . $row["price"] . "<br>";
        echo "Quantity: " . $row["quantity"];

    } else {

        echo "Product not found";

    }
}

?>

</body>
</html>
