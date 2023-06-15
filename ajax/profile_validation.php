<?php include('../connect.php');


if(isset($_POST['validemail']))
{
    $email = $_POST['validemail'];
    $emailold = $_POST['emailold'];
    $valid="valid";
    $query="SELECT * FROM `login` WHERE `email`='$email' AND `email`!='$emailold'";
    $exc=mysqli_query($conn,$query);
    $rows=mysqli_num_rows($exc);
    if($rows>0)
    {
        while($row=mysqli_fetch_array($exc))
        {
            $valid='notvalid';
        }
    }
    echo $valid;
}

if(isset($_POST['phone']))
{
    $phone = $_POST['phone'];
    $phoneold = $_POST['phoneold'];
    $valid="valid";
    $query="SELECT * FROM `user` WHERE `phone`='$phone'  AND `phone`!='$phoneold'";
    $exc=mysqli_query($conn,$query);
    $rows=mysqli_num_rows($exc);
    if($rows>0)
    {
        while($row=mysqli_fetch_array($exc))
        {
            $valid='notvalid';
        }
    }
    echo $valid;
}


?>