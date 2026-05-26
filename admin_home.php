<?php
session_start();

if(!isset($_SESSION['user_id'])){
header("Location: login.html");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Home</title>

<style>

body{
margin:0;
font-family:Arial, sans-serif;

/* FULL BACKGROUND IMAGE */

background-image:url("https://images.pexels.com/photos/70497/pexels-photo-70497.jpeg");
background-size:cover;
background-position:center;
background-repeat:no-repeat;
background-attachment:fixed;

min-height:100vh;
color:white;
}

/* Navbar */

.navbar{
background:rgba(46,125,50,0.95);
padding:15px 30px;
display:flex;
justify-content:space-between;
align-items:center;
}

.nav-links a{
color:white;
text-decoration:none;
margin-right:25px;
font-size:18px;
font-weight:bold;
}

.nav-links a:hover{
text-decoration:underline;
}

.logout-btn{
background:#d32f2f;
color:white;
padding:8px 15px;
border:none;
border-radius:5px;
font-size:15px;
cursor:pointer;
}

.logout-btn:hover{
background:#b71c1c;
}

/* Center content box */

.hero-box{
background:rgba(0,0,0,0.55);
padding:50px;
border-radius:12px;
width:60%;
margin:auto;
margin-top:160px;
text-align:center;
backdrop-filter:blur(6px);
}

.hero-box h1{
font-size:40px;
margin-bottom:20px;
}

.hero-box p{
font-size:18px;
line-height:1.6;
}

</style>

</head>

<body>

<div class="navbar">

<div class="nav-links">
<a href="admin_home.php">Home</a>
<a href="admin_profile.php">Profile</a>
<a href="admin_viewfood.php">View Food</a>
</div>

<button class="logout-btn" onclick="window.location.href='index.html'">
Logout
</button>

</div>

<div class="hero-box">

<h1>Welcome Admin</h1>

<p>
Admin can manage users, view food donations, and monitor system activity.
</p>

</div>

</body>
</html>