<?php
//require_once("../config.php");
//http://10.87.196.170/document/report_pdf/docdb/dbreport.php/?type_record=1&type_document=1   //link
//http://10.87.196.170/document/report_pdf/docdb/dbreport.php/?type_record=2&type_document=1
//http://10.87.196.170/document/report_pdf/docdb/dbreport.php/?type_record=3&type_document=2
//base_url()report_pdf/docdb/dbreport.php/?type_record=3&type_document=2

require_once("pdf_class.php"); //class PDF
require_once("query_sick.php");
//require_once 'querydb.php';



//---------------------------------------------PAGE1-------------------------------------

##---- PDF ---
$pdf=new PDF('P','mm','A4');  //ของเดิม
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
$y_absolute=5; //พิกัด Y
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


$x1=20;$y1=15;

$pdf->setXY( 80 , $y1  );
$pdf->SetFont('angsana','B',16);


$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " แบบใบลาป่วย   ลาคลอดบุตร   ลากิจส่วนตัว "  ));



$pdf->setXY( $x1 + 180 , $y1  );
$pdf->SetFont('angsana','',14);


//$pdf->Cell(  0  ,  0 , iconv( 'UTF-8','cp874' , " วันที่...".number_format(date("d"))."....เดือน....".date_thai_cut(date("m"))."...พ.ศ. ...".thai_year(date("Y")).".... "  ));
//------------------ จบบรรทัด-----------------------------------------




//------------------ ขึ้นบรรทัดใหม่-----------------------------------------
/*
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
 *
 */
//------------------จบบรรทัด-----------------------------------------




/*
$pdf->setXY( $x1 , $y1 + 15 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " ทะเบียนส่ง "  ),LRB ,1,'C',false);
 */




$pdf->SetFont('angsana','',14);


/*
 $pdf->setXY( $x1 , $y1 + 5 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ข้าราชการ "  ),'C',false);

$pdf->setXY( $x1 + 25 , $y1 + 5 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานมหาวิทยาลัย "  ),'C',false);

$pdf->setXY( $x1 + 65 , $y1 + 5 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานราชการ "  ),'C',false);

$pdf->setXY( $x1 + 100 , $y1 + 5 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างประจำ "  ),'C',false);

$pdf->setXY( $x1 + 130 , $y1 + 5 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างชั่วคราว "  ),'C',false);
*/

//$type_person=5;

/*
if( $type_person  == 1 )
{
            $pdf->setXY( $x1 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [ / ] ข้าราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 25 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานมหาวิทยาลัย "  ),'C',false);

            $pdf->setXY( $x1 + 65 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 100 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างประจำ "  ),'C',false);

            $pdf->setXY( $x1 + 130 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างศูนย์ตะวันฉาย "  ),'C',false);
}
else if( $type_person  == 2 )
{
            $pdf->setXY( $x1 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ข้าราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 25 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [ / ] พนักงานมหาวิทยาลัย "  ),'C',false);

            $pdf->setXY( $x1 + 65 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 100 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างประจำ "  ),'C',false);

            $pdf->setXY( $x1 + 130 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างศูนย์ตะวันฉาย "  ),'C',false);
}
else if( $type_person  == 3 )
{
            $pdf->setXY( $x1 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ข้าราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 25 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานมหาวิทยาลัย "  ),'C',false);

            $pdf->setXY( $x1 + 65 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [ / ] พนักงานราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 100 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างประจำ "  ),'C',false);

            $pdf->setXY( $x1 + 130 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างศูนย์ตะวันฉาย "  ),'C',false);
}
else if( $type_person  == 4 )
{
            $pdf->setXY( $x1 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ข้าราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 25 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานมหาวิทยาลัย "  ),'C',false);

            $pdf->setXY( $x1 + 65 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 100 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [ / ] ลูกจ้างประจำ "  ),'C',false);

            $pdf->setXY( $x1 + 130 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างศูนย์ตะวันฉาย "  ),'C',false);
}
else if( $type_person  == 5 )
{
            $pdf->setXY( $x1 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ข้าราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 25 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานมหาวิทยาลัย "  ),'C',false);

            $pdf->setXY( $x1 + 65 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 100 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างประจำ "  ),'C',false);

            $pdf->setXY( $x1 + 130 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [ / ] ลูกจ้างศูนย์ตะวันฉาย "  ),'C',false);
}
else
{
     $pdf->setXY( $x1 , $y1 + 3 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ข้าราชการ "  ),'C',false);

$pdf->setXY( $x1 + 25 , $y1 + 3 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานมหาวิทยาลัย "  ),'C',false);

$pdf->setXY( $x1 + 65 , $y1 + 3 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานราชการ "  ),'C',false);

$pdf->setXY( $x1 + 100 , $y1 + 3 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างประจำ "  ),'C',false);

$pdf->setXY( $x1 + 130 , $y1 + 3 );
$pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างศูนย์ตะวันฉาย "  ),'C',false);
}
*/


