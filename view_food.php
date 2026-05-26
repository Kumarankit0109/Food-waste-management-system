<?php
include "php/db.php";

$result = mysqli_query($conn, "SELECT * FROM food");


while ($row = mysqli_fetch_assoc($result)) {
    echo "Food: " . $row['food_name'] . "<br>";
    echo "Quantity: " . $row['quantity'] . "<br>";
    echo "Location: " . $row['location'] . "<br><br>";
}
?>
