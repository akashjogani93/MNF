<?php include("sidebar.php");
include('../connect.php')

?>
<style type="text/css">
    .box {
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
      padding: 20px;
    }
    .table-bordered tr th {
        background-color: rgb(113, 15, 66);
        color: white;
    }
    .btn{
      background-color: rgb(113, 15, 66);
        color: white;
    }
</style>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
            <h2 class="text-center" style="font-weight: 600">Our Contact Details</h2>
        </div>
    </div>
</div>
<?php 
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

<!-- Viewing Registered Users -->
<main class="page-content">
    <hr />
    <div class="row">
      <div class="col-md-4">
        <div class="box">
          <h4>Update Contact Details</h4><hr />
          <!-- <form> -->
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" id="email" name="email" class="form-control" value="<?php echo $email;?>">
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $phone;?>">
            </div>
            <div class="form-group">
              <label for="city">City:</label>
              <input type="text" id="city" name="city" class="form-control" value="<?php echo $city;?>">
            </div>
            <div class="form-group">
              <label for="file">Address:</label>
              <input type="text" class="form-control form-control-sm" name="adds" id="adds"  value="<?php echo $adds;?>">
            </div>
            <div class="form-group">
              <input type="submit" value="Update" class="btn" id="contact">
              <center><div id="submited"></div></center>
            </div>
          <!-- </form> -->
        </div>
      </div>
      <div class="col-md-8">
        <div class="table-responsive" style="overflow-y:scroll; height: 380px;">
          <table class="table table-bordered table-striped bg-white" id="example">
            <thead>
              <tr>
                <th>Sl.No</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Address</th>
              </tr>
            </thead>
            <tbody class="mytable">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() 
    {

          let log=$.ajax({
              url: 'ajax/contactinfo.php',
              type: "POST",
              data:{Submit:"submit"},
              cache:false,
              success:function(data)
              {
                  $('.mytable').html(data);
              }
          }); 
    

      $('#city').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
            if ((keycode < 48 || keycode > 57))
            return true;

            return false;
        });
        $('#phone').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
            if ((keycode < 48 || keycode > 57))
            return false;

            return true;

        });
      
      $('#contact').click(function()
      {
        var email = $('#email').val();
        var phone = $('#phone').val();
        var city = $('#city').val();
        var adds = $('#adds').val();
        var inputIds = ['#email','#phone', '#city','#adds'];

        for (var i = 0; i < inputIds.length; i++) 
        {
            var inputValue = $(inputIds[i]).val();
            if (inputValue === '') 
            {
                $(inputIds[i]).css('border-color', 'red');
                exit();
            }else {
                $(inputIds[i]).css('border-color', '');
            }
        }

        
        var form_data = new FormData();
        form_data.append('email', email);
        form_data.append('phone', phone);
        form_data.append('city', city);
        form_data.append('adds', adds);
        let log=$.ajax({
            url:"ajax/contactinfo.php",
            method:"POST",
            data:form_data,
            contentType: false,
            processData: false,
            success: function(response) 
            {
                $('#submited').html(response);
                loade();
                setTimeout(function() {
                    $('#submited').html('');
                }, 3000);
                for (var i = 0; i < inputIds.length; i++) {
                    $(inputIds[i]).val('');
                }

                location.reload();
            }
        });
      });

    });

  </script>
</main>