if( $type_person  == 5 )
{

           /*
            $pdf->setXY( $x1 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ข้าราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 25 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานมหาวิทยาลัย "  ),'C',false);

            $pdf->setXY( $x1 + 65 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] พนักงานราชการ "  ),'C',false);

            $pdf->setXY( $x1 + 100 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลูกจ้างประจำ "  ),'C',false);
          */

            $pdf->setXY( $x1 + 130 , $y1 + 3 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [ / ] เจ้าหน้าที่ศูนย์ตะวันฉาย "  ),'C',false);
}


     //----------- เขียนที่-------------------
     $pdf->setXY( $x1 + 80 , $y1 + 10 );
     $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " เขียนที่  ".".......................".$write."...................."  ),'C',false);


      //----------- วันที่-------------------
      $pdf->setXY( $x1 + 90 , $y1 + 15 );
     $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " วันที่"."...".$ex1[2].".....เดือน.....".$month."......พ.ศ. .......".$year."......."  ),'C',false);

       //-----------เรื่อง-------------------
      $pdf->setXY( $x1  , $y1 + 20 );
      $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "เรื่อง    ขอลา  "  ),'C',false);

      if( $me_leave == 1 )     //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
      {
      $pdf->setXY( $x1+20  , $y1 + 20 );
      $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [ / ] ลาป่วย  [  ] ลาคลอดบุตร  [  ] ลากิจส่วนตัว    "  ),'C',false);
      }
       else   if( $me_leave == 2 )     //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
      {
      $pdf->setXY( $x1+20  , $y1 + 20 );
      $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [   ] ลาป่วย  [  ] ลาคลอดบุตร  [ / ] ลากิจส่วนตัว    "  ),'C',false);
      }
        else   if( $me_leave == 3 )     //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
      {
      $pdf->setXY( $x1+20  , $y1 + 20 );
      $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [   ] ลาป่วย  [  ] ลาคลอดบุตร  [ / ] ลากิจส่วนตัว    "  ),'C',false);
      }
      else
       {
            $pdf->setXY( $x1+20  , $y1 + 20 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , " [  ] ลาป่วย  [  ] ลาคลอดบุตร  [  ] ลากิจส่วนตัว    "  ),'C',false);
        }

    //-----------เรียน-------------------
      $pdf->setXY( $x1  , $y1 + 25 );
      $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "เรียน   ".$study.""  ),'C',false);



      //--------------------- ขึ้ันบรรทัดใหม่----------------------------------------------------------------
      //-----------ข้าพเจ้า-------------------
        $pdf->setXY( $x1 + 17  , $y1 + 35 );
      $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ข้าพเจ้า("  ),'C',false);


    //  $prename = 2;

      if( $prename == 1  )
      {
       $pdf->SetFont('angsana','U',14);
       $pdf->setXY( $x1 + 28  , $y1 + 35 );
       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,  $prename_detail  ),'C',false);
        $pdf->SetFont('angsana','',14);
        $pdf->setXY( $x1 + 34  , $y1 + 35 );
        $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,  "/นาง/นางสาว)"  ),'C',false);
      }
      else if( $prename == 2  )
      {
       $pdf->SetFont('angsana','',14);
       $pdf->setXY( $x1 + 28  , $y1 + 35 );
       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,  "นาย/"  ),'C',false);
        $pdf->SetFont('angsana','U',14);
        $pdf->setXY( $x1 + 34  , $y1 + 35 );
        $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,  $prename_detail  ),'C',false);
         $pdf->SetFont('angsana','',14);
         $pdf->setXY( $x1 + 39  , $y1 + 35 );
         $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,  "/นางสาว)"  ),'C',false);
      }
       else if( $prename == 3  )
      {
       $pdf->SetFont('angsana','',14);
       $pdf->setXY( $x1 + 28  , $y1 + 35 );
       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,  "นาย/นางสาว/"  ),'C',false);
       // $pdf->SetFont('angsana','U',14);
        $pdf->setXY( $x1 + 46  , $y1 + 35 );
         $pdf->SetFont('angsana','U',14);
        $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,  $prename_detail.")"  ),'C',false);
        // $pdf->SetFont('angsana','',14);
        // $pdf->setXY( $x1 + 39  , $y1 + 55 );
        // $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,  "/นางสาว)"  ),'C',false);
      }



   //   $first_name
      $pdf->SetFont('angsana','',14);
     $pdf->setXY( $x1 + 53 , $y1 + 35 );
      $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "...............".$first_name."....".$last_name."..................ตำแหน่ง.........".$position.".........."   ),'C',false);



        //--------------------- ขึ้ันบรรทัดใหม่----------------------------------------------------------------
       $pdf->SetFont('angsana','',14);
       $pdf->setXY( $x1 , $y1 + 45 );
      $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "สังกัดหน่วย.........................".$affiliation."........................งาน...........".$work."..........  คณะแพทยศาสตร์      โทร. ..........".$tel."............."   ),'C',false);


      //-------------------------- ขึ้นบรรทัดใหม่-------------------
      //   1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
        // $sick_disease=$row["sick_disease"];  //   ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน
       // $me_leave="";
       // $sick_disease="";


        if( $me_leave == 1 && $sick_disease == 1  )
        {
             $pdf->setXY( $x1 + 17  , $y1 + 51 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "( / )  ป่วย  ด้วยโรค.............".$disease_detail."......................เกี่ยวข้องหรือมีสาเหตุจาก  [ / ] จากการทำงาน"  ),'C',false);
             $pdf->setXY( $x1 + 111  , $y1 + 56 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "[   ] ไม่ใช่จากการทำงาน"  ),'C',false);


           $pdf->setXY( $x1   , $y1 + 60 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ขอลา"  ),'C',false);
           $pdf->setXY( $x1 + 17  , $y1 + 60 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "(   ) กิจส่วนตัว     เนื่องจาก.....".$disease_person."......................................................................................"  ),'C',false);

           $pdf->setXY( $x1 + 17  , $y1 + 67 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "(   )  คลอดบุตร"  ),'C',false);

        }
        elseif( $me_leave == 1 && $sick_disease == 2  )
        {
             $pdf->setXY( $x1 + 17  , $y1 + 51 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "( / )  ป่วย  ด้วยโรค.............".$disease_detail."......................เกี่ยวข้องหรือมีสาเหตุจาก  [   ] จากการทำงาน"  ),'C',false);
             $pdf->setXY( $x1 + 111  , $y1 + 56 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "[ / ] ไม่ใช่จากการทำงาน"  ),'C',false);

           $pdf->setXY( $x1   , $y1 + 60 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ขอลา"  ),'C',false);
           $pdf->setXY( $x1 + 17  , $y1 + 60 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "(   ) กิจส่วนตัว     เนื่องจาก.....".$disease_person."......................................................................................"  ),'C',false);

           $pdf->setXY( $x1 + 17  , $y1 + 67 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "(   )  คลอดบุตร"  ),'C',false);
        }

        /*
         else
        {
             $pdf->setXY( $x1 + 17  , $y1 + 51 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "(   )  ป่วย  ด้วยโรค.............".@$disease_detail."......................เกี่ยวข้องหรือมีสาเหตุจาก  [   ] จากการทำงาน"  ),'C',false);
             $pdf->setXY( $x1 + 111  , $y1 + 56 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "[   ] ไม่ใช่จากการทำงาน"  ),'C',false);
        }
        */

        if( $me_leave == 2  )
        {

             $pdf->setXY( $x1 + 17  , $y1 + 51 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "(   )  ป่วย  ด้วยโรค.............".@$disease_detail."......................เกี่ยวข้องหรือมีสาเหตุจาก  [   ] จากการทำงาน"  ),'C',false);
             $pdf->setXY( $x1 + 111  , $y1 + 56 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "[   ] ไม่ใช่จากการทำงาน"  ),'C',false);


           $pdf->setXY( $x1   , $y1 + 60 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ขอลา"  ),'C',false);
           $pdf->setXY( $x1 + 17  , $y1 + 60 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "( / ) กิจส่วนตัว     เนื่องจาก.....".$disease_person."......................................................................................"  ),'C',false);

        }
        elseif ( $me_leave == 3  )
        {

             $pdf->setXY( $x1 + 17  , $y1 + 51 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "(   )  ป่วย  ด้วยโรค.............".@$disease_detail."......................เกี่ยวข้องหรือมีสาเหตุจาก  [   ] จากการทำงาน"  ),'C',false);
             $pdf->setXY( $x1 + 111  , $y1 + 56 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "[   ] ไม่ใช่จากการทำงาน"  ),'C',false);


           $pdf->setXY( $x1   , $y1 + 60 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ขอลา"  ),'C',false);
           $pdf->setXY( $x1 + 17  , $y1 + 60 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "(   ) กิจส่วนตัว     เนื่องจาก.....".$disease_person."......................................................................................"  ),'C',false);


              $pdf->setXY( $x1 + 17  , $y1 + 67 );
              $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "( / )  คลอดบุตร"  ),'C',false);

        }


        /*
           else
        {
             $pdf->setXY( $x1 + 17  , $y1 + 51 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "(   )  ป่วย  ด้วยโรค.............".$disease_detail."......................เกี่ยวข้องหรือมีสาเหตุจาก  [   ] จากการทำงาน"  ),'C',false);
             $pdf->setXY( $x1 + 111  , $y1 + 56 );
             $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "[   ] ไม่ใช่จากการทำงาน"  ),'C',false);


           $pdf->setXY( $x1   , $y1 + 60 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ขอลา"  ),'C',false);
           $pdf->setXY( $x1 + 17  , $y1 + 60 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "(   ) กิจส่วนตัว     เนื่องจาก.....".$disease_person."......................................................................................"  ),'C',false);

           $pdf->setXY( $x1 + 17  , $y1 + 67 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "(   )  คลอดบุตร"  ),'C',false);


        }
        */


           $pdf->setXY( $x1 + 17  , $y1 + 75 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ตั้งแต่วันที่........".$begin_date_conv1 ."........ถึงวันที่.........". $end_date_conv1.".........มีกำหนด......".$count_date.".........วัน"  ),'C',false);


            //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
         //  $me_leave='';
          if( $me_leave == 1 )
          {
                $pdf->setXY( $x1   , $y1 + 81 );
                $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ข้าพเจ้าได้ลา  ( / ) ป่วย  (   ) กิจส่วนตัว  (   ) คลอดบุตร    "  ),'C',false);
          }
         elseif( $me_leave == 2  )
         {
                $pdf->setXY( $x1   , $y1 + 81 );
                $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ข้าพเจ้าได้ลา  (   ) ป่วย  ( / ) กิจส่วนตัว  (   ) คลอดบุตร    "  ),'C',false);
         }
            elseif( $me_leave == 3  )
         {
                $pdf->setXY( $x1   , $y1 + 81 );
                $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ข้าพเจ้าได้ลา  (   ) ป่วย  (   ) กิจส่วนตัว  ( / ) คลอดบุตร    "  ),'C',false);
         }
         else{
                $pdf->setXY( $x1   , $y1 + 81 );
                $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ข้าพเจ้าได้ลา  (   ) ป่วย  (   ) กิจส่วนตัว  (   ) คลอดบุตร    "  ),'C',false);
         }

                $pdf->setXY( $x1+74   , $y1 + 81 );
                $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ครั้งสุดท้ายตั้งแต่วันที่.......". $begin_date2_conv."..........ถึง.......". $end_date2_conv.".........."  ),'C',false);

                $pdf->setXY( $x1   , $y1 + 88 );
                $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "มีกำหนด........". $count_date2.".......วัน    ในระหว่างลาจะติดต่อข้าพเจ้าได้ที่   "  ),'C',false);

                 $pdf->setXY( $x1   , $y1 + 96 );
                 $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"บ้านเลขที่..........".$house_number.".........ถนน..............".$road.".............ตำบล............".$district."............อำเภอ...........".$district2.".........."  ),'C',false);

                 $pdf->setXY( $x1   , $y1 + 103);
                 $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"จังหวัด...........".$province."..........โทรศัพท์...........".$tel2.".........."  ),'C',false);

                  $pdf->setXY( $x1+100   , $y1 + 110);
                  $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"ขอแสดงความนับถือ"  ),'C',false);


                  $pdf->setXY( $x1+10  , $y1 + 120);
                  $pdf->SetFont('angsana','BU',14);
                  $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"สถิติการลาในปีงบประมาณนี้"  ),'C',false);


                   $pdf->setXY( $x1+90  , $y1 + 123);
                  $pdf->SetFont('angsana','',14);
                  $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"(ลงชื่อ)..........".$sign_name.".....".$sign_lastname."............"  ),'C',false);

                   $sign_prename="";
                  if( $sign_prename == 1)
                  {
                      $pdf->setXY( $x1+80  , $y1 + 130);
                       $pdf->SetFont('angsana','U',14);
                       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"(นาย" ),'C',false);
                       $pdf->SetFont('angsana','',14);
                       $pdf->setXY( $x1+87  , $y1 + 130);
                       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"/นาง/นางสาว)............".$firstname3.".....".$lastname3."............"  ),'C',false);
                  }
                 else  if( $sign_prename == 2)
                  {
                      $pdf->setXY( $x1+80  , $y1 + 130);
                       $pdf->SetFont('angsana','',14);
                       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"(นาย/" ),'C',false);
                       $pdf->SetFont('angsana','U',14);
                       $pdf->setXY( $x1+87  , $y1 + 130);
                       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"นาง"  ),'C',false);
                        $pdf->setXY( $x1+92  , $y1 + 130);
                       $pdf->SetFont('angsana','',14);
                       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"/นางสาว)"."............".$firstname3.".....".$lastname3."............"  ),'C',false);
                  }
                  else  if( $sign_prename == 3)
                  {
                       $pdf->setXY( $x1+80  , $y1 + 130);
                       $pdf->SetFont('angsana','',14);
                       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"(นาย/นาง/" ),'C',false);
                       $pdf->setXY( $x1+94  , $y1 + 130);
                       $pdf->SetFont('angsana','U',14);
                       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"นางสาว)"  ),'C',false);
                       $pdf->SetFont('angsana','',14);
                        $pdf->setXY( $x1+105  , $y1 + 130);
                       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "......".$firstname3.".....".$lastname3."............"  ),'C',false);
                  }
                  else{
                      $pdf->setXY( $x1+80  , $y1 + 130);
                       $pdf->SetFont('angsana','',14);
                       $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"(นาย/นาง/นางสาว)............".$firstname3.".....".$lastname3."............" ),'C',false);
                  //     $pdf->SetFont('angsana','',14);
                   //    $pdf->setXY( $x1+87  , $y1 + 130);
                   //    $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' ,"/นาง/นางสาว)............".$firstname3.".....".$lastname3."............"  ),'C',false);

                  }

                  //-----------หัว--- ตาราง----------------------
                       $pdf->setXY( $x1  , $y1 + 140);
                       $pdf->SetFont('angsana','',14);
                       $pdf->Cell(  23  ,  14 , iconv( 'UTF-8','cp874' ,"ประเภทการลา" ),1,0,'C',false);


                          $pdf->setXY( $x1 +23 , $y1 + 140 );
                       $pdf->Cell(  23  ,  7 , iconv( 'UTF-8','cp874' ,"ลามาแล้ว" ),'RT',0,'C',false);
                       $pdf->setXY( $x1 +23 , $y1 + 147 );
                       $pdf->Cell(  23  ,  7 , iconv( 'UTF-8','cp874' ,"(วันทำการ)" ),'ฺBR',0,'C',false);

                      $pdf->setXY( $x1 +23+23 , $y1 + 140 );
                      $pdf->Cell(  23  ,  7 , iconv( 'UTF-8','cp874' ,"ลาครั้งนี้" ),'RT',0,'C',false);
                      $pdf->setXY( $x1 +23 +23 , $y1 + 147 );
                      $pdf->Cell(  23  ,  7 , iconv( 'UTF-8','cp874' ,"(วันทำการ)" ),'ฺBR',0,'C',false);

                        $pdf->setXY( $x1 +23+23+23 , $y1 + 140 );
                        $pdf->Cell(  23  ,  7 , iconv( 'UTF-8','cp874' ,"รวมเป็น" ),'RT',0,'C',false);
                        $pdf->setXY( $x1 +23 +23+23 , $y1 + 147 );
                        $pdf->Cell(  23  ,  7 , iconv( 'UTF-8','cp874' ,"(วันทำการ)" ),'ฺBR',0,'C',false);
                   //-----------หัว--- ตาราง----------------------

                   //--------------------- ป่วย-----------------------------
                   $pdf->setXY( $x1  , $y1 + 140+14);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ป่วย" ),1,0,'L',false);

                  $pdf->setXY( $x1+23  , $y1 + 140+14);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,  $sick1 ),'BR',0,'C',false);

                    $pdf->setXY( $x1+23+23 , $y1 + 140+14);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' , $sick2 ),'BR',0,'C',false);

                     $pdf->setXY( $x1+23+23+23 , $y1 + 140+14);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' , $total_sick ),'BR',0,'C',false);

                   //---------------------กิจส่วนตัว----------------------------
                  $pdf->setXY( $x1  , $y1 + 140+14+10);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"กิจส่วนตัว" ),1,0,'L',false);

                  $pdf->setXY( $x1+23  , $y1 + 140+14+10);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,  $sick_person1 ),'BR',0,'C',false);

                    $pdf->setXY( $x1+23+23 , $y1 + 140+14+10);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' , $sick_person2  ),'BR',0,'C',false);

                     $pdf->setXY( $x1+23+23+23 , $y1 + 140+14+10);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,  $total_sick_person ),'BR',0,'C',false);

                   //-------------------คลอดบุตร-------------------------------
                   $pdf->setXY( $x1  , $y1 + 140+14+10+10);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"คลอดบุตร" ),1,0,'L',false);

                         $pdf->setXY( $x1+23  , $y1 + 140+14+10+10);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' , $confined1 ),'BR',0,'C',false);

                    $pdf->setXY( $x1+23+23 , $y1 + 140+14+10+10);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' , $confined2 ),'BR',0,'C',false);

                     $pdf->setXY( $x1+23+23+23 , $y1 + 140+14+10+10);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' , $total_confined ),'BR',0,'C',false);


                   //------------------ ความเห็นของผู้บังคับบัญชา--------------
                    $pdf->setXY( $x1 +80+10+10 , $y1 + 140  );
                   $pdf->SetFont('angsana','U',14);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ความเห็นของผู้บังคับบัญชาชั้นต้น" ),0,0,'L',false);


                   $pdf->setXY( $x1 +80+10+10+45 , $y1 + 140  );
                   $pdf->SetFont('angsana','',14);
                   $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"(โปรดระบุ ข้อ ก และ ข้อ ข)" ),0,0,'L',false);


                  //---------------------------ความเห็นของผู้บังคับบัญชา------------------------------
                  //

                   // $supervisor_sick = '';
                   if(  $supervisor_sick == 1)
                   {
                      $pdf->setXY( $x1 +80+10+10 , $y1 + 140 +5 );
                      $pdf->SetFont('angsana','',14);
                      $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ก ( / ) เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน" ),0,0,'L',false);

                        $pdf->setXY( $x1 +80+10+10+1+1+1 , $y1 + 140 +5 +5 );
                        $pdf->SetFont('angsana','',14);
                        $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"(   ) ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน" ),0,0,'L',false);

                   }
                   else  if(  $supervisor_sick == 2 )
                   {
                      $pdf->setXY( $x1 +80+10+10 , $y1 + 140 +5 );
                      $pdf->SetFont('angsana','',14);
                      $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ก (   ) เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน" ),0,0,'L',false);

                        $pdf->setXY( $x1 +80+10+10+1+1+1 , $y1 + 140 +5 +5 );
                        $pdf->SetFont('angsana','',14);
                        $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"( / ) ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน" ),0,0,'L',false);

                   }
                   else
                   {

                       $pdf->setXY( $x1 +80+10+10 , $y1 + 140 +5 );
                      $pdf->SetFont('angsana','',14);
                      $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ก (   ) เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน" ),0,0,'L',false);

                        $pdf->setXY( $x1 +80+10+10+1+1+1 , $y1 + 140 +5 +5 );
                        $pdf->SetFont('angsana','',14);
                        $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"(   ) ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน" ),0,0,'L',false);

                   }

                   //-------------------------------------1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                 //  $supervisor_agree='';
                   if( $supervisor_agree == 1 )
                   {
                      $pdf->setXY( $x1 +80+10+10 , $y1 + 140 +10 +5);
                      $pdf->SetFont('angsana','',14);
                      $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ข ( / ) เห็นด้วยควรอนุญาต   (   ) เห็นควรไม่อนุญาต  " ),0,0,'L',false);
                   }
                   elseif( $supervisor_agree == 2  )
                   {
                        $pdf->setXY( $x1 +80+10+10 , $y1 + 140 +10 +5);
                        $pdf->SetFont('angsana','',14);
                        $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ข (   ) เห็นด้วยควรอนุญาต   ( /  ) เห็นควรไม่อนุญาต  " ),0,0,'L',false);
                   }
                   else
                   {
                         $pdf->setXY( $x1 +80+10+10 , $y1 + 140 +10 +5);
                         $pdf->SetFont('angsana','',14);
                         $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ข (   ) เห็นด้วยควรอนุญาต   (   ) เห็นควรไม่อนุญาต  " ),0,0,'L',false);
                   }

                       //ชื่อ ผู้ตรวจสอบ
                       $pdf->setXY( $x1  , $y1 + 140 +10 +5 + 5+30 );
                       $pdf->SetFont('angsana','',14);
                      // $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"(ลงชื่อ)..........".$inspector_name.".............".$inspector_lastname."...........ผู้ตรวจสอบ" ),0,0,'L',false);
                        $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"(ลงชื่อ)..........".$inspector_name."............."."..................."."...........ผู้ตรวจสอบ" ),0,0,'L',false); //แก้ไข 5-7-60

                       $pdf->setXY( $x1  , $y1 + 140 +10 +5 + 5+30+7 );
                       $pdf->SetFont('angsana','',14);
                      // $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ตำแหน่ง....222.....".$inspector_position."........................" ),0,0,'L',false);
                       $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ตำแหน่ง........."."ผู้่ช่วยวิจัยและธุรการ"."................." ),0,0,'L',false);  //แก้ไข 5-7-60

                       $pdf->setXY( $x1  , $y1 + 140 +10 +5 + 5+30+7+7 );
                       $pdf->SetFont('angsana','',14);
                       $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"วันที่.....................".$date_inspecto_conv."................." ),0,0,'L',false);


                        //ชื่อ ผู้ตรวจสอบ
                       $pdf->setXY( $x1 +110 , $y1 + 115 +10 +5 +20 +10+10 );
                       $pdf->SetFont('angsana','',14);
                       $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"(ลงชื่อ)..........".$first_name2."....".$last_name2."...........ผู้บังคับบัญชา" ),0,0,'L',false);

                       $pdf->setXY( $x1 +110 , $y1 + 115 +10 +5 +20 +10+10+6 );
                       $pdf->SetFont('angsana','',14);
                       $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ตำแหน่ง............".$postion2."............" ),0,0,'L',false);

                        $pdf->setXY( $x1 +110+5 , $y1 + 115 +10 +5 +20 +10+10+6+6 );
                       $pdf->SetFont('angsana','',14);
                       $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"วันที่...........".$commander_date_conv."..........." ),0,0,'L',false);

                       $pdf->setXY( $x1 +110 , $y1 + 125 +10 +5 +20 +10+10+6+6+7);
                       $pdf->SetFont('angsana','U',14);
                       $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"คำสั่งผู้บริหาร" ),0,0,'L',false);

                       //   คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                       //$manager_allow='';
                       if(  $manager_allow == 1 )
                       {
                       $pdf->setXY( $x1 +110 , $y1 + 130 +10 +5 +20 +10+10+6+6+7);
                       $pdf->SetFont('angsana','',14);
                       $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"( / ) อนุญาต    (   ) ไม่อนุญาต " ),0,0,'L',false);
                       }
                       elseif(  $manager_allow==2 )
                        {
                       $pdf->setXY( $x1 +110 , $y1 + 130 +10 +5 +20 +10+10+6+6+7);
                       $pdf->SetFont('angsana','',14);
                       $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"(   ) อนุญาต    ( / ) ไม่อนุญาต " ),0,0,'L',false);
                       }
                       else
                       {
                             $pdf->setXY( $x1 +110 , $y1 + 130 +10 +5 +20 +10+10+6+6+7);
                            $pdf->SetFont('angsana','',14);
                            $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"(   ) อนุญาต    (   ) ไม่อนุญาต " ),0,0,'L',false);
                       }


                            $pdf->setXY( $x1 +110 , $y1 + 140 +10 +5 +20 +10+10+6+6+7);
                            $pdf->SetFont('angsana','',14);
                            $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"(ลงชื่อ)  (..........".$first_name3.".......".$last_name3."............)" ),0,0,'L',false);

                            $pdf->setXY( $x1 +110 , $y1 + 150 +10 +5 +20 +10+10+6+6+7);
                            $pdf->SetFont('angsana','',14);
                            $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"ตำแหน่ง..............".$manager_position."..............." ),0,0,'L',false);


                            $pdf->setXY( $x1 +110 , + 160 +10 +5 +20 +10+10+6+6+7);
                            $pdf->SetFont('angsana','',14);
                            $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"วันที่...................".$date_manager_conv."....................." ),0,0,'L',false);


                            /*
                            $pdf->setXY( $x1  , $y1 + 140 +10 +5 +20 +10+10+6+6+7+7+10+7+7+1);
                            $pdf->SetFont('angsana','B',10);
                            $pdf->Cell(  23  ,  10 , iconv( 'UTF-8','cp874' ,"หมายเหตุ 1" ),0,0,'L',false);
                            */


      /*
       //-------------begin------มีวันลาสะสม------------------------------------------------
            $pdf->setXY( $x1+50 , $y1 + 55 );
           $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "มีวันลาสะสม"   ),'C',false);
           $pdf->Cell(  10  ,  8 , iconv( 'UTF-8','cp874' , $cumulative   ),1,0,'C',false);
            $pdf->setXY( $x1+120 , $y1 + 55 );
            $pdf->Cell(  10  ,  10 , iconv( 'UTF-8','cp874' , "วันทำการ"   ),0,'C',false);

      //-------------begin------มีวันลาพักผ่อนในปีนี้อีก------------------------------------------------
            $pdf->setXY( $x1+50 , $y1 + 65 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "มีวันลาพักผ่อนในปีนี้อีก"   ),'C',false);
            $pdf->Cell(  10  ,  8 , iconv( 'UTF-8','cp874' , $rest   ),1,0,'C',false);
             $pdf->setXY( $x1+120 , $y1 + 65 );
            $pdf->Cell(  10  ,  10 , iconv( 'UTF-8','cp874' , "วันทำการ"   ),0,'C',false);

      //-------------begin------รวมวันลาเป็น------------------------------------------------
            $pdf->setXY( $x1+50 , $y1 + 75 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "รวมวันลาเป็น"   ),'C',false);
               $pdf->Cell(  10  ,  8 , iconv( 'UTF-8','cp874' ,  $total   ),1,0,'C',false);
              $pdf->setXY( $x1+120 , $y1 + 75 );
            $pdf->Cell(  10  ,  10 , iconv( 'UTF-8','cp874' , "วันทำการ"   ),0,'C',false);

        //-------------begin------ในปีนี้ลามาแล้ว------------------------------------------------
               $pdf->setXY( $x1+50 , $y1 + 85 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ในปีนี้ลามาแล้ว"   ),'C',false);
              $pdf->Cell(  10  ,  8 , iconv( 'UTF-8','cp874' ,  $current   ),1,0,'C',false);
               $pdf->setXY( $x1+120 , $y1 + 85 );
             $pdf->Cell(  10  ,  10 , iconv( 'UTF-8','cp874' , "วันทำการ"   ),0,'C',false);

       //-------------begin------คงเหลือวันลาอีก-----------------------------------------------
                $pdf->setXY( $x1+50 , $y1 + 95 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "คงเหลือวันลาอีก"   ),'C',false);
                  $pdf->Cell(  10  ,  8 , iconv( 'UTF-8','cp874' ,  $keep   ),1,0,'C',false);
               $pdf->setXY( $x1+120 , $y1 + 95 );
             $pdf->Cell(  10  ,  10 , iconv( 'UTF-8','cp874' , "วันทำการ"   ),0,'C',false);

           //-------------begin------มีความประสงค์จะขอลาพักผ่อนมีกำหนดมีกำหนด----------------------------------------------
             $pdf->setXY( $x1+10 , $y1 + 105 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "มีความประสงค์จะขอลาพักผ่อนมีกำหนดมีกำหนด"   ),'C',false);
              $pdf->setXY( $x1+90 , $y1 + 105 );
                  $pdf->Cell(  10  ,  8 , iconv( 'UTF-8','cp874' ,  $wishes   ),1,0,'C',false);
               $pdf->setXY( $x1+120 , $y1 + 105 );
             $pdf->Cell(  10  ,  10 , iconv( 'UTF-8','cp874' , "วันทำการ"   ),0,'C',false);


              //-------------begin-----ขอลาพักผ่อนตั้งแต่วันที่----------------------------------------------
            $pdf->setXY( $x1 , $y1 + 115 );
            $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ขอลาพักผ่อนตั้งแต่วันที่...".$ex2[2]."...เดือน.......".$month2.".......พ.ศ. ...".$year2."...ถึงวันที่....".$ex3[2]."...เดือน......".$month3.".......พ.ศ. .....".$year3."....."   ),'C',false);

             //-----------------ในระหว่างลาพักผ่อนครั้งนี้------------------------
              $pdf->setXY( $x1+10 , $y1 + 120 );
               $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ในระหว่างลาพักผ่อนครั้งนี้  หากมีราชการด่วนติดต่อได้ที่บ้านเลขที่........".$house_number.".......ถนน......".$road.".........."   ),'C',false);


               //-----------------ในระหว่างลาพักผ่อนครั้งนี้------------------------
                $pdf->setXY( $x1 , $y1 + 125 );
                $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ตำบล/แขวง........".$district."........อำเภอ/เขต...........".$city."..........จังหวัด......".$province.".......โทรศัพท์......".$tel_address."........"   ),'C',false);

                 //-----------------ขอแสดงความนับถือ----------------------
                 $pdf->setXY( $x1+125 , $y1 + 135 );
                 $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "ขอแสดงความนับถือ"   ),'C',false);

                  //-----------------สถิติการลาในปีงบประมาณนี้----------------------
                 $pdf->setXY( $x1+10 , $y1 + 145 );
                   $pdf->SetFont('angsana','U',14);
                 $pdf->Cell(  40  ,  10 , iconv( 'UTF-8','cp874' , "สถิติการลาในปีงบประมาณนี้"   ),'C',false);


                 //-------------------- ตารางวันลา ------------------------------
                  $pdf->setXY( $x1+10 , $y1 + 155 );
                  $pdf->SetFont('angsana','B',14);
                  $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "ลามาแล้ว"   ),TLR,0,'C',false);
                  $pdf->setXY( $x1+10 , $y1 + 165 );
                  $pdf->SetFont('angsana','',14);
                  $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "(วันทำการ)"   ),BLR,0,'C',false);

                  $pdf->setXY( $x1+10 , $y1 + 175 );
                  $pdf->SetFont('angsana','',14);
                  $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , $leave   ),BLR,0,'C',false);


                  $pdf->setXY( $x1+40 , $y1 + 155 );
                  $pdf->SetFont('angsana','B',14);
                  $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "ลาครั้งนี้"   ),TLR,0,'C',false);

                  $pdf->setXY( $x1+40 , $y1 + 165 );
                  $pdf->SetFont('angsana','',14);
                  $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "(วันทำการ)"   ),BLR,0,'C',false);

                  $pdf->setXY( $x1+40 , $y1 + 175 );
                  $pdf->SetFont('angsana','',14);
                  $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  $leave_thistime   ),BLR,0,'C',false);



                  $pdf->setXY( $x1+70 , $y1 + 155 );
                  $pdf->SetFont('angsana','B',14);
                  $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "รวมเป็น"   ),TLR,0,'C',false);
                  $pdf->setXY( $x1+70 , $y1 + 165 );
                  $pdf->SetFont('angsana','',14);
                  $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "(วันทำการ)"   ),BLR,0,'C',false);
                  $pdf->setXY( $x1+70 , $y1 + 175 );
                  $pdf->SetFont('angsana','',14);
                  $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,   $date_total_leave   ),BLR,0,'C',false);
                   //-------------------- ตารางวันลา ------------------------------



                  //--------------ลงชื่อ ขอแสดงความนับถือ--------------
                  $pdf->setXY( $x1+112 , $y1 + 145 );
                  $pdf->SetFont('angsana','',14);
                  $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "(ลงชื่อ)..............".$sign.".............."   ),0,'C',false);

                  if(   $presign==1 )
                  {
                     $pdf->setXY( $x1+110 , $y1 + 155 );
                     $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "("  ),0,'C',false);
                     $pdf->SetFont('angsana','U',14);
                      $pdf->setXY( $x1+111 , $y1 + 155);
                       $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , $presign_detail  ),0,'C',false);
                      $pdf->setXY( $x1+117 , $y1 + 155 );
                      $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "/นาง/นางสาว)"  ),0,'C',false);
                  }


                  else  if(   $presign==2 )
                  {
                     $pdf->setXY( $x1+110 , $y1 + 155 );
                     $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "(นาย/"  ),0,'C',false);

                     $pdf->SetFont('angsana','U',14);

                      $pdf->setXY( $x1+117 , $y1 + 155 );
                       $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , $presign_detail  ),0,'C',false);


                      $pdf->setXY( $x1+122 , $y1 + 155 );
                      $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "/นางสาว)"  ),0,'C',false);

                  }

                   else  if(   $presign==3 )
                  {
                     $pdf->setXY( $x1+110 , $y1 + 155 );
                     $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , "(นาย/นาง/"  ),0,'C',false);

                     $pdf->SetFont('angsana','U',14);

                      $pdf->setXY( $x1+123 , $y1 + 155 );
                       $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , $presign_detail  ),0,'C',false);

                        $pdf->SetFont('angsana','',14);
                        $pdf->setXY( $x1+134 , $y1 + 155 );
                        $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' , ")"  ),0,'C',false);



                  }


                     $pdf->setXY( $x1+136 , $y1 + 155 );
                     $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  ".......".$name_sign.".....".$lastname_sign.".....)"  ),0,'C',false);


                     $pdf->setXY( $x1+119 , $y1 + 175 );
                     $pdf->SetFont('angsana','U',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "ความเห็นของผู้บังคับบัญชาชั้นต้น"  ),0,'C',false);


                     if( $allowed  == 1  )
                     {
                     $pdf->setXY( $x1+110 , $y1 + 185 );
                     $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "( / )   เห็นควรอนุญาต   (  )   เห็นควรไม่อนุญาต"  ),0,'C',false);
                     }
                        else   if( $allowed  == 2  )
                     {
                     $pdf->setXY( $x1+110 , $y1 + 185  );
                     $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "(  )   เห็นควรอนุญาต   ( / )   เห็นควรไม่อนุญาต"  ),0,'C',false);
                     }


                    //--------------- ลงชื่อผู้ตรวจสอบ-----------------------------
                     $pdf->setXY( $x1 , $y1 + 210  );
                     $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "(ลงชื่อ).........".$name_inspector."  ".$lastname_inspector."...........ผู้ตรวจสอบ"  ),0,'C',false);


                      //--------------- ลงชื่อผู้ตรวจสอบ-----------------------------
                     $pdf->setXY( $x1 , $y1 + 190 );
                     $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "    ตำแหน่ง...........".$position_inspector."............  "  ),0,'C',false);


                     //--------------- ลงชื่อผู้บริหาร-----------------------------
                     $pdf->setXY( $x1+100 , $y1 + 195 );
                     $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "(ลงชื่อ)  (..................".$name_commander.".....".$lastname_commander.".......................)"  ),0,'C',false);


                     $pdf->setXY( $x1+100 , $y1 + 200 );
                     $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "ตำแหน่ง.............................".$position_commander."......................"  ),0,'C',false);



                     $pdf->setXY( $x1+105 , $y1 + 205 );
                     $pdf->SetFont('angsana','',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "วันที่...............".$ex4[2]."..........".$month4."........".$year4."......................."  ),0,'C',false);


                     $pdf->setXY( $x1+130 , $y1 + 215 );
                     $pdf->SetFont('angsana','U',14);
                     $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "คำสั่งผู้บริหาร"  ),0,'C',false);



                     $pdf->setXY( $x1+115  , $y1 + 225 );
                     $pdf->SetFont('angsana','',14);
                     if( $allow_manager== 1 )
                     {
                          $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  " ( / ) อนุญาต          (  )  ไม่อนุญาต  "  ),0,'C',false);
                     }
                     else   if( $allow_manager== 2  )
                     {
                          $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  " (   ) อนุญาต          ( / )  ไม่อนุญาต  "  ),0,'C',false);
                     }


                      $pdf->setXY( $x1+100  , $y1 + 240 );
                      $pdf->SetFont('angsana','',14);
                      $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "(ลงชื่อ)  (..........".$first_name2."......".$last_name2."........)"  ),0,'C',false);


                      $pdf->setXY( $x1+100  , $y1 + 245 );
                      $pdf->SetFont('angsana','',14);
                      $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "ตำแหน่ง ................". $last_position."................."  ),0,'C',false);


                      $pdf->setXY( $x1+105  , $y1 + 250 );
                      $pdf->SetFont('angsana','',14);
                      $pdf->Cell(  30  ,  10 , iconv( 'UTF-8','cp874' ,  "วันที่....".$ex5[2]."...".$month5."...".$year5."......."  ),0,'C',false);
                      */


      $pdf->Output();

     ?>
