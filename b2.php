<!DOCTYPE html>
<html>
<head>
    <title>Customer Orders</title>

    <script>
        function showOrders() {

            var cno = document.getElementById("customer").value;

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML =
                        this.responseText;
                }

            };

            xhttp.open("GET", "b2.php?cno=" + cno, true);
            xhttp.send();
        }
    </script>
</head>

<body>

<h2>Select Customer</h2>

<?php

$conn = pg_connect("host=localhost dbname=collage user=postgres password=vrushali");

if (!$conn) {
    die("Database connection failed");
}

if (!isset($_GET["cno"])) {

    $result = pg_query($conn, "SELECT * FROM customer");

    echo "<select id='customer' onchange='showOrders()'>";
    echo "<option value=''>Select Customer</option>";

    while ($row = pg_fetch_assoc($result)) {

        echo "<option value='" . $row["cno"] . "'>";
        echo $row["cname"];
        echo "</option>";

    }

    echo "</select>";
}

?>

<br><br>

<div id="result"></div>

<?php

if (isset($_GET["cno"])) {

    $cno = $_GET["cno"];

    $query = "SELECT orders.ono, orders.odate,
                     orders.shipping_address,
                     customer.cname
              FROM orders
              JOIN customer
              ON orders.cno = customer.cno
              WHERE customer.cno = $cno";

    $result = pg_query($conn, $query);

    echo "<table border='1' cellpadding='8'>";

    echo "<tr>";
    echo "<th>Order Number</th>";
    echo "<th>Customer Name</th>";
    echo "<th>Order Date</th>";
    echo "<th>Shipping Address</th>";
    echo "</tr>";

    while ($row = pg_fetch_assoc($result)) {

        echo "<tr>";

        echo "<td>" . $row["ono"] . "</td>";
        echo "<td>" . $row["cname"] . "</td>";
        echo "<td>" . $row["odate"] . "</td>";
        echo "<td>" . $row["shipping_address"] . "</td>";

        echo "</tr>";
    }

    echo "</table>";
}

?>

</body>
</html>
