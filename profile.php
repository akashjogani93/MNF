<?php include('header.php'); 
    include('connect.php');
?>
<style>
    body
    {
        background-image: url("admin/assets/image/log.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    #profi{
      color:rgb(113, 15, 66);
      font-weight: 800;
    }
    
    .profile-card {
      width:50%;
      background-color: #fff;
      padding: 0px;
      border-radius: 5px;
      margin: 60px auto;
    }
    
    .profile-image {
      width: 100%;
      height: 200px;
      padding: 20px;
      border-radius: 5px;
      margin: 0 auto;
      justify-content:center;
      align-items:center;
      display:flex;
      flex-direction: column;
      background-color:#000;
      overflow: hidden;

    }
    
    .profile-image img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      
      object-fit: cover;
    }
    
    .profile-info {
      text-align: center;
      margin-top: 20px;
    }
    .form-group input, .form-group select{
      /* border:none; */
      background-color:#f0f0f0;
    }
    .form-group select{
      width:100%;
      padding: 6px;
    }
    .form-group {
      background-color:#fff;
      padding: 6px;
      border-radius:5px;
      margin-top:5px;
      box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
    
    .profile-info p {
      margin-bottom: 10px;
      color: black;
      font-size: 16px;
      line-height: 1.5;
      background-color:#fff;
      padding: 4px;
      box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
      border-radius:5px;
      text-align:left;
      padding-left:12px;
    }
    .form-group label{
      color:#000;
      font-weight:600;
      margin-bottom:0px;
    }
    
    .profile-info p span {
      font-weight: bold;
    }

    
    .edit-button {
      text-align: center;
      margin-top: 10px;
    }
    
    .edit-button button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 5px 10px;
      border-radius: 3px;
      cursor: pointer;
    }
    
    .profile-edit-card {
      width:50%;
      background-color:#fff;
     
      padding:10px;
      border-radius: 5px;
      margin: 0 auto;
      display: none;
    }
    
    .profile-edit-card.show {
      display: block;
    }
    
    .form-group {
      margin-bottom: 2px;
    }

    @media (max-width: 576px) {
      .profile-card,
      .profile-edit-card {
        width: 100%;
        max-width: 400px;
      }
    }

</style>
<?php 
    $id=$_SESSION['id'];
    $query="SELECT * FROM `user` WHERE `id`='$id'";
    $exc=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($exc))
    {   
        $profile=$row['profile'];
        $name=$row['name'];
        $email=$row['email'];
        $phone=$row['phone'];
        $community=$row['community'];
        $dob=$row['dob'];
        $age=$row['age'];
        $gender=$row['gender'];
        $adds=$row['adds'];
        $occ=$row['occ'];
        $sta=$row['sta'];
        $sta=$row['sta'];
        $jamaat=$row['community'];
    }
