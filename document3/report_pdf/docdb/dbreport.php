<?php
//require_once("../config.php");
//http://10.87.196.170/document/report_pdf/docdb/dbreport.php/?type_record=1&type_document=1   //link
//http://10.87.196.170/document/report_pdf/docdb/dbreport.php/?type_record=2&type_document=1
//http://10.87.196.170/document/report_pdf/docdb/dbreport.php/?type_record=3&type_document=2
//base_url()report_pdf/docdb/dbreport.php/?type_record=3&type_document=2

require_once("pdf_class.php"); //class PDF
//require_once("query_diagnosis.php");
require_once 'querydb.php';



//---------------------------------------------PAGE1-------------------------------------
if(   $num_rows1  > 0 )
{
##---- PDF ---
$pdf=new PDF('L','mm','A4');  //ของเดิม 
$pdf->SetMargins( 25,25,5 );
$pdf->AddPage();
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');

$x_absolute=25; //พิกัด X
$y_absolute=20; //พิกัด Y
$r=7;  //ระยะห่าง

##-- PAGE 1   
#
##---- เลขหน้า ----------
/*
    $pdf->SetFont('angsana','',12);
    $pdf->setXY( $x_absolute + 160 , $y_absolute - 10 );
    $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Page  1' )  );
 */
##---- เลขหน้า ---------- 
    
    

##-- head table -----


$x1=30;$y1=20;

$pdf->setXY( $x1 , $y1  );
$pdf->SetFont('angsana','I',16);


$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือส่ง "  ));



$pdf->setXY( $x1 + 180 , $y1  );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " วันที่...".number_format(date("d"))."....เดือน....".date_thai_cut(date("m"))."...พ.ศ. ...".thai_year(date("Y")).".... "  ));
//------------------ จบบรรทัด-----------------------------------------




//------------------ ขึ้นบรรทัดใหม่-----------------------------------------
$pdf->setXY( $x1 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " เลข "  ),LRT,1,'C',false);
$pdf->setXY( $x1 , $y1 + 15 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " ทะเบียนส่ง "  ),LRB ,1,'C',false);




$pdf->setXY( $x1+40 , $y1 + 5 );
$pdf->SetFont('angsana','',14);




$pdf->Cell(  60  ,  10 , iconv( 'UTF-8','cp874' , " ถึง "  ),RT,1,'C',false);
$pdf->setXY( $x1+40 , $y1 + 15 );
$pdf->Cell(  60  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);


$pdf->setXY( $x1+30+20+50 , $y1 + 5 );
$pdf->SetFont('angsana','',14);










$pdf->setXY( $x1+30+20+50 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  100  ,  10 , iconv( 'UTF-8','cp874' , " เรื่่อง "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 , $y1 + 15 );
$pdf->Cell(  100  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY( $x1+30+20+50 + 100 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , " ผู้รับ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 + 100 , $y1 + 15 );
$pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY(  $x1+30+20+50 + 100+ 25 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , " หมายเหตุ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 + 100+ 25 , $y1 + 15 );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);
//------------------จบบรรทัด-----------------------------------------




//---------------ขึ้นบรรทัดใหม่--------------------------------------

//----------------เลขทะเบียนรับ------

$pdf->SetFont('angsana','',12);




$addi=0;
$num=0;
 while($row=mysql_fetch_assoc($query))
 {
     $addi += 10;
     $num++;
                    $registration=$row["registration"];
                    $at=$row["at"];
                    $date=$row["date"];
                    $from=$row["from"];
                    $to=$row["to"];
                    $subject=$row["subject"];
                    
                                        
      
                    $content=substr($subject,0,10);
                    
                    $practice=$row["practice"];
                    $note=$row["note"];
                    

                         
                     //--------------เลขทะเบียนรับ--------
                    $pdf->setXY( $x1 , $y1 +15+ $addi  );
                    $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , $registration  ),LBR,1,'C',false);
                    

                    //----------------ถึง------
              
                    $pdf->setXY( $x1+40 , $y1 + 15 + $addi    );
          
                    
                    
                    if( strlen($to) < 47 )
                     {
                           $pdf->Cell(60,10, iconv( 'UTF-8','cp874' , $to ) ,'LRBT', 2);
                     }
                     else
                     {
                       
                           $pdf->Cell(60,10, iconv( 'UTF-8','cp874' , mb_substr($to, 0,40,'UTF-8') ) ,'LRBT', 2);
                     }
                     

                    //----------------เรื่อง------


                   $pdf->setXY($x1+30+20+50 , $y1  + 15 + $addi  );
               
                 $pdf->Cell(100,10, iconv( 'UTF-8','cp874' , mb_substr($subject, 0 , 75   ,'UTF-8')  ) ,  'LRBT', 2);           
                
                    
                    
                    //----------------ผู้รับ------
                    $pdf->setXY(  $x1+30+20+50 + 100 , $y1  + 15 + $addi );
                 
                     $pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , '' ),RB,1,'L',false);
                    
                    
                    
                    //----------------หมายเหตุ------
                    $pdf->setXY( $x1+30+20+50 + 100 + 25 , $y1  + 15 + $addi);
            
                    $pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' ,  $note  ),RB,1,'L',false);
                    
               

 }
 
}
//---------------จบบรรทัด--------------------------------------
 //--------------------------------------------PAGE1---------- หน้า 1-------------------------------------------------------------------

 
 //--------------------------------------------PAGE2---------- หน้า 2-------------------------------------------------------------------
