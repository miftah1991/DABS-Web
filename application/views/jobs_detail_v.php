<style type="text/css">
.jhead{
	color:#FB7434;
}
table tbody tr td{
	text-align:left !important;
}

table tbody tr th{
	text-align:left !important;
}
</style>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:2px;"><h3>
		<?php foreach($job as $j){
		foreach($jdictionary as $jd){ echo $j->position_title; ?></h3><hr></div>

<div class="large-1 columns">&nbsp;</div>
<div >


<div class="large-12 medium-1 small-1 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">

<table class="hover" align="center" width="80%">  
    
   <tbody>
        <tr>
          <th colspan="4" class="jhead">Job Detail</th>

        </tr>
        <?php if($j->job_type=='Internal') {?>
        <tr>
          <th colspan="4" class="jhead">Only For Da Afghanistan Breshna Sherkat(DABS) Employees</th>
        </tr>
        <?php } ?>
         <tr>
          <th align="left"><?php echo $jd->publish_date; ?></th>
          <td align="left"><?php echo $j->publish_date; ?></td> 
          <th align="left"><?php echo $jd->vacancy_num; ?></th>
          <td align="left"><?php echo $j->vacancy_num; ?></td>         
        </tr>
         <tr>
          <th><?php echo $jd->expire_date; ?></th>
          <td><?php echo $j->expire_date; ?></td> 
          <th><?php echo $jd->work_type; ?></th>
          <td><?php echo $j->work_type; ?></td>          
        </tr>
         <tr>
          <th><?php echo $jd->number_position; ?></th>
          <td><?php echo $j->number_position; ?></td> 
          <th><?php echo $jd->gender; ?></th>
          <td><?php echo $j->gender; ?></td>         
        </tr>
         <tr>
         <th><?php echo $jd->functional_area; ?></th>
          <td><?php echo $j->FunctionalAreaName; ?></td> 
          <th><?php echo $jd->probition_period; ?></th>
          <td><?php echo $j->probition_period; ?></td>          
        </tr>
         <tr>
          <th><?php echo $jd->nationality; ?></th>
          <td><?php echo $j->nationality; ?></td> 
          <th><?php echo $jd->salary; ?></th>
          <td><?php echo $j->salname; ?></td>        
        </tr>
         <tr>
         <th><?php echo $jd->contract_type; ?></th>
          <td><?php echo $j->contract_type; ?></td> 
          <th><?php echo $jd->experience; ?></th>
          <td><?php echo $j->experience; ?></td>          
        </tr>
         <tr>
          <th><?php echo $jd->duration; ?></th>
          <td><?php echo $j->duration; ?></td> 
          <th><?php echo $jd->province; ?></th>
          <td><?php echo $j->PRName; ?></td>          
        </tr>
         <tr>
          <th><?php echo $jd->publish_date; ?></th>
          <td><?php echo $j->publish_date; ?></td> 
          <th><?php echo $jd->travel_province; ?></th>
          <td><?php echo ($j->travel_province==1 ? "Yes": "No"); ?></td>       
        </tr>
         <tr>
          <th><?php echo $jd->education; ?></th>
          <td><?php echo $j->QualificationName; ?></td> 
          <th><?php echo $jd->education_field; ?></th>
          <td><?php echo $j->education_field; ?></td>     
        </tr>     
     	<tr>         
          <td colspan="4" class="jhead"><?php echo str_replace('?',' ',$jd->duties); ?></td>             
        </tr>
        <tr>         
          <td colspan="4"><?php echo str_replace('?',' ',$j->duties); ?></td>             
        </tr>
        <tr>         
          <td colspan="4" class="jhead"><?php echo $jd->skills_required; ?></td>             
        </tr>
        <tr>         
          <td colspan="4"><?php echo str_replace('?',' ',$j->skills_required); ?></td>             
        </tr>
		<tr>         
          <td colspan="4" class="jhead"><?php echo $jd->qualification; ?></td>             
        </tr>
        <tr>         
          <td colspan="4"><?php echo str_replace('?',' ',$j->qualification); ?></td>             
        </tr>
        <tr>         
          <td colspan="4" class="jhead"><?php echo $jd->language_required; ?></td>             
        </tr>
        <tr>         
          <td colspan="4"><?php echo "English Pashto Dari"; ?></td>             
        </tr>
        <tr>         
          <td colspan="4" class="jhead"><?php echo $jd->submission_guideline; ?></td>             
        </tr>
        <tr>         
          <td colspan="4"><?php echo $jd->submission_guideline_text; ?><br><br>
		  <a href="http://hris.dabs.af/Recruit/Applicant/ApplicantApply/<?php echo $j->Code; ?>" class="btn"><?php echo $jd->applicationfrom; ?></a>
		  
		  <br/><br/>
		  &nbsp;&nbsp;&nbsp;&nbsp;Applicants also can submit hard copy of application/CV directly to DABS, HR Directorate Chaman Hozori, Kabul Afghanistan. <b>TEL</B> 0202300034 <br>
		  <b>Note:</b><br>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The application after closing date will not be accepted. Only shortlisted candidate will be called for further process.<bR>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DABS is an equal employment opportunity provider. 
		  </td>             
        </tr>
  
  
</tbody>
</table>
    <?php  } } ?>
    


</div>





</div>
