
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
              <th>ลาพักผ่อนมาแล้วทั้งหมด</th>
   
          </tr>
        </thead>

        <tbody>

            <?php

                foreach($q->result() as $row )
                {
                       $name=$row->name;
                       $lastname=$row->lastname;
                       
                       //date_total_leave
                       $str2=" SELECT   *   FROM   `tb_vacation`   WHERE  `first_name`='$name'      ORDER   BY     `id_vacation`    DESC   LIMIT  1   ";
                       $query2=$this->db->query($str2);
                         $num= $query2->num_rows();
                      
                      // $row=$query2->row();
                     // $rows->date_total_leave;
                      if( $num > 0)
                      {
                            foreach($query2->result() as $row)
                            {
                                   $date_total_leave=$row->date_total_leave;

                            }
                      }
                      else{
                          $date_total_leave=0;
                          
                      }
                   
                      
                      if( $num > 0     )
                      {
          ?>

          <tr>
              <td style="width:30px; " align="left" ><?=nbs(3)?><?=$name?><?=nbs(10)?><?= $lastname?></td>
            <td  style="width:150px;"    align="center"  ><?=$date_total_leave?></td>

          </tr>

          <?php
                      }
                      
          
          
                }
           ?>

        </tbody>
      </table>
