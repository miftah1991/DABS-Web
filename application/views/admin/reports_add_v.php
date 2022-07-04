<link href="../css/main.css" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<link href="../js/jquery.datepick.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="<?php echo base_url() ?>/js/tender/jquery.datepick.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/js/tender/jquery.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>css/layout.css" type="text/css" media="screen" /> 

    <script src="<?php echo base_url() ?>/js/tender/jquery.form.js">
    </script><script src="<?php echo base_url() ?>/js/tender/das.js"></script>
    

    
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
<title>REPORT Add</title>
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
				  <h3>ADD NEW Report</h3></header>
					<div class="module_content">

                    <?php
$attributes = array('id' => 'form1','name' =>'form1');

 echo form_open_multipart(base_url().'admin/reports/add_report',$attributes);?>


  <table class="bordered">
    <fieldset>
					 <label> Report Title:</label>
					  		<?PHP echo form_input('rtitle',set_value('rtitle')); ?><br />
                            <?php echo form_error('rtitle', '<span class="ferror">', '</span>'); ?>
                      </fieldset>
                            
                      
                       <fieldset>
                             <label>Report Type:</label>							
                            <select name="type">
                            <option value="Financial">Financial Reports</option>
							<option value="Functional">Functional Reports</option>
							<option value="ESMF">ESMF Reports</option>
								 <option value="casa-1000">CASA-1000 Reports</option>
                            </select>
                      </fieldset>
                      
                      <fieldset>
                        <label>Attach Files</label>
                        <input type="file" multiple name="files[]" id="multiplefiles"   />
                         <br />
                        <?php echo form_error('date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
                          
                      <fieldset>
                        <label>Report Publish Date</label>
                        <?PHP echo form_input('rpublish_date',set_value('rpublish_date')); ?> <br />
                        <?php echo form_error('rpublish_date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>  
                     
                    
                      
  
   <fieldset>
    REPORT Deatil
      <textarea name="rtext" cols="50" style="height:200px;" ><?php echo set_value('rtext'); ?></textarea>
    </fieldset>
    <fieldset>
    
      <input type="submit" class="btn btn-primary" value="SAVE REPORT" onClick="hid();"/>
       </fieldset>
  
  <input type="hidden" name="MM_insert" value="form1" />
  <?php echo form_close();?>
</div> 
                </article> 		
           </section> 
           


</html>