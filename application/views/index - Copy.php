<!doctype html>
<html class="no-js">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="Description" CONTENT="Author: DABS, Category: Power Electricity,">
<meta name="keywords" content="Afghanistan, Afghanistan Breshna, Breshna Sherkat, Power Utility in Afghanistan, Da Afghanistan Breshna Sherkat, Afghanistan Breshna Sherkat, Electricity in Afghanistan, Afghanistan Power Utitlity, DABS, Afghanistan, Power">
<title lang="en-us">DABS Da Afghanistan Breshna Sherkat</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/app.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/footer.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jssor.css" />
<script src="<?php echo base_url(); ?>js/jssor.js"></script>
<style>
#slideshow {
	position: relative;
}
body {
	overflow-x: hidden;
}
.dropdown.menu .is-dropdown-submenu-parent.is-right-arrow > a::after {
	border-style: none;
}
.dropdown.menu .submenu > li a {
	width: 200px;
}
.lat-nws-img {
	width: 500px;
	height: 200px;
}
#ceo-pic {
	width: 160px;
	height: 174px;
	padding: 5px;
}
</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74357288-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="<?php echo base_url(); ?>js/jquery.txt"></script>
<script type="text/javascript">
$(document).ready(function(){ 
$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(0)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  3000);

});
</script>
</head>
<body >
<!---First Row ---------------------------------------------
<div class="large-8 medium-8 small-1 columns t-first-divs"> &nbsp; </div>
<div class="large-1 medium-1 small-4 columns t-first-divs">
 <?PHP echo form_open(base_url().'Home/set_lang'); ?>  
  <select class="" id="chose-lan" name="lang" onChange="this.form.submit();">
    
    <?php foreach($langs as $r){ ?>
    <option value="<?php echo $r->language_id; ?>"<?php if ($r->language_id == $this->session->userdata('languageid')) echo "selected='selected'";?>>
	<?php echo $r->language; ?></option>
    <?php } ?>
  </select><?PHP echo form_close(); ?>
</div>
<div class="large-3 medium-3 small-7 columns t-first-divs" id="search-form" >
  <form method="get" action="<?php echo base_url(); ?>Search" name="Form1"> 
    <input type="text" id="search-box1" name="srch-box" />
    <input type="submit" id="search-btn"  value="" />
  </form>
</div>
-->
<div class="contain-to-grid" data-equalizer>
  <div class="large-1 medium-1 small-4 top-hedar-div columns " style="padding-top:12px;" data-equalizer-watch>
  <?PHP echo form_open(base_url().'Home/set_lang'); ?>  
  <select class="" id="chose-lan" name="lang" onChange="this.form.submit();">
  <?php foreach($langs as $r){ ?><option value="<?php echo $r->language_id; ?>"<?php if ($r->language_id == $this->session->userdata('languageid')) echo "selected='selected'";?>><?php echo $r->language; ?></option><?php } ?></select><?PHP echo form_close(); ?>
  </div>
  <div class="large-2 medium-1 small-4 top-hedar-div columns" data-equalizer-watch style="padding-top:12px;">
  <form method="get" action="<?php echo base_url(); ?>Search" name="Form1"> 
    <input type="text" id="search-box1" name="srch-box" />
    <input type="submit" id="search-btn"  value="" />
  </form></div>
  <div class="large-7 medium-8 top-hedar-div columns text-center hide-for-small-only" data-equalizer-watch>
    <h1 id="wlc-msg" style="">
    <?php foreach($dictionary as  $d){ echo $d->wlcom_msg; }?> </h1>
  </div>
  <div dir="rtl" class="large-2 medium-2 small-4 top-hedar-div columns" data-equalizer-watch><img  class="top-hedar-img" src="<?php echo base_url(); ?>images/dabs.png" alt="DABS" /><!--<img class="top-hedar-img" src="<?php echo base_url(); ?>images/logo.png" alt="Afghanistan"/> --></div>


</div>
<!---------- End of First row ----------------------------->
<!------------- top Menu ---------------------------------->

<div class="large-1 medium-1 small-1 top-menu columns" id="crn-left"><img src="<?php echo base_url(); ?>images/left1.jpg" class="crn-img" alt="Left" ></div>
<div class="large-10 medium-10 small-10 top-menu columns" id="menu">
  <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title">Menu</div>
  </div>
  <div class="top-bar off-canvas-wrapper-inner" id="example-menu">
    <div class="top-bar-left">
    
    
    <?php echo $mrow; ?>

    </div>
    
  </div>
</div>
</div>
<div class="large-1 medium-1 small-1 top-menu columns" id="crn-right"><img src="<?php echo base_url(); ?>images/right1.jpg" class="crn-img" alt="Right" ></div>
<!------------- End of top Menu ----------------> 
<!-------------- Start of 3rd Rows Slid Showe                    -->
<div class="callout large-12 small-12 columns" id="docs" style="padding:0px; border: solid 1px #740000;">



