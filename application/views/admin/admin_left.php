

<?php

if( isset($usrper))
{

 foreach($usrper as $u) {?>
<aside id="sidebar" class="column">
		<?php  if($u->media ==1){ ?>
		<h3>Media/File Managment</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="<?=base_url()?>admin/Media/">View Media/File</a></li>
			
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/Media/AddMedia">Add New Media File</a></li>
            
		</ul>
        <?php } ?>

        <?php  if($u->articles ==1){ ?>
            <h3>ARTICLES</h3>
		<ul class="toggle">
        	
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/articles/AddArticle">Add ARTICLE</a></li>
            	
     	  <li class="icn_folder"><a href="<?=base_url()?>admin/Articles/">View ARTICLES</a></li>
		</ul>
       <?php } ?>

        <?php  if($u->language ==1){ ?>
        <h3>Language</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="<?=base_url()?>admin/language/">View Language</a></li>
			<li class="icn_new_article"><a href="<?=base_url()?>admin/language/AddLanguage">Add New Language</a>
			
            </li>
			<li class="icn_categories"><a href="<?=base_url()?>Dictionary/load_dictionary">Website Dictionary</a>
		  	
            	</li>
			<li class="icn_new_article"><a href="<?=base_url()?>Dictionary/load_job_dictionary">Jobs Table Dictionary</a></li>
			<li class="icn_new_article"><a href="<?=base_url()?>Dictionary/load_tend_dictionary">Tenders Dictionary</a></li>
		</ul>
        <?PHP
			$language_id = $this->session->userdata("languageid");

		?>
        <?php } ?>
		<?php  if($u->menu ==1){ ?>
	<h3>Menu</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="<?=base_url()?>admin/menu/">View Menu</a></li>
			
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/menu/MenuAdd/">Add New Menu Item</a></li>
            
</ul>/
		<?php } ?>
		<?php  if($u->pages ==1){ ?>
        <h3>Pages</h3>
		<ul class="toggle">
			
       	  <li class="icn_add_user"><a href="<?=base_url()?>admin/pages/page_addForm">Add New Page</a></li>
            
		  <li class="icn_view_users"><a href="<?=base_url()?>admin/pages/list_pages">View Pages</a></li>
		</ul>
		<?php } ?>
		<?php  if($u->jobs ==1){ ?>
        <h3>JOBS</h3>
		<ul class="toggle">
        	
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/job/AddJobForm">Add New JOB</a></li>
            	
      <li class="icn_folder"><a href="<?=base_url()?>admin/job/list_jobs">View JOBS</a></li>
		</ul>
       <?php } ?>
        <?php  if($u->tenders ==1){ ?>
        <h3>TENDERS</h3>
		<ul class="toggle">
        	
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/tender/AddTender">Add New TENDER</a></li>
            	
      <li class="icn_folder"><a href="<?=base_url()?>admin/Tender/ListTenders">View TENDERS</a></li>
		</ul>
        <?php } ?>
		
        <?php  if($u->contracts_award ==1){ ?>
        <h3>Contracts Award</h3>
		<ul class="toggle">
        	
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/ContractsAward/AddContractsAward">Add New CONTRACTS AWARD</a></li>    	
		  <li class="icn_folder"><a href="<?=base_url()?>admin/ContractsAward/ListContractsAward">View CONTRACTS AWARD</a></li>
		</ul>
        <?php } ?>
		
		<?php  if($u->reports ==1){ ?>
        <h3>REPORTS</h3>
		<ul class="toggle">
        	
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/reports/AddReport">Add New REPORT</a></li>
            	
      <li class="icn_folder"><a href="<?=base_url()?>admin/reports/">View REPORTS</a></li>
		</ul>
           <?php } ?>

            <?php  if($u->news ==1){ ?>
            <h3>NEWS</h3>
		<ul class="toggle">
        	
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/news/AddNews">Add NEWS</a></li>
            	
      <li class="icn_folder"><a href="<?=base_url()?>admin/News/">View NEWS</a></li>
		</ul>
       <?php } ?>

        <?php  if($u->slideshow ==1){ ?>
        <h3>SlideShow</h3>
		<ul class="toggle">
        	
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/Slides/AddSlide">Add New SlideShow Item</a></li>
            	
      <li class="icn_folder"><a href="<?=base_url()?>admin/Slides/">View SlideShow Item</a></li>
		</ul>
        <?php } ?>
		<?php  if($u->messages ==1){ ?>
         <h3>Message</h3>
		<ul class="toggle">
        	
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/Messages/AddMessage">Add New Message</a></li>
            	
      <li class="icn_folder"><a href="<?=base_url()?>admin/Messages/">View Message</a></li>
		</ul>
        <?php } ?>
		<?php  if($u->comments ==1){ ?>
	<h3>Comments / Ideas </h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="<?=base_url()?>admin/comments/view">View Comments / Ideas</a></li>
		</ul>
        <?php } ?>
		<?php  if($u->complaints ==1){ ?>
		<h3>Complaints </h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="<?=base_url()?>admin/Complaints/index">View Customer Complaints</a></li>
		</ul>
        <?php } ?>
		
		<?php  if($u->investments ==1){ ?>
		<h3>Investment Opportunities </h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="<?=base_url()?>admin/Investment/index">View Investment Opportunities</a></li>
			<li class="icn_new_article"><a href="<?=base_url()?>admin/Investment/add">Add Investment Opportunities</a></li>
		</ul>
        <?php } ?>
		
		<?php  if($u->gallery ==1){ ?>
        <h3>Albums</h3>
		<ul class="toggle">
			<li class="icn_photo"><a href="<?php echo base_url(); ?>admin/albums/list_album">View Albums</a></li>
			
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/albums/add_album">Add New Album</a></li>
           
</ul>
	<?php } ?>
	<?php  if($u->magzine ==1){ ?>
      <h3>Magzine</h3>
		<ul class="toggle">
			<li class="icn_photo"><a href="<?php echo base_url(); ?>admin/Magzine/">View Magzine</a></li>
			
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/Magzine/AddMagzine">Add New Magzine</a></li>
           
</ul>
	<?php } ?>
	<?php  if($u->subcribe ==1){ ?>
        <h3>Subscribers</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="<?=base_url()?>subscribe/list_subscriptions">View Subscribers</a></li>
			<li class="icn_settings"><a href="<?=base_url()?>subscribe/send_email">Send Email</a></li>
		</ul>
        <?php } ?>
        <?php  if($u->videos ==1){ ?>
        <h3>Videos</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="<?=base_url()?>admin/Videos/">View Videos</a></li>
			<li class="icn_settings"><a href="<?=base_url()?>admin/Videos/AddVideo">Add Video</a></li>
		</ul>
        <?php } ?>
		<?php  if($u->vote ==1){ ?>
        <h3>Voting</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="<?=base_url()?>admin/questions/list_questions">View Votes</a></li>
			
       	  <li class="icn_settings"><a href="<?=base_url()?>admin/questions/add_question">Create New Vote</a></li>
            	
</ul>
<?php } ?>	
<?php  if($u->users ==1){ ?>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="<?=base_url()?>languages/list_languages">Languages</a></li>
			
       	  <li class="icn_new_article"><a href="<?=base_url()?>languages/new_language">Add new Language</a></li>
            	
		  <li class="icn_settings"><a href="<?=base_url()?>dictionary">Language Dictionary</a></li>
			
       	  <li class="icn_settings"><a href="<?=base_url()?>dictionary/create_dictionary">Set Language Dictionary</a></li>
            
      <!-- <li class="icn_security"><a href="#">Security</a></li> -->
			<li class="icn_jump_back"><a href="<?=base_url()?>users/logout">Logout</a></li>
		</ul>
		<?php } ?>
		<?php  if($u->province_info ==1){ ?>
            <h3>PROVINCE INFO</h3>
		<ul class="toggle">
        	
       	  <li class="icn_new_article"><a href="<?=base_url()?>admin/Province_info/AddProvinceInfo">Add PROVINCE INFO</a></li>
            	
     	  <li class="icn_folder"><a href="<?=base_url()?>admin/Province_info/ListProvinceInfo">View PROVINCE INFO</a></li>
		</ul>
       <?php } ?>
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2011 Website Admin</strong></p>
			<p>Powered by <a href="#">MIS</a></p>
		</footer>
	</aside>
    
<?php } } ?>