<?php 
require('config.php');

require('functions.php');
include('header.php');

$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['uname']);
	$password=get_safe_value($con,$_POST['psw']);
	$sql="select * from user where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:index.php');
		die();
	}else{
		$msg="Please enter correct login details";	
	}
	
}
?>


<form method="post" class="login-form">

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input class="form-control login-page" type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input class = "form-control login-page" type="password" placeholder="Enter Password" name="psw" required><br><br>
        
    <button class=" btn btn-primary login-button" name="submit" type="submit">Login</button>
  </div>

</form>
<div class="field_error"><?php echo $msg?></div>

<?php 
include('footer.php');
?>
</body>
</html>