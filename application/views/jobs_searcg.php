<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:2px;"><h3><?php foreach($dictionary as $d){ echo $d->jobs; } ?></h3><hr></div>

<div class="large-1 columns">&nbsp;</div>
<div >


<div class="row">


  <div class="small-6 medium-4 large-4 columns" style="padding-right:0px;">
    <?php   echo form_open(base_url()."Jobs/JobSearch"); ?>
    <input type="text" placeholder="Search By Job Title" name="search" />
  </div>
    <div class="small-6 medium-4 large-4 columns" style="padding-left:0px;">
  <input type="submit" value="Search" class="button" />
  </form>
   <div class="small-0 medium-4 large-4 columns" style="padding-right:0px;">
   &nbsp;
   </div> 
</div>

<div class="large-12 medium-1 small-1 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">
<table class="hover" align="center" width="100%">  
    <thead>
    <?php foreach($jdictionary as $jd){  ?>
        <tr>
          <th width="200"><?php echo $jd->vacancy_num; ?></th>
          <th width="300"><?php echo $jd->position_title; ?></th>
          <th width="200"><?php echo $jd->province; ?></th>
          <th width="200"><?php echo $jd->expire_date; ?></th>
        </tr>
        <?php } ?>
      </thead>
  <tbody>
  <?php foreach($jobs as $j){  ?>
    <tr>
    <td><?php echo $j->vacancy_num; ?></td>
    <td><a href="<?php base_url(); ?>JobDetail/<?php echo $j->jid; ?>"><?php echo $j->position_title; ?></a></td>
    <td><?php echo $j->province; ?></td>
  
   	<td><?php echo $j->expire_date; ?></td>
    </tr>
    <?php  } ?>
    <tr><td colspan="4" class="text-center"><a href="<?php base_url(); ?>archive/">Archive</a></td></tr>
</tbody></table>

</div>





</div>
