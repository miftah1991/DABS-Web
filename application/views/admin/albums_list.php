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
                    <header><h3 class="tabs_involved">Album Manager</h3></header>
                    
                    <div class="module_content">
                    <form method="post" action="<?php echo base_url(); ?>admin/albums/reorder">
                    <table>
                    <tr>
                    <td>
                                <?PHP
								$id = "";
								$i	= 0;
								foreach($records as $row)
								{
									if($id!==$row->album_id)
									{
										$ext = substr(strrchr($row->image, '.'), 1);
										$name = substr($row->image,0,strlen($row->image)-(strlen($ext)+1));
										$thumb = 'uploads/gallery/'.$name."_thumb.".$ext;
										if( ! file_exists($thumb) )
										{
											$thumb = 'uploads/gallery/no-image.jpeg';
										}
										$timestamp = strtotime($row->dated);
										$newdate = date("Y-m-d", $timestamp);
										$title = "Title : " . $row->title . "\n" . "Dated : " . $newdate;
										$div = '<img src="'.base_url().$thumb.'" height="144" width="144" alt="$row->title" style="margin-top:3px" />';
										?>
										<div align="center" style="width:150px; height:250px; float:left; border:2px solid; border-color:#999999; margin:17px" title="<?=$title?>">
										<?PHP 
											echo anchor(base_url()."admin/images/list_images/".$row->album_id."/".$row->title,$div);
											echo $row->title . '<br clear="all" />';
										?>
										<a onclick="return confirm('Are you sure to delete album?')" href="<?php echo base_url().'admin/albums/delete_album/'.$row->album_id ?>">Remove</a><br clear='all' />
										<?PHP 
											echo anchor(base_url()."admin/albums/edit_album/".$row->album_id,"Edit");
										?>
										<br clear='all' />
										Order: <input type="text" size="4" name="order<?=$i?>" value="<?=$row->ordr?>" />
										<input type="hidden" name="id<?=$i?>" value="<?=$row->album_id?>" />
										<br clear='all' />
										Visible: <input type="checkbox" <?=$row->visible?'checked="checked"':''?> name="check<?=$i?>" value="1" />
										</div>
										<?PHP
									}
									$i++;
									$id = $row->album_id;
								} 
							?>
                     </td>
                     </tr>
                     </table>
                     <input type="hidden" name="total" value="<?=$i?>" />
                     <input type="submit" value="Save" />
                    </form>
              	 	</div>
                    
               </article>
          </section>
	</div>
</body>
</html>
