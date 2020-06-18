<?php
include("../../Dbase/class.dbase.php");
$dbase= new dbase();
session_start();
$picture_name=$_SESSION['raju']; // Session_id
$date=$_SESSION['rana'];
$t_width = 300;	// Maximum thumbnail width
$t_height = 200;	// Maximum thumbnail height
$new_name =$date.".jpg"; // Thumbnail image name
$path = "../../pb_photo_library/";
if(isset($_GET['t']) and $_GET['t'] == "ajax")
	{
		extract($_GET);
		$ratio = ($t_width/$w); 
		$nw =ceil($w * $ratio);
		$nh =ceil($h * $ratio);
		$nimg = imagecreatetruecolor($nw,$nh);
		$im_src = imagecreatefromjpeg($path.$img);
		imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w,$h);
		imagejpeg($nimg,$path.$new_name,90);
		mysql_query("UPDATE photo_library SET picture_name='$new_name' WHERE insert_time='$date'");
		echo $new_name."?".time();
		exit;
	}
	
	?>