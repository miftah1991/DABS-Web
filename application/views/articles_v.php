<?php include('gregorian_jalali.php'); ?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:30px; text-align:center;"><h3><?php foreach($dictionary as $d){ echo $d->articles; } ?></h3>
<hr style="margin-top: 1px;"></div>


<div >


<div class="large-12 medium-12 small-12 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">

<table class="hover" align="center">  
   <thead style="direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
   <?php foreach($rdictionary as $rd){  ?>
        <tr>
          
          <th style="text-align:<?php echo $this->session->userdata('align');?>" width="50"><?php echo $rd->number; ?></th>
            
        
          <th style="text-align:<?php echo $this->session->userdata('align');?>" width="600" ><?php echo $rd->t_title; ?></th>
          
          <th style="text-align:<?php echo $this->session->userdata('align');?>" width="200"><?php echo $rd->t_start_date; ?></th>
         
        </tr>
  <?php } ?>
   </thead>
 
     
  <tbody style="direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
  <?php $i=1; foreach($articles as $n){  ?>
    <tr>
    <td><?php echo $i++; ?></th>
    <td><a href="<?php base_url(); ?>Articles/ArticleDetail/<?php echo $n->nid; ?>"><?php echo $n->subtitle; ?></a></td>
    
    <td>

    <?php
    
    foreach($lang as $d){ $align=$d->alignment; }
    if($align=="rtl"){
    $strn=$n->date;
     echo gtoj($strn);
   }
   else
   echo $n->date;

   ?>
      
    </td>
   <!-- <td><php echo $r->rfile; ?></td> -->
    </tr>
    <?php  } ?>
    
</tbody></table>

</div>





</div>
