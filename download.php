<?php
include("php/db.php");

/* CSV headers */
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="food_donation_data.csv"');

$output = fopen("php://output","w");

/* Column titles */
fputcsv($output, ['Food Name','Quantity','Location','Time','Donor Name','Phone Number']);

/* get selected location from filter */
$location = isset($_GET['location']) ? $_GET['location'] : "";

/* security improvement */
$location = mysqli_real_escape_string($conn,$location);

/* Query */
$query = "
SELECT 
food.food_name,
food.quantity,
food.location,
food.time,
users.name,
users.phone
FROM food
LEFT JOIN users ON food.user_id = users.id
";

/* apply filter if location selected */
if($location != "")
{
$query .= " WHERE food.location='$location'";
}

$result = mysqli_query($conn,$query);

/* Write rows */
while($row = mysqli_fetch_assoc($result))
{
    fputcsv($output,$row);
}

fclose($output);
exit();
?>