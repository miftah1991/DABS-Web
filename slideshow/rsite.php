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
	$check_rec=mysql_fetch_array(mysql_query(sprintf("select relatedsite from  `tbl_peopl` where uid=%s",sec($uid,'int'))));

	$righs=$check_rec['relatedsite'];
	if($righs!=1){
		header("location:../admin/mainframe.php?ac_deny");
		exit();
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript" src="jquery-1.7.1.js"></script>
<link href="../css/table.css" media="all" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script type="text/javascript">
function showconf(var1){
	var conf=confirm("Are you Sure to Delete This Menu");
     if(conf){
	
		self.location="rsite_delete.php?bid="+var1;
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
<p align="center" style="color:#F00; font-size:13px">
</p>
<table align="left" cellpadding="0" cellspacing="0" class="bordered">

<tbody>
<tr>
  <td colspan="9"><a href="rsite_add.php" class="tex">Adding New Related Site Icon</a></td>
  </tr>
<tr class="tex" style="background-color:#D1E4EE;">
<td class="tex">No</td>
<td>Footer Menu</td>
<td>Custom URL</td>
<td>Language</td>
<td>Edit</td><td>Delete</td></tr>
<?php
$fmenu_query=mysql_query("SELECT @n := @n + 1 n,b.bid, b.image,b.link, l.language from (SELECT @n := 0) m ,`btm_sld_tbl` b, lng_tbl l where l.language_id=b.language_id");
while($fmenu_rec=mysql_fetch_array($fmenu_query)){
	
?><tr class="tdtex">
<td><?php echo $fmenu_rec['n']; ?></td>
<td><?php echo $fmenu_rec['image']; ?></td>
<td><?php echo $fmenu_rec['link'];  ?></td>
<td><?php echo $fmenu_rec['language'];  ?></td>
<td><a href="rsite_edit.php?bid=<?php echo $fmenu_rec['bid']; ?> "><img src="../images/edit.gif" width="22" height="16" /></a></td>
<td><a href="#" onclick="showconf(<?php echo $fmenu_rec['bid'];?>);"><img src="../images/delete.gif" alt="Delete" width="17" height="18" /></a></td></tr>
<?php
}?>
     </tbody></table>
</body>
</html>