if(    $num_rows2 > 0 )
{
 $pdf->AddPage();
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');

$x_absolute=25; //พิกัด X
$y_absolute=20; //พิกัด Y
$r=7;  //ระยะห่าง




$x1=30;$y1=20;

$pdf->setXY( $x1 , $y1  );
$pdf->SetFont('angsana','I',16);


$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือส่ง "  ));



$pdf->setXY( $x1 + 180 , $y1  );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " วันที่...".number_format(date("d"))."....เดือน....".date_thai_cut(date("m"))."...พ.ศ. ...".thai_year(date("Y")).".... "  ));
//------------------ จบบรรทัด-----------------------------------------




//------------------ ขึ้นบรรทัดใหม่-----------------------------------------
$pdf->setXY( $x1 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " เลข "  ),LRT,1,'C',false);
$pdf->setXY( $x1 , $y1 + 15 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " ทะเบียนส่ง "  ),LRB ,1,'C',false);




$pdf->setXY( $x1+40 , $y1 + 5 );
$pdf->SetFont('angsana','',14);



$pdf->Cell(  60  ,  10 , iconv( 'UTF-8','cp874' , " ถึง "  ),RT,1,'C',false);
$pdf->setXY( $x1+40 , $y1 + 15 );
$pdf->Cell(  60  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);


$pdf->setXY( $x1+30+20+50 , $y1 + 5 );
$pdf->SetFont('angsana','',14);






$pdf->setXY( $x1+30+20+50 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

$pdf->Cell(  100  ,  10 , iconv( 'UTF-8','cp874' , " เรื่่อง "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 , $y1 + 15 );
$pdf->Cell(  100  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY( $x1+30+20+50 + 100 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , " ผู้รับ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 + 100 , $y1 + 15 );
$pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY(  $x1+30+20+50 + 100+ 25 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , " หมายเหตุ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 + 100+ 25 , $y1 + 15 );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);
//------------------จบบรรทัด-----------------------------------------




//---------------ขึ้นบรรทัดใหม่--------------------------------------

//----------------เลขทะเบียนรับ------

$pdf->SetFont('angsana','',12);


$addi=0;
$num=0;
 while($row=mysql_fetch_assoc($query2))
 {
     $addi += 10;
     $num++;
                    $registration=$row["registration"];
                    $at=$row["at"];
                    $date=$row["date"];
                    $from=$row["from"];
                    $to=$row["to"];
                    $subject=$row["subject"];
                    
                    $content=substr($subject,0,10);
                    
                    $practice=$row["practice"];
                    $note=$row["note"];
                    
        
  
                     //--------------เลขทะเบียนรับ--------
                    $pdf->setXY( $x1 , $y1 +15+ $addi  );
                    $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , $registration  ),LBR,1,'C',false);
                    

                    //----------------ถึง------
              
                    $pdf->setXY( $x1+40 , $y1 + 15 + $addi    );
          
                    
                    if( strlen($to) < 47 )
                     {
                           $pdf->Cell(60,10, iconv( 'UTF-8','cp874' , $to ) ,'LRBT', 2);
                     }
                     else
                     {
                       
                           $pdf->Cell(60,10, iconv( 'UTF-8','cp874' , mb_substr($to, 0,40,'UTF-8') ) ,'LRBT', 2);
                     }
                     
    
                    
                    //----------------เรื่อง------
                        
                   
                   $pdf->setXY($x1+30+20+50 , $y1  + 15 + $addi  );
               
                 $pdf->Cell(100,10, iconv( 'UTF-8','cp874' , mb_substr($subject, 0 , 75   ,'UTF-8')  ) ,  'LRBT', 2);           
                
                    
                    //----------------ผู้รับ------
                    $pdf->setXY(  $x1+30+20+50 + 100 , $y1  + 15 + $addi );
                 
                     $pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , '' ),RB,1,'L',false);
                    
                    
                    //----------------หมายเหตุ------
                    $pdf->setXY( $x1+30+20+50 + 100 + 25 , $y1  + 15 + $addi);
            
                    $pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' ,  $note  ),RB,1,'L',false);
               

 }
}
//---------------จบบรรทัด--------------------------------------
 //--------------------------------------------PAGE2---------- หน้า 2-------------------------------------------------------------------
 
 
 
 //--------------------------------------------PAGE3---------- หน้า 3-------------------------------------------------------------------
