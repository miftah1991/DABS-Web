<style type="text/css">
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

<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="padding-top:2px; margin-top: 20px; text-align: center;"><h3>PhotoGallery</h3>
<hr style="margin-top: 1px;"></div>

<div class="large-1 columns">&nbsp;</div>
<div class="row">
<div class="large-1 medium-1 small-1 columns">&nbsp;</div>

<div class="large-10 medium-1 small-1 columns" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">

<?PHP
								$id = "";
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
									$div = '<img src="'.base_url().$thumb.'" height="110" width="160" alt="$row->title" " />';
									?>
										<?PHP //if( file_exists($thumb) ){ ?>
						                <div class="album-area"><div align="center" class="album-thumb" title="<?=$title?>">
						                	<?PHP 
						                  		echo anchor(base_url().$row->custom_url,$div);
												
											?>
                                            <div class="album_title" style="text-overflow:ellipsis;"><?PHP 
						                  		echo $row->title;
											?></div>
						                </div></div>
						                <?PHP //} ?>
					                <?PHP
									}
									$id = $row->album_id;
								} 
							?>
</div>


<div class="large-1 medium-1 small-1 columns">&nbsp;</div>


</div>
