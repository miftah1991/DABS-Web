<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
	
	
	DABS | Welcome</title>
		
	
<link rel="icon" type="image/x-icon" href="https://main.dabs.af/img/log.ico">

	<link href='https://fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
     
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/app.css" />
	
 
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jssor.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style2.css">
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
      <!--   <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" />
        
    
        
       this is only to get classes in dream viewer -->
    <!--   <link rel="stylesheet" href="../../css/foundation.css" />
      <link rel="stylesheet" href="../../css/app.css" />  -->
<script src="<?php echo base_url(); ?>js/jssor.js"></script>

      <style>
#circlse
{
border-radius:50% 50% 50% 50%;  
width:120px;
height:120px;
}
body{
	overflow-x:hidden;
}
.dropdown.menu .is-dropdown-submenu-parent.is-right-arrow > a::after{
	border-style: none;
}
.dropdown.menu .submenu > li a {
    
    width: 200px;
}


		
		.dropdown.menu .submenu>li a:hover
		{
			color:white;
		}

	</style>


<?php

 if($this->session->userdata('languageid')!=1)
  {
  
  ?>
<style>
.menu>li:not(.menu-text)>a
		{
			font-size:16px !important;
		}
	
	</style>

  <?php }
  

  else 
  {
  ?>
  <style>
.menu>li:not(.menu-text)>a
		{
			font-size:11px !important;
		}
    </style>
  <?php } ?>

  </head>
  <body >
 <!---First Row ----------------------------------------------
<div class="large-8 medium-8 small-1 columns t-first-divs"> &nbsp; </div>
<div class="large-1 medium-1 small-4 columns t-first-divs">
  <form method="post" name="ChangeLanguage" action="<php echo base_url();?>home/set_lang">
  <select class="" id="chose-lan" name="lang" onChange="this.form.submit();">
    <!--<option>Select Language</option>--
    <php foreach($langs as $r){ ?>
    <option value="<php echo $r->language_id; ?>"<php if ($r->language_id == $this->session->userdata('languageid')) echo "selected='selected'";?>>
	<php echo $r->language; ?></option>
    <php } ?>
  </select></form>
</div>
<div class="large-3 medium-3 small-7 columns t-first-divs" id="search-form" >
  <form method="get" action="?php echo base_url(); ?>Search" name="Form1">
    <input type="text" id="search-box1" name="srch-box" />
    <input type="submit" id="search-btn"  value="" />
  </form>
</div>
-->
<div class="contain-to-grid" data-equalizer>
  <div class="large-1 medium-1 small-4 top-hedar-div columns " data-equalizer-watch style="padding-top:12px;">
  <?PHP echo form_open(base_url().'Home/set_lang'); ?>  
  <select class="" id="chose-lan" name="lang" onChange="this.form.submit();">
  <?php foreach($langs as $r){ ?><option value="<?php echo $r->language_id; ?>"<?php if ($r->language_id == $this->session->userdata('languageid')) echo "selected='selected'";?>><?php echo $r->language; ?></option><?php } ?></select><?PHP echo form_close(); ?>
  </div>
  <div class="large-2 medium-1 small-4 top-hedar-div columns" data-equalizer-watch style="padding-top:12px;">
  <form method="get" action="<?php echo base_url(); ?>Search" name="Form1"> 
    <input type="text" id="search-box1" name="srch-box" />
    <input type="submit" id="search-btn"  value="" />
  </form></div>
  <div class="large-7 medium-8  top-hedar-div columns text-center hide-for-small-only" data-equalizer-watch>
    <h1 id="wlc-msg" style="font-size:24px; padding-right:90px;">
    <?php foreach($dictionary as  $d){ echo $d->wlcom_msg; }?> </h1>
  </div>
  <div dir="rtl" class="large-2 medium-2 small-4 top-hedar-div columns" data-equalizer-watch><img  class="top-hedar-img" src="<?php echo base_url(); ?>images/dabs.png" alt="DABS" /><!--<img class="top-hedar-img" src="<?php echo base_url(); ?>images/logo.png" alt="Afghanistan"/> --></div>


</div>

<!---------- End of First row ----------------------------->
<!------------- top Menu  dd---------------------------------->

<div class="large-1 medium-1 small-1 top-menu columns"  style=" font-size:12px;"  id="crn-left"><img src="<?php echo base_url(); ?>images/left1.jpg" class="crn-img" alt="" ></div>
<div class="large-10 medium-10 small-10 top-menu columns" id="menu">
  <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title">Menu</div>
  </div>
  <div class="top-bar off-canvas-wrapper-inner" id="example-menu">
    <div class="top-bar-<?php echo $this->session->userdata('align'); ?>" style="direction:<?php echo $this->session->userdata('alignment'); ?>;">
    
    
    <?php echo $mrow; ?>
<!--      <ul class="dropdown menu vertical medium-horizontal" data-dropdown-menu id="menu_items">
        <!--<li class="menu-text">Site Title DABS</li>--
        <li><a href="#">Home</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Procurement</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">About us</a>
          <ul class="submenu menu" data-submenu>
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
          </ul>
        </li>
        <li><a href="#">Contact Us</a></li>
      </ul>-->
    </div>
    <!--<div class="top-bar-right">
      <ul class="menu">
      <input type="search" placeholder="Search"></li>
      <li><button type="button" class="button">Search</button></li> 
      </ul>
      </div>---> 
  </div>
</div>
</div>
<div class="large-1 medium-1 small-1 top-menu columns" id="crn-right"><img src="<?php echo base_url(); ?>images/right1.jpg" class="crn-img" alt="" ></div>
<!------------- End of top Menu  ddd----------------> 

   <script src="<?php echo base_url(); ?>js/vendor/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/what-input.min.js"></script>
    <script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
    <script src="<?php echo base_url(); ?>js/app.js"></script>
  
    
