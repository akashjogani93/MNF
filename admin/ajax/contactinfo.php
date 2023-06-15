<?php include('../../connect.php');
  
  
if(isset($_POST['Submit']))
{
    $query="SELECT * FROM `contact` ORDER BY `id`";
    $sn=0;
    $confirm = mysqli_query($conn, $query) or die(mysqli_error());
    while ($out = mysqli_fetch_array($confirm)) 
    { ?>
        <tr>
            <td><?php echo ++$sn; ?></td>
            <td><?php echo $out['email']; ?></td>
            <td><?php echo $out['phone']; ?></td>
            <td><?php echo $out['city']; ?></td>
            <td><?php echo $out['adds']; ?></td>
        </tr>
        <?php   
    }
}

if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $adds = $_POST['adds'];

    $query="UPDATE `contact` SET `email`='$email',`phone`='$phone',`city`='$city',`adds`='$adds' WHERE `id`=1";
    if (mysqli_query($conn, $query))
    {
        echo "<span style='color:green'>Your Detail Is Updated</span>";
    }
    else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($conn);
}