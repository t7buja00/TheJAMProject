<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>JAM Project</title>
   
    <link rel="stylesheet" href="<?php echo base_url('css/mystyle.css');?>">
    

  </head>
  <body>
  
  <ul>

      <li> <a href="<?php echo site_url('bike/index'); ?>">Home</a> </li>    
      <li> <a href="<?php echo site_url('bike/rent'); ?>">Rent</a> </li>
      <li> <a href="<?php echo site_url('bike/buy'); ?>">Buy</a> </li>
      <?php if(isset($_SESSION['user_email'])): ?>
      <li> <a href="<?php echo site_url('user/user_profile'); ?>"><?php echo ($_SESSION['user_name']);echo"'s ";?>Profile</a> </li>
      <li> <a href="<?php echo site_url('user/user_logout'); ?>">Logout</a> </li>
      <?php else: ?>
      <li> <a href="<?php echo site_url('user/login_view'); ?>">Login/Register</a> </li>
      <?php endif; ?>
      <li> <a href="<?php echo site_url('bike/About_us'); ?>">About Us</a> </li>

    </ul>


  <div class="page">
    <div class="container">
