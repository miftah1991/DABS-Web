<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<link rel="icon" href="<?php echo base_url()?>./icons/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 

<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Cache-control" content="no-store">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url()?>./css/layout.css" type="text/css" media="screen" /> 
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--> 
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
            	<article class="module width_3_quarter">
                    <header><h3 class="tabs_involved">Language Manager</h3></header>
                    <div class="">
                    <div id="tab1" class="tab_content">
		            <table class="tablesorter" cellspacing="0">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Language</th>
                      <th>Code</th>
                      <th>Alignment</th>
                      <th>Align</th>
                      <th>Default Language</th>
                      <th>Visible</th>
                      <th>Edit</td>
   					  <th>Delete</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
					foreach($langs as $row):
					?>
                    <tr>
                      <td><?PHP echo $row->language_id; ?></td>
                      <td><?PHP echo $row->language; ?></td>
                      <td><?PHP echo $row->code; ?></td>
                      <td><?PHP echo $row->alignment; ?></td>
                      <td><?PHP echo $row->align; ?></td>
                      <td><?PHP echo $row->default_language; ?></td>
                      <td><?PHP echo $row->visible; ?></td>
                      <td><a href="<?php echo base_url(); ?>admin/language/Edit/<?PHP echo $row->language_id; ?>">
					 Edit</a></td>
                      <td><a href="<?php echo base_url(); ?>admin/language/Delete/<?PHP echo $row->language_id; ?>" onclick="return confirm('Are you sure to delete Language?');">
					 Delete</a></td>
                    </tr>
                    <?PHP
					endforeach;
					?></tbody>
                </table>
                </div>
                </div>
                </article>
                
                </section>

    </div>
</body>
</html>
