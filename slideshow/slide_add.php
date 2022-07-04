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
$lang_query=mysql_query("select * from lng_tbl");
if(isset($_POST['btn'])){
	$title=sec($_POST['item_title'],"text");
	$image=sec($_POST['ss'],"text");
	$page=sec($_POST['page'],"text");
	$language_id=sec($_POST['language_id'],"int");
$insert=sprintf("insert into `sld_shw_tbl` values(null,%s,%s,%s,%s)",$image,$title,$page,$language_id);
$insert_item=mysql_query($insert) or die('Welcome to DABS Website');
	
if($insert_item){
	header('location:slideshow.php');
	}else{echo "";}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- Bootstrap core CSS -->
    <link href="style/bootstrap.css" rel="stylesheet">
  <script type="text/javascript" src="jquery.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/table.css" />
<title>DABS</title>

<script type="text/javascript">
function openWindow() { 
  window.open("popup.php","_blank","height=200,width=400, status=yes,toolbar=no,menubar=no,location=no"); 
} 

</script>

</head>
<body>
<form action="" method="post" name="form" >
  <table border="1" align="left" cellpadding="0" cellspacing="0" class="bordered">
<tbody>
<tr class="table_head" style="background-color:#D1E4EE;"><td  colspan="3">
<div align="left">
<strong>
Adding Slide Show Item</strong></div></td></tr>
            <tr>
              <td colspan="3"><span  style="font-size:15px;color:red;">Filed Marked with * are Required Fields</span></td>
            </tr>
            <tr>
              <td>Item Title</td>
              <td colspan="2"><textarea name="item_title" id="item_title" required="required"></textarea><font color="red"> * </font><br></td>
            </tr>
            <tr>
              <td>Image:</td>
              <td colspan="2"><font color="red"> 
   
     <input type="button" value="Add Image" class="btn btn-primary" onclick="openWindow();">
 
              * </font> <br /></td>
            </tr>
            <tr>
              <td>Image:</td>
              <td colspan="2"><label for="ss"></label>
              <textarea name="ss" id="ss"></textarea></td>
            </tr>
            <tr>
              <td colspan="3"><p>Note:</p>
              <font color="red">.For Home Page the Picture size should be 700*250px</font><br />
              <font color="red">.For Sub page Picture size should be 940*250 px</font>
              </td>
            </tr>
            <tr>
              <td>Page:</td>
              <td colspan="2"><select name="page" id="page">
                <option value="home">Home Page</option>
                <option value="sub">Sub Page</option>
              </select></td>
            </tr>
            <tr>
              <td>Language:</td>
              <td colspan="2"><select name="language_id" id="language_id" style="height:25px;">
                <?php   while ($row_lang = mysql_fetch_assoc($lang_query)){  
?>
                <option value="<?php echo $row_lang['language_id']?>"><?php echo $row_lang['language']?></option>
                <?php
} 
  
?>
              </select></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit"  class="btn btn-medium btn-primary"  value="Add Item" name="btn"/></td>
              <td><input type="reset"  class="btn btn-medium btn-primary" value="Clear Form" /></td>
            </tr>

  </tbody></table>
        </form>
</body>
</html>