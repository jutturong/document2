<?php
     require_once("../config.php");
     
           header('Content-Type: text/html; charset=UTF-8');
     //http://10.87.196.170/document/report_pdf/docdb/queryheader.php
     
     
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





           
        $at_circle=trim($_REQUEST["at_circle"]);
        
        $id_main1=trim($_REQUEST["id_main1"]);

      
       
      $head_name1=trim($_REQUEST["head_name1"]);

       
       
       $head_name2=trim($_REQUEST["head_name2"]);

       
      $head_name3=trim($_REQUEST["head_name3"]);

         
         
       $head_name4=trim($_REQUEST["head_name4"]);

             
                
       $head_name5=trim($_REQUEST["head_name5"]);

       
       
       
       $head_name6=trim($_REQUEST["head_name6"]);

       
       
       $head_name7=trim($_REQUEST["head_name7"]);

       
       
       $head_name8=trim($_REQUEST["head_name8"]);

       
      
     $head_name9=trim($_REQUEST["head_name9"]);

     
     
      $head_name10=trim($_REQUEST["head_name10"]);

      
      
     $head_name11=trim($_REQUEST["head_name11"]);

     
     
     
    $head_name12=trim($_REQUEST["head_name12"]);

      
    $head_name13=trim($_REQUEST["head_name13"]);

    
    $head_name14=trim($_REQUEST["head_name14"]);
    
    
     $head_name15=trim($_REQUEST["head_name15"]);
     
     
     $head_name16=trim($_REQUEST["head_name16"]);
     
     
      $head_name17=trim($_REQUEST["head_name17"]);
      
      
       $head_name18=trim($_REQUEST["head_name18"]);
       
         $head_name19=trim($_REQUEST["head_name19"]); 
       
      $head_name20=trim($_REQUEST["head_name20"]); 
       
       //$head_name_list=array($head_name1_list,$head_name2_list ,  $head_name3_list ,  $head_name4_list,  $head_name5_list ,   $head_name6_list  , $head_name7_list , $head_name8_list ,   $head_name9_list   );
    //   $head_name_arr=array($head_name1,$head_name2,$head_name3,$head_name4,$head_name5,$head_name6,$head_name7,$head_name8,$head_name9,$head_name10,$head_name11,$head_name12,$head_name13,$head_name14,$head_name15,$head_name16,$head_name17,$head_name18,$head_name19,$head_name20,$head_name21,$head_name22,$head_name23,$head_name24,$head_name25,$head_name26,$head_name27  );
    
          
    //  echo "<hr>";
      
  $factory1=trim($_REQUEST["factory1"]);

    
    
      $factory2=trim($_REQUEST["factory2"]);

      
    $factory3=trim($_REQUEST["factory3"]);

       
       $factory4=trim($_REQUEST["factory4"]);

       
      $factory5=trim($_REQUEST["factory5"]);

      
       $factory6=trim($_REQUEST["factory6"]);

       
        $factory7=trim($_REQUEST["factory7"]);

        
     $factory8=trim($_REQUEST["factory8"]);

     
    $factory9=trim($_REQUEST["factory9"]);

       
        $factory10=trim($_REQUEST["factory10"]);   
     
        
           $factory11=trim($_REQUEST["factory11"]);   
           
           
          $factory12=trim($_REQUEST["factory12"]);   
          
          
            $factory13=trim($_REQUEST["factory13"]);   
            
               $factory14=trim($_REQUEST["factory14"]);  
               
               $factory15=trim($_REQUEST["factory15"]);       
               
                $factory16=trim($_REQUEST["factory16"]);     
                
                $factory17=trim($_REQUEST["factory17"]);    
                
                 $factory18=trim($_REQUEST["factory18"]); 
                 
                $factory19=trim($_REQUEST["factory19"]); 
                
                $factory20=trim($_REQUEST["factory20"]); 
       
       //$factory_list=array($factory1_list,  $factory2_list,$factory3_list,  $factory4_list ,   $factory5_list ,   $factory6_list , $factory7_list ,  $factory8_list , $factory9_list  );
   
       
  //     $factory_arr=array($factory1,$factory2,$factory3,$factory4,$factory5,$factory6,$factory7,$factory8,$factory9,$factory10, $factory11,$factory12,$factory13,$factory14,$factory15,$factory16,$factory17,$factory18,$factory19,$factory20,$factory21,$factory22,$factory23,$factory24,$factory25,$factory26,$factory27 );
  
     
   
         
                $head_name_arr=array($head_name1,$head_name2,$head_name3,$head_name4,$head_name5,$head_name6,$head_name7,$head_name8,$head_name9,$head_name10,$head_name11,$head_name12,$head_name13,$head_name14,$head_name15,$head_name16,$head_name17,$head_name18,$head_name19,$head_name20  );
          
               $factory_arr=array($factory1,$factory2,$factory3,$factory4,$factory5,$factory6,$factory7,$factory8,$factory9,$factory10, $factory11,$factory12,$factory13,$factory14,$factory15,$factory16,$factory17,$factory18,$factory19,$factory20 );
               
               
       
    function call_header($id) //รายชื่อ   
    {
                $tb=  "tb_header";
                $str=" SELECT    *    FROM      $tb   WHERE   `id_header`  = $id  ;  ";
                $query=mysql_query( $str);
                $row=mysql_fetch_row(  $query );
                return  $row[1];
    }
    
    function call_factory($id)//หน่วยงาน
    {
                $tb="tb_factory";
                $str="SELECT *
FROM   $tb
WHERE `id_factory` =$id
";
                  $query=mysql_query( $str);
                $row=mysql_fetch_row(  $query );
                return  $row[1];
                
    }
    
    
               
              $tb_main="tb_circle";
              
              $dmy_record=date("Y-m-d");
                for($i=0;$i<=21;$i++)
                {
                    
                     
                     if(   $head_name_arr[$i]  != ""   &&   $factory_arr[$i]  != ''  ) 
                     {
                                                    $strinsert=" insert    into    $tb_main  values(NULL,'$head_name_arr[$i]','$factory_arr[$i]','$id_main1','$dmy_record'  );";
                                                   //echo "<br>";
                                                    mysql_query($strinsert);        
                     }
                    
                }
                
                

      
     ?>