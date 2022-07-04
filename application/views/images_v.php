<style type="text/css">

.gallery ul{padding:0px; margin:0px;}
.gallery li {
        display: inline;
        list-style: none;
        width: 180px;
        min-height: 130px;
        float: left;
        margin: 5px 2px 5px 3px;
        text-align: center;
}

.gallery li img{
	-moz-box-shadow: 10px 10px 5px #888888; /* Firefox 3.6 and earlier */
box-shadow: 2px 2px 5px #888888;
padding:5px;
margin:2px;
background:#fafafa;
	
}

.nav-left{
	float:left;
	width:50%;
	text-align:right;
	padding:5px 0px 7px 0px;
}
.nav-right{
	float:right;
	width:49%;
	text-align:left;
	padding:5px 0px 7px 0px;
}

.albums-thumb-view{
	float:left;
	width:100%;
}
.albums{
	width:132px; height:132px; margin:5px; float:left; padding:5px; 
}

.album-area{
	float:left;
	background:#f6f5f5;
	border:1px solid #dfdfdf;
	padding:5px 1px 5px 5px;
	margin:5px 5px;
	width:180px;
	
}
.album-area:hover{
	background:#e5e5e5;
}
.album-thumb{
	width:150px; 
	float:left;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	height:150px;
	
}
.album-thumb img{
	-moz-box-shadow: 10px 10px 5px #888888; /* Firefox 3.6 and earlier */
box-shadow: 2px 2px 5px #888888;
padding:5px;
margin:2px;
background:#ffffff;

}

.album_title{
	font-family: Verdana, Geneva, sans-serif;
	font-size:11px;
	text-align:left;
	overflow:hidden;
	width:160px;
	height:30px;
	padding:4px 4px;
	white-space: nowrap;
	

}

.album_uppercase{
	color:#cc3938;
	font-weight:600;
	text-align:left;
	font-size:24px;
	text-transform:uppercase
}

.first-deactive{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	color:#E4E4E4;
	padding:5px;
	border:1px solid #CCC;
}

.first{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	color:#666666;
	padding:5px;
	border:1px solid #CCC;
}
.first a:link, .first a:visited, .first a:active{
	color:#666666;
	text-decoration:none;
}
.first a:hover{
	color:#666666;
	text-decoration:underline;
}

.previous-deactive{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	color:#E4E4E4;
	padding:5px;
	border:1px solid #CCC;
}

.previous{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	color:#666666;
	padding:5px;
	border:1px solid #CCC;
}
.previous a:link, .previous a:visited, .previous a:active{
	color:#666666;
	text-decoration:none;
}
.previous a:hover{
	color:#666666;
	text-decoration:underline;
}

.next-deactive{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	color:#E4E4E4;
	padding:5px;
	border:1px solid #CCC;
}

.next{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	color:#666666;
	padding:5px;
	border:1px solid #CCC;
}
.next a:link, .next a:visited, .next a:active{
	color:#666666;
	text-decoration:none;
}
.next a:hover{
	color:#666666;
	text-decoration:underline;
}

.last-deactive{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	color:#E4E4E4;
	padding:5px;
	border:1px solid #CCC;
}

.last{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	color:#666666;
	padding:5px;
	border:1px solid #CCC;
}
.last a:link, .last a:visited, .last a:active{
	color:#666666;
	text-decoration:none;
}
.last a:hover{
	color:#666666;
	text-decoration:underline;
}
.albums-thumb-view{
	float:left;
	width:100%;
}
.albums{
	width:132px; height:132px; margin:5px; float:left; padding:5px; 
}

.album-area{
	float:left;
	background:#f6f5f5;
	border:1px solid #dfdfdf;
	padding:5px 1px 5px 5px;
	margin:5px 5px;
	width:180px;
	
}
.album-area:hover{
	background:#e5e5e5;
}
.album-thumb{
	width:150px; 
	float:left;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	height:150px;
	
}
.album-thumb img{
	-moz-box-shadow: 10px 10px 5px #888888; /* Firefox 3.6 and earlier */
box-shadow: 2px 2px 5px #888888;
padding:5px;
margin:2px;
background:#ffffff;

}

