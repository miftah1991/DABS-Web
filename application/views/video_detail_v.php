<?php
   
	foreach($vds as $item):
	
		$id = $item->v_id;
	 	$title=$item->v_title;
		$code = $item->v_code;
	
	endforeach;
?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:2px;">&nbsp;</div>

<div class="large-1 columns">&nbsp;</div>
<div class="row">


<div class="large-12 medium-12 small-12 columns text-center" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">



<h3><?php // echo $title; ?></h3>
  <hr>
<div style="text-align: right; color: #03C;">
  </div>
  

                 <h4><?php echo $title; ?><h4><br/>
                 <?php $youtubeLink = "https://www.youtube.com/embed/"; ?>
                     <iframe width="620" height="445" src="<?php echo $youtubeLink.$code; ?>">
                    </iframe>
					
					
</div>





</div>
