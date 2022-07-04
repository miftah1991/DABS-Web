<?php include('gregorian_jalali.php'); ?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:20px; text-align: center;"><h3><?php foreach($dictionary as $d){ echo $d->articles; } ?></h3>
<hr style="margin-top: 1px;"></div>

<div class="large-1 columns">&nbsp;</div>
<div >


<div class="large-12 medium-12 small-12 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">

<table class="hover" align="center">  
    <thead style="direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
    <?php foreach($rdictionary as $rd){  ?>
        <tr>
          
        	<th style="text-align:<?php echo $this->session->userdata('align');?>" width="50"><?php echo $rd->number; ?></th>
            
        
          <th width="600" style="text-align:<?php echo $this->session->userdata('align');?>"><?php echo $rd->t_title; ?></th>
          
          <th width="200" style="text-align:<?php echo $this->session->userdata('align');?>"><?php echo $rd->t_start_date; ?></th>
         <!-- <th width="200"><php echo $rd->file; ?></th> -->
        </tr>
        <?php } ?>
      </thead>
  <tbody style="direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
  <?php $i=1;foreach($reports as $r){  ?>
    <tr>
  	<td><?php echo $i++; ?></td>
    <td><a href="<?php echo base_url(); ?>Reports/ReportDetail/<?php echo $r->rid; ?>"><?php echo $r->rtitle; ?></a></td>
    
    <td><?php 
    foreach($lang as $d){ $align=$d->alignment; }
    if($align=="rtl"){
    $strn=$r->rpublish_date;
     echo gtoj($strn);
   }
   else
    echo $r->rpublish_date; 
    ?></td>
   <!--	<td><php echo $r->rfile; ?></td> -->
    </tr>
    <?php  } ?>
    
</tbody></table>

</div>





</div>
