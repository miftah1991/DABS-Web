<?php 

 /*
 * @method gregorian_to_jalali ($g_y, $g_m, $g_d,$str)       return gregorian to jalali converted date 
 * @method jalali_to_gregorian($j_y, $j_m, $j_d,$str)        return jalali to gregorian converted date 
 * 
 */
 
function div($a,$b) { 
    return (int) ($a / $b); 
} 
 
function gtoj ($str) 
{ 
	if(!$str == NULL or !$str == "")
	{
		$new_str = explode("-", $str);

		$g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
		$j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29); 


	   $gy = $new_str[0]-1600; 
	   $gm = $new_str[1]-1; 
	   $gd = $new_str[2]-1; 

	   $g_day_no = 365*$gy+div($gy+3,4)-div($gy+99,100)+div($gy+399,400); 

	   for ($i=0; $i < $gm; ++$i) 
		  $g_day_no += $g_days_in_month[$i]; 
	   if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0))) 
		  /* leap and after Feb */ 
		  $g_day_no++; 
	   $g_day_no += $gd; 

	   $j_day_no = $g_day_no-79; 

	   $j_np = div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */ 
	   $j_day_no = $j_day_no % 12053; 

	   $jy = 979+33*$j_np+4*div($j_day_no,1461); /* 1461 = 365*4 + 4/4 */ 

	   $j_day_no %= 1461; 

	   if ($j_day_no >= 366) { 
		  $jy += div($j_day_no-1, 365); 
		  $j_day_no = ($j_day_no-1)%365; 
	   } 

	   for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) 
		  $j_day_no -= $j_days_in_month[$i]; 
	   $jm = $i+1; 
	   $jd = $j_day_no+1; 
	 if($str)
	 {
		 if(strlen($jm) == 1) { $jm = '0'.$jm; }
		 if(strlen($jd) == 1) { $jd = '0'.$jd; }

		 return $jd.'/'.$jm.'/'.$jy ;
	 }
	} else return(NULL);
   return array($jy, $jm, $jd); 
} 
 
function jtog($str) 
{ 
	if(!$str == NULL or !$str == "")
	{
	$new_str = explode("-", $str);
	
    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29); 
 
 
   $jy = (int)($new_str[0])-979; 
   $jm = (int)($new_str[1])-1; 
   $jd = (int)($new_str[2])-1; 
 
   $j_day_no = 365*$jy + div($jy, 33)*8 + div($jy%33+3, 4); 
   
   for ($i=0; $i < $jm; ++$i) 
      $j_day_no += $j_days_in_month[$i]; 
 
   $j_day_no += $jd; 
 
   $g_day_no = $j_day_no+79; 
 
   $gy = 1600 + 400*div($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */ 
   $g_day_no = $g_day_no % 146097; 
 
   $leap = true; 
   if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */ 
   { 
      $g_day_no--; 
      $gy += 100*div($g_day_no,  36524); /* 36524 = 365*100 + 100/4 - 100/100 */ 
      $g_day_no = $g_day_no % 36524; 
 
      if ($g_day_no >= 365) 
         $g_day_no++; 
      else 
         $leap = false; 
   } 
 
   $gy += 4*div($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */ 
   $g_day_no %= 1461; 
 
   if ($g_day_no >= 366) { 
      $leap = false; 
 
      $g_day_no--; 
      $gy += div($g_day_no, 365); 
      $g_day_no = $g_day_no % 365; 
   } 
 
   for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++) 
      $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap); 
   $gm = $i+1; 
   $gd = $g_day_no+1; 
     if($str)
 {
	 if(strlen($gm) == 1) { $gm = '0'.$gm; }
	 if(strlen($gd) == 1) { $gd = '0'.$gd; }
	 
	 return $gd.'/'.$gm.'/'.$gy ;
 }
	} else return(NULL);
    return array($gy, $gm, $gd); 
} 


function comparedate($_date_mix_jalaly,$_date_mix_gregorian)
{
  $_date_arr_jalaly = explode('/', $_date_mix_jalaly);
  $_date_arr_gregorian = explode('/', $_date_mix_gregorian);		
  
  $arr_jtg = jalali_to_gregorian($_date_arr_jalaly[0],$_date_arr_jalaly[1],$_date_arr_jalaly[2]);
		
  if($_date_arr_gregorian[0]> $arr_jtg[0])
    {
	 return  false;
	}
		
	else if($_date_arr_gregorian[0]== $arr_jtg[0] && $_date_arr_gregorian[1]>$arr_jtg[1])
	{
	 return false;
	}
	else if($_date_arr_gregorian[0]== $arr_jtg[0] && $_date_arr_gregorian[1]==$arr_jtg[1] && $_date_arr_gregorian[2]>$arr_jtg[2])
	{
	 return false;
	}
  return true ;	
}

?>