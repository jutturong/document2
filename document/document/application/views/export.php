<?=$this->load->view("import")?>
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

<!-- 
              <td style="width:30px;"><?=$registration?></td>
            <td  style="width:40px;"  ><?=$date?></td>
            <td  style="width:200px;"><?=$from?></td>
            <td style="width:200px;"><?=$to?></td>
            <td  style="width:900px;"><?= $subject?></td>
            <td style="width:150px;"></td>
            <td  style="width:100px;"></td>
-->

<table  style="width:1160px;" >
        <thead>
          <tr>
              <th   >เลขส่ง</th>
              <th      >วันที่</th>
              <th   >จาก</th>
              <th >ถึง</th>
              <th  >เรื่อง</th>
              <th   >ผู้รับ</th>
              <th    >หมายเหตุ</th>
          </tr>
        </thead>

        <tbody>
            
            <?php
                foreach($q->result() as $row )
                {
                    $registration=$row->registration;
                    $date=$row->date;
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
              <td style="width:30px;"><?=$registration?></td>
            <td  style="width:30px;"  ><?=$date?></td>
            <td  style="width:200px;"><?=$from?></td>
            <td style="width:200px;"><?=$to?></td>
            <td  style="width:500px;"><?= $subject?></td>
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