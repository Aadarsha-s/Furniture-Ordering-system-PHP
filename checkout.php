<?php
include('config.php');
$sql = "SELECT * FROM `furniture_product`";
$result = $con->query($sql);
include('header.php');
$total = 0;
    if (isset($_SESSION['cart'])){
       $product_id = array_column($_SESSION['cart'], 'product_id');
       while ($row = mysqli_fetch_assoc($result)){
           foreach ($product_id as $id){
                if ($row['id'] == $id){
                  //include('cartdisplay.php');
       //cartElement($row['image'], $row['name'],$row['price'], $row['id']);
           $image = $row['image'];
           $name= $row['name'];
               
       $total = $total + (int)$row['price'];
                }
            }
        }
    }
    // else{
    //     echo "<h5>Cart is Empty</h5>";
    // }
?>

<form class="login-form checkout-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  
    <label for="your_name">Your Name:</label>
    <input class="form-control login-page" type="text" class="form-control" name="name" required>
  
  
    <label for="contact">Contact Number:</label>
    <input class="form-control login-page" type="number" class="form-control" name="contact" required>
  
  
    <label for="streetaddress">Street Address:</label>
    <input class="form-control login-page" type="text" class="form-control" name="address" required>
    
    <label for="town">Town / city:</label>
    <input class="form-control login-page" type="text" class="form-control" name="city" required>
  
    <label for="email">Email Address:</label>
    <input class="form-control login-page" type="email" name="email" required>

    <input type="hidden" name="image" value="<?php echo $image;?>">
    <input type="hidden" name="product_name" value="<?php echo $name;?>">
    <input type="hidden" name="total_amount" value="<?php echo $total;?>">

<p>
<b>Cash On Delivery<br>
Pay with cash upon delivery inside Kathmandu Valley</b>
</p>
  <button type="submit" class="btn btn-primary" name="submit">Place order</button>
</form>
  

<div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25 position">
<div class=" border-inc">
    <h6>Your Order</h6>
    <hr>
    <div class="row price-details">
        <div class="col-md-6">
            <?php
                if (isset($_SESSION['cart'])){
                    $count  = count($_SESSION['cart']);
                    echo "<h6>Price ($count items)</h6>";
                }else{
                    echo "<h6>Price (0 items)</h6>";
                }
            ?>
            <h6>Delivery Charges</h6>
            <hr>
            <h6>Amount Payable</h6>
        </div>
        <div class="col-md-6">
            <h6>Rs.<?php echo $total; ?></h6>
            <h6 class="text-success">FREE</h6>
            <hr>
            <h6 name="total_price">Rs.<?php
                echo $total;
                ?></h6>
        </div>
    </div>
</div>

</div>



<?php
include('footer.php');

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $email = $_POST["email"];
    $image = $_POST["image"];
    $product_name = $_POST["product_name"];
    $total_amount = $_POST["total_amount"];
    
//	$cat_value = "";
    // foreach($category as $value)  
    //    {  
    //       $cat_value[]= $value;  
    //    }
   // $cat_value = implode(",",$c_venue_select);
     
    $sql1 = "INSERT INTO user_order(name,contact,address,city,email,image,product_name,total_amount) VALUES ('$name','$contact','$address','$city','$email','$image','$product_name','$total_amount')";
    if($con->query($sql1)== TRUE){
    echo "<script type= 'text/javascript'>alert('You have successfully place the order.');</script>";
    //header('location:listarticle.php');
    } else {
    echo "<script type= 'text/javascript'>alert('Error: " . $sql1 . "<br>" . $con->error."');</script>";
    }
    //header('Location: add_venue.php');
    echo "<script>
               window.location = 'index.php';
      </script>";
}

?>