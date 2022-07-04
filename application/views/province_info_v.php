<?php include('gregorian_jalali.php'); ?>
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns" style="text-align: center; padding-top: 10px;"> <h3 style="padding: inherit;"><?php foreach($dictionary as $d){ echo $d->province_info; } ?></h3><hr></div>

<div class="large-1 columns">&nbsp;</div>
<div >


<div class="large-12 medium-12 small-12 columns" align="center" style="min-height: 300px; vertical-align:bottom; border-radius:2% 2% 2% 2%; margin-bottom:0px;">
<script src="../../js/ios-orientationchange-fix.min.js"></script>

 <?php
 $languageid=$this->session->userdata('languageid');
 if($languageid==1) {
  ?>
<img id="map-image" src="<?php echo base_url(); ?>images/afghanistan2.png" style="max-width: 100%; height: auto;" alt="" usemap="#map2" />
<map name="map2">
    <?php 
	
	
	
	$Herat='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Herat'){
                  $Herat=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="herat" title="Herat" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Herat; ?>" coords="275,446,214,488" shape="rect">
    <?php $Badghis='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Badghis'){
                  $Badghis=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="badghis" title="Badghis" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Badghis; ?>" coords="399,375,318,400" shape="rect">
    <?php $Faryab='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Faryab'){
                  $Faryab=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="faryab" title="Faryab" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Faryab; ?>" coords="463,304,396,348" shape="rect">
    <?php $Jozjan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Jozjan'){
                  $Jozjan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="jozjan" title="Jozjan" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Jozjan; ?>" coords="554,217,477,254" shape="rect">
    <?php $balkh='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='balkh'){
                  $balkh=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="balkh" title="balkh" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $balkh; ?>" coords="644,223,572,263" shape="rect">
    <?php $Qondoz='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Qondoz'){
                  $Qondoz=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="qondoz" title="Qondoz" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Qondoz; ?>" coords="750,217,672,258" shape="rect">
    <?php $Takhar='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Takhar'){
                  $Takhar=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="takhar" title="Takhar" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Takhar; ?>" coords="806,239,756,276" shape="rect">
    <?php $Badakhshan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Badakhshan'){
                  $Badakhshan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="badakhshan" title="Badakhshan" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Badakhshan; ?>" coords="911,239,820,286" shape="rect">
    <?php $Baghlan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Baghlan'){
                  $Baghlan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="baghlan" title="Baghlan" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Baghlan; ?>" coords="778,306,702,346" shape="rect">
    <?php $Samangan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Samangan'){
                  $Samangan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="samangan" title="Samangan" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Samangan; ?>" coords="685,293,599,330" shape="rect">
    <?php $Sarepol='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Sarepol'){
                  $Sarepol=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="sarepol" title="Sarepol" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Sarepol; ?>" coords="563,339,489,374" shape="rect">
    <?php $Ghor='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Ghor'){
                  $Ghor=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="ghor" title="Ghor" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Ghor; ?>" coords="454,469,372,502" shape="rect">
    <?php $Farah='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Farah'){
                  $Farah=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="farah" title="Farah" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Farah; ?>" coords="211,638,322,591" shape="rect">
    <?php $Nimroz='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Nimroz'){
                  $Nimroz=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="nimroz" title="Nimroz" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Nimroz; ?>" coords="308,735,232,765" shape="rect">
    <?php $Helmand='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Helmand'){
                  $Helmand=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="helmand" title="Helmand" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Helmand; ?>" coords="422,708,329,759" shape="rect">
    <?php $Arozgan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Arozgan'){
                  $Arozgan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="arosgan" title="Arozgan" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Arozgan; ?>" coords="556,563,472,604" shape="rect">
    <?php $Bamyan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Bamyan'){
                  $Bamyan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="bamyan" title="Bamyan" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Bamyan; ?>" coords="654,382,572,420" shape="rect">
    <?php $Norostan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Norostan'){
                  $Norostan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="norostan" title="Norostan" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Norostan; ?>" coords="892,356,817,383" shape="rect">
    <?php $Laghman='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Laghman'){
                  $Laghman=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="laghman" title="Laghman" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Laghman; ?>" coords="796,384,827,434" shape="rect">
    <?php $Kapisa='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Kapisa'){
                  $Kapisa=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="kapisa" title="Kapisa" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Kapisa; ?>" coords="759,381,791,412" shape="rect">
    <?php $Parwan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Parwan'){
                  $Parwan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="parwan" title="Parwan" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Parwan; ?>" coords="743,381,688,415" shape="rect">
    <?php $Wardak='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Wardak'){
                  $Wardak=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="wardak" title="Wardak" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Wardak; ?>" coords="713,433,644,460" shape="rect">
    <?php $Kabul='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Kabul'){
                  $Kabul=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="kabul" title="Kabul" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Kabul; ?>" coords="781,429,728,451" shape="rect">
    <?php $Logar='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Logar'){
                  $Logar=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="logar" title="Logar" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Logar; ?>" coords="755,459,720,505" shape="rect">
    <?php $Ghazni='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Ghazni'){
                  $Ghazni=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="ghazni" title="Ghazni" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Ghazni; ?>" coords="690,508,614,551" shape="rect">
    <?php $Konar='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Konar'){
                  $Konar=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="konar" title="Konar" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Konar; ?>" coords="906,378,861,422" shape="rect">
    <?php $Nangarhar='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Nangarhar'){
                  $Nangarhar=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="nangarhar" title="Nangarhar" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Nangarhar; ?>" coords="880,448,795,479" shape="rect">
    <?php $Paktia='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Paktia'){
                  $Paktia=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="paktia" title="Paktia" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Paktia; ?>" coords="741,502,790,526" shape="rect">
    <?php $Paktika='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Paktika'){
                  $Paktika=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="paktika" title="Paktika" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Paktika; ?>" coords="748,592,675,635" shape="rect">
    <?php $Khost='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Khost'){
                  $Khost=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="khost" title="Khost" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Khost; ?>" coords="776,523,819,552" shape="rect">
    <?php $Zabul='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Zabul'){
                  $Zabul=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="zabul" title="Zabul" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Zabul; ?>" coords="623,602,556,636" shape="rect">
    <?php $Qandahar='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Qandahar'){
                  $Qandahar=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="Qandahar" title="Qandahar" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Qandahar; ?>" coords="544,718,445,747" shape="rect">
    <?php $Panjsher='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Panjsher'){
                  $Panjsher=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="panjsher" title="Panjsher" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Panjsher; ?>" coords="803,347,760,377" shape="rect">
    <?php $Daikondi='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Daikondi'){
                  $Daikondi=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="Daikondi" title="Daikondi" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Daikondi; ?>" coords="585,488,492,523" shape="rect">
</map>
  <?php } ?>




