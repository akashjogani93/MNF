<?php include('../connect.php');

if(isset($_POST['Submit']))
{
    $query="SELECT * FROM `events` ORDER BY `id`";
    $sn=0;
    $confirm = mysqli_query($conn, $query) or die(mysqli_error());
    while ($out = mysqli_fetch_array($confirm)) 
    {
        $title=$out['title'];
        $location=$out['location'];
        $profile=$out['image'];
        $date=$out['date'];
        $des=$out['des'];
        ?>
            <div class="eventsboxes">
                <h4 class="text-center" style="color:black;"><?php echo $title; ?></h4>
                <img src="<?php echo 'ajax/admin/'.$profile; ?>" alt="Image 1" class="card-img-top1">
                <p style="color:black;"><b>Location:</b><?php echo $location; ?></p>
                <p style="color:black;"><b>Date:</b><?php echo $date; ?></p>
                <p style="color:black;"><?php echo $des; ?></p>
            </div>
        <?php   
    } 
}

if(isset($_POST['community']))
{
    
    $query="SELECT * FROM `community` ORDER BY `id`";
    $sn=0;
    $confirm = mysqli_query($conn, $query) or die(mysqli_error());
    while ($out = mysqli_fetch_array($confirm)) 
    {
        $conName=$out['comName'];
        $profile=$out['image'];
        $phone=$out['phone'];
        $adds=$out['adds'];
        ?>
            <div class="eventsboxes">
                <h4 class="text-center" style="color:black;"><?php echo $conName; ?></h4>
                <img src="<?php echo 'ajax/admin/'.$profile; ?>" alt="Image 1" class="card-img-top1">
                <p><b>Location:</b><?php echo $adds; ?></p>
                <p><b>Phone:</b><?php echo $phone; ?></p>
                <!-- <p style="color:black;"><?php echo $adds; ?></p> -->
            </div>
        <?php   
    } 
}

?>