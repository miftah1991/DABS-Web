<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:2px;"><h3><?php foreach($dictionary as $d){ echo $d->subcribe; } ?></h3><hr></div>

<div class="large-1 columns">&nbsp;</div>
<div class="row">
<div class="large-1 medium-1 small-1 columns">&nbsp;</div>

<div class="large-10 medium-1 small-1 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">
<style type="text/css">

.ferror{
	color:red;
}
</style><?php if($message==''){ ?>
<fieldset class="fieldset">
<form method="post" name="Form1" action="<?php echo base_url() ?>Subscribe">

<div class="input-group">
  <span class="input-group-label"><?php foreach($dictionary as  $d){ echo $d->name; }?></span>
  <input class="input-group-field" type="text" name="cname">
   <?php echo form_error('cname', '<span class="ferror">', '</span>'); ?>
</div>
<div class="input-group">
  <span class="input-group-label"><?php foreach($dictionary as  $d){ echo $d->email; }?></span>
  <input class="input-group-field" type="text" name="cemail">
  <?php echo form_error('cemail', '<span class="ferror">', '</span>'); ?>
</div>

<input id="checkbox1" name="news" value="1" type="checkbox" checked><label for="checkbox1"><?php foreach($dictionary as  $d){ echo $d->news; }?></label>
<input id="checkbox2" name="jobs" value="1" type="checkbox"><label for="checkbox2"><?php foreach($dictionary as  $d){ echo $d->jobs; }?></label>
<input id="checkbox3" name="tenders" value="1" type="checkbox"><label for="checkbox3"><?php foreach($dictionary as  $d){ echo $d->tender; }?></label>
  
  
  <input class="small expanded button" type="submit" name="submit" value="<?php foreach($dictionary as  $d){ echo $d->subcribe; }?>" style="background-color:#004876; color:#FFF;">
  </form>
  </fieldset>
  <?php } else {  echo $message; } ?>



</div>


<div class="large-1 medium-1 small-1 columns">&nbsp;</div>


</div>
