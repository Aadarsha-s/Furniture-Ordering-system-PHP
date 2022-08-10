<?php
session_start();
$con=mysqli_connect("localhost","root","","furniture_admin");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/furniture_admin/');
define('SITE_PATH','http://127.0.0.1/php/furniture_admin/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>