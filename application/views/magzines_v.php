<?php include('gregorian_jalali.php'); ?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:30px; text-align: center;">
  <h1><?php foreach($dictionary as $d){ echo $d->magzines;} ?></h1>
  
  <?php if($dictionary[0]->language_id == 1): ?>
    <div style="padding-top:30px; text-align: left;">
        <ul>
          <li>Name: Tamana sadat</li>
          <li>Email: tamana.sadat@ dabs.af</li>
          <li>Phone No: 0729005131</li>
        </ul>
  </div>
  <?php else: ?>
  
  <div style="padding-top:30px; text-align: right;">
          <ul style="list-style-type:none;" >
            <li>اسم: تمنا سادات </li>
            <li>وظیفه: گزارشگر و مدیر مسوول مجله الکترونکی و چاپی</li>
            <li>tamana.sadat@ dabs.af : ایمیل آدرس</li>
            <li>شماره تماس :0729005131</li>
          </ul>
      </div>
  <?php endif; ?>
    
<hr style="margin-top: 1px;"></div>

<div class="large-1 columns">&nbsp;</div>
<div>


<div class="large-12 medium-12 small-12 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">

<table class="hover" align="center" dir="<?php echo $this->session->userdata('alignment') ?>" style="direction:<?php echo $this->session->userdata('alignment') ?>" width="50%">  

    <thead>
    <?php foreach($rdictionary as $rd){  ?>
        <tr>
        
         <!--<th class="text-center"  bgcolor="#6E99BC" scope="col"><strong><?php // echo $rd->number; ?></strong></th>-->
         <th class="text-center" style="text-align:<?php echo $this->session->userdata('align');?>" bgcolor="#6E99BC" scope="col"><?php echo $rd->volume; ?></th>
         <th class="text-center" style="text-align:<?php echo $this->session->userdata('align');?>" bgcolor="#6E99BC" scope="col"><?php echo $rd->t_start_date; ?></th>
         <th class="text-center" style="text-align:<?php echo $this->session->userdata('align');?>" bgcolor="#6E99BC" scope="col">SWF</th>
         <th class="text-center" bgcolor="#6E99BC" scope="col"><?php echo $download=$rd->download; ?></th>

         <!-- <th width="200"><php echo $rd->file; ?></th> -->
        </tr>
        <?php } ?>
      </thead>
  <tbody>
  <?php $i=1; foreach($mgz as $r){  ?>
    <tr>
  	<!--<td><?php // echo $i++; ?></td> -->
    <td><a href="<?php echo $r->mg_url; ?>" target="_new"><?php echo $r->mg_title; ?></a></td>
    <td><?php
    foreach($lang as $d){ $align=$d->alignment; }
    if($align=="rtl"){
    $strn=$r->mg_publish_date;
     echo gtoj($strn);
   }
   else

     echo $r->mg_publish_date; ?>
       
     </td>
    <td><img src="<?php echo base_url()."uploads/media/".$r->mg_pic; ?>" width="75" height="100"/></td>
    <td><a href="<?php echo $r->mg_url; ?>" target="_new"><?php echo $download; ?></a></td>
   <!--	<td><php echo $r->rfile; ?></td> -->
    </tr>
    <?php  } ?>
   <tr>
    <td colspan="5" align="center">
	     <?php if($r->mg_type == "Online") {
			$archive_url= base_url()."Magzine/MagzineArchive"; 
			  }
               if($r->mg_type == "Print"){
				   $archive_url= base_url()."Magzine/PRINTMagzineArchive";
			   }
			  ?>
	      <a href="<?php echo $archive_url; ?>">
		       <?php foreach(@$dic as $d){ if(isset($d->archive)){ echo @$d->archive; } } ?>
	      </a>
	</td>
    </tr>
</tbody></table>

</div>





</div>