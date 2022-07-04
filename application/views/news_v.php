<?php include('gregorian_jalali.php'); ?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:30px; text-align:center;"><h3><?php foreach($dictionary as $d){ echo $d->news; } ?></h3>
<hr style="margin-top: 1px;"></div>

<div class="large-1 columns">&nbsp;</div>
<div class="row">
<div class="large-1 medium-1 small-1 columns">&nbsp;</div>

<div class="large-10 medium-10 small-10 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">
<table class="hover">  
  <tbody style="direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
  <?php foreach($news as $n){  ?>
    <tr>
      <td class="small-12 medium-4 large-4 columns">
      <?php $file_rec=$n->image;
		 if($file_rec!=''){
		  $file_array=explode(',',$file_rec);
		  $i=1;
		  foreach($file_array as $val){
			  if($i==1){
			  $file=$val; ?>
	 <img src="<?php echo base_url(); ?>uploads/news/<?php  echo $file; ?>" style="height:180px; width:370px;" />
			
		<?php } $i++;  } }?>
      </td>

      <td class="small-12 medium-4 large-4 columns"><a href="<?php base_url(); ?>News/NewsDetail/<?php echo $n->nid; ?>"><?php echo $n->subtitle; ?></a></td>
      <td class="small-12 medium-4 large-4 columns">
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
   
    </tr>
    <?php  } ?>
    
</tbody></table>

             
                <div id="pagination">
                    <ul class="ts_pagination" style="display: table; margin-right: auto; margin-left: auto; margin-bottom:150px;">
                        
                      <!--Show pagination links -->
                        <?php foreach ($links as $link) {  ?>
                        

                  
                           <li>    
                           <?php echo $link ?> </li>
                        <?php  }  ?>
					</ul>
                </div>
				
               
               
</div>


<div class="large-1 medium-1 small-1 columns">&nbsp;</div>




</div>
