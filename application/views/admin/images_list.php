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

			<?PHP if($this->session->flashdata("msg")!=""): ?>
                <h4 class="alert_success"><?PHP echo $this->session->flashdata("msg"); ?></h4>
            <?PHP endif; ?>

            	<article class="module width_full">
                    <header><h3 class="tabs_involved">Images Manager</h3></header>
                    	
							<?PHP
								echo anchor(base_url()."admin/images/add_images/".$this->uri->segment(4)."/".$this->uri->segment(5)," Add images to Album '". $album->title ."'");
								?>
                                <br clear="all" />
                        <div class="module_content">
            <form name="order_form" id="order_form" method="post" action="<?php echo base_url() ?>admin/images/reorder" >
                        <table>
                        <tr>
                        <td>
                        
                                <?PHP
								$i = 0;
								foreach($records as $row)
								{
									$ext = substr(strrchr($row->image, '.'), 1);
									$name = substr($row->image,0,strlen($row->image)-(strlen($ext)+1));
									$thumb = $name."_thumb.".$ext;
									
									
										$timestamp = strtotime($row->dated);
										$newdate = date("Y-m-d", $timestamp);
										$title = "Title: " . $row->title . "\n" . "Dated: " . $newdate ."\nDesc : ".$row->description;
								?>
                                	<div align="center" style="width:auto; height:250px; float:left; border:2px solid; border-color:#999999; margin:11px">
                                    	<center>
                                    	<img src="<?PHP echo base_url(); ?>uploads/gallery/<?PHP echo $thumb; ?>" height="150" width="150" alt="<?=$title?>" title="<?=$title?>" style="margin:4px" />
                                        <br clear="all" />
                                        <?=$row->title?><br clear="all" />
        <?PHP echo anchor(base_url()."admin/images/remove_image/".$row->image,"Remove"); ?><br clear="all" />
      <?PHP echo anchor(base_url()."admin/images/edit_image/".$row->image_id.'/'.$this->uri->segment(3),"Edit"); ?><br clear="all" />
                                        Order:
                                        <input type="text" size="4" name="order<?=$i?>" value="<?=$row->ordr?>" />
                                        <input type="hidden" name="id<?=$i?>" value="<?=$row->image_id?>" />
                                        </center>
                                    </div>
                                <?PHP $i++;
								}
							?>
                            
                       </td>
                       </tr>
                       </table>
                       <input type="hidden" name="total" value="<?=$i?>" />
                       <input type="submit" value="Re Order" />
                       </form>
                       </div>
               </article>
          </section>
</div>
</body>
</html>
