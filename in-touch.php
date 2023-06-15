    <div class="row justify-content-center padding-mobile custom-margin">
      <div class="col-lg-8 col-md-8">
        <div class="center-box">
          <h4 class="text-center" style="color:black;">STAY IN TOUCH</h4>
          <p class="text-center" style="color:black;">Sign up to hear from us about special events.</p>
            <div class="form-row align-items-center">
              <div class="col-sm-8 mb-2 mb-sm-0">
                <input type="email" class="form-control input-for" placeholder="Your email address" id="signupEmail">
                <div id="signupvalid"></div>
              </div>
              <div class="col-sm-4">
                <button type="submit" class="btn btn-block btBack" id="signup">SIGN UP</button>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<script>
  $('#signup').click(function()
  {
    var signupEmail=$('#signupEmail').val();
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