
 <meta charset="UTF-8">
 <title><?=$title?></title>

 <style>

table {
   /* border-collapse: collapse; */
}

th{
     text-align: center;
}

td{
       text-align: left;
}

table, td, th {
    border: 1px solid black;

}

</style>



<table  style="width:1160px;" >
        <thead>
          <tr>
              <th    ><font size="4">  เลขส่ง</font></th>
              <th      ><font size="4"> วันที่</font></th>
              <th   ><font size="4">จาก</font></th>
              <th ><font size="4">ถึง</font></th>
              <th  ><font size="4">เรื่อง</font></th>
              <th   ><font size="4">ผู้รับ</font></th>
              <th    ><font size="4">หมายเหตุ</font></th>
          </tr>
        </thead>

        <tbody>

            <?php

                foreach($q->result() as $row )
                {


                    $registration=$row->registration;
                    $date=$row->date;
                    
                  // $date=$row->date_record;
                    
                    $from=$row->from;
                    $to=$row->to;
                    $subject=$row->subject;



/*
                    $registration=$row["registration"];
                    $at=$row["at"];
                    $date=$row["date"];
                    $from=$row["from"];
                    $to=$row["to"];
                    $subject=$row["subject"];
*/


          ?>

          <tr>
              <td style="width:30px;"><font size="4"><?=$registration?></font></td>
            <td  style="width:30px;"  ><font size="4"><?=$date?></font></td>
            <td  style="width:200px;"><font size="4"><?=$from?></font></td>
            <td style="width:200px;"><font size="4"><?=$to?></font></td>
            <td  style="width:500px;"><font size="4"><?= $subject?></font></td>
            <td style="width:100px;"></td>
            <td  style="width:100px;"></td>
          </tr>

          <!--
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
          </tr>
          -->

          <?php
                }
           ?>

        </tbody>
      </table>
