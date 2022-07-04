<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 

<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Cache-control" content="no-store">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?=base_url()?>css/layout.css" type="text/css" media="screen" /> 
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--> 
    
<title><?=$this->config->item('site_title')?></title>
</head>
<body>
	<div id="container">
		<?PHP $this->load->view('admin/admin_header') ?>
        <?PHP $this->load->view('admin/admin_left') ?>  


		<section id="main" class="column">
		<?PHP if($this->session->flashdata('msg')){ ?>
          	<h4 class="alert_success">
           		<?PHP 
					echo $this->session->flashdata('msg');
				?>
  			</h4>
        <?PHP } ?>
        		<article class="module width_quarter">
                    <header><h3 class="tabs_involved">Vote Manager</h3></header>
                    <div class="">
                    <div id="tab1" class="tab_content">
		            <table class="tablesorter" cellspacing="0">
                    
					<tr>
						<td>
                            <ul>
                            	<?PHP foreach($languages as $l): ?>
                                	<li><?=anchor("admin/Questions/list_questions/".$l->language_id,$l->language)?></li>
                                <?PHP endforeach; ?>
                            </ul>
                            <?PHP 
								foreach($records as $row):
							?>
                            <table>
                            	<tr>
                                <td><?PHP echo $row->question; ?></td>
                                <td>
                                	<?PHP 
                                	
                                		echo anchor("admin/Questions/remove_question/".$row->question_id,"Delete");
									
                                	?>
                                </td>
                                </tr>
                                <tr>
                                <td colspan="2">
							<?PHP
								$q = $this->db->query("SELECT o.option AS options, COUNT( v.vote_id ) AS votes
														FROM tbl_options o
														LEFT JOIN tbl_votes v ON v.option_id = o.option_id
														WHERE o.question_id ='".$row->question_id."'
														GROUP BY o.option_id");
								if($q->num_rows() > 0)
								{
								?>
                                <table>
                                <?PHP		
									foreach($q->result() as $rw)
									{
									?>
                                    <tr>
										<td><?=$rw->options?></td><td><?=$rw->votes?></td>
                                    </tr>
									<?PHP
									}
								?>
                                </table>
                                <?PHP
								}
							?>	
                            	</td>
                            	</tr>
                             </table>
                             <hr size="1" noshade="noshade" />
                            <?PHP
								endforeach;
							?>
            			</td>						
					</tr>
				</table>
               	</div>
                </div>
                </article>
			</section>
            
</div>
</body>
</html>
