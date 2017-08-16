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
            
             
             if(  $ex[0]  > 0  )
             {
              $y=$ex[0]+543; //ปี
             $m= date_thai_cut( $ex[1] );
           //  $d=$ex[2];
             $d=number_format($ex[2]);
             return  $d." ".$m." ".$y;
             }
             else
             {
                  return  "";
             }
                
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



        
        
$cur_date=date("Y-m-d");  
//$mak_date="2017-02-20";

  $id_vacation=trim($_REQUEST["id_vacation"]);
  if(  $id_vacation > 0  )
  {
                $tb="tb_vacation";
               
                /*
                   $str2="select  *  from  $tb  where  type_record=$type_record  and   type_document=$type_document     and   `date` >=  '$select_date'   limit 14,14   ";
         $query2=mysql_query($str2) or die("mysql error ");
         $num_rows2 = mysql_num_rows( $query2);
                 */
                
                $str1=" select  *  from  $tb  where   id_vacation= $id_vacation    ";
                $query1=mysql_query($str1) or die("mysql error ");
                $num_rows1 = mysql_num_rows( $query1);
                while($row=mysql_fetch_assoc($query1))
                    {
                        $type_person=$row["type_person"];  //  ประเภทของเจ้าหน้าที่     [ / ] ข้าราชการ
                        $write=$row["write"];  //เขียนที่
                        
                        
                        $date_write=$row["date_write"];  //วัน เดือน พศ
                        $ex1=explode("-",$date_write);
                        $ex1[0]; //ปี
                        $year=$ex1[0]+543;
                        $ex1[1];  //เดือน
                        $month=date_thai_cut($ex1[1]);
                        $ex1[2];  //วัน
                        
                        $subject=$row["subject"]; //เรื่อง
                        $study=$row["study"]; //เรียน
                        
                        $prename=$row["prename"];  //คำนำหน้าชื่อ
                        // $prename=3;
                        if(  $prename == 1  )
                        {
                                 $prename_detail="นาย";
                        }
                        elseif(  $prename == 2 )
                        {
                               $prename_detail="นาง";
                        }
                        elseif(  $prename == 3 )
                        {
                               $prename_detail="นางสาว";
                        }
                        
                        $first_name=$row["first_name"]; //ชื่อ
                        $last_name=$row["last_name"]; //นามสกุล
                        $position=$row["position"]; //ตำแหน่ง
                        $affiliation=$row["affiliation"]; //สังกัดหน่วย
                        $work=$row["work"]; //งาน
                        $tel=$row["tel"]; //โทร
                        $cumulative=$row["cumulative"]; //มีวันลาสะสม
                        $rest=$row["rest"]; //มีวันลาพักผ่อนในปีนี้อีก
                        $total=$row["total"];  //รวมวันลาเป็น
                        $current=$row["current"];  //ในปีนี้ลามาแล้ว
                        $keep=$row["keep"]; //คงเหลือวันลาอีก
                        $wishes=$row["wishes"]; //มีความประสงค์จะขอลาพักผ่อนมีกำหนดมีกำหนด
                        
                        $date_begin=$row["date_begin"];  //ขอลาพักผ่อนตั้งแต่วันที่
                         $ex2=explode("-", $date_begin);
                        $ex2[0]; //ปี
                        $year2=$ex2[0]+543;
                        $ex2[1];  //เดือน
                        $month2=date_thai_cut($ex2[1]);
                        $ex2[2];  //วัน
                        
                        $end_date=$row["end_date"]; //ขอลาพัก ถึงวันที่  
                        $ex3=explode("-", $end_date);
                        $ex3[0]; //ปี
                        $year3=$ex3[0]+543;
                        $ex3[1];  //เดือน
                        $month3=date_thai_cut($ex3[1]);
                        $ex3[2];  //วัน
                        
                        
                        $house_number=$row["house_number"]; //บ้านเลขที่
                        $road=$row["road"]; //ถนน
                        $district=$row["district"];  //ตำบล/แขวง
                        $city=$row["city"]; //อำเภอ/เขต
                        $province=$row["province"];  //จังหวัด
                        $tel_address=$row["tel_address"]; //โทรศํพท์
                        
                        $leave=$row["leave"];  //ลามาแล้ว วันทำการ
                        $leave_thistime=$row["leave_thistime"]; //ลาครั้งนี้ วันทำการ
                        $date_total_leave=$row["date_total_leave"];  //รวมเป็น วันทำการ
                        
                        $sign=$row["sign"]; //ลงชื่อ ขอแสดงความนับถือ
                        
                        $presign=$row["presign"];  //คำนำหน้าชื่อ ขอแสดงความนับถือ
                        
                    //    $presign=2;
                        
                     //   $presign=3;
                        
                        if( $presign == 1 )
                        {
                             $presign_detail="นาย";
                        }
                        else  if( $presign == 2 )
                        {
                             $presign_detail="นาง";
                        }
                           else  if( $presign == 3 )
                        {
                             $presign_detail="นางสาว";
                        }
                        
                        
                        $name_sign=$row["name_sign"];  //ชื่อ ขอแสดงความนับถือ
                        $lastname_sign=$row["lastname_sign"]; // นามสกุล ขอแสดงความนับถือ
                        
                        
                        $allowed=$row["allowed"]; //เห็นควรอนุญาต
                        // $allowed=2;
                        
                        
                        $name_inspector=$row["name_inspector"]; //ลงชื่อผู้ตรวจสอบ
                        $lastname_inspector=$row["lastname_inspector"];  //นามสกุลผู้ตรวจสอบ
                        $position_inspector=$row["position_inspector"]; //ตำแหน่งผู้ตรวจสอบ
                         
                         $name_commander=$row["name_commander"]; //ลงชื่อผู้บังคับบัญชาชั้นต้น
                         $lastname_commander=$row["lastname_commander"]; //นามสกุลผู้บังคับบัญชาชั้นต้น
                         
                         $position_commander=$row["position_commander"]; //ตำแหน่งผู้บังคับบัญชาชั้นต้น
                         
                        $date_commander=$row["date_commander"];  //วัน เดือน ปี อนุมัติผู้บังคับบัญชา
                        
                        
                        $ex4=explode("-", $date_commander );
                        
                        
                        $ex4[0]; //ปี
                        $year4=$ex4[0]+543;
                        $ex4[1];  //เดือน
                        $month4=date_thai_cut($ex4[1]);
                        $ex4[2];  //วัน
                     
                      
                        $date_commander_conv=split_dmy_thai($date_commander );
                        
                        
                       
                        $allow_manager=$row["allow_manager"]; //อนุญาต  คำสั่งผู้บริหาร
                        //$allow_manager=2;
                        
                         //$allow_manager1=$row["allow_manager1"]; //อนุญาต  คำสั่งผู้บริหาร
                        
                        
                        $first_name2=$row["first_name2"];
                        $last_name2=$row["last_name2"];
                        
                        $last_position=$row["last_position"];
                        
                        
                        $last_date=$row["last_date"];
                        $ex5=explode("-", $last_date );
                        $ex5[0]; //ปี
                        $year5=$ex5[0]+543;
                        $ex5[1];  //เดือน
                        $month5=date_thai_cut($ex5[1]);
                        $ex5[2];  //วัน
                         
                        
                        $last_date_conv=split_dmy_thai($last_date);
                         
                        
                     }
        
  }
  
?>