?>
<div class="container-fluid">
  <div class="row custom-margin" style="margin:20px 0 20px 0;">
    <!-- Profile -->
    <div class="profile-card pb-3">
        <div class="profile-image" style="width:100%;">
            <h2 style="color:white;">Profile</h2>
            <?php if($profile!='')
            { ?>
              <img src="<?php echo 'ajax/'.$profile;?>"  alt="Profile Image" /><?php
            }else
            {
              ?>
              <img src="<?php echo 'img/profile.png';?>"  alt="Profile Image" /><?php
            }?>
            
        </div>
        <div class="profile-info p-3">
          <div class="conatiner">
            <div class="row">
              <div class="col-md-6">
              <p><span>Name: </span><?php echo $name; ?></p>
            <p><span>Age: </span><?php echo $age; ?></p>
            <p><span>DOB: </span><?php echo $dob; ?></p>
            <p><span>Jamaat: </span><?php echo $jamaat; ?></p>
            <p><span>Phone: </span><?php echo $phone; ?></p>
              </div>
              <div class="col-md-6">
              <p><span>Email: </span><?php echo $email; ?></p>
            <p><span>Gender: </span><?php echo $gender; ?></p>
            <p><span>Address: </span><?php echo $adds; ?></p>
            <p><span>Occupation: </span><?php echo $occ; ?></p>
            <p><span>Marital Status: </span><?php echo $sta; ?></p>
              </div>
            </div>
          </div>
            
          
        </div>
        <div class="edit-button">
            <button id="editProfileBtn">Edit</button>
        </div>
    </div>
    
    <!-- Profile Edit -->
    <div class="profile-edit-card py-3 pt-5">
        <div class="row">
          <div class="col-md-6">
          <div class="form-group">
            <label for="file">Profile:</label>
            <input type="file" id="path" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" class="form-control" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" class="form-control" value="<?php echo $phone; ?>">
            <div id="validmobile"></div>
            <input type="hidden" id="phoneold" class="form-control" value="<?php echo $phone; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" class="form-control" value="<?php echo $email; ?>">
            <div id="validemail"></div>
            <input type="hidden" id="emailold" class="form-control" value="<?php echo $email; ?>">
        
        </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" id="age" class="form-control" value="<?php echo $age; ?>">
        </div>
        <div class="form-group">
            <label for="dob">DOB:</label>
            <input type="date" id="dob" class="form-control" value="<?php echo $dob; ?>">
        </div>
        <div class="form-group">
            <label class="d-block" for="gender">Gender:</label>
            <select name="gen" id="gen">
                <?php
                if($gender=='Male')
                { ?>
                    <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                    <option value="Female">Female</option><?php
                }else if($gender=='Female')
                { ?>
                    <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                    <option value="Male">Male</option><?php
                }else
                {
                  ?>
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option><?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label class="d-block" for="married">Marital Status:</label>
              <select name="married" id="married">
                <?php
                if($sta=='Single')
                { ?>
                    <option value="<?php echo $sta; ?>"><?php echo $sta; ?></option>
                    <option>Married</option> 
                    <?php
                }else if($sta=='Married')
                {
                  ?>
                    <option value="<?php echo $sta; ?>"><?php echo $sta; ?></option>
                    <option>Single</option>
                    <?php
                }
                else
                { ?>
                    <option value="">Select</option>
                    <option>Single</option>
                    <option>Married</option><?php
                }
                ?>
              </select>
        </div>
        <div class="form-group">
            <label for="adds">Address:</label>
            <input type="text" id="adds" class="form-control" value="<?php echo $adds; ?>">
        </div>
        </div>
      </div>
        
       
        <div class="text-center pt-3">
            <button id="saveProfileBtn" class="btn btn-primary">Save</button>
            <button id="goback" class="btn btn-success">Cancel</button>
            <div id="submited"></div>
        </div>
    </div>
    </div>
</div>
<?php include('footer.php'); ?>
<script>
  const editProfileBtn = document.getElementById('editProfileBtn');
  const goback = document.getElementById('goback');
  const saveProfileBtn = document.getElementById('saveProfileBtn');
  const profileCard = document.querySelector('.profile-card');
  const profileEditCard = document.querySelector('.profile-edit-card');

  editProfileBtn.addEventListener('click', function() {
    profileCard.style.display = 'none';
    profileEditCard.style.display = 'block';
  });
  goback.addEventListener('click', function() {
    profileCard.style.display = 'block';
    profileEditCard.style.display = 'none';
  });

  saveProfileBtn.addEventListener('click', function() 
  {
    var name=$('#name').val();
    var phone=$('#phone').val();
    var email=$('#email').val();
    var age=$('#age').val();
    var dob=$('#dob').val();
    var gender=$('#gen').val();
    var adds=$('#adds').val();
    var married=$('#married').val();
    var file=$('#path')[0].files[0];
    
    var inputIds = ['#name','#phone','#email'];
    for (var i = 0; i < inputIds.length; i++) 
    {
        var inputValue = $(inputIds[i]).val();
        if (inputValue === '') 
        {
            let inn=$(inputIds[i]).css('border-color', 'red');
            exit();
        }else {
            $(inputIds[i]).css('border-color', '');
        }
    }
    var prof=$('#path').val();
    if(prof=='')
    {
      var not='not';
    }else
    {
      var not='pass';
    }
    
    var form_data = new FormData();
    form_data.append('name', name);
    form_data.append('phone', phone);
    form_data.append('email', email);
    form_data.append('age', age);
    form_data.append('dob', dob);
    form_data.append('gender', gender);
    form_data.append('adds', adds);
    form_data.append('file', file);
    form_data.append('not', not);
    form_data.append('married', married);

      let log=$.ajax({
        url:"ajax/update_profile.php",
        method:"POST",
        data:form_data,
        contentType: false,
        processData: false,
        success: function(response) 
        {
          // $('#submited').html(response);
          //   setTimeout(function() {
          //   $('#submited').html('');
          //       }, 3000);
                // for (var i = 0; i < inputIds.length; i++) {
                //     $(inputIds[i]).val('');
                // }
                location.reload();
        }
        });
       // console.log(log)
        // profileCard.style.display = 'block';
        // profileEditCard.style.display = 'none';
  });

  $("#age").on("blur", function() 
  {
      var age = $(this).val().replace(/\D/g, '');
      $(this).val(age);

      if (age === '') 
      {
        $(this).attr("placeholder", "Please enter a valid age");
        $('#age').css('border-color', 'red');
      } else {
        var ageInt = parseInt(age);
        if (isNaN(ageInt) || ageInt < 18 || ageInt > 120) 
        {
          $(this).val("").attr("placeholder", "Age must be between 18 and 120");
          $('#age').css('border-color', 'red');
        } else 
        {
          $('#age').css('border-color', '');
        }
      }
      
  });
    
      $('#email').blur(function()
      {
        var email = $('#email').val();
        var emailold = $('#emailold').val();
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(emailPattern.test(email))
        {
          let log=$.ajax({
            url:"ajax/profile_validation.php",
            method:"POST",
            data:{validemail:email,emailold:emailold},
            success: function(response)
            {
              if(response=='valid')
              {
                $('#email').css('border-color', 'green');
                $('#validemail').html('');
                $('#saveProfileBtn').prop('disabled',false);
              }else
              {
                $('#validemail').html("<span style='color:red'>Email Are Alredy Used</span>");
                $('#email').css('border-color', 'red');
                $('#saveProfileBtn').prop('disabled',true);
              }
            }
          });
        }else
        {
          $('#validemail').html("<span style='color:red'>Email Is Not Valid</span>");
          $('#email').css('border-color', 'red');
          $('#saveProfileBtn').prop('disabled',true);
        }
      }); 



      $('#phone').blur(function()
      {
        var phone = $('#phone').val();
        var phoneold = $('#phonold').val();
        if(phone.length==10) 
        {
          let log=$.ajax({
            url:"ajax/register.php",
            method:"POST",
            data:{phone:phone,phoneold,phoneold},
            success: function(response)
            {
              if(response=='valid')
              {
                $('#phone').css('border-color', 'green');
                $('#validmobile').html('');
                $('#register').prop('disabled',false);
              }else
              {
                $('#validmobile').html("<span style='color:red'>Mobile Are Alredy Used</span>");
                $('#phone').css('border-color', 'red');
                $('#saveProfileBtn').prop('disabled',true);
              }
            }
          });
        }else
        {
          $('#validmobile').html("<span style='color:red'>Mobile Is Not Valid</span>");
          $('#phone').css('border-color', 'red');
          $('#saveProfileBtn').prop('disabled',true);
        }
      });
      $('#phone').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
            if ((keycode < 48 || keycode > 57))
            return false;

            return true;

        });

</script>

</script>
</body>
</html>