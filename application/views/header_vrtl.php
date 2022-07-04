<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>National Stability Society</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>css/enapp1.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/app.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/social.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jssor.css" />

	
<link rel="stylesheet" href="<?php echo base_url(); ?>css/docs.css" />


    <script src="<?php echo base_url(); ?>js/jssor.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
<style type="text/css">
	.men{
		background:rgba(0, 0, 0, 0) url("<?php echo base_url(); ?>images/menu_back.gif" )repeat-x scroll 0 0;
		height:40px;

	}
	
	.dropdown.menu a{
		color:#ffffff;
		border-left: 1px solid #121230;
	
		
	}

	.dropdown a:hover{
	background: rgba(0, 0, 0, 0) url("<?php echo base_url(); ?>images/menu_hover.gif") repeat-x scroll 0 0;
    color: white;	
	}
	.dropdwon.menu ul li {
		background: #13123a none repeat scroll 0 0;
    color: #ffffff;
    padding-left: 7px;
    width: 247px;
	}
	.dropdown.menu .submenu{
		
		background-color:#2A5384;
		width:200px;
		
	}
	#menu_items>li>ul>li>a {
		width:200px;
		border-bottom:1px solid #CCC;
		font-size: 16px !important;
	}
	#menu_items>li>ul>li>a>strong:hover {
		color:#ffffff;
	}
	ul#menu_items>li>ul>li>a:hover{
		color:#ffffff;
	}
	.sbox{
		margin:3px;
		border:1px solid #E5E5E5;
		border-spacing:2px;
	}
	.pane-title {
    background-color: white;
    border-bottom: 3px solid #F28D16;
    /*color: #61a220;*/
	color:#F28D16;
    font-family: "Droid Sans",Arial,sans-serif;
    font-weight: normal;
    margin: 0.3em 0 0.5em;
    padding: 0.5em 0;
    text-align: center;
}
	.rpt a:hover{
		text-decoration:underline;
		color:red;
	}
	table tr td {
	background-color:#E0E1E6;
	
	}
	
</style>
  </head>
  <body>
  
  
  <div class="contain-to-grid" style="height:100px;background-image:url(<?php echo base_url(); ?>images/map.png); background-color:#B4E1F8;">
  
  <div class="large-3 columns" style="padding-left:3%;"><img src="<?php echo base_url(); ?>images/Untitled-1.png" style="width:100px; height:100px;"></div>
  <div class="large-6 columns" ><h3 style="padding-top:3%;"><a href="#" style="color:#0E0B34;">
  <?php foreach($dictionary as  $d){ echo $d->org_nam; }?></a></h3>
	</div>
  <div class="large-3 columns" style="font-size:12px;">
	<?php foreach($langs as $l){  ?>
		&nbsp;<a href="<?PHP echo base_url().'Home/set_lang/'.$l->language_id; ?>" style="color:#353535;"><?php echo $l->language; ?></a>&nbsp;&nbsp;
		<?php  }  ?>
	</div>
  </div>

<!--  Second ROW HEADER rgba(0, 0, 0, 0) url("../images/menu_back.gif") repeat-x scroll 0 0     -->         
<div class="contain-to-grid">
<div class="large-10 columns top-bar-left men">
<?php echo $mrow; ?></div>

<div class="large-2 columns top-bar-left men"  style=" height:40px; padding-top:5px; direction:ltr;">
<form method="get" action="<?php echo base_url(); ?>Search" name="Form1"> 
    <input type="text" id="search-box1" name="srch-box" />
    <input type="submit" id="search-btn"  value="" />
  </form></div>
</div>

<div style="background-color:#FAFAFA;">