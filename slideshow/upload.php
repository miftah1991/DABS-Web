<?php require("../config.php"); ?>
<?php require("../method.php"); ?>
<?php
if(!session_start()){
	@session_start();
	}
	
if(!isset($_SESSION['uname'])){
header("location:login.php");
exit();
}else{
	@session_start();
	$uid=$_SESSION['uid'];
	$check_rec=mysql_fetch_array(mysql_query(sprintf("select slideshow from  `tbl_peopl` where uid=%s",sec($uid,'int'))));
	$righs=$check_rec['slideshow'];
	if($righs!=1){
		header("location:../admin/mainframe.php?ac_deny");
		exit();
	}
	
}

?>
<?php
   // Edit upload location here
  // $destination_path = getcwd().'\uplode'.DIRECTORY_SEPARATOR;

   //$result = 0;
   
  // @$target_path = basename($destination_path) . basename( $_FILES['myfile']['name']);
   
   //if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
     // $result = 1;
  // }
   //@$fname=$_FILES['myfile']['name'];
   if (($_FILES["myfile"]["type"] == "image/gif")
|| ($_FILES["myfile"]["type"] == "image/jpeg")
|| ($_FILES["myfile"]["type"] == "image/jpg")
|| ($_FILES["myfile"]["type"] == "image/pjpeg")
|| ($_FILES["myfile"]["type"] == "image/x-png")
|| ($_FILES["myfile"]["type"] == "image/png")
)
	     {
	$output_dir = "images/";
	@move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $_FILES["myfile"]["name"]);
	
	$v=$_GET['v'];
	//echo "$v";
	echo $v;
	
		 }
?>
