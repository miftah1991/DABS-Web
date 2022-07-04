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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../admin/css/ns-window.css" />
<link rel="stylesheet" href="../css/table.css" />
<script type="text/javascript" src="../admin/jquery-1.7.1.js"></script>
<script type="text/javascript" src="../admin/ns-window.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">
	function showWindow(id) {
		var url='slide_edit.php?sid='+id;
		$.nsWindow.open({
			title: 'Edit Sideshow Image',
			width: 550,
			height: 340,
			dataUrl: url,
			theme:'yellow'
        });
	}
</script> 
<script type="text/javascript">
function showconf(var1){
	var conf=confirm("Are you Sure to Delete This Slide Record");
     if(conf){
	
		self.location="slide_delete.php?sid="+var1;
   }

   }
</script>
<title>DABS</title>
  <style>
a {
	text-decoration:none;
	color:#000;
	font-size:15px;
	}
</style>
</head>

<body>
<br /><br /><br /><br />
<table border="1" align="left" cellpadding="0" cellspacing="0" class="bordered">

<tbody>
<tr>
  <td colspan="9" class="tdh"><a href="slide_add.php" class="tex">Adding New SlideShow Item</a></td>
  </tr>
<tr class="tdh">
<td width="250" class="tex">ITem Title</td>
<td class="tex">Image</td>
<td class="tex">Page</td>
<td class="tex">Language</td>
<td class="tex">Edit</td><td class="tex">Delete</td></tr>
<?php
$slide_query=mysql_query("SELECT s.*,l.language from `sld_shw_tbl` s, lng_tbl l where l.language_id=s.language_id");
while($slide_rec=mysql_fetch_array($slide_query)){
	
?><tr>
<td><?php echo $slide_rec['text']; ?></td>
<td><?php echo $slide_rec['image']; ?></td>
<td><?php echo $slide_rec['page']; ?></td>
<td><?php echo $slide_rec['language']; ?></td>

<td><a href="#" onclick="showWindow(<?php echo $slide_rec['id']; ?> );"><img src="../images/edit.gif" width="22" height="16" /></a></td>
<td><a href="#" onclick="showconf(<?php echo $slide_rec['id'];?>);"><img src="../images/delete.gif" alt="Delete" width="17" height="18" /></a></td></tr>
<?php
}?>
     </tbody></table>
     <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <p align="left"> <span  style="font-size:15px;color:red;">Uploade Maximum 6-7 Image in Slide Show Directory Because it Slow Your Website Loading</span></p>
</body>
</html>