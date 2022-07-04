<?php include('gregorian_jalali.php'); ?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:30px; text-align:center;"><h4><?php echo $complaint_dic->page_title; ?>><span style="color: blue"><?php echo $services[0]->group_name  ?></span></h4>
<hr style="margin-top: 1px;"></div>

<div class="large-1 columns">&nbsp;</div>
<div class="row">
<div class="large-1 medium-1 small-1 columns">&nbsp;</div>

<div class="large-10 medium-10 small-10 columns" style="min-height: 300px; horizontal-align:center; border-radius:2% 2% 2% 2%; margin-bottom:50px;">
<div  style="direction:rtl;"> <?php 
if($this->session->flashdata('msg')=='Success')
{ ?> <p style="border-radius: 7px; font-size:1.1em; padding: 13px; background-color:#43AC6A;"> <?php echo $complaint_dic->success_message; }else if($this->session->flashdata('msg')=='Error') { echo "Erro in Captcha";} ?></p></div>


<?php echo form_open('Complaints/addComplaint');?>

		<style>
		form> label{font-size: 1.09em;}
		</style>
         <label><?php echo $complaint_dic->name; ?>
            <input  type = "text" name = "name" required>
         </label>
        
         <label><?php echo $complaint_dic->acount; ?>
            <input type = "text" name = "account" required>
         </label>
		 
		 <label><?php echo $complaint_dic->phone; ?>
            <input type = "number" name = "phone" required>
         </label>
        
         <label><?php echo $complaint_dic->email; ?>
            <input type = "email" name = "email" required>
         </label>

		 <input type = "text" name = "group"  style="display:none;" value="<?php echo $services[0]->group_name  ?>">
		 <input type = "text" name = "complaint_type"  style="display:none;" value="<?php echo $services[0]->type  ?>">
		 
		 <label><?php echo $complaint_dic->complaint_type; ?>
            <select name= "type" required>
			<option value = ""></option>
			<?php foreach($services as $service){ ?>
			
               <option value = "<?php echo $service->name; ?>"><?php echo $service->name; ?></option>
			<?php } ?>
			
            </select>
         </label>
		 
		 <label><?php echo $complaint_dic->comments; ?>
            <textarea name = "comments" style="height:100px;" required></textarea>
         </label>
        
         <label><?php echo $complaint_dic->specific_address; ?>
            <input type = "text" name = "address" required>
         </label>
         
         <legend><?php echo $complaint_dic->breshna_respond; ?></legend>
         <div class = "row">
            <fieldset class = "large-8 medium-8 small-8 columns">                         
               <input type = "radio" name = "respond" value = "<?php echo $complaint_dic->respond_email; ?>" required>
               <label for = "fruitApp" style="margin:2px; font-size: 1em;"><?php echo $complaint_dic->respond_email; ?></label>
               
               <input type = "radio" name = "respond" value = "<?php echo $complaint_dic->respond_phone; ?>">
               <label for = "fruitGrp" style="margin:2px; font-size: 1em;"><?php echo $complaint_dic->respond_phone; ?></label>
			   
			   <input type = "radio" name = "respond" value = "<?php echo $complaint_dic->respond_visite; ?>">
               <label for = "fruitGrp" style="margin:2px; font-size: 1em;"><?php echo $complaint_dic->respond_visite; ?></label>
            </fieldset>
            
         </div>
	<div class="input-group" style="text-align:center;"><?php echo $image; ?></div>
<div class="input-group"><span class="input-group-label">SECURITYCODE:</span>
<input class="input-group-field" type="text" id="captcha" name="captcha">
<?php echo form_error('captcha',"<span class='error'>", "</span>"); ?></div>

         
         <div class = "input-group">
           
            <input type="submit" class = "button primery" value = "<?php echo $complaint_dic->submit; ?>">
            
         </div>
 <?php echo form_close();?>
              
</div>

<div class="large-1 medium-1 small-1 columns">&nbsp;</div>

</div>
