  
    <form action="cart.php?action=remove&id=<?php echo $row['id']; ?>" method="post" class="cart-items">
                    <div class="border rounded" style="margin-left:120px;">
                        <div class="row bg-white">
                            <div class="col-md-3 pl-0">
                                <img src="<?php echo 'images/'. $row['image']; ?>" height="200" width="200" alt="Image1" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5 class="pt-2"><?php echo $row['name'];?></h5>
                               <h5 class="pt-2">Rs. <?php echo $row['price']?></h5>
                                <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
                                
                            </div>
                            
                        </div>
                    </div>
                </form>
    
 