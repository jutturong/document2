
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
     /*  text-align: center;  */
}

table, td, th {
    border: 1px solid black;

}

</style>



<table  style="width:500px;" >
        <thead>
          <tr>
              <th>ชื่อ-นามสกุล</th>
              <th>ลาป่วย   ทั้งหมด</th>
              <th>ลาคลอดบุตร   ทั้งหมด</th>
               <th>ลากิจส่วนตัว   ทั้งหมด</th>
          </tr>
        </thead>

        <tbody>

            <?php

                foreach($q->result() as $row )
                {
                     $name=$row->name;   
                     $lastname=$row->lastname;
                     //total_sick_person
                     $tb_sick="tb_sick";
                     $str2=" SELECT    *    FROM    $tb_sick   WHERE  `first_name`='$name'     ";
                   // echo br();
                     $query2=$this->db->query( $str2);
                     foreach($query2->result() as $row)
                       {
                              $total_sick=$row->total_sick;
                              $total_sick_person=$row->total_sick_person;
                              $total_confined=$row->total_confined;
                       }
                     
          ?>

          <tr>
              <td style="width:200px; " align="left" ><?=nbs(3)?><?=$name?><?=nbs(5)?><?= $lastname?></td>
              <td  style="width:100px;"    align="center"  ><?=$total_sick?></td>
              <td  style="width:100px;"    align="center"  ><?=$total_sick_person?></td>
              <td  style="width:100px;"    align="center"  ><?=$total_confined?></td>
          </tr>

          <?php
          
          
          
                }
           ?>

        </tbody>
      </table>
