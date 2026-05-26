<?php
session_start();
include("php/db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$id = $_SESSION['user_id'];

$result = mysqli_query($conn,"SELECT * FROM admin WHERE id='$id'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Profile</title>

<style>

body{
margin:0;
font-family:Arial, sans-serif;

/* FULL BACKGROUND IMAGE */

background-image:url("https://images.pexels.com/photos/3184192/pexels-photo-3184192.jpeg");
background-size:cover;
background-position:center;
background-repeat:no-repeat;
background-attachment:fixed;

min-height:100vh;
color:white;
}

/* HEADER */

.header{
background:rgba(46,125,50,0.95);
color:white;
padding:15px;
display:flex;
justify-content:center;
align-items:center;
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

/* PROFILE BOX */

.profile-box{
background:rgba(0,0,0,0.55);
width:380px;
margin:auto;
margin-top:150px;
padding:35px;
border-radius:12px;
text-align:center;
backdrop-filter:blur(6px);
}

.profile-box h2{
margin-bottom:20px;
}

/* INPUT FIELDS */

input{
width:90%;
padding:10px;
margin:10px 0;
border:none;
border-radius:5px;
}

/* BUTTON */

button{
padding:10px 25px;
background:#2e7d32;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
font-size:16px;
}

button:hover{
background:#1b5e20;
}

</style>

</head>

<body>

<div class="header">
<a href="admin_home.php" class="home-btn">Home</a>
<h2>Admin Profile</h2>
</div>

<div class="profile-box">

<h2>Admin Profile</h2>

<form action="php/update_profile.php" method="post">

<input type="text" name="name" value="<?php echo $row['username']; ?>" required>

<input type="text" name="password" value="<?php echo $row['password']; ?>" required>

<br>

<button type="submit">Update</button>

</form>

</div>

</body>
</html>