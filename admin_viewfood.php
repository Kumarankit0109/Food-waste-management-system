<?php
include("php/db.php");

/* get selected location */
$location = isset($_GET['location']) ? $_GET['location'] : "";

/* join food table with users table */

$query = "
SELECT 
food.id,
food.food_name,
food.quantity,
food.location,
food.time,
users.name,
users.phone
FROM food
LEFT JOIN users ON food.user_id = users.id
";

/* apply filter if selected */

if($location != "")
{
$query .= " WHERE food.location='$location'";
}

if($location != "")
{
$result = mysqli_query($conn,$query);
}

/* get all unique locations for filter */

$locations = mysqli_query($conn,"SELECT DISTINCT location FROM food");

?>

<!DOCTYPE html>

<html>
<head>
<title>Food Donations</title>

<style>

body{
margin:0;
font-family:Arial, sans-serif;
background-color:#1b5e20;
min-height:100vh;
}

/* Header */

.header{
background:#2e7d32;
color:white;
padding:15px;
text-align:center;
position:relative;
}

.home-btn{
position:absolute;
left:20px;
top:15px;
background:white;
color:#2e7d32;
padding:6px 14px;
text-decoration:none;
border-radius:5px;
font-weight:bold;
}

.home-btn:hover{
background:#e8f5e9;
}

/* Table */

table{
width:90%;
margin:40px auto;
border-collapse:collapse;
background:white;
border-radius:6px;
overflow:hidden;
}

th, td{
padding:12px;
border:1px solid #ccc;
text-align:center;
}

th{
background:#2e7d32;
color:white;
}

/* Download button */

.download-btn{
display:block;
margin:20px auto;
padding:10px 22px;
background:#2e7d32;
color:white;
border:none;
cursor:pointer;
border-radius:5px;
font-size:16px;
}

.download-btn:hover{
background:#1b5e20;
}

/* Filter box */

.filter-box{
text-align:center;
margin-top:25px;
}

select{
padding:8px;
font-size:15px;
}

</style>

</head>

<body>

<div class="header">
<a href="admin_home.php" class="home-btn">Home</a>
<h2>Food Donations</h2>
</div>


<!-- FILTER BY LOCATION -->

<div class="filter-box">

<form action="admin_viewfood.php" method="GET">

<select name="location">

<option value="">Select Location</option>

<?php
while($loc = mysqli_fetch_assoc($locations))
{
echo "<option value='".$loc['location']."'>".$loc['location']."</option>";
}
?>

</select>

<button type="submit" class="download-btn">
Show Filtered Data
</button>

</form>

</div>


<table>

<tr>
<th>ID</th>
<th>Food Name</th>
<th>Quantity</th>
<th>Location</th>
<th>Time</th>
<th>Donor Name</th>
<th>Phone Number</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
echo "<tr>";

echo "<td>".$row['id']."</td>";
echo "<td>".$row['food_name']."</td>";
echo "<td>".$row['quantity']."</td>";
echo "<td>".$row['location']."</td>";
echo "<td>".$row['time']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['phone']."</td>";

echo "</tr>";
}
?>

</table>

<?php
if($location != "")
{
echo "<div style='text-align:center;'>
<a href='download.php?location=".$location."'>
<button class='download-btn'>Download Filtered Data</button>
</a>
</div>";
}
?>

<button class="download-btn" onclick="window.location.href='download.php'">
Download Data
</button>

</body>
</html>