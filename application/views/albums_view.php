<?PHP $find = array('\"', "\'"); $target = array("","'"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?PHP if($lng->alignment=='Right'){ $dir = 'dir="rtl"'; } else { $dir ='dir="ltr"'; } ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?=$dir?>>
<head>

<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Cache-control" content="no-store">

<link rel="icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="<?=base_url()?>icons/favicon.ico" type="image/x-icon" /> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<?PHP require_once("css-js-files.php")?>
     
<title><?=$this->config->item('site_title')?></title>
</head>
<body>
<div class="main_container">
<div class="sub_container"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="padding-bottom:20px;"><img src="images/logo.png" width="248" height="170" /></td>
      </tr>
      <tr>
      <?PHP if(((isset($left_sections) && $left_sections!="") || (isset($left_contents) && $left_contents!=""))){ ?><td class="left">
				<?=isset($left_sections)?str_replace($find,$target,strip_slashes($left_sections)):""?>
              	<?=isset($left_contents)?str_replace($find,$target,strip_slashes($left_contents)):""?>
       </td> <?PHP } ?>
      </tr>
    </table></td>
    
    <td class="sub-content"><?=$this->load->view('header')?><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="content">
    
    
    <div class="title head"><?PHP echo $dictionary->albums; ?></div>
            <div id="navigation">
                <div class="nav-left">
                  <?PHP if($tot_records > $perpage): ?>
                  <?PHP if($this->uri->segment(2) > 0): ?>
                 <span class="first"> <a href="<?=base_url().$this->uri->segment(1)?>"><?=$dictionary->first?></a></span>
                  <?PHP if($this->uri->segment(2) >= 3): ?>
                  <span class="previous"><a href="<?=base_url().$this->uri->segment(1)."/".($this->uri->segment(2)-12)?>"><?=$dictionary->previous?></a></span>
                  <?PHP else: ?>
                 <span class="previous"><a href="<?=base_url().$this->uri->segment(1)?>"><?=$dictionary->previous?></a></span>
                  <?PHP endif; ?>
                  <?PHP else: ?>
                  <span class="first-deactive"><?=$dictionary->first?></span>
                  <span class="previous-deactive"><?=$dictionary->previous?></span>
                  <?PHP endif; ?>
                </div>
                <div class="nav-right">
                  <?PHP if($this->uri->segment(2) < ($tot_records-12)): ?>
                  <span class="next"><a href="<?=base_url().$this->uri->segment(1)."/".($this->uri->segment(2)+12)?>"><?=$dictionary->next?></a></span>
                  <span class="last"><a href="<?=base_url().$this->uri->segment(1)."/".($tot_records-12)?>"><?=$dictionary->last?></a></span>
                  <?PHP else: ?>
                  <span class="next-deactive"><?=$dictionary->next?></span>
                  <span class="last-deactive"><?=$dictionary->last?></span>
                  <?PHP endif; ?>
                  <?PHP endif; ?>
                </div>
              </div>
          <br clear="all" />
            
                <?PHP
								$id = "";
								foreach($records as $row)
								{
									if($id!==$row->album_id)
									{
										
									$ext = substr(strrchr($row->image, '.'), 1);
									$name = substr($row->image,0,strlen($row->image)-(strlen($ext)+1));
									$thumb = 'uploads/'.$name."_thumb.".$ext;
									if( ! file_exists($thumb) )
									{
										$thumb = 'images/no-image.jpeg';
									}
									$timestamp = strtotime($row->dated);
									$newdate = date("Y-m-d", $timestamp);
									$title = "Title : " . $row->title . "\n" . "Dated : " . $newdate;
									$div = '<img src="'.base_url().$thumb.'" height="110" width="160" alt="$row->title" " />';
									?>
										<?PHP //if( file_exists($thumb) ){ ?>
						                <div class="album-area"><div align="center" class="album-thumb" title="<?=$title?>">
						                	<?PHP 
						                  		echo anchor(base_url().$row->custom_url,$div);
												
											?>
                                            <div class="album_title" style="text-overflow:ellipsis;"><?PHP 
						                  		echo $row->title;
											?>sdfsdfdsfsdf adsf asd fa fad fasd fas asf asdfads fads fds </div>
						                </div></div>
						                <?PHP //} ?>
					                <?PHP
									}
									$id = $row->album_id;
								} 
							?>
    
    </td>
    <?PHP if(((isset($right_sections) && $right_sections!="") || (isset($right_contents) && $right_contents!=""))){ ?><td class="right">
				<?=isset($right_sections)?str_replace($find,$target,strip_slashes($right_sections)):""?>
              	<?=isset($right_contents)?str_replace($find,$target,strip_slashes($right_contents)):""?>
       </td> <?PHP } ?>
  </tr>
</table>
</td>
  </tr>
</table>	
</div>
<?=$this->load->view('footer')?>
</div>

</body>
</html>