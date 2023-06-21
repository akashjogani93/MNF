<?php include('connect.php');
 $query="SELECT * FROM `contact` WHERE `id`=1";
 $sn=0;
 $confirm = mysqli_query($conn, $query) or die(mysqli_error());
 while ($out = mysqli_fetch_array($confirm)) 
 { 
    $email=$out['email'];
    $phone=$out['phone'];
    $city=$out['city'];
    $adds=$out['adds'];
 }
?>
  <div class="row custom-margin footer">
    <div class="col-md-5">
      <img src="img/logo.png" alt="Image">
      <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a</p>
      <h4 class="">FALLOW US ON</h4>
      <div class="d-flex flex-direction-row social">
        <i class="fab fa-instagram"></i>
        <i class="fab fa-facebook-square"></i>
        <i class="fab fa-twitter-square"></i>
      </div>
    </div>
    <div class="col-md-3">
      <h4>QUICK LINKS</h4>
      <ul class="quick-links">
        <li><a class="quick-link" href="home.php">Home</a></li>
        <li><a class="quick-link" href="community.php">Community</a></li>
        <li><a class="quick-link" href="events.php">Events</a></li>
        <li><a class="quick-link" href="aboutus.php">About Us</a></li>
        <li><a class="quick-link" href="contactus.php">Contact Us</a></li>
      </ul>
    </div>
    <div class="col-md-4">
      <h4>RICH US AT</h4>
      <h6>Registered Office :</h6>
      <p><b>Email: </b><span class="contactdetails"><?php echo $email; ?></span></br>
      <b>Phone: </b><span class="contactdetails"><?php echo $phone; ?></span></br>
      <b>City: </b><span class="contactdetails"><?php echo $city; ?></span></br>
      <b>Address: </b><span class="contactdetails"><?php echo $adds; ?></span></p>
    </div>
  </div>
</div>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
