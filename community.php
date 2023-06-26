<?php include('header.php'); 
include('connect.php'); ?>
<style>
  #commu{
    color:rgb(113, 15, 66);
    font-weight: 800;
  }

  #loader {
  display: none;
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
}

#loader:before {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border: 4px solid #f3f3f3;
  border-top: 4px solid #3498db;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% {
    transform: translate(-50%, -50%) rotate(0deg);
  }
  100% {
    transform: translate(-50%, -50%) rotate(360deg);
  }
}

</style>
<div class="container-fluid">
  <div class="row custom-margin">
    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-left">
      <h4 style="color:black;">OUR COMMUNITY</h4>
      <h2>WE ARE TOGETHER</h2>
      <p style="color:black;">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document</p>
    </div>
    <div class="col-lg-6">
        <center><img src="img/community.png" alt="Banner Image" class="img-fluid fixed-width-image1"  style=""><center>
    </div>
  </div>

  <div class="row custom-margin main backbg" style="margin-top:20px">
    <div class="col-md-12">
      <center><div class="fiels">
        <select class="form-control" id="comname" style="margin:0 10px; border-radius: 0;">
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
          <input type="text" id="nameInput" placeholder="Search for names" class="form-control" style="margin:0 10px; border-radius: 0;">
      
          <button class="btn btBack" id="search" style="margin:0 10px;">Search</button>
      
          <div  id="seeall" style="display:none;">
            <button class="btn btBack" id="alluser" style="margin:0 10px;">See All</button>
          </div>
      </div></center>
    </div>
  </div>
  <div class="row custom-margin main backbg gridRowall" id="gridRow">
    
  </div>
  <div class="row custom-margin main backbg gridRowall" id="gridRow1" style="display:none">
        
  </div>
  <div class="row custom-margin main backbg">
    <div class="col-md-12">
      <div class="pagination" id="pagination">
          <button class="page-link" id="prev-button" disabled>Previous</button>
          <button class="page-link" id="next-button">Next</button>
      </div>
    </div>
  </div>
  
  <div class="row custom-margin main">
    <div class="col-lg-12">
        <center><h3 class="text-center" style="color:black;">OUR COMMUNITY</h3></center>
    </div>
  </div>
  <div class="row custom-margin main gridRowall" id="community">
    
  </div>
</div>
<script>
  $(document).ready(function()
  {
    showLoader();
    var currentPage = 1;
    var pageSize = 8;
    loadData();

    $('#next-button').on('click', function() 
    {

        currentPage++;
        loadData();
    });

    $('#prev-button').on('click', function() {
        currentPage--;
        loadData();
    });

    function loadData()
    {
        let log=$.ajax({
            url: 'ajax/load_users.php',
            type: 'POST',
            data: {
                Submit: 'submit',
                page: currentPage,
                pageSize: pageSize
            },
            cache: false,
            success: function(data) 
            {

                $('#gridRow').html(data);
                updatePagination();
            }
        });
        console.log(log);
    }

    function updatePagination() 
    {
        if (currentPage <= 1) 
        {
            $('#prev-button').attr('disabled', 'disabled');
        } else {
            $('#prev-button').removeAttr('disabled');
        }
    }


    let log=$.ajax({
          url: 'ajax/load_events.php',
          type: "POST",
          data:{community:"submit"},
          cache:false,
          success:function(data)
          {
              $('#community').html(data);
          }
      });

      function showLoader() {
        $('#loader').show();
      }

      // Hide the loader
      function hideLoader() {
        $('#loader').hide();
      }
    //   loade_user();
      
      $('#alluser').click(function()
      { 
        $('#gridRow').show();
        $('#gridRow1').hide();
        $('#pagination').show();
        loadData();
      });

      $('#search').click(function()
      { 
        var comname= $('#comname').val();
        var nameInput= $('#nameInput').val();
        if(comname=='')
        {
          $('#comname').css('border-color', 'red');
          exit()
        }else
        {
          $('#comname').css('border-color', '');
        }
        // if(nameInput=='')
        // {
        //   $('#nameInput').css('border-color', 'red');
        //   exit();
        // }
        let log=$.ajax({
            url: 'ajax/load_users.php',
            type: "POST",
            data:{comname:comname,name:nameInput},
            cache:false,
            success:function(data)
            {
                $('#pagination').hide();
                $('#gridRow').hide();
                $('#gridRow1').show();
                $('#gridRow1').html(data);
                $('#seeall').show();
            }
        });
        // console.log(log);
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

      $('#nameInput').keypress(function(event)
            {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                    if ((keycode < 48 || keycode > 57))
                    return true;

                    return false;

            });
    });

    
    // function loade_user()
    // {
    //   let log=$.ajax({
    //       url: 'ajax/load_users.php',
    //       type: "POST",
    //       data:{Submit:"submit"},
    //       cache:false,
    //       success:function(data)
    //       {
    //           $('#gridRow').html(data);
    //           $('#seeall').hide();
    //       }
    //   });
    // }
    
</script>


<?php include('in-touch.php'); ?>
<?php include('footer.php'); ?>

</body>
</html>