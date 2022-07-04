<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:20px; text-align:center"><h3>
		<?php foreach($award as $t){
		foreach($tdictionary as $td){ echo $t->description; ?></h3><hr>
        
        <a class="success button" style="border-radius: 20px;" href="javascript:history.back();"><?php foreach($dic as $d){echo $d->back; }?></a>

        
 </div>

<div class="large-1 columns">&nbsp;</div>
<div >


<div class="large-12 medium-12 small-12 columns" style="height: 90%; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">

<table class="hover" align="center" width="80%">  
    
   <tbody>
       
         <tr>
          <th><?php echo $td->contract_number; ?></th>
          <td><?php echo $t->contract_number; ?></td>          
        </tr>
         <tr>
          <th><?php echo $td->brief_description; ?></th>
          <td><?php echo $t->description; ?></td>          
        </tr>
         
         <tr>
          <th><?php echo $td->award_publish_date; ?></th>
          <td><?php echo $t->publish_date; ?></td>          
        </tr>
		
		<tr>
          <th><?php echo $td->awarded_to; ?></th>
          <td><?php echo $t->awarded_to; ?></td>          
        </tr>
         
         <tr>
          <th><?php echo $td->file; ?></th>
          <td>
          <?php $file_rec=$t->file;
		  $file_array=explode(',',$file_rec);
		  foreach($file_array as $val){
			  $file=$val; 
			  
		?>
          <a href="<?php echo base_url(); ?>uploads/awards/<?php echo $file; ?>"><?php echo $file; ?></a> <br />        
        
       <?php  } ?>
        </td> 
        </tr>     
     	<tr>
          <th><?php echo $td->award_details; ?></th>
          <td>
          
          <div class="rows">
          <div class="large-12 medium-12 small-12 columns"><?php echo $t->award_details; ?></div>
          </div>
          </td>          
        </tr>
  
  
</tbody>
</table>
    <?php  } } ?>
    


</div>





</div>
