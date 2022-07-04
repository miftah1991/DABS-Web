<link href="../css/main.css" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<link href="../js/jquery.datepick.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="<?php echo base_url() ?>/js/tender/jquery.datepick.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/js/tender/jquery.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>css/layout.css" type="text/css" media="screen" /> 

    <script src="<?php echo base_url() ?>/js/tender/jquery.form.js">
    </script><script src="<?php echo base_url() ?>/js/tender/das.js"></script>
      <link href="<?php echo base_url() ?>js/jquery.datepick.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.datepick.js"></script>
    <style>
        /*
        * Code By Abhishek R. Kaushik
        * Downoaded fron http://devzone.co.in
        */
        /* CSS for Uploader */
        body { padding: 30px }
       
        .progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
        .bar { background-color: #66CCCC; width:0%; height:20px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #E6F7F7;}
        #anc_add_more{background-color: #66CCCC; color: #FFF;padding: 7px;text-decoration: none; }
        .dv_add{margin-bottom: 25px;}
    </style>

    <script>
        /* JS for Uploader */
        $(function() {
            /* Append More Input Files */
            $('#anc_add_more').click(function() {
                $('#spn_inputs').append('<input type="file" name="myfile[]"><br>');
            });
        });

    </script>
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
<script type="text/javascript" src="<?php echo base_url() ?>Editor/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "openmanager,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|,openmanager",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		
		//Open Manager Options
		file_browser_callback: "openmanager",
		open_manager_upload_path: '../../../../uploads/',

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
    });
    
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tender Add</title>
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
				  <h3>ADD NEW Tender</h3></header>
					<div class="module_content">
                    <?php
$attributes = array('id' => 'form1','name' =>'form1');

 echo form_open_multipart(base_url().'admin/tender/add_tender',$attributes);?>

  <table class="bordered">
    <fieldset>
					 <label> Contract REF No:</label>
					  		<?PHP echo form_input('t_specification_number',set_value('t_specification_number')); ?><br />
                            <?php echo form_error('t_specification_number', '<span class="ferror">', '</span>'); ?>
                      </fieldset>
                            
                      <fieldset>
                             <label> Description:</label>
							 <?PHP echo form_input('t_title',set_value('t_title')); ?><br />
                            <?php echo form_error('t_title', '<span class="ferror">', '</span>'); ?>
                      </fieldset>
                       <fieldset>
                             <label>Category:</label>							
                            <select name="t_category">
                            <option value="Distribution">Distribution</option>
							<option value="Purchase">Purchase</option>
                            <option value="Goods">Goods</option>
                            <option value="Civil">Civil</option>
                            <option value="Service">Service</option>
                            <option value="Substation">Substation</option>
                            <option value="Construction">Construction</option>
							<option value="Contract Award">Contract Award </option>
							<option value=" Renewable Energy and Financial services"> Renewable Energy and Financial services</option>
                            </select>
                      </fieldset>
                   
                     <fieldset>
                        <label>Funded BY</label>
                        <?PHP echo form_input('location',set_value('location')); ?> <br />
                        <?php echo form_error('location', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
                          
                      <fieldset>
                        <label>Publish Date</label>
                        <input type="text" name="t_start_date" id="t_start_date" value="<?php echo set_value('t_start_date'); ?>" readonly  />
                         <br />
                        <?php echo form_error('t_start_date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>  
                     <fieldset>
                        <label>Expire Date</label>
                        
                      <input type="text" name="t_end_date" id="t_end_date" value="<?php echo set_value('t_end_date'); ?>" readonly  /> <br />
                            <?php echo form_error('t_end_date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
                    
                      <fieldset>
                        <label>Contact Person Name</label>
                        <?PHP echo form_input('t_contact',set_value('t_contact')); ?> <br />
                            <?php echo form_error('t_contact', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
                     <fieldset>
                        <label>Contact Person Phone</label>
                        <?PHP echo form_input('t_contact_phone',set_value('t_contact_phone')); ?> <br />
                            <?php echo form_error('t_contact_phone', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
                     <fieldset>
                        <label>Contact Person Email</label>
                        <?PHP echo form_input('t_contact_email',set_value('t_contact_email')); ?> <br />
                            <?php echo form_error('t_contact_email', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
                     <fieldset>
                        <label>Attach Files</label>
                        <input type="file" multiple name="files[]" id="multiplefiles"   />
                         <br />
                        <?php echo form_error('date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
    Tender Deatil
      <textarea name="t_detail" cols="50" style="height:200px;" ><?php echo set_value('t_detail'); ?></textarea>
    </fieldset>
    <fieldset>
    
      <input type="submit" class="btn btn-primary" value="Save Tender"/>
       </fieldset>
  
  <input type="hidden" name="MM_insert" value="form1" />
  <?php echo form_close();?>
</div> 
                </article> 		
           </section> 
           
</div> 
<div style="display:none; border:1 solid #00F; position:fixed; top:20%; left:25%; background-color:#D4E5EE;" id="display">
<!-- <div class="dv_add"><a href="javascript:void(0);" id="anc_add_more">Add More File</a></div> -->
                <div class="progress">
                    <div class="bar"></div >
                    <div class="percent">0%</div >
                </div>    
                <div id="status"></div>
                
            

            </div>
</body>
</html>