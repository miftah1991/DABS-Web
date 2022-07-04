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
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if ((isset($_GET['sid'])) && ($_GET['sid'] != "")) {
  $deleteSQL = sprintf("DELETE FROM `sld_shw_tbl` WHERE id=%s",
                       GetSQLValueString($_GET['sid'], "int"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($deleteSQL, $connect) or die('Welcome to DABS Website');

 
  header("Location:slideshow.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>