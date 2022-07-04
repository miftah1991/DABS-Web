<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:20px; text-align:center"><h3>
		<?php foreach($tender as $t){
		foreach($tdictionary as $td){ ?></h3><hr>
        
        <a class="success button" style="border-radius: 20px;" href="javascript:history.back();"><?php foreach($dic as $d){echo $d->back; }?></a>

        
 </div>

<div class="large-1 columns">&nbsp;</div>
<div >


<div class="large-12 medium-12 small-12 columns" style="height: 90%; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">

<table class="hover" align="center" width="80%">  
    
   <tbody>
    <tr>
          <th><?php echo $td->t_title; ?></th>
          <td><?php echo $t->t_title; ?></td>          
        </tr>
        <tr>
          <th width="200" align="left"><?php echo $td->t_category; ?></th>
          <td width="800" align="left"><?php echo $t->t_category; ?></td>          
        </tr>
         <tr>
          <th><?php echo $td->t_specification_number; ?></th>
          <td><?php echo $t->t_specification_number; ?></td>          
        </tr>
        
         <tr>
          <th><?php echo $td->location; ?></th>
          <td><?php echo $t->location; ?></td>          
        </tr>
         <tr>
          <th><?php echo $td->t_start_date; ?></th>
          <td><?php echo $t->t_start_date; ?></td>          
        </tr>
         <tr>
          <th><?php echo $td->t_end_date; ?></th>
          <td><?php echo $t->t_end_date; ?></td>          
        </tr>
         <tr>
          <th><?php echo $td->t_contact; ?></th>
          <td><?php echo $t->t_contact; ?></td>          
        </tr>
         <tr>
          <th><?php echo $td->t_contact_phone; ?></th>
          <td><?php echo $t->t_contact_phone; ?></td>          
        </tr>
         <tr>
          <th><?php echo $td->t_contact_email; ?></th>
          <td><?php echo $t->t_contact_email; ?></td>          
        </tr>
         <tr>
          <th><?php echo $td->file; ?></th>
          <td>
          <?php $file_rec=$t->file;
		  $file_array=explode(',',$file_rec);
		  foreach($file_array as $val){
			  $file=$val; 
			  
		?>
          <a href="<?php echo base_url(); ?>uploads/tenders/<?php echo $file; ?>"><?php echo $file; ?></a> <br />        
        
       <?php  } ?>
        </td> 
        </tr>     
     	<tr>
          <th><?php echo $td->t_detail; ?></th>
          <td>
          
          <div class="rows">
          <div class="large-12 medium-12 small-12 columns"><?php echo $t->t_detail; ?></div>
          </div>
          </td>          
        </tr>
  
  
</tbody>
</table>
    <?php  } } ?>
    


</div>





</div>
