

<!-- Site Style -->
<script type="text/javascript"> var base_url = "<?=site_url()?>";</script>
<script type="text/javascript" src="<?=base_url();?>js/jquery-1.9.1.min.js"></script>



    
<!-- Quick News -->  
<!-- Photo Gallery -->

	<link rel="stylesheet" href="<?=base_url();?>css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
    <script src="<?=base_url();?>js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

	
	<script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            //$("area[rel^='prettyPhoto']").prettyPhoto();        
            $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',slideshow:3000, autoplay_slideshow: false});
        });
    </script>

<!-- Photo Gallery -->    
