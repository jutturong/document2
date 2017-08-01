<?php
//require_once("../config.php");
require_once("pdf_class.php"); //class PDF
//require_once("query_diagnosis.php");
require_once 'querydb.php';

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

/*
$pdf->head_table(45,20,17,'b'); //($x_absolute,$y_absolute,$fontSize,$b)   //หัวโปรแกรม
$pdf->SetFont('angsana','BU',20);


$pdf->setXY( 40, $y_absolute +  ($r*1)  );
$pdf->SetFont('angsana','B',18);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "".' Tawanchai  Foundation for Cleft Lip , Cleft Palate and Craniofacial Deformities (TFC) ' ));

$pdf->setXY( 40, $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','B',12);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "".'สำนักงาน  ' ));

$pdf->setXY( 60, $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','',12);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "อาคารคณะแพทยศาสตร์ มหาวิทยาลัยขอนแก่น 123 ถ.มิตรภาพ ต.ในเมือง อ.เมือง จ.ขอนแก่น 40002 " ));


$pdf->setXY( 40, $y_absolute +  ($r*3)  );
$pdf->SetFont('angsana','B',12);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' ,"".' Office ' ));


$pdf->setXY( 60, $y_absolute +  ($r*3)  );
$pdf->SetFont('angsana','',12);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "Faculty of Medicine, Khon Kaen University, 123 Mittraphab Rd., Muang Distirc, Khon Kaen, 40002 " ));

$pdf->setXY( 40, $y_absolute +  ($r*4)  );
$pdf->SetFont('angsana','',12);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "Phone   043 363123,  Mobile phone 081 1851151  Fax 043 202558  http//www.tawanchai-foundation.org  E-mail: cleft@kku.ac.th" ));

##------------------------- icon logo ------------------

$pdf->Image('../icon/logo-tawanchai.png',10,12,20,0,'','');//Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])
##------------------------- icon logo ------------------

$pdf->setXY( 120 , $y_absolute +  ($r*2)  );
$pdf->SetFont('angsana','',13);




##------------------------ขีึดเส้นใต้
$pdf->setXY( 10 , $y_absolute +  ($r*5)  );
$pdf->SetFont('angsana','B',18);
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , '' ),T,0,L,true     );
##------------------------ขีึดเส้นใต้
*/



