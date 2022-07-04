<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DABS | Welcome</title>
	
	<link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
     
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/app.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/docs.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jssor.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style2.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url()?>./css/layout.css" type="text/css" media="screen" />
      <!--   <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" />
        
    
        
       this is only to get classes in dream viewer -->
    <!--   <link rel="stylesheet" href="../../css/foundation.css" />
      <link rel="stylesheet" href="../../css/app.css" />  -->
<script src="<?php echo base_url(); ?>js/jssor.js"></script>

      <style>
#circlse
{
border-radius:50% 50% 50% 50%;  
width:120px;
height:120px;
}
body{
	overflow-x:hidden;
}
.dropdown.menu .is-dropdown-submenu-parent.is-right-arrow > a::after{
	border-style: none;
}
.dropdown.menu .submenu > li a {
    
    width: 200px;
}
</style>
  </head>
 
<body>
	<div id="container">
				<?PHP $this->load->view('admin/admin_header') ?>
                <?PHP $this->load->view('admin/admin_left') ?>  


	<section id="main" style="padding: 20px;">
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
            	
				<div ><h4>Complaints Manager</h4></div>
				<div align="right">
                  <a class="button" href="<?=base_url()?>admin/excel_export/action" style="color:black; font-size:1.1em;">Export to Excel</a>
				 </div>
		            <table class="hover stack">
                    <thead>
                    <tr style="background-color: #E0E0E3;" valign="top">
                      <th style="background-color: #E0E0E3;">#</th>
                      <th>Name</th>
                      <th>Phone Number</th>
					  <th width="30px">Email</th>
					  <th>Account Number</th>
                      <th>Complaint Group</th>
					  <th>Complaint Type</th>
					  <th>Comment</th>
					  <th>Specific Address</th>
					  <th>Breshna Respond</th>
					  <th>date</th>

					  <!--
                      <th>Edit</td>
   					  <th>Delete</td>
					  -->
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
					foreach($complaints as $n):
					?>
                    <tr <?php if($n->language!=1){ ?> dir="rtl" <?php } ?>  valign="top">
					  <td style="background-color: #E0E0E0;"><?PHP echo $n->id?></td>
                      <td><?PHP echo $n->name; ?></td>
                      <td><?PHP echo $n->phone_number; ?></td>
					  <td><?PHP echo $n->email; ?></td>
					  <td><?PHP echo $n->bill_number; ?></td>
                      <td><?PHP echo $n->complaint_group; ?></td>
					  <td><?PHP echo $n->complaint_type; ?></td>
					  <td><?PHP echo $n->comments; ?></td>
					  <td><?PHP echo $n->specific_address; ?></td>
					  <td><?PHP echo $n->breshna_respond; ?></td>
					  <td><?PHP echo $n->date; ?></td>
                      
                      
                      <!--
                      <td><a href="<?php echo base_url(); ?>admin/Complaints/EditComplaints/<?PHP echo $n->id; ?>">
					 Edit</a></td>              
                      <td><a href="<?php echo base_url(); ?>admin/Complaints/Delete/<?PHP echo $n->id; ?>" onclick="return confirm('Are you sure to delete Articles?');">
					 Delete</a></td>
					 -->
                    </tr>
                    <?PHP
					endforeach;
					?></tbody>
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
             
                </section>
				<div class="large-1 medium-1 small-1 columns">&nbsp;</div>

    </div>
	
   <script src="<?php echo base_url(); ?>js/vendor/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/what-input.min.js"></script>
    <script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
    <script src="<?php echo base_url(); ?>js/app.js"></script>
    <script src="<?php echo base_url(); ?>js/docs.js"></script>
</body>
</html>
