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
<title><?=$this->config->item('site_title')?></title>
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

						<?PHP foreach($mrec as $mr){
							echo form_open(base_url().'admin/menu/update_menu');
							?>
                            <fieldset>
                            <label>
                            Menue Title
                            </label>
                            <?PHP echo form_input('item_title',$mr->title,set_value('item_title')); ?><br />
                            <?php echo form_error('item_title', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            
                            <fieldset>
                            <label>
                            Custom URL
                            </label>
							<input type="text" name="custom_url" value="<?php echo $mr->custom_url; ?>" />
                           
                            <?php echo form_error('custom_url', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            <fieldset>
                            <label>
                            Parent
                            </label>
                           	<select name="parent_id" id="parent_id">
                            <option value="<?php echo $mr->parent_id;?>" selected="selected"><?php echo $mr->parent;?></option>
							<option value="0">Parent</option>
                            <?php foreach($parents as $p){ ?>
                            <option value="<?php echo $p->item_id; ?>"><?php echo $p->item_title; ?></option>
                            <?php } ?>
                            </select>
                            </fieldset>
                            <fieldset>
                            <label>
                            Language
                            </label>
                            <select name="language_id" id="language_id"> 
                            <option value="<?php echo $mr->language_id; ?>" selected="selected"><?php echo $mr->language; ?></option>                
           					<?php   foreach ($langs as $l){ ?>
  							<option value="<?php echo $l->language_id; ?>"><?php echo $l->language; ?></option>
 						 	<?php } ?>
               				</select>
                            </fieldset>
                            <fieldset>
                            <label>
                            SWAP Menu
                            </label>
                            <select name="swap" id="swap"> 
                            <option value="0"> Select an Option</option>               
           					<?php   foreach ($mparent as $mp){ ?>
  							<option value="<?php echo $mp->item_id; ?>"><?php echo $mp->item_title; ?></option>
 						 	<?php } ?>
               				</select>
                            </fieldset>
                            <fieldset>								
                            &nbsp;&nbsp;
								<?PHP echo form_checkbox('visible',1,$mr->visible);?><strong>Visible ?</strong>
                            </fieldset>
                            
                            <fieldset> 
                            <label><strong>Page Type: </strong></label><br/>
							<select name="d_page" >
							<option value="0">Page</option>
							<option value="1">Dynamic Page</option>
							</select>
                            </fieldset>
                            <fieldset>
                            <input type="hidden" name="order_num" value="<?php echo $mr->order_number; ?>" />
                            <input type="hidden" name="item_id" id="item_id" value="<?php echo $mr->id; ?>" />
                            <?PHP echo form_submit('submit','Save') ; ?>
                            </fieldset>
                          <?PHP echo form_close(); } ?>
				</div>
                </article>		
           </section>
</div>
</body>
</html>
 