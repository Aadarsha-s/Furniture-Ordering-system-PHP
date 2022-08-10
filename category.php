<?php
include('config.php');
include('header.php');
$id = $_REQUEST['id'];
$sql = "SELECT * FROM `furniture_product` WHERE `categories_id`= '$id' ORDER BY id DESC ";
$result = $con->query($sql);
?>
<?php 
		while($rows = mysqli_fetch_assoc($result)){
    	?>
        <div class="margin-right">
		<div class ="image_display_in_block">
            <spam><a style ="text-decoration:none; color: #333; font-size:17px;" href="product_display.php?id=<?php echo $rows['id'];?>"><img src="<?php echo 'images/'. $rows['image']; ?>" width ="200" height="250">
            <?php echo $rows['name'];?><br>
            <div style="color:rgb(255, 166, 0);"><b><?php echo 'Rs.'.$rows['price'];?></b></div>
        </a>
        </div>
        </div>
<?php
}
?>

<?php 
include('footer.php');
?>
