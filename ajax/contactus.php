<?php include('../connect.php');
  
  
if(isset($_POST['email']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $query="INSERT INTO `contactus`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
    if(mysqli_query($conn,$query))
    {
        echo "<span style='color:green'>Your Message Was Submitted</span>";
    }
}

?>