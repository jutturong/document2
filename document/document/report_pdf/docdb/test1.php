<?php
     echo " <meta charset=\"utf-8\">";
     require_once("../config.php");
     
     /*
     $type_record=$_REQUEST["type_record"];
$type_document=$_REQUEST["type_document"];
*/

   $type_record=1;
   $type_document=1;
   
     
            $tb="tb_main1";
       $str="select  *  from  $tb  where  type_record=$type_record  and   type_document=$type_document   ";
       $query=mysql_query($str); 
       
       //�
       
       while($row=mysql_fetch_assoc($query))
               {
                    $registration=$row["registration"];
                    $at=$row["at"];
                    $date=$row["date"];
                    
                    $from=$row["from"];
                   
                //   echo $from;
                //   echo "<br>";
                   
              //   echo  substr($from,1,20);
             //     echo "<br>";
                  
                 // echo substr_replace( $from ,"�",5,29);
              //     echo substr_replace( $from ,"--",0,29);
                //  echo "<br>";
                    
                 //   echo str_repeat($from, "*" , 0,30);
                  //  echo str_replace("�", "*",  $from, 29 );
                 //   echo "<br>";
                  //  echo str_repeat($from, 10);
                 //   echo "<br>";
                  //  echo  substr($from,30);
                 //   echo "<br>";
                 //   echo substr_replace($from, "X", 29 );
                 //   echo "<br>";
                    
                    
                    
                    $to=$row["to"];
                    $subject=$row["subject"];
                    $practice=$row["practice"];
                    $note=$row["note"];
                    
               }
     
     ?>