  <div class="row custom-margin main intouch">
    <div class="col-md-12">
      <center><div class="center-box">
        <h4 class="text-center">STAY IN TOUCH</h4>
        <p class="text-center">Sign up to hear from us about special events.</p>
        <div class="form-row align-items-center">
          <div class="col-sm-8 mb-2 mb-sm-0">
            <input type="email" class="form-control input-for" placeholder="Your email address" id="signupEmail">
          </div>
          <div class="col-sm-4">
            <button type="submit" class="btn btn-block btBack" id="signup">SIGN UP</button>
          </div>
        </div>
        <div class="form-row align-items-center">
          <div id="signupvalid"></div>
        </div>
      </div></center>
    </div>
  </div>
<script>
  $('#signup').click(function()
  {
    var signupEmail=$('#signupEmail').val();
    if(signupEmail=='')
    {
      $('#signupvalid').html("<span style='color:red'>Fill Email</span>");
      $('#signupEmail').css('border-color', 'red');
    }
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(emailPattern.test(signupEmail))
    {
       let log=$.ajax({
          url:"ajax/intouch.php",
          method:"POST",
          data:{email:signupEmail},
          success: function(response)
          {
            $('#signupvalid').html(response);
            setTimeout(function() {
            $('#signupvalid').html('');
                }, 3000);
            $('#signupEmail').val('');
          }
        });console.log(log)
    }else
    {
      $('#signupvalid').html("<span style='color:red'>Email Is Not Valid</span>");
      $('#signupEmail').css('border-color', 'red');
    }
  });
</script>