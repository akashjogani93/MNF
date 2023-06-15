<?php include('header.php'); ?><!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <style>
  body{
      background-image: url('background-image.jpg');
      background-size: cover;
      background-position: center;
    }
    
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
    }
    
    h1 {
      text-align: center;
    }
    
    .contact-form {
      display: grid;
      grid-gap: 20px;
    }
    
    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
    }
    
    .contact-form button {
      padding: 10px 20px;
      /* background-color: #4CAF50; */
      color: white;
      border: none;
      cursor: pointer;
    }
    
    @media (max-width: 600px) {
      .container {
        padding: 10px;
      }
    }
  </style>

<!-- </head>

<body> -->
  <div class="container-fluid main py-4 pb-5">
    <div class="row custom-margin">

      <div class="col-md-6">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248849.90089956965!2d77.46612571649636!3d12.95394561387551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1686742081994!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="col-md-6">
      <h5 style="text-align:left">Contact Us</h5>
        <div class="contact-form">
          <input type="text" name="name" placeholder="Your Name" required id="name">
          <input type="email" name="email" placeholder="Your Email" required id="email">
          <div id="validemail"></div>
          <textarea name="message" placeholder="Your Message" required id="message"></textarea>
          <button type="submit" id="contactsubmit" class="btBack">Send Message</button>
          <div id="conform"></div>
      </div>
  </div>
    </div>

<script>
  $(document).ready(function()
  {
      $('#contactsubmit').click(function()
      {
          var name=$('#name').val();
          var email=$('#email').val();
          var message=$('#message').val();
          var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if(emailPattern.test(email))
          {

            $('#validemail').html('');
            $('#email').css('border-color', '');

            var inputIds = ['#name','#email', '#message'];
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
            form_data.append('message', message);

            let log=$.ajax({
                url:"ajax/contactus.php",
                method:"POST",
                data:form_data,
                contentType: false,
                processData: false,
                success: function(response) 
                {
                    $('#conform').html(response);
                    setTimeout(function() 
                    {
                        $('#conform').html('');
                    }, 3000);

                    for (var i = 0; i < inputIds.length; i++) {
                            $(inputIds[i]).val('');
                        }
                }
           });
          }else
          {
              $('#validemail').html("<span style='color:red'>Email Is Not Valid</span>");
              $('#email').css('border-color', 'red');
          }
      });
  });
</script>

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

  <?php include('in-touch.php'); ?>
<?php include('footer.php'); ?>

</body>
</html>