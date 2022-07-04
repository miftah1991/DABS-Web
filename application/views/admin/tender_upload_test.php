<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo base_url(); ?>admin/tender/AddTenderFile" method="post" id='frm_upld' enctype="multipart/form-data">
                    <span id='spn_inputs'> 
                        <input type="file" name="userfile[]" id="tex"><br />
                    </span>
                    <input type="submit"   value="Upload" class="btn btn-primary">
                </form>
</body>
</html>