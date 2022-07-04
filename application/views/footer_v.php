<style>


.footer-grids{
  border-top: 8px solid #F49100;
  background: #444444;
  padding: 3em 3em;
  overflow: hidden;
}
p.footer-gd {
    color: #908F8F;
    font-weight: 500;
  font-size:14px;
}
p.footer-gd a {
  color:#fff;
}
p.footer-gd a:hover {
  color: #2e99ff;
}
.footer{
  float:left;
}
.footer h3{
    font-size: 18px;
    color: #fff;
    font-weight: 500;
    margin-bottom: 15px;
    font-family: 'Viga', sans-serif;
}
.footer.one {
    width: 37%;
}
p.adam{
  float:right;
  color:#6F6E6E !important;
  font-size:13px !important;
  margin-top:20px;
}
.footer.three {
    width: 23%;
}
.footer.one p{
  color:#908F8F;
  line-height:2em;
  font-size:14px;
}
.footer.two {
    width: 23%;
    margin: 0 8%;
}
.footer.two ul{
  margin:0;
  padding:0;
}
.footer.two ul li{
  list-style-type:none;
  display:block;
    line-height: 1.5em;
  font-size:14px;
}
.footer.two ul li a{
color:#908F8F;  
display:block;
}
.footer.two ul li a.fb {
  background: url('<?php echo base_url() ?>images/social2.png') no-repeat 0px 4px;  
    padding: 10px 0 12px 52px;
}
.footer.two ul li a.fb1 {
  background: url('<?php echo base_url() ?>images/social1.png') no-repeat 0px 4px;
    padding: 10px 0 12px 52px;
}
.footer.two ul li a.fb2 {
    background: url('<?php echo base_url() ?>images/social3.png') no-repeat 0px 4px;
    padding: 10px 0 12px 52px;
}
.footer.two ul li a.fb3 {
    background: url('<?php echo base_url() ?>images/social4.png') no-repeat 0px 4px;
    padding: 10px 0 12px 52px;
}
.footer.two ul li a.fb4 {
    background: url('<?php echo base_url() ?>images/social5.png') no-repeat 0px 4px;
    padding: 10px 0 12px 52px;
}
.footer.three ul li {
    list-style-type: none;
    display: block;
    color: #908F8F;
    font-size: 14px;
    line-height: 2.5em;
}
.footer.three ul li span {
    display: block;
}
.footer.three ul li:nth-child(1) {
    background: url('<?php echo base_url() ?>images/icon2.png') no-repeat 0px 6px;
    padding-left: 38px;
}
.footer.three ul li:nth-child(2) {
    background: url('<?php echo base_url() ?>images/icon3.png') no-repeat 0px 6px;
    padding-left: 38px;
}
.footer.three ul li a {
    background: url('<?php echo base_url() ?>images/icon1.png') no-repeat 0px 6px;
    padding-left: 38px;
    display: block;
  color:#908F8F;
}
.copy-right-grids {
  border-bottom: 25px solid #211E1E;
  padding: 20px 20px;
    background: #211E1E;
}
.copy-left{
  float:left;
}
.copy-right{
  float:right;
}
.copy-right ul li {
    list-style-type: none;
    display: inline-block;
    margin: 0 0px;
    border-left: 1px solid #444343;
    padding: 0 12px;
}
.copy-right ul li a {
    color: #908F8F;
  font-size:13px;
}
.copy-right ul li:nth-child(1) {
    border: none;
}
.footer.two ul li a.fb:hover {
    background: url('<?php echo base_url() ?>images/social3hover.png') no-repeat 0px 4px;
}
.footer.two ul li a.fb1:hover {
    background: url('<?php echo base_url() ?>images/social2hover.png') no-repeat 0px 4px;
}
.footer.two ul li a.fb2:hover {
    background: url('<?php echo base_url() ?>images/social4hover.png') no-repeat 0px 4px;
}
.footer.two ul li a.fb3:hover {
    background: url('<?php echo base_url() ?>images/social5hover.png') no-repeat 0px 4px;
}
.footer.two ul li a.fb4:hover {
    background: url('<?php echo base_url() ?>images/social1hover.png') no-repeat 0px 4px;
}
.footer.two ul li a:hover,.copy-right ul li a:hover,.footer.three ul li a:hover{
  color:#2e99ff;
};;
/*-- responsive media queries --*/

