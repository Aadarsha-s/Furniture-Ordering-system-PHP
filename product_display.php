<?php
include('config.php');
//require('functions.php');
//$id = $_REQUEST['id'];
$id = ''; 
if( isset( $_REQUEST['id'])) {
    $id = $_REQUEST['id']; 
} 

$sql1 = "UPDATE furniture_product SET product_views=product_views+1 WHERE id= '$id' ";
$con->query($sql1);
$sql = "SELECT * FROM `furniture_product` WHERE `id`= '$id' ORDER BY id DESC ";
$result = $con->query($sql);


$sql2 = "SELECT * FROM `furniture_product` WHERE product_views > 0 ORDER BY product_views DESC LIMIT 5";
$result2 = $con->query($sql2);

$sql3 = "SELECT * FROM furniture_product WHERE categories_id = '2' ORDER BY id ASC LIMIT 2";
$result3 = $con->query($sql3);



if (isset($_POST['add'])){
    // print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        //print_r($_SESSION['cart']);
    }
}


include('header.php');

if(isset($_POST["savert"])){  
    $user_id = $_POST["user_id"]; 
    $name = $_POST["name"];
    $rating = $_POST["rating"];
    $review = $_POST["rv"];
    $p_id = $_POST["pid"];
    // $sql5 = "UPDATE review SET user_id = '$user_id' where user_id = 'user_id'";
    // $con->query($sql5);
  //  select user_id from user where $_SESSION['ADMIN_USERNAME'] = 
    $sql3 = "INSERT INTO review(user_id,name,rating,review,pid) VALUES ('$user_id','$name','$rating','$review','$p_id')";
     if($con->query($sql3)== TRUE){
    //  echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
    //$message = "You have successfully rated this product.";
     }
         else {
     echo "<script type= 'text/javascript'>alert('Error: " . $sql3 . "<br>" . $con->error."');</script>";
     }
    //header('Location: add_venue.php');
    
}
?>
	
    <?php 
		while($rows = mysqli_fetch_assoc($result)){
    ?>
    <form method="post" action="product_display.php?action=add&id=<?php echo $rows['id']; ?>">
            <span class="item-inline">
                <img src="<?php echo 'images/'. $rows['image']; ?>" width ="300px" height="300px" style=" margin-top:-20px;">
        </span>
            <span style=" margin:30px 0 0 20px; " class="item-inline ">
            <b> <h3><?php echo $rows['name'];?></h3></b><br>
                <h5>Rs. <?php echo $rows['price']?></h5><br>
                <?php echo $rows['description'];?><br> 
                <div class="rating rateit-small"></div>

                <!--b>Quantity</b>: <?php //echo $rows['quantity']?><br-->   
                
            
            <button type="submit" class="btn btn-primary" name="add">Add to Cart</button>
			<input type="hidden" name="product_id"  value="<?php echo $rows['id']; ?>"/>
        </span>
        </form>
<br><br>
    <div style=" margin-left: 170px;">
      <p><h4>Similar Products</h4></p>
      <?php 
		while($rows = mysqli_fetch_assoc($result3)){
    ?>
    <div class = "image_display_in_block">
            <spam><a style ="text-decoration:none;color: #333; font-size:17px;" href="product_display.php?id=<?php echo $rows['id'];?>"><img src="<?php echo 'images/'. $rows['image']; ?>" width ="200" height="250">
            <?php echo $rows['name'];?><br>
            <div style="color:rgb(255, 166, 0);"><b><?php echo 'Rs.'.$rows['price'];?></b></div>
        </a>
        </div>
      <?php
      }
      ?>
  </div>



  <form style=" margin: 25rem 0 0 200px; width:30%; border: 1px solid black; border: 3px solid #f1f1f1;
    border-radius: 5px; padding: 15px; position: absolute; float: left" method="post">
    <p><h4>Feedback</h4></p><hr>
  <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  
  if(isset($_SESSION["ADMIN_LOGIN"]) && isset($_SESSION["ADMIN_USERNAME"])){ 
      $username = $_SESSION["ADMIN_USERNAME"];
  $result4 = mysqli_query($con,"select * from user where username = '$username' ");
  while ($row2 = mysqli_fetch_assoc($result4)){
  ?>
  <input type="hidden" name="user_id" value="<?php echo $row2['user_id'];?>">
    <?php
  }}
    ?>
  
  <input type="hidden" name="pid" value="<?php echo $rows['id']; ?>">
  <p>Name</p>
  <p><input type="text" name="name" class="review-input"></p>
  <p>Rating</p>
  <div class="rtn">
    <fieldset class="rating">
    
        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
    </fieldset>
   </div>

<p>Review</p>
<p><textarea class="review-input" name="rv"></textarea></p>
<?php if (session_status() == PHP_SESSION_NONE) {
       session_start();
     }
      if(isset($_SESSION["ADMIN_LOGIN"]) && isset($_SESSION["ADMIN_USERNAME"])){ 
       echo '<p><input type="submit" name="savert" value="Feedback" class="btn btn-primary"></p>';  
    
    }
   

?>

</form>

<?php
}
?>
<div style=" position: absolute;
  right: 0; bottom: -48rem; border: 1px solid black; border: 3px solid #f1f1f1;
    border-radius: 5px; padding: 15px; margin: 25rem 200px 0 0; height:350px; overflow: auto;" >
<p><h4>Rating and Review</h4></p><hr>
<?php
$pid = ''; 
if( isset( $_REQUEST['id'])) {
    $pid = $_REQUEST['id']; 
} 


//$sql4 = "select * from review where  ";
$sql4 = "select * from review where pid = '$pid' ";
$result3 = $con->query($sql4);
while($row1 = mysqli_fetch_assoc($result3)){
   echo $row1['name'].'<br>';
   for($i=1;$i<=$row1['rating'];$i++){ 
      echo '<span class="fa fa-star checked"></span>';
    }
    
   for($j=1;$j<=5-$row1['rating'];$j++) {
       echo '<span class="fa fa-star "></span>';
    } 
    
  
  echo '<p>'.$row1['review'].'</p>';
}
?>
</div>