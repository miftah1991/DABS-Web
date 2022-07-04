<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:2px;">
  <h3>
    <?php foreach($dictionary as $d){ echo $d->tender; } ?>
  </h3>
  <hr>
  <a class="success button" style="border-radius: 20px;"  href="<?php echo base_url()."Tenders"; ?>">
  <?php foreach($dic as $d){echo $d->back; }?>
  </a> </div>
<div class="large-1 columns">&nbsp;</div>
<div class="row">


  <div class="small-6 medium-4 large-4 columns" style="padding-right:0px;">
    <?php   echo form_open(base_url()."Tenders/search_tender"); ?>
    <input type="text" placeholder="Search By Contract Reference Number" name="search" />
  </div>
    <div class="small-6 medium-4 large-4 columns" style="padding-left:0px;">
  <input type="submit" value="Search" class="button" />
  </form>
   <div class="small-0 medium-4 large-4 columns" style="padding-right:0px;">
   &nbsp;
   </div> 
</div>  
  
  
  
  <div class="large-12 medium-1 small-1 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">
    <table class="hover" align="center">
      <thead>
        <?php foreach($tdictionary as $td){  ?>
        <tr>
          <th ><?php echo $td->t_specification_number; ?></th>
          <th ><?php echo $td->t_title; ?></th>
          <th ><?php echo $td->location; ?></th>
          <th ><?php echo $td->t_start_date; ?></th>
          <th ><?php echo $td->t_end_date; ?></th>
        </tr>
        <?php } ?>
      </thead>
      <tbody>
        <?php foreach($tender as $t){  ?>
        <tr>
          <td><?php echo $t->t_specification_number; ?></td>
          <td><a href="<?php echo base_url(); ?>Tenders/TenderDetail/<?php echo $t->tid; ?>"><?php echo $t->t_title; ?></a></td>
          <td><?php echo $t->location; ?></td>
          <td><?php echo $t->t_start_date; ?></td>
          <td><?php echo $t->t_end_date; ?></td>
        </tr>
        <?php  } ?>
        <tr>
          <td colspan="5" align="center"><a href="<?php echo base_url(); ?>Tenders/Archive">
            <?php foreach(@$dic as $d){ if(isset($d->archive)){ echo @$d->archive; } } ?>
            </a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
