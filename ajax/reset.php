<?php include('../connect.php');
if(isset($_POST['password']))
{
    $email = $_POST['ema'];
    $password = $_POST['password'];
    $query="UPDATE `login` SET `pass`='$password' WHERE `email`='$email'";
    $exc=mysqli_query($conn,$query);
    if($exc)
    {
        echo 'Password Reseted.';
    }
}

if(isset($_POST['email']))
{
    $to = $_POST['email'];
    include('../smtp/PHPMailerAutoload.php');
    $subject='Reset Password Of MNF';
    // $html='<a href="http://evontest.com/mnf-demo/profile.php" style="border: 1px solid black: background-color:blue; padding:10px;color:white; text-decoration:none;">Reset Here</a>';

    $html='<!DOCTYPE html>
    <html>
    <head>
      <style>
        body {
          display: flex;
          align-items: center;
          justify-content: center;
          height: 100vh;
        }
    
        .reset-link {
          padding: 10px 20px;
          background-color: #5A96E3;
          color: white;
          font-size: 16px;
          text-decoration: none;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          display: inline-block;
        }
    
        .resetPass
        {
            display:flex;
            align-item:center;
            position:relative;
            left:50px;
        }
      </style>
    </head>
    <body>
        <div class="resetPass">
            <a href="http://evontest.com/mnf-demo/resetPassword.php?mail='.$to.'" class="reset-link">Reset Here</a>
        </div>
        <div class="resetPass">
            <a href="http://192.168.29.93/mnf/resetPassword.php?mail='.$to.'" class="reset-link">Reset Here</a>
        </div>
    </body>
    </html>
    ';
    $mail = new PHPMailer(); 
    $mail->SMTPDebug  = 3;
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "mail.evonitsolution.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "test@evonitsolution.com";
    $mail->Password = "Test@@@123";
    $mail->SetFrom("test@evonitsolution.com");
    $mail->Subject = $subject;
    $mail->Body =$html;
    $mail->AddAddress($to);
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if(!$mail->Send()){
        // echo $mail->ErrorInfo;
    }else{
        return 'Sent';
    }
    
}
?>