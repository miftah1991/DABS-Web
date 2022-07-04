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
</script>
<script type="text/javascript" >
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
<div id="container">
				<?PHP $this->load->view('admin/admin_header') ?>
                <?PHP $this->load->view('admin/admin_left') ?>
                <section id="main" class="column">
                <article class="module width_full">
				<header>
				  <h3>Edit Menue</h3></header>
					<div class="module_content">

						<?PHP foreach($mgz as $mr){
							echo form_open(base_url().'admin/Magzine/update_magzine');
							?>
                            <fieldset>
                            <label>
                            Magzine Title
                            </label>
                            <?PHP echo form_input('mg_title',$mr->mg_title,set_value('mg_title')); ?><br />
                            <?php echo form_error('mg_title', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            
                            <fieldset>
                            <label>
                            PUBLISH DATE
                            </label>
                            <?PHP echo form_input('mg_publish_date',$mr->mg_publish_date,set_value('mg_publish_date')); ?><br />
                            <?php echo form_error('mg_publish_date', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            
                            <fieldset>
                            <label>
                            URL
                            </label>
							<?PHP echo form_input('mg_url',$mr->mg_url,set_value('mg_url')); ?><br />
                            <?php echo form_error('mg_url', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            
                            <fieldset>
                            <label>
                            Image URL
                            </label>
							<?PHP echo form_input('mg_pic',$mr->mg_pic,set_value('mg_pic')); ?><br />
                            <?php echo form_error('mg_pic', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            
                            <fieldset>
                            <label>
                            Type
                            </label>
                            <select name="mg_type" id="mg_type">                 
           					<option value="<?php echo $mr->mg_type; ?>"><?php echo $mr->mg_type; ?> Magzine</option>
  							<option value="Online">Online Magzine</option>
  							<option value="Print">Print Magzine</option>
 						 	
               				</select>
                            </fieldset>
                            <fieldset>
                            <label>
                            Language
                            </label>
                            <select name="language_id" id="language_id"> 
                           <?php   foreach ($lng as $l){ ?>
  							<option value="<?php echo $l->language_id; ?>"><?php echo $l->language; ?></option>
 						 	<?php } ?>
               				</select>
                            </fieldset>
                            
                            
                            
                            <fieldset>
                            <input type="hidden" name="mg_id" id="mg_id" value="<?php echo $mr->mg_id; ?>" />
                            <?PHP echo form_submit('submit','Save') ; ?>
                            </fieldset>
                          <?PHP echo form_close(); } ?>
				</div>
                </article>		
           </section>
</div>
</body>
</html>
 