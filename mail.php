<?php 
    include('smtp/PHPMailerAutoload.php');
    $subject='Reset Password';
    $html='Msg';
    $to="akashjogani93@gmail.com";
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
?>