if(    $num_rows3 > 0 )
{
 $pdf->AddPage();
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');

$x_absolute=25; //พิกัด X
$y_absolute=20; //พิกัด Y
$r=7;  //ระยะห่าง




$x1=30;$y1=20;

$pdf->setXY( $x1 , $y1  );
$pdf->SetFont('angsana','I',16);


$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือส่ง "  ));



$pdf->setXY( $x1 + 180 , $y1  );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " วันที่...".number_format(date("d"))."....เดือน....".date_thai_cut(date("m"))."...พ.ศ. ...".thai_year(date("Y")).".... "  ));
//------------------ จบบรรทัด-----------------------------------------




//------------------ ขึ้นบรรทัดใหม่-----------------------------------------
$pdf->setXY( $x1 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " เลข "  ),LRT,1,'C',false);
$pdf->setXY( $x1 , $y1 + 15 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " ทะเบียนส่ง "  ),LRB ,1,'C',false);




$pdf->setXY( $x1+40 , $y1 + 5 );
$pdf->SetFont('angsana','',14);



$pdf->Cell(  60  ,  10 , iconv( 'UTF-8','cp874' , " ถึง "  ),RT,1,'C',false);
$pdf->setXY( $x1+40 , $y1 + 15 );
$pdf->Cell(  60  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);


$pdf->setXY( $x1+30+20+50 , $y1 + 5 );
$pdf->SetFont('angsana','',14);






$pdf->setXY( $x1+30+20+50 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

$pdf->Cell(  100  ,  10 , iconv( 'UTF-8','cp874' , " เรื่่อง "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 , $y1 + 15 );
$pdf->Cell(  100  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY( $x1+30+20+50 + 100 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , " ผู้รับ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 + 100 , $y1 + 15 );
$pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY(  $x1+30+20+50 + 100+ 25 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , " หมายเหตุ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 + 100+ 25 , $y1 + 15 );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);
//------------------จบบรรทัด-----------------------------------------




//---------------ขึ้นบรรทัดใหม่--------------------------------------

//----------------เลขทะเบียนรับ------

$pdf->SetFont('angsana','',12);


$addi=0;
$num=0;
 while($row=mysql_fetch_assoc($query3))
 {
     $addi += 10;
     $num++;
                    $registration=$row["registration"];
                    $at=$row["at"];
                    $date=$row["date"];
                    $from=$row["from"];
                    $to=$row["to"];
                    $subject=$row["subject"];
                    
                    $content=substr($subject,0,10);
                    
                    $practice=$row["practice"];
                    $note=$row["note"];
                    
        
  
                     //--------------เลขทะเบียนรับ--------
                    $pdf->setXY( $x1 , $y1 +15+ $addi  );
                    $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , $registration  ),LBR,1,'C',false);
                    

                    //----------------ถึง------
              
                    $pdf->setXY( $x1+40 , $y1 + 15 + $addi    );
          
                    
                    if( strlen($to) < 47 )
                     {
                           $pdf->Cell(60,10, iconv( 'UTF-8','cp874' , $to ) ,'LRBT', 2);
                     }
                     else
                     {
                       
                           $pdf->Cell(60,10, iconv( 'UTF-8','cp874' , mb_substr($to, 0,40,'UTF-8') ) ,'LRBT', 2);
                     }
                     
    
                    
                    //----------------เรื่อง------
                        
                   
                   $pdf->setXY($x1+30+20+50 , $y1  + 15 + $addi  );
               
                 $pdf->Cell(100,10, iconv( 'UTF-8','cp874' , mb_substr($subject, 0 , 75   ,'UTF-8')  ) ,  'LRBT', 2);           
                
                    
                    //----------------ผู้รับ------
                    $pdf->setXY(  $x1+30+20+50 + 100 , $y1  + 15 + $addi );
                 
                     $pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , '' ),RB,1,'L',false);
                    
                    
                    //----------------หมายเหตุ------
                    $pdf->setXY( $x1+30+20+50 + 100 + 25 , $y1  + 15 + $addi);
            
                    $pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' ,  $note  ),RB,1,'L',false);
               

 }
}
//---------------จบบรรทัด--------------------------------------
 //--------------------------------------------PAGE3---------- หน้า 3-------------------------------------------------------------------
 
 

 //--------------------------------------------PAGE3---------- หน้า 4-------------------------------------------------------------------
