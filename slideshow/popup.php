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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<head>

   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Max's AJAX File Uploader</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript">
   var xmlhttp_div;

function showdiv(strDiv)
{

xmlhttp_div=GetXmlHttpObject_div();
if (xmlhttp_div==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="upload.php";
url=url+"?v="+strDiv.replace("C:\\fakepath\\","");
url=url+"&sid="+Math.random();
xmlhttp_div.onreadystatechange=stateChanged_div;
xmlhttp_div.open("GET",url,true);
xmlhttp_div.send(null);
}

function stateChanged_div()
{
	if (xmlhttp_div.readyState==4)
	{
	//document.getElementById("selectt").innerHTML+=xmlhttp_div.responseText;
	 window.opener.document.getElementById('ss').innerHTML=xmlhttp_div.responseText;
  		window.close();
	}
}

function GetXmlHttpObject_div()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}
   
   </script>
</script>
   
<script language="javascript" type="text/javascript">

<!--
function startUpload(){
      document.getElementById('f1_upload_process').style.visibility = 'visible';
      document.getElementById('f1_upload_form').style.visibility = 'hidden';
      return true;
}
function stopUpload(success){
      var result = '';
      if (success==1){
         result = '<span class="msg">The file was uploaded successfully!<\/span><br/><br/>';
      }
      else {
         result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
      }
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
      document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
      document.getElementById('f1_upload_form').style.visibility = 'visible';      
      return true;   
}
//-->

</script>   
</head>

<body>

<p id="response"></p>
       <div id="container">
            <div id="header"><div id="header_left"></div>
            <div id="header_main">File Uploader</div><div id="header_right"></div></div>
            <div id="content">
       <form action="upload.php" method="post" enctype="multipart/form-data" target="upload_target" name="form1" id="form1" onsubmit="showdiv(myfile.value)" >
                     <p id="f1_upload_process">Loading...<br/><img src="loader.gif" /><br/></p>
                     <p id="f1_upload_form" align="center"><br/>
                         <label>File:  
                              <input name="myfile" id="myfile" type="file" size="30" required/>
                         </label>
                         <label>
          <input type="submit" name="submitBtn" class="sbtn" id="submitBtn" value="Upload" />
                         </label>
                     </p>
                     
           <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
           </form>
           
          <!--  <label for="select"></label>
            <select name="selectt" id="selectt">
			</select>
           
       Custom Number<input type="text" name="custom_nume" /><br />
       Name:<input type="text" name="jaldsj" />
       -->
       
         </div>
            
         </div>
              
</body>   