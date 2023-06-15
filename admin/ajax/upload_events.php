<?php include('../../connect.php');
  
  
if(isset($_POST['Submit']))
{
    $query="SELECT * FROM `events` ORDER BY `id`";
    $sn=0;
    $confirm = mysqli_query($conn, $query) or die(mysqli_error());
    while ($out = mysqli_fetch_array($confirm)) 
    { 
        $image=$out['image'];
        ?>
        <tr>
            <td><?php echo ++$sn; ?></td>
            <td><?php echo $out['title']; ?></td>
            <td><?php echo $out['location']; ?></td>
            <td><?php echo $out['date']; ?></td>
            <td><?php echo $out['des']; ?></td>
            <td><img src="<?php echo 'ajax/'.$image;?>" alt="" height="80" widht="80"></td>

        </tr>
        <?php   
    }
}
if(isset($_POST['title']))
{
    $title = $_POST['title'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $des = $_POST['des'];
    $file = $_FILES['file'];
    $bond1 = upload_Profile($file,"../../img/events/");
    $query = "INSERT INTO events (`title`,`location`,`date`,`des`,`image`) VALUES ('$title','$location','$date','$des','$bond1')";
    if (mysqli_query($conn, $query))
    {
        echo "<span style='color:green'>New 'Events' Added successfully</span>";
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