<?php include('gregorian_jalali.php'); ?>
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
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jssor.css" />
<!--   <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" />
        
    
        
       this is only to get classes in dream viewer -->
<!--   <link rel="stylesheet" href="../../css/foundation.css" />
      <link rel="stylesheet" href="../../css/app.css" />  -->
<script src="<?php echo base_url(); ?>js/jssor.js"></script>

<script type="text/javascript">function add_chatinline(){var hccid=35259469;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>

<style>
#circlse {
	border-radius: 50% 50% 50% 50%;
	width: 120px;
	height: 120px;
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
	width: 130px;
	height: 170px;
	padding: 5px;
}
.dropdown.menu .submenu>li a:hover
		{
			color:white;
		}


</style>
</head>

<body >
<!---First Row ---------------------------------------------
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
  <form method="get" action="<?php echo base_url(); ?>Search" name="Form1">
    <input type="text" id="search-box1" name="srch-box" />
    <input type="submit" id="search-btn"  value="" />
  </form>
</div>
--
<div class="larg-12 medium-12 samll-12 column" data-equalizer id="top-logo-div"> -->





<div class="contain-to-grid" data-equalizer>
  
  <div class="large-1 medium-1 small-4 top-hedar-div columns " data-equalizer-watch style="padding-top:12px;">
  <?PHP echo form_open(base_url().'Home/set_lang'); ?>  
  <select class="" id="chose-lan" name="lang" onChange="this.form.submit();">
  <?php foreach($langs as $r){ ?><option 
  value="<?php echo $r->language_id; ?>"<?php if ($r->language_id == $this->session->userdata('languageid')) echo "selected='selected'";?>><?php echo $r->language; ?></option><?php } ?></select><?PHP echo form_close(); ?>
  </div>

  <div class="large-2 medium-1 small-4 top-hedar-div columns" data-equalizer-watch style="padding-top:12px;">
  <form method="get" action="<?php echo base_url(); ?>Search" name="Form1"> 
    <input type="text" id="search-box1" name="srch-box" />
    <input type="submit" id="search-btn"  value="" />
  </form>
  </div>

  <div class="large-7 medium-8 small-4 top-hedar-div columns text-center hide-for-small-only" data-equalizer-watch>
    <h1 id="wlc-msg" style="font-size:24px; padding-right:90px;">
    <?php foreach($dictionary as  $d){ echo $d->wlcom_msg; }?> </h1>
  </div>

  <div dir="rtl" class="large-2 medium-2 small-4 top-hedar-div columns" data-equalizer-watch><img  class="top-hedar-img" src="<?php echo base_url(); ?>images/dabs.png" alt="DABS" /><!--<img class="top-hedar-img" src="<?php echo base_url(); ?>images/logo.png" alt="Afghanistan"/> --></div>
</div>


<!---------- End of First row ----------------------------->
<!------------- top Menu ---------------------------------->

<div class="large-1 medium-1 small-1 top-menu columns" id="crn-left"><img src="<?php echo base_url(); ?>images/left1.jpg" class="crn-img" alt="" >
</div>
<div class="large-10 medium-10 small-10 top-menu columns" id="menu">
  <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title">Menu</div>
  </div>
  
  <div class="top-bar off-canvas-wrapper-inner" id="example-menu">
    <div class="top-bar-right" style="direction:rtl;">
    
    
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
<!------------- End of top Menu ----------------> 
<!-------------- Start of 3rd Rows Slid Showe  -->
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
<img data-u="image" src="<?php echo base_url() ?>uploads/slides/<?php echo $s->image; ?>" />
<div style="position: absolute; text-align:center; top: 330px; left: 0px; width: 100%; height: 30px; font-size: 20px; color: #ffffff; line-height: 38px; background-color: rgba(255, 102, 0, 0.3);">
<p><?php echo $s->text; ?></p></div>
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
<!-- ------------ horizontal div content                    -->
<div class="row" style="margin-bottom: 17px;">
    <div class="large-3 medium-4 columns" style="min-height: 42px; color: white; background-color:#740000; text-align: left; float:right;">
	<?php foreach($dictionary as  $d){ ?>
	<p style="margin: 7px; padding-top:2px;"><b><?php echo $d->latest_news; }?></b></p>
    </div>
    <div class="large-9 medium-8 columns" style="min-height: 42px; color: white; background-color:rgba(255, 102, 0,1);">
      <ul class="typing" style="margin: 7px; display:none !important;">
      <?php foreach($news1 as $n1)
      { ?>
        	<li><a href="<?php echo base_url() ?>News/NewsDetail/<?php echo $n1->nid; ?>"><?php echo $n1->subtitle; ?></a></li>
			<?php } ?>
			<?php foreach($news2 as $n2){ ?>
            <li><a href="<?php echo base_url() ?>News/NewsDetail/<?php echo $n2->nid; ?>"><?php echo $n2->subtitle; ?></a></li>
            <?php } ?>	
      </ul>
	  
    </div>
  </div>

