<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:20px; text-align: center;">
<a class="success button" style="border-radius: 20px;" href="javascript:history.back();"><?php foreach($dic as $d){echo $d->back; }?></a> 

<h3>
		<?php foreach($reports as $r){
		foreach($rdictionary as $rd){ echo $r->rtitle; ?></h3>
		<hr style="margin-top: 1px;">

 </div>

<div class="large-1 columns">&nbsp;</div>
<div >


<div class="large-12 medium-12 small-12 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">

<table class="hover" align="center">  
    
   <tbody>
		
          <th><?php echo $rd->t_title; ?></th>
          <td><?php echo $r->rtitle; ?></td>          
        </tr>
         <tr>
          <th><?php echo $rd->file; ?></th>
          <td><a href="<?php echo base_url(); ?>uploads/reports/<?php echo $r->rfile; ?>"><?php echo $r->rfile; ?></a></td>          
        </tr>
         <tr>
          <th><?php echo $rd->t_start_date; ?></th>
          <td><?php echo $r->rpublish_date; ?></td>          
        </tr>
         <tr>
          <th><?php echo $rd->t_detail; ?></th>
          <td style="max-width:800px;"><?php echo $r->rtext; ?></td>          
        </tr>
         
  
  
</tbody>
</table>
    <?php  } }  ?>
    


</div>





</div>
