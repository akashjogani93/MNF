<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="style/style1.css">
  <title>MNF</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <a class="navbar-brand" href="home.php">
        <img src="img/logo.png" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php" id="home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="community.php" id="commu">Community</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php" id="eve">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php" id="abu">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php" id="conta">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php" id="profi">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
  </nav>

  <script>
    $(document).ready(function() {
      $('.navbar-nav a').on('click', function() {
        $('.navbar-collapse').collapse('hide');
      });
    });
  </script>
<?php 
  session_start();
  $type=$_SESSION['type'];
  if($type=="user")
  {

  }else
  {
    header("location:logout.php");
  }
?>
