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
    .combtn{
      background-color: rgb(113, 15, 66);
        color: white;
    }
    .svg-inline--fa {
      font-size: 12px;
    }
</style>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
            <h2 class="text-center" style="font-weight: 600">COMMUNITY ADD AND VIEW</h2><div class="d-flex flex-direction-row social">
      </div>
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
              <input type="submit" value="Submit" class="btn combtn" id="community">
              <input type="submit" value="Update" class="btn combtn" id="update" style="display:none;">
              <input type="submit" value="Back" class="btn btn-info" id="back">
              <input type="hidden" id="upvalue" name="upvalue" class="form-control" autocomplete="off" style="display:none;">
              <input type="hidden" id="idupdate" name="upvalue" class="form-control" autocomplete="off" style="display:none;">
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
                <th>Action</th>
                <th>Sl NO</th>
                <th>Community Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>File</th>
                <th style="display:none;">Id</th>
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
      $('#back').click(function()
      {   
        $('#name').val('');
        $('#upvalue').val(1);
        $('#adds').val('');
        $('#phone').val('');
        $('#community').show();
        $('#update').hide();
        $('#back').hide();
      });
      $('#example').on('click', '.edit', function() {
        var row = $(this).closest('tr');
        var slno = row.find('td:eq(1)').text();
        var name = row.find('td:eq(2)').text();
        var adds = row.find('td:eq(3)').text();
        var phone = row.find('td:eq(4)').text();
        var file = row.find('td:eq(5)').text();
        var idupdate = row.find('td:eq(7)').text();

        $('#name').val(name);
        $('#adds').val(adds);
        $('#phone').val(phone);
        $('#idupdate').val(idupdate);
        $('#upvalue').val(0);
        $('#community').hide();
        $('#update').show();
        $('#back').show();
      });
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
      
      $('#community , #update').click(function()
      {
        var comName = $('#name').val();
        var adds = $('#adds').val();
        var phone = $('#phone').val();
        var upvalue = $('#upvalue').val();
        var file=$('#path')[0].files[0];
        var fileName = $('#path').val();
        var idupdate = $('#idupdate').val();

        if(fileName=='')
        {
          path=0;
        }else
        {
          path=1;
        }

        if(upvalue==1)
        {
          var inputIds = ['#name','#phone', '#adds','#path'];
        }else
        {
          var inputIds = ['#name','#phone', '#adds'];
        }
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
        form_data.append('path', path);
        form_data.append('upvalue', upvalue);
        form_data.append('idupdate', idupdate);
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
