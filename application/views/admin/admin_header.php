<?PHP
	/* 
	$userid = $this->session->userdata('userid');
	if(!$userid)
	{
		$userid = get_cookie("usercookie");
	}
	
	if($userid=="")	// || !(isset($this->session->userdata('username'))) || !($this->session->userdata('username')))
	{
		redirect(base_url().'edara/login');
	}
	*/
?>
    <header id="header">
            <hgroup>
                <h1 class="site_title"><a href="<?=base_url()?>edara">Website Admin</a></h1>
                <h2 class="section_title"></h2><div class="btn_view_site"><a href="<?=base_url();?>" target="_blank">View Site</a></div>
            </hgroup>
    </header>



	<section id="secondary_bar">
		<div class="user">
			<p><?PHP echo "Admin";?> <a <a href="<?=base_url()?>users/logout/index">(log Out</a> | <?=anchor(base_url()."users/change_password/".$this->session->userdata('userid'),"Change Password")?>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
        &nbsp;&nbsp;&nbsp;
         		
        
		<!--	<article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article> -->
		</div>
	</section><!-- end of secondary bar -->
	