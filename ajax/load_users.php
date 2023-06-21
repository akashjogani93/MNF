<?php include('../connect.php');

if(isset($_POST['Submit']))
{
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $pageSize = isset($_POST['pageSize']) ? $_POST['pageSize'] : 8;

    $offset = ($page - 1) * $pageSize;

    $query="SELECT * FROM `user` ORDER BY `id` LIMIT $offset, $pageSize";
    $sn=0;
    $confirm = mysqli_query($conn, $query) or die(mysqli_error());
    while ($out = mysqli_fetch_array($confirm)) 
    {
        $name=$out['name'];
        $email=$out['email'];
        $phone=$out['phone'];
        $community=$out['community'];
        $profile=$out['profile'];
        if($profile=='')
        {
            $profile="../img/nouser.jpg";
        }
        ?>
        <div class="eventsboxes">
            <img src="<?php echo 'ajax/'.$profile;?>" class="card-img-top" alt="Profile Image">
            <h4 class="card-title text-left" style="color:black;"><?php echo $name; ?></h4>
            <p><?php echo $email; ?></p>
            <p><?php echo $phone; ?></p>
            <p><?php echo $community; ?></p>
        </div>
        <?php   
    } 
}


if(isset($_POST['comname']))
{
    $comname=$_POST['comname'];
    $name=$_POST['name'];
    if($name!='')
    {
        $query="SELECT * FROM `user` WHERE `name`='$name' AND `community`='$comname'";
    }else
    {
        $query="SELECT * FROM `user` WHERE `community`='$comname'";
    }
    $sn=0;
    $confirm = mysqli_query($conn, $query) or die(mysqli_error());
    if (mysqli_num_rows($confirm)>0)
    {
        while ($out = mysqli_fetch_array($confirm))
        {
            $name=$out['name'];
            $community=$out['community'];
            $profile=$out['profile'];
            $email=$out['email'];
            $phone=$out['phone'];
            if($profile=='')
            {
                $profile="../img/nouser.jpg";
            }
            ?>

            <div class="user" id="col">
                <div class="card">
                    <!-- <div class="imgcard"> -->
                        <img src="<?php echo 'ajax/'.$profile;?>" class="card-img-top" alt="Profile Image">
                    <!-- </div> -->
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $name; ?></h5>
                        <p class="card-subtitle"><?php echo $email; ?></p>
                        <p class="card-subtitle"><?php echo $phone; ?></p>
                        <p class="card-subtitle"><?php echo $community; ?></p>
                    </div>
                </div>
            </div>
            <?php   
        }
    }else
    {
        ?>
        <div class="" id="col">
            <div class="card">
                <img src="img/nodata.jpg" class="card-img-top" alt="Profile Image">
                <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-subtitle text-center">NO User Found</p>
                <p class="card-subtitle"></p>
                <p class="card-subtitle"></p>
                </div>
            </div>
        </div>
        <?php
    } 
}
?>