<!------------- Latest News  ------------------->
<div class="row" data-equalizer>

<!------------- End of Latest News ------------->

<!------------- CEO Massage -------------------->


<div style="background-color:white;" class="medium-5 large-5 columns cl" data-equalizer-watch>  	
        <div class="large-12 medium-12 columns text-right">
            <h6><strong><?php foreach($dictionary as  $d){ echo $d->ceo_msg; }?></strong></h6>
        </div>
     <div class="large-12 medium-12 columns text-right1 just_class" style="line-height:33px;">
            <img src="<?php echo base_url(); ?>images/DABS-LOGO.jpg" id="ceo-pic" style="float:right; margin-left:18px; font-size:16px;" >

           <p style="line-height:25px;direction:rtl;"> <?php foreach($dictionary as  $d){ echo substr($d->ceo_msg_txt,0,720); }?>
 <!----CeoMessagePs CeoMessagedr---------------------------->
			<a href="<?php echo base_url() ?><?php foreach($dictionary as  $d){ if($d->did == 3) {echo 'CeoMessagePs';} else if($d->did == 4) {echo 'CeoMessageUz';} else if($d->did == 2) {echo 'CeoMessagedr';}}?>/">
            .....<?php foreach($dictionary as  $d){ echo $d->read_more; }?> </a></p>
    </div>
</div>

<div style="background-color:white; " class="medium-7 large-7 columns cl" data-equalizer-watch>
           <div class="large-12 medium-12 columns text-right">
           <?php foreach($news1 as $n1) ?>
            <h6><strong><?php echo $n1->subtitle; ?></strong></h6>
           </div> 
          <div class="large-6 medium-4 columns text-right just_class">
            <p style="line-height:33px; direction:rtl; font-size:16px;">
			<?php echo substr($n1->text,0,500); ?>....<a href="<?php echo base_url() ?>News/NewsDetail/<?php echo $n1->nid; ?>">
			<?php foreach($dictionary as  $d){ echo $d->read_more; }?></a>
            </p>
          </div>         
           <div class="large-6 medium-8 columns">
            <img src="<?php echo base_url(); ?>uploads/news/<?php echo $n1->image; ?>" class="lat-nws-img">
           </div>           
</div>

 </div>
<div class="row" data-equalizer style="margin-bottom: 10px;" >

<div class="large-12 columns space_bar">&nbsp;</div>

