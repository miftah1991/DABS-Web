<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Cache-control" content="no-store">

<link rel="icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 

<script type="text/javascript" src="<?PHP echo base_url(); ?>js/jquery-1.6.1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
	});
	
	var another_image = function(){
		var hf = $("#hf").val();
		hf++;
		$("#hf").val(hf)
		var dv = "<div id='frmDiv" + hf + "'><br /><strong>Title : </strong><br /><input type='text' name='title"+ hf +"' id='title"+ hf +"' /><input type='file' name='image"+ hf +"' id='image"+ hf +"' /><input type=button value=Another onclick=another_image() /><br /><strong> Description :</strong><br /><textarea name='description1' id='description1' rows='3' cols='60'></textarea></div>";
		$("#frmDiv").append(dv);
	}
</script>
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
			<article class="module width_3_quarter">
				<header><h3>Add Images To Album</h3></header>
					<div class="module_content">
		
                		                                
							<?PHP
			echo form_open_multipart(base_url()."admin/images/add_images/".$this->uri->segment(4)."/".$this->uri->segment(5));
								?>
                                            <input type="hidden" name="hf" id="hf" value="1" />
                                            <div id="frmDiv">
                                            	<div id="frmDiv1">
                                            	<strong> Title : </strong>
												<br />
												<?PHP 
													$options = array(
														'name' => 'title1',
														'id' => 'title1'
													);
													echo form_input($options);
													
													$options = array(
														'name' => 'image1',
														'id' => 'image1'
													);
													echo form_upload($options);
													
													$options = array(
														'name' => 'another1',
														'id' => 'another1',
														'onclick' => 'another_image()'
													);
													
													echo form_button($options,"Another");
												?>
                                                <br /><strong> Description :</strong><br />
                                                <textarea name="description1" id="description1" rows="3" cols="60"></textarea>
                                                </div>
                                             </div>
                                            	<?PHP echo form_submit("submit","Upload now"); ?>
                                <?PHP
								echo form_close();
							?>
                         </div>
                     </article>
                </section>
</div>
</body>
</html>