if(    $num_rows4 > 0 )
{
 $pdf->AddPage();
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');

$x_absolute=25; //พิกัด X
$y_absolute=20; //พิกัด Y
$r=7;  //ระยะห่าง




$x1=30;$y1=20;

$pdf->setXY( $x1 , $y1  );
$pdf->SetFont('angsana','I',16);


$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือส่ง "  ));



$pdf->setXY( $x1 + 180 , $y1  );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " วันที่...".number_format(date("d"))."....เดือน....".date_thai_cut(date("m"))."...พ.ศ. ...".thai_year(date("Y")).".... "  ));
//------------------ จบบรรทัด-----------------------------------------




//------------------ ขึ้นบรรทัดใหม่-----------------------------------------
$pdf->setXY( $x1 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " เลข "  ),LRT,1,'C',false);
$pdf->setXY( $x1 , $y1 + 15 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " ทะเบียนส่ง "  ),LRB ,1,'C',false);




$pdf->setXY( $x1+40 , $y1 + 5 );
$pdf->SetFont('angsana','',14);



$pdf->Cell(  60  ,  10 , iconv( 'UTF-8','cp874' , " ถึง "  ),RT,1,'C',false);
$pdf->setXY( $x1+40 , $y1 + 15 );
$pdf->Cell(  60  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);


$pdf->setXY( $x1+30+20+50 , $y1 + 5 );
$pdf->SetFont('angsana','',14);






$pdf->setXY( $x1+30+20+50 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

$pdf->Cell(  100  ,  10 , iconv( 'UTF-8','cp874' , " เรื่่อง "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 , $y1 + 15 );
$pdf->Cell(  100  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY( $x1+30+20+50 + 100 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , " ผู้รับ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 + 100 , $y1 + 15 );
$pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY(  $x1+30+20+50 + 100+ 25 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , " หมายเหตุ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 + 100+ 25 , $y1 + 15 );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);
//------------------จบบรรทัด-----------------------------------------




//---------------ขึ้นบรรทัดใหม่--------------------------------------

//----------------เลขทะเบียนรับ------

$pdf->SetFont('angsana','',12);


$addi=0;
$num=0;
 while($row=mysql_fetch_assoc($query4))
 {
     $addi += 10;
     $num++;
                    $registration=$row["registration"];
                    $at=$row["at"];
                    $date=$row["date"];
                    $from=$row["from"];
                    $to=$row["to"];
                    $subject=$row["subject"];
                    
                    $content=substr($subject,0,10);
                    
                    $practice=$row["practice"];
                    $note=$row["note"];
                    
        
  
                     //--------------เลขทะเบียนรับ--------
                    $pdf->setXY( $x1 , $y1 +15+ $addi  );
                    $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , $registration  ),LBR,1,'C',false);
                    

                    //----------------ถึง------
              
                    $pdf->setXY( $x1+40 , $y1 + 15 + $addi    );
          
                    
                    if( strlen($to) < 47 )
                     {
                           $pdf->Cell(60,10, iconv( 'UTF-8','cp874' , $to ) ,'LRBT', 2);
                     }
                     else
                     {
                       
                           $pdf->Cell(60,10, iconv( 'UTF-8','cp874' , mb_substr($to, 0,40,'UTF-8') ) ,'LRBT', 2);
                     }
                     
    
                    
                    //----------------เรื่อง------
                        
                   
                   $pdf->setXY($x1+30+20+50 , $y1  + 15 + $addi  );
               
                 $pdf->Cell(100,10, iconv( 'UTF-8','cp874' , mb_substr($subject, 0 , 75   ,'UTF-8')  ) ,  'LRBT', 2);           
                
                    
                    //----------------ผู้รับ------
                    $pdf->setXY(  $x1+30+20+50 + 100 , $y1  + 15 + $addi );
                 
                     $pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , '' ),RB,1,'L',false);
                    
                    
                    //----------------หมายเหตุ------
                    $pdf->setXY( $x1+30+20+50 + 100 + 25 , $y1  + 15 + $addi);
            
                    $pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' ,  $note  ),RB,1,'L',false);
               

 }
}
//---------------จบบรรทัด--------------------------------------
 //--------------------------------------------PAGE4---------- หน้า 4-------------------------------------------------------------------
 

 

 //--------------------------------------------PAGE5---------- หน้า 5-------------------------------------------------------------------
