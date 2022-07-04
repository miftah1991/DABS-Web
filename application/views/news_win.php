
<style type="text/css">
<!--

body	{
	
	margin: 0;
	padding: 0;
	border: 0;
	}

 /* FONT COLORS */

div		{ color: #000000; font: 11px arial, sans-serif; font-weight: normal; }

.title		{ color: #0033FF; font: 12px arial, sans-serif; font-weight: bold; }

#NewsDiv	{ position: absolute; left: 0; top: 0; width: auto; }

 /* PAGE LINK COLORS */

a:link		{ color: #0033FF; text-decoration: underline; }

a:visited	{ color: #6633FF; text-decoration: underline; }

a:active	{ color: #0033FF; text-decoration: underline; }

a:hover		{ color: #6699FF; text-decoration: none; }

-->
</style>


<script type="text/javascript">
<!-- HIDE CODE JAVASCRIPT NEWS SCROLLER ver 2.0 2013


var scrollspeed = 1;		// SET SCROLLER SPEED 1 = SLOWEST
var speedjump   = 40;		// ADJUST SCROLL JUMPING = RANGE 20 TO 40
var startdelay  = 1; 		// START SCROLLING DELAY IN SECONDS
var nextdelay   = 1; 		// SECOND SCROLL DELAY IN SECONDS 0 = QUICKEST
var topspace    = 0;		// TOP SPACING FIRST TIME SCROLLING
var frameheight = 204;		// IF YOU RESIZE THE WINDOW EDIT THIS HEIGHT TO MATCH


current = (scrollspeed);


function HeightData() {
    AreaHeight = dataobj.offsetHeight;
    if (AreaHeight === 0) {
        setTimeout("HeightData()", (startdelay * 500));
    } else {
        ScrollNewsDiv();
    }
}

function NewsScrollStart() {
    dataobj = document.all ? document.all.NewsDiv : document.getElementById("NewsDiv");
    dataobj.style.top = topspace + 'px';
    setTimeout("HeightData()", (startdelay * 500));
}

function ScrollNewsDiv() {
    dataobj.style.top = parseInt(dataobj.style.top) - scrollspeed + 'px';
    if (parseInt(dataobj.style.top) < AreaHeight * (-1)) {
        dataobj.style.top = frameheight + 'px';
        setTimeout("ScrollNewsDiv()", (nextdelay * 500));
    } else {
        setTimeout("ScrollNewsDiv()", speedjump);
    }
}



// END HIDE CODE -->
</script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
</head>

<body style="background-color:white;" onMouseover="scrollspeed=0" onMouseout="scrollspeed=current" OnLoad="NewsScrollStart();">

<?php 
//for Dari and pashto
$lang=$_SESSION['languageid']; if($lang == 2 || $lang == 3 || $lang == 4){ 
    
  
    
    ?>




        <div id="NewsDiv" style="padding:8px; direction:rtl ">
		  <?php
                  for($i=0; $i<10; $i++){
                   foreach($news as $m){ ?>
              
              <div class="row" >
                    <div class=" large-4 small-7 columns"><p style="font-size: 12px;"><strong><?php echo $m->subtitle ?></strong></p></div>
                    <div class=" large-6 small-5 columns">
                          <a 
                            href="<?php echo base_url() ?>News/NewsDetail/<?php echo $m->nid; ?>" target="_blank">
                        <img src="<?php echo base_url(); ?>uploads/news/<?php echo $m->image ?>"
                         class="scrolling_div" style="max-width:110px; hight:80px; margin-bottom: 10px;">
                        </a>
						<br>
                    </div>
                   
              </div>
          <?php } }?>
       </div>

<?php } ?>
<!------------------------------------------------------------------------------->
<?php
//For English language
 $lang=$_SESSION['languageid']; if($lang == 1  ){ ?>
        <div id="NewsDiv" style="padding:8px;">
				  <?php
                  for($i=0; $i<1; $i++){
                   foreach($news as $m){ ?>
              
              <div class="row" >
					<div class=" large-6 small-5 columns">
                          <a 
                            href="<?php echo base_url() ?>News/NewsDetail/<?php echo $m->nid; ?>" target="_blank">
                        <img src="<?php echo base_url(); ?>uploads/news/<?php echo $m->image ?>"
                         class="scrolling_div" style="max-width:110px; hight:80px; margin-bottom: 10px; float:left;">
                        </a>
						<br>
                    </div>
                    <div class=" large-4 small-7 columns"><p style="font-size: 10px;"><strong><?php echo $m->subtitle ?></strong></p></div>
                    
                   
              </div>
              <?php } }?>
       </div>
<?php } ?>
