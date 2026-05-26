<?php
session_start();
include "php/db.php";

/* Check if user is logged in */
if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit();
}

$id = $_SESSION['user_id'];

/* Fetch user details */
$result = mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");

if(!$result){
    die("Database Query Failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>

<style>

body{
font-family:Arial;
background:url("https://images.pexels.com/photos/60504/security-protection-anti-virus-software-60504.jpeg") no-repeat center center fixed;
background-size:cover;
min-height:100vh;
margin:0;
text-align:center;
}

/* Header */

.header{
background:#2e7d32;
color:white;
padding:15px;
display:flex;
align-items:center;
justify-content:center;
position:relative;
}

.home-btn{
position:absolute;
left:20px;
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

/* Profile box */

.profile-box{
background:rgba(255,255,255,0.9);
width:350px;
margin:auto;
margin-top:120px;
padding:30px;
border-radius:8px;
}

input{
width:90%;
padding:8px;
margin:10px;
}

button{
padding:10px 20px;
background:#2e7d32;
color:white;
border:none;
cursor:pointer;
}

button:hover{
background:#1b5e20;
}

</style>

</head>

<body>

<div class="header">
<a href="home.html" class="home-btn">Home</a>
<h2>Profile</h2>
</div>

<div class="profile-box">

<h2>User Profile</h2>

<form action="php/update_profile_user.php" method="post">

<input type="text" name="name" placeholder="Enter Name" required>
<input type="email" name="email" placeholder="Enter Email" required>
<input type="text" name="phone" placeholder="Enter Phone Number" required>

<button type="submit">Update</button>

</form>

</div>

</body>
</html>