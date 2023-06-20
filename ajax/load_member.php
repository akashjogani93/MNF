<?php include('../connect.php');

if(isset($_POST['Submit']))
{
    
    $query="SELECT * FROM `member` ORDER BY `id`";
    $sn=0;
    $confirm = mysqli_query($conn, $query) or die(mysqli_error());
    while ($out = mysqli_fetch_array($confirm)) 
    {
        $name=$out['name'];
        $profile=$out['image'];
        $phone=$out['phone'];
        $des=$out['des'];
        ?>
            <div class="eventsboxes">
                <img src="<?php echo 'ajax/admin/'.$profile; ?>" alt="Image 1" class="card-img-top1">
                <h4 class="text-left" style="color:black;"><?php echo $name; ?></h4>
                <p><b>Phone: </b><?php echo $phone; ?></p>
                <p><b>Designation:</b><?php echo $des; ?></p>
            </div>
        <?php   
    } 
}

?>