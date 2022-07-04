<?php include('gregorian_jalali.php'); ?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:10px; direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
  <div class="row">
      <div class="small-6 medium-4 large-4 columns" style="padding-right:0px;">
         <?php   echo form_open(base_url()."Tenders/search_tender"); ?>
         <input type="text" placeholder="Search By Contract Reference Number" name="search" />
      </div>
      <div class="small-6 medium-4 large-2 columns" style="padding-right:0px;">
         <input type="submit" value="Search" class="button" />
      </div>
      <div class="small-0 medium-4 large-4 columns" style="padding-right:0px;">
         &nbsp;
      </div> 
  </div>
  <h3 style="padding: inherit;">
    <?php foreach($dictionary as $d){ echo $d->tender; } ?>
  </h3>
</div>  

  <div class="large-1 columns">&nbsp;</div>
  <hr> 
  <div> 
  <div class="large-12 medium-12 small-12 columns" style="height: 90%; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">
    <table class="hover" align="center" width="80%">
      <thead style="padding-top:10px; direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
        <?php 
		foreach($tdictionary as $td){  ?>
        <tr >
          <th style="text-align:<?php echo $this->session->userdata('align');?>"><?php echo $td->t_specification_number; ?></th>
          <th style="text-align:<?php echo $this->session->userdata('align');?>"><?php echo $td->t_title; ?></th>
          <th style="text-align:<?php echo $this->session->userdata('align');?>"><?php echo $td->location; ?></th>
        <!--  <?php
          $start_date=$td->t_start_date;
          $end_date=$td->t_end_date;
          foreach($lang as $d){ $align=$d->alignment; }
           if($align=="rtl"){
           $start_date=gtoj($start_date);
           $end_date=gtoj($end_date);
         }
           ?>
           -->

          <th style="text-align:<?php echo $this->session->userdata('align');?>">
    
		   <?php echo $td->t_start_date; ?>

		   </th>
          <th style="text-align:<?php echo $this->session->userdata('align');?>"><?php 
          echo $td->t_end_date; ?></th>
        </tr>
        <?php } ?>
      </thead>
      <tbody style="padding-top:10px; direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
        <?php foreach($tender as $t){ ?>
        <tr>
          <td><?php echo $t->t_specification_number; ?></td>
          <td><a href="<?php echo base_url(); ?>Tenders/TenderDetail/<?php echo $t->tid; ?>"><?php echo $t->t_title; ?></a></td>
          <td><?php echo $t->location; ?></td>
          <td>
          <?php 
          foreach($lang as $d){ $align=$d->alignment; }
           if($align=="rtl"){
            $strn=$t->t_start_date;
             echo gtoj($strn);
           }
          else
          echo $t->t_start_date; 
          ?>
          </td>

          <td>
          <?php 
          foreach($lang as $d){ $align=$d->alignment; }
           if($align=="rtl"){
            $strn=$t->t_end_date;
             echo gtoj($strn);
           }
          else
          echo $t->t_end_date; 
          ?>
          </td>
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
