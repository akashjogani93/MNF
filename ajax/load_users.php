<?php include('../connect.php');

if(isset($_POST['Submit']))
{
    
    $query="SELECT * FROM `user` ORDER BY `id`";
    $sn=0;
    $confirm = mysqli_query($conn, $query) or die(mysqli_error());
    while ($out = mysqli_fetch_array($confirm)) 
    {
        $name=$out['name'];
        $email=$out['email'];
        $phone=$out['phone'];
        $community=$out['community'];
        $profile=$out['profile'];
        ?>

        <div class="" id="col">
            <div class="card">
                <img src="<?php echo 'ajax/'.$profile;?>" class="card-img-top" alt="Profile Image">
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
}


if(isset($_POST['comname']))
{
    $comname=$_POST['comname'];
    $name=$_POST['name'];
    $query="SELECT * FROM `user` WHERE `name`='$name' AND `community`='$comname'";
    $sn=0;
    $confirm = mysqli_query($conn, $query) or die(mysqli_error());
    while ($out = mysqli_fetch_array($confirm))
    {
        $name=$out['name'];
        $community=$out['community'];
        $profile=$out['profile'];
        $email=$out['email'];
        $phone=$out['phone'];
        ?>

        <div class="" id="col">
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
}
?>