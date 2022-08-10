<!doctype html>
<html lang="en">
    <head>
        <title>Furniture Store</title>
		<meta charset="UTF-8">
	    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    </head>
<body>
    <div class="header1">
		<a class="top-left" href="index.php">
			<span style="font-size: 20px; font-weight: bold; letter-spacing: 1px;">Furniture Store</span>
		</a>
		<span class="header">
			<span>
				<input class="search-input" placeholder="Search for...">
				<button class="search-button">Search</button>
			</span>
			<span class="top-right">
				<a href="cart.php" class="header-end" style="color:#4646FF;"><i class="fa fa-shopping-cart"></i></a>
				<?php if(isset($_SESSION['cart'])){
					$count = count($_SESSION['cart']);
                	echo "<span id=\"cart\" class=\"text-warning bg-light\">$count</span>";
				}else{
					echo "<span id=\"cart\" class=\"text-warning bg-light\"></span>";
                } ?>
				<?php
				// if (isset($_SESSION['cart'])){
				// 	$count = count($_SESSION['cart']);
				// 	echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
				// }else{
				// 	echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
				// }
				?>
				
				<?php
                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                            }
                            if(isset($_SESSION["ADMIN_LOGIN"]) && isset($_SESSION["ADMIN_USERNAME"])){ 
				?>
                            <a href="user-logout.php" class="header-end">Log Out</a>
                            <?php  }
							else{ ?>
                            <a href="login.php" class="header-end">Login</a>
							<a href="user-register.php" class="header-end">Register</a>
                            <?php  } ?>
				
			</span>
		</span>
	</div>


    <div class="navbar">
        
			<div class="navbar-middle">
				
				<a href="category.php?id=1">BED</a>
				<a href="category.php?id=2">CHAIR</a>
				<a href="category.php?id=3">CUPBOARD</a>
				<a href="category.php?id=4">SOFA</a>
				<a href="category.php?id=5">TABLE</a>
			</div>
	    
	</div>
    