<?php include('../connect.php');
  
  
if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $query="INSERT INTO `intouch`(`intouch`) VALUES ('$email')";
    if(mysqli_query($conn,$query))
    {
        echo "<span style='color:green'>New 'Email' In Touched </span>";
    }
}

?>