<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 400px; overflow: hidden; visibility: hidden;">
<!-- Loading Screen -->
<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
<div style="position:absolute;display:block;background:url('<?php echo base_url() ?>images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
</div>
<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 400px; overflow: hidden;">
<?php foreach($slides as $s) {?>
<div data-p="225.00" style="display: none;">
<img data-u="image" src="<?php echo base_url() ?>uploads/slides/<?php echo $s->image; ?>" alt="Slide"/>
<div style="position: absolute; text-align:center; top: 330px; left: 0px; width: 100%; height: 30px; font-size: 15px; color: #ffffff; line-height: 38px; background-color:rgba(255, 102, 0, 0.3);">
<p style="margin-top:3px;"><?php echo $s->text; ?></p></div>
</div>
<?php } ?>

</div>
<!-- Bullet Navigator -->
<div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
<!-- bullet navigator item prototype -->
<div data-u="prototype" style="width:16px;height:16px;"></div>
</div>
<!-- Arrow Navigator -->
<span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
<span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
</div>
<script>
jssor_1_slider_init();
</script>

</div>

 <div class="row" style="margin-bottom: 17px;">
    <div class="large-3 medium-4 columns" style="min-height: 42px; color: white; background-color:#740000; text-align: right; ">
	<?php foreach($dictionary as  $d){ ?>
	<p style="margin: 7px; padding-top:2px;"><?php echo $d->latest_news; }?></p>
    </div>
    <div class="large-9 medium-8 columns" style="min-height: 42px; color: white; background-color:rgba(255, 102, 0,1);">
      <ul class="typing" style="margin: 7px; display:none !important;">
        	<li><?php echo $n1->subtitle; ?></li>
			<?php foreach($news2 as $n2){ ?>
            <li><?php echo $n2->subtitle ?></li>
            <?php } ?>
			
        </ul>
    </div>
  </div>



<!------------- Latest News  ------------------->
<div class="row" data-equalizer>
<div style="background-color:white; " class="medium-7 large-7 columns cl" data-equalizer-watch>

           <div class="large-12 medium-12 columns text-left"><?php foreach($news1 as $n1) ?>
            <h6><strong><?php echo $n1->subtitle; ?></strong></h6>
           </div> 
           
           <div class="large-6 medium-8 columns">
            <?php $file_rec=$n1->image;
		 if($file_rec!=''){
		  $file_array=explode(',',$file_rec);
		  $i=1;
		  foreach($file_array as $val){
			  if($i==1){
			  $file=$val; ?>
		 <img src="<?php echo base_url(); ?>uploads/news/<?php  echo $file; ?>" class="lat-nws-img"  />
			
		<?php } $i++;  } }?>
           
           </div> 
     
          <div class="large-6 medium-4 columns font13 just_class" style="font-size:14px; word-spacing:1px;">
            <p style="line-height:35px;"><?php echo substr($n1->text,0,480); ?>....
            <a href="<?php echo base_url() ?>News/NewsDetail/<?php echo $n1->nid; ?>"><?php foreach($dictionary as  $d){ echo $d->read_more; }?></a>
            </p>
          </div>
</div>
<!------------- End of Latest News ------------->

<!------------- CEO Massage -------------------->
<div style="background-color:white; " class="medium-5 large-5 columns cl font13" data-equalizer-watch>
    	
        <div class="large-12 medium-12 columns text-left">
            <h6><strong><?php foreach($dictionary as  $d){ echo $d->ceo_msg; }?></strong></h6>
       </div>
     <div class="large-12 medium-12 columns text-left font13 just_class" style="line-height:23px; font-size:14px; word-spacing:1px;">
     <img src="<?php echo base_url(); ?>images/bbbo.jpg" style="float:left; margin:2px;" id="ceo-pic" alt="CEO">        
            <?php foreach($dictionary as  $d){ echo substr($d->ceo_msg_txt,0,588); }?>
            <a href="<?php echo base_url() ?>CeoMessage/">.....<?php foreach($dictionary as  $d){ echo $d->read_more; }?></a></div>
            </div>






</div>
<!------------- End of 2 row ------------->
<!------------- Start of 3 row ------------->
<div class="row" data-equalizer style="margin-bottom: 10px;">

<div class="large-12 columns space_bar">&nbsp;</div>

</div>

<div class="row" data-equalizer>
			
           <?php foreach($news2 as $n2){ ?>
            <div class="callout large-3 columns" style="height:450px;" >
            <div>
             <?php $file_rec=$n2->image;
		 if($file_rec!=''){
		  $file_array=explode(',',$file_rec);
		  $i=1;
		  foreach($file_array as $val){
			  if($i==1){
			  $file=$val; ?>
	 	<img src="<?php echo base_url(); ?>uploads/news/<?php  echo $file; ?>" class="lat-nws-img" alt="NEWS"  />
			
		<?php } $i++;  } }?>
            </div>
            <div><br><a href="<?php echo base_url() ?>News/NewsDetail/<?php echo $n2->nid; ?>"><h6><?php echo $n2->subtitle; ?></h6></a></div>
            <div class="just_class" style="font-size:14px; word-spacing:1px; font-weight:normal;"><?php echo substr($n2->text,0,160); ?>.....
			<a href="<?php echo base_url()."News/NewsDetail/".$n2->nid; ?>">
			<?php foreach($dictionary as  $d){ echo $d->read_more; }?></a><br><br>
            <center style="position:absolute;bottom:0px;"><?php echo $n2->date; ?></center>
            </div>
            </div>
            <?php } ?>
			<div class="callout large-3 columns" style="padding:0px;" data-equalizer-watch >
                        <iframe  src="<?php echo base_url() ?>news_win_c/news" frameborder="0" border="0" width="100%" scrolling="No" height="441" allowtransparency="true" wrap> 
                        </iframe>
                  </div>
            
            
