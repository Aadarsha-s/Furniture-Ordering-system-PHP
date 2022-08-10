<?php
//ob_start();
include("config.php");
if(isset($_POST["submit"])){
        $firstname = $_POST["fname"];
		$lastname = $_POST["lname"];
		$username = $_POST["uname"];
		$email = $_POST["email"];
		$mobile_number = $_POST["m_num"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$password = $_POST["psw"];
	//	$cat_value = "";
        // foreach($category as $value)  
        //    {  
        //       $cat_value[]= $value;  
        //    }
       // $cat_value = implode(",",$c_venue_select);
		 
        $sql = "INSERT INTO user(f_name,l_name,username,email,mobile,address,city,password) VALUES ('$firstname','$lastname','$username','$email','$mobile_number','$address','$city','$password')";
        if($con->query($sql)== TRUE){
        echo "<script type= 'text/javascript'>alert('You have been successfully registered.');</script>";
        //header('location:listarticle.php');
        } else {
        echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $con->error."');</script>";
        }
		//header('Location: add_venue.php');
        echo "<script>
                   window.location = 'login.php';
          </script>";
}

include('header.php');

?>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="login-form">

  <div class="container">
    <label for="fname"><b>Firstname</b></label>
    <input class="form-control login-page" type="text" name="fname" required>

    <label for="lname"><b>Lastname</b></label>
    <input class="form-control login-page" type="text" name="lname" required>

    <label for="uname"><b>Username</b></label>
    <input class="form-control login-page" type="text" name="uname" required>

    <label for="email"><b>Email</b></label>
    <input class="form-control login-page" type="text" name="email" required>

    <label for="m_num"><b>Mobile number</b></label>
    <input class="form-control login-page" type="text" name="m_num" required>

    <label for="address"><b>Address</b></label>
    <input class="form-control login-page" type="text" name="address" required>

    <label for="city"><b>City</b></label>
    <input class="form-control login-page" type="text" name="city" required>
    
    <label for="psw"><b>Password</b></label>
    <input class="form-control login-page" type="password" name="psw" required>
        
    <button class="btn btn-primary login-button" name="submit" type="submit">Sign Up</button>
  </div>

</form>

<?php
include('footer.php');
?>
