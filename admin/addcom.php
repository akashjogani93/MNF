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
            <h2 class="text-center" style="font-weight: 600">COMMUNITY ADD AND VIEW</h2>
        </div>
    </div>
</div>


<!-- Viewing Registered Users -->
<main class="page-content">
    <hr />
    <div class="row">
      <div class="col-md-4">
        <div class="box">
          <h4>Add Community Details</h4><hr />
          <!-- <form> -->
            <div class="form-group">
              <label for="name">Community Name:</label>
              <input type="text" id="name" name="name" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" id="phone" name="phone" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="phone">Office Address:</label>
              <input type="text" id="adds" name="adds" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="file">File:</label>
              <input type="file" class="form-control form-control-sm" name="path" id="path"  accept="image/jpeg, image/png" required>
            </div>
            <div class="form-group">
              <input type="submit" value="Submit" class="btn" id="community">
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
                <th>Sl NO</th>
                <th>Community Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>File</th>
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

      loade();
      function loade()
      {
          var table=$('#example').DataTable();
          table.destroy();
          let log=$.ajax({
              url: 'ajax/upload_community.php',
              type: "POST",
              data:{Submit:"submit"},
              cache:false,
              success:function(data)
              {
                  $('.mytable').html(data);
                  $('#example').DataTable();
              }
          }); 
      }

      $('#name').keypress(function(event){
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
      
      $('#community').click(function()
      {
        var comName = $('#name').val();
        var adds = $('#adds').val();
        var phone = $('#phone').val();
        var file=$('#path')[0].files[0];
        var inputIds = ['#name','#phone', '#adds','#path'];

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
        form_data.append('comName', comName);
        form_data.append('adds', adds);
        form_data.append('phone', phone);
        form_data.append('file', file);
        let log=$.ajax({
            url:"ajax/upload_community.php",
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
            }
        });
      });

    });

  </script>
</main>
