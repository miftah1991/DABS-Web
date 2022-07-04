<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:2px;">
<a class="success button" style="border-radius: 20px;" href="javascript:history.back();"><?php foreach($dic as $d){echo $d->back; }?></a>
<h3 style="text-align:center;"><?php foreach($newsdetail as $nd){ echo $nd->subtitle; ?></h3>
<hr></div>

<div class="large-1 columns">&nbsp;</div>
<div class="row">
<div class="large-1 medium-1 small-1 columns">&nbsp;</div>
<?php   $lang=$this->session->userdata('languageid');
if($lang==1)
{
	
?>
<div class="large-10 medium-10 small-10 columns"  style="min-height:300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;text-align:left; " >
<?php 
}
else
{
	?>
	<div class="large-10 medium-10 small-10 columns"  style="min-height:300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;text-align:right;" dir="rtl" >
	
<?php 	
}
?>


 <?php $file_rec=$nd->image;
		 if($file_rec!=''){
		  $file_array=explode(',',$file_rec);
		  $i=1;
		  foreach($file_array as $val){
			  if($i==1){
			  $file=$val; ?>
	 <img src="<?php echo base_url(); ?>uploads/news/<?php  echo $file; ?>" style="max-width: 50%; float:left; padding-right:5px;" />
			
		<?php } $i++;  } }?>

 <?php echo $nd->text;} ?>
  <?php $file_rec=$nd->image;
		 if($file_rec!=''){
		  $file_array=explode(',',$file_rec);
		  $i=1;
		  foreach($file_array as $val){
			  if($i!=1){
			  $file=$val; ?>
	 <img src="<?php echo base_url(); ?>uploads/news/<?php  echo $file; ?>" />
			
		<?php } $i++;  } }?>
 
 
 </div>


<div class="large-1 medium-1 small-1 columns">&nbsp;</div>


</div>