if(    $num_rows5 > 0 )
{
 $pdf->AddPage();
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');

$x_absolute=25; //พิกัด X
$y_absolute=20; //พิกัด Y
$r=7;  //ระยะห่าง




$x1=30;$y1=20;

$pdf->setXY( $x1 , $y1  );
$pdf->SetFont('angsana','I',16);


$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือส่ง "  ));



$pdf->setXY( $x1 + 180 , $y1  );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " วันที่...".number_format(date("d"))."....เดือน....".date_thai_cut(date("m"))."...พ.ศ. ...".thai_year(date("Y")).".... "  ));
//------------------ จบบรรทัด-----------------------------------------




//------------------ ขึ้นบรรทัดใหม่-----------------------------------------
$pdf->setXY( $x1 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " เลข "  ),LRT,1,'C',false);
$pdf->setXY( $x1 , $y1 + 15 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " ทะเบียนส่ง "  ),LRB ,1,'C',false);




$pdf->setXY( $x1+40 , $y1 + 5 );
$pdf->SetFont('angsana','',14);



$pdf->Cell(  60  ,  10 , iconv( 'UTF-8','cp874' , " ถึง "  ),RT,1,'C',false);
$pdf->setXY( $x1+40 , $y1 + 15 );
$pdf->Cell(  60  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);


$pdf->setXY( $x1+30+20+50 , $y1 + 5 );
$pdf->SetFont('angsana','',14);






$pdf->setXY( $x1+30+20+50 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

$pdf->Cell(  100  ,  10 , iconv( 'UTF-8','cp874' , " เรื่่อง "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 , $y1 + 15 );
$pdf->Cell(  100  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY( $x1+30+20+50 + 100 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , " ผู้รับ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 + 100 , $y1 + 15 );
$pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY(  $x1+30+20+50 + 100+ 25 , $y1 + 5 );
$pdf->SetFont('angsana','',14);


$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , " หมายเหตุ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20+50 + 100+ 25 , $y1 + 15 );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);
//------------------จบบรรทัด-----------------------------------------




//---------------ขึ้นบรรทัดใหม่--------------------------------------

//----------------เลขทะเบียนรับ------

$pdf->SetFont('angsana','',12);


$addi=0;
$num=0;
 while($row=mysql_fetch_assoc($query5))
 {
     $addi += 10;
     $num++;
                    $registration=$row["registration"];
                    $at=$row["at"];
                    $date=$row["date"];
                    $from=$row["from"];
                    $to=$row["to"];
                    $subject=$row["subject"];
                    
                    $content=substr($subject,0,10);
                    
                    $practice=$row["practice"];
                    $note=$row["note"];
                    
        
  
                     //--------------เลขทะเบียนรับ--------
                    $pdf->setXY( $x1 , $y1 +15+ $addi  );
                    $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , $registration  ),LBR,1,'C',false);
                    

                    //----------------ถึง------
              
                    $pdf->setXY( $x1+40 , $y1 + 15 + $addi    );
          
                    
                    if( strlen($to) < 47 )
                     {
                           $pdf->Cell(60,10, iconv( 'UTF-8','cp874' , $to ) ,'LRBT', 2);
                     }
                     else
                     {
                       
                           $pdf->Cell(60,10, iconv( 'UTF-8','cp874' , mb_substr($to, 0,40,'UTF-8') ) ,'LRBT', 2);
                     }
                     
    
                    
                    //----------------เรื่อง------
                        
                   
                   $pdf->setXY($x1+30+20+50 , $y1  + 15 + $addi  );
               
                 $pdf->Cell(100,10, iconv( 'UTF-8','cp874' , mb_substr($subject, 0 , 75   ,'UTF-8')  ) ,  'LRBT', 2);           
                
                    
                    //----------------ผู้รับ------
                    $pdf->setXY(  $x1+30+20+50 + 100 , $y1  + 15 + $addi );
                 
                     $pdf->Cell(  25  ,  10 , iconv( 'UTF-8','cp874' , '' ),RB,1,'L',false);
                    
                    
                    //----------------หมายเหตุ------
                    $pdf->setXY( $x1+30+20+50 + 100 + 25 , $y1  + 15 + $addi);
            
                    $pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' ,  $note  ),RB,1,'L',false);
               

 }
}
//---------------จบบรรทัด--------------------------------------
 //--------------------------------------------PAGE5---------- หน้า 5-------------------------------------------------------------------
 
 
 
 
 
      $pdf->Output();
     
     ?>