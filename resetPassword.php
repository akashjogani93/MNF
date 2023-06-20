<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      max-width: 400px;
      padding: 20px;
      border: 1px solid #ccc;
      background-color: #fff;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .password-toggle-icon {
      cursor: pointer;
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
    }

    .message {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #555;
      display: none; /* Hide the message by default */
      padding: 10px;
      background-color: #e9ecef;
      border-radius: 4px;
    }

    .message a {
      color: #007bff;
      text-decoration: none;
    }

  </style>
</head>
<body>
<?php $mail=$_GET['mail'];?>
  <div class="container">
    <h2>Reset Password</h2>
    <!-- <form> -->
      <div class="form-group">
        <label for="new-password">New Password</label>
        <div class="input-group">
          <input type="password" id="new-password" class="form-control" placeholder="Enter new password" required>
          <div class="input-group-append">
            <span class="input-group-text password-toggle-icon">
              <i class="fas fa-eye"></i>
            </span>
          </div>
        </div>
        <div id="passValid" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
        <input type="hidden" id="email" class="form-control" placeholder="Enter new password" required value="<?php echo $mail;?>">
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <div class="input-group">
          <input type="password" id="confirm-password" class="form-control" placeholder="Confirm new password" required>
          <div class="input-group-append">
            <span class="input-group-text password-toggle-icon">
              <i class="fas fa-eye"></i>
            </span>
          </div>
        </div>
        <div id="password-error" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
      </div>
      <button type="submit" id="reset-btn" class="btn btn-primary btn-block">Reset Password</button>
      <div class="message">
        Password reset successful! <a href="index.html">Go for login</a>
      </div>
    <!-- </form> -->
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.password-toggle-icon').click(function() {
        var passwordInput = $(this).closest('.input-group').find('input');
        var passwordFieldType = passwordInput.attr('type');

        if (passwordFieldType === 'password') {
          passwordInput.attr('type', 'text');
          $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
          passwordInput.attr('type', 'password');
          $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
        }
      });

        $('#reset-btn').click(function(event) {
            event.preventDefault(); // Prevent form submission

            var password = $('#new-password').val();
            var confirmPassword = $('#confirm-password').val();
            var email = $('#email').val();

                const alphanumericRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
                if (password.length >= 6 && alphanumericRegex.test(password)) 
                {
                    let log=$.ajax({
                    url:"ajax/register.php",
                    method:"POST",
                    data:{password12:password},
                    success: function(response)
                    {
                        if(response=='valid')
                        {
                            $('#new-password').css('border-color', 'green');
                            $('#passValid').html('');
                        }else
                        {
                            $('#passValid').html("<span style='color:red'>Password Is Alredy Used</span>");
                            $('#new-password').css('border-color', 'red');
                            exit();
                        }
                    }
                });
                }else
                {
                    $('#passValid').html("<span style='color:red'>Password Must Be Alphanumeric Minumum length 6</span>");
                    $('#new-password').css('border-color', 'red');
                }

                if (password !== confirmPassword) 
                {
                    $('#password-error').text('Passwords do not match.');
                    return;
                }

                let log=$.ajax({
                    url:"ajax/reset.php",
                    method:"POST",
                    data:{password:password,ema:email},
                    success: function(response)
                    {
                        // $('.message').css('display', 'block');

                        $('.form-group, #reset-btn').hide();

                        $('.message').show();

                    }
                });
               

        });

    });
  </script>
</body>
</html>
