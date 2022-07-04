<link href="../css/main.css" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<link href="../js/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url() ?>/js/tender/jquery.datepick.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/js/tender/jquery.js"></script>
<link rel="stylesheet" href="<?=base_url()?>css/layout.css" type="text/css" media="screen" /> 
<script src="<?php echo base_url() ?>/js/tender/jquery.form.js">
<link href="<?php echo base_url() ?>js/jquery.datepick.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() {
	$('#date').datepick();
	
});
</script>


	


		

	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News Add</title>
<style type="text/css">
input[type="text"]{
	height:25px;
}
textarea{
	height:50px;
}
</style>
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
				<header>
				  <h3>ADD NEWS</h3></header>
					<div class="module_content">

<?php
$attributes = array('id' => 'form1','name' =>'form1');

 echo form_open_multipart(base_url().'admin/news/add_news',$attributes);?>
  <table class="bordered">
    <fieldset>
					 <label> News Title:</label>
					  		<?PHP echo form_input('subtitle',set_value('subtitle')); ?><br />
                            <?php echo form_error('subtitle', '<span class="ferror">', '</span>'); ?>
                      </fieldset>
                            
                      
                       <fieldset>
                             <label>Language:</label>							
                            <select name="language_id">
                            <?php foreach($lng as $l) {?>
                            <option value="<?php echo $l->language_id; ?>"><?php echo $l->language; ?></option>
							<?php } ?>
                            </select>
                      </fieldset>
                      
					<fieldset>
                        <label>News Publish Date</label>
                        <input type="text" autocomplete="off" name="date" id="date" value="<?php echo set_value('date'); ?>"  />
                         <br />
                        <?php echo form_error('date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
                          
                      <fieldset>
                        <label>Attach Files</label>
                        <input type="file"  name="userfile[]"   />
                         <br />
                        <?php echo form_error('date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
	 
                        
				   <fieldset>
					REPORT Deatil
					  <textarea name="text"  class="txt" cols="50" style="height:200px;"  ><?php echo set_value('text'); ?></textarea>
					</fieldset>
    <fieldset>
    
      <input type="submit" class="btn btn-primary" value="SAVE NEWS" />
       </fieldset>
  
  
<?php echo form_close();?>
</div> 
                </article> 		
           </section> 
           



</body>
</html>