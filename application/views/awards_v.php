<?php include('gregorian_jalali.php'); ?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:10px; direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
  <div class="row">
      <div class="small-6 medium-4 large-4 columns" style="padding-right:0px;">
         <?php   echo form_open(base_url()."Awarded_Contracts/searchAward"); ?>
         <input type="text" placeholder="Search By Contract Reference Number" name="search" />
      </div>
      <div class="small-6 medium-4 large-2 columns" style="padding-right:0px;">
         <input type="submit" value="Search" class="button" />
      </div>
      <div class="small-0 medium-4 large-4 columns" style="padding-right:0px;">
         &nbsp;
      </div> 
  </div>
  <h3 style="padding: inherit; text-align:center;">
    <?php foreach($tdictionary as $d){ echo $d->awarded_contracts; } ?>
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
        <tr>
          <th style="text-align:<?php echo $this->session->userdata('align');?>"><?php echo $td->contract_number; ?></th>
          <th style="text-align:<?php echo $this->session->userdata('align');?>"><?php echo $td->brief_description; ?></th>
          <th style="text-align:<?php echo $this->session->userdata('align');?>"><?php echo $td->awarded_to; ?></th>
          <th style="text-align:<?php echo $this->session->userdata('align');?>"><?php echo $td->award_publish_date; ?></th>		   
        </tr>
        <?php } ?>
		
      </thead>
      <tbody style="padding-top:10px; direction:<?php foreach($lang as $d){ echo $d->alignment; } ?>">
        <?php foreach($awards as $t){  ?>
        <tr>
          <td><?php echo $t->contract_number; ?></td>
          <td><a href="<?php echo base_url(); ?>Awarded_Contracts/AwardDetail/<?php echo $t->id; ?>"><?php echo $t->description; ?></a></td>
		  <td><?php echo $t->awarded_to; ?></td>
          <td>
          <?php 
          foreach($lang as $d){ $align=$d->alignment; }
           if($align=="rtl"){
            $strn=$t->publish_date;
             echo gtoj($strn);
           }
          else
          echo $t->publish_date; 
          ?>
          </td>
        </tr>
        <?php  } ?>	
      </tbody>
    </table>
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
</div>
