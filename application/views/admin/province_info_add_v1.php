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
                    echo form_open_multipart(base_url().'admin/Province_info/add_province_info',$attributes);?>
  <table class="bordered">

                            
                      
                      <fieldset>
                            <label>Province:</label>							
                            <select name="province">
                                  <option value="Arozgan">Arozgan</option>
                                  <option value="Balkh">Balkh</option>
                                  <option value="Bamyan">Bamyan</option>
                                  <option value="Badghis">Badghis</option>
                                  <option value="Badakhshan">Badakhshan</option>
                                  <option value="Baghlan">Baghlan</option>
                                  <option value="Daikondi">Daikondi</option>
                                  <option value="Farah">Farah</option>
                                  <option value="Faryab">Faryab</option>
                                  <option value="Ghor">Ghor</option>
                                  <option value="Ghazni">Ghazni</option>
                                  <option value="Herat">Herat</option>
                                  <option value="Helmand">Helmand</option>
                                  <option value="Jozjan">Jozjan</option>
                                  <option value="Kabul">Kabul</option>
                                  <option value="Kapisa">Kapisa</option>
                                  <option value="Konar">Konar</option>
                                  <option value="Khost">Khost</option>
                                  <option value="Laghman">Laghman</option>
                                  <option value="Logar">Logar</option>
                                  <option value="Nangarhar">Nangarhar</option>
                                  <option value="Nimroz">Nimroz</option>
                                  <option value="Norostan">Norostan</option>
                                  <option value="Parwan">Parwan</option>
                                  <option value="Paktia">Paktia</option>
                                  <option value="Paktika">Paktika</option>
                                  <option value="Panjsher">Panjsher</option>
                                  <option value="Qandahar">Qandahar</option>
                                  <option value="Qondoz">Qondoz</option>
                                  <option value="Samangan">Samangan</option>
                                  <option value="Sarepol">Sarepol</option>
                                  <option value="Takhar">Takhar</option>
                                  <option value="Wardak">Wardak</option>
                                  <option value="Zabul">Zabul</option>      
                            </select>
                      </fieldset>











                      <fieldset>
                            <label>Language:</label>              
                            <select name="language">
                                  <option value="1">English</option>
                                  <option value="2">دری</option>
                                  <option value="3">پشتو</option>                            
                                  <option value="4">اوزبیکی</option>                            
                                  <option value="5">ترکمنی</option>                            
                                                             
                            </select>
                      </fieldset>
                      
                      
                      <fieldset>
                        <label>Publish Date</label>
                        <input type="text" name="t_start_date" placeholder="2021-01-28" id="t_start_date" value="<?php echo set_value('t_start_date'); ?>"  />
                         <br />
                        <?php echo form_error('t_start_date', '<span class="ferror">', '</span>'); ?>                  
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