.album_title{
	font-family: Verdana, Geneva, sans-serif;
	font-size:11px;
	text-align:left;
	overflow:hidden;
	width:160px;
	height:30px;
	padding:4px 4px;
	white-space: nowrap;
	

}

.album_uppercase{
	color:#cc3938;
	font-weight:600;
	text-align:left;
	font-size:24px;
	text-transform:uppercase
}

.first-deactive{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	color:#E4E4E4;
	padding:5px;
	border:1px solid #CCC;
}
</style>
<link rel="stylesheet" href="<?=base_url();?>css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
    <script src="<?=base_url();?>js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<?PHP require_once("css-js-files.php")?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:2px;"><h3>PhotoGallery</h3><hr></div>

<div class="large-1 columns">&nbsp;</div>
<div class="row">
<div class="large-1 medium-1 small-1 columns">&nbsp;</div>

<div class="large-10 medium-1 small-1 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">

<div class="albums-thumb-view">
          <div><albumtitle class="head"><?PHP echo ucwords($album->title); ?></albumtitle> <?PHP //echo anchor(base_url()."albums.html",$dictionary->back_to_album); ?></div>
          <div class="con">
            <br clear="all" />
            <div id="main">
              <div id="navigation">
                <div style="width:52%; text-align:right; padding-right:10px; float:left;">
                  <?PHP if($tot_records > $perpage): ?>
                  <?PHP if($this->uri->segment(2) > 0): ?>
                  <span class="first"><a href="<?=base_url().$this->uri->segment(1)?>"><?=$dictionary->first?></a></span>
                  <?PHP if($this->uri->segment(2) >= 3): ?>
                  <span class="previous"><a href="<?=base_url().$this->uri->segment(1)."/".($this->uri->segment(2)-$perpage)?>"><?=$dictionary->previous?></a></span>
                  <?PHP else: ?>
                 <span class="previous"> <a href="<?=base_url().$this->uri->segment(1)?>"><?=$dictionary->previous?></a></span>
                  <?PHP endif; ?>
                  <?PHP else: ?>
                  <span class="first-deactive"><?=$dictionary->first?></span>
                  <span class="previous-deactive"><?=$dictionary->previous?></span>
                  <?PHP endif; ?>
                </div>
                <div style="width:auto; float:left;">
                  <?PHP if($this->uri->segment(2) < ($tot_records-$perpage)): ?>
                 <span class="next"><a href="<?=base_url().$this->uri->segment(1)."/".($this->uri->segment(2)+$perpage)?>"><?=$dictionary->next?></a></span>
                  <span class="last"><a href="<?=base_url().$this->uri->segment(1)."/".($tot_records-$perpage)?>"><?=$dictionary->last?></a></span>
                  <?PHP else: ?>
                  <span class="next-deactive"><?=$dictionary->next?></span>
                  <span class="last-deactive"><?=$dictionary->last?></span>
                  <?PHP endif; ?>
                  <?PHP endif; ?>
                </div>
              </div>
            
              <ul class="gallery clearfix" id="ssid">
                <?PHP
								foreach($records as $row)
								{
									$ext = substr(strrchr($row->image, '.'), 1);
									$name = substr($row->image,0,strlen($row->image)-(strlen($ext)+1));
									$thumb = $name."_thumb.".$ext;
									
									
										$timestamp = strtotime($row->dated);
										$newdate = date("Y-m-d", $timestamp);
										$title = "Title : " . $row->title . "\n" . "Dated : " . $newdate;
									?>
                <li> <a href="<?PHP echo base_url(); ?>uploads/gallery/<?=$row->image?>" rel="prettyPhoto[gallery2]" title="<?=$row->description?>"><img src="<?PHP echo base_url(); ?>uploads/gallery/<?=$thumb?>" width="160" height="110" alt="<?=$row->title?>" title="<?=$row->title?>" /></a> </li>
                <?PHP
					$aid = $row->album_id;
				}
				?>
              </ul>
            </div>
          </div>
        </div> 
    


<div class="large-1 medium-1 small-1 columns">&nbsp;</div>


</div>
<!----  Footer             -->
