<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from furniture_product where id='$id'";
		
		mysqli_query($con,$delete_sql);

	}
}

$sql="select furniture_product.*,categories.categories from 
furniture_product,categories where furniture_product.categories_id=categories.id 
order by furniture_product.id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Products </h4>
				   <h4 class="box-link"><a href="manage_product.php"><button type="button" class="btn btn-primary float-right">Add Product</button></a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>SN</th>
							   <th>Categories</th>
							   <th>Name</th>
							   <th>Image</th>
							   <th>Description</th>
							   <th>Quantity</th>
							   <th>Price</th>
							   <th>Action</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){
								$pos = strpos($row['description'],' ',1);
								$des = substr($row['description'],0,$pos);
								$photo=$row['image'];
								if($photo !=''){
									$display_image = 'images/'.$photo;
								}else{
									$display_image = 'images/noimage.png';
								}
								
							?>
							<tr>
								
							   <td class="serial"><?php echo $i++?></td>
							   <td><?php echo $row['categories']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><img src="<?php echo $display_image; ?>" width="50" height="50" /></td>
							   <td><?php echo $des;?></td>
							   <td><?php echo $row['quantity']?></td>
							   <td>Rs.<?php echo $row['price']?></td>
							   <td>
							   <?php
								
								echo "<span class='badge badge-edit'><a href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a onClick='return confirm_delete()' href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
						
								
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>

<script language="javascript">
	function confirm_delete(){
		var $output = confirm("Are you sure you want to delete this record?");
		return $output;
}
</script>