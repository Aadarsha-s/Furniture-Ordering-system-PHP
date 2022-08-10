<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['user_id']);
		$delete_sql="delete from user where user_id='$id'";
		
		mysqli_query($con,$delete_sql);

	}
}

$sql="select * from user order by user_id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">List of User </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>SN</th>
							   <th>First Name</th>
							   <th>Last Name</th>
							   <th>User Name</th>
							   <th>Email</th>
							   <th>Mobile number</th>
							   <th>Address</th>
							   <th>City</th>           
                               <th>Action</th>                    
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){
								//$pos = strpos($row['description'],' ',1);
								//$des = substr($row['description'],0,$pos);
								
								
							?>
							<tr>
								
							   <td class="serial"><?php echo $i++?></td>
							   <td><?php echo $row['f_name']?></td>
							   <td><?php echo $row['l_name']?></td>
							   <td style="text-transform: none;"><?php echo $row['username']?></td>
							   <td style="text-transform: none;"><?php echo $row['email']?></td>
							   <td><?php echo $row['mobile']?></td>
							   <td><?php echo $row['address']?></td>
							   <td><?php echo $row['city']?></td>
							  
							   <td>
							   <?php
								
								echo "<span class='badge badge-delete'><a onClick='return confirm_delete()' href='?type=delete&id=".$row['user_id']."'>Delete</a></span>";
								
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
		var $output = confirm("Are you sure you want to delete the user?");
		return $output;
}
</script>