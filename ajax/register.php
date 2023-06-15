<?php include('../connect.php');
session_start();
if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $valid="notvalid";
    $query="SELECT * FROM `login` WHERE `email`='$email'";
    $exc1=mysqli_query($conn,$query);
    $rows=mysqli_num_rows($exc1);
    if($rows>0)
    {
        while($row=mysqli_fetch_array($exc1))
        {
            $valid='valid';
        }
    }
    echo $valid;
}

if(isset($_POST['password']))
{
    $email = $_POST['emal'];
    $password = $_POST['password'];
    $valid="notvalid";
    $query="SELECT * FROM `login` WHERE `email`='$email' AND `pass`='$password'";
    $exc=mysqli_query($conn,$query);
    $rows=mysqli_num_rows($exc);
    if($rows>0)
    {
        while($row=mysqli_fetch_array($exc))
        {
            $q1="SELECT `id` FROM `user` WHERE `email`='$email'";
            $exc1=mysqli_query($conn,$q1);
            while($row1=mysqli_fetch_array($exc1))
            {
                $_SESSION['id']=$row1['id'];
            }
            $type=$row['type'];
            $_SESSION['type']=$type;
            if($type=='user')
            {
                $valid='uservalid';
            }else
            {
                $valid='backvalid';
            }
        }
    }
    echo $valid;
}



if(isset($_POST['validemail']))
{
    $email = $_POST['validemail'];
    $valid="valid";
    $query="SELECT * FROM `login` WHERE `email`='$email'";
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
    $valid="valid";
    $query="SELECT * FROM `user` WHERE `phone`='$phone'";
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

if(isset($_POST['password12']))
{
    $password12 = $_POST['password12'];
    $valid="valid";
    $query="SELECT * FROM `login` WHERE `pass`='$password12'";
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