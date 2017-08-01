<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public function  test()
        {
             echo "testing  user_model";
        }
        
        public  function  authenlogin() // check login system
        {
            //  if(    $this->user_model->authenlogin() == 1 )
                     $model_us=$this->session->userdata("sess_us");
                 //echo "<br>";
                    $model_ps = $this->session->userdata("sess_ps");
                 //echo  "<br>";
                   $model_per=$this->session->userdata("sess_per");
                 //echo "<br>";
                    $model_login = $this->session->userdata("sess_login");
                 //echo "<br>";
                 
                 
                 if( $model_login  == 1  &&   $model_us != ""    &&  $model_ps  != ""   &&    $model_per >= 1     )
                 {
                         return  1;
                 }
                 else
                 {
                     //redirect("welcome/err_system");
                        $this->user_model->logout();          
                 }
               
                   
        }
        
        public function  err_model()
        {
            //http://192.168.2.112/document/index.php/welcome/err_system
                      echo "<h1>Error: 404 Not Found</h1>";
                      //echo "<br>";
                      echo  "<h4>Sorry, the requested URL ".base_url()."<h4>";
        }
        
        public function  logout() //ปิดออกจากระบบ
        {
            //   $this->user_model->logout();
                  $sess_data=array(
                                   "sess_us"=>"",
                                   "sess_ps"=>"",
                                   "sess_per"=> "",  
                                    "sess_login"=>0, 
                             );
                  
                  $this->session->unset_userdata($sess_data);
                  $this->session->sess_destroy();
                  
                 // redirect("welcome/index/");
        }
        
        public  function tb_main1($id,$doc)  // query ตารางหลัก
        {
            
            if( $id > 0 )
              {
                 //  echo "T";
                   $tb="tb_main1";
                  
                   
                   $this->db->order_by("id_main1","DESC");
                   
                   return  $this->db->get_where($tb,array("type_record"=>$id,"type_document"=>$doc));
              }
    
        }
        
       // public function count_id($type_document,$type_record)
        public function count_id($type_record,$type_document)
        {
            $tb="tb_main1";
         //   $type_document=1; //หนังสือรับ
          //  $type_record=1; //มูลนิธิตะวันฉาย
            $q=$this->db->get_where($tb,array("type_document"=>$type_document,"type_record"=>$type_record));
          //  return  $q->num_rows();
            $number=$q->num_rows();
            $number +=1;
            //$number=1;
                   if(     $number == 0  )
                     {
                           $number_add = "0001";
                     }
                   else     if(     $number == 1  )
                     {
                           $number_add = "0002";
                     } 
                   else   if(  strlen($number) ==1   )
                     {
                           $number_add = "000".$number;
                     }
                    else if(  strlen($number) ==2   )
                     {
                           $number_add= "00".$number;
                     } 
                      else if(  strlen($number) ==3   )
                     {
                          $number_add= "0".$number;
                     } 
                     else
                     {
                         //echo $id;
                          $number_add;
                     }
             return $number_add;
            //return     $number+1;
        }
        
        
      public   function  date_thai_cut($m)
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
public  function thai_year($y)
 {
     
                return   $y+543;
 }
 
 
 function  show_table() //แสดง รายละเอียดหลังจากทำการบันทึกข้อมูลแล้ว
 {
     
     
      /*
     <table>
 
        <thead>
          <tr>
              <th data-field="id" >เลขทะเบียนส่ง</th>
              <th data-field="name"  >ที่</th>
              <th data-field="price">ลงวันที่</th>
               <th data-field="price">จาก</th>
               <th data-field="price">ถึง</th>
                 <th data-field="price">เรื่อง</th>
                   <th data-field="price">การปฏิบัติ</th>
                   <th data-field="price">หมายเหตุ</th>
                    <th data-field="price">ใบปะหน้า </th>     
          </tr>
        </thead>

        <tbody>
        
        <?php
          // public function  subtable11()//table หนังสือ รับ หนังสือ ส่ง มูลนิธิตะวันฉายฯ
             foreach($query2->result() as $rows)
                 {
                    ?>
        <tr>
                     <td>
                   <?php
                   echo  $rows->registration;
                   ?>
                     </td>
                     <td>
            <?php  echo $rows->at; ?>
        </td>
        <td>
            <?php  echo $rows->date;  ?>
        </td> 
          <td>
            <?php  echo $rows->from;  ?>
        </td> 
        <td>
            <?php  echo $rows->to;  ?>
        </td> 
        <td>
            <?php  echo $rows->subject; ?>
        </td>
        <td>
            <?php  echo $rows->practice; ?>
        </td>
        
        <td>
            <?php  echo $rows->note; ?>
        </td>
        <td >
            <?php
              if( strlen($rows->filename) >  0  )
              {
                  ?>
             <a href="<?=base_url()?>upload/<?php  echo  $rows->filename; ?>">  
            <i class="material-icons">system_update_alt</i>
            </a>
                  <?php
              }
            ?>
        </td>
                     
        </tr>    
        <?php 
                   }
            ?>
        
           
        </tbody>
      </table>
       * 
       */
  }
  
  
        
}



