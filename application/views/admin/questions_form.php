<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Cache-control" content="no-store">

<link rel="icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 

<script type="text/javascript" src="<?PHP echo base_url(); ?>js/jquery-1.6.1.js"></script>
<script>
	$(document).ready(function(){
		
	});
	
	var another_image = function(){
		var hf = $("#hf").val();
		hf++;
		$("#hf").val(hf)
		var dv = "<div id='frmDiv'" + hf + ">Option "+ hf +" : <input type=text name='option"+ hf +"' id='option"+ hf +"' /><input type=button value=Another onclick=another_image() /></div>";
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
          <?PHP if($this->session->flashdata('msg')){ ?>
          	<h4 class="alert_success">
           		<?PHP 
					echo $this->session->flashdata('msg');
				?>
  			</h4>
           <?PHP } ?>
			<article class="module width_half">
				<header><h3>Create New Vote</h3></header>
					<div class="module_content">
						<?PHP
                        echo form_open("admin/questions/save_questions");
                        ?>
                            <table>
                                    	<tr>
                                        	<td>Language : 
                                            <select name="language_id" id="language_id">                 
           					<?php   foreach ($languages as $l){ ?>
  							<option value="<?php echo $l->language_id; ?>"><?php echo $l->language; ?></option>
 						 	<?php } ?>
               				</select>
                                            </td>
                                        </tr>
                                        
                                    	<tr>
                                        	<td>
                                            Question : <?PHP echo form_input(array(
																				'name'=>'question',
																				'id'=>'question',
																				'size'=>50,
																				),set_value('questions')); ?>
                                            </td>
                                        </tr>
                                        
                                    	<tr>
                                        	<td>
                                            	<input type="hidden" name="hf" id="hf" value="2" />
                                                    <div id="frmDiv">
                                                        <div id="frmDiv1">
                                                        Option 1 : <?PHP 
                                                            $options = array(
                                                                'name' => 'option1',
                                                                'id' => 'option1'
                                                            );
                                                            echo form_input($options,set_value('option1'));
                                                        ?>
                                                        </div>
                                                        
                                                        <div id="frmDiv1">
                                                        Option 2 : <?PHP 
                                                            $options = array(
                                                                'name' => 'option2',
                                                                'id' => 'option2'
                                                            );
                                                            echo form_input($options,set_value('option2'));
                                                            
                                                            $options = array(
                                                                'name' => 'another2',
                                                                'id' => 'another2',
                                                                'onclick' => 'another_image()'
                                                            );
                                                            
                                                            echo form_button($options,"Another");
                                                        ?>
                                                        </div>
                                                     </div>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td align="center">
                                            	<?PHP echo form_submit("submit","Save"); ?>
                                            </td>
                                        </tr>
                                    </table>
                                <?PHP
								echo form_close();
							?>
					 <?PHP
                         echo validation_errors('<p class="error"></p>');
                     ?>
			</div>
          </article>
    	</section>
</div>
</body>
</html>
