<?php
     require_once("../config.php");
     $Y=date("Y")+ 543;;
     $m=date("m");
     $m_thai=date_thai($m);
     
     //--- เดือนไทย----
     function  date_thai($m)
     {
         switch ($m)
         {
                case 1:
             {
             return "มกราคม";
                 break;
             }
                 case 2:
             {
                 return "กุมภาพันธ์";
                     break;
             }
                  case 3:
             {
             return "มีนาคม";
                   break;
             }
                  case 4:
             {
             return "เมษายน";
                   break;
             }
                 case 5:
             {
             return "พฤษภาคม";
                   break;
             }
                  case 6:
             {
             return "มิถุนายน";
                   break;
             }
                  case 7:
             {
             return "กรกฎาคม";
                   break;
             }
                   case 8:
             {
             return "สิงหาคม";
                   break;
             }
                   case 9:
             {
             return "กันยายน";
                   break;
             }
                    case 10:
             {
             return "ตุลาคม";
                   break;
             }
                    case 11:
             {
             return "พฤศจิกายน";
                   break;
             }
                   case 12:
             {
             return "ธันวาคม";
                   break;
             }
         }
     }
     
     
      //--- เดือนไทย----
     function  date_thai_cut($m)
     {
         switch ($m)
         {
                case 1:
             {
             return "ม.ค.";
                 break;
             }
                 case 2:
             {
                 return "ก.พ.";
                     break;
             }
                  case 3:
             {
             return "มี.ค.";
                   break;
             }
                  case 4:
             {
             return "เม.ย.";
                   break;
             }
                 case 5:
             {
             return "พ.ค.";
                   break;
             }
                  case 6:
             {
             return "มิ.ย.";
                   break;
             }
                  case 7:
             {
             return "ก.ค.";
                   break;
             }
                   case 8:
             {
             return "ส.ค.";
                   break;
             }
                   case 9:
             {
             return "ก.ย.";
                   break;
             }
                    case 10:
             {
             return "ต.ค.";
                   break;
             }
                    case 11:
             {
             return "พ.ย.";
                   break;
             }
                   case 12:
             {
             return "ธ.ค.";
                   break;
             }
         }
     }

//------- ปี พ.ศ. ไทย     
 function thai_year($y)
 {
     
                return   $y+543;
 }

 
 //-------- แยก วัน เดือน ปี ภาษาไทย
 function  split_dmy_thai($dmy)  // 2016-12-08
 {
     if( strlen($dmy) > 0 &&  $dmy != "" )
     {
             $ex=explode("-",$dmy);
            
              $y=$ex[0]+543; //ปี
             $m= date_thai_cut( $ex[1] );
           //  $d=$ex[2];
             $d=number_format($ex[2]);
             return  $d." ".$m." ".$y;
                
     }
 }
     
