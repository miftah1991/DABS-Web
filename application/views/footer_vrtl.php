</div>

<br />
<!--- ------------   --------------------    -----------------------------Start of Row 4 Slideshow and Socail Networks -->
<div class="contain-to-grid" style="background-color:#E0E1E6; border-top:8px solid #dea562;" data-equalizer>
<div class="large-3 columns" style="background-color:#E0E1E6;" data-equalizer-watch>
<img src="<?php echo base_url() ?>images/Untitled-1.png" style="padding-left:15px; padding-top:10px; width:200px; height:200px;" /></div>
<div class="large-6 columns" style="background-color:#E0E1E6;" data-equalizer-watch>
<br>
<?php foreach($dictionary as  $d){ echo $d->company_profile; }?><a href="#">......Read More</a>


<br><br>
  <table align="center" ><tr>
<td style="background-color:#E0E1E6;">Follow us on</td>  
<style type="text/css">

</style>

<td><a href="#"><div class="twitter-roll"></div></a>&nbsp;&nbsp;</td>
<td><div class="facebook-roll"></div>&nbsp;&nbsp;</td>
<td><div class="link-roll"></div>&nbsp;&nbsp;</td>
<td><div class="gplus-roll"></div>&nbsp;&nbsp;</td>
<td><div class="insta-roll"></div>&nbsp;&nbsp;</td>
<td><div class="youtube-roll"></div>&nbsp;&nbsp;</td>
</tr></table>
</div>


<div class="large-3 columns" style="padding-top:0px;background-color:#E0E1E6;" data-equalizer-watch>

<div class="row">
<fieldset class="fieldset">
<form method="post" name="Form1" action="<?php echo base_url() ?>Subscribe">
<legend style="background-color:#E0E1E6;"><?php foreach($dictionary as  $d){ echo $d->subcribe; }?></legend>
<div class="input-group">
  <span class="input-group-label"><?php foreach($dictionary as  $d){ echo $d->name; }?></span>
  <input class="input-group-field" type="text" name="cname" required>
   <?php echo form_error('cname', '<span class="ferror">', '</span>'); ?>
</div>
<div class="input-group">
  <span class="input-group-label"><?php foreach($dictionary as  $d){ echo $d->email; }?></span>
  <input class="input-group-field" type="text" name="cemail" required>
  <?php echo form_error('cemail', '<span class="ferror">', '</span>'); ?>
</div>

  
  
  <input class="small expanded button" type="submit" name="submit" value="<?php foreach($dictionary as  $d){ echo $d->subcribe; }?>" style="background-color:#004876; color:#FFF;">
  </form>
  </fieldset>
  

</div>


</div>
<!--- ----------------------End of Row 4 Slideshow and Socail Networks -->
</div>





   <script src="<?php echo base_url(); ?>js/vendor/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/what-input.min.js"></script>
    <script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
    <script src="<?php echo base_url(); ?>js/app.js"></script>
    
    
</body>
</html>