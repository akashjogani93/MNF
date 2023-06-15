<?php 
include('link.php');
?>


<div id="side" class="page-wrapper chiller-theme toggled">

  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
 
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#"><h1>MNF</h1></a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>

      <div class="sidebar-menu">
        <ul>
          <!-- <li class="header-menu">
            <span style="color:#fff"></span>
          </li> -->
          <!-- <li>
            <a href="dashboard.php">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li> -->
          <li>
            <a href="user.php">
              <i class="fa fa-tachometer-alt"></i>
              <span>User</span>
            </a>
          </li>
          <li>
            <a href="addcom.php">
              <i class="fa fa-tachometer-alt"></i>
              <span>Community</span>
            </a>
          </li>
          <li class="sidebar">
            <a href="addevents.php">
              <i class="fas fa-id-card"></i>
              <span>Events</span>
            </a>
          </li>

          <li class="sidebar">
            <a href="addmember.php">
              <i class="fas fa-id-card"></i>
              <span>Member</span>
            </a>
          </li>
          <li class="sidebar">
            <a href="Contact.php">
              <i class="fas fa-id-card"></i>
              <span>Contact</span>
            </a>
          </li>
          <li class="sidebar">
            <a href="in-touch.php">
              <i class="fas fa-id-card"></i>
              <span>In Touch</span>
            </a>
          </li>
          <li class="sidebar">
            <a href="contactDetails.php">
              <i class="fas fa-id-card"></i>
              <span>Contact Message</span>
            </a>
          </li>
          <!-- <li class="sidebar">
            <a href="pass.php">
              <i class="fas fa-id-card"></i>
              <span>Change Password</span>
            </a>
          </li> -->
           <li>
            <a href="../index.php">
              <i class="fa fa-power-off"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->

  </nav>

  <script>
      if (screen.width < 600) {
       $('#side').removeClass("toggled");
          // download complicated script
          // swap in full-source images for low-source ones
        }
    </script>