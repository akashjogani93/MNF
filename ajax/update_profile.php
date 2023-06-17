<?php include('../connect.php');
session_start();
$id=$_SESSION['id'];



if(isset($_POST['name']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $adds = $_POST['adds'];
    $not = $_POST['not'];
    $married = $_POST['married'];

    if($not=='pass')
    {
        $file = $_FILES['file'];
        $bond1 = upload_Profile($file,"../img/user/");
    }

   
    if($not=='pass')
    {
        $query="UPDATE `user` SET `name`='$name',`email`='$email',`phone`='$phone',`dob`='$dob',`gender`='$gender',`age`='$age',`adds`='$adds',`profile`='$bond1',`sta`='$married' WHERE `id`='$id'";
    }else
    {
        $query="UPDATE `user` SET `name`='$name',`email`='$email',`phone`='$phone',`dob`='$dob',`gender`='$gender',`age`='$age',`adds`='$adds',`sta`='$married' WHERE `id`='$id'";
    }
    if (mysqli_query($conn, $query))
    {
        $q1="UPDATE `login` SET `email`='$email' WHERE `user_id`='$id'";
        if (mysqli_query($conn, $q1))
        {
            echo "<span style='color:green'>Your Profile Updated Successfully</span>";
        }
    }
    else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    mysqli_close($conn);
}

function upload_Profile($image, $target_dir)
{   
        if($image['name']!=""){
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $msg = " ";
        try {
            $check = getimagesize($image["tmp_name"]);
            $msg = array();
            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $msg[1] = "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $msg[2] = "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $msg[3] = "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($image["tmp_name"], $target_file)) {
                    //$msg= "The file ". basename( $image["name"]). " has been uploaded.";
                } else {
                    $msg[4] = "Sorry, there was an error uploading your file.";
                }
            }
            // echo "<pre>";
            // print_r($msg);
            return ltrim($target_file, '');
            } catch (Exception $e) {
            // echo "Message" . $e->getmessage();
        }
    }else{
        return "";
    }
}
?>