</div>
<div class="row" style="direction:rtl;">
			
                  <div class="callout large-3 columns" style="padding:0px; height:410px;   " data-equalizer-watch >
                        <iframe  src="<?php echo base_url() ?>news_win_c/news" frameborder="0" border="0" width="100%" scrolling="No" height="400" allowtransparency="true" wrap> 
                        </iframe>
                  </div>
		   <?php foreach($news2 as $n2){ ?>
                  <div class="callout large-3 columns text-right float-right" style=" height:410px;">
                          <div>
                          <img src="<?php echo base_url(); ?>uploads/news/<?php echo $n2->image; ?>" style="width:500; height:200px;">
                          </div>
                          <br>
                          <div class="font14">
                              <strong><a href="<?php echo base_url() ?>News/NewsDetail/<?php echo $n2->nid; ?>"><?php echo $n2->subtitle; ?></a></strong>
                          </div>
                          <div class="font14 just_class text-right">
                              <?php echo substr($n2->text,0,220); ?>.....
							  <a href="<?php echo base_url() ?>News/NewsDetail/<?php echo $n2->nid; ?>">
                              <?php foreach($dictionary as  $d){ echo $d->read_more; }?></a>
							  <center style=" margin-left:60%;">                        <?php

    $strn=$n2->date;
     echo gtoj($strn);

 ?></center>
  
                         
      
 </div>
                  </div>
<?php } ?>

</div>
<!------------- End of  news2 ----------- -->
<!-------------  news3 ----------------- -->
<div class="row" style="direction:rtl;">
			<div class="callout large-3 columns" style="padding:15px 10px 4px 10px;height: 410px;" >           
				<?php
					foreach($vds as $item):
						$id = $item->v_id;
						$title = $item->v_title;
						$code = $item->v_code;
						
						
						//$title = substr($title, 0, 30);
						
						// Picture Path
						$pic_path = "https://www.youtube.com/embed/$code";
						$picture = "<iframe style='border: none;' width='100%' height='191px' src='$pic_path'></iframe>";		
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

            
 <?php foreach($news3 as $n3){ ?>
    <div class="callout large-3 columns text-right float-right" style="height: 410px; direction:rtl;" >
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
        
		<div class="font14 just_class text-right">
		   <?php echo substr($n3->text,0,220); ?>.....
			<a href="<?php echo base_url()."News/NewsDetail/".$n3->nid; ?>">
			<?php foreach($dictionary as  $d){ echo $d->read_more; }?></a>
			<center style="position:absolute;bottom:10px; margin-left:60%;">
            <?php
             $strn=$n3->date;
             echo gtoj($strn);
            ?>
			</center>
        </div>
        
    </div>
            <?php } ?>
            
</div>
<!------------- End of 3 news3 -------------------------- -->
<div class="row" style="direction:rtl;">

            <div class="callout large-3 columns" style="padding:0px; height:410px; " data-equalizer-watch >
                        <iframe  src="<?php echo base_url() ?>news_win_c/messages" frameborder="0" border="0" width="100%" scrolling="No" height="400" allowtransparency="true" wrap> 
                        </iframe>
                  </div>


 <?php foreach($news4 as $n4){ ?>
    <div class="callout large-3 columns text-right float-right" style="height: 410px; direction:rtl;" >
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
		   <a href="<?php echo base_url() ?>News/NewsDetail/<?php echo $n4->nid; ?>"><h6><?php echo $n4->subtitle; ?></h6></a>
		</div>
        
		<div class="font14 just_class text-right">
		   <?php echo substr($n4->text,0,250); ?>.....
			<a href="<?php echo base_url()."News/NewsDetail/".$n4->nid; ?>">
			<?php foreach($dictionary as  $d){ echo $d->read_more; }?></a>
			<center style="position:absolute;bottom:10px; margin-left:60%;">
            <?php
             $strn=$n4->date;
             echo gtoj($strn);
            ?>
			</center>
        </div>
        
    </div>
            <?php } ?>
            
</div>
<!--- ----------------------Start of Row 4 Slideshow and Socail Networks -->

   <script src="<?php echo base_url(); ?>js/vendor/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/what-input.min.js"></script>
    <script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
    <script src="<?php echo base_url(); ?>js/app.js"></script>
    <script src="<?php echo base_url(); ?>js/docs.js"></script>
	<script src="<?php echo base_url(); ?>js/inewsticker.js"></script>
	<script>
	$(document).ready(function() {
		$('.typing').inewsticker({
			speed           : 25,
			effect          : 'typing',
			dir             : 'rtl',
			font_size       : 18,
			color           : 'white',
			font_family     : 'arial',
			delay_after : 3000,		
		});
	});	
	</script>
    
</body>
</html>