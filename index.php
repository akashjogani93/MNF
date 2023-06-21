<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/custom.css">
    <title>MNF</title>
</head>
<?php include('connect.php');?>
<body>
    <div class="login-box-container">
        <div class="login-box-form" id="login-form">
            <!-- Login Box -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <center><img src="img/logo.png" alt="Logo" class="logo" >
                            <h4 class="heading">LOGIN</h4></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" id="username" class="form-control" required autocomplete="off">
                                <div id="emailvalid" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password1" class="form-control" required  autocomplete="off">
                                <div id="passvalid" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button id="login" class="btn btn-block">LOGIN</button>
                            <p class="register-link text-center">Don't have an account? <a href="#" id="register-link">Register here</a></p></br>
                            <p class="register-link text-center">Forgot Password? <a href="#" id="forget-link">Reset here</a></p>
                        </div>
                    </div>
                </div>
            <!-- Login Box End -->
        </div>

        <!-- Registration Box -->
        <div id="register-form" style="display: none;" class="register-box-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <center><img src="img/logo.png" alt="Logo" class="logo" >
                        <h4 class="heading">REGISTER</h4></center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
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
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="occ">Occupation</label>
                            <input type="text" id="occ" class="form-control" required autocomplete="off">
                            <div id="Occu" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                        </div>
                        <div class="form-group">
                            <label for="sta">Marital Status</label>
                            <select id="sta" class="form-control" required>
                                <option value=""></option>
                                <option>Single</option>
                                <option>Married</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" id="password" class="form-control" required autocomplete="off">
                            <div style="margin-top:7px; font-size:10px; letter-spacing:0.8px">Password Must Be Alphanumeric Minumum length 6</div>
                            <div id="passValid" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" class="form-control" required autocomplete="off">
                            <div id="confirm" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <center><button type="submit" class="btn btn-block reg" id="register">REGISTER</button><center>
                        <p class="login-link text-center">Already have an account? <a href="#" id="login-link">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
         <!-- Registration Box End -->

         <!-- Forget Password -->
        <div id="forget-pass"  style="display: none;" class="forget-box-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <center><img src="img/logo.png" alt="Logo" class="logo" >
                            <h4 class="heading">RESET PASSWORD</h4></center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="email" id="forgetEmail" class="form-control" required autocomplete="off">
                            <div id="forgetvalid" style="margin-top:7px; font-size:10px; letter-spacing:0.8px"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button id="forget" class="btn btn-block">SEND</button>
                        <p class="login-link text-center">Already Know Password Back To Login? <a href="#" id="login-link3">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Forget Box End -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () 
        {
            
            $("#register-link").click(function (e) {
                e.preventDefault();
                $("#login-form").hide();
                $("#forget-pass").hide();
                $("#after-register").hide();
                $("#register-form").show();
            });

            $("#login-link").click(function (e) {
                e.preventDefault();
                $("#register-form").hide();
                $("#login-form").show();
                $("#after-register").hide();
                $("#forget-pass").hide();
            });
            $("#login-link3").click(function (e) {
                e.preventDefault();
                $("#register-form").hide();
                $("#login-form").show();
                $("#after-register").hide();
                $("#forget-pass").hide();
            });
            $("#login-link1").click(function (e) {
                e.preventDefault();
                $("#register-form").hide();
                $("#login-form").show();
                $("#after-register").hide();
                $("#forget-pass").hide();
            });
            $("#forget-link").click(function (e) {
                e.preventDefault();
                $("#register-form").hide();
                $("#login-form").hide();
                $("#after-register").hide();
                $("#forget-pass").show();
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

                //when registration Box  email validation
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
                                mobile_valid();
                                // $('#register').prop('disabled',false);
                            }else
                            {
                                $('#validemail').html("<span style='color:red'>Email Is Alredy Used</span>");
                                $('#email').css('border-color', 'red');
                                // $('#register').prop('disabled',true);
                                exit();
                            }
                        }
                    });
                }else
                {
                    $('#validemail').html("<span style='color:red'>Email Is Not Valid</span>");
                    $('#email').css('border-color', 'red');
                    // $('#register').prop('disabled',true);
                    exit();
                }
                
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


                var button = document.getElementById('login');
                var loader = document.createElement('span');
                loader.className = 'loader';
                // Disable the button
                button.disabled = true;
                // Replace the button text with the loader
                button.innerHTML = 'Wait..';
                button.appendChild(loader);

                let log=$.ajax({
                    url:"ajax/register.php",
                    method:"POST",
                    data:{password:password,emal:email},
                    success: function(response)
                    {
                        $('.loader').addClass('hidden');
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
                            button.innerHTML = 'Login';
                            button.disabled = false;
                            loader.remove();
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
                if(email=='')
                {
                    $('#emailvalid').html("<span style='color:red'>Fill Email</span>");
                    $('#username').css('border-color', 'red');
                    exit();
                }else
                {
                    $('#emailvalid').html('');
                    $('#username').css('border-color', '');
                }
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
                                // $('#login').prop('disabled',false);
                            }else
                            {
                                $('#emailvalid').html("<span style='color:red'>Email Not Registered</span>");
                                $('#username').css('border-color', 'red');
                                // $('#login').prop('disabled',true);
                                exit();
                            }
                        }
                     });
                }else
                {
                    $('#emailvalid').html("<span style='color:red'>Email Is Not Valid</span>");
                    $('#username').css('border-color', 'red');
                    // $('#login').prop('disabled',true);
                }
            });

            $('#forget').click(function()
            {
                var email = $('#forgetEmail').val();
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if(email=='')
                {
                    $('#forgetvalid').html("<span style='color:red'>Fill Email</span>");
                    $('#forgetEmail').css('border-color', 'red');
                    exit();
                }
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
                                var button = document.getElementById('forget');
                                var loader = document.createElement('span');
                                loader.className = 'loader';
                                button.disabled = true;
                                button.innerHTML = 'Wait..';
                                button.appendChild(loader);

                                $('#username').css('border-color', 'green');
                                $('#emailvalid').html('');
                                let log=$.ajax({
                                    url:"ajax/reset.php",
                                    method:"POST",
                                    data:{email:email},
                                    success: function(response)
                                    {
                                        button.innerHTML = 'Check Mail..';
                                    }
                                }); console.log(log);

                            }else
                            {
                                $('#forgetvalid').html("<span style='color:red'>Email Not Registered</span>");
                                $('#forgetEmail').css('border-color', 'red');
                            }
                        }
                     });
                }else
                {
                    $('#forgetvalid').html("<span style='color:red'>Email Is Not Valid</span>");
                    $('#forgetEmail').css('border-color', 'red');
                    exit();
                }
            });
                function mobile_valid()
                {
                    var phone = $('#phone').val();
                    if(phone.length==10 && !areAllDigitsSame(phone)) 
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
                                    registration();
                                    // $('#register').prop('disabled',false);
                                }else
                                {
                                    $('#validmobile').html("<span style='color:red'>Mobile Are Alredy Used</span>");
                                    $('#phone').css('border-color', 'red');
                                    // $('#register').prop('disabled',true);
                                    exit();
                                }
                            }
                        });
                    }else
                    {
                        $('#validmobile').html("<span style='color:red'>Mobile Is Not Valid</span>");
                        $('#phone').css('border-color', 'red');
                        // $('#register').prop('disabled',true);
                        exit();
                    }

                    function areAllDigitsSame(phoneNumber) 
                    {
                        var firstDigit = phoneNumber.charAt(0);

                        for (var i = 1; i < phoneNumber.length; i++) {
                            if (phoneNumber.charAt(i) !== firstDigit) {
                            return false;
                            }
                        }

                        return true;
                    }
                }

                //REgistration
                function registration()
                {
                    var name=$('#name').val();
                    var email=$('#email').val();
                    var phone=$('#phone').val();
                    var com=$('#com').val();
                    var occ=$('#occ').val();
                    var sta=$('#sta').val();
                    var password=$('#password').val();
                    var confirmPassword=$('#confirm-password').val();

                    if(confirmPassword!=password)
                    {
                        $('#confirm-password').css('border-color', 'red');
                        $('#confirm').html('<span style="color:red">Password Not Matched</span>');
                        exit();
                    }else
                    {
                        $('#confirm-password').css('border-color', '');
                        $('#confirm').html('');
                    }


                    var button = document.getElementById('register');
                    var loader = document.createElement('span');
                    loader.className = 'loader';
                    // Disable the button
                    button.disabled = true;
                    // Replace the button text with the loader
                    button.innerHTML = 'Registering..';
                    button.appendChild(loader);

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
                            button.innerHTML = 'Register Successfully..';
                            setTimeout(function() 
                            {
                                window.location.href = "index.php";
                            }, 5000);
                        }
                    });
                }
            //when registration Box  phone validation
            $('#phone').keypress(function(event)
            {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                    if ((keycode < 48 || keycode > 57))
                    return false;

                    return true;

            });
            $('#name , #occ').keypress(function(event)
            {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                    if ((keycode < 48 || keycode > 57))
                    return true;

                    return false;

            });

            //when registration Box  password validation
            $('#password').blur(function()
            {
                var password = $('#password').val();
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
                            $('#password').css('border-color', 'green');
                            $('#passValid').html('');
                            // exit()
                        }else
                        {
                            $('#passValid').html("<span style='color:red'>Password Is Alredy Used</span>");
                            $('#password').css('border-color', 'red');
                            exit();
                        }
                    }
                });
                }else
                {
                    $('#passValid').html("<span style='color:red'>Password Not Valid</span>");
                    $('#password').css('border-color', 'red');
                }
            });
        });

        function handleClick() 
        {
            var button = document.getElementById('myButton');
            var loader = document.createElement('span');
            loader.className = 'loader';
            
            // Disable the button
            button.disabled = true;
            
            // Replace the button text with the loader
            button.innerHTML = 'Wait..';
            button.appendChild(loader);
            
            // Simulate an asynchronous operation
            setTimeout(function() 
            {
                button.innerHTML = 'Login';
                button.disabled = false;
                loader.remove();
            }, 2000);
        }
    </script>
</body>

</html>
