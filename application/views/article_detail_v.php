<div class="large-1 columns">&nbsp;</div>

<div class="large-10 columns" style="padding-top:10px; display:inline-block;">

<a class="success button" style="border-radius: 20px;" href="javascript:history.back();"><?php foreach($dic as $d){echo $d->back; }?></a>

<h3  style="text-align:<?php echo $this->session->userdata('align');?>"><?php foreach($articledetail as $nd){ echo $nd->subtitle; ?></h3>


<hr>
</div>

<div class="large-1 columns">&nbsp;</div>

<div class="row">
<div  class="large-1 medium-1 small-1 columns">&nbsp;</div>
<div style="text-align:<?php echo $this->session->userdata('align');?>" class="large-10 medium-10 small-10 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">
 <!--<?php $file_rec=$nd->image;
		 if($file_rec!=''){
		  $file_array=explode(',',$file_rec);
		  $i=1;
		  foreach($file_array as $val){
			  if($i==1){
			  $file=$val; ?>
	 <img src="<?php echo base_url(); ?>uploads/news/<?php  echo $file; ?>" style="float:left; padding-right:5px;" />
			
   <?php } $i++;  } }?>
  -->

 <?php echo $nd->text;} ?>

 <!-- <?php $file_rec=$nd->image;
		 if($file_rec!=''){
		  $file_array=explode(',',$file_rec);
		  $i=1;
		  foreach($file_array as $val){
			  if($i!=1){
			  $file=$val; ?>
	 <img src="<?php echo base_url(); ?>uploads/news/<?php  echo $file; ?>" />
			
  <?php } $i++;  } }?>
 -->
 
 </div>


<div class="large-1 medium-1 small-1 columns">&nbsp;</div>


</div>
