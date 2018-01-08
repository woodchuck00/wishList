<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title>Theodor Christmas List</title>
   <!-- Style sheets -->
   <link href='view/scripts/style.css' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="site_header">
   <img class="site_logo" src='view/images/santa.gif' alt='The Santa Logo' >
   <h1>Theodor Christmas List</h1>
<!-- change menu based on if user is logged in or not -->
   <?php session_start();
   if(!isset($_SESSION['username'])) { ?>
   <div id="menu">
       <ul id="horizontal-list">
         <li><a href="index.php?page=register">Register</a></li>
         <li><a href="index.php?page=login">Login</a></li>
      </ul>
   </div>
   <?php } else { ?>
   <div id="menu">
       <ul id="horizontal-list">
         <li><a href="index.php?page=index"><?php echo $_SESSION['username']; ?></a></li>
         <li><a href="index.php?page=addItem">Add Item</a></li>
         <li><a href="index.php?page=list">View List</a></li>
         <li><a href="index.php?page=logout">Logout</a></li>
      </ul>
   </div>
   <?php } ?>
   <div class="clear"></div>
</div>
<div class="site_container">
