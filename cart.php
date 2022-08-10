<?php
include('config.php');
$sql = "SELECT * FROM `furniture_product`";
$result = $con->query($sql);

include('header.php');

if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
  //              unset($_SESSION['cart']);
                
              //  echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
  }
  
?>

<?php
    $total = 0;
    if (isset($_SESSION['cart'])){
       $product_id = array_column($_SESSION['cart'], 'product_id');
       while ($row = mysqli_fetch_assoc($result)){
           foreach ($product_id as $id){
                if ($row['id'] == $id){
                  include('cartdisplay.php');
       //cartElement($row['image'], $row['name'],$row['price'], $row['id']);
                   $total = $total + (int)$row['price'];
                }
            }
        }
    }
    else{
        echo "<h5>Cart is Empty</h5>";
    }
?>

        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
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
                        <h6>Rs.<?php
                            echo $total;
                            ?></h6>
                        <?php if(isset($_SESSION['cart'])){
                                if (session_status() == PHP_SESSION_NONE) {
                                    session_start();
                                }
                                if(isset($_SESSION["ADMIN_LOGIN"]) && isset($_SESSION["ADMIN_USERNAME"])){ 
                                ?>
                            <a href="checkout.php"><button type="submit"  class="btn btn-info" name="checkout">Proceed to Checkout</button></a>
                        <?php }
                        
                            else {
                               echo"<a href='login.php'><button type='submit' class='btn btn-info'>Proceed to Checkout</button></a>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
   


<?php
include('footer.php');
?>
