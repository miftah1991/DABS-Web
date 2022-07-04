<!doctype html>
<html class="no-js">
      <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DABS | Welcome</title>     
      	<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
      	<link rel="stylesheet" href="<?php echo base_url(); ?>css/app.css" />
               
 	 </head>
<body>
<div class="larg-12 medium-12 samll-12 column" data-equalizer id="top-logo-div">
<div class="large-2 medium-2 small-4 top-hedar-div columns" data-equalizer-watch>
<img class="top-hedar-img" src="<?php echo base_url(); ?>images/dabs.png" alt="DABS" /></div>
<div class="large-8 medium-8 small-4 top-hedar-div columns text-center" data-equalizer-watch>
<h4 id="wlc-msg">Welcome to DABS Website Admin Panel </h4></div>
<div dir="rtl" class="large-2 medium-2 small-4 top-hedar-div columns" data-equalizer-watch>
<img class="top-hedar-img" src="<?php echo base_url(); ?>images/logo.png" alt="Afghanistan"/></div>
</div>



<div class="large-3 column">&nbsp;</div>
<div class="large-6 column">
<?php echo form_open('Login/UserSubmit');?>
<fieldset class="fieldset">
<legend>Login Admin</legend>
<div class="input-group"><span class="error"><?php echo @$erroMessage ?></span></div>
<div class="input-group"><span class="input-group-label">USERNAME:</span>
<input class="input-group-field" type="text" autocomplete="off" name="u_username">
<?php echo form_error('u_username',"<span class='error'>", "</span>"); ?></div>
<div class="input-group"><span class="input-group-label">PASSWORD:</span>
<input class="input-group-field" type="password" autocomplete="off" name="u_password">
<?php echo form_error('u_password',"<span class='error'>", "</span>"); ?></div>
<div class="input-group" style="text-align:center;"><?php echo $image; ?></div>
<div class="input-group"><span class="input-group-label">SECURITYCODE:</span>
<input class="input-group-field" type="text" id="captcha" name="captcha">
<?php echo form_error('captcha',"<span class='error'>", "</span>"); ?></div>

<input class="button" type="submit" name="submit" value="Login" style="background-color:#286090; color:#FFF; width:250px;">
</fieldset><?php echo form_close();?>
</div>
<div class="large-3 column">&nbsp;</div>



<div class="large-12 columns" style="background-color:#E0E1E6; text-align:center; bottom:0px; position:fixed;">
Powered By MIS Dept<br>
  Follow Me on
  <a href="#"><img src="<?php echo base_url() ?>images/fb.jpg" style="width:30px; height:25px;"></a>
  <a href="#"><img src="<?php echo base_url() ?>images/tw.jpg" style="width:30px; height:25px;"></a>
</div>

<script src="<?php echo base_url(); ?>js/vendor/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/vendor/what-input.min.js"></script>
<script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
<script src="<?php echo base_url(); ?>js/app.js"></script>
    
</body>
</html>