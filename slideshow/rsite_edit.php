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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE `btm_sld_tbl` SET image=%s, link=%s, language_id=%s WHERE bid=%s",
                       sec($_POST['ss'], "text"),
                       sec($_POST['link'], "text"),
                       sec($_POST['language_id'], "int"),
                       sec($_POST['bid'], "int"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($updateSQL, $connect) or die('Welcome to DABS Website');

  $updateGoTo = "rsite.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsite = "-1";
if (isset($_GET['bid'])) {
  $colname_rsite = $_GET['bid'];
}
mysql_select_db($database_connect, $connect);
$query_rsite = sprintf("SELECT * FROM `btm_sld_tbl` WHERE bid = %s", sec($colname_rsite, "int"));
$rsite = mysql_query($query_rsite, $connect) or die();
$row_rsite = mysql_fetch_assoc($rsite);
$totalRows_rsite = mysql_num_rows($rsite);

mysql_select_db($database_connect, $connect);
$query_lang = "SELECT language_id, `language`, code FROM lng_tbl";
$lang = mysql_query($query_lang, $connect) or die();
$row_lang = mysql_fetch_assoc($lang);
$totalRows_lang = mysql_num_rows($lang);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" href="../css/table.css" />
<title>DABS</title>

<script type="text/javascript">
function openWindow() { 
  window.open("popup.php","_blank","height=200,width=400, status=yes,toolbar=no,menubar=no,location=no"); 
} 

</script>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="left" cellpadding="0" cellspacing="0" class="bordered">
    <tr valign="baseline" class="bordered">
      <td colspan="2" align="center" nowrap="nowrap" class="tdh"><span class="tex">Add</span> <span class="tex">Related</span> <span class="tex">Sites</span></td>
    </tr>
    
    <tr valign="baseline">
      <td rowspan="2" align="left" valign="middle" nowrap="nowrap" class="tdh"><span class="tex">Image</span>:</td>
      <td><font color="red">
        <input type="button" value="Change Image" class="btn btn-primary" onclick="openWindow();" />
      </font></td>
    </tr>
    <tr valign="baseline">
      <td><p>
        <textarea name="ss" id="ss"><?php echo $row_rsite['image']; ?></textarea>
      </p>
      <p><font color="red">Picture size should be 62*60 px</font> </p></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap" class="tdh"><span class="tex">Link</span>:</td>
      <td><input type="text" name="link" value="<?php echo htmlentities($row_rsite['link'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap" class="tdh"><span class="tex">Language</span>:</td>
      <td><select name="language_id">
        <?php 
do {  
?>
        <option value="<?php echo $row_lang['language_id']?>" <?php if (!(strcmp($row_lang['language_id'], htmlentities($row_rsite['language_id'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_lang['language']?></option>
        <?php
} while ($row_lang = mysql_fetch_assoc($lang));
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" class="btn btn-primary" value="Save Changes" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="bid" value="<?php echo $row_rsite['bid']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsite);

mysql_free_result($lang);
?>