/*
$pdf->setXY( 80, $y_absolute +  ($r*6)  );
$pdf->SetFont('angsana','B',12);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , " มอบโอกาส  วาดฝัน  สร้างสรรค์รอยยิ้ม" ));

$pdf->setXY( 20, $y_absolute +  ($r*7)  );
$pdf->SetFont('angsana','B',16);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "ที่ ตวฉ." ));

$pdf->setXY( 100, $y_absolute +  ($r*8)  );
$pdf->SetFont('angsana','',16);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $m_thai."  ".$Y ));

$pdf->setXY( 20, $y_absolute +  ($r*11)  );
$pdf->SetFont('angsana','B',16);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "เรื่อง" ));

$pdf->setXY( 30, $y_absolute +  ($r*11)  );
$pdf->SetFont('angsana','',16);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "ขอขอบคุณ" ));

$pdf->setXY( 20, $y_absolute +  ($r*12)  );
$pdf->SetFont('angsana','B',16);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "เรียน" ));

$pdf->setXY( 30 , $y_absolute +  ($r*12)  );
$pdf->SetFont('angsana','',16);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $name_donation."   ". $lastname_donation  ));

$pdf->setXY( 20 , $y_absolute +  ($r*13)  );
$pdf->SetFont('angsana','B',16);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "สิ่งที่ส่งมาด้วย"  ));

$pdf->setXY( 44 , $y_absolute +  ($r*13)  );
$pdf->SetFont('angsana','',16);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "ใบเสร็จรับเงิน"  ));

$pdf->setXY( 46 , $y_absolute +  ($r*16)  );
$pdf->SetFont('angsana','',16);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "ตามที่ท่านได้กรุณาบริจาคเงิน"  ));

$pdf->setXY( 91 , $y_absolute +  ($r*16)  );
$pdf->SetFont('angsana','B',16);

$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "จำนวน  ". $amount_read ."  บาท "."(".$amount_baht.")"  ));

$pdf->setXY( 164 , $y_absolute +  ($r*16)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "   มอบให้กับมูลนิธิ"  ));

$pdf->setXY( 20 , $y_absolute +  ($r*17)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "ตะวันฉายเพื่อผู้ป่วยปากแหว่ง       เพดานโหว่และพิการทางศีรษะและใบหน้า       เพื่อนำไปช่วยเหลือผู้ป่วยปากแหว่ง"  ));

$pdf->setXY( 20 , $y_absolute +  ($r*18)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "เพดานโหว่และพิการทางศีรษะและใบหน้าที่ขาดแคลนทุนทรัพย์   ขาดโอกาสในการได้รับการช่วยเหลือจากแหล่งอื่น"  ));

$pdf->setXY( 20 , $y_absolute +  ($r*19)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , ""  ));

$pdf->setXY( 46 , $y_absolute +  ($r*20)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "บัดนี้      มูลนิธิตะวันฉายฯ       ได้รับเงินบริจาคไว้เป็นที่เรียบร้อยแล้ว        และจะได้ดำเนินการตาม"  ));

$pdf->setXY( 20 , $y_absolute +  ($r*21)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "เจตนารมณ์ของท่านต่อไป    มูลนิธิตะวันฉายฯ   หวังเป็นอย่างยิ่งว่าจะได้รับความอนุเคราะห์จากท่านอีก      ในโอกาส"  ));

$pdf->setXY( 20 , $y_absolute +  ($r*22)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "ต่อไป    ขออาราธนาคุณพระศรีรัตนตรัย   สิ่งศักดิ์สิทธิ์ทั้งหลาย    จงดลบัลดาลให้ท่านและครอบครัวประสบความสุข"  ));

$pdf->setXY( 20 , $y_absolute +  ($r*23)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "ความเจริญ  สัมฤทธิ์ผลในสิ่งอันพึงปรารถนาทุกประการ"  ));

$pdf->setXY( 46 , $y_absolute +  ($r*25)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "จึงเรียนมาเพื่อโปรดทราบ    และขอขอบคุณเป็นอย่างสูง    มา    ณ     ที่นี้"  ));

$pdf->setXY( 100 , $y_absolute +  ($r*27)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "ขอแสดงความนับถือ"  ));


$pdf->setXY( 88 , $y_absolute +  ($r*30)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "(ศาสตราจารย์  นพ.บวรศิลป์    เชาวน์ชื่น)"  ));

$pdf->setXY( 93 , $y_absolute +  ($r*31)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "ประธานกรรมการมูลนิธิตะวันฉาย"  ));

$pdf->setXY( 20 , $y_absolute +  ($r*33)  );
$pdf->SetFont('angsana','',16);
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , "ผู้ประสานงาน : น.ส.นิติรัตน์  พนมไพรพฤกษา / น.ส.โยษิตา จันทิมา "  ));

##------------------------ขีึดเส้นใต้
$pdf->setXY( 10 , $y_absolute +  ($r*35)  );
$pdf->SetFont('angsana','B',18);
$pdf->SetFillColor(255,255, 255);
$pdf->Cell( 190  , 7 , iconv( 'UTF-8','cp874' , '' ),T,0,L,true     );
##------------------------ขีึดเส้นใต้


##------------------------- icon logo ------------------
//$pdf->Image('../icon/px.jpeg',10,12,20,0,'','');//Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])
$pdf->Image('../icon/Logo_cleft.jpg',40,270,20,0,'','');//Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])
$pdf->Image('../icon/med.gif',105,270,13,0,'','');//Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])
$pdf->Image('../icon/kku.gif',170,270,6,0,'','');//Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])
##------------------------- icon logo ------------------
*/


$x1=30;$y1=20;

$pdf->setXY( $x1 , $y1  );
$pdf->SetFont('angsana','I',16);

//  $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ));
//$pdf->Cell( 30  , 10 , iconv( 'UTF-8','cp874' , 'เลขที่ ส่ง' ),LBRT,1,'C',false);
//  $pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ) ,LBRT,1,'C' ,false  );
$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ));



$pdf->setXY( $x1 + 180 , $y1  );
$pdf->SetFont('angsana','',14);

//  $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ));
//$pdf->Cell( 30  , 10 , iconv( 'UTF-8','cp874' , 'เลขที่ ส่ง' ),LBRT,1,'C',false);
//  $pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ) ,LBRT,1,'C' ,false  );
$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " วันที่...".number_format(date("d"))."....เดือน....".date_thai_cut(date("m"))."...พ.ศ. ...".thai_year(date("Y")).".... "  ));
//------------------ จบบรรทัด-----------------------------------------




