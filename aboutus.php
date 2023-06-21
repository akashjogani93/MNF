<?php include('header.php');?>
<style>
  #abu{
    color:rgb(113, 15, 66);
    font-weight: 800;
  }
</style>
<div class="container-fluid">
  <div class="row custom-margin">
    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-left">
      <h4 style="color:black;">About Us</h4>
      <p style="color:black;">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document</p>
    </div>
    <div class="col-lg-6">
      <center><img src="img/logo.png" alt="Banner Image" class="img-fluid fixed-width-image2" style=""></center>
    </div>
  </div>

  <div class="row custom-margin main">
    <div class="col-lg-4 col-md-6">
      <div class="column">
          <h4 class="text-center" style="color:black;">ABOUT US</h4>
          <img src="img/about.png" alt="Image 1">
          <p style="color:black;">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ips</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="column">
          <h4 class="text-center" style="color:black;">OUR MISSION</h4>
          <img src="img/mission.png" alt="Image 2">
          <p style="color:black;">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ips</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-12">
      <div class="column">
          <h4 class="text-center" style="color:black;">OUR VISION</h4>
          <img src="img/vision.png" alt="Image 3">
          <p style="color:black;">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ips</p>
      </div>
    </div>
  </div>

    <div class="row custom-margin main backbg">
        <div class="col-lg-12">
            <center><h3 class="text-center" style="color:black;">OUR TEAM MEMBERS</h3></center>
        </div>
    </div>
    <div class="row custom-margin backbg gridRowall" id="eventRow" style="background-color: #f0f0f0; padding-bottom:40px;">
        
    </div>
<script>
  $(document).ready(function()
  {
    let log=$.ajax({
        url: 'ajax/load_member.php',
        type: "POST",
        data:{Submit:"submit"},
        cache:false,
        success:function(data)
        {
            $('#eventRow').html(data);
        }
    });
  });
</script>
<?php include('in-touch.php'); ?>
<?php include('footer.php'); ?>

</body>
</html>