@media (max-width: 1440px){
  
}
@media (max-width: 1366px){
  .footer.one {
    width: 38%;
  }
  .footer-grids {
    padding: 2.5em 2.5em;
  } 
}
@media (max-width: 1280px){
 
}
@media (max-width: 1080px){
  .footer h3 {
    font-size: 19px;
  }
  .copy-left {
    float: none;
    text-align: center;
    margin-bottom: 15px;
  }
  .copy-right {
    float: none;
    text-align: center;
  }
  .footer.two ul li a.fb2 ,.footer.two ul li a.fb,.footer.two ul li a.fb1,.footer.two ul li a.fb3,.footer.two ul li a.fb4{
    padding: 10px 0 10px 38px;
  }
  .footer h3 {
    font-size: 18px;
  }

}
@media (max-width: 1024px){
  .footer-grids {
    padding: 2em 2em;
  }
  
   {
    width: 82%;
  }
  
}
@media (max-width: 991px){
  .footer.two {
    width: 27%;
    margin: 0 5%;
  }
  .footer.three {
    width: 25%;
  } 
}
@media (max-width: 800px){

  .footer.one p {
    font-size: 13px;
  }
  .footer.two ul li {
    font-size: 13px;
  }
  .footer.three ul li {
    font-size: 13px;
  } 
  .footer.three ul li:nth-child(1),.footer.three ul li:nth-child(2),.footer.three ul li a{
    padding-left: 32px; 
  }
  .footer h3 {
    font-size: 16px;
  }
}
@media (max-width: 768px){
  p.footer-gd {
    font-size: 13px;
  } 

}
@media (max-width: 736px){

  .footer.one {
    width: 35%;
  }
  .footer.two {
    width: 29%;
    margin: 0 4%;
  }
  .footer.three {
    width: 27%;
  } 
}
@media (max-width: 667px){
  .footer.one {
    width: 100%;
  }
  .footer.two {
    width: 48%;
    margin: 0 4% 0 0;
  } 
  .footer.three {
    width: 48%;
  }
  .footer.one {
    margin-bottom: 0px;
  }
}
@media (max-width: 640px){
 
  .footer-grids {
    padding: 2.5em 2.5em;
  }
}
@media (max-width: 600px){
 
}
@media (max-width: 568px){
  
}
@media (max-width: 480px){
  .footer-grids {
    padding: 1.5em 1.5em;
  }
  .copy-right-grids {
    padding: 20px 10px;
  }
  .copy-right ul li {
    padding: 0 10px;
  }
  p.footer-gd {
    line-height: 1.8em;
  } 
  p.adam {
    margin-top: 9px;
  }
 
}
@media (max-width: 414px){
.footer.two {
    width: 100%;
}
.footer.three {
    width: 100%;
}
.footer h3 {
    margin-bottom: 15px;
}
.footer.one {
    margin-bottom: 0;
}
.footer.two {
    width: 100%;
    margin: 30px 0;
}
.footer-grids {
    padding: 2em 2em;
}

.copy-right ul li {
    line-height: 1.8em;
} 
}
@media (max-width: 384px){
  
}
@media (max-width: 375px){

}
@media (max-width: 320px){

  .footer-grids {
    padding: 1em 1em;
  }

}




</style>

<div class="footer-grids" style="padding-top: 30px; padding-bottom: 0px;"> 
<?php foreach($dictionary as  $d){ ?>
  <div class=" footer one">
    <h3><?php echo $d->about_company;?></h3>             
      <p><?php echo substr($d->company_profile, 0,1000);?></p>
     <!-- <p class="adam">- Patrick Victoria, CEO</p> -->
    <div class="clear"></div>			              
  </div>

  <div class=" footer two" >
                           
       <h3><?php echo $d->follow_us;?></h3>
       <ul>               
              <li><a class="fb" href="http://www.facebook.com/DABS.AFG" target="_blank">
              <i></i><?php echo $d->facebook;?></a><li>

              <li><a class="fb1" href="https://www.linkedin.com/company/da-afghanistan-breshna-sherkat"  target="_blank">
              <i></i><?php echo $d->twitter;?></a></li>

              <li><a class="fb2" href="#" target="_blank">
              <i></i><?php echo $d->google_plus;?></a></li>
            
              
        <ul> 
  </div>

  <div class=" footer three">
     <h3><?php echo $d->contact_info;?></h3>
          <ul>
            <li><?php echo $d->company_name;?> <span><?php echo $d->province?></span><?php echo $d->road;?></li>
            <li>144  </li>
            <li><a href="mailto:info@dabs.af">info@dabs.af</a> </li>
          </ul>      
  </div>
  <div class="clear"></div>
  
</div>
</tr>
<div class="copy-right-grids">
        <div class="copy-left">
            <p class="footer-gd" style="padding-bottom: 20px;">© 2017 DABS Website. All Rights Reserved | Design by <a href="#" target="_blank">DABS MIS Office</a></p>
            <?php }?>
        </div>
        <div class="copy-right">
          <ul style="padding-bottom: 20px;">
            <li><a href="#">Company Information</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul>
        </div>
        <div class="clear"></div>
</div>
  
</body>
</html>

