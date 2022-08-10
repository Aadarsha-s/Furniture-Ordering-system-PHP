<?php
require('top.inc.php');
$categories_id='';
$name='';
$image='';
$price='';
$quantity='';
$description='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from furniture_product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['categories_id'];
		$name=$row['name'];
		$image=$row['image'];
		$price=$row['price'];
		$quantity=$row['quantity'];
		$description=$row['description'];
		
		}
		else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$name=get_safe_value($con,$_POST['name']);
	$quantity=get_safe_value($con,$_POST['quantity']);
	$price=get_safe_value($con,$_POST['price']);
	$description=get_safe_value($con,$_POST['description']);
	
	$res=mysqli_query($con,"select * from furniture_product where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	
	// if($_GET['id']==0){
	// 	if($_FILES['images']['type']!='images/png' && $_FILES['images']['type']!='images/jpg' && $_FILES['images']['type']!='images/jpeg'){
	// 		$msg="Please select only png,jpg and jpeg image format";
	// 	}
	// }else{
	// 	if($_FILES['images']['type']!=''){
	// 			if($_FILES['images']['type']!='images/png' && $_FILES['images']['type']!='images/jpg' && $_FILES['images']['type']!='images/jpeg'){
	// 			$msg="Please select only png,jpg and jpeg image format";
	// 		}
	// 	}
	//}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['images']['name']!=''){
				$tpath= "images/";
        $tpath= $tpath.basename($_FILES["images"] ["name"]);
        move_uploaded_file($_FILES['images']['tmp_name'], $tpath);
        $uploadedphoto=$_FILES["images"]["name"];
        if($uploadedphoto==''){
            $uploadedphoto='';
        }
        
				//$image=rand(111111111,999999999).'_'.$_FILES['images']['name'];
				move_uploaded_file($_FILES['images']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update furniture_product set categories_id='$categories_id',name='$name',price='$price',quantity='$quantity',description='$description',image='$uploadedphoto' where id='$id'";
			}else{
				$update_sql="update furniture_product set categories_id='$categories_id',name='$name',price='$price',quantity='$quantity',description='$description',image='$uploadedphoto' where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$tpath= "images/";
			$tpath= $tpath.basename($_FILES["images"] ["name"]);
			move_uploaded_file($_FILES['images']['tmp_name'], $tpath);
			$uploadedphoto=$_FILES["images"]["name"];
			if($uploadedphoto==''){
				$uploadedphoto='';
			}
			//$image=rand(111111111,999999999).'_'.$_FILES['images']['name'];
			move_uploaded_file($_FILES['images']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into furniture_product(categories_id,name,image,description,quantity,price) values('$categories_id','$name','$uploadedphoto','$description','$quantity','$price')");
		}
		header('location:product.php');
		die();
	}
}
?>



<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product Form</strong></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							<div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="categories_id">
										<option>Select Category</option>
										<?php
										$res=mysqli_query($con,"select id,categories from categories order by categories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
								</div>
								
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Quantity</label>
									<input type="text" name="quantity" placeholder="Enter quantity" class="form-control" required value="<?php echo $quantity?>">
								</div>	

								<div class="form-group">
									<label for="categories" class=" form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
								</div>
								
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>

									<input type="file" name="images" class="form-control" <?php echo $image_required?>>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-primary">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         