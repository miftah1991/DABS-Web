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


        <div class="row" >    
 
              <table align="right"><tr><td>
                 
                  <?php   echo form_open(base_url()."admin/Province_info/SearchProvinceInfo"); ?>
                  <input type="text" placeholder="Search" name="search" />
                  <input type="submit" value="Search" class="success button" />
                  </form>
                  </td>
                  </tr>
              </table>
        </div>

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
                    <header>
                      <h3 class="tabs_involved">Province Information Manager</h3></header>
                    <div class="">
                    <div id="tab1" class="tab_content">
		            <table width="713" cellspacing="0" class="tablesorter">
                    <thead>
                    <tr>
                      <th width="33">No</th>
                      <th width="137">Province</th>
                      <th width="211">Language Id</th>
                      <th width="116" class="tex">Insert Date</th>
                      <th width="31">File</td>
                     <!-- <th width="31">SEND</td>  -->
   					          <th width="49">Delete</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
					foreach($Province_info as $row):
					?>
                    <tr>
                      <td><?PHP echo $row->info_id; ?></td>
                      <td><?PHP echo $row->province; ?></td>
                      <td><?PHP echo $row->language_id; ?></td>
                  
                      <td><?PHP echo $row->insert_date; ?></td>
                      <td><?PHP echo $row->file; ?></td>
                      
                   <!--  <td><a href="<php echo base_url(); ?>admin/Tender/SendtoSubscrib/<PHP echo $row->tid; ?>">
					 SEND</a></td>   -->
                      <td><a href="<?php echo base_url(); ?>admin/Province_info/Delete/<?PHP echo $row->info_id; ?>" onclick="return confirm('Are you sure to delete Province Information?');">
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