function num2thai($number)
{
                            $t1 = array("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
                            $t2 = array("เอ็ด", "ยี่", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน");
                            $zerobahtshow = 0; // ในกรณีที่มีแต่จำนวนสตางค์ เช่น 0.25 หรือ .75 จะให้แสดงคำว่า ศูนย์บาท หรือไม่ 0 = ไม่แสดง, 1 = แสดง
                            (string) $number;
                            $number = explode(".", $number);
                            if(!empty($number[1])){
                            if(strlen($number[1]) == 1){
                            $number[1] .= "0";
                            }else if(strlen($number[1]) > 2){
                            if($number[1]{2} < 5){
                            $number[1] = substr($number[1], 0, 2);
                            }else{
                            $number[1] = $number[1]{0}.($number[1]{1}+1);
                            }
                            }
                            }

                            for($i=0; $i<count($number); $i++){
                            $countnum[$i] = strlen($number[$i]);
                            if($countnum[$i] <= 7){
                            $var[$i][] = $number[$i];
                            }else{
                            $loopround = ceil($countnum[$i]/6);
                            for($j=1; $j<=$loopround; $j++){
                            if($j == 1){
                            $slen = 0;
                            $elen = $countnum[$i]-(($loopround-1)*6);
                            }else{
                            $slen = $countnum[$i]-((($loopround+1)-$j)*6);
                            $elen = 6;
                            }
                            $var[$i][] = substr($number[$i], $slen, $elen);
                            }
                            }	

                            $nstring[$i] = "";
                            for($k=0; $k<count($var[$i]); $k++){
                            if($k > 0) $nstring[$i] .= $t2[7];
                            $val = $var[$i][$k];
                            $tnstring = "";
                            $countval = strlen($val);
                            for($l=7; $l>=2; $l--){
                            if($countval >= $l){
                            $v = substr($val, -$l, 1);
                            if($v > 0){
                            if($l == 2 && $v == 1){
                            $tnstring .= $t2[($l)];
                            }elseif($l == 2 && $v == 2){
                            $tnstring .= $t2[1].$t2[($l)];
                            }else{
                            $tnstring .= $t1[$v].$t2[($l)];
                            }
                            }
                            }
                            }
                            if($countval >= 1){
                            $v = substr($val, -1, 1);
                            if($v > 0){
                            if($v == 1 && $countval > 1 && substr($val, -2, 1) > 0){
                            $tnstring .= $t2[0];
                            }else{
                            $tnstring .= $t1[$v];
                            }

                            }
                            }

                            $nstring[$i] .= $tnstring;
                            }

                            }
                            $rstring = "";
                            if(!empty($nstring[0]) || $zerobahtshow == 1 || empty($nstring[1])){
                            if($nstring[0] == "") $nstring[0] = $t1[0];
                            $rstring .= $nstring[0]."บาท";
                            }
                            if(count($number) == 1 || empty($nstring[1])){
                            $rstring .= "ถ้วน";
                            }else{
                            $rstring .= $nstring[1]."สตางค์";
                            }
                            return $rstring;
}


function  chstr1($t)
{
      //return  $t;
              //  return  substr($t,0,30);
                $i=30;
                return   substr_replace($t,"\n",$i);
}


$type_record=$_REQUEST["type_record"];
$type_document=$_REQUEST["type_document"];
$select_date=$_REQUEST["select_date"];   //เลือกวันที่ในการ report
        
        
$cur_date=date("Y-m-d");  
//$mak_date="2017-02-20";

    
if(  $type_record >= 1  &&  $type_document >= 1 )
{
       $tb="tb_main1";
      // $str="select  *  from  $tb  where  type_record=$type_record  and   type_document=$type_document     and   `date` = '$cur_date'      ";
        $str="select  *  from  $tb  where  type_record=$type_record  and   type_document=$type_document     and   `date` >=  '$select_date'   limit 0,14   ";
       $query=mysql_query($str) or die("mysql error ");
        $num_rows1 = mysql_num_rows($query);
       /*
       while($row=mysql_fetch_assoc($query))
               {
                    $registration=$row["registration"];
                    $at=$row["at"];
                    $date=$row["date"];
                    $from=$row["from"];
                    $to=$row["to"];
                    $subject=$row["subject"];
                    $practice=$row["practice"];
                    $note=$row["note"];
                    
               }
        * 
        */
       
       
          $str2="select  *  from  $tb  where  type_record=$type_record  and   type_document=$type_document     and   `date` >=  '$select_date'   limit 14,14   ";
         $query2=mysql_query($str2) or die("mysql error ");
         $num_rows2 = mysql_num_rows( $query2);
         
           
         $str3="select  *  from  $tb  where  type_record=$type_record  and   type_document=$type_document     and   `date` >=  '$select_date'   limit 28,14  ";
         $query3=mysql_query($str3) or die("mysql error ");
         $num_rows3 = mysql_num_rows( $query3);
         
         
         $str4="select  *  from  $tb  where  type_record=$type_record  and   type_document=$type_document     and   `date` >=  '$select_date'   limit  42,14   ";
         $query4=mysql_query($str4) or die("mysql error ");
         $num_rows4 = mysql_num_rows( $query4);
       
         
         $str5="select  *  from  $tb  where  type_record=$type_record  and   type_document=$type_document     and   `date` >=  '$select_date'   limit  56,14   ";
         $query5=mysql_query($str4) or die("mysql error ");
         $num_rows5 = mysql_num_rows( $query5);
       
}
 
        
     
?>
