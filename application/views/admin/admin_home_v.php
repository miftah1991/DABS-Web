<!doctype html>
<html class="no-js">
      <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DABS | Welcome</title>     
      	<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
      	<link rel="stylesheet" href="<?php echo base_url(); ?>css/app.css" />
  		<link rel="stylesheet" href="<?php echo base_url(); ?>css/docs.css" />
       <link rel="stylesheet" href="<?php echo base_url()?>css/layout.css" type="text/css" media="screen" /> 
        <style type="text/css">
        .error{
			color:red;
		}
		.ico-img{
			width:150px; 
			height:120px;
			
		}
		.alert_error {
		display: block;
		width: 95%;
		margin: 20px 3% 0 3%;
		margin-top: 20px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		background: #F3D9D9 url(../images/icn_alert_error.png) no-repeat;
		background-position: 10px 10px;
		border: 1px solid #D20009;
		color: #7B040F;
		padding: 10px 0;
		text-indent: 40px;
		font-size: 14px;
		}
        </style>
               
 	 </head>
<body>
<div class="larg-12 medium-12 samll-12 column" data-equalizer id="top-logo-div">
<div class="large-2 medium-2 small-4 top-hedar-div columns" data-equalizer-watch><img class="top-hedar-img" src="<?php echo base_url(); ?>images/dabs.png" alt="DABS" /></div>
<div class="large-8 medium-8 small-4 top-hedar-div columns text-center" data-equalizer-watch><h4 id="wlc-msg">Welcome to DABS Website Admin Panel </h4></div>
<div dir="rtl" class="large-2 medium-2 small-4 top-hedar-div columns" data-equalizer-watch><img class="top-hedar-img" src="<?php echo base_url(); ?>images/logo.png" alt="Afghanistan"/></div>
</div>
<br><br><br><br><br>
		<?PHP if($this->session->flashdata("msg")!=""): ?>
                <h4 class="alert_error"><?PHP echo $this->session->flashdata("msg"); ?></h4>
            <?PHP endif; ?>
<!--   Content Start from Here                 -->
<?php foreach($usrdata as $u) { ?>
<table align="center">
<tr>
<td style="text-align:center;"><a href="<?php if($u->media ==1){ echo base_url().'admin/Media'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/media.jpg" class="ico-img"><br>Media Managment</a></td>

<td style="text-align:center;"><a href="<?php if($u->complaints ==1){ echo base_url().'admin/Complaints'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/complaint.jpg" class="ico-img"><br>Complaintss Managment</a></td>

<td style="text-align:center;"><a href="<?php if($u->menu ==1){ echo base_url().'admin/Menu'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/menu.jpg" class="ico-img"><br>Website Menus</a></td>


<td style="text-align:center;"><a href="<?php if($u->pages ==1){ echo base_url().'admin/Pages/list_pages'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/page.jpg" class="ico-img"><br>Pages</a></td>


</tr>
<tr>
<td style="text-align:center;"><a href="<?php if($u->jobs ==1){ echo base_url().'admin/Job/list_jobs'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/jobs.jpg" class="ico-img"><br>JOBS</a></td>

<td style="text-align:center;"><a href="<?php if($u->tenders ==1){ echo base_url().'admin/Tender/ListTenders'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/tenders.jpg" class="ico-img"><br>Procuremnet</a></td>


<td style="text-align:center;"><a href="<?php if($u->reports ==1){ echo base_url().'admin/Reports'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/report.png" class="ico-img"><br>Reports</a></td>


<td style="text-align:center;"><a href="<?php if($u->news ==1){ echo base_url().'admin/News'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/news.jpg" class="ico-img"><br>News</a></td>
</tr>

<tr>
<td style="text-align:center; "><a href="<?php if($u->slideshow ==1){ echo base_url().'admin/Slides'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/slides.jpg" class="ico-img"><br>Slides</a></td>

<td style="text-align:center; "><a href="<?php if($u->messages ==1){ echo base_url().'admin/Messages'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/messages.png" class="ico-img"><br>Messages</a></td>


<td style="text-align:center; "><a href="<?php if($u->gallery ==1){ echo base_url().'admin/Albums/list_album'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/gallery.png" class="ico-img"><br>Gallery</a></td>


<td style="text-align:center; "><a href="<?php if($u->magzine ==1){ echo base_url().'admin/Magzine'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/magzine.png" class="ico-img"><br>Magzines</a></td>
</tr>

<tr>

<td style="text-align:center; "><a href="<?php if($u->media==1){ echo base_url() ?><?php } else { echo "#" ;}?>"><img src="<?php echo base_url(); ?>images/comments.jpg" class="ico-img"><br>Comments</a></td>

<td style="text-align:center; "><a href="<?php if($u->media==1){ echo base_url() ?><?php } else { echo "#" ;}?>"><img src="<?php echo base_url(); ?>images/subcribes.jpg" class="ico-img"><br>Subcribes</a></td>


<td style="text-align:center; "><a href="<?php if($u->media==1){ echo base_url() ?><?php } else { echo "#" ;}?>"><img src="<?php echo base_url(); ?>images/votes.png" class="ico-img"><br>Vote</a></td>


<td style="text-align:center; "><a href="<?php if($u->media==1){ echo base_url() ?><?php } else { echo "#" ;}?>"><img src="<?php echo base_url(); ?>images/admin.jpg" class="ico-img"><br>Adminstration</a></td>
</tr>
<tr>
<td style="text-align:center;"><a href="<?php if($u->language ==1){ echo base_url().'admin/Language'; } else { echo "#"; }?>"><img src="<?php echo base_url(); ?>images/media.jpg" class="ico-img"><br>Languages</a></td>

</tr>
</table>
<?php } ?>




<!-------   Content End from Here                 -->
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
<script src="<?php echo base_url(); ?>js/docs.js"></script>
    
</body>
</html>