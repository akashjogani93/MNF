<?php include('header.php');?>
<style>
  #eve{
    color:rgb(113, 15, 66);
    font-weight: 800;
  }
</style>
<div class="container-fluid">
    <div class="row custom-margin">
        <div class="col-lg-6 d-flex flex-column justify-content-center align-items-left subs">
            <h4 style="color:black;">UPCOMING EVENT</h4>
            <h2>MAF-BLR-2023 Meet</h2>
            <p style="color:black;">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document</p>
            <div>
                <button class="btn btBack">WATCH LIVE</button>
                <button class="btn btBack">CONTACT</button>
            </div>
        </div>
        <div class="col-lg-6 banner">
            <center><img src="img/homeslider.png" alt="Banner Image" class="img-fluid fixed-width-image" style=""></center>
        </div>
    </div>

    <div class="row custom-margin main backbg">
        <div class="col-lg-12">
            <center><h3 class="text-center" style="color:black;">OUR LATEST EVENTS</h3></center>
        </div>
    </div>
    <div class="row custom-margin backbg gridRowall" id="eventRow" style="background-color: #f0f0f0; padding-bottom:40px;">
        
    </div>
<script>
  $(document).ready(function()
  {
        let log=$.ajax({
          url: 'ajax/load_events.php',
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