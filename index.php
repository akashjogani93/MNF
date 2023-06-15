<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        body
        {
            background-image: url("admin/assets/image/log.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            line-height: 0.2;
            font-weight: 500;
        }

        .login-box-container 
        {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box 
        {
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            max-width: 400px;
            width: 100%;
            /* text-align: center; */
        }
        @media only screen and (max-width: 600px) {
            .login-box {
                width:90%;
            }
        }

        .logo {
            position:relative;
            left:45%;
            width: 40px;
            height: 40px;
            margin-bottom: 10px;
        }

        .heading {
            margin-bottom: 10px;
            text-align:center;
        }

        .register-link,.login-link {
            margin-top: 20px;
        }

        .register-link a, .login-link a {
            color: #007bff;
            text-decoration: none;
        }
        .btn-block{
            background-color:rgb(113, 15, 66);
            color:white;
        }
    </style>
    <title>MNF</title>
</head>
<?php include('connect.php');?>
<body>
    <div class="login-box-container">
        <div class="login-box">
            <!-- Login Box -->
            <div id="login-form">
                <img src="img/logo.png" alt="Logo" class="logo" >
                <h4 class="heading">LOGIN</h4>
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" id="username" class="form-control" required autocomplete="off">
                    <div id="emailvalid" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password1" class="form-control" required  autocomplete="off">
                    <div id="passvalid" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                </div>
                <button type="submit" class="btn btn-block" id="login">Login</button>
                <p class="register-link text-center">Don't have an account? <a href="#" id="register-link">Register here</a></p>
            </div>
            <!-- Login Box End -->

            <!-- Registration Box -->
            <div id="register-form" style="display: none;">
                <img src="img/logo.png" alt="Logo" class="logo" >
                <h4 class="heading">REGISTER</h4>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" required autocomplete="off">
                    <div id="validemail" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" class="form-control" required autocomplete="off">
                    <div id="validmobile" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                </div>
                <div class="form-group">
                    <label for="com">Community</label>
                    <select id="com" class="form-control" required>
                        <option value=""></option>
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
                <div class="form-group">
                    <label for="occ">Occupation</label>
                    <input type="text" id="occ" class="form-control" required autocomplete="off">
                    <div id="Occu" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                </div>
                <div class="form-group">
                    <label for="sta">Status</label>
                    <select id="sta" class="form-control" required>
                        <option value=""></option>
                        <option>UnMarried</option>
                        <option>Married</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" id="password" class="form-control" required autocomplete="off">
                    <div id="passValid" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" class="form-control" required autocomplete="off">
                    <div id="confirm" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                </div>
                <button type="submit" class="btn btn-block" id="register">Register</button>
                <p class="login-link text-center">Already have an account? <a href="#" id="login-link">Login here</a></p>
            </div>
            <!-- Registration Box End -->
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () 
        {
            $("#register-link").click(function (e) {
                e.preventDefault();
                $("#login-form").hide();
                $("#register-form").show();
            });

            $("#login-link").click(function (e) {
                e.preventDefault();
                $("#register-form").hide();
                $("#login-form").show();
            });

            // To check pass and conform pass are same or not in registration box
            $('#confirm-password').keypress(function()
            {
                var password=$('#password').val();
                var confirmPassword=$('#confirm-password').val();
                if(confirmPassword==password)
                {
                    $('#confirm-password').css('border-color', 'red');
                    $('#confirm').html('<span style="color:red">Password Not Matched</span>');
                    exit();
                }else
                {
                    $('#confirm-password').css('border-color', '');
                    $('#confirm').html('');
                }
            });

            // when Click On Registration Box register box
            $('#register').click(function()
            {
                var name=$('#name').val();
                var email=$('#email').val();
                var phone=$('#phone').val();
                var com=$('#com').val();
                var occ=$('#occ').val();
                var sta=$('#sta').val();
                var password=$('#password').val();
                var confirmPassword=$('#confirm-password').val();

                var inputIds = ['#name','#email', '#phone','#com','#occ','#sta','#password','#confirm-password'];
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
                form_data.append('name', name);
                form_data.append('email', email);
                form_data.append('phone', phone);
                form_data.append('com', com);
                form_data.append('password', password);
                form_data.append('occ', occ);
                form_data.append('sta', sta);

                let log=$.ajax({
                    url:"ajax/reg.php",
                    method:"POST",
                    data:form_data,
                    contentType: false,
                    processData: false,
                    success: function(response) 
                    {
                        $('#confirm').html(response);
                        window.location.href = "index.php";
                        setTimeout(function() 
                        {
                            $('#confirm').html('');
                        }, 3000);
                        for (var i = 0; i < inputIds.length; i++) {
                            $(inputIds[i]).val('');
                        }
                    }
                });
                        // console.log(log)
            });

            // when Click On login Box login button
            $('#login').click(function()
            {
                var email = $('#username').val();
                var password = $('#password1').val();
                if(email=='')
                {
                    $('#emailvalid').html("<span style='color:red'>Fill Email</span>");
                    $('#username').css('border-color', 'red');
                    exit();
                }
                if(password=='')
                {
                    $('#passvalid').html("<span style='color:red'>Fill Password</span>");
                    $('#password1').css('border-color', 'red');
                    exit();
                }
                let log=$.ajax({
                    url:"ajax/register.php",
                    method:"POST",
                    data:{password:password,emal:email},
                    success: function(response)
                    {
                        if(response=='uservalid')
                        {
                            $('#password1').css('border-color', 'green');
                            $('#passvalid').html('');
                            window.location.href = "home.php";
                        }else if(response=='backvalid')
                        {
                            $('#password1').css('border-color', 'green');
                            $('#passvalid').html('');
                            window.location.href = "admin/user.php";
                        }else
                        {
                            $('#passvalid').html("<span style='color:red'>Incorrect Password</span>");
                            $('#password1').css('border-color', 'red');
                        }
                    }
                });
            });

            //when login Box  username validation
            $('#username').blur(function()
            {
                var email = $('#username').val();
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if(emailPattern.test(email))
                {
                    let log=$.ajax({
                        url:"ajax/register.php",
                        method:"POST",
                        data:{email:email},
                        success: function(response)
                        {
                        if(response=='valid')
                        {
                            $('#username').css('border-color', 'green');
                            $('#emailvalid').html('');
                            $('#login').prop('disabled',false);
                        }else
                        {
                            $('#emailvalid').html("<span style='color:red'>Email Not Registered</span>");
                            $('#username').css('border-color', 'red');
                            $('#login').prop('disabled',true);
                        }
                        }
                     });
                }else
                {
                    $('#emailvalid').html("<span style='color:red'>Email Is Not Valid</span>");
                    $('#username').css('border-color', 'red');
                    $('#login').prop('disabled',true);
                }
            });

            //when registration Box  email validation
            $('#email').blur(function()
            {
                var email = $('#email').val();
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if(emailPattern.test(email))
                {
                    let log=$.ajax({
                        url:"ajax/register.php",
                        method:"POST",
                        data:{validemail:email},
                        success: function(response)
                        {
                            if(response=='valid')
                            {
                                $('#email').css('border-color', 'green');
                                $('#validemail').html('');
                                $('#register').prop('disabled',false);
                            }else
                            {
                                $('#validemail').html("<span style='color:red'>Email Are Alredy Used</span>");
                                $('#email').css('border-color', 'red');
                                $('#register').prop('disabled',true);
                            }
                        }
                    });
                }else
                {
                    $('#validemail').html("<span style='color:red'>Email Is Not Valid</span>");
                    $('#email').css('border-color', 'red');
                    $('#register').prop('disabled',true);
                }
            });

            //when registration Box  phone validation
            $('#phone').blur(function()
            {
                var phone = $('#phone').val();
                if(phone.length==10) 
                {
                    let log=$.ajax({
                        url:"ajax/register.php",
                        method:"POST",
                        data:{phone:phone},
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
                                $('#register').prop('disabled',true);
                            }
                        }
                    });
                }else
                {
                $('#validmobile').html("<span style='color:red'>Mobile Is Not Valid</span>");
                $('#phone').css('border-color', 'red');
                $('#register').prop('disabled',true);
                }
            });
            //when registration Box  phone validation
            $('#phone').keypress(function(event)
            {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                    if ((keycode < 48 || keycode > 57))
                    return false;

                    return true;

            });

            //when registration Box  password validation
            $('#password').blur(function()
            {
                var password = $('#password').val();
                let log=$.ajax({
                    url:"ajax/register.php",
                    method:"POST",
                    data:{password12:password},
                    success: function(response)
                    {
                        if(response=='valid')
                        {
                            $('#password').css('border-color', 'green');
                            $('#passValid').html('');
                            $('#register').prop('disabled',false);
                        }else
                        {
                            $('#passValid').html("<span style='color:red'>Password Are Alredy Used</span>");
                            $('#password').css('border-color', 'red');
                            $('#register').prop('disabled',true);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
