<?php
     require_once("../config.php");
     $Y=date("Y")+ 543;;
     $m=date("m");
     $m_thai=date_thai($m);
     
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
     
     $id=trim($_REQUEST["id"]);
     
     if( $id > 0 )
     {
     $tb=" `donation` ";
     $str="  SELECT * FROM   $tb   WHERE `id_donation`  =  $id  ";
      $query=  mysql_query($str) or die(" MYSQL false connect!! ");
      while( $row= mysql_fetch_row( $query) )
                {
                      //$name_donation =   $row['name_donation'];
                        $name_donation=$row[3];
                        $lastname_donation=$row[4];
                        $amount=$row[7];
                        $amount_baht=num2thai($amount);
                        $amount_read =number_format( $amount );
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
     
     
?>
