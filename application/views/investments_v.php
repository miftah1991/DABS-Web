<?php include('gregorian_jalali.php'); ?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:10px; direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
  <div class="row">
	<!--
      <div class="small-6 medium-4 large-4 columns" style="padding-right:0px;">
         <?php   echo form_open(base_url()."Tenders/search_tender"); ?>
         <input type="text" placeholder="" name="search" />
      </div>
	  
      <div class="small-6 medium-4 large-2 columns" style="padding-right:0px;">
         <input type="submit" value="Search" class="button" />
      </div>
	  -->
      <div class="small-0 medium-4 large-4 columns" style="padding-right:0px;">
         &nbsp;
      </div> 
  </div>
  <h3 style="padding: inherit; text-align: center">
    Investment Opportunities > <?php echo $type ?>
  </h3>
</div>  

  <div class="large-1 columns">&nbsp;</div>
  <hr> 
  <div> 
  <div class="large-12 medium-12 small-12 columns" style="height: 90%; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">
    <table class="hover" align="center">
      <thead style="padding-top:10px; direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
      
        <tr >
          <th style="text-align:<?php echo $this->session->userdata('align');?>">#</th>
          <th style="text-align:<?php echo $this->session->userdata('align');?>">name</th>
        
        
        </tr>
        
      </thead>
      <tbody style="padding-top:10px; direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
        <?php $number=1; foreach($investments as $t){  ?>
        <tr>
          <td><?php echo $number; ?></td> 
          <td>
          <?php $file_rec=$t->file;
		  $file_array=explode(',',$file_rec);
		  foreach($file_array as $val){
			  $file=$val; 
			  
		?>
          <a href="<?php echo base_url(); ?>uploads/tenders/<?php echo $file; ?>"><?php echo $t->name; ?></a> <br />        
        
       <?php  } ?>
        </td> 
          
         
        </tr>
        <?php $number++; } ?>
        <tr>
          <td colspan="5" align="center"><a href="<?php echo base_url(); ?>Investments/Archive">
            <?php foreach(@$dic as $d){ if(isset($d->archive)){ echo @$d->archive; } } ?>
            </a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