<?php if($languageid==2 or $languageid==3) {?>
 <img id="map-image" src="<?php echo base_url(); ?>images/afghanistan.png" style="width: 810px; max-width: 100%; height: auto;" alt="" usemap="#map" />
<map name="map">
    <?php $Herat='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Herat'){
                  $Herat=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="herat" title="هرات" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Herat; ?>" coords="125,288,33" shape="circle">
    <?php $Badghis='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Badghis'){
                  $Badghis=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="badghis" title="بادغیس" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Badghis; ?>" coords="214,216,25" shape="circle">
    <?php $Faryab='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Faryab'){
                  $Faryab=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="faryab" title="فاریاب" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Faryab; ?>" coords="264,190,23" shape="circle">
    <?php $Jozjan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Jozjan'){
                  $Jozjan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="jozjan" title="جوزجان" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Jozjan; ?>" coords="328,108,24" shape="circle">
    <?php $balkh='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Balkh'){
                  $balkh=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="balkh" title="بلخ" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $balkh; ?>" coords="390,137,20" shape="circle">
    <?php $Qondoz='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Qondoz'){
                  $Qondoz=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="qondoz" title="قندوز" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Qondoz; ?>" coords="485,113,23" shape="circle">
    <?php $Takhar='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Takhar'){
                  $Takhar=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="takhar" title="تخار" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Takhar; ?>" coords="532,133,18" shape="circle">
    <?php $Badakhshan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Badakhshan'){
                  $Badakhshan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="badakhshan" title="بدخشان" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Badakhshan; ?>" coords="596,122,29" shape="circle">
    <?php $Baghlan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Baghlan'){
                  $Baghlan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="baghlan" title="بغلان" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Baghlan; ?>" coords="485,190,21" shape="circle">
    <?php $Samangan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Samangan'){
                  $Samangan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="samangan" title="سمنگان" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Samangan; ?>" coords="423,179,23" shape="circle">
    <?php $Sarepol='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Sarepol'){
                  $Sarepol=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="sarepol" title="سرپل" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Sarepol; ?>" coords="334,200,21" shape="circle">
    <?php $Ghor='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Ghor'){
                  $Ghor=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="ghor" title="غور" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Ghor; ?>" coords="259,280,25" shape="circle">
    <?php $Farah='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Farah'){
                  $Farah=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="farah" title="فراه" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Farah; ?>" coords="166,367,25" shape="circle">
    <?php $Nimroz='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Nimroz'){
                  $Nimroz=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="nimroz" title="نیمروز" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Nimroz; ?>" coords="115,492,26" shape="circle">
    <?php $Helmand='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Helmand'){
                  $Helmand=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="helman" title="هلمند" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Helmand; ?>" coords="206,481,31" shape="circle">
    <?php $Arozgan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Arozgan'){
                  $Arozgan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="arosgan" title="ارزگان" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Arozgan; ?>" coords="335,337,33" shape="circle">
    <?php $Bamyan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Bamyan'){
                  $Bamyan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="bamyan" title="بامیان" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Bamyan; ?>" coords="392,250,22" shape="circle">
    <?php $Norostan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Norostan'){
                  $Norostan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="norostan" title="نورستان" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Norostan; ?>" coords="583,210,22" shape="circle">
    <?php $Laghman='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Laghman'){
                  $Laghman=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="laghman" title="لغمان" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Laghman; ?>" coords="556,251,14" shape="circle">
    <?php $Kapisa='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Kapisa'){
                  $Kapisa=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="kapisa" title="کاپیسا" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Kapisa; ?>" coords="530,236,13" shape="circle">
    <?php $Parwan='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Parwan'){
                  $Parwan=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="parwan" title="پروان" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Parwan; ?>" coords="472,238,15" shape="circle">
    <?php $Wardak='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Wardak'){
                  $Wardak=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="wardak" title="وردک" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Wardak; ?>" coords="458,277,21" shape="circle">
    <?php $Kabul='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Kabul'){
                  $Kabul=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="kabul" title="کابل" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Kabul; ?>" coords="519,265,13" shape="circle">
    <?php $Logar='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Logar'){
                  $Logar=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="logar" title="لوگر" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Logar; ?>" coords="502,288,13" shape="circle">
    <?php $Ghazni='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Ghazni'){
                  $Ghazni=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="ghazni" title="غزنی" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Ghazni; ?>" coords="429,332,30" shape="circle">
    <?php $Konar='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Konar'){
                  $Konar=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="konar" title="کنر" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Konar; ?>" coords="619,226,15" shape="circle">
    <?php $Nangarhar='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Nangarhar'){
                  $Nangarhar=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="nangarhar" title="ننگرهار" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Nangarhar; ?>" coords="579,276,18" shape="circle">
    <?php $Paktia='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Paktia'){
                  $Paktia=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="paktia" title="پکتیا" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Paktia; ?>" coords="508,326,15" shape="circle">
    <?php $Paktika='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Paktika'){
                  $Paktika=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="paktika" title="پکتیکا" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Paktika; ?>" coords="487,384,18" shape="circle">
    <?php $Khost='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Khost'){
                  $Khost=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="khost" title="خوست" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Khost; ?>" coords="542,341,14" shape="circle">
    <?php $Zabul='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Zabul'){
                  $Zabul=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="zabul" title="زابل" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Zabul; ?>" coords="382,393,20" shape="circle">
    <?php $Qandahar='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Qandahar'){
                  $Qandahar=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="Qandahar" title="قندهار" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Qandahar; ?>" coords="308,483,46" shape="circle">
    <?php $Panjsher='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Panjsher'){
                  $Panjsher=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="panjsher" title="پنجشیر" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Panjsher; ?>" coords="544,207, 500, 220" shape="rect">
    <?php $Daikondi='Empty.pdf'; foreach($provinces as $province){
               if($province->province=='Daikondi'){
                  $Daikondi=$province->file;
                  break;
               }
          }
    ?>
    <area target="" alt="Daikondi" title="دایکندی" href="<?php echo base_url(); ?>uploads/province_info/<?php echo $Daikondi; ?>" coords="360,290,310, 305" shape="rect">
</map>
<?php } ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.rwdImageMaps.min.js"></script>
<script>
$(document).ready(function(e) {
  $('img[usemap]').rwdImageMaps();
  
  $('area').on('click', function() {
    //alert($(this).attr('alt') + ' clicked');
  });
});
</script>



</div>





</div>
