<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Cache-control" content="no-store">

<link rel="icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?=base_url()?>css/layout.css" type="text/css" media="screen" /> 
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--> 
    <link href="<?php echo base_url() ?>js/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url() ?>/js/tender/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.datepick.js"></script>

<script type="text/javascript">
$(function() {
	$('#publish_date').datepick();
	
});
</script>
<script type="text/javascript">
$(function() {
	$('#expire_date').datepick();
	
});
</script>
<script type="text/javascript" src="<?php echo base_url() ?>Editor/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "openmanager,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|,openmanager",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		
		//Open Manager Options
		file_browser_callback: "openmanager",
		open_manager_upload_path: '../../../../uploads/',

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script> 
<title>DABS</title>
</head>
<body>
	<div id="container">
				<?PHP $this->load->view('admin/admin_header') ?>
                <?PHP $this->load->view('admin/admin_left') ?>
                <section id="main" class="column">
                <?PHP if($this->session->flashdata('msg')!=""): ?>
        <?PHP		
			if($this->session->flashdata('msg')=="Already exists." || $this->session->flashdata('msg')=="Not part of menu.")
			{
				$class = 'class="alert_warning"';
			}
			else
			{
				$class = 'class="alert_success"';
			}
		?>
	        <h4 <?=$class?>>
           		<?PHP 
					echo $this->session->flashdata('msg');
				?>
  			</h4>
		<?PHP endif; ?>
                <article class="module width_full">
				<header>
				  <h3>EDIT JOB</h3></header>
					<div class="module_content">
					  <?PHP
					  foreach($job as $j) {
							echo form_open(base_url().'admin/job/edit_job');
							?>
					  <fieldset>
					 <label> Vacancy Number:</label>
					  		<?PHP echo form_input('vacancy_num',$j->vacancy_num,set_value('vacancy_num')); ?><br />
                            <?php echo form_error('vacancy_num', '<span class="ferror">', '</span>'); ?>
                      </fieldset>
                            
                      <fieldset>
                             <label> Position Title:</label>
							 <?PHP echo form_input('position_title',$j->position_title,set_value('position_title')); ?><br />
                            <?php echo form_error('position_title', '<span class="ferror">', '</span>'); ?>
                      </fieldset>
                      <fieldset>
                             <label>JOB TYPE:</label>							
                            <select name="job_type">
                <option value="<?php echo $j->job_type; ?>" <?php echo set_select('job_type','$j->job_type', TRUE); ?>><?php echo $j->job_type; ?></option>           
				<option value="Internal" <?php echo set_select('job_type','Internal', TRUE); ?> >Internal</option>
                 <option value="External" <?php echo set_select('job_type','External', TRUE); ?> >External</option>           
                            </select>
                      </fieldset>
                       <fieldset>
                             <label>Numbers Position:</label>							
                            <select name="number_position">
                            <?PHP for($i=20;$i>=1;$i--){ ?>
				<option value="<?php echo $i; ?>" <?php echo set_select('number_position',$i, TRUE); ?> >
                <?php echo $i." &nbsp;&nbsp;Position"; ?>
                </option>
                            <?php } ?>
                             <option value="<?php echo $j->number_position; ?>" <?php echo set_select('number_position','$j->number_position', TRUE); ?>><?php echo $j->number_position." &nbsp;&nbsp;Position"; ?></option>
                            </select>
                      </fieldset>
                      <fieldset>
                             <label>Functional Area:</label>							
                            <select name="functional_area">
           <option value="<?php echo $j->functional_area; ?>" <?php echo set_select('functional_area','$j->functional_area', TRUE); ?>><?php echo $j->functional_area; ?></option>
            <option value="Account/Finance" <?php echo set_select('functional_area','Account/Finance', TRUE); ?>>Account/Finance</option>
            <option value="Administrative" <?php echo set_select('functional_area','Administrative', TRUE); ?>>Administrative</option>
            <option value="Agriculture" <?php echo set_select('functional_area','Agriculture', TRUE); ?>>Agriculture</option>
            <option value="Airline/Aviation" <?php echo set_select('functional_area','Airline/Aviation', TRUE); ?>>Airline/Aviation</option>
            <option value="Architecture" <?php echo set_select('Architecture','', TRUE); ?>>Architecture</option>
            <option value="Banking" <?php echo set_select('functional_area','Banking', TRUE); ?>>Banking</option>
            <option value="Construction" <?php echo set_select('functional_area','Construction', TRUE); ?>>Construction</option>
            <option value="Consulting" <?php echo set_select('functional_area','Consulting', TRUE); ?>>Consulting</option>
            <option value="Economic Growth" <?php echo set_select('functional_area','Economic Growth', TRUE); ?>>Economic Growth</option>
            <option value="Education" <?php echo set_select('functional_area','Education', TRUE); ?>>Education</option>
            <option value="Engineering" <?php echo set_select('functional_area','Engineering', TRUE); ?>>Engineering</option>
            <option value="General" <?php echo set_select('functional_area','General', TRUE); ?>>General</option>
            <option value="Government" <?php echo set_select('functional_area','Government', TRUE); ?>>Government</option>
            <option value="Health/Medical" <?php echo set_select('functional_area','Health/Medical', TRUE); ?>>Health/Medical</option>
            <option value="Human Resource" <?php echo set_select('functional_area','Human Resource', TRUE); ?>>Human Resource</option>
            <option value="Internships" <?php echo set_select('functional_area','Internships',TRUE); ?>>Internships</option>
            <option value="IT - Hardware" <?php echo set_select('functional_area','IT - Hardware', TRUE); ?>>IT - Hardware</option>
            <option value="IT - Software" <?php echo set_select('functional_area','IT - Software', TRUE); ?>>IT - Software</option>
            <option value="Legal" <?php echo set_select('functional_area','Legal', TRUE); ?>>Legal</option>
            <option value="Logistics" <?php echo set_select('functional_area','Logistics', TRUE); ?>>Logistics</option>
            <option value="M &amp; E" <?php echo set_select('functional_area','M &amp; E', TRUE); ?>>M &amp; E</option>
            <option value="Management" <?php echo set_select('functional_area','Management', TRUE); ?>>Management</option>
            <option value="Manufacturing" <?php echo set_select('functional_area','Manufacturing', TRUE); ?>>Manufacturing</option>
            <option value="Mechanic" <?php echo set_select('functional_area','Mechanic', TRUE); ?>>Mechanic</option>
            <option value="Media" <?php echo set_select('functional_area','Media', TRUE); ?>>Media</option>
            <option value="Mining" <?php echo set_select('functional_area','Mining', TRUE); ?>>Mining</option>
            <option value="Photography" <?php echo set_select('functional_area','Photography', TRUE); ?>>Photography</option>
            <option value="Procurement" <?php echo set_select('functional_area','Procurement', TRUE); ?>>Procurement</option>
            <option value="Public Relations" <?php echo set_select('functional_area','Public Relations', TRUE); ?>>Public Relations</option>
            <option value="Research/Survey" <?php echo set_select('functional_area','Research/Survey', TRUE); ?>>Research/Survey</option>
            <option value="Sales/Marketing" <?php echo set_select('functional_area','Sales/Marketing', TRUE); ?>>Sales/Marketing</option>
            <option value="Security/Safety" <?php echo set_select('functional_area','Security/Safety', TRUE); ?>>Security/Safety</option>
            <option value="Services" <?php echo set_select('functional_area','Services', TRUE); ?>>Services </option>
            <option value="Telecom/Engineering" <?php echo set_select('functional_area','Telecom/Engineering', TRUE); ?>>Telecom/Engineering</option>
            <option value="Training" <?php echo set_select('functional_area','Training', TRUE); ?>>Training</option>
            <option value="Translation" <?php echo set_select('functional_area','Translation', TRUE); ?>> Translation</option>
            <option value="Transportation" <?php echo set_select('functional_area','Transportation', TRUE); ?>>Transportation</option>
            <option value="Travel/Tourism" <?php echo set_select('functional_area','Travel/Tourism', TRUE); ?>>Travel/Tourism</option>
          <option value="<?php echo $j->functional_area; ?>" <?php echo set_select('functional_area','$j->functional_area', TRUE); ?>><?php echo $j->functional_area; ?></option>

                          </select>
                      </fieldset>
                      <fieldset>
					 <label>Province:</label>
					  		<select name="province">
              <option value="Badakhshan" <?php echo set_select('province','Badakhshan', TRUE); ?>>Badakhshan</option>
              <option value="Badghis" <?php echo set_select('province','Badghis', TRUE); ?>>Badghis</option>          
              <option value="Baghlan" <?php echo set_select('province','Baghlan', TRUE); ?>>Baghlan</option>
              <option value="Balkh" <?php echo set_select('province','Balkh', TRUE); ?>>Balkh</option>
              <option value="Bamian" <?php echo set_select('province','Bamian', TRUE); ?>>Bamian</option>
              <option value="Daikondi" <?php echo set_select('province','Daikondi', TRUE); ?>>Daikondi</option>
              <option value="Farah" <?php echo set_select('province','Farah', TRUE); ?>>Farah</option>
              <option value="Faryab" <?php echo set_select('province','Faryab', TRUE); ?>>Faryab</option>          
              <option value="Ghazni" <?php echo set_select('province','Ghazni', TRUE); ?>>Ghazni</option>
              <option value="Ghowr" <?php echo set_select('province','Ghowr', TRUE); ?>>Ghowr</option>
              <option value="Helmand" <?php echo set_select('province','Helmand', TRUE); ?>>Helmand</option>
              <option value="Herat" <?php echo set_select('province','Herat', TRUE); ?>>Herat</option>
              <option value="Jowzjan" <?php echo set_select('province','Jowzjan', TRUE); ?>>Jowzjan</option>
              <option value="Kabul" <?php echo set_select('province','Kabul', TRUE); ?>>Kabul</option>
              <option value="Kandahar" <?php echo set_select('province','Kandahar', TRUE); ?>>Kandahar</option>
              <option value="Kapisa" <?php echo set_select('province','Kapisa', TRUE); ?>>Kapisa</option>
              <option value="Khost" <?php echo set_select('province','Khost', TRUE); ?>>Khost</option>
              <option value="Konar" <?php echo set_select('province','Konar', TRUE); ?>>Konar</option>
              <option value="Kundoz" <?php echo set_select('province','Kundoz', TRUE); ?>>Kunduz</option>
              <option value="Laghman" <?php echo set_select('province','Laghman', TRUE); ?>>Laghman</option>          
              <option value="Logar" <?php echo set_select('province','Logar', TRUE); ?>>Logar</option>
              <option value="Nengarhar" <?php echo set_select('province','Nengarhar', TRUE); ?>>Nengarhar</option>
              <option value="Nimruz" <?php echo set_select('province','Nimruz', TRUE); ?>>Nimruz</option>
              <option value="Nurestan" <?php echo set_select('province','Nurestan', TRUE); ?>>Nuristan</option>
              <option value="Oruzgan" <?php echo set_select('province','Oruzgan', TRUE); ?>>Oruzgan</option>
              <option value="Paktia" <?php echo set_select('province','Paktia', TRUE); ?>>Paktia</option>          
              <option value="Paktika" <?php echo set_select('province','Paktika', TRUE); ?>>Paktika</option>
              <option value="Panjshir" <?php echo set_select('province','Panjshir', TRUE); ?>>Panjshir</option>
              <option value="Parwan" <?php echo set_select('province','Parwan', TRUE); ?>>Parwan</option>
              <option value="Samangan" <?php echo set_select('province','Samangan', TRUE); ?>>Samangan</option>
              <option value="Sar-e Pol" <?php echo set_select('province','Sar-e Pol', TRUE); ?>>Sar-e Pol</option>
              <option value="Takhar" <?php echo set_select('province','Takhar', TRUE); ?>>Takhar</option>          
              <option value="Wardak" <?php echo set_select('province','Wardak', TRUE); ?>>Wardak</option>
              <option value="Zabul" <?php echo set_select('province','Zabul', TRUE); ?>>Zabul</option>
               <option value="<?php echo $j->province; ?>" <?php echo set_select('province','$j->province', TRUE); ?>><?php echo $j->province; ?></option>          
        </select>        
                      </fieldset> 
                         <fieldset>
				<?php	echo form_checkbox('travel_province', 1,$j->travel_province ,set_checkbox('travel_province', '1')); ?>
                     Require Trvael To Other Province ?                     
                     </fieldset> 
                      <fieldset>
                        <label>Publish Date</label>
                    <input type="text" name="publish_date" value="<?php echo $j->publish_date; ?>" id="publish_date"  />
                       <!-- <PHP echo form_input('publish_date',$j->publish_date,set_value('publish_date')); ?> --> <br />
                        <?php echo form_error('publish_date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>  
                     <fieldset>
                        <label>Expire Date</label>
                      <input type="text" name="expire_date" value="<?php echo $j->expire_date; ?>" id="expire_date"  />  
						<!--<PHP echo form_input('expire_date',$j->expire_date,set_value('expire_date')); ?> --> <br />
                            <?php echo form_error('expire_date', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
                     <fieldset>
                     <label>Contract Type</label>
                     <select name="contract_type">
                     <option value="Short Term" <?php echo set_select('contract_type','Short Term', TRUE); ?>>Short Term</option>
                     <option value="Permanent" <?php echo set_select('contract_type','Permanent', TRUE); ?>>Permanent</option>
     				 <option value="<?php echo $j->contract_type; ?>" <?php echo set_select('contract_type','$j->contract_type', TRUE); ?>><?php echo $j->contract_type; ?></option>          

                     </select>                 
                     </fieldset> 
                     <fieldset>
                     <label>Work Type</label>
                     <select name="work_type">
                     <option value="Full Time" <?php echo set_select('work_type','Full Time', TRUE); ?>>Full Time</option>
                     <option value="Part Time" <?php echo set_select('work_type','Part Time', TRUE); ?>>Part Time</option>
     				 <option value="<?php echo $j->work_type; ?>" <?php echo set_select('work_type','$j->work_type', TRUE); ?>><?php echo $j->work_type; ?></option>          

                     </select>                 
                     </fieldset> 
                     <fieldset>
                        <label>Probition Period</label>
                      <select name="probition_period">
                    <option value="One month probation" <?php echo set_select('probition_period','One month probation', TRUE); ?>>One month probation</option>
                    <option value="2 months probation" <?php echo set_select('probition_period','2 months probation', TRUE); ?>>2 months probation</option>
                    <option value="3 months probation" <?php echo set_select('probition_period','3 months probation', TRUE); ?>>3 months probation</option>
                    <option value="6 months probation" <?php echo set_select('probition_period','6 months probation', TRUE); ?>>6 months probation</option>
                <option value="<?php echo $j->probition_period; ?>" <?php echo set_select('probition_period','$j->probition_period', TRUE); ?>><?php echo $j->probition_period; ?></option>          

                    </select>                  
                     </fieldset>
                     <fieldset>
                        <label>Duration</label>
                        <?PHP echo form_input('duration',$j->duration,set_value('duration')); ?><br />
                            <?php echo form_error('duration', '<span class="ferror">', '</span>'); ?>                   
                     </fieldset> 
                     <fieldset>
                        <label>Nationality</label>
                        <select name="nationality">
                        <option value="Any"  <?php echo set_select('nationality','Any', TRUE); ?>>Any</option>
                        <option value="Afghan" <?php echo set_select('nationality','Afghan', TRUE); ?>>Afghan</option>
                  <option value="<?php echo $j->nationality; ?>" <?php echo set_select('nationality','$j->nationality', TRUE); ?>><?php echo $j->nationality; ?></option>          

                         </select>                  
                     </fieldset> 
                     <fieldset>
                        <label>Gender</label>
                        <select name="gender">
                        <option value="Male" <?php echo set_select('gender','Male', TRUE); ?>>Male</option>
                        <option value="Female" <?php echo set_select('gender','Female', TRUE); ?>>Female</option>
						<option value="<?php echo $j->gender; ?>" <?php echo set_select('gender','$j->gender', TRUE); ?>><?php echo $j->gender; ?></option>          

                         </select>                  
                     </fieldset> 
                     <fieldset>
                        <label>Salary</label>
                        <?PHP echo form_input('salary',$j->salary,set_value('salary'))."<br>"; 
						echo form_checkbox('salry_negotiable', 1,$j->salry_negotiable,set_checkbox('salry_negotiable', '1')); ?>
                        Salary is negotiable                                           
                     </fieldset> 
                      <fieldset>
                             <label>Experience:</label>							
                            <select name="experience">
                           
                            <?PHP for($i=20;$i>=1;$i--){ ?>
				<option value="<?php echo $i; ?>" <?php echo set_select('experience',$i, TRUE); ?> >
                <?php echo $i." &nbsp;&nbsp;years"; ?>
                </option>

                            <?php } ?>
                             <option value="Fresh" <?php echo set_select('experience','Fresh', TRUE); ?>>Fresh</option>
                             <option value="<?php echo $j->experience; ?>" <?php echo set_select('experience','$j->experience', TRUE); ?>><?php echo $j->experience." &nbsp;&nbsp;years"; ?></option>          

                            </select>
                      </fieldset>
                      <fieldset>
                        <label>Education</label>
                       <select name="education">
            <option value="Primary Education" <?php echo set_select('education','Primary Education', TRUE); ?>>Primary Education</option>
            <option value="High School" <?php echo set_select('education','High School', TRUE); ?>>High School</option>
            <option value="Diploma" <?php echo set_select('education','Diploma', TRUE); ?>>Diploma</option>
            <option value="Bachelors Degree" <?php echo set_select('education','Bachelors Degree', TRUE); ?>>Bachelors Degree</option>
            <option value="Masters Degree" <?php echo set_select('education','Masters Degree', TRUE); ?>>Masters Degree</option>
            <option value="Doctorate" <?php echo set_select('education','Doctorate', TRUE); ?>>Doctorate</option>
			<option value="<?php echo $j->education; ?>" <?php echo set_select('education','$j->education', TRUE); ?>><?php echo $j->education; ?></option>          
 
                  </select>                 
                     </fieldset> 
                     <fieldset>
                        <label>Education Field</label>
                        <?PHP echo form_input('education_field',$j->education_field,set_value('education_field')); ?> <br />
                            <?php echo form_error('education_field', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset> 
                     <fieldset>
                        <label>Skills Required</label>
                        <?PHP echo form_textarea('skills_required',$j->skills_required,set_value('skills_required')); ?><br />
                            <?php echo form_error('skills_required', '<span class="ferror">', '</span>'); ?>                   
                     </fieldset> 
                     <fieldset>
                        <label>Language Required</label>
                        <?PHP echo form_input('language_required',$j->language_required,set_value('language_required')); ?><br />
                            <?php echo form_error('language_required', '<span class="ferror">', '</span>'); ?>                   
                     </fieldset> 
                     <fieldset>
                        <label>Duties &amp; Responsibilities</label>
                        <?PHP echo form_textarea('duties',$j->duties,set_value('duties')); ?> <br />
                            <?php echo form_error('duties', '<span class="ferror">', '</span>'); ?>                  
                     </fieldset>
                     <fieldset>
                        <label>Qualification</label>
                        <?PHP echo form_textarea('qualification',$j->qualification,set_value('qualification')); ?>
                        <br />
                            <?php echo form_error('qualification', '<span class="ferror">', '</span>'); ?>                   
                     </fieldset> 
                       <fieldset>
                       <input type="hidden" name="jid" id="jid" value="<?php echo $j->jid; ?>"  />
                            <?PHP echo validation_errors('<span class="ferror"></span>'); ?>
                            <?PHP echo form_submit('submit','Save') ; ?>
                            </fieldset>
                          <?PHP echo form_close(); } ?>
				</div>
                </article>		
           </section>
</div>
</body>
</html>
 