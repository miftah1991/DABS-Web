<link href="../css/main.css" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<link href="../js/jquery.datepick.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="<?php echo base_url() ?>/js/tender/jquery.datepick.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/js/tender/jquery.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>css/layout.css" type="text/css" media="screen" /> 

    <script src="<?php echo base_url() ?>/js/tender/jquery.form.js">
    </script><script src="<?php echo base_url() ?>/js/tender/das.js"></script>
    <style>
        /*
        * Code By Abhishek R. Kaushik
        * Downoaded fron http://devzone.co.in
        */
        /* CSS for Uploader */
        
       
        .progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
        .bar { background-color: #66CCCC; width:0%; height:20px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #E6F7F7;}
        #anc_add_more{background-color: #66CCCC; color: #FFF;padding: 7px;text-decoration: none; }
        .dv_add{margin-bottom: 25px;}
    </style>


<script type="text/javascript">
$(function() {
	$('#t_start_date').datepick();
	
});
</script>
<script type="text/javascript">
$(function() {
	$('#t_end_date').datepick();
	
});
</script>
<script src='<?= base_url() ?>Editor/tinymce/tinymce.min.js'></script>
	
		<script>
			tinymce.init({ 
				selector:'.txt',
				theme: 'modern',
				height: 200,
				paste_as_text: true
			});
			
		</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NEWS Edit</title>
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
				  <h3>EDIT NEWS</h3></header>
					<div class="module_content">
	<?php  foreach($nws as $n) { ?>
<?php
$attributes = array('id' => 'form1','name' =>'form1');

 echo form_open_multipart(base_url().'admin/news/update_news',$attributes);?>
  <table class="bordered">
                      <fieldset>
					       <label> News Title:</label>
					  		<?PHP echo form_input('subtitle',$n->subtitle,set_value('subtitle')); ?><br />
                            <?php echo form_error('subtitle', '<span class="ferror">', '</span>'); ?>
                      </fieldset>
                            
                      
                       <fieldset>
                             <label>Language:</label>							
                            <select name="language_id">
                            <option value="<?php echo $n->language_id ?>"><?php if($n->language_id== 2)echo "دری";
							                                                     elseif($n->language_id== 3) echo "پشتو";
																				 else echo "English"; ?></option>
                         <?php foreach($lng as $l) {?>
                            <option value="<?php echo $l->language_id; ?>"><?php echo $l->language; ?></option>
							<?php } ?>
                            </select>
                      </fieldset>
                      
                           
                      <fieldset>
                        <label>Attach Files</label>
                        <input type="hidden" name="image" value="<?php echo $n->image; ?>"  id="image"/>

                        <input type="file"  name="userfile[]"   />
                         <br />
                        <?php echo form_error('date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
                          
                      <fieldset>
                        <label>News Publish Date</label>
                        <?PHP echo form_input('date',$n->date,set_value('date')); ?> <br />
                        <?php echo form_error('date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>  
                     
                  
                      
   <!-- <fieldset>
      <input type="hidden" name="project_report" value=""  id="files"/>
      <input name="file" type="button" class="btn btn-primary" id="file"  onclick="document.getElementById('display').style.display='block'" value="Add Files"/>
    
      <select name="ss" size="1" multiple="multiple" id="fil" style="width:390px; height:120px" >
      <?php $file_rec=$n->image;
		  $file_array=explode(',',$file_rec);
		  foreach($file_array as $val){
			  $file=$val; 
			  if($file){
		?>
        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
		<?php } } ?>
      </select>
      <input type="button" class="btn btn-primary" value="Delete" onClick="Delete()" />
   </fieldset> -->
   <fieldset>
    News Deatil
   
	<textarea rows="30" cols="50" class="txt" name="text" style="width:1100px; height:120px" >
	<?PHP echo $n->text; ?>
</textarea>
         <input type="hidden" name="nid" value="<?php echo $n->nid; ?>"  id="rid"/>

    </fieldset>
    <fieldset>
    
      <input type="submit" class="btn btn-primary" value="SAVE NEWS" />
       </fieldset>
  
  <?php echo form_close();?>
</div> 
                </article> 		
           </section> 
           

<div style="display:none; border:1 solid #00F; position:fixed; top:20%; left:25%; background-color:#D4E5EE;" id="display">
<!-- <div class="dv_add"><a href="javascript:void(0);" id="anc_add_more">Add More File</a></div> -->
                <div class="progress">
                    <div class="bar"></div >
                    <div class="percent">0%</div >
                </div>    
                <div id="status"></div>
                
                <?php } ?>
              
            </div>
</body>
</html>