<!------------- End of 3 row ------------->
</div>
<!-------------  3 row ------------->
<div class="row" >

 <?php foreach($news3 as $n3){ ?>
    <div class="callout large-3 columns" style="height: 470px;" >
        <div>
              <?php $file_rec=$n3->image;
		          if($file_rec!=''){
		          $file_array=explode(',',$file_rec);
		          $i=1;
		          foreach($file_array as $val){
			      if($i==1){
			      $file=$val; ?>
	 	          <img src="<?php echo base_url(); ?>uploads/news/<?php  echo $file; ?>" 
			      class="lat-nws-img" alt="NEWS"  />
			
		        <?php } $i++;  } }?> 
        </div>
        
		<div>
		   <br><a href="<?php echo base_url() ?>News/NewsDetail/<?php echo $n3->nid; ?>"><h6><?php echo $n3->subtitle; ?></h6></a>
		</div>
        
		<div class="just_class" style="font-size:14px; word-spacing:1px; font-weight:normal;">
		   <?php echo substr($n3->text,0,160); ?>.....
			<a href="<?php echo base_url()."News/NewsDetail/".$n3->nid; ?>">
			<?php foreach($dictionary as  $d){ echo $d->read_more; }?></a><br><br>
            <center style="position:absolute;bottom:0px;"><?php echo $n3->date; ?></center>
        </div>
        
    </div>
            <?php } ?>
            
            <div class="callout large-3 columns" style="padding:17px 10px 4px 10px;height: 470px;" >
			
             <?php
					foreach($vds as $item):
						$id = $item->v_id;
						$title = $item->v_title;
						$code = $item->v_code;
						
						
						//$title = substr($title, 0, 30);
						
						// Picture Path
						$pic_path = "https://www.youtube.com/embed/$code";
						$picture = "<iframe style='border: none;' width='100%' height='220px' src='$pic_path'></iframe>";		
						// Link 
						$link_url = base_url()."Video/Detail/".$id;
						
						echo "<a href='$link_url'>";
						echo "<div class='box' style='height: auto;' data-toggle='tooltip' data-placement='top' title='$title'>";
						echo $picture;
						
						echo "</div>";
						echo "</a>";
					
					endforeach;
				?>
            </div>

</div>

<!------------- End of 3 row ---------------------------->
<div class="row" data-equalizer>

 <?php foreach($news4 as $n4){ ?>
    <div class="callout large-3 columns" style="height: 470px;" data-equalizer-watch >
        <div>
              <?php $file_rec=$n4->image;
		          if($file_rec!=''){
		          $file_array=explode(',',$file_rec);
		          $i=1;
		          foreach($file_array as $val){
			      if($i==1){
			      $file=$val; ?>
	 	          <img src="<?php echo base_url(); ?>uploads/news/<?php  echo $file; ?>" 
			      class="lat-nws-img" alt="NEWS"  />
			
		        <?php } $i++;  } }?> 
        </div>
        
		<div>
		   <br><a href="<?php echo base_url() ?>News/NewsDetail/<?php echo $n4->nid; ?>"><h6><?php echo $n4->subtitle; ?></h6></a>
		</div>
        
		<div class="just_class" style="font-size:14px; word-spacing:1px; font-weight:normal;">
		   <?php echo substr($n4->text,0,160); ?>.....
			<a href="<?php echo base_url()."News/NewsDetail/".$n4->nid; ?>">
			<?php foreach($dictionary as  $d){ echo $d->read_more; }?></a><br><br>
            <center style="position:absolute;bottom:0px;"><?php echo $n4->date; ?></center>
        </div>
        
    </div>
            <?php } ?>
            
            <div class="callout large-3 columns" style="padding:0px;" data-equalizer-watch >           
             <iframe  src="<?php echo base_url(); ?>news_win_c " frameborder="0" border="0" width="100%" scrolling="No" height="100%" allowtransparency="true" wrap> </iframe>
            
            </div>

</div>

<!--- FOOTER -------------------------------------------->

<!--- ----------------------End of Row 4 footer and Socail Networks -->
    <script src="<?php echo base_url(); ?>js/vendor/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/what-input.min.js"></script>
    <script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
    <script src="<?php echo base_url(); ?>js/app.js"></script>
	<script src="<?php echo base_url(); ?>js/inewsticker.js"></script>
	<script>
	$(document).ready(function() {
		$('.typing').inewsticker({
			speed           : 50,
			effect          : 'typing',
			dir             : 'ltr',
			font_size       : 18,
			color           : 'white',
			font_family     : 'arial',
			delay_after : 3000,

					
		});
	});	
	</script>
</body>
</html>