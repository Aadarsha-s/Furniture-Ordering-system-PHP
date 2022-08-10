<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0'; //pending
		}
		$update_status_sql="update user_order set payment='$status' where user_id='$id'";
		mysqli_query($con,$update_status_sql);
	}
}

$sql="select * from user_order order by user_id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Customer Order Placement</h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>SN</th>
							   <th>Name</th>
							   <th>Contact</th>
							   <th>Address</th>
							   <th>City</th>
							   <th>Email</th>
							   <th>Image</th>
							   <th>Product Name</th>           
                               <th>Total Amount</th>            
                               <th>Payment</th>            
                                       
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){
								//$pos = strpos($row['description'],' ',1);
								//$des = substr($row['description'],0,$pos);
                                $photo=$row['image'];
								if($photo !=''){
									$display_image = 'images/'.$photo;
								}else{
									$display_image = 'images/noimage.png';
								}
								
							?>
							<tr>
								
							   <td class="serial"><?php echo $i++?></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['contact']?></td>
							   <td><?php echo $row['address']?></td>
							   <td><?php echo $row['city']?></td>
							   <td style="text-transform: none;"><?php echo $row['email']?></td>
							   <td><img src="<?php echo $display_image; ?>" width="50" height="50" /></td>
							   <td><?php echo $row['product_name']?></td>
                               <td>Rs.<?php echo $row['total_amount']?></td>
							   <td>
                             <?php  if($row['payment']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['user_id']."'>Completed</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['user_id']."'>Pending</a></span>&nbsp;";
								}
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
