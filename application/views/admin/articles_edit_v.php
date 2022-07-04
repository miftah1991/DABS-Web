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
	function hid(){
	

	form1.submit();
}
function Delete(){
	var select = document.getElementById('fil');
var options = select.options;
var selected = select.options[select.selectedIndex];
var file_name=selected.value;
 var file_name;
 
  var status = confirm("Are you sure you want to delete ?");  
  if(status){
 $.ajax({
   url:'delete.php',
   data:{v:file_name},
   method:'GET',
   success:function(response){
    if (response ==4)
    {
       alert('Deleted !!');
    }
   }
  });
	var x = document.getElementById("fil");
				x.remove(x.selectedIndex);
  
}
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ARTICLES Edit</title>
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
				  <h3>EDIT ARTICLES</h3></header>
					<div class="module_content">
	<?php  foreach($nws as $n) { ?>
<form action="<?php echo base_url(); ?>admin/articles/update_article" method="post" name="form1" id="form1">
  <table class="bordered">
                      <fieldset>
					       <label> Article Title:</label>
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
                        <label>Article Publish Date</label>
                        <?PHP echo form_input('date',$n->date,set_value('date')); ?> <br />
                        <?php echo form_error('date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>  
                     
                    
                      
   <!--<fieldset>
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
   </fieldset>
   -->
   <fieldset>
    Article Deatil
    <?PHP echo form_textarea('text',$n->text,set_value('text')); ?>
         <input type="hidden" name="nid" value="<?php echo $n->nid; ?>"  id="rid"/>

    </fieldset>
    <fieldset>
    
      <input type="button" class="btn btn-primary" value="SAVE Article" onClick="hid();"/>
       </fieldset>
  
  <input type="hidden" name="MM_insert" value="form1" />
</form>
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
                <form action="<?php echo base_url(); ?>admin/news/do_upload" method="post" id='frm_upld' enctype="multipart/form-data">
                    <span id='spn_inputs'> 
                        <input type="file" name="userfile[]" id="tex"><br />
                    </span>
                    <input type="submit"   value="Upload" class="btn btn-primary">
                </form>
                <?php } ?>
                <script>/* JS for Uploader */
                    (function() {

                        var bar = $('.bar');
                        var percent = $('.percent');
                        var status = $('#status');
						var fil=$('#fil');
						var dis=$('#display');

                        $('form').ajaxForm({
                            beforeSend: function() {
                                status.empty();
                                var percentVal = '0%';
                                bar.width(percentVal)
                                percent.html(percentVal);
                            },
                            uploadProgress: function(event, position, total, percentComplete) {
                                var percentVal = percentComplete + '%';
                                bar.width(percentVal)
                                percent.html(percentVal);

                            },
                            success: function() {
                                var percentVal = '100%';
                                bar.width(percentVal)
                                percent.html(percentVal);
                            },
                            complete: function(xhr) {
                               $("#fil").append(new Option(xhr.responseText,xhr.responseText));
								$("#frm_upld")[0].reset();
								percent.html(0);
								bar.width(0);
								dis.hide();
								
                            }
                        });
                    })();
                </script>
            </div>
</body>
</html>