<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Cache-control" content="no-store">

<link rel="icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?=base_url()?>css/layout.css" type="text/css" media="screen" />
	
                
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--> 
<title>DABS</title>
<script type="text/javascript">
/*
function $_(IDS) { return document.getElementById(IDS); }
function toggle(Info) {
  var CState = $_(Info);
  if (CState.style.display != "none") { CState.style.display = "none"; }
                                 else { CState.style.display = "inline"; }
}
function HideElem(IDS1, IDS2) {
 // toggle(IDS1);
  toggle(IDS2);
}

	function togTextBox(){
	var cbox=document.getElementById('dpage');
	var tbox=document.getElementById('c_url');
	if(tbox.style.visibility=='hidden'){
		//alert("Check Call");
		tbox.style.visibility=='visible';
	}else if(tbox.style.visibility=='visible') {
		alert("UNCheck Call");
		tbox.style.visibility=='hidden';
	}
	
	}
	*/
</script>
</head>
<body>
<!--<table width="100%" align="center"><tr>
<td width="10%"><img class="top-hedar-img" src="<?php echo base_url(); ?>images/dabs.png" alt="DABS" style="width:80px; height:80px; padding-left:3%;" /></td>
<td width="80%"><h2 align="center">Welcome to DABS Website Admin Panel </h2></td>
<td width="10%"><img class="top-hedar-img" src="<?php echo base_url(); ?>images/logo.png" style="width:80px; height:80px;" alt="Afghanistan"/></td>
</tr>
</table>-->
	<div id="container">
				<?PHP $this->load->view('admin/admin_header') ?>
                <?PHP $this->load->view('admin/admin_left') ?>
                <section id="main" class="column">
                <article class="module width_full">
				<header>
				  <h3>Add New Message.</h3></header>
					<div class="module_content">

						<?PHP
							echo form_open_multipart(base_url().'admin/Messages/add_message');
							?>
                            <fieldset>
                            <label>
                            Message Title
                            </label>
                            <?PHP echo form_input('m_title',set_value('m_title')); ?><br />
                            <?php echo form_error('m_title', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            <fieldset>
                            <label>
                            Message Text
                            </label>
                            <?PHP echo form_input('m_text',set_value('m_text')); ?><br />
                            <?php echo form_error('m_text', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            <fieldset>
                            <label>
                            IMAGE
                            </label>
                            <?PHP echo form_upload('userfile',set_value('userfile')); ?><br />
                           <span class="ferror"> <?php echo @$error; ?></span>
                            </fieldset>
                            <fieldset>
                            <label>
                            Language
                            </label>
                           	<select name="language_id">
                            <?php foreach($lng as $l) {?>
                            <option value="<?php echo $l->language_id; ?>"><?php echo $l->language; ?></option>
							<?php } ?>
                            </select>
                            </fieldset>
                            <fieldset>
                            <label>
                            Message Link
                            </label>
                            <?PHP echo form_input('m_link',set_value('m_link')); ?><br />
                            <?php echo form_error('m_link', '<span class="ferror">', '</span>'); ?>
               				</select>
                            </fieldset>
                            
                            <?PHP echo form_submit('submit','Save') ; ?>
                            </fieldset>
                          <?PHP echo form_close(); ?>
				</div>
                </article>		
           </section>
</div>
</body>
</html>
 