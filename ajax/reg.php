<?php 
include('../connect.php');
if(isset($_POST['name']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $com = $_POST['com'];
    $password = $_POST['password'];
    $occ = $_POST['occ'];
    $sta = $_POST['sta'];
    $query = "INSERT INTO  `user`(`name`,`email`,`phone`,`community`,`password`,`occ`,`sta`) VALUES ('$name','$email','$phone','$com','$password','$occ','$sta')";
    if(mysqli_query($conn, $query))
    {
        $q="SELECT `id` FROM user ORDER BY id DESC LIMIT 1;";
        $exc=mysqli_query($conn, $q);
        while($row=mysqli_fetch_array($exc))
        {
            $id=$row['id'];
            $q1="INSERT INTO `login`(`user_id`, `email`, `pass`, `type`)VALUES('$id','$email','$password','user')";
            if(mysqli_query($conn, $q1))
            {
                echo "<span style='color:green'>Registered successfully</span>";
            }
        };
    }
    else
    {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($conn);
}
?>