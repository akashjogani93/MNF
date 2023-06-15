<?php include('header.php'); 
include('connect.php'); ?>
<div class="container-fluid main">
  <div class="row custom-margin">
    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-left">
      <h4 style="color:black;">OUR COMMUNITY</h4>
      <h2>WE ARE TOGETHER</h2>
      <p style="color:black;">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document</p>
    </div>
    <div class="col-lg-6">
        <img src="img/community.png" alt="Banner Image" class="img-fluid fixed-width-image1"  style="">
    </div>
  </div>
  
  <div class="box-di">
    <div class="row custom-margin" id="selectrow">
      <div class="col-md-3">
        <select class="form-control" id="comname">
          <option value="">Select Community</option>
          <?php 
            $query="SELECT DISTINCT `comName` FROM `community`";
            $co=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($co))
            {
              $comm=$row['comName'];
              ?>
                <option value="<?php echo $comm; ?>"><?php echo $comm; ?></option>
              <?php
            }
          ?>
        </select>
      </div>
      <div class="col-md-3">
        <input type="text" id="nameInput" placeholder="Search for names" class="form-control">
      </div>
      <div class="col-md-1">
        <button class="btn btn-info" id="search">Search</button>
      </div>
      <div class="col-md-3" id="seeall" style="display:none;">
        <button class="btn btn-info" id="alluser">See All</button>
      </div>
    </div>
    <div class="row" id="gridRow">
      
    </div>
          </br>
    <div class="row custom-margin">
      <div class="col-lg-12">
          <center><h3 class="text-center" style="color:black;">OUR COMMUNITY</h3></center>
      </div>
    </div>
    <div class="row" id="eventRow">
      
    </div>
  </div>
  
</div>
<script>
  $(document).ready(function()
  {

    let log=$.ajax({
          url: 'ajax/load_events.php',
          type: "POST",
          data:{community:"submit"},
          cache:false,
          success:function(data)
          {
              $('#eventRow').html(data);
          }
      });


      loade_user();
      $('#alluser').click(function()
      { 
        loade_user();
      });

      $('#search').click(function()
      { 
        var comname= $('#comname').val();
        var nameInput= $('#nameInput').val();
        if(comname=='')
        {
          $('#comname').css('border-color', 'red');
          exit()
        }
        if(nameInput=='')
        {
          $('#nameInput').css('border-color', 'red');
          exit();
        }
        let log=$.ajax({
            url: 'ajax/load_users.php',
            type: "POST",
            data:{comname:comname,name:nameInput},
            cache:false,
            success:function(data)
            {
                $('#gridRow').html(data);
                $('#seeall').show();
            }
        });
      });

      $("#nameInput").autocomplete({
        source: function(request, response) 
        {
          var comname= $('#comname').val();
         let log= $.ajax({
            url: "search.php", 
            method: "POST",
            dataType: "json",
            data: {
              query: request.term,
              comname:comname
            },
            success: function(data) {
              response(data); 
            }
          }); console.log(log)
        },
        minLength: 1
      });
    });

    
    function loade_user()
    {
      let log=$.ajax({
          url: 'ajax/load_users.php',
          type: "POST",
          data:{Submit:"submit"},
          cache:false,
          success:function(data)
          {
              $('#gridRow').html(data);
              $('#seeall').hide();
          }
      });
    }
    
</script>


<?php include('in-touch.php'); ?>
<?php include('footer.php'); ?>

</body>
</html>