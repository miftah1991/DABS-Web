<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:2px;"><h3><?php foreach($dictionary as $d){ echo $d->search; } ?></h3><hr></div>

<div class="large-1 columns">&nbsp;</div>
<div class="row">
<div class="large-1 medium-1 small-1 columns">&nbsp;</div>

<div class="large-10 medium-10 small-10 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">

<ol>
  <?php  foreach($page as $p){  ?>
    <li>
    	
      <span><a href="<?php base_url(); ?><?php echo $p->custom_url; ?>"><?php echo $p->title; ?></a></span><br />
      <span><?php echo base_url(); ?><?php echo $p->custom_url; ?></span><br />
     
   
   </li>
    <?php  } ?>
   <?php  foreach($news as $n){  ?>
    <li>
    	
      <span><a href="<?php base_url(); ?>News/NewsDetail/<?php echo $n->nid; ?>"><?php echo $n->subtitle; ?></a></span><br />
      <span><?php echo base_url(); ?>News/NewsDetail/<?php echo $n->nid; ?></span><br />
     
   
   </li>
    <?php  } ?>

</ol>
</div>


<div class="large-1 medium-1 small-1 columns">&nbsp;</div>


</div>
