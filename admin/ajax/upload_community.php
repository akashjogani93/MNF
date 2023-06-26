<?php include('../../connect.php');
  
  
if(isset($_POST['Submit']))
{
    
    $query="SELECT * FROM `community` ORDER BY `id`";
    $sn=0;
    $confirm = mysqli_query($conn, $query) or die(mysqli_error());
    while ($out = mysqli_fetch_array($confirm)) 
    {
        $image=$out['image'];
        ?>
        <tr>
            <td><div style="display:flex; justify-content:space-between;"><button id="edit" class="btn btn-info edit"><i class="far fa-edit"></i></buttom><button id="del" class="btn btn-danger"><i class="fas fa-trash-alt"></i></buttom></div></td>
            <td><?php echo ++$sn; ?></td>
            <td><?php echo $out['comName']; ?></td>
            <td><?php echo $out['adds']; ?></td>
            <td><?php echo $out['phone']; ?></td>
            <td><img src="<?php echo 'ajax/'.$image;?>" alt="" style="height:100px; width:150px;"></td>
            <td style="display:none;"><?php echo $out['id']; ?></td>
        </tr>
        <?php   
    } 
    ?>
    <?php
}
if(isset($_POST['comName']))
{
    $comName = $_POST['comName'];
    $adds = $_POST['adds'];
    $phone = $_POST['phone'];
    
    
    $upvalue = $_POST['upvalue'];
    if($upvalue==1)
    {
        $file = $_FILES['file'];
        $bond1 = upload_Profile($file,"../../img/community/");
        $query = "INSERT INTO community (`comName`,`adds`,`phone`,`image`) VALUES ('$comName','$adds','$phone','$bond1')";
        if (mysqli_query($conn, $query))
        {
            echo "<span style='color:green'>New 'COMMUNITY' Added successfully</span>";
        }
        else {
                echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
        mysqli_close($conn);
    }else
    {
        $idupdate = $_POST['idupdate'];
        $path = $_POST['path'];
        if($path==0)
        {
            $query="UPDATE `community` SET `comName`='$comName',`adds`='$adds',`phone`='$phone' WHERE `id`='$idupdate'";
        }else
        {
            $file = $_FILES['file'];
            $bond1 = upload_Profile($file,"../../img/community/");
            $query="UPDATE `community` SET `comName`='$comName',`adds`='$adds',`phone`='$phone',`image`='$bond1' WHERE `id`='$idupdate'";
        }
        if (mysqli_query($conn, $query))
        {
            echo "<span style='color:green'>'COMMUNITY' Updated successfully</span>";
        }
        else {
                echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
        mysqli_close($conn);
    }

    
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