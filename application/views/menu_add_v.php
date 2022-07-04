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
				<?PHP $this->load->view('admin_header') ?>
                <?PHP $this->load->view('admin_left') ?>
                <section id="main" class="column">
                <article class="module width_full">
				<header>
				  <h3>Add new Menue</h3></header>
					<div class="module_content">

						<?PHP
							echo form_open(base_url().'menu/create_menu');
							?>
                            <fieldset>
                            <label>
                            Menue Title
                            </label>
                            <?PHP echo form_input('item_title',set_value('item_title')); ?><br />
                            <?php echo form_error('item_title', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            
                            <fieldset>
                            <label>
                            Custom URL
                            </label>
                            <?PHP echo form_input('custom_url',set_value('custom_url')); ?><br />
                            <?php echo form_error('custom_url', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            <fieldset>
                            <label>
                            Parent
                            </label>
                           	<select name="parent_id" id="parent_id">
							<option value="0" selected="selected">Parent</option>
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
           					<?php   foreach ($langs as $l){ ?>
  							<option value="<?php echo $l->language_id; ?>"><?php echo $l->language; ?></option>
 						 	<?php } ?>
               				</select>
                            </fieldset>
                            <fieldset>								
                            &nbsp;&nbsp;
								<?PHP echo form_checkbox('visible',1);?><strong>Visible ?</strong>
                            </fieldset>
                            
                            <fieldset> 
                            <?PHP echo form_checkbox('d_page',1);?><strong>Dynamic Page: ?</strong>
                         <!--    <label></label> 
                           <span id="share">
							<input type="checkbox" name="dpage" value="1">
							</span><input type="text" id="c_url" name="c_url" size="40" style="display:none">-->
                            </fieldset>  
                            <fieldset>
                            <?PHP echo form_submit('submit','Save') ; ?>
                            </fieldset>
                          <?PHP echo form_close(); ?>
				</div>
                </article>		
           </section>
</div>
</body>
</html>
 