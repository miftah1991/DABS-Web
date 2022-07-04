<style>
.box {
	border: 1px solid #eee;
	border-radius: 1px;
	box-shadow: 1px 2px 2px #eee;
	display: inline-block;
	margin: 15px;
	padding: 15px;
	width: 255px;
	height: 250px;
	vertical-align: top;
}
.box:hover {
	box-shadow: none;
	background: #eee;
}
</style>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:2px;"><h3><?php foreach($dic as $d){ echo $d->videos; } ?></h3><hr></div>

<div class="large-1 columns">&nbsp;</div>
<div class="row">


<div class="large-12 medium-12 small-12 columns" style="artical-aling: top; min-height: 300px; border-radius:2% 2% 2% 2%; margin-bottom:0px;">



<?php
	
		foreach($vds as $item):
			$id = $item->v_id;
			$title = $item->v_title;
			$code = $item->v_code;
			
			
			//$title = substr($title, 0, 30);
			
			// Picture Path
			$pic_path = "http://img.youtube.com/vi/$code/1.jpg";
			
			$picture = "<img style='vertical-align: top; margin-bottom:10px; padding:-5px;' src='$pic_path' width='100%' height='120px'>";
						
			// Link 
			$link_url = base_url()."Video/Detail/".$id;
			
			echo "<a href='$link_url'>";
			echo "<div class='box' style='height: auto;' data-toggle='tooltip' data-placement='top' title='$title'>";
			
			echo $picture;
			echo "<span style='display: block;'>" . $title . "</span>";
			echo "<br>";
			
			echo "</div>";
			echo "</a>";
		
		endforeach;
	
	?>




</div>





</div>
