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
                <?PHP if($this->session->flashdata('msg')!=""): ?>
        <?PHP		
			if($this->session->flashdata('msg')=="Already exists." || $this->session->flashdata('msg')=="Not part of menu.")
			{
				$class = 'class="alert_warning"';
			}
			else
			{
				$class = 'class="alert_success"';
			}
		?>
	        <h4 <?=$class?>>
           		<?PHP 
					echo $this->session->flashdata('msg');
				?>
  			</h4>
		<?PHP endif; ?>
                <article class="module width_full">
				<header><h3>Add new language</h3></header>
					<div class="module_content">

						<?PHP
							echo form_open(base_url().'admin/language/new_language');
							?>
                            <fieldset>
                            <label>
                            Language
                            </label>
                            <?PHP echo form_input('language',set_value('language')); ?><br />
                            <?php echo form_error('language', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            
                            <fieldset>
                            <label>
                            Code
                            </label>
                            <?PHP echo form_input('code',set_value('code')); ?><br />
                            <?php echo form_error('code', '<span class="ferror">', '</span>'); ?>
                            </fieldset>
                            <fieldset>
                            <label>
                            Align
                            </label>
                            <?PHP $options = array('Left'=>'Left','Right'=>'Right');
									echo form_dropdown('align',$options,set_value('align'));
									?>
                            </fieldset>
                            <fieldset>
                            <label>
                            Alignment
                            </label>
                            <?PHP $options = array('rtl'=>'Right to Left','ltr'=>'Left to Right');
									echo form_dropdown('alignment',$options,set_value('alignment'));
									?>
                            </fieldset>
                            <fieldset>								
                            &nbsp;&nbsp;
								<?PHP echo form_checkbox('visible',1);?><strong>Visible ?</strong>
                            </fieldset>
                            <fieldset>								
                            &nbsp;&nbsp;
								<?PHP echo form_checkbox('default_language',1);?><strong>Default Language ?</strong>
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
 