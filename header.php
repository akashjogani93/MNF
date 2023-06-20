<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="style/style.css">
  <title>MNF</title>
  <style>
    /* Custom styles */
    .navbar {
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      /* height:20%; */
      padding: 0 30px;
    }

    .navbar-brand {
      font-weight: bold;
      /* height:80%; */
      height: 70px;
      width:70px;
    }

    .navbar-brand img {
      max-height: 100%;
      vertical-align: middle;
    }

    .navbar-light .navbar-nav .nav-link {
        color: #000;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
      color: #000;
    }
    .container-fluid{
        width:100%;
    }
  </style>
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
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="community.php">Community</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
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
