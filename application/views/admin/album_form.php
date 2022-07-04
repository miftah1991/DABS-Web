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
</head>
<body>
	<div id="container">
		<?PHP $this->load->view('admin/admin_header') ?>
        <?PHP $this->load->view('admin/admin_left') ?>
      
          <section id="main" class="column">
			<article class="module width_full">
				<header><h3>Create New Album</h3></header>
					<div class="module_content">
		
                			<?php
								echo form_open(base_url()."admin/albums/add_album");
								?>
                                			<fieldset>
                                			<label>Language</label>
                                        	<select name="language_id">
                            <?php foreach($languages as $l) {?>
                            <option value="<?php echo $l->language_id; ?>"><?php echo $l->language; ?></option>
							<?php } ?>
                            </select>
                                            </fieldset>
                                            <fieldset>
                                            <label>Title</label>
                                        	
											<?PHP echo form_input("title",set_value("title")); ?>
                                        
                                            </fieldset>
                                            <fieldset>
                                        	<label>URL</label>
                                            
                                        	<?PHP echo form_input('custom_url',set_value('custom_url')) ?>
                                            
                                            </fieldset>
                                            <fieldset>
                           					<?PHP echo form_submit("submit","Create now") ?>
                                            </fieldset>
										 <?PHP
                                             echo validation_errors('<p class="error"></p>');
                                         ?>                                        
                          
                      <?PHP
							echo form_close();
						?>
                   </div>
              </article>
          </section>
	</div>
</body>
</html>
