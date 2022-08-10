<?php 
include('config.php');
//$id = $_REQUEST['id'];
$sql = "SELECT * FROM `furniture_product` WHERE product_views > 0 ORDER BY product_views DESC LIMIT 5";
$result = $con->query($sql);
include('header.php');
?>

<img class="background" src="images/background.jpg"><br><br><br>
<div>
    <h2 align="center">Popular Products</h2><br>
    <?php 
		while($rows = mysqli_fetch_assoc($result)){
    	?>
		<div class ="image_display_in_block">
            <spam><a style ="text-decoration:none;color: #333; font-size:17px;" href="product_display.php?id=<?php echo $rows['id'];?>"><img src="<?php echo 'images/'. $rows['image']; ?>" width ="200" height="250">
            <?php echo $rows['name'];?><br>
            <div style="color:rgb(255, 166, 0);"><b><?php echo 'Rs.'.$rows['price'];?></b></div>
        </a>
        </div>
<?php
}
?>

</div>
<?php 
include('footer.php');
?>
</body>
</html>