//------------------ ขึ้นบรรทัดใหม่-----------------------------------------
$pdf->setXY( $x1 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

//  $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ));
//$pdf->Cell( 30  , 10 , iconv( 'UTF-8','cp874' , 'เลขที่ ส่ง' ),LBRT,1,'C',false);
//  $pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ) ,LBRT,1,'C' ,false  );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , " เลข "  ),LRT,1,'C',false);
$pdf->setXY( $x1 , $y1 + 15 );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , " ทะเบียนรับ "  ),LRB ,1,'C',false);




$pdf->setXY( $x1+20 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

//  $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ));
//$pdf->Cell( 30  , 10 , iconv( 'UTF-8','cp874' , 'เลขที่ ส่ง' ),LBRT,1,'C',false);
//  $pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ) ,LBRT,1,'C' ,false  );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , " ที่ "  ),RT,1,'C',false);
$pdf->setXY( $x1+20 , $y1 + 15 );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY( $x1+30+20 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

//  $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ));
//$pdf->Cell( 30  , 10 , iconv( 'UTF-8','cp874' , 'เลขที่ ส่ง' ),LBRT,1,'C',false);
//  $pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ) ,LBRT,1,'C' ,false  );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , " ลงวันที่ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+20 , $y1 + 15 );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);


$pdf->setXY( $x1+30+30+10 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

//  $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ));
//$pdf->Cell( 30  , 10 , iconv( 'UTF-8','cp874' , 'เลขที่ ส่ง' ),LBRT,1,'C',false);
//  $pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ) ,LBRT,1,'C' ,false  );
$pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' , " จาก "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+30 + 10  , $y1 + 15 );
$pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);


$pdf->setXY( $x1+30+30+30+30 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

//  $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ));
//$pdf->Cell( 30  , 10 , iconv( 'UTF-8','cp874' , 'เลขที่ ส่ง' ),LBRT,1,'C',false);
//  $pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ) ,LBRT,1,'C' ,false  );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , " ถึง "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+30 + 30 + 30  , $y1 + 15 );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);



$pdf->setXY( $x1+30+30+30+30+30 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

//  $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ));
//$pdf->Cell( 30  , 10 , iconv( 'UTF-8','cp874' , 'เลขที่ ส่ง' ),LBRT,1,'C',false);
//  $pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ) ,LBRT,1,'C' ,false  );
$pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' , " เรื่่อง "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+30 + 30 + 30 +30  , $y1 + 15 );
$pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);


$pdf->setXY( $x1+30+30+30+30+30+30+20 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

//  $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ));
//$pdf->Cell( 30  , 10 , iconv( 'UTF-8','cp874' , 'เลขที่ ส่ง' ),LBRT,1,'C',false);
//  $pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ) ,LBRT,1,'C' ,false  );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , " การปฏิบัติ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+30 + 30 + 30 +30  + 30 + 20 , $y1 + 15 );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);


$pdf->setXY( $x1+30+30+30+30+30+30+50 , $y1 + 5 );
$pdf->SetFont('angsana','',14);

//  $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ));
//$pdf->Cell( 30  , 10 , iconv( 'UTF-8','cp874' , 'เลขที่ ส่ง' ),LBRT,1,'C',false);
//  $pdf->Cell( 50  , 10 , iconv( 'UTF-8','cp874' , " ทะเบียนหนังสือรับ "  ) ,LBRT,1,'C' ,false  );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , " หมายเหตุ "  ),RT,1,'C',false);
$pdf->setXY( $x1+30+30 + 30 + 30 +30  + 30 + 20 +30 , $y1 + 15 );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , "  "  ),RB,1,'C',false);
//------------------จบบรรทัด-----------------------------------------



//---------------ขึ้นบรรทัดใหม่--------------------------------------

//----------------เลขทะเบียนรับ------

$pdf->SetFont('angsana','',13);


/*
 //--------------เลขทะเบียนรับ--------
$pdf->setXY( $x1 , $y1 + 25 );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , $registration  ),LRB,1,'C',false);

//----------------ที่------
//$pdf->SetFont('angsana','',13);
$pdf->setXY( $x1+30 , $y1 + 25 );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  $at  ),RB,1,'L',false);

//----------------วัน เดือน ปี------
$pdf->setXY( $x1+60 , $y1 + 25 );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  $date  ),RB,1,'C',false);

//----------------จาก------
$pdf->setXY( $x1+90   , $y1 + 25 );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  $from  ),RB,0,'L',false);

//----------------ถึง------
$pdf->setXY( $x1+120  , $y1 + 25 );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  $to  ),RB,1,'L',false);

//----------------เรื่อง------
$pdf->setXY( $x1+150 , $y1 + 25 );
$pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' ,  $subject  ),RB,1,'L',false);

//----------------การปฏฺิบัติ------
$pdf->setXY( $x1+200 , $y1 + 25 );
$pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  $practice  ),RB,1,'L',false);

//----------------หมายเหตุ------
$pdf->setXY( $x1+230 , $y1 + 25 );
$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' ,  $note  ),RB,1,'L',false);
 * 
 */

$addi=0;
 while($row=mysql_fetch_assoc($query))
 {
     $addi += 10;
                    $registration=$row["registration"];
                    $at=$row["at"];
                    $date=$row["date"];
                    $from=$row["from"];
                    $to=$row["to"];
                    $subject=$row["subject"];
                    $practice=$row["practice"];
                    $note=$row["note"];
                    
        
                     //--------------เลขทะเบียนรับ--------
                    $pdf->setXY( $x1 , $y1 +15+ $addi  );
                    $pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' , $registration  ),LBR,1,'C',false);
                    
               
                    
                    
                    
                    //----------------ที่------
                    //$pdf->SetFont('angsana','',13);
                    $pdf->setXY( $x1+20 , $y1 + 15 + $addi    );
                    $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  $at  ),RB,1,'L',false);
                    
                    //----------------วัน เดือน ปี------
                    $pdf->setXY( $x1+50 , $y1  + 15 + $addi   );
                   // $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  $date  ),RB,1,'C',false);
                    $pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' ,  split_dmy_thai($date)  ),RB,1,'C',false);
                   //$pdf->Ln();
                    
                    
                    
                    //----------------จาก------
                    $pdf->setXY( $x1+70   , $y1  + 15 + $addi   );
                   // $pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' , addcslashes($from  , "\n" )  ),RB,0,'L',false);
                   // $pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' , str_replace($from,"ร","\n")  ),RB,0,'L',false);
                    
                   // $pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' , $from    ),RB,1,'L',false);
                   // $pdf->Ln();
                 //   $pdf->setXY( $x1+70   , $y1  + 15 +10+ $addi   );
                  //  $pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' ,substr( $from  ,0,30  )."-".substr($form,30)  ),RB,0,'L',false);
                 //   $pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' ,  chstr1($from)  ),RB,0,'L',false);
                     $pdf->Cell(  50  ,  10 , iconv( 'UTF-8','tis620' , substr($from,0,15) ),RB,0,'L',false);
                  //  $pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' ,  $from   ),2,1,'L');
                 //  $pdf->MultiCell(  50  ,  10 , iconv( 'UTF-8','cp874' ,  $from  ),1,"L");
                  // $pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' , $from    ),0,0,'L');
                 //    $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
                  //  $pdf->Ln(10);
                     
                 
                    
                     
                   //----------------ถึง------
                    $pdf->setXY( $x1+120  , $y1  + 15 + $addi );
                   // $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  substr($to,0,30)."\n" ) ,RB,1,'L',false);
                    $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,   chstr1($to) ) ,RB,1,'L',false);
                   //   $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , $to ) ,RB,1,'L',false);
                    
                    //----------------เรื่อง------
                    $pdf->setXY( $x1+150 , $y1  + 15 + $addi  );
                    $pdf->Cell(  50  ,  10 , iconv( 'UTF-8','cp874' , $subject  ),RB,1,'L',false);
                    
                    
                    //----------------การปฏฺิบัติ------
                    $pdf->setXY( $x1+200 , $y1  + 15 + $addi );
                    $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , $practice ),RB,1,'L',false);
                    
                    //----------------หมายเหตุ------
                    $pdf->setXY( $x1+230 , $y1  + 15 + $addi);
                    //$pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' ,  substr( $note ,0,30)  ),RB,1,'L',false);
                    $pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' ,  $note  ),RB,1,'L',false);
                    
                //    $pdf->setXY( $x1+230 , $y1  + 15 + 10 + $addi);
                //    $pdf->Cell(  20  ,  10 , iconv( 'UTF-8','cp874' ,  " " ),RB,1,'L',false); 
                    

 }
//---------------จบบรรทัด--------------------------------------



      $pdf->Output();
     
     ?>