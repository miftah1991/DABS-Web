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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE `sld_shw_tbl` SET text=%s, page=%s, language_id=%s WHERE id=%s",
                       sec($_POST['text'], "text"),
                       sec($_POST['page'], "text"),
                       sec($_POST['language_id'], "int"),
                       sec($_POST['id'], "int"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($updateSQL, $connect) or die('Welcome to DABS Website');

  
  
  header("Location:slideshow.php");
}

mysql_select_db($database_connect, $connect);
$query_language = "SELECT language_id, `language`, code FROM lng_tbl";
$language = mysql_query($query_language, $connect) or die();
$row_language = mysql_fetch_assoc($language);
$totalRows_language = mysql_num_rows($language);

$colname_slide = "-1";
if (isset($_GET['sid'])) {
  $colname_slide = $_GET['sid'];
}
mysql_select_db($database_connect, $connect);
$query_slide = sprintf("SELECT * FROM `sld_shw_tbl` WHERE id = %s", sec($colname_slide, "int"));
$slide = mysql_query($query_slide, $connect) or die();
$row_slide = mysql_fetch_assoc($slide);
$totalRows_slide = mysql_num_rows($slide);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/table.css" />
<title>Untitled Document</title>
</head>

<body><br />
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="bordered">
    <tr valign="baseline">
      <td nowrap="nowrap" align="left" valign="top">Text:</td>
      <td><textarea name="text" cols="50" rows="5"><?php echo htmlentities($row_slide['text'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Page:</td>
      <td><select name="page">
        <option value="home" <?php if (!(strcmp("home", htmlentities($row_slide['page'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Home Page</option>
        <option value="sub" <?php if (!(strcmp("sub", htmlentities($row_slide['page'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Sub Page</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Language:</td>
      <td><select name="language_id">
        <?php 
do {  
?>
        <option value="<?php echo $row_language['language_id']?>" <?php if (!(strcmp($row_language['language_id'], htmlentities($row_slide['language_id'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_language['language']?></option>
        <?php
} while ($row_language = mysql_fetch_assoc($language));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" class="btn btn-primary" value="Save Changes" />
      <input type="reset"  class="btn btn-medium btn-primary" value="Reset Changes" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_slide['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($language);

mysql_free_result($slide);
?>
