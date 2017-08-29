<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Welcome extends CI_Controller
    {

             var  $title="ระบบโปรแกรมงานธุรการ";
             var  $limit=3;
             
             
                 
             public function __construct() {
                     
                         
                           parent::__construct();
                           $this->load->model("user_model");
                          // $this->user_model->test();
                        //  $this->load->helper(array('form', 'url'));
                           $this->load->helper(array('form', 'url'));
                           $this->load->helper('file');
                         //  $this->load->library('encrypt');
                           
                 }
             
             
	public function index()
	{
		//$this->load->view('welcome_message');
                            //    $this->user_model->logout();
                                $data["title"]=$this->title;
                             //   date_default_timezone_set("Asia/Bangkok");   
                                $this->load->view("test2",$data);
                                
	}
        
                 public  function  homepage()
                 {
                                $data["title"]=$this->title;
                              
                                $this->load->view("test2",$data);
                 }
        
                 public function logout()
                 {
                         $this->user_model->logout();
                         redirect("welcome/index/","refresh");
                 }
          public function checklogin()
          {
                 // echo "T";
                    $us=trim($this->input->get_post("us"));
                   //echo "<br>";
                     $ps=trim($this->input->get_post("ps"));
                   $ps=md5($ps);
                   //echo $ps;
                   //echo "<br>";
                   $tb="tb_user";
                   $query1=$this->db->get_where($tb,array("username"=>$us,"password"=>$ps));
                     $num_rows=$query1->num_rows();
                     $row=$query1->row();
                      
                      //echo $check_per;
                      
                     if( $num_rows == 1    )
                     {
                          //   $query2=$this->db->get_where($tb,array());
                           //  foreach($row->)
                         $check_per=$row->id_permission;  //permission database
                         
                             $sess_data=array(
                                   "sess_us"=>$us,
                                   "sess_ps"=>$ps,
                                   "sess_per"=> $check_per,  
                                    "sess_login"=>1, 
                             );
                            // echo  "login";
                             $this->session->set_userdata($sess_data);
                             $this->session->userdata("sess_login");
                           //  echo "1";   //รหัสผ่านถูกต้อง 
                            
                            
                             /*
                             foreach($query1->$result() as $row() )
                             {
                                    $rows[]=$row;
                             }
                           //  echo json_encode($rows);
                              * 
                              */
                             
                             foreach ( $query1->result() as $row)
                             {
                                   $rows[]=$row;
                             }
                                   header("Content-Type: application/json", true);
                                   echo json_encode($rows);
                             
                             
                     }
                     else{
                                   echo "0";  //รหัสผ่านไม่ถูกต้อง
                     }
                  
                   
          }
          

               public function receive11()
               {
                   if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                             
                             
                             //  $number=$this->user_model->count_id(1,1);
                              
                /*               
                                  //  $id=10;
                               //   $id=100;
                               
                     if(  strlen($number) ==1   )
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
                       
                          $number_add;
                     }
                 
                 */
                         //    $data["number_add"]=$number_add;     
                             
                            // $data["number_add"]=$this->user_model->count_id(1,1);
                             
                           /*-------------1.เลขทะเบียนส่ง----------  */
                             /*
                               $tb="tb_main1";
                               $q_n=$this->db->get_where($tb,array("type_record"=>1,"type_document"=>1));
                               $row=$q_n->row();
                              * 
                              */
                          //    $num_rows_ck= $q_n->num_rows();
                               
                             
                               
                              /*-------------1.เลขทะเบียนส่ง----------  */  
                              $data["number_add"]=$this->user_model->count_id(1,1);
                               
                           ?>
                             
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">person_pin</i> มูลนิธิตะวันฉาย ฯ > หนังสือรับ 
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php    
                             
                             $this->load->view("receive11",$data);
                     }
               }
               
                   public function  send11() //ทะเบี่ยนหนังสือส่ง
                {
                    #  index.php/welcome/formsend11
                    if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                            // $this->load->view("sub11",$data);
                            // echo "test";
                             
                             
                            //  $data["number_add"]=$this->user_model->count_id(1,2);
                              /*-------------1.เลขทะเบียนส่ง----------  */
                               $tb="tb_main1";
                               $this->db->order_by("id_main1","DESC");
                               $q_n=$this->db->get_where($tb,array("type_record"=>1,"type_document"=>2));
                               $row=$q_n->row();
                               $num_row_ck=$q_n->num_rows();
                               if(  $num_row_ck > 0 )
                               {
                               $registration_ck = $row->registration;
                               $ex=explode("/",$registration_ck);
                                if( $ex[1]  <  1  )
                                                  {
                                                       // echo "มีตัวอักษรปน";
                                                        $exe=explode(".",$ex[1]);
                                                       // echo $exe[1];
                                                         $sum_regis=$exe[1]+1;
                                                  }
                               $sum_regis=(int)$ex[1]+1;
                               
                               
                                              
                               
                                 $data["number_add"]="ตวฉ/".$sum_regis ;
                               }
                               else
                               {
                                  $data["number_add"]="ตวฉ/";
                               }
                              /*-------------1.เลขทะเบียนส่ง----------  */
                               
                                  ?>
                             
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">person_pin</i> มูลนิธิตะวันฉาย ฯ > หนังสือส่ง 
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php    
                               
                               
                             $this->load->view("send11",$data);
                     }
                     
                }
                
              
                public function receive21()
               {
                   if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                             //($tb,array("type_document"=>$type_document,"type_record"=>$type_record));
                              
                   //-----------------------------------------------------------      
                             /*
                   $tb="tb_main1";        
                   $q_n=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>1));
                    $number = $q_n->num_rows()+1;
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
                          $number_add;
                     }
                     $data["number_add"]=$number_add;
                     //-----------------------------------------------------------            
                          */
                             
                             ?>
                             
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">person_pin</i> ศูนย์การดูแล ฯ And Excellent > หนังสือรับ 
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php
                             
                             $data["number_add"]=$this->user_model->count_id(3,1);  //count_id($type_record,$type_document)
                             
                             $this->load->view("receive21",$data);
                     }
               }
               
               
                public function receive31()
               {
                   if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                             
                             
                  //-----------------------------------------------------------  
                             /*
                   $tb="tb_main1";        
                   $q_n=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>1));
                    $number = $q_n->num_rows()+1;
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
                          $number_add;
                     }
                     
                     
                     $data["number_add"]=$number_add;
                     //-----------------------------------------------------------   
                             */
                             
                             $data["number_add"]=$this->user_model->count_id(2,1);
                             
      ?>
                             
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">person_pin</i> ศูนย์วิจัย ฯ  > หนังสือรับ 
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php                       
                             
                             
                             $this->load->view("receive31",$data);
                     }
               }
               
               
                
             public function  send21() //ทะเบี่ยนหนังสือส่ง
                {
                    #  index.php/welcome/formsend11
                    if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                            // $this->load->view("sub11",$data);
                             
                             
                            
                  //-----------------------------------------------------------     
                             /*
                   $tb="tb_main1";        
                   $q_n=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>2));
                    $number = $q_n->num_rows()+1;
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
                          $number_add;
                     }
                     $data["number_add"]=$number_add;
                     //-----------------------------------------------------------   
                       // $data["number_add"]=$this->user_model->count_id(3,2); 
                     */
                             
                            //  $data["number_add"]=$this->user_model->count_id(3,2);
                                    /*-------------1.เลขทะเบียนส่ง----------  */
                               $tb="tb_main1";
                               $this->db->order_by("id_main1","DESC");
                               $q_n=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>2));
                               $row=$q_n->row();
                               $num_rows_ck= $q_n->num_rows();
                            // echo br();
                               if(  $num_rows_ck  > 0 )
                               {
                              $registration_ck = $row->registration;
                            // echo br();
                               $ex=explode("/",$registration_ck);
                                 $sum_regis=$ex[1]+1;
                               
                             //echo  $ex[1];
                             //echo br();
                                                 
                                             if( $ex[1]  <  1  )
                                                  {
                                                       // echo "มีตัวอักษรปน";
                                                        $exe=explode(".",$ex[1]);
                                                       // echo $exe[1];
                                                         $sum_regis=$exe[1]+1;
                                                  }
                                 
                                                  
                                     $data["number_add"]="ศธ0514.7.1.2.3.4/".$sum_regis ;
                                 
                                           
                               }
                               else
                               {
                                  $data["number_add"]="ศธ0514.7.1.2.3.4/";
                               }
                               
                              /*-------------1.เลขทะเบียนส่ง----------  */
                             
                               ?>
                             
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                              <i class="material-icons left">person_pin</i>ศูนย์การดูแล ฯ And Excellent > หนังสือส่ง
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php
                     
                               $this->load->view("send21",$data);
                     }
                     
                }
                
                
                public function  send31() //ทะเบี่ยนหนังสือส่ง
                {
                    #  index.php/welcome/formsend11
                    if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                            // $this->load->view("sub11",$data);
                             
                             //    $data["number_add"]=$this->user_model->count_id(2,2); 
                             //-----------------------------------------------------------  
                             
                             /*
                   $tb="tb_main1";        
                   $q_n=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>2));
                    $number = $q_n->num_rows()+1;
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
                          $number_add;
                     }
                     $data["number_add"]=$number_add;
                     //-----------------------------------------------------------  
                          */
                             
                           //   $data["number_add"]=$this->user_model->count_id(2,2);
                              
                             /*-------------1.เลขทะเบียนส่ง----------  */
                               $tb="tb_main1";
                               $this->db->order_by("id_main1","DESC");
                               $q_n=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>2),1);
                               $row=$q_n->row();
                               $num_rows_ck= $q_n->num_rows();
                               if(  $num_rows_ck  > 0 )
                               {
                               $registration_ck = $row->registration;
                               $ex=explode("/",$registration_ck);
                               
                                 if( $ex[1]  <  1  )
                                                  {
                                                       // echo "มีตัวอักษรปน";
                                                        $exe=explode(".",$ex[1]);
                                                       // echo $exe[1];
                                                         $sum_regis=$exe[1]+1;
                                                  }
                               
                                  $sum_regis= (int)$ex[1];
                                 //  echo br();
                                   $sum_regis_int= $sum_regis+1;
                               
                                      $data["number_add"]="ศธ0514.7.1.2.3.4.1/". $sum_regis_int ;
                               }
                               else
                               {
                                  $data["number_add"]="ศธ0514.7.1.2.3.4.1/";
                               }
                               
                              /*-------------1.เลขทะเบียนส่ง----------  */
                               
                               ?>
                             
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">person_pin</i> ศูนย์วิจัย ฯ > หนังสือส่ง
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php
                               
                               $this->load->view("send31",$data);
                     }
                     
                }
                
                
               
          
                public function  formsub11()
                {
                     if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                             $this->load->view("sub11",$data);
                     }
                     
                }
                

                
                public function  formsend11() //ทะเบี่ยนหนังสือส่ง
                {
                    #  index.php/welcome/formsend11
                    if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                            // $this->load->view("sub11",$data);
                             $this->load->view("send11",$data);
                     }
                     
                }
                
                
                
                

                 public function  formsend21() //ทะเบี่ยนหนังสือส่ง  ศูนย์การดูแลฯ
                {
                    #  index.php/welcome/formsend11
                    if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                            // $this->load->view("sub11",$data);
                             $this->load->view("send21",$data);
                     }
                     
                }
                
                // http://10.87.196.170/document/index.php/welcome/loadformID/906
                public  function loadformID() //โหลด จากการ update
                {
                    
                    
                    
                       $id_main1=trim($this->uri->segment(3));
                     $data["title"]=$this->title;
                    
                      if(  $id_main1 > 0 )  
                      {
                          
                          //echo   $id_main1;
                          //echo br();
                          
                          /*
                            $data["title"]=$this->title;
                            $tb="tb_main1";
                            
                            $data["query"]=$this->db->get_where($tb,array("id_main1"=>$id_main1));
                            
                            
                             $data["query2"]=$this->db->get_where($tb,array("id_main1"=>$id_main1));
                             */
                             
                                $tb="tb_main1";
                                
                               
                                //  return  $this->db->get_where($tb,array("type_record"=>$id,"type_document"=>$doc),$this->limit);
                              //   $this->db->get_where($tb,array("id_main1"=>$id_main1));
                                
                                 $data["query"]=$this->db->get_where($tb,array("id_main1"=>$id_main1));
                             //  echo   $data["query"]->num_rows();
                                $data["query2"]=$this->db->get_where($tb,array("id_main1"=>$id_main1));
                               
                               // $data["query"]=$this->user_model->tb_main1("1","1");
                                
                               //  $data["query2"]=$this->user_model->tb_main1("1","2");
                                
                                
                                  ?>
                             
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">person_pin</i> แสดงผลการบันทึก > มูลนิธิตะวันฉายฯ 
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php 
                            
                            $this->load->view("table11",$data);
                            
                             
                      }
                     
                    
                }
                
                
                public function  subtable11()//table หนังสือ รับ หนังสือ ส่ง มูลนิธิตะวันฉายฯ
                {
                    #    index.php/welcome/subtable11/
                     if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                            // $this->load->view("sub11",$data);
                             
                            $data["query"]=$this->user_model->tb_main1("1","1");
                            //   return  $this->db->get_where($tb,array("type_record"=>$id,"type_document"=>$doc));
                         
                            
                            $tb="tb_main1";
                            //$data["query2"]=$this->db->get_where($tb,array("type_document"=>2,"type_record"=>2));
                             $data["query2"]=$this->user_model->tb_main1("1","2");
                             
                             
                        ?>
                             
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">person_pin</i> แสดงผลการบันทึก > มูลนิธิตะวันฉายฯ 
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php 
                            
                            $this->load->view("table11",$data);
                            
                            
                            
                               //1 มูลนิธิตะวันฉายฯ                       
                            ///2	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
                            //3 ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ
                            
                     }
                    
                }
                
                public  function  page_main1()
                {
                    // http://10.87.196.170/document/index.php/welcome/homepage/page_main1/2
                    if(    $this->user_model->authenlogin() == 1 )
                     {
                            $data["title"]=$this->title;
                            $page=$this->uri->segment(3);
                            $tb="tb_main1";
                            
                              if(  $page   > 1  )
                                 {
                                         $cal_limit=$page-1*$this->limit  + 2;
                                      //   $data["query"]=$this->db->get($tb,$this->limit,$cal_limit);
                                                 //  $data["query"]=$this->user_model->tb_main1("1","1");
                                         $data["query"] = $this->db->get_where($tb,array("type_record"=>1,"type_document"=>1),$this->limit,$cal_limit);
                                       
                                         $data["query2"] = $this->db->get_where($tb,array("type_record"=>1,"type_document"=>2),$this->limit,$cal_limit);
                                  }else
                                  {
                                       $data["query"] = $this->db->get_where($tb,array("type_record"=>1,"type_document"=>1),$this->limit);
                                        $data["query2"] = $this->db->get_where($tb,array("type_record"=>1,"type_document"=>2),$this->limit);
                                  }
                                  
                           $this->load->view("table11",$data);      
                      }                            
                }
                
                  public  function  page_main2()
                {
                    // http://10.87.196.170/document/index.php/welcome/homepage/page_main1/2
                    if(    $this->user_model->authenlogin() == 1 )
                     {
                            $data["title"]=$this->title;
                            $page=$this->uri->segment(3);
                            $tb="tb_main1";
                            
                              if(  $page   > 1  )
                                 {
                                         $cal_limit=$page-1*$this->limit  + 2;
                                      //   $data["query"]=$this->db->get($tb,$this->limit,$cal_limit);
                                                 //  $data["query"]=$this->user_model->tb_main1("1","1");
                                         $data["query"] = $this->db->get_where($tb,array("type_record"=>2,"type_document"=>1),$this->limit,$cal_limit);
                                       
                                         $data["query2"] = $this->db->get_where($tb,array("type_record"=>2,"type_document"=>2),$this->limit,$cal_limit);
                                  }else
                                  {
                                       $data["query"] = $this->db->get_where($tb,array("type_record"=>2,"type_document"=>1),$this->limit);
                                        $data["query2"] = $this->db->get_where($tb,array("type_record"=>2,"type_document"=>2),$this->limit);
                                  }
                                  
                           $this->load->view("table11",$data);      
                      }                            
                }
                
                   public  function  page_main3()
                {
                    // http://10.87.196.170/document/index.php/welcome/homepage/page_main1/2
                    if(    $this->user_model->authenlogin() == 1 )
                     {
                            $data["title"]=$this->title;
                            $page=$this->uri->segment(3);
                            $tb="tb_main1";
                            
                              if(  $page   > 1  )
                                 {
                                         $cal_limit=$page-1*$this->limit  + 2;
                                      //   $data["query"]=$this->db->get($tb,$this->limit,$cal_limit);
                                                 //  $data["query"]=$this->user_model->tb_main1("1","1");
                                         $data["query"] = $this->db->get_where($tb,array("type_record"=>3,"type_document"=>1),$this->limit,$cal_limit);
                                       
                                         $data["query2"] = $this->db->get_where($tb,array("type_record"=>3,"type_document"=>2),$this->limit,$cal_limit);
                                  }else
                                  {
                                       $data["query"] = $this->db->get_where($tb,array("type_record"=>3,"type_document"=>1),$this->limit);
                                        $data["query2"] = $this->db->get_where($tb,array("type_record"=>3,"type_document"=>2),$this->limit);
                                  }
                                  
                           $this->load->view("table11",$data);      
                      }                            
                }
                
                
                
                public function table2() //ศูนย์การดูแล
                {
                     if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                            // $this->load->view("sub11",$data);
                            $data["query"]=$this->user_model->tb_main1("3","1");
                              $this->db->order_by("id_main1","DESC");
                            //   return  $this->db->get_where($tb,array("type_record"=>$id,"type_document"=>$doc));
                          
                            
                            $tb="tb_main1";
                            //$data["query2"]=$this->db->get_where($tb,array("type_document"=>2,"type_record"=>2));
                             $data["query2"]=$this->user_model->tb_main1("3","2");
                             $this->db->order_by("id_main1","DESC");
                             
                             
                                ?>
                             
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">person_pin</i> แสดงผลการบันทึก > ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ 
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php    
                             
                            $this->load->view("table2",$data);
                            
                            
                          //1 มูลนิธิตะวันฉายฯ                       
                            ///2	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
                            //3 ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ    
                            
                            
                     }
                }
                
                 public function table3()  //ศูนย์วิจัย
                {
                     if(    $this->user_model->authenlogin() == 1 )
                     {
                             $data["title"]=$this->title;
                         
                             $tb="tb_main1";
                                
                           // $data["query"]=$this->user_model->tb_main1("2","1");
                             $this->db->order_by("id_main1","DESC");
                             $data["query"]=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>1));
                             
                             
                            // $data["query2"]=$this->user_model->tb_main1("2","2");
                              $this->db->order_by("id_main1","DESC");
                              $data["query2"]=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>2));
                              
                             ?>
                             
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">person_pin</i> แสดงผลการบันทึก > ศูนย์วิจัยผู้ป่วยปากแหว่งเพดานโหว่ฯ 
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php       
                             
                            $this->load->view("table3",$data);
                            
                     }
                }
                
                
                public  function inserttable11() //บันทึกหนังสือรับ มูลนิธิตะวันฉาย   $type_document=1;  // 1=หนังสือรับ,2=หนังสือส่ง
                {
                    #   http://localhost/document/index.php/welcome/inserttable1
                    //header("Content-Type: application/json", true);
                      header('Content-Type: text/html; charset=UTF-8');
                     if(    $this->user_model->authenlogin() == 1 )
                     {
                         #-- หนังสือรับ หนังสือเ้ข้า  มูลนิธิตะวันฉายฯ
                       $registration_receive11=trim($this->input->get_post("registration_receive11"));   //เลขทะเบียนส่ง   1
                       //echo "<br>";
                        $at_receive11=trim($this->input->get_post("at_receive11"));  //ที่       2
                     //  echo  "<br>";
                         $date1_receive11=trim($this->input->get_post("date1_receive11")); //ลงวันที่           3
                      // echo  "<br>";
                       $from_receive11=trim($this->input->get_post("from_receive11")); //จาก       4
                      // echo  "<br>";
                       $to_receive11=trim($this->input->get_post("to_receive11"));  //ถึง        5
                     //  echo  "<br>";
                        $subject_receive11=trim($this->input->get_post("subject_receive11"));  //เรื่อง       6
                      // echo  "<br>";
                        $practice_receive11=trim($this->input->get_post("practice_receive11"));  //การปฏฺิบัติ       7
                      // echo  "<br>";
                         $note_receive11=trim($this->input->get_post("note_receive11")); //หมายเหตุ      8
                       //echo  "<br>";
                         
                         
                        $type_record=trim($this->input->get_post("type_record11")); //ประเภทของตารางที่ทำการบันทึก    9
                        
                        $type_document=1;  // 1=หนังสือรับ,2=หนังสือส่ง
                        
                        
                        //inserttable11
                        
                        $date1_receive11_time=trim($this->input->get_post("date1_receive11_time")); //วันที่ทำการบันทึก
                        
                        
                            // print_r($_POST);               
              //------------------------------- upload file-------------------------------------------
                      // print_r($_FILES)  
                          $file1name = $_FILES["file11"]['name'];  // ชื่อของไฟล์      10
                        //echo br();
                        $file1tmp  =$_FILES['file11']["tmp_name"]; // tmp folder
                       // echo br();
                          $file1Type= $_FILES['file11']["type"]; //type of file
                        // echo br();
                          $file1Size= $_FILES['file11']["size"]; //size
                        // echo br();
                            $file1ErrorMsg = $_FILES['file11']["error"]; // 0=false 1=true
                         
                         if( strlen($file1name)   >  0  &&  $file1name != ""  )
                         {

                                         $data=array(
                                             "registration"=>$registration_receive11,
                                             "at"=> $at_receive11,
                                             "date"=>$date1_receive11,
                                             "from"=>$from_receive11,
                                             "to"=> $to_receive11,
                                            "subject"=>$subject_receive11,
                                            "practice"=>$practice_receive11,
                                            "note"=>$note_receive11,
                                            "type_record"=> $type_record,
                                            "filename"=>$file1name, 
                                             "type_document"=>$type_document,
                                             "date_record"=> $date1_receive11_time,  //วันที่ทำการบันทึกข้อมูล
                                         );
                                         
                                         
                                         
                                     $cp=copy($file1tmp ,  "upload/". $file1name );
                                     if( $cp )
                                     {
                                         echo 1;
                                     }
                                     else{
                                         echo 0;
                                     }

                         }
                         else
                         {
                               $data=array(
                                             "registration"=>$registration_receive11,
                                             "at"=> $at_receive11,
                                             "date"=>$date1_receive11,
                                             "from"=>$from_receive11,
                                             "to"=> $to_receive11,
                                            "subject"=>$subject_receive11,
                                            "practice"=>$practice_receive11,
                                            "note"=>$note_receive11,
                                            "type_record"=> $type_record,
                                          //  "filename"=>$file1name, 
                                            "type_document"=>$type_document,
                                            "date_record"=> $date1_receive11_time,  //วันที่ทำการบันทึกข้อมูล
                                         );
                             
                         }

                                           //FROM `tb_main1` 
                                         $tb="tb_main1";
                                         $this->db->insert($tb,$data);
                         
                         
                         
             //------------------------------- upload file-------------------------------------------     
                         
                         
                        redirect("welcome/homepage/insert_success",'refresh');
                         
                         

                     }
                }
                
                
                //----------------form  update  table-------------------------------
                public function update_main()
                {
                    header('Content-Type: text/html; charset=UTF-8');
                     if(    $this->user_model->authenlogin() == 1 )
                     {
                              //print_r($_POST);
                              //echo "<hr>";
                              $id_main1=trim($this->uri->segment(3));                
                            // echo br();
                             if( $id_main1 > 0 )
                             {
                                              
                                          $data["title"]=$this->title;  
                                          $tb="tb_main1";
                                          $query=$this->db->get_where($tb,array("id_main1"=>$id_main1));
                                          $rows= $query->row(); 
                                          
                                          $data["id_main1"]= $rows->id_main1;
                                          $data["registration"]= $rows->registration;
                                          $data["at"]= $rows->at;
                                          $data["date"]= $rows->date;
                                          $data["from"]= $rows->from;
                                          $data["to"]= $rows->to;
                                          $data["subject"]= $rows->subject;
                                          $data["practice"]= $rows->practice;
                                           $data["note"]= $rows->note;
                                          $this->load->view("fr_update",$data);     
                                         
                             }
                     }              
                }
                 //----------------form  update  table in database------------------------------ 
                public function update_tablemain()
                {
                     header('Content-Type: text/html; charset=UTF-8');
                     if(    $this->user_model->authenlogin() == 1 )
                     {
                              //print_r($_POST);
                              //echo "<hr>";
                              /*
                               Array ( [id_main1] => 57
                               *  [registration] => 0002
                               *  [at] => ศธ 0514.1.61.3/ว 3136 
                               * [date1] => 2017-01-10 
                               * [from] => รองอธิการบดีฝ่ายวิจัยและการถ่ายทอดเทคโนโลยี 
                               * [to] => ผู้อำนวยการมูลนิธิตะวันฉายฯ 
                               * [subject] => แจ้งผลการอนุมัติงบประมาณ ปีงบประมาณ 2560 และขอเชิญประชุม
                               *  [practice] => 
                               * [note] =>
                               *  [file] => 
                               * [type_record] => ) 
                               */
                  $id_main1= trim($this->input->get_post("id_main1"));   //เลขทะเบียนส่ง   1      
                   // echo "<br>";
                      $registration=trim($this->input->get_post("registration"));   //เลขทะเบียนส่ง   1
                  // echo "<br>";
                 $at=trim($this->input->get_post("at"));  //ที่       2
                 //  echo  "<br>";
                       $date1=trim($this->input->get_post("date1")); //ลงวันที่           3
                  // echo  "<br>";
                     $from=trim($this->input->get_post("from")); //จาก       4
                  // echo  "<br>";
                     $to=trim($this->input->get_post("to"));  //ถึง        5
                 //  echo  "<br>";
                       $subject=trim($this->input->get_post("subject"));  //เรื่อง       6
                  // echo  "<br>";
                     $practice=trim($this->input->get_post("practice"));  //การปฏฺิบัติ       7
                  // echo  "<br>";
                      $note=trim($this->input->get_post("note")); //หมายเหตุ      8
                   //echo  "<br>";     
                   
           
                 //  print_r($_FILES);
                   //echo "<hr>";
                    //------------------------------- upload file-------------------------------------------
                      // print_r($_FILES)  
                       $file1name = $_FILES["file"]['name'];  // ชื่อของไฟล์      10
                   // echo br();
                   $file1tmp  =$_FILES['file']["tmp_name"]; // tmp folder
                   // echo br();
                    $file1Type= $_FILES['file']["type"]; //type of file
                   // echo br();
                       $file1Size= $_FILES['file']["size"]; //size
                  //  echo br();
                      $file1ErrorMsg = $_FILES['file']["error"]; // 0=false 1=true 
                   // echo br();
                   
                   if( strlen($file1name)   >  0  &&  $file1name != ""  )
                         {

                                         $data=array(
                                             "registration"=>$registration,
                                             "at"=> $at,
                                             "date"=>$date1,
                                             "from"=>$from,
                                             "to"=> $to,
                                            "subject"=>$subject,
                                            "practice"=>$practice,
                                            "note"=>$note,
                                           //"type_record"=> $type_record,
                                            "filename"=>$file1name, 
                                           //  "type_document"=>$type_document,
                                         );
                                         
                                         
                                         
                                     $cp=copy($file1tmp ,  "upload/". $file1name );
                                     if( $cp )
                                     {
                                         echo 1;
                                     }
                                     else{
                                         echo 0;
                                     }

                         }
                         else
                         {
                               $data=array(
                                             "registration"=>$registration,
                                             "at"=> $at,
                                             "date"=>$date1,
                                             "from"=>$from,
                                             "to"=> $to,
                                            "subject"=>$subject,
                                            "practice"=>$practice,
                                            "note"=>$note,
                                           // "type_record"=> $type_record,
                                          //  "filename"=>$file1name, 
                                         //   "type_document"=>$type_document,
                                         );
                             
                         }

                     //echo br();    
                      $page=trim($this->input->get_post("page"));
                    // echo br();
                                           //FROM `tb_main1` 
                                         $tb="tb_main1";
                                         $this->db->where("id_main1",$id_main1);
                                         $ck=$this->db->update($tb,$data);
                                         if( $ck )
                                         {
                                           //  echo 1;
                                               
                                         }else
                                         {
                                                 //echo 0;
                                         }
                                         
                                              // $id_main1

                                              switch ($page)
                                              {
                                                  case 1:
                                                  {
                                                           //redirect("welcome/homepage/page1",'refresh');  
                                                            redirect("welcome/homepage/updateid/".$id_main1,'refresh');  
                                                            break;
                                                  }
                                                  case 2:
                                                  {
                                                      // redirect("welcome/homepage/page2",'refresh');  
                                                            redirect("welcome/homepage/updateid/".$id_main1,'refresh');  
                                                            break;
                                                  }
                                                  case 3:
                                                  {
                                                       // redirect("welcome/homepage/page3",'refresh');  
                                                           redirect("welcome/homepage/updateid/".$id_main1,'refresh');  
                                                           break;
                                                  }
                                              } 
                                                 
                                 //  redirect("welcome/homepage/updateid/".$id_main1,'refresh'); 
                                // http://10.87.196.170/document/index.php/welcome/homepage/updateid/906  
                                              // redirect("welcome/homepage/updateid/".$id_main1,'refresh');          
 
                     }
                }
                
                
                
                
                public  function insert_send11()
                        {
                                  header('Content-Type: text/html; charset=UTF-8');
                                   if(    $this->user_model->authenlogin() == 1 )
                                        {
                                                        //    print_r($_POST);
                                                        //    print_r($_FILES); 

                                                      /*
                                                       Array ( [registration_send11] => 0001
                                                       *   [at_send11] => ศธ 0514.1.61.3/ว 3136 
                                                       * [date1_send11] => 17 January, 2017
                                                       *  [from_send11] => รองอธิการบดีฝ่ายวิจัยและการถ่ายทอดเทคโนโลยี 
                                                       * [to_send11] => ผู้อำนวยการมูลนิธิตะวันฉายฯ 
                                                       * [subject_send11] => แจ้งผลการอนุมัติงบประมาณ ปีงบประมาณ 2560 และขอเชิญประชุม 
                                                       * [practice_send11] => ทราบ 
                                                       * [note_send11] => ทราบและปฏฺิบัติตาม 
                                                       * [btn_insert11] => ) Array ( [file1] => Array ( [name] => 706408.jpg [type] => image/jpeg [tmp_name] => /tmp/phpxCtITE [error] => 0 [size] => 181330 ) ) 
                                                       */

                                                   //   echo $registration_send11=trim($this->input->get_post("registration_send11"));
                                                   //   echo  br();


                                                        #-- หนังสือรับ หนังสือเ้ข้า  มูลนิธิตะวันฉายฯ
                                                                            $registration_send11=trim($this->input->get_post("registration_send11"));   //เลขทะเบียนส่ง   1
                                                                        // echo "<br>";
                                                                            $at_send11=trim($this->input->get_post("at_send11"));  //ที่       2
                                                                         // echo  "<br>";
                                                                             $date1_send11=trim($this->input->get_post("date1_send11")); //ลงวันที่           3
                                                                         // echo  "<br>";
                                                                            $from_send11=trim($this->input->get_post("from_send11")); //จาก       4
                                                                        //echo  "<br>";
                                                                            $to_send11=trim($this->input->get_post("to_send11"));  //ถึง        5
                                                                        // echo  "<br>";
                                                                            $subject_send11=trim($this->input->get_post("subject_send11"));  //เรื่อง       6
                                                                         // echo  "<br>";
                                                                           $practice_send11=trim($this->input->get_post("practice_send11"));  //การปฏฺิบัติ       7
                                                                          // echo  "<br>";
                                                                            $note_send11=trim($this->input->get_post("note_send11")); //หมายเหตุ      8
                                                                         // echo  "<br>";
                                                                          // <input type="hidden"  id="type_record11"  name="type_record11"  value="1"  /> 
                                                                            $type_record=trim($this->input->get_post("type_record11")); //ประเภทของตารางที่ทำการบันทึก    9
                                                                         //echo  "<br>";
                                                                            $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง
                                                                       // echo  "<br>";
                                                                        
                                                                          $date1_send11_time=trim($this->input->get_post("date1_send11_time")); 
                                                                          
                                                                          
                                                                   
                                                                        
                                                                     
                                                                        
                                                                       
                                                                //------------------------------- upload file-------------------------------------------
                                                                                   // print_r($_FILES)  
                                                                                        $file1name = $_FILES["file12"]['name'];  // ชื่อของไฟล์      10  
                                                                                      //echo br();
                                                                                      $file1tmp  =$_FILES['file12']["tmp_name"]; // tmp folder
                                                                                     // echo br();
                                                                                      $file1Type= $_FILES['file12']["type"]; //type of file
                                                                                     // echo br();
                                                                                      $file1Size= $_FILES['file12']["size"]; //size
                                                                                     // echo br();
                                                                                        $file1ErrorMsg = $_FILES['file12']["error"]; // 0=false 1=true
                                                                                     // echo br();
                                                                                      
                                                                                      if( strlen($file1name)   >  0  &&  $file1name != ""  )
                                                                                      {

                                                                                                      $data=array(
                                                                                                          "registration"=>$registration_send11,
                                                                                                          "at"=> $at_send11,
                                                                                                          "date"=>$date1_send11,
                                                                                                          "from"=>$from_send11,
                                                                                                          "to"=> $to_send11,
                                                                                                         "subject"=>$subject_send11,
                                                                                                         "practice"=>$practice_send11,
                                                                                                         "note"=>$note_send11,
                                                                                                         "type_record"=> $type_record,
                                                                                                         "filename"=>$file1name, 
                                                                                                          "type_document"=>$type_document,
                                                                                                          "date_record"=> $date1_send11_time, //วันที่ทำการบันทึกข้อมูล
                                                                                                      );



                                                                                                  $cp=copy($file1tmp ,  "upload/". $file1name );
                                                                                                  if( $cp )
                                                                                                  {
                                                                                                      //echo 1;
                                                                                                  }
                                                                                                  else{
                                                                                                      //echo 0;
                                                                                                  }

                                                                                      }
                                                                                      else
                                                                                      {
                                                                                            $data=array(
                                                                                                          "registration"=>$registration_send11,
                                                                                                          "at"=> $at_send11,
                                                                                                          "date"=>$date1_send11,
                                                                                                          "from"=>$from_send11,
                                                                                                          "to"=> $to_send11,
                                                                                                         "subject"=>$subject_send11,
                                                                                                         "practice"=>$practice_send11,
                                                                                                         "note"=>$note_send11,
                                                                                                         "type_record"=> $type_record,
                                                                                                       //  "filename"=>$file1name, 
                                                                                                         "type_document"=>$type_document,
                                                                                                         "date_record"=> $date1_send11_time, //วันที่ทำการบันทึกข้อมูล
                                                                                                      );

                                                                                      }
                                                                                     
                                          $tb="tb_main1";
                                          $this->db->insert($tb,$data);
                                                  
                                       
                                                 redirect("welcome/homepage/insert_success_send21",'refresh');

                                        }
                        }
                        
                        
                 public   function     inserttable21()
                 {
                         header('Content-Type: text/html; charset=UTF-8');
                                   if(    $this->user_model->authenlogin() == 1 )
                                   {
                                        //echo print_r($_POST);  
                                        //echo  "<hr>";
                                        #-- หนังสือรับ หนังสือเ้ข้า  มูลนิธิตะวันฉายฯ
                                                                           $registration_receive21=trim($this->input->get_post("registration_receive21"));   //เลขทะเบียนส่ง   1
                                                                      // echo "<br>";
                                                                         $at_receive21=trim($this->input->get_post("at_receive21"));  //ที่       2
                                                                      // echo  "<br>";
                                                                       $date1_receive21=trim($this->input->get_post("date1_receive21")); //ลงวันที่           3
                                                                     //  echo  "<br>";
                                                                     $from_receive21=trim($this->input->get_post("from_receive21")); //จาก       4
                                                                      // echo  "<br>";
                                                                        $to_receive21=trim($this->input->get_post("to_receive21"));  //ถึง        5
                                                                     //  echo  "<br>";
                                                                       $subject_receive21=trim($this->input->get_post("subject_receive21"));  //เรื่อง       6
                                                                     //  echo  "<br>";
                                                                  $practice_receive21=trim($this->input->get_post("practice_receive21"));  //การปฏฺิบัติ       7
                                                                    //   echo  "<br>";
                                                                     $note_receive21=trim($this->input->get_post("note_receive21")); //หมายเหตุ      8
                                                                      // echo  "<br>";
                                                                          // <input type="hidden"  id="type_record11"  name="type_record11"  value="1"  /> 
                                                                       /*

                                                                                          1 	มูลนิธิตะวันฉายฯ
		                                                      2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
	                                                      	3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ 
                                                                        
                                                                        */
                                                                          $type_record=trim($this->input->get_post("type_record21")); //ประเภทของตารางที่ทำการบันทึก    9
                                                                     //  echo  "<br>";
                                                                            $type_document=1;  // 1=หนังสือรับ,2=หนังสือส่ง
                                                                      
                                                                         $date1_receive21_time=trim($this->input->get_post("date1_receive21_time")); //ประเภทของตารางที่ทำการบันทึก    9    
                                                                            
                                                                            
                                                                      //  print_r($_FILES); 
                                                                            
                                                                                        //------------------------------- upload file-------------------------------------------
                                                                                   // print_r($_FILES)  
                                                                                       $file1name = $_FILES["file21"]['name'];  // ชื่อของไฟล์      10  
                                                                                 // echo br();
                                                                              $file1tmp  =$_FILES['file21']["tmp_name"]; // tmp folder
                                                                                 //echo br();
                                                                                    $file1Type= $_FILES['file21']["type"]; //type of file
                                                                                //  echo br();
                                                                                   $file1Size= $_FILES['file21']["size"]; //size
                                                                                 // echo br();
                                                                                   $file1ErrorMsg = $_FILES['file21']["error"]; // 0=false 1=true   
                                                                              //   echo br();
                                                                                 
                                                                                 
                                                                                 
                                                                                 if( strlen($file1name)   >  0  &&  $file1name != ""  )
                                                                                      {

                                                                                                      $data=array(
                                                                                                          "registration"=> $registration_receive21,
                                                                                                          "at"=> $at_receive21,
                                                                                                          "date"=>$date1_receive21,
                                                                                                          "from"=>$from_receive21,
                                                                                                          "to"=> $to_receive21,
                                                                                                         "subject"=>$subject_receive21,
                                                                                                         "practice"=>$practice_receive21,
                                                                                                         "note"=>$note_receive21,
                                                                                                         "type_record"=> $type_record,
                                                                                                         "filename"=>$file1name, 
                                                                                                          "type_document"=>$type_document,
                                                                                                          "date_record"=> $date1_receive21_time,
                                                                                                      );



                                                                                                  $cp=copy($file1tmp ,  "upload/". $file1name );
                                                                                                  if( $cp )
                                                                                                  {
                                                                                                      echo 1;
                                                                                                  }
                                                                                                  else{
                                                                                                      echo 0;
                                                                                                  }

                                                                                      }
                                                                                      else
                                                                                      {
                                                                                            $data=array(
                                                                                                          "registration"=>$registration_receive21,
                                                                                                          "at"=> $at_receive21,
                                                                                                          "date"=>$date1_receive21,
                                                                                                          "from"=>$from_receive21,
                                                                                                          "to"=> $to_receive21,
                                                                                                         "subject"=>$subject_receive21,
                                                                                                         "practice"=>$practice_receive21,
                                                                                                         "note"=>$note_receive21,
                                                                                                         "type_record"=> $type_record,
                                                                                                       //  "filename"=>$file1name, 
                                                                                                         "type_document"=>$type_document,
                                                                                                        "date_record"=> $date1_receive21_time,
                                                                                                      );

                                                                                      }
                                                                                      
                                         
                                          $tb="tb_main1";
                                          $this->db->insert($tb,$data);
                                          
                                             redirect("welcome/homepage/insert_success_receive21",'refresh');
                                                                       
                                    }  
                 }
                 
                   public   function     inserttable22()
                   {
                          header('Content-Type: text/html; charset=UTF-8');
                                   if(    $this->user_model->authenlogin() == 1 )
                                   {
                                           //print_r($_POST);
                                          // echo "<hr>";
                                          $registration_send21=trim($this->input->get_post("registration_send21"));   //เลขทะเบียนส่ง   1
                                          //echo br();        
                                            $at_send21=trim($this->input->get_post("at_send21"));  //ที่       2
                                         // echo br();      
                                            $date1_send21=trim($this->input->get_post("date1_send21")); //ลงวันที่           3
                                         // echo br();      
                                             $from_send21=trim($this->input->get_post("from_send21")); //จาก       4
                                         // echo br();     
                                           $to_send21=trim($this->input->get_post("to_send21"));  //ถึง        5
                                         // echo br();     
                                            $subject_send21=trim($this->input->get_post("subject_send21"));  //เรื่อง       6
                                         // echo br();     
                                           $practice_send21=trim($this->input->get_post("practice_send21"));  //การปฏฺิบัติ       7
                                        //  echo br();   
                                          $note_send21=trim($this->input->get_post("note_send21")); //หมายเหตุ      8
                                         // echo br();   
                                                                          // <input type="hidden"  id="type_record11"  name="type_record11"  value="1"  /> 
                                                                       /*

                                                                                          1 	มูลนิธิตะวันฉายฯ
		                                                      2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
	                                                      	3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ 
                                                                        
                                                                        */
                                                                    $type_record=trim($this->input->get_post("type_record21")); //ประเภทของตารางที่ทำการบันทึก    9
                                                //    echo  "<br>";
                                                             $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง
                                                //     echo  "<br>";
                                                             
                                                                 $date1_record21_time=trim($this->input->get_post("date1_record21_time"));
                                                     
                                                                                         //------------------------------- upload file-------------------------------------------
                                                                                   // print_r($_FILES)  
                                                                                   $file1name = $_FILES["file21"]['name'];  // ชื่อของไฟล์      10  
                                                                                //  echo br();
                                                                                 $file1tmp  =$_FILES['file21']["tmp_name"]; // tmp folder
                                                                                //  echo br();
                                                                                 $file1Type= $_FILES['file21']["type"]; //type of file
                                                                                //  echo br();
                                                                                $file1Size= $_FILES['file21']["size"]; //size
                                                                                //  echo br();
                                                                                  $file1ErrorMsg = $_FILES['file21']["error"]; // 0=false 1=true   
                                                                                // echo br();
                                                                                  
                                                                                   
                                                                                 if( strlen($file1name)   >  0  &&  $file1name != ""  )
                                                                                      {

                                                                                                      $data=array(
                                                                                                          "registration"=> $registration_send21,
                                                                                                          "at"=> $at_send21,
                                                                                                          "date"=>$date1_send21,
                                                                                                          "from"=>$from_send21,
                                                                                                          "to"=> $to_send21,
                                                                                                         "subject"=>$subject_send21,
                                                                                                         "practice"=>$practice_send21,
                                                                                                         "note"=>$note_send21,
                                                                                                         "type_record"=> $type_record,
                                                                                                         "filename"=>$file1name, 
                                                                                                          "type_document"=>$type_document,
                                                                                                          "date_record"=>  $date1_record21_time,
                                                                                                      );



                                                                                                  $cp=copy($file1tmp ,  "upload/". $file1name );
                                                                                                  if( $cp )
                                                                                                  {
                                                                                                      //echo 1;
                                                                                                  }
                                                                                                  else{
                                                                                                     // echo 0;
                                                                                                  }

                                                                                      }
                                                                                          else
                                                                                      {
                                                                                            $data=array(
                                                                                                          "registration"=>$registration_send21,
                                                                                                          "at"=> $at_send21,
                                                                                                          "date"=>$date1_send21,
                                                                                                          "from"=>$from_send21,
                                                                                                          "to"=> $to_send21,
                                                                                                         "subject"=>$subject_send21,
                                                                                                         "practice"=>$practice_send21,
                                                                                                         "note"=>$note_send21,
                                                                                                         "type_record"=> $type_record,
                                                                                                       //  "filename"=>$file1name, 
                                                                                                         "type_document"=>$type_document,
                                                                                                           "date_record"=>  $date1_record21_time,
                                                                                                      );

                                                                                      }
                                                                                  
                                                                             $tb="tb_main1";
                                                                             $this->db->insert($tb,$data);     
                                                                             redirect("welcome/homepage/insert_success_send21",'refresh');
                                       
                                   }
                   }
                   
                   
                   
                 public   function     inserttable31()
                   {
                          header('Content-Type: text/html; charset=UTF-8');
                                   if(    $this->user_model->authenlogin() == 1 )
                                   {
                                          // print_r($_POST);
                                          //echo "<hr>";
                                          $registration_receive31=trim($this->input->get_post("registration_receive31"));   //เลขทะเบียนส่ง   1
                                       //  echo br();        
                                        $at_receive31=trim($this->input->get_post("at_receive31"));  //ที่       2
                                       //  echo br();      
                                        $date1_receive31=trim($this->input->get_post("date1_receive31")); //ลงวันที่           3
                                         //echo br();      
                                         $from_receive31=trim($this->input->get_post("from_receive31")); //จาก       4
                                     //    echo br();     
                                        $to_receive31=trim($this->input->get_post("to_receive31"));  //ถึง        5
                                      //   echo br();     
                                        $subject_receive31=trim($this->input->get_post("subject_receive31"));  //เรื่อง       6
                                      //   echo br();     
                                        $practice_receive31=trim($this->input->get_post("practice_receive31"));  //การปฏฺิบัติ       7
                                      //   echo br();   
                                        $note_receive31=trim($this->input->get_post("note_receive31")); //หมายเหตุ      8
                                       //  echo br();  
                                         
                                          $type_record=trim($this->input->get_post("type_record31")); //ประเภทของตารางที่ทำการบันทึก    9
                                      //   echo br();  
                                          $type_document=1;  // 1=หนังสือรับ,2=หนังสือส่ง
                                       //  echo br();  
                                             
                                          $date1_receive31_time=trim($this->input->get_post("date1_receive31_time"));
                                          
                                          
                                         
                                                                    //------------------------------- upload file-------------------------------------------
                                                                                   // print_r($_FILES)  
                                                                                $file1name = $_FILES["file31"]['name'];  // ชื่อของไฟล์      10  
                                                                            //echo br();
                                                                            $file1tmp  =$_FILES['file31']["tmp_name"]; // tmp folder
                                                                            //echo br();
                                                                               $file1Type= $_FILES['file31']["type"]; //type of file
                                                                          //  echo br();
                                                                           $file1Size= $_FILES['file31']["size"]; //size
                                                                            //echo br();
                                                                             $file1ErrorMsg = $_FILES['file31']["error"]; // 0=false 1=true   
                                                                          //  echo br();
                                                                            
                                                                            if( strlen($file1name)   >  0  &&  $file1name != ""  )
                                                                                      {

                                                                                                      $data=array(
                                                                                                          "registration"=> $registration_receive31,
                                                                                                          "at"=> $at_receive31,
                                                                                                          "date"=>$date1_receive31,
                                                                                                          "from"=>$from_receive31,
                                                                                                          "to"=> $to_receive31,
                                                                                                         "subject"=>$subject_receive31,
                                                                                                         "practice"=>$practice_receive31,
                                                                                                         "note"=>$note_receive31,
                                                                                                         "type_record"=> $type_record,
                                                                                                         "filename"=>$file1name, 
                                                                                                          "type_document"=>$type_document,
                                                                                                          
                                                                                                          "date_record"=> $date1_receive31_time,  //วันที่ทำการบันทึกข้อมูล
                                                                                                          
                                                                                                      );



                                                                                                  $cp=copy($file1tmp ,  "upload/". $file1name );
                                                                                                  if( $cp )
                                                                                                  {
                                                                                                     //   echo 1;
                                                                                                  }
                                                                                                  else{
                                                                                                      //   echo 0;
                                                                                                  }

                                                                                      }
                                                                                        else
                                                                                      {
                                                                                            $data=array(
                                                                                                          "registration"=>$registration_receive31,
                                                                                                          "at"=> $at_receive31,
                                                                                                          "date"=>$date1_receive31,
                                                                                                          "from"=>$from_receive31,
                                                                                                          "to"=> $to_receive31,
                                                                                                         "subject"=>$subject_receive31,
                                                                                                         "practice"=>$practice_receive31,
                                                                                                         "note"=>$note_receive31,
                                                                                                         "type_record"=> $type_record,
                                                                                                       //  "filename"=>$file1name, 
                                                                                                         "type_document"=>$type_document,
                                                                                                
                                                                                                         "date_record"=> $date1_receive31_time,  //วันที่ทำการบันทึกข้อมูล
                                                                                                
                                                                                                
                                                                                                      );

                                                                                      }
                                                                                      
                                                               $tb="tb_main1";
                                                               $ck=$this->db->insert($tb,$data);                          
                                                               if( $ck )
                                                               {   
                                                                    //echo 1; 
                                                                     redirect("welcome/homepage/insert_success_receive31",'refresh');     
                                                               }
                                                               else
                                                               {
                                                                    // echo 0;
                                                               }
                                            redirect("welcome/homepage/insert_success_receive31",'refresh');                               

                                   }
      
                    }
                    
                    
               public   function     inserttable32()
                   {
                       header('Content-Type: text/html; charset=UTF-8');
                                   if(    $this->user_model->authenlogin() == 1 )
                                   {
                                          // print_r($_POST);
                                        //   echo "<hr>";
                                           //send31
                                           
                                            $registration_send31=trim($this->input->get_post("registration_send31"));   //เลขทะเบียนส่ง   1
                                       // echo br();        
                                         $at_send31=trim($this->input->get_post("at_send31"));  //ที่       2
                                        //echo br();      
                                          $date1_send31=trim($this->input->get_post("date1_send31")); //ลงวันที่           3
                                       // echo br();      
                                         $from_send31=trim($this->input->get_post("from_send31")); //จาก       4
                                        //echo br();     
                                          $to_send31=trim($this->input->get_post("to_send31"));  //ถึง        5
                                       // echo br();     
                                         $subject_send31=trim($this->input->get_post("subject_send31"));  //เรื่อง       6
                                        //echo br();     
                                          $practice_send31=trim($this->input->get_post("practice_send31"));  //การปฏฺิบัติ       7
                                        //echo br();   
                                         $note_send31=trim($this->input->get_post("note_send31")); //หมายเหตุ      8
                                        //echo br();  
                                         
                                            $type_record=trim($this->input->get_post("type_record31")); //ประเภทของตารางที่ทำการบันทึก    9
                                         //echo br();  
                                            $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง
                                         //echo br();  
                                         
                                            
                                           $date1_send31_time=trim($this->input->get_post("date1_send31_time")); //ประเภทของตารางที่ทำการบันทึก    9 
                                            
                                            
                                         //print_r($_FILES);
                                                                       //------------------------------- upload file-------------------------------------------
                                                                                   // print_r($_FILES)  
                                                                              $file1name = $_FILES["file31"]['name'];  // ชื่อของไฟล์      10  
                                                                           //echo br();
                                                                            $file1tmp  =$_FILES['file31']["tmp_name"]; // tmp folder
                                                                           //echo br();
                                                                              $file1Type= $_FILES['file31']["type"]; //type of file
                                                                          // echo br();
                                                                            $file1Size= $_FILES['file31']["size"]; //size
                                                                           //echo br();
                                                                             $file1ErrorMsg = $_FILES['file31']["error"]; // 0=false 1=true   
                                                                          //  echo br();
                                                                            
                                                                            
                                                                             if( strlen($file1name)   >  0  &&  $file1name != ""  )
                                                                                      {

                                                                                                      $data=array(
                                                                                                          "registration"=> $registration_send31,
                                                                                                          "at"=> $at_send31,
                                                                                                          "date"=>$date1_send31,
                                                                                                          "from"=>$from_send31,
                                                                                                          "to"=> $to_send31,
                                                                                                         "subject"=>$subject_send31,
                                                                                                         "practice"=>$practice_send31,
                                                                                                         "note"=>$note_send31,
                                                                                                         "type_record"=> $type_record,
                                                                                                         "filename"=>$file1name, 
                                                                                                          "type_document"=>$type_document,
                                                                                                          "date_record"=>$date1_send31_time,
                                                                                                          
                                                                                                      );



                                                                                                  $cp=copy($file1tmp ,  "upload/". $file1name );
                                                                                                  if( $cp )
                                                                                                  {
                                                                                                      // echo 1;
                                                                                                  }
                                                                                                  else{
                                                                                                       //  echo 0;
                                                                                                  }

                                                                                      }
                                                                                      else
                                                                                      {
                                                                                            $data=array(
                                                                                                          "registration"=>$registration_send31,
                                                                                                          "at"=> $at_send31,
                                                                                                          "date"=>$date1_send31,
                                                                                                          "from"=>$from_send31,
                                                                                                          "to"=> $to_send31,
                                                                                                         "subject"=>$subject_send31,
                                                                                                         "practice"=>$practice_send31,
                                                                                                         "note"=>$note_send31,
                                                                                                         "type_record"=> $type_record,
                                                                                                       //  "filename"=>$file1name, 
                                                                                                         "type_document"=>$type_document,
                                                                                                          "date_record"=>$date1_send31_time,
                                                                                                      );

                                                                                      }
                                                                                      
                                                               $tb="tb_main1";
                                                               $this->db->insert($tb,$data);                          
                                                               redirect("welcome/homepage/insert_success_send31",'refresh');              
                                                                            
                                                                            
                                       
                                   }
                    }
                    
                public function  test()
                {
                    #   http://localhost/document/index.php/welcome/test
                          //$this->load->model("User_model");
                           $this->user_model->authenlogin();  //check login  from  model
                }
                
                function  add_academic()
                {
                         if(    $this->user_model->authenlogin() == 1 )
                          {
                                 $data["title"]=$this->title;
                                 
                                 
                                            ?>                  
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">play_arrow</i> ตารางงานผู้บริหาร > เพิ่มกิจกรรม 
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php  
                       
                                 $this->load->view("add_academic");
                           }
                }
                
                 function  update_academic()
                {
                         if(    $this->user_model->authenlogin() == 1 )
                          {
                                $id=trim($this->uri->segment(3));     
                                $data["id_main_academic"]=$id;
                                 $tb="tb_main_academic";
                                 $q=$this->db->get_where($tb,array("id_main_academic"=>$id));
                                // $row=$q->rows();
                                 $row=$q->row();
                                 
                                   $data["id_firstname_academic"]=$row->id_firstname_academic;   
                                   
                                   
                                   
                                    $data["id_activities"]=$row->id_activities;   
                                 
                                  $data["begin_date"]=$row->begin_date;
                                  $data["end_date"]=$row->end_date;
                                  $data["title"]=$row->title;
                                  $data["place"]=$row->place;
                                  $data["detail"]=$row->detail;
                                  $data["expenses"]=$row->expenses;
                                  
                                  $data["note"]=$row->note;
                                  $data["borrow"]=$row->borrow;
                                  
                                  $data["begin_time"]=$row->begin_time;
                                  
                                  $data["end_time"]=$row->end_time;
                                  
                                  
                                                  
                                 //$data["title"]=$this->title;
                                 $this->load->view("update_academic",$data);
                           }
                }
                
                function  update_tb_main_academic()
                {
                       if(    $this->user_model->authenlogin() == 1 )
                          {
                            header('Content-Type: text/html; charset=UTF-8');
                                 //print_r($_FILES);
                                // print_r($_POST);    
                                 /*
                                   Array ( 
                                  * [firstname_academic] => 4 
                                  * [activities] => 4 
                                  * [begin_date] => 2017-01-01 
                                  * [end_date] => 2017-01-27
                                  *  [title] => à¸«à¸±à¸§à¸‚à¹‰à¸­ The 12 ht Khon kaen FESS course & The 5th Khon Kaen
                                  *  [place] => à¸“ à¸«à¹‰à¸­à¸‡à¸›à¸£à¸°à¸Šà¸¸à¸¡à¸¡à¸´à¸•à¸£à¸ à¸²à¸ž à¸Šà¸±à¹‰à¸™ 3
                                  *  [detail] => International course in advanced endoscopic sinus and skull base surgery: Handson dissection In fresh frozen cadavers 
                                  * [expenses] => 1200 
                                  * [borrow] => 1000 
                                  * [note] => --
                                  *  [btn_academic] => ) 
                                  */
                                //   echo "<hr>";
                                           $id_main_academic=trim($this->input->get_post("id_main_academic"));
                                             
                                if(   $id_main_academic > 0  )       
                                { 
                                         $firstname_academic=trim($this->input->get_post("firstname_academic"));   

                                                   $activities=trim($this->input->get_post("activities"));

                                                  $begin_date=trim($this->input->get_post("begin_date"));
                                                  //  echo "<br>";
                                                     $end_date=trim($this->input->get_post("end_date"));
                                                   // echo "<br>";
                                                     $title=trim($this->input->get_post("title"));
                                                    //echo "<br>";
                                                    $place=trim($this->input->get_post("place"));
                                                    //echo "<br>";
                                                    $detail=trim($this->input->get_post("detail"));
                                                    //echo "<br>";   
                                                    $expenses=trim($this->input->get_post("expenses"));
                                                   // echo "<br>";   
                                                     $borrow=trim($this->input->get_post("borrow"));
                                                   // echo "<br>";   
                                                    $note=trim($this->input->get_post("note"));
                                                  //  echo "<br>";   

                                                    
                                                    $begin_time=trim($this->input->get_post("begin_time"));
                                                    
                                                 //   $end_time=trim($this->input->get_post("end_time"));


                                                    $data=array(
                                                        "id_firstname_academic"=>$firstname_academic,  //1
                                                       "id_activities"=>$activities,      //2
                                                        "begin_date"=>$begin_date,   //3
                                                        "end_date"=>$end_date,   //4
                                                        "title"=>$title,   //5
                                                        "place"=>$place,   //6
                                                        "detail"=>$detail,    //7
                                                        "expenses"=>$expenses,   //8
                                                       "borrow"=>$borrow,   //9
                                                       "note"=>$note,   //9
                                                        "begin_time"=>$begin_time,
                                                    //    "end_time"=>$end_time,
                                                        
                                                    );

                                                       $tb="tb_main_academic";
                                                       $this->db->where("id_main_academic",$id_main_academic);
                                                       $ck=$this->db->update($tb,$data);       
                                                       if( $ck )
                                                       {
                                                           //echo 1;
                                                       }
                                                       else if( !$ck )
                                                       {
                                                           //echo 0;
                                                       }
                                        redirect("welcome/homepage/insert_main_academic",'refresh');   
                                }
                         }
                }
                
                function insert_academic()  //บันทึกกิจกรรมทางวิชาการ
                {
                       if(    $this->user_model->authenlogin() == 1 )
                          {
                               header('Content-Type: text/html; charset=UTF-8');
                                 //print_r($_FILES);
                                // print_r($_POST);    
                                 /*
                                   Array ( 
                                  * [firstname_academic] => 4 
                                  * [activities] => 4 
                                  * [begin_date] => 2017-01-01 
                                  * [end_date] => 2017-01-27
                                  *  [title] => à¸«à¸±à¸§à¸‚à¹‰à¸­ The 12 ht Khon kaen FESS course & The 5th Khon Kaen
                                  *  [place] => à¸“ à¸«à¹‰à¸­à¸‡à¸›à¸£à¸°à¸Šà¸¸à¸¡à¸¡à¸´à¸•à¸£à¸ à¸²à¸ž à¸Šà¸±à¹‰à¸™ 3
                                  *  [detail] => International course in advanced endoscopic sinus and skull base surgery: Handson dissection In fresh frozen cadavers 
                                  * [expenses] => 1200 
                                  * [borrow] => 1000 
                                  * [note] => --
                                  *  [btn_academic] => ) 
                                  */
                                //   echo "<hr>";
                                     $firstname_academic=trim($this->input->get_post("firstname_academic"));   
                                 //  echo "<br>";
                                    $activities=trim($this->input->get_post("activities"));
                                  // echo "<br>";
                                   $begin_date=trim($this->input->get_post("begin_date"));
                                 //  echo "<br>";
                                    $end_date=trim($this->input->get_post("end_date"));
                                  // echo "<br>";
                                    $title=trim($this->input->get_post("title"));
                                   //echo "<br>";
                                   $place=trim($this->input->get_post("place"));
                                   //echo "<br>";
                                   $detail=trim($this->input->get_post("detail"));
                                   //echo "<br>";   
                                   $expenses=trim($this->input->get_post("expenses"));
                                  // echo "<br>";   
                                    $borrow=trim($this->input->get_post("borrow"));
                                  // echo "<br>";   
                                   $note=trim($this->input->get_post("note"));
                                 //  echo "<br>";  
                                   
                                   
                                   $begin_time=trim($this->input->get_post("begin_time"));
                                   
                               //    $end_time=trim($this->input->get_post("end_time"));
                                   
                                   $tb="tb_main_academic";
                                   
                                   $data=array(
                                       
                                       "id_firstname_academic"=>$firstname_academic,  //1
                                       "id_activities"=>$activities,      //2
                                       "begin_date"=>$begin_date,   //3
                                       "end_date"=>$end_date,   //4
                                       "title"=>$title,   //5
                                       "place"=>$place,   //6
                                       "detail"=>$detail,    //7
                                       "expenses"=>$expenses,   //8
                                       "borrow"=>$borrow,   //9
                                       "note"=>$note,   //9
                                       "begin_time"=>$begin_time,
                                   //   "end_time"=> $end_time,
                                       
                                   );
                                   
                                   $ck = $this->db->insert($tb,$data);
                                  // $ck=true;
                                   if( $ck )
                                   {
                                      // echo 1;
                                   }
                                   elseif( !$ck )
                                   {
                                       //echo 0;
                                   }
                                   
                                   // index.php/welcome/index/man_calendar
                                     //redirect("welcome/homepage/insert_main_academic",'refresh');   
                                    redirect("welcome/index/man_calendar",'refresh');   
                          }
                }
                
                
                public  function  search_main_calendar()    #   http://localhost/document/index.php/welcome/search_main_calendar
                {
                    if(    $this->user_model->authenlogin() == 1    )
                          {
                                       // echo  $firstname_academic = trim($this->input->get_post("firstname_academic"));
                                     //   echo br();
                        
                                     $firstname_academic =  $this->uri->segment(3);
                                     //echo br();          
                        
                                                  $tb="tb_main_academic";
                                          
                                          
                                                  //       $tbj1="tb_academic"; 
                                                   //       $tbj2="tb_academic_activities";
                                   
                                                  
                                          //        $this->db->join($tbj1,$tb.".id_firstname_academic=".$tbj1.".id_academic","left");
                                         //         $this->db->join($tbj2,$tb.".id_activities=".$tbj2.".id_academic_activities","left");
                                                  
                                           //         $this->db->order_by("id_main_academic","DESC");
                                                  
                                                  
                                                  
                                                         ?>                  
                                                                <div class="row">
                                                                            <div class="col s12 m12">
                                                                              <div class="card blue-grey darken-1">
                                                                                <div class="card-content white-text">

                                                                                  <p>
                                                                                     <i class="material-icons left">play_arrow</i> ตารางงานผู้บริหาร > ค้นหากิจกรรม 
                                                                                  </p>

                                                                                </div>



                                                                              </div>
                                                                            </div>
                                                              </div>
                                                        <?php  
                                                        
                                                  
                                                  
                                                    $data["q"]=$this->db->get_where($tb,array("id_firstname_academic"=> $firstname_academic  ));
                                                     $this->load->view("calendar1",$data);          
                                                     
                                                     
                          } 
                    
                    
                    /*
                       $firstname_academic = trim($this->input->get_post("firstname_academic"));
                          // echo br();
                                 
                                  $begin_date=trim($this->input->get_post("begin_date"));
                                // echo  "<br>";
                                  $end_date=trim($this->input->get_post("end_date"));
                               //  echo  "<br>";
                                 
                                               $tb="tb_main_academic";
                           
            
                                 
                                                          $tbj1="tb_academic"; 
                                                          $tbj2="tb_academic_activities";
                                   
                                                  
                                                  $this->db->join($tbj1,$tb.".id_firstname_academic=".$tbj1.".id_academic","left");
                                                  $this->db->join($tbj2,$tb.".id_activities=".$tbj2.".id_academic_activities","left");
                                                  
                                            
                                                  
                                                  
                                                     $this->db->order_by("id_main_academic","DESC");
                                                  
                                                  if(  $firstname_academic > 0    &&    $begin_date == ""   &&  $end_date  ==  ""  )
                                                  {
                                                           //   $this->db->where($tb.".begin_date >= ", $begin_date);
                                                           //    $this->db->where($tb.".end_date <= ", $end_date);
                                                               $this->db->where($tb.".id_firstname_academic = ",$firstname_academic);
                                                             //  $this->db->where($tb.".id_firstname_academic = ", $firstname_academic );
   
                                                               $data["query"]=$this->db->get($tb);
                                                               $this->load->view("home_academic",$data);
                                                             //  $data["query"]=$this->db->get($tb,$this->limit);
                                                  }
                                                   else if(  $firstname_academic > 0    &&    $begin_date != ""   &&  $end_date  !=  ""  )
                                                  {
                                                               $this->db->where($tb.".begin_date >= ", $begin_date);
                                                               $this->db->where($tb.".end_date <= ", $end_date);
                                                               $this->db->where($tb.".id_firstname_academic = ",$firstname_academic);
                                                             //  $this->db->where($tb.".id_firstname_academic = ", $firstname_academic );
                                                              $data["query"]=$this->db->get($tb);
                                                              // $data["query"]=$this->db->get_where($tb,array($tb.".id_firstname_academic"=>$firstname_academic));
                                                               $this->load->view("home_academic",$data);
                                                             //  $data["query"]=$this->db->get($tb,$this->limit);
                                                  }
                                                  
                                               else  if( $begin_date != ""   &&  $end_date != ""  &&    $firstname_academic == "" )
                                                  { 
                                                              $this->db->where($tb.".begin_date >= ", $begin_date);
                                                               $this->db->where($tb.".end_date <= ", $end_date);
                                                            //  $this->db->where($tb.".id_firstname_academic = ",$firstname_academic);
                                                              
                                                               $data["query"]=$this->db->get($tb);
                                                               $this->load->view("home_academic",$data);
                                                              // $data["query"]=$this->db->get($tb,$this->limit);
                                                  }
                     */
                    
                    
                    
                    
                }
                
                public  function  search_main_academic()
                {
                     #   http://localhost/document/index.php/welcome/search_main_academic
                      if(    $this->user_model->authenlogin() == 1 )
                          {
                          
                              //  print_r($_POST);
                             //    echo "<hr>";
                                 /*
                                  Array
(
    [firstname_academic] => 2
    [activities] => 2
    [begin_date] => 2017-01-02
    [end_date] => 2017-01-13
)
                                  */
                                 
                          
                         $firstname_academic = trim($this->input->get_post("firstname_academic"));
                          // echo br();
                                 
                                  $begin_date=trim($this->input->get_post("begin_date"));
                                // echo  "<br>";
                                  $end_date=trim($this->input->get_post("end_date"));
                               //  echo  "<br>";
                                 
                                               $tb="tb_main_academic";
                           
            
                                 
                                                          $tbj1="tb_academic"; 
                                                          $tbj2="tb_academic_activities";
                                   
                                                  
                                                  $this->db->join($tbj1,$tb.".id_firstname_academic=".$tbj1.".id_academic","left");
                                                  $this->db->join($tbj2,$tb.".id_activities=".$tbj2.".id_academic_activities","left");
                                                  
                                            
                                                  
                                                  
                                                     $this->db->order_by("id_main_academic","DESC");
                                                  
                                                  if(  $firstname_academic > 0    &&    $begin_date == ""   &&  $end_date  ==  ""  )
                                                  {
                                                           //   $this->db->where($tb.".begin_date >= ", $begin_date);
                                                           //    $this->db->where($tb.".end_date <= ", $end_date);
                                                               $this->db->where($tb.".id_firstname_academic = ",$firstname_academic);
                                                             //  $this->db->where($tb.".id_firstname_academic = ", $firstname_academic );
   
                                                               $data["query"]=$this->db->get($tb);
                                                               $this->load->view("home_academic",$data);
                                                             //  $data["query"]=$this->db->get($tb,$this->limit);
                                                  }
                                                   else if(  $firstname_academic > 0    &&    $begin_date != ""   &&  $end_date  !=  ""  )
                                                  {
                                                               $this->db->where($tb.".begin_date >= ", $begin_date);
                                                               $this->db->where($tb.".end_date <= ", $end_date);
                                                               $this->db->where($tb.".id_firstname_academic = ",$firstname_academic);
                                                             //  $this->db->where($tb.".id_firstname_academic = ", $firstname_academic );
                                                              $data["query"]=$this->db->get($tb);
                                                              // $data["query"]=$this->db->get_where($tb,array($tb.".id_firstname_academic"=>$firstname_academic));
                                                               $this->load->view("home_academic",$data);
                                                             //  $data["query"]=$this->db->get($tb,$this->limit);
                                                  }
                                                  
                                               else  if( $begin_date != ""   &&  $end_date != ""  &&    $firstname_academic == "" )
                                                  { 
                                                              $this->db->where($tb.".begin_date >= ", $begin_date);
                                                               $this->db->where($tb.".end_date <= ", $end_date);
                                                            //  $this->db->where($tb.".id_firstname_academic = ",$firstname_academic);
                                                              
                                                               $data["query"]=$this->db->get($tb);
                                                               $this->load->view("home_academic",$data);
                                                              // $data["query"]=$this->db->get($tb,$this->limit);
                                                  }
                                                 
                                                  
               
                          
                         }
                    
                }
                
                public function  search_by_date()
                {
                        $begin_date_main=trim($this->input->get_post("begin_date_main"));
                      //echo br();
                      
                       $end_date_main=trim($this->input->get_post("end_date_main"));
                    
                       $type_record=trim($this->input->get_post("type_record"));
                     
                     
                     
                                   $tb="tb_main1";
                            
                                    $this->db->where("date >=  ", $begin_date_main );
                                    $this->db->where("date <=  ", $end_date_main );
                                    $this->db->where("type_record", $type_record );
                                    
                            
                           $data["query"] =$this->db->get_where($tb,array("type_document"=>1));
                           
                           
                                    $this->db->where("date >=  ", $begin_date_main );
                                    $this->db->where("date <=  ", $end_date_main );
                                    $this->db->where("type_record", $type_record );
                           
                           $data["query2"] =$this->db->get_where($tb,array("type_document"=>2));  
                            
                           /* 
                            $data["query"] =$this->db->get_where($tb,array('begin_date'=>$begin_date_main,'end_date'=>$end_date_main,"type_document"=>1));
                            
                            
                            $data["query2"] =$this->db->get_where($tb,array('begin_date'=>$begin_date_main,'end_date'=>$end_date_main,"type_document"=>2));
                           */
                            
                            
                            $this->load->view("table11",$data);   
                      
                      
                }
                
                public function search_by_search()
                {
                           $subject=trim($this->input->get_post("subject"));
                        //echo br();
                           $type_record=trim($this->input->get_post("type_record"));
                        //echo br();
                        $fieldname=trim($this->input->get_post("fieldname"));
                        //echo br();
                        if( strlen($subject ) >  0  &&   strlen($type_record )  > 0  &&   strlen($fieldname )  )
                        {
                             $tb="tb_main1";
                             $this->db->where("type_record", $type_record );
                             $this->db->like($fieldname, $subject );
                             $data["query"] =$this->db->get_where($tb,array("type_document"=>1));
                             
                                 $this->db->where("type_record", $type_record );
                                 $this->db->like($fieldname, $subject );
                                 $data["query2"] =$this->db->get_where($tb,array("type_document"=>2));
                                 
                                   $this->load->view("table11",$data);   
                        }
                }
                
                public  function  sarch_by_to()
                {
                    
                    
                         $to=trim($this->input->get_post("to"));  //ถึง
                        // echo br();
                         $type_record=trim($this->input->get_post("type_record"));
                        // echo br();
                         
                            if(   $to != ""  &&  $type_record != ""   )
                            {
                                  $tb="tb_main1";
                                  
                                 
                                  
                                  
                                 // $data["query"] =$this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>1),5);
                                  
                                    $this->db->like("to",$to);
                                  //  $this->db->like('to', $to );
                                //    $this->db->where("type_record",$type_record);
                              //      $this->db->where("type_document",1);
                                    $data["query"] =$this->db->get($tb);
                                  
                                 //  $data["query"]=$this->db->query(" select  *  from  $tb  where  to  like('%$to%');  ");
                                 
                                  
                                //  $data["query2"]=$this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>2),5); 
                                     $this->db->like("to",$to);
                               //      $this->db->where("type_record",$type_record);
                              //       $this->db->where("type_document",2);
                                     $data["query2"]=$this->db->get($tb);
                                 //  $data["query"]=$this->db->query(" select  *  from  $tb   where   to  like('%$to%');  ");
                                   
                                   
                                  
                                   $this->load->view("table11",$data);      
                                  
                            }
                            
                    
                    //echo "T";
                                                  
                                                  
                    /*
                      echo   $id_main1=trim($this->input->get_post("id_main1"));                           
                      echo br();
                    
                      
                         
                           //   $data["query"] =$this->db->get_where($tb,array("id_main1"=> $id_main1));
                         
                           //  $this->db->where("type_document",1 );
                            
                             
                         //    $this->db->where("type_document",2 );
                             $data["query2"]=$this->db->get($tb,array("id_main1"=> $id_main1));
                             
                        //  $this->load->view("table11",$data);      
                       */   
                   
                    
                }
                
                
                public  function  search_tb_main1()
                {
                     #http://localhost/document/index.php/welcome/search_tb_main1
                    if(    $this->user_model->authenlogin() == 1 )
                          {
                                   $data["title"]=$this->title;     
                                   $tb="tb_main1";
                                   $begin_date_main=trim($this->input->get_post("begin_date_main"));   
                                   //echo br();
                                   $end_date_main=trim($this->input->get_post("end_date_main"));   
                                   //echo br();
                                   $type_record=trim($this->input->get_post("type_record")); 
                                 //  echo br();

                                 
                                switch($type_record)  
                                {
                                    case 1:  //subtable11()
                                    {
                                    $this->db->order_by("id_main1","DESC");
                                    $this->db->where("date >=  ", $begin_date_main );
                                    $this->db->where("date <=  ", $end_date_main );
                                    $this->db->where("type_record", $type_record );
                                    $this->db->where("type_document",1 );
                                                   
                                     //   $data["query"]=$this->user_model->tb_main1("1","1");
                                     //   $data["query"] = $this->db->get_where($tb,array("type_record"=>$id,"type_document"=>1));
                                    //  $data["query"] =$this->db->get($tb,$this->limit);
                                       $data["query"] =$this->db->get($tb);
                                      
                                    $this->db->order_by("id_main1","DESC");
                                    $this->db->where("date >=  ", $begin_date_main );
                                    $this->db->where("date <=  ", $end_date_main );
                                    $this->db->where("type_record", $type_record );
                                    $this->db->where("type_document",2 );
                                 //  $data["query2"]=$this->db->get($tb,$this->limit);
                                       $data["query2"]=$this->db->get($tb);
                                    
                                    
                                   $this->load->view("table11",$data);
                                     
                                           break;
                                    }
                                    case 2: // table2()
                                    {
                                            $this->db->order_by("id_main1","DESC");
                                             $this->db->where("date >=  ", $begin_date_main );
                                             $this->db->where("date <=  ", $end_date_main );
                                             $this->db->where("type_record", $type_record );
                                             $this->db->where("type_document",1 );
                                           //  $data["query"] =$this->db->get($tb,$this->limit);
                                                   $data["query"] =$this->db->get($tb);
                                             //$data["query"]=$this->user_model->tb_main1("3","1");

                                               $this->db->order_by("id_main1","DESC");
                                                $this->db->where("date >=  ", $begin_date_main );
                                                $this->db->where("date <=  ", $end_date_main );
                                                $this->db->where("type_record", $type_record );
                                                $this->db->where("type_document",2 );
                                              // $data["query2"]=$this->db->get($tb,$this->limit);
                                                  $data["query2"]=$this->db->get($tb);
                                               // $data["query2"]=$this->user_model->tb_main1("3","2");    
                                               
                                             $this->load->view("table11",$data);
                                             break;
                                    }
                                    case 3:  //table3() 
                                    {
                                        
                                    //  $data["query"]=$this->user_model->tb_main1("2","1");
                                         $this->db->order_by("id_main1","DESC");
                                             $this->db->where("date >=  ", $begin_date_main );
                                             $this->db->where("date <=  ", $end_date_main );
                                             $this->db->where("type_record", $type_record );
                                             $this->db->where("type_document",1 );
                                           //  $data["query"] =$this->db->get($tb,$this->limit);
                                         $data["query"] =$this->db->get($tb);
                                        
                                        
                                    //   $data["query2"]=$this->user_model->tb_main1("2","2");
                                                       $this->db->order_by("id_main1","DESC");
                                                $this->db->where("date >=  ", $begin_date_main );
                                                $this->db->where("date <=  ", $end_date_main );
                                                $this->db->where("type_record", $type_record );
                                                $this->db->where("type_document",2 );
                                           //    $data["query2"]=$this->db->get($tb,$this->limit);
                                                $data["query2"]=$this->db->get($tb);
                                        
                                         $this->load->view("table11",$data);
                                        break;  
                                    }
                                }   
                                    
                                     
                                     
                                    
                                  
                          }
                    
                }
                
                
                public  function table_main_academic()
                {
                      #   http://localhost/document/index.php/welcome/table_main_academic
                     //     $tb="tb_main_academic";
                     if(    $this->user_model->authenlogin() == 1 )
                          {
                                   $tb="tb_main_academic";
                                   $tbj1="tb_academic"; 
                                   $tbj2="tb_academic_activities";
                                   
                                                  
                                                  $this->db->join($tbj1,$tb.".id_firstname_academic=".$tbj1.".id_academic","left");
                                                  $this->db->join($tbj2,$tb.".id_activities=".$tbj2.".id_academic_activities","left");
                                                  
                                                  $this->db->order_by("id_main_academic","DESC");
                                                  $data["query"]=$this->db->get($tb,$this->limit);
                                                  $this->load->view("home_academic",$data);
                                                  
                           }
                }
                
                
                public  function page_table_main_academic()
                {
                     #http://localhost/document/index.php/welcome/page_table_main_academic/1
                     //     $tb="tb_main_academic";
                     if(    $this->user_model->authenlogin() == 1 )
                          {
                                   $tb="tb_main_academic";
                                   $tbj1="tb_academic"; 
                                   $tbj2="tb_academic_activities";
                                   
                                   
                                                 $page=$this->uri->segment(3);
                                              //   http://10.87.196.170/document/index.php/welcome/homepage/page_table_main_academic/1
                                  
                                          
                                                  
                                                  $this->db->join($tbj1,$tb.".id_firstname_academic=".$tbj1.".id_academic","left");
                                                  $this->db->join($tbj2,$tb.".id_activities=".$tbj2.".id_academic_activities","left");
                                                  
                                                  $this->db->order_by("id_main_academic","DESC");
                                                  
                                                  
                                                  
                                                  
                                                /*  
                                                     //$query = $this->db->get('mytable', 10, 20);    
                                                  if( $page == 1 )
                                                  {
                                                        $data["query"]=$this->db->get($tb,$this->limit,0);
                                                        //redirect("welcome/homepage/insert_main_academic",'refresh');     
                                                  }
                                                  else  if( $page ==  2  )
                                                  {
                                                        //$data["query"]=$this->db->get($tb,$this->limit,6);
                                                         $data["query"]=$this->db->get($tb,$this->limit,$cal_limit);
                                                        
                                                       //  redirect("welcome/homepage/insert_main_academic",'refresh');     
                                                  }
                                                  else  if( $page ==  3  )
                                                  {
                                                       // $data["query"]=$this->db->get($tb,$this->limit,11);
                                                         $data["query"]=$this->db->get($tb,$this->limit,$cal_limit);
                                                       //  redirect("welcome/homepage/insert_main_academic",'refresh');     
                                                  }
                                                   else  if( $page ==  4  )
                                                  {
                                                         // $data["query"]=$this->db->get($tb,$this->limit,16);
                                                            $data["query"]=$this->db->get($tb,$this->limit,$cal_limit);
                                                      //   redirect("welcome/homepage/insert_main_academic",'refresh');   
                                                  }
                                                  else  if( $page ==  5  )
                                                  {
                                                      //  $data["query"]=$this->db->get($tb,$this->limit,21);
                                                          $data["query"]=$this->db->get($tb,$this->limit,$cal_limit);
                                                       //  redirect("welcome/homepage/insert_main_academic",'refresh');   
                                                  }
                                                  else{
                                                      
                                                        $data["query"]=$this->db->get($tb,$this->limit); 
                                                       //  redirect("welcome/homepage/insert_main_academic",'refresh');   
                                                  }
                                                  */
                                                  
                                                  
                                                    if(  $page   > 1  )
                                                    {
                                                           $cal_limit=$page-1*$this->limit  + 2;
                                                           $data["query"]=$this->db->get($tb,$this->limit,$cal_limit);
                                                    }else{
                                                            $data["query"]=$this->db->get($tb,$this->limit); 
                                                    }

                                    
                                                  
                                                    // $this->load->view("home_academic",$data);     
                                                     //http://10.87.196.170/document/index.php/welcome/homepage/insert_main_academic
                                                    //  redirect("welcome/homepage/insert_main_academic",'refresh');     
                                                   $this->load->view("home_academic",$data);
                           }
                }
                
                
   
                
                public function  del_main_academic()
                {
                     if(    $this->user_model->authenlogin() == 1 )
                          {
                                   $tb="tb_main_academic";
                                   //$tbj1="tb_academic"; 
                                $id=trim($this->uri->segment(3));    
                             if( $id > 0)
                             {
                                            $this->db->where("id_main_academic",$id);
                                            $ck = $this->db->delete($tb);
                                            if( $ck )
                                            {
                                               // echo 1;
                                            }
                                            else
                                            {
                                               // echo 0;
                                            }
                             }    
                                
                                
                               redirect("welcome/homepage/insert_main_academic",'refresh');     
                                                  
                           }
                }
                
                public  function  export_excel()
                {
                     #   http://localhost/document/index.php/welcome/export_excel
                        if(    $this->user_model->authenlogin() == 1 )
                          {
                                $type_record=trim($this->uri->segment(3));
                                $type_document=trim($this->uri->segment(4));
                                
                                /*
                                if(   $type_record  == 1  &&    $type_document == 1 )
                                {
                                       $strExcelFileName="ทะเบียนหนังสือรับ.xls";
                                }
                                 else    if(   $type_record  == 1  &&    $type_document == 2 )
                                {
                                       $strExcelFileName="ทะเบียนหนังสือส่ง.xls";
                                }
                                else
                                {
                                       $strExcelFileName="ทะเบียนหนังสือ.xls";
                                }
                                */
                                
                                 $strExcelFileName="document".date("Y-m-d H:i:s O").".xls";
                              //  header("Content-Type: application/vnd.ms-excel");
                            //    header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"  ; content=\"text/html;charset=utf-8\"  ");
                                
                                
                                header("Content-type: application/vnd.ms-excel ;  name=\"$strExcelFileName\"  ; content=\"text/html;charset=utf-8\" ");
                                
                                header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
                              //  header('Content-type: text/plain; charset=utf-8');
                                header("Pragma:no-cache");
                             //   header('Content-Type: text/html; charset=UTF-8');
                                
                               // echo "<meta http-equiv=\”Content-type\” content=\”text/html;charset=tis-620\″ />";
                               
                               //<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
                                
                                
                                $tb="tb_main1";
                              //  $data["query_excel"]= $this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>$type_document));
                                 $query_excel = $this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>$type_document));
                              //  $this->load->view("export_excel",$data);
                                
                                 $size1=3;
                                 $size2=2;
                                 

                                 
                   

                                 
                                echo "<table x:str  border='1'  >";
                                echo "<tr>";
                                //TH Saraban New
                                echo "<td  align='center'   ><font face=\"TH Saraban New\" size='".$size1."'> เลข".br()
                                        . "ทะเบียนรับ  </font></td>";
                                echo "<td  align='center' ><font face=\"TH Saraban New\"  size='".$size1."'> ที่  </font></td>";
                                echo "<td  align='center' ><font face=\"TH Saraban New\" size='".$size1."'> ลงวันที่  </font></td>";
                                echo "<td align='center' ><font face=\"TH Saraban New\"  size='".$size1."' > จาก  </font></td>";
                                echo "<td  align='center' ><font face=\"TH Saraban New\" size='".$size1."' > ถึง  </font></td>";
                                echo "<td align='center' ><font face=\"TH Saraban New\" size='".$size1."' > เรื่อง  </font></td>";
                                echo "<td  align='center' ><font face=\"TH Saraban New\" size='".$size1."' > การปฏิบัติ  </font></td>";
                                echo "<td align='center' ><font face=\"TH Saraban New\" size='".$size1."' > หมายเหตุ  </font></td>";
                                echo "</tr>";
                                foreach(  $query_excel->result() as $row)
                                {
                                    echo "<tr>";
                                   
                                      echo "<td align='center'>";
                                     echo "<font face=\"TH Saraban New\"  size='".$size2."'  >";
                                      
                                      echo  $registration=$row->registration;
                                     //echo  $this->user_model->count_id($type_record,$type_document);
                                     echo " </font>";
                                     echo "</td>";
                                     
                                     
                                        echo "<td>";
                                        echo "<font face=\"TH Saraban New\" size='".$size2."'  >";
                                     echo  $at=$row->at;
                                      echo " </font>";
                                     echo "</td>";
                                     
                                           echo "<td>";
                                          echo "<font face=\"TH Saraban New\"  size='".$size2."'  >";
                                           
                                           
                                    echo   $date=$row->date;
                                     
                                     
                                     
                                     echo " </font>";
                                     echo "</td>";
                                     
                                     
                                     
                                     echo "<td>";
                                     echo "<font face=\"TH Saraban New\" size='".$size2."' >";
                                     echo  $from=$row->from;
                                      echo " </font>";
                                     echo "</td>";
                                     
                                  
                                     
                          
                                     
                                     echo "<td>";
                                    echo "<font face=\"TH Saraban New\" size='".$size2."'  >";
                                     echo  $to=$row->to;
                                    echo " </font>";
                                     echo "</td>";
                                     
                                      echo "<td>";
                                      echo "<font face=\"TH Saraban New\" size='".$size2."'  >";
                                     echo  $subject=$row->subject;
                                      echo " </font>";
                                     echo "</td>";
                                     
                                       echo "<td>";
                                     //  echo "<font face=\"TH Saraban New\" size='".$size2."'  >";
                                   //  echo  $practice=$row->practice;
                                       
                                      //  echo " </font>";
                                     echo "</td>";
                                     
                                     echo "<td>";
                                   //  echo "<font face=\"TH Saraban New\" size='".$size2."'  >";
                                  //   echo  $note=$row->note;
                                   //   echo " </font>";
                                     echo "</td>";
                                     
                                     echo "</tr>";
                                }
                                echo "</table>";
                               

                                       
                         }
                        
                        
                    
                    
                }
                
                public function delete()
                {
                        if(    $this->user_model->authenlogin() == 1 )
                          {
                               $id=$this->uri->segment(3);
                               // echo br();
                               $page=$this->uri->segment(4);
                               // echo br();
                                
                                if( $id > 0 )
                                {
                                    $tb="tb_main1";
                                    $this->db->where("id_main1",$id);
                                    $ck=$this->db->delete($tb);
                                    //$ck=true;
                                    
                                    
                                    
                                    
                                    if($ck)
                                    {
                                       // echo 1;
                                         //  redirect("welcome/homepage/insert_success_send21",'refresh');
                                          switch($page)
                                          {
                                              case 1:  //insert_success_send11
                                              {
                                                  
                                     
                                                  redirect("welcome/homepage/insert_success_send11",'refresh');
                                                  break;
                                              }
                                              case 2: //insert_success_receive21
                                              {
                                                  
                                                  
                                                    redirect("welcome/homepage/insert_success_receive21",'refresh');  
                                                   break;
                                              }
                                              case 3:  //insert_success_receive31
                                              {
                                                  
                                                  
                                                    redirect("welcome/homepage/insert_success_receive31",'refresh');    
                                                   break;
                                              }
                                              default:
                                              {
                                                  
                                              }
                                              
                                          }
                                    }
                                    else
                                    {
                                       // echo 0;
                                                   redirect("welcome/homepage/insert_success_send11",'refresh');                                        
                                    }
                                   
                                    
                                
                                    
                            
                          }
                          
                      }
                }
                
                
                public function auto()
                {
                    //http://http://192.168.2.112/document/index.php/welcome/auto 
                    // if(    $this->user_model->authenlogin() == 1 )
                         // {
                                    $tb="tb_main1";   
                                    $q=$this->db->get($tb);
                                    foreach($q->result() as $row)
                                    {
                                              $rows[]=$row;
                                    }
                                    echo  json_encode($rows);
                         //  }
                    
                }
                
                
                //---- ระบบปฏิทินกิจกรรม--------------------
                 public function calendar()
                {
                     #http://10.87.196.170/document/index.php/welcome/calendar
                      if(    $this->user_model->authenlogin() == 1 )
                         {
                          
                                   $data["title"]=$this->title;   
                                   $tb="tb_main_academic";
                                   $data["q"]=$this->db->get($tb);
                                   
                                   
                                    ?>                  
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">play_arrow</i> ตารางงานผู้บริหาร > แสดงกิจกรรมหลัก 
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php  
                       
                       
                                   $this->load->view("calendar1",$data);   
                         }
                }
                
                
                
                
                public  function  detail_calendar()  #http://10.87.196.170/document/index.php/welcome/detail_calendar
                {
                     if(    $this->user_model->authenlogin() == 1 )
                         {
                                     $tb="tb_main_academic";         
                                     $begin_date=trim($this->uri->segment(3));      
                                    //echo br();
                                     //id_academic
                                     //id_firstname_academic
                                     
                                     $tbj1="tb_academic";
                                              $this->db->join(  $tbj1  , $tb.".id_firstname_academic=".$tbj1.".id_academic"  ,  "left" );
                                    $data["date_q"]=$this->db->get_where($tb,array("begin_date"=>$begin_date));
                                    
                                    
                                    ?>                  
        <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">

                          <p>
                             <i class="material-icons left">play_arrow</i> ตารางงานผู้บริหาร > แสดงกิจกรรม
                          </p>

                        </div>



                      </div>
                    </div>
      </div>
                       <?php    
                       
                                    
                                    $this->load->view("calendar2",$data);
                                    
                          }
                }
                

                public function testauto()
                {
                     //http://192.168.2.112/document/index.php/welcome/testauto
                                              $this->load->view("testauto");
                    
                }
                
                
                  public  function   update_sick()
                 {
                       if(    $this->user_model->authenlogin() == 1 )
                                 {
                           
                                          header('Content-Type: text/html; charset=UTF-8');
                                          
                                         $id_sick=trim($this->input->get_post("id_sick"));  //id_sick
                                     // echo br();
                                          
                                          $type_person=trim($this->input->get_post("type_person"));  //ประเภทของพนักงาน
                                        // echo br();
                                          
                                           $write=trim($this->input->get_post("write"));  //เขึยนที่
                                        //  echo br();
                                          
                                           $date_write1=trim($this->input->get_post("date_write1"));  //วันที่ 
                                         // echo br();
                                          
                                             $subject=trim($this->input->get_post("subject"));  //เรื่อง   3
                                          // echo br();
                                           
                                           $study=trim($this->input->get_post("study"));  //เรียน   4
                                         // echo br();
                                          
                                          
                                          $prename=trim($this->input->get_post("prename")); //คำนำหน้าชื่อ   5
                                        //  echo br();
                                          
                                          
                                             $first_name=trim($this->input->get_post("first_name"));  //ชื่อ    6
                                         // echo br();
                                          
                                              $last_name=trim($this->input->get_post("last_name")); //นามสกุล   7
                                          //echo br();
                                          
                                            $position=trim($this->input->get_post("position"));  //ตำแหน่ง   8
                                         // echo br();
                                          
                                             $affiliation=trim($this->input->get_post("affiliation")); //สังกัด   9
                                          //echo br();
                                          
                                           $work=trim($this->input->get_post("work")); //งาน   10
                                          //echo br(); 
                                          
                                             $tel=trim($this->input->get_post("tel")); //โทร    11
                                        //  echo br(); 
                                       
                                          
                                          $cumulative=trim($this->input->get_post("cumulative")); //วันลาสะสม   12
                                       //  echo br();
                                         
                                            //--------------------------------------------------------------------------
                                          $disease=trim($this->input->get_post("disease"));    //  1=ป่วยด้วยโรค   2=จากการทำงาน   3=กิจส่วนตัว  4=คลอดบุตร
                                         //echo br();
                                         
                                          
                                          //------------- เพิ่มเติม ----------------------
                                          $sick_disease=trim($this->input->get_post("sick_disease"));  // ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน
                                          
                                          
                                         
                                        $disease_detail=trim($this->input->get_post("disease_detail"));  // สาเหตุป่วยด้วยโรค
                                        // echo br();
                                         
                                        $disease_person=trim($this->input->get_post("disease_person")); //กิจส่วนตัว เนื่องจาก
                                        // echo br();
                                          
                                         
                                          $begin_date1=trim($this->input->get_post("begin_date1"));  //ตั้งแต่วันที่ 
                                        
                                         
                                         $end_date1=trim($this->input->get_post("end_date1"));  //ถึงวันที่
                                         //echo br();
                                         
                                         //-----------------------------------------------------------------------------
                                         
                                           $count_date=trim($this->input->get_post("count_date"));  //มีกำหนด วัน
                                        // echo br();
                                         
                                         
                                         $me_leave=trim($this->input->get_post("me_leave"));  //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
                                       //  echo br(); 
                                         
                                         //----------------- ข้าพเจ้าได้ลา มีกำหนดวัน 
                                           $begin_date2=trim($this->input->get_post("begin_date2"));  //ตั้งแต่วันที่ 
                                        // echo br();
                                         
                                          $end_date2=trim($this->input->get_post("end_date2"));  //ถึงวันที่
                                        // echo br();
                                         
                                         
                                            $count_date2=trim($this->input->get_post("count_date2"));   //กำหนด วัน
                                        // echo br();
                                         //----------------------------------------------------------------------------------
                                         
                                        $house_number=trim($this->input->get_post("house_number"));  //บ้านเลขที่
                                       // echo br();
                                         
                                         
                                          $road=trim($this->input->get_post("road"));  //ถนน
                                         //echo br();
                                         
                                        $district=trim($this->input->get_post("district"));  //ตำบล
                                       
                                         
                                          $district2=trim($this->input->get_post("district2"));  //อำเภอ
                                       //  echo br();
                                         
                                           $province=trim($this->input->get_post("province"));  //จังหวัด
                                        // echo br();
                                         
                                         //-------------------------------------------------------------------------------------
                                         
                                          $tel2=trim($this->input->get_post("tel2")); //โทรศํพท์
                                        // echo br();
                                         
                                         $sign_name=trim($this->input->get_post("sign_name"));  //ขอแสดงความนับถือ  ชื่อ
                                        // echo br();
                                         
                                          $sign_lastname=trim($this->input->get_post("sign_lastname"));   //ขอแสดงความนับถือ  นามสกุล
                                       //  echo br();
                                         
                                          $sign_prename=trim($this->input->get_post("sign_prename"));  //คำนำหน้าลงท้าย ช่ื่อ  1=นาย  2=นาง  3=นางสาว
                                         //echo br();
                                         
                                       $firstname3=trim($this->input->get_post("firstname3"));  //  ลงชื่อ  ชื่อ
                                         // echo br();
                                          
                                          //-------------------------------------------------------------------------------------------------------------
                                          
                                          $lastname3=trim($this->input->get_post("lastname3"));  //  ลงชื่อ  นามสกุล
                                       //  echo br();
                                         
                                         
                                         //---------------- ป่วย------------------------
                                          $sick1=trim($this->input->get_post("sick1"));  // ป่วย  ลามาแล้ว  วันทำการ
                                       // echo br();
                                         
                                           $sick2=trim($this->input->get_post("sick2"));  // ป่วย     ลาครั้งนี้   วันทำการ
                                          //echo br();
                                          
                                           $total_sick=trim($this->input->get_post("total_sick"));  //รวมเป็น  วันทำการ
                                          //echo br();
                                          //---------------- ป่วย------------------------
                                          
                                          //----------------กิจส่วนตัว--------------------
                                           $sick_person1=trim($this->input->get_post("sick_person1"));  // ลามาแล้ว  วันทำการ
                                          //echo br();
                                          
                                          //------------------------------------------------------------------------------------------------------------------
                                          
                                          
                                          $sick_person2=trim($this->input->get_post("sick_person2")); //  ลาครั้งนี้   วันทำการ
                                         // echo br();
                                          
                                           $total_sick_person=trim($this->input->get_post("total_sick_person"));  //รวมเป็น  วันทำการ
                                          
                                          //----------------กิจส่วนตัว--------------------
                                          
                                          
                                          //----------------- คลอดบุตร---------------------
                                            $confined1=trim($this->input->get_post("confined1"));  // ลามาแล้ว  วันทำการ
                                         // echo br();
                                          
                                            $confined2=trim($this->input->get_post("confined2"));  // ลามาแล้ว  วันทำการ
                                        //  echo br();
                                          
                                            $total_confined=trim($this->input->get_post("total_confined"));  //รวมเป็น  วันทำการ
                                        //  echo br();
                                          
                                          //--------------------------------------------------------------------------------------------------------------------
                                          
                                           $inspector_name=trim($this->input->get_post("inspector_name"));  //ชื่อ ผู้ตรวจสอบ
                                        //  echo br();
                                           $inspector_lastname=trim($this->input->get_post("inspector_lastname"));   //นามสกุล ผู้ตรวจสอบ
                                         // echo br();
                                          
                                          
                                            $inspector_position=trim($this->input->get_post("inspector_position"));  //  ตำแหน่ง   ผู้ตรวจสอบ
                                        //  echo br();
                                          
                                          
                                           $date_inspector=trim($this->input->get_post("date_inspector"));  //  วัน เดือน ปี   ผู้ตรวจสอบ 
                                       //   echo br();
                                          
                                          
                                          //-------------ความเห็นของผู้บังคับบัญชาชั้นต้น (โปรดระบุ ข้อ ก และ ข้อ ข)
                                           $supervisor_sick=trim($this->input->get_post("supervisor_sick"));  // 1=เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน     2=ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน   
                                          //echo br(); 
                                          
                                          //--------------------------------------------------------------------------------------------------------------------
                                          
                                           $supervisor_agree=trim($this->input->get_post("supervisor_agree"));  //1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                                        //  echo br();    
                                          
                                          
                                           $first_name2=trim($this->input->get_post("first_name2"));  //ลงชื่อ  ความเห็นของผู้บังคับบัญชา
                                        //  echo br();    
                                          
                                            $last_name2=trim($this->input->get_post("last_name2"));   //ลงชื่อ  นามสกุล ผู้บังคับบัญชา
                                        //  echo br();   
                                          
                                            $postion2=trim($this->input->get_post("postion2"));  //ตำแหน่ง ผู้บังคับบัญชา
                                         //  echo br();  
                                           
                                            $commander_date=trim($this->input->get_post("commander_date"));  //วัน เดือน ปี   ความเห็นของผู้บังคับบัญชาชั้นต้น
                                         //  echo br();  
                                           
                                           //--------------------------------------------------------------------------------------------------------------------
                                           
                                           
                                           $manager_allow=trim($this->input->get_post("manager_allow"));   // คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                                       //    echo  br();
                                           
                                            $first_name3=trim($this->input->get_post("first_name3"));   //ลงชื่อ  คำสั่งผู้บริหาร
                                          // echo  br();
                                           
                                            $last_name3=trim($this->input->get_post("last_name3"));  //ลงชื่อ นามสกุล
                                          // echo  br();
                                           
                                             $manager_position=trim($this->input->get_post("manager_position")); //ตำแหน่ง
                                         //  echo  br();
                                           
                                            $date_manager=trim($this->input->get_post("date_manager"));  //วัน เดือน ปี คำสั่งผู้บริหาร
                                          // echo  br();

                                           
                                              //  id_sick    1
                                           $data=array(
                                                 "type_person"=>$type_person,   //ประเภทของพนักงาน        2
                                                 "write"=> $write    , //เขึยนที่                                        3
                                                 "date_write1"=>$date_write1,    //วันที่                   4
                                                 "subject"=>$subject,  //เรื่อง   3                             5
                                                 "study"=>$study,     //เรียน   4 
                                                  "prename"=>$prename,   //คำนำหน้าชื่อ   5
                                                 "first_name"=> $first_name,  //ชื่อ    6
                                                "last_name"=>$last_name,   //นามสกุล   7
                                                  "position"=>  $position,   //ตำแหน่ง   8
                                                 "affiliation"=>$affiliation, //สังกัด   9
                                                  "work"=>$work,  //งาน   10
                                                  "tel"=>$tel,  //โทร    11     
                                                 "disease"=>$disease,   //  1=ป่วยด้วยโรค   2=จากการทำงาน   3=กิจส่วนตัว  4=คลอดบุตร                                        13
                                                 "disease_detail"=>$disease_detail, // สาเหตุป่วยด้วยโรค                                          
                                                 "disease_person"=> $disease_person,//กิจส่วนตัว เนื่องจาก
                                                 "begin_date1"=> $begin_date1, //ตั้งแต่วันที่ 
                                                 "end_date1"=>$end_date1, //ถึงวันที่
                                                 "count_date"=> $count_date,   //มีกำหนด วัน
                                                 "me_leave"=>$me_leave,  //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
                                                 
                                                  //     "cumulative"=>$cumulative, //วันลาสะสม   12

                                                    "begin_date2"=> $begin_date2,  //ตั้งแต่วันที่ 
                                                    "end_date2"=>$end_date2,   //ถึงวันที่
                                                   "count_date2"=> $count_date2,  //กำหนด วัน
                                                   
                                                   
                                                   "house_number"=>$house_number, //บ้านเลขที่
                                                    "road"=> $road, //ถนน
                                                    "district"=> $district,  //ตำบล
                                                    "district2"=> $district2, //อำเภอ
                                                    "province"=> $province, //จังหวัด
                                                    "tel2"=> $tel2, //โทรศํพท์
                                                    "sign_name"=>$sign_name,  //ขอแสดงความนับถือ  ชื่อ
                                                    "sign_lastname"=>  $sign_lastname,  //ขอแสดงความนับถือ  นามสกุล
                                                    "sign_prename"=> $sign_prename, //คำนำหน้าลงท้าย ช่ื่อ  1=นาย  2=นาง  3=นางสาว
                                                    "firstname3"=>$firstname3, //  ลงชื่อ  ชื่อ
                                                    "lastname3"=> $lastname3, //  ลงชื่อ  นามสกุล
                                                     "sick1"=>$sick1, // ป่วย  ลามาแล้ว  วันทำการ
                                                     "sick2"=>$sick2, // ป่วย     ลาครั้งนี้   วันทำการ
                                                     "total_sick"=> $total_sick, //รวมเป็น  วันทำการ
                                                     "sick_person1"=> $sick_person1,  // ลามาแล้ว  วันทำการ
                                                     "sick_person2"=>$sick_person2,//  ลาครั้งนี้   วันทำการ
                                                     "total_sick_person"=> $total_sick_person, //รวมเป็น  วันทำการ
                                                     "confined1"=> $confined1, // ลามาแล้ว  วันทำการ
                                                      "confined2"=> $confined2, // ลามาแล้ว  วันทำการ
                                                      "total_confined"=>  $total_confined, //รวมเป็น  วันทำการ
                                                     "inspector_name"=>$inspector_name,//ชื่อ ผู้ตรวจสอบ
                                                    "inspector_lastname"=>  $inspector_lastname,  //นามสกุล ผู้ตรวจสอบ
                                                    "inspector_position"=>  $inspector_position, //  ตำแหน่ง   ผู้ตรวจสอบ
                                                   "date_inspector"=>$date_inspector, //  วัน เดือน ปี   ผู้ตรวจสอบ 
                                                    "supervisor_sick"=> $supervisor_sick, // 1=เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน     2=ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน  
                                                    "supervisor_agree"=>$supervisor_agree, //1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                                                    "first_name2"=> $first_name2,//ลงชื่อ  ความเห็นของผู้บังคับบัญชา
                                                    "last_name2"=>$last_name2,   //ลงชื่อ  นามสกุล ผู้บังคับบัญชา
                                                    "postion2"=>$postion2,   //ตำแหน่ง ผู้บังคับบัญชา
                                                    "commander_date"=>$commander_date,  //วัน เดือน ปี   ความเห็นของผู้บังคับบัญชาชั้นต้น
                                                    "manager_allow"=>$manager_allow,    // คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                                                    "first_name3"=>$first_name3,  //ลงชื่อ  คำสั่งผู้บริหาร
                                                   "last_name3"=> $last_name3,  //ลงชื่อ นามสกุล
                                                    "manager_position"=> $manager_position,   //ตำแหน่ง
                                                    "date_manager"=>$date_manager,  //วัน เดือน ปี คำสั่งผู้บริหาร
                                               
                                                    "sick_disease"=>$sick_disease        //   $sick_disease=trim($this->input->get_post("sick_disease"));  // ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน
                                               
                                           );
                                           
                                           
                                             $tb="tb_sick";
                                             
                                             $this->db->where("id_sick",$id_sick);
                                             $ck=$this->db->update($tb,$data);

                                             if( $ck )
                                             {
                                                 echo 1;
                                             }
                                             else{
                                                 echo 0;
                                             }
                                            
                                          
                                  }
                 }
                
                  public  function  load_update_sick()  // load form update vacation
                {
                     if(    $this->user_model->authenlogin() == 1 )
                         {
                                  $id_sick=trim($this->uri->segment(3));
                               if( $id_sick > 0 )
                               {
                                       $tb="tb_sick";
                                       header('Content-Type: text/html; charset=UTF-8');
                                       $q=$this->db->get_where($tb,array("id_sick"=>$id_sick));
                                       $row=$q->row();
                                       
                                       $data["id_sick"]=$row->id_sick;
                                       $data["type_person"]=$row->type_person;
                                       $data["write"]=$row->write;  //เขึยนที่
                                       $data["subject"]=$row->subject;   //เรื่อง   3
                                       $data["date_write1"]=$row->date_write1;  
                                       $data["study"]=$row->study;   //เรียน   4
                                       $data["prename"]=$row->prename; //คำนำหน้าชื่อ   5
                                       $data["first_name"]=$row->first_name; //ชื่อ    6        
                                       $data["last_name"]=$row->last_name;   //นามสกุล   7
                                       $data["position"]=$row->position;  //ตำแหน่ง   8
                                     
                                       $data["affiliation"]=$row->affiliation; //สังกัด   9
                                          //echo br();
                                        $data["work"]=$row->work; //งาน   10
                                          //echo br(); 
                                       $data["tel"]=$row->tel; //โทร    11
                                        //  echo br(); 
                                      $data["cumulative"]=$row->cumulative;  //วันลาสะสม   12
                                       //  echo br();
                                             
                                             
                                       $data["disease"]=$row->disease;    //  1=ป่วยด้วยโรค   2=จากการทำงาน   3=กิจส่วนตัว  4=คลอดบุตร
                                         //echo br();
                                       
                                       $data["disease_detail"]=$row->disease_detail;
                                       
                                      
                                       $data["sick_disease"]=$row->sick_disease;  // ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน
                                       
                                       
                                       $data["disease_person"]=$row->disease_person;
                                       
                                  
                                       $data["begin_date1"]=$row->begin_date1;
                                       
                                       
                                         $data["end_date1"]=$row->end_date1;
                                         
                                         $data["count_date"]=$row->count_date;
                                         
                                         $data["me_leave"]=$row->me_leave;
                                         
                                         $data["begin_date2"]=$row->begin_date2;
                                         
                                         $data["end_date2"]=$row->end_date2;
                                         
                                         
                                         $data["count_date2"]=$row->count_date2;
                                         
                                         
                                         $data["house_number"]=$row->house_number;
                                         
                                         
                                         $data["road"]=$row->road;
                                         
                                         
                                         $data["district"]=$row->district;
                                         
                                         
                                         $data["district2"]=$row->district2;
                                         
                                         
                                         $data["province"]=$row->province;
                                         
                                         
                                         $data["tel2"]=$row->tel2;
                                         
                                         
                                         $data["sign_name"]=$row->sign_name;
                                         
                                         
                                          $data["sign_lastname"]=$row->sign_lastname;
                                          
                                          
                                           $data["sign_prename"]=$row->sign_prename;
                                           
                                           
                                           $data["firstname3"]=$row->firstname3;
                                           
                                           
                                           $data["lastname3"]=$row->lastname3;
                                           
                                            $data["sick1"]=$row->sick1;
                                            
                                            $data["sick2"]=$row->sick2;
                                            
                                            $data["total_sick"]=$row->total_sick;
                                            
                                            $data["sick_person1"]=$row->sick_person1;
                                            
                                             $data["sick_person2"]=$row->sick_person2;
                                             
                                             $data["total_sick_person"]=$row->total_sick_person;
                                             
                                             $data["confined1"]=$row->confined1;
                                             
                                             $data["confined2"]=$row->confined2;
                                             
                                             $data["total_confined"]=$row->total_confined;
                                             
                                             
                                             $data["supervisor_sick"]=$row->supervisor_sick;
                                             
                                             
                                             $data["inspector_name"]=$row->inspector_name;
                                             
                                             
                                             $data["supervisor_agree"]=$row->supervisor_agree;
                                             
                                             
                                             $data["inspector_name"]=$row->inspector_name;
                                             
                                             $data["inspector_lastname"]=$row->inspector_lastname;
                                             
                                             $data["inspector_position"]=$row->inspector_position;
                                             
                                             $data["date_inspector"]=$row->date_inspector;
                                             
                                             $data["first_name2"]=$row->first_name2;
                                             
                                             $data["last_name2"]=$row->last_name2;
                                       
                                              $data["postion2"]=$row->postion2;
                                              
                                              $data["commander_date"]=$row->commander_date;
                                              
                                              
                                               $data["manager_allow"]=$row->manager_allow;
                                               
                                               $data["first_name3"]=$row->first_name3;
                                               
                                               $data["last_name3"]=$row->last_name3;
                                               
                                               $data["manager_position"]=$row->manager_position;
                                               
                                               $data["date_manager"]=$row->date_manager;
                                               
                                              
                                       
                                       $this->load->view("form_update_sick",$data);
                                       
                                       
                                       /*
                                          


                                    
                                         
                                            //--------------------------------------------------------------------------
                                     
                                         
                                          
                                          //------------- เพิ่มเติม ----------------------
                                        
                                          
                                          
                                         
                                        $disease_detail=trim($this->input->get_post("disease_detail"));  // สาเหตุป่วยด้วยโรค
                                        // echo br();
                                         
                                        $disease_person=trim($this->input->get_post("disease_person")); //กิจส่วนตัว เนื่องจาก
                                        // echo br();
                                          
                                         
                                          $begin_date1=trim($this->input->get_post("begin_date1"));  //ตั้งแต่วันที่ 
                                        
                                         
                                         $end_date1=trim($this->input->get_post("end_date1"));  //ถึงวันที่
                                         //echo br();
                                         
                                         //-----------------------------------------------------------------------------
                                         
                                           $count_date=trim($this->input->get_post("count_date"));  //มีกำหนด วัน
                                        // echo br();
                                         
                                         
                                         $me_leave=trim($this->input->get_post("me_leave"));  //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
                                       //  echo br(); 
                                         
                                         //----------------- ข้าพเจ้าได้ลา มีกำหนดวัน 
                                           $begin_date2=trim($this->input->get_post("begin_date2"));  //ตั้งแต่วันที่ 
                                        // echo br();
                                         
                                          $end_date2=trim($this->input->get_post("end_date2"));  //ถึงวันที่
                                        // echo br();
                                         
                                         
                                            $count_date2=trim($this->input->get_post("count_date2"));   //กำหนด วัน
                                        // echo br();
                                         //----------------------------------------------------------------------------------
                                         
                                        $house_number=trim($this->input->get_post("house_number"));  //บ้านเลขที่
                                       // echo br();
                                         
                                         
                                          $road=trim($this->input->get_post("road"));  //ถนน
                                         //echo br();
                                         
                                        $district=trim($this->input->get_post("district"));  //ตำบล
                                       
                                         
                                          $district2=trim($this->input->get_post("district2"));  //อำเภอ
                                       //  echo br();
                                         
                                           $province=trim($this->input->get_post("province"));  //จังหวัด
                                        // echo br();
                                         
                                         //-------------------------------------------------------------------------------------
                                         
                                          $tel2=trim($this->input->get_post("tel2")); //โทรศํพท์
                                        // echo br();
                                         
                                         $sign_name=trim($this->input->get_post("sign_name"));  //ขอแสดงความนับถือ  ชื่อ
                                        // echo br();
                                         
                                          $sign_lastname=trim($this->input->get_post("sign_lastname"));   //ขอแสดงความนับถือ  นามสกุล
                                       //  echo br();
                                         
                                          $sign_prename=trim($this->input->get_post("sign_prename"));  //คำนำหน้าลงท้าย ช่ื่อ  1=นาย  2=นาง  3=นางสาว
                                         //echo br();
                                         
                                       $firstname3=trim($this->input->get_post("firstname3"));  //  ลงชื่อ  ชื่อ
                                         // echo br();
                                          
                                          //-------------------------------------------------------------------------------------------------------------
                                          
                                          $lastname3=trim($this->input->get_post("lastname3"));  //  ลงชื่อ  นามสกุล
                                       //  echo br();
                                         
                                         
                                         //---------------- ป่วย------------------------
                                          $sick1=trim($this->input->get_post("sick1"));  // ป่วย  ลามาแล้ว  วันทำการ
                                       // echo br();
                                         
                                           $sick2=trim($this->input->get_post("sick2"));  // ป่วย     ลาครั้งนี้   วันทำการ
                                          //echo br();
                                          
                                           $total_sick=trim($this->input->get_post("total_sick"));  //รวมเป็น  วันทำการ
                                          //echo br();
                                          //---------------- ป่วย------------------------
                                          
                                          //----------------กิจส่วนตัว--------------------
                                           $sick_person1=trim($this->input->get_post("sick_person1"));  // ลามาแล้ว  วันทำการ
                                          //echo br();
                                          
                                          //------------------------------------------------------------------------------------------------------------------
                                          
                                          
                                          $sick_person2=trim($this->input->get_post("sick_person2")); //  ลาครั้งนี้   วันทำการ
                                         // echo br();
                                          
                                           $total_sick_person=trim($this->input->get_post("total_sick_person"));  //รวมเป็น  วันทำการ
                                          
                                          //----------------กิจส่วนตัว--------------------
                                          
                                          
                                          //----------------- คลอดบุตร---------------------
                                            $confined1=trim($this->input->get_post("confined1"));  // ลามาแล้ว  วันทำการ
                                         // echo br();
                                          
                                            $confined2=trim($this->input->get_post("confined2"));  // ลามาแล้ว  วันทำการ
                                        //  echo br();
                                          
                                            $total_confined=trim($this->input->get_post("total_confined"));  //รวมเป็น  วันทำการ
                                        //  echo br();
                                          
                                          //--------------------------------------------------------------------------------------------------------------------
                                          
                                           $inspector_name=trim($this->input->get_post("inspector_name"));  //ชื่อ ผู้ตรวจสอบ
                                        //  echo br();
                                           $inspector_lastname=trim($this->input->get_post("inspector_lastname"));   //นามสกุล ผู้ตรวจสอบ
                                         // echo br();
                                          
                                          
                                            $inspector_position=trim($this->input->get_post("inspector_position"));  //  ตำแหน่ง   ผู้ตรวจสอบ
                                        //  echo br();
                                          
                                          
                                           $date_inspector=trim($this->input->get_post("date_inspector"));  //  วัน เดือน ปี   ผู้ตรวจสอบ 
                                       //   echo br();
                                          
                                          
                                          //-------------ความเห็นของผู้บังคับบัญชาชั้นต้น (โปรดระบุ ข้อ ก และ ข้อ ข)
                                           $supervisor_sick=trim($this->input->get_post("supervisor_sick"));  // 1=เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน     2=ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน   
                                          //echo br(); 
                                          
                                          //--------------------------------------------------------------------------------------------------------------------
                                          
                                           $supervisor_agree=trim($this->input->get_post("supervisor_agree"));  //1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                                        //  echo br();    
                                          
                                          
                                           $first_name2=trim($this->input->get_post("first_name2"));  //ลงชื่อ  ความเห็นของผู้บังคับบัญชา
                                        //  echo br();    
                                          
                                            $last_name2=trim($this->input->get_post("last_name2"));   //ลงชื่อ  นามสกุล ผู้บังคับบัญชา
                                        //  echo br();   
                                          
                                            $postion2=trim($this->input->get_post("postion2"));  //ตำแหน่ง ผู้บังคับบัญชา
                                         //  echo br();  
                                           
                                            $commander_date=trim($this->input->get_post("commander_date"));  //วัน เดือน ปี   ความเห็นของผู้บังคับบัญชาชั้นต้น
                                         //  echo br();  
                                           
                                           //--------------------------------------------------------------------------------------------------------------------
                                           
                                           
                                           $manager_allow=trim($this->input->get_post("manager_allow"));   // คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                                       //    echo  br();
                                           
                                            $first_name3=trim($this->input->get_post("first_name3"));   //ลงชื่อ  คำสั่งผู้บริหาร
                                          // echo  br();
                                           
                                            $last_name3=trim($this->input->get_post("last_name3"));  //ลงชื่อ นามสกุล
                                          // echo  br();
                                           
                                             $manager_position=trim($this->input->get_post("manager_position")); //ตำแหน่ง
                                         //  echo  br();
                                           
                                            $date_manager=trim($this->input->get_post("date_manager"));  //วัน เดือน ปี คำสั่งผู้บริหาร
                                          // echo  br();

                                           
                                              //  id_sick    1
                                           $data=array(
                                                 "type_person"=>$type_person,   //ประเภทของพนักงาน        2
                                                 "write"=> $write    , //เขึยนที่                                        3
                                                 "date_write1"=>$date_write1,    //วันที่                   4
                                                 "subject"=>$subject,  //เรื่อง   3                             5
                                                 "study"=>$study,     //เรียน   4 
                                                  "prename"=>$prename,   //คำนำหน้าชื่อ   5
                                                 "first_name"=> $first_name,  //ชื่อ    6
                                                "last_name"=>$last_name,   //นามสกุล   7
                                                  "position"=>  $position,   //ตำแหน่ง   8
                                                 "affiliation"=>$affiliation, //สังกัด   9
                                                  "work"=>$work,  //งาน   10
                                                  "tel"=>$tel,  //โทร    11     
                                                 "disease"=>$disease,   //  1=ป่วยด้วยโรค   2=จากการทำงาน   3=กิจส่วนตัว  4=คลอดบุตร                                        13
                                                 "disease_detail"=>$disease_detail, // สาเหตุป่วยด้วยโรค                                          
                                                 "disease_person"=> $disease_person,//กิจส่วนตัว เนื่องจาก
                                                 "begin_date1"=> $begin_date1, //ตั้งแต่วันที่ 
                                                 "end_date1"=>$end_date1, //ถึงวันที่
                                                 "count_date"=> $count_date,   //มีกำหนด วัน
                                                 "me_leave"=>$me_leave,  //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
                                                 
                                                  //     "cumulative"=>$cumulative, //วันลาสะสม   12

                                                    "begin_date2"=> $begin_date2,  //ตั้งแต่วันที่ 
                                                    "end_date2"=>$end_date2,   //ถึงวันที่
                                                   "count_date2"=> $count_date2,  //กำหนด วัน
                                                   
                                                   
                                                   "house_number"=>$house_number, //บ้านเลขที่
                                                    "road"=> $road, //ถนน
                                                    "district"=> $district,  //ตำบล
                                                    "district2"=> $district2, //อำเภอ
                                                    "province"=> $province, //จังหวัด
                                                    "tel2"=> $tel2, //โทรศํพท์
                                                    "sign_name"=>$sign_name,  //ขอแสดงความนับถือ  ชื่อ
                                                    "sign_lastname"=>  $sign_lastname,  //ขอแสดงความนับถือ  นามสกุล
                                                    "sign_prename"=> $sign_prename, //คำนำหน้าลงท้าย ช่ื่อ  1=นาย  2=นาง  3=นางสาว
                                                    "firstname3"=>$firstname3, //  ลงชื่อ  ชื่อ
                                                    "lastname3"=> $lastname3, //  ลงชื่อ  นามสกุล
                                                     "sick1"=>$sick1, // ป่วย  ลามาแล้ว  วันทำการ
                                                     "sick2"=>$sick2, // ป่วย     ลาครั้งนี้   วันทำการ
                                                     "total_sick"=> $total_sick, //รวมเป็น  วันทำการ
                                                     "sick_person1"=> $sick_person1,  // ลามาแล้ว  วันทำการ
                                                     "sick_person2"=>$sick_person2,//  ลาครั้งนี้   วันทำการ
                                                     "total_sick_person"=> $total_sick_person, //รวมเป็น  วันทำการ
                                                     "confined1"=> $confined1, // ลามาแล้ว  วันทำการ
                                                      "confined2"=> $confined2, // ลามาแล้ว  วันทำการ
                                                      "total_confined"=>  $total_confined, //รวมเป็น  วันทำการ
                                                     "inspector_name"=>$inspector_name,//ชื่อ ผู้ตรวจสอบ
                                                    "inspector_lastname"=>  $inspector_lastname,  //นามสกุล ผู้ตรวจสอบ
                                                    "inspector_position"=>  $inspector_position, //  ตำแหน่ง   ผู้ตรวจสอบ
                                                   "date_inspector"=>$date_inspector, //  วัน เดือน ปี   ผู้ตรวจสอบ 
                                                    "supervisor_sick"=> $supervisor_sick, // 1=เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน     2=ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน  
                                                    "supervisor_agree"=>$supervisor_agree, //1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                                                    "first_name2"=> $first_name2,//ลงชื่อ  ความเห็นของผู้บังคับบัญชา
                                                    "last_name2"=>$last_name2,   //ลงชื่อ  นามสกุล ผู้บังคับบัญชา
                                                    "postion2"=>$postion2,   //ตำแหน่ง ผู้บังคับบัญชา
                                                    "commander_date"=>$commander_date,  //วัน เดือน ปี   ความเห็นของผู้บังคับบัญชาชั้นต้น
                                                    "manager_allow"=>$manager_allow,    // คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                                                    "first_name3"=>$first_name3,  //ลงชื่อ  คำสั่งผู้บริหาร
                                                   "last_name3"=> $last_name3,  //ลงชื่อ นามสกุล
                                                    "manager_position"=> $manager_position,   //ตำแหน่ง
                                                    "date_manager"=>$date_manager,  //วัน เดือน ปี คำสั่งผู้บริหาร
                                               
                                                    "sick_disease"=>$sick_disease        //   $sick_disease=trim($this->input->get_post("sick_disease"));  // ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน
                                               
                                           );
                                           
                                        */
                                       
                                       
                               }
                          }
                }
                
                public  function  load_update_vacation()  // load form update vacation
                {
                     if(    $this->user_model->authenlogin() == 1 )
                         {
                               //echo "T";
                                                $id_vacation=trim($this->uri->segment(3));
                                             // echo br();
                                              $data["id_vacation"]=trim($this->uri->segment(3));
                                              
                                               $tb="tb_vacation";
                                               $q=$this->db->get_where($tb,array("id_vacation"=> $id_vacation ));    
                                               $num=$q->num_rows();
                                               if($num > 0 )
                                                {
                                                       $row=$q->row();
                                                       $data["write"]=$row->write;   //เขียนที่    1
                                                       $data["date_write"]=$row->date_write;    //วันเดือนปี ที่เขียน   2 
                                                       $data["subject"]=$row->subject;    //เรื่อง   3
                                                       $data["study"]=$row->study;  //เรียน   4
                                                       $data["prename"]=$row->prename;   //คำนำหน้าชื่อ   5
                                                       $data["first_name"]=$row->first_name;    //ชื่อ    6
                                                       $data["last_name"]=$row->last_name;   //นามสกุล   7
                                                       $data["position"]=$row->position;   //ตำแหน่ง   8
                                                       $data["affiliation"]=$row->affiliation;   //สังกัด   9
                                                       $data["work"]=$row->work;     //งาน   10
                                                       $data["tel"]  =$row->tel;    //โทร    11
                                                       $data["cumulative"]=$row->cumulative; //วันลาสะสม   12
                                                       $data["rest"]=$row->rest; //วันลาที่เหลืออยู่      13
                                                       $data["total"]=$row->total;  //รวมวันลาเป็น      14    
                                                       $data["current"]=$row->current;  //ในปีนี้ลามาแล้ว     15
                                                       $data["keep"]=$row->keep;  //คงเหลือวันลาอีก      16
                                                       $data["wishes"]=$row->wishes;  //มีความประสงค์จะขอลาพักผ่อนมีกำหนด    17
                                                       $data["date_begin"]=$row->date_begin;  //ขอลาพักผ่อนตั้งแต่วันที่        18
                                                       $data["end_date"]=$row->end_date;  //ขอลาพักผ่อน ถึงวันที่        19
                                                       $data["house_number"]=$row->house_number;  //บ้านเลขที่        20
                                                       $data["road"]=$row->road;  //ถนน        21
                                                       $data["district"]=$row->district; //ตำบล        22
                                                       $data["city"]=$row->city;  //อำเภอ         23
                                                       $data["province"]=$row->province;  //จังหวัด        24
                                                       $data["tel_address"]=$row->tel_address; //โทรศํพท์  เบอร์โทรศํพท์หลังจากจังหวัด      25
                                            
                                                       $data["leave"]=$row->leave;  //ลามาแล้ว       26
                                             
                                                       $data["leave_thistime"]=$row->leave_thistime;  //ลาครั้งนี้ วันทำการ      27
                                              
                                                       $data["date_total_leave"]=$row->date_total_leave;  //รวมเป็น วันทำการ       28
                                            
                                                       
                                                       $data["sign"]=$row->sign;  //ลงชื่อขอแสดงความนับถือ       29
                                           
                                                           
                                                      $data["presign"]=$row->presign;  //คำนำหน้าชื่อ  ขอแสดงความนับถือ         30
                                              // echo  br(); 
                                                                   
                                                         
                                                      $data["name_sign"]=$row->name_sign;  //
                                                      
                                                      $data["lastname_sign"]=$row->lastname_sign;
                                                      
                                                      
                                                      $data["allowed"]=$row->allowed;
                                                      
                                                      
                                                      $data["name_inspector"]=$row->name_inspector;
                                                      
                                                      
                                                      $data["lastname_inspector"]=$row->lastname_inspector;
                                                      
                                                      $data["position_inspector"]=$row->position_inspector;
                                                      
                                                      
                                                      $data["date_inspector"]=$row->date_inspector;
                                                      
                                                      
                                                      $data["name_commander"]=$row->name_commander;
                                                      
                                                      
                                                      $data["lastname_commander"]=$row->lastname_commander;
                                                      
                                                      $data["position_commander"]=$row->position_commander;
                                                      
                                                      $data["date_commander"]=$row->date_commander;
                                                      
                                                      $data["allow_manager"]=$row->allow_manager;
                                                      
                                                      $data["first_name2"]=$row->first_name2;
                                                      
                                                      $data["last_name2"]=$row->last_name2;
                                                      
                                                      $data["last_position"]=$row->last_position;
                                                      
                                                     $data["last_date"]=$row->last_date;
                                                      
                                                          
                                                       $this->load->view("form_update_vacation",$data);
                                                }
                                              
   
                         }
                    
                }
                
                public  function  update_vacation()
                {
                     if(    $this->user_model->authenlogin() == 1 )
                         {
                                 header('Content-Type: text/html; charset=UTF-8');
                                // $id_vacation=trim($this->input->get_post("id_vacation"));      
                                 //echo br();
                                              $tb="tb_vacation";

                                             $id_vacation=trim($this->input->get_post("id_vacation"));
                                       //  echo br();
                                              
                                               $write=trim($this->input->get_post("write"));  //เขียนที่    1
                                           //   echo br();
                                               $date_write=trim($this->input->get_post("date_write"));  //วันเดือนปี ที่เขียน   2
                                            //  echo br();
                                              $subject=trim($this->input->get_post("subject"));  //เรื่อง   3
                                          //    echo br();
                                              $study=trim($this->input->get_post("study"));  //เรียน   4
                                            //  echo br();
                                               $prename=trim($this->input->get_post("prename")); //คำนำหน้าชื่อ   5
                                             //  echo br();
                                               $first_name=trim($this->input->get_post("first_name"));  //ชื่อ    6
                                            //  echo br();
                                               $last_name=trim($this->input->get_post("last_name")); //นามสกุล   7
                                             // echo br();
                                              $position=trim($this->input->get_post("position"));  //ตำแหน่ง   8
                                            //  echo br(); 
                                              $affiliation=trim($this->input->get_post("affiliation")); //สังกัด   9
                                             // echo br();
                                              $work=trim($this->input->get_post("work")); //งาน   10
                                            //  echo br();
                                              $tel=trim($this->input->get_post("tel")); //โทร    11
                                           //   echo br();
                                              $cumulative=trim($this->input->get_post("cumulative")); //วันลาสะสม   12
                                             // echo br();
                                               $rest=trim($this->input->get_post('rest')); //วันลาที่เหลืออยู่      13
                                            //  echo  br();
                                              $total=trim($this->input->get_post('total'));  //รวมวันลาเป็น      14
                                           //   echo  br();
                                               $current=trim($this->input->get_post("current"));  //ในปีนี้ลามาแล้ว     15
                                              // echo  br();
                                               $keep=trim($this->input->get_post("keep"));  //คงเหลือวันลาอีก      16
                                             //  echo  br();
                                               $wishes=trim($this->input->get_post("wishes"));  //มีความประสงค์จะขอลาพักผ่อนมีกำหนด    17
                                              // echo  br(); 
                                                $date_begin=trim($this->input->get_post("date_begin"));  //ขอลาพักผ่อนตั้งแต่วันที่        18
                                            //  echo  br();
                                               $end_date=trim($this->input->get_post("end_date"));  //ขอลาพักผ่อน ถึงวันที่        19
                                           //   echo  br();
                                              $house_number=trim($this->input->get_post("house_number"));  //บ้านเลขที่        20
                                             // echo  br();
                                              $road=trim($this->input->get_post("road"));  //ถนน        21
                                             //  echo  br();
                                                $district=trim($this->input->get_post("district")); //ตำบล        22
                                              // echo  br();
                                                $city=trim($this->input->get_post("city"));  //อำเภอ         23
                                              // echo  br();
                                               $province=trim($this->input->get_post("province"));  //จังหวัด        24
                                              // echo  br();
                                                $tel_address=trim($this->input->get_post("tel_address")); //โทรศํพท์  เบอร์โทรศํพท์หลังจากจังหวัด      25
                                              // echo  br();
                                                 $leave=trim($this->input->get_post("leave"));  //ลามาแล้ว       26
                                               //echo  br();
                                                 $leave_thistime=trim($this->input->get_post("leave_thistime"));  //ลาครั้งนี้ วันทำการ      27
                                               //echo  br(); 
                                                 $date_total_leave=trim($this->input->get_post("date_total_leave"));  //รวมเป็น วันทำการ       28
                                              // echo  br(); 
                                                 $sign=trim($this->input->get_post("sign"));  //ลงชื่อขอแสดงความนับถือ       29
                                               //echo  br(); 
                                                $presign=trim($this->input->get_post("presign"));  //คำนำหน้าชื่อ  ขอแสดงความนับถือ         30
                                              // echo  br(); 
                                                 $name_sign=trim($this->input->get_post("name_sign"));    //ชื่อ ขอแสดงความนับถือ       31
                                               // echo  br(); 
                                                $lastname_sign=trim($this->input->get_post("lastname_sign"));  //นามสกุล  ขอแสดงความนับถือ      32
                                               // echo  br(); 
                                                $allowed=trim($this->input->get_post("allowed"));  //เห็นควรอนุญาตหรือไม่        33
                                               // echo  br(); 
                                                 $name_inspector=trim($this->input->get_post("name_inspector"));  //ลงชื่อผู้ตรวจสอบ        34
                                                // echo  br(); 
                                                  $lastname_inspector=trim($this->input->get_post("lastname_inspector"));  //นามสกุลผู้ตรวจสอบ     35
                                                // echo  br(); 
                                                  $name_commander=trim($this->input->get_post("name_commander"));  //ชื่อผู้บังคับบั้ญชา     36
                                                // echo br();
                                                  $lastname_commander=trim($this->input->get_post("lastname_commander"));  //นามสกุลผู้บังคับบัญชา     37
                                                // echo br();
                                                  $position_inspector=trim($this->input->get_post("position_inspector")); //ตำแหน่งผู้ตรวจสอบ      38
                                                // echo br();
                                                  $position_commander=trim($this->input->get_post("position_commander"));  //ตำแหน่งของผู้บังคับบัญชา     39
                                                //echo br();
                                                 $date_inspector=trim($this->input->get_post("date_inspector"));  //วันที่ ผู้ตรวจสอบ     40
                                               // echo br();
                                                  $date_commander=trim($this->input->get_post("date_commander"));  //วันที่ผู้บังคับบัญชา     41
                                                //echo br();
                                                 $allow_manager=trim($this->input->get_post("allow_manager"));  //ผู้บริหาร อนุญาตหรือไม่      42
                                               //echo br();
                                                $first_name2=trim($this->input->get_post("first_name2"));  //ลงชื่อ     43
                                               // echo br();
                                                 $last_name2=trim($this->input->get_post("last_name2"));  //นามสกุล     44
                                                //echo br();
                                                $last_position=trim($this->input->get_post("last_position"));  //ตำแหน่ง      45
                                               // echo br();
                                                  $last_date=trim($this->input->get_post("last_date"));      //   46
                                               // echo br();
                                                
                                                 $type_person=trim($this->input->get_post("type_person"));
                                                 
                                                 
                                                 
                                                 
                                                  $data=array(
                                                            "write"=>$write,   //1
                                                            "date_write"=>$date_write,   //2
                                                            "subject"=>$subject,    //3
                                                            "study"=>$study,   //4
                                                            "prename"=>$prename,   //5
                                                            "first_name"=>$first_name,    //6
                                                            "last_name"  =>$last_name,    //7
                                                             "position"=> $position,     //8
                                                             "affiliation"=> $affiliation,     //9
                                                              "work"=>$work,    //10
                                                              "tel"=>$tel,    //11
                                                              "cumulative"=>$cumulative,
                                                             "rest"=>$rest,    
                                                             "total"=> $total,     
                                                            "current"=>$current,
                                                            "keep"=>$keep,
                                                            "wishes"=>$wishes,
                                                            "date_begin"=>$date_begin,
                                                            "end_date"=>$end_date,
                                                            "house_number"=>$house_number,
                                                            "road"=>$road,
                                                            "district"=>$district,
                                                            "city"=>$city,
                                                            "province"=>$province,
                                                             "tel_address"=>$tel_address,
                                                              "leave"=>$leave,    //12
                                                             "leave_thistime"=>$leave_thistime,     //13
                                                             "date_total_leave"=>$date_total_leave,     //14
                                                             "sign"=> $sign,     //15
                                                             "presign"=>$presign,    //16
                                                            "name_sign"=>$name_sign,     //17
                                                            "lastname_sign"=>$lastname_sign,     //18
                                                            "allowed"=>$allowed,      //19
                                                            "name_inspector"=>$name_inspector,     //20
                                                            "lastname_inspector"=>$lastname_inspector,      //21
                                                            "name_commander"=>$name_commander,        //22
                                                           "lastname_commander"=>$lastname_commander,      //23
                                                           "position_inspector"=>$position_inspector,       //24
                                                           "position_commander"=>$position_commander,       //25
                                                           "date_inspector"=>$date_inspector,       //26
                                                           "date_commander"=>$date_commander,        //27
                                                           "allow_manager"=>$allow_manager,        //28
                                                          "first_name2"=>$first_name2,       //29
                                                          "last_name2"=>$last_name2,       //30
                                                         "last_position"=>$last_position,      //31
                                                         "last_date"=>$last_date,       //32
                                                        "type_person"=>$type_person,
                                                    
                                                );
                                                
                                              $tb="tb_vacation";
                                              
                                              
                                                 $this->db->where("id_vacation",$id_vacation);
                                                 $ck=$this->db->update($tb,$data);
                                                 if( $ck )
                                                 {
                                                     echo 1;
                                                 }
                                                 else
                                                 {
                                                     echo 0;
                                                 }
                                                 
                                 
                                 
                         
                         }
                }
                
                //------------------- กรอกลาพักผ่อนประจำปี ------      http://192.168.2.112/document/index.php/welcome/form_vacation
                public function  form_vacation()
                {
                    if(    $this->user_model->authenlogin() == 1 )
                         {
                                              //echo "test vacation";
                        
                                              $this->load->view("form_vacation");
                         }
                    
                }
                
                public function form_sick()
                {
                    if(    $this->user_model->authenlogin() == 1 )
                         {
                                              //echo "test vacation";
                        
                                            $this->load->view("form_sick");
                        
                                     //echo "T";         
                        
                         }
                }
                
                //------------------------ บันทึก
                 public  function   insert_sick()
                 {
                       if(    $this->user_model->authenlogin() == 1 )
                                 {
                           
                                          header('Content-Type: text/html; charset=UTF-8');
                                          
                                          $type_person=trim($this->input->get_post("type_person"));  //ประเภทของพนักงาน
                                        // echo br();
                                          
                                           $write=trim($this->input->get_post("write"));  //เขึยนที่
                                        //  echo br();
                                          
                                           $date_write1=trim($this->input->get_post("date_write1"));  //วันที่ 
                                         // echo br();
                                          
                                             $subject=trim($this->input->get_post("subject"));  //เรื่อง   3
                                          // echo br();
                                           
                                           $study=trim($this->input->get_post("study"));  //เรียน   4
                                         // echo br();
                                          
                                          
                                          $prename=trim($this->input->get_post("prename")); //คำนำหน้าชื่อ   5
                                        //  echo br();
                                          
                                          
                                             $first_name=trim($this->input->get_post("first_name"));  //ชื่อ    6
                                         // echo br();
                                          
                                              $last_name=trim($this->input->get_post("last_name")); //นามสกุล   7
                                          //echo br();
                                          
                                            $position=trim($this->input->get_post("position"));  //ตำแหน่ง   8
                                         // echo br();
                                          
                                             $affiliation=trim($this->input->get_post("affiliation")); //สังกัด   9
                                          //echo br();
                                          
                                           $work=trim($this->input->get_post("work")); //งาน   10
                                          //echo br(); 
                                          
                                             $tel=trim($this->input->get_post("tel")); //โทร    11
                                        //  echo br(); 
                                       
                                          
                                          $cumulative=trim($this->input->get_post("cumulative")); //วันลาสะสม   12
                                       //  echo br();
                                         
                                            //--------------------------------------------------------------------------
                                          $disease=trim($this->input->get_post("disease"));    //  1=ป่วยด้วยโรค   2=จากการทำงาน   3=กิจส่วนตัว  4=คลอดบุตร
                                         //echo br();
                                         
                                          
                                          //------------- เพิ่มเติม ----------------------
                                          $sick_disease=trim($this->input->get_post("sick_disease"));  // ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน
                                          
                                          
                                         
                                        $disease_detail=trim($this->input->get_post("disease_detail"));  // สาเหตุป่วยด้วยโรค
                                        // echo br();
                                         
                                        $disease_person=trim($this->input->get_post("disease_person")); //กิจส่วนตัว เนื่องจาก
                                        // echo br();
                                          
                                         
                                          $begin_date1=trim($this->input->get_post("begin_date1"));  //ตั้งแต่วันที่ 
                                        
                                         
                                         $end_date1=trim($this->input->get_post("end_date1"));  //ถึงวันที่
                                         //echo br();
                                         
                                         //-----------------------------------------------------------------------------
                                         
                                           $count_date=trim($this->input->get_post("count_date"));  //มีกำหนด วัน
                                        // echo br();
                                         
                                         
                                         $me_leave=trim($this->input->get_post("me_leave"));  //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
                                       //  echo br(); 
                                         
                                         //----------------- ข้าพเจ้าได้ลา มีกำหนดวัน 
                                           $begin_date2=trim($this->input->get_post("begin_date2"));  //ตั้งแต่วันที่ 
                                        // echo br();
                                         
                                          $end_date2=trim($this->input->get_post("end_date2"));  //ถึงวันที่
                                        // echo br();
                                         
                                         
                                            $count_date2=trim($this->input->get_post("count_date2"));   //กำหนด วัน
                                        // echo br();
                                         //----------------------------------------------------------------------------------
                                         
                                        $house_number=trim($this->input->get_post("house_number"));  //บ้านเลขที่
                                       // echo br();
                                         
                                         
                                          $road=trim($this->input->get_post("road"));  //ถนน
                                         //echo br();
                                         
                                        $district=trim($this->input->get_post("district"));  //ตำบล
                                       
                                         
                                          $district2=trim($this->input->get_post("district2"));  //อำเภอ
                                       //  echo br();
                                         
                                           $province=trim($this->input->get_post("province"));  //จังหวัด
                                        // echo br();
                                         
                                         //-------------------------------------------------------------------------------------
                                         
                                          $tel2=trim($this->input->get_post("tel2")); //โทรศํพท์
                                        // echo br();
                                         
                                         $sign_name=trim($this->input->get_post("sign_name"));  //ขอแสดงความนับถือ  ชื่อ
                                        // echo br();
                                         
                                          $sign_lastname=trim($this->input->get_post("sign_lastname"));   //ขอแสดงความนับถือ  นามสกุล
                                       //  echo br();
                                         
                                          $sign_prename=trim($this->input->get_post("sign_prename"));  //คำนำหน้าลงท้าย ช่ื่อ  1=นาย  2=นาง  3=นางสาว
                                         //echo br();
                                         
                                       $firstname3=trim($this->input->get_post("firstname3"));  //  ลงชื่อ  ชื่อ
                                         // echo br();
                                          
                                          //-------------------------------------------------------------------------------------------------------------
                                          
                                          $lastname3=trim($this->input->get_post("lastname3"));  //  ลงชื่อ  นามสกุล
                                       //  echo br();
                                         
                                         
                                         //---------------- ป่วย------------------------
                                          $sick1=trim($this->input->get_post("sick1"));  // ป่วย  ลามาแล้ว  วันทำการ
                                       // echo br();
                                         
                                           $sick2=trim($this->input->get_post("sick2"));  // ป่วย     ลาครั้งนี้   วันทำการ
                                          //echo br();
                                          
                                           $total_sick=trim($this->input->get_post("total_sick"));  //รวมเป็น  วันทำการ
                                          //echo br();
                                          //---------------- ป่วย------------------------
                                          
                                          //----------------กิจส่วนตัว--------------------
                                           $sick_person1=trim($this->input->get_post("sick_person1"));  // ลามาแล้ว  วันทำการ
                                          //echo br();
                                          
                                          //------------------------------------------------------------------------------------------------------------------
                                          
                                          
                                          $sick_person2=trim($this->input->get_post("sick_person2")); //  ลาครั้งนี้   วันทำการ
                                         // echo br();
                                          
                                           $total_sick_person=trim($this->input->get_post("total_sick_person"));  //รวมเป็น  วันทำการ
                                          
                                          //----------------กิจส่วนตัว--------------------
                                          
                                          
                                          //----------------- คลอดบุตร---------------------
                                            $confined1=trim($this->input->get_post("confined1"));  // ลามาแล้ว  วันทำการ
                                         // echo br();
                                          
                                            $confined2=trim($this->input->get_post("confined2"));  // ลามาแล้ว  วันทำการ
                                        //  echo br();
                                          
                                            $total_confined=trim($this->input->get_post("total_confined"));  //รวมเป็น  วันทำการ
                                        //  echo br();
                                          
                                          //--------------------------------------------------------------------------------------------------------------------
                                          
                                           $inspector_name=trim($this->input->get_post("inspector_name"));  //ชื่อ ผู้ตรวจสอบ
                                        //  echo br();
                                           $inspector_lastname=trim($this->input->get_post("inspector_lastname"));   //นามสกุล ผู้ตรวจสอบ
                                         // echo br();
                                          
                                          
                                            $inspector_position=trim($this->input->get_post("inspector_position"));  //  ตำแหน่ง   ผู้ตรวจสอบ
                                        //  echo br();
                                          
                                          
                                           $date_inspector=trim($this->input->get_post("date_inspector"));  //  วัน เดือน ปี   ผู้ตรวจสอบ 
                                       //   echo br();
                                          
                                          
                                          //-------------ความเห็นของผู้บังคับบัญชาชั้นต้น (โปรดระบุ ข้อ ก และ ข้อ ข)
                                           $supervisor_sick=trim($this->input->get_post("supervisor_sick"));  // 1=เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน     2=ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน   
                                          //echo br(); 
                                          
                                          //--------------------------------------------------------------------------------------------------------------------
                                          
                                           $supervisor_agree=trim($this->input->get_post("supervisor_agree"));  //1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                                        //  echo br();    
                                          
                                          
                                           $first_name2=trim($this->input->get_post("first_name2"));  //ลงชื่อ  ความเห็นของผู้บังคับบัญชา
                                        //  echo br();    
                                          
                                            $last_name2=trim($this->input->get_post("last_name2"));   //ลงชื่อ  นามสกุล ผู้บังคับบัญชา
                                        //  echo br();   
                                          
                                            $postion2=trim($this->input->get_post("postion2"));  //ตำแหน่ง ผู้บังคับบัญชา
                                         //  echo br();  
                                           
                                            $commander_date=trim($this->input->get_post("commander_date"));  //วัน เดือน ปี   ความเห็นของผู้บังคับบัญชาชั้นต้น
                                         //  echo br();  
                                           
                                           //--------------------------------------------------------------------------------------------------------------------
                                           
                                           
                                           $manager_allow=trim($this->input->get_post("manager_allow"));   // คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                                       //    echo  br();
                                           
                                            $first_name3=trim($this->input->get_post("first_name3"));   //ลงชื่อ  คำสั่งผู้บริหาร
                                          // echo  br();
                                           
                                            $last_name3=trim($this->input->get_post("last_name3"));  //ลงชื่อ นามสกุล
                                          // echo  br();
                                           
                                             $manager_position=trim($this->input->get_post("manager_position")); //ตำแหน่ง
                                         //  echo  br();
                                           
                                            $date_manager=trim($this->input->get_post("date_manager"));  //วัน เดือน ปี คำสั่งผู้บริหาร
                                          // echo  br();

                                            
                                            $id_staff_sick=trim($this->input->get_post("id_staff_sick"));  
                                           
                                              //  id_sick    1
                                           $data=array(
                                                 "type_person"=>$type_person,   //ประเภทของพนักงาน        2
                                                 "write"=> $write    , //เขึยนที่                                        3
                                                 "date_write1"=>$date_write1,    //วันที่                   4
                                                 "subject"=>$subject,  //เรื่อง   3                             5
                                                 "study"=>$study,     //เรียน   4 
                                                  "prename"=>$prename,   //คำนำหน้าชื่อ   5
                                                 "first_name"=> $first_name,  //ชื่อ    6
                                                "last_name"=>$last_name,   //นามสกุล   7
                                                  "position"=>  $position,   //ตำแหน่ง   8
                                                 "affiliation"=>$affiliation, //สังกัด   9
                                                  "work"=>$work,  //งาน   10
                                                  "tel"=>$tel,  //โทร    11     
                                                 "disease"=>$disease,   //  1=ป่วยด้วยโรค   2=จากการทำงาน   3=กิจส่วนตัว  4=คลอดบุตร                                        13
                                                 "disease_detail"=>$disease_detail, // สาเหตุป่วยด้วยโรค                                          
                                                 "disease_person"=> $disease_person,//กิจส่วนตัว เนื่องจาก
                                                 "begin_date1"=> $begin_date1, //ตั้งแต่วันที่ 
                                                 "end_date1"=>$end_date1, //ถึงวันที่
                                                 "count_date"=> $count_date,   //มีกำหนด วัน
                                                 "me_leave"=>$me_leave,  //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
                                                 
                                                  //     "cumulative"=>$cumulative, //วันลาสะสม   12

                                                    "begin_date2"=> $begin_date2,  //ตั้งแต่วันที่ 
                                                    "end_date2"=>$end_date2,   //ถึงวันที่
                                                   "count_date2"=> $count_date2,  //กำหนด วัน
                                                   
                                                   
                                                   "house_number"=>$house_number, //บ้านเลขที่
                                                    "road"=> $road, //ถนน
                                                    "district"=> $district,  //ตำบล
                                                    "district2"=> $district2, //อำเภอ
                                                    "province"=> $province, //จังหวัด
                                                    "tel2"=> $tel2, //โทรศํพท์
                                                    "sign_name"=>$sign_name,  //ขอแสดงความนับถือ  ชื่อ
                                                    "sign_lastname"=>  $sign_lastname,  //ขอแสดงความนับถือ  นามสกุล
                                                    "sign_prename"=> $sign_prename, //คำนำหน้าลงท้าย ช่ื่อ  1=นาย  2=นาง  3=นางสาว
                                                    "firstname3"=>$firstname3, //  ลงชื่อ  ชื่อ
                                                    "lastname3"=> $lastname3, //  ลงชื่อ  นามสกุล
                                                     "sick1"=>$sick1, // ป่วย  ลามาแล้ว  วันทำการ
                                                     "sick2"=>$sick2, // ป่วย     ลาครั้งนี้   วันทำการ
                                                     "total_sick"=> $total_sick, //รวมเป็น  วันทำการ
                                                     "sick_person1"=> $sick_person1,  // ลามาแล้ว  วันทำการ
                                                     "sick_person2"=>$sick_person2,//  ลาครั้งนี้   วันทำการ
                                                     "total_sick_person"=> $total_sick_person, //รวมเป็น  วันทำการ
                                                     "confined1"=> $confined1, // ลามาแล้ว  วันทำการ
                                                      "confined2"=> $confined2, // ลามาแล้ว  วันทำการ
                                                      "total_confined"=>  $total_confined, //รวมเป็น  วันทำการ
                                                     "inspector_name"=>$inspector_name,//ชื่อ ผู้ตรวจสอบ
                                                    "inspector_lastname"=>  $inspector_lastname,  //นามสกุล ผู้ตรวจสอบ
                                                    "inspector_position"=>  $inspector_position, //  ตำแหน่ง   ผู้ตรวจสอบ
                                                   "date_inspector"=>$date_inspector, //  วัน เดือน ปี   ผู้ตรวจสอบ 
                                                    "supervisor_sick"=> $supervisor_sick, // 1=เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน     2=ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน  
                                                    "supervisor_agree"=>$supervisor_agree, //1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                                                    "first_name2"=> $first_name2,//ลงชื่อ  ความเห็นของผู้บังคับบัญชา
                                                    "last_name2"=>$last_name2,   //ลงชื่อ  นามสกุล ผู้บังคับบัญชา
                                                    "postion2"=>$postion2,   //ตำแหน่ง ผู้บังคับบัญชา
                                                    "commander_date"=>$commander_date,  //วัน เดือน ปี   ความเห็นของผู้บังคับบัญชาชั้นต้น
                                                    "manager_allow"=>$manager_allow,    // คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                                                    "first_name3"=>$first_name3,  //ลงชื่อ  คำสั่งผู้บริหาร
                                                   "last_name3"=> $last_name3,  //ลงชื่อ นามสกุล
                                                    "manager_position"=> $manager_position,   //ตำแหน่ง
                                                    "date_manager"=>$date_manager,  //วัน เดือน ปี คำสั่งผู้บริหาร
                                               
                                                    "sick_disease"=>$sick_disease,        //   $sick_disease=trim($this->input->get_post("sick_disease"));  // ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน
                                              
                                                   "id_staff"=>$id_staff_sick,
                                           );
                                           
                                           
                                             $tb="tb_sick";

                                             $ck=$this->db->insert($tb,$data);
                                             if( $ck )
                                             {
                                                 echo 1;
                                             }
                                             else{
                                                 echo 0;
                                             }
                                 
                                          
                                  }
                 }
                
                
                //---------------------บันทึกใบลาพักผ่อน-----------------------------
                public  function insert_vacation()
                        {
                                 if(    $this->user_model->authenlogin() == 1 )
                                 {
                                              header('Content-Type: text/html; charset=UTF-8');
                                              
                                               $write=trim($this->input->get_post("write"));  //เขียนที่    1
                                           //   echo br();
                                               $date_write=trim($this->input->get_post("date_write"));  //วันเดือนปี ที่เขียน   2
                                            //  echo br();
                                              $subject=trim($this->input->get_post("subject"));  //เรื่อง   3
                                          //    echo br();
                                              $study=trim($this->input->get_post("study"));  //เรียน   4
                                            //  echo br();
                                               $prename=trim($this->input->get_post("prename")); //คำนำหน้าชื่อ   5
                                             //  echo br();
                                               $first_name=trim($this->input->get_post("first_name"));  //ชื่อ    6
                                            //  echo br();
                                               $last_name=trim($this->input->get_post("last_name")); //นามสกุล   7
                                             // echo br();
                                              $position=trim($this->input->get_post("position"));  //ตำแหน่ง   8
                                            //  echo br(); 
                                              $affiliation=trim($this->input->get_post("affiliation")); //สังกัด   9
                                             // echo br();
                                              $work=trim($this->input->get_post("work")); //งาน   10
                                            //  echo br();
                                              $tel=trim($this->input->get_post("tel")); //โทร    11
                                           //   echo br();
                                              $cumulative=trim($this->input->get_post("cumulative")); //วันลาสะสม   12
                                             // echo br();
                                               $rest=trim($this->input->get_post('rest')); //วันลาที่เหลืออยู่      13
                                            //  echo  br();
                                              $total=trim($this->input->get_post('total'));  //รวมวันลาเป็น      14
                                           //   echo  br();
                                               $current=trim($this->input->get_post("current"));  //ในปีนี้ลามาแล้ว     15
                                              // echo  br();
                                               $keep=trim($this->input->get_post("keep"));  //คงเหลือวันลาอีก      16
                                             //  echo  br();
                                               $wishes=trim($this->input->get_post("wishes"));  //มีความประสงค์จะขอลาพักผ่อนมีกำหนด    17
                                              // echo  br(); 
                                                $date_begin=trim($this->input->get_post("date_begin"));  //ขอลาพักผ่อนตั้งแต่วันที่        18
                                            //  echo  br();
                                               $end_date=trim($this->input->get_post("end_date"));  //ขอลาพักผ่อน ถึงวันที่        19
                                           //   echo  br();
                                              $house_number=trim($this->input->get_post("house_number"));  //บ้านเลขที่        20
                                             // echo  br();
                                              $road=trim($this->input->get_post("road"));  //ถนน        21
                                             //  echo  br();
                                                $district=trim($this->input->get_post("district")); //ตำบล        22
                                              // echo  br();
                                                $city=trim($this->input->get_post("city"));  //อำเภอ         23
                                              // echo  br();
                                               $province=trim($this->input->get_post("province"));  //จังหวัด        24
                                              // echo  br();
                                                $tel_address=trim($this->input->get_post("tel_address")); //โทรศํพท์  เบอร์โทรศํพท์หลังจากจังหวัด      25
                                              // echo  br();
                                                 $leave=trim($this->input->get_post("leave"));  //ลามาแล้ว       26
                                               //echo  br();
                                                 $leave_thistime=trim($this->input->get_post("leave_thistime"));  //ลาครั้งนี้ วันทำการ      27
                                               //echo  br(); 
                                                 $date_total_leave=trim($this->input->get_post("date_total_leave"));  //รวมเป็น วันทำการ       28
                                              // echo  br(); 
                                                 $sign=trim($this->input->get_post("sign"));  //ลงชื่อขอแสดงความนับถือ       29
                                               //echo  br(); 
                                                $presign=trim($this->input->get_post("presign"));  //คำนำหน้าชื่อ  ขอแสดงความนับถือ         30
                                              // echo  br(); 
                                                 $name_sign=trim($this->input->get_post("name_sign"));    //ชื่อ ขอแสดงความนับถือ       31
                                               // echo  br(); 
                                                $lastname_sign=trim($this->input->get_post("lastname_sign"));  //นามสกุล  ขอแสดงความนับถือ      32
                                               // echo  br(); 
                                                $allowed=trim($this->input->get_post("allowed"));  //เห็นควรอนุญาตหรือไม่        33
                                               // echo  br(); 
                                                 $name_inspector=trim($this->input->get_post("name_inspector"));  //ลงชื่อผู้ตรวจสอบ        34
                                                // echo  br(); 
                                                  $lastname_inspector=trim($this->input->get_post("lastname_inspector"));  //นามสกุลผู้ตรวจสอบ     35
                                                // echo  br(); 
                                                  $name_commander=trim($this->input->get_post("name_commander"));  //ชื่อผู้บังคับบั้ญชา     36
                                                // echo br();
                                                  $lastname_commander=trim($this->input->get_post("lastname_commander"));  //นามสกุลผู้บังคับบัญชา     37
                                                // echo br();
                                                  $position_inspector=trim($this->input->get_post("position_inspector")); //ตำแหน่งผู้ตรวจสอบ      38
                                                // echo br();
                                                  $position_commander=trim($this->input->get_post("position_commander"));  //ตำแหน่งของผู้บังคับบัญชา     39
                                                //echo br();
                                                 $date_inspector=trim($this->input->get_post("date_inspector"));  //วันที่ ผู้ตรวจสอบ     40
                                               // echo br();
                                                  $date_commander=trim($this->input->get_post("date_commander"));  //วันที่ผู้บังคับบัญชา     41
                                                //echo br();
                                                 $allow_manager=trim($this->input->get_post("allow_manager"));  //ผู้บริหาร อนุญาตหรือไม่      42
                                               //echo br();
                                                $first_name2=trim($this->input->get_post("first_name2"));  //ลงชื่อ     43
                                               // echo br();
                                                 $last_name2=trim($this->input->get_post("last_name2"));  //นามสกุล     44
                                                //echo br();
                                                $last_position=trim($this->input->get_post("last_position"));  //ตำแหน่ง      45
                                               // echo br();
                                                  $last_date=trim($this->input->get_post("last_date"));      //   46
                                               // echo br();
                                                
                                                 $type_person=trim($this->input->get_post("type_person"));

                                                 $id_staff=trim($this->input->get_post("id_staff"));
                                                 
                                                 
                                                 
                                                
                                                $data=array(
                                                            "write"=>$write,   //1
                                                            "date_write"=>$date_write,   //2
                                                            "subject"=>$subject,    //3
                                                            "study"=>$study,   //4
                                                            "prename"=>$prename,   //5
                                                            "first_name"=>$first_name,    //6
                                                            "last_name"  =>$last_name,    //7
                                                             "position"=> $position,     //8
                                                             "affiliation"=> $affiliation,     //9
                                                              "work"=>$work,    //10
                                                              "tel"=>$tel,    //11
                                                              "cumulative"=>$cumulative,
                                                             "rest"=>$rest,    
                                                             "total"=> $total,     
                                                            "current"=>$current,
                                                            "keep"=>$keep,
                                                            "wishes"=>$wishes,
                                                            "date_begin"=>$date_begin,
                                                            "end_date"=>$end_date,
                                                            "house_number"=>$house_number,
                                                            "road"=>$road,
                                                            "district"=>$district,
                                                            "city"=>$city,
                                                            "province"=>$province,
                                                             "tel_address"=>$tel_address,
                                                              "leave"=>$leave,    //12
                                                             "leave_thistime"=>$leave_thistime,     //13
                                                             "date_total_leave"=>$date_total_leave,     //14
                                                             "sign"=> $sign,     //15
                                                             "presign"=>$presign,    //16
                                                            "name_sign"=>$name_sign,     //17
                                                            "lastname_sign"=>$lastname_sign,     //18
                                                            "allowed"=>$allowed,      //19
                                                            "name_inspector"=>$name_inspector,     //20
                                                            "lastname_inspector"=>$lastname_inspector,      //21
                                                            "name_commander"=>$name_commander,        //22
                                                           "lastname_commander"=>$lastname_commander,      //23
                                                           "position_inspector"=>$position_inspector,       //24
                                                           "position_commander"=>$position_commander,       //25
                                                           "date_inspector"=>$date_inspector,       //26
                                                           "date_commander"=>$date_commander,        //27
                                                           "allow_manager"=>$allow_manager,        //28
                                                          "first_name2"=>$first_name2,       //29
                                                          "last_name2"=>$last_name2,       //30
                                                         "last_position"=>$last_position,      //31
                                                         "last_date"=>$last_date,       //32
                                                        "type_person"=>$type_person,
                                                       "id_staff"=>$id_staff,
                                                );
                                                
                                              $tb="tb_vacation";
                                              $ck_insert=$this->db->insert($tb,$data); //ตรวจสอบการ insert
                                             //   $ck_insert=true;
                                                if(  $ck_insert    )
                                                {
                                                     echo 1;  
                                                }
                                                else
                                                {
                                                    echo 0;
                                                }
                                                
                                                       
                                 }                  
                        }


                public function table_vacation()
                {
                     if(    $this->user_model->authenlogin() == 1 )
                         {
                                              //echo "test vacation";
                         
                                              $tb="tb_vacation";
                                              $this->db->order_by("id_vacation","desc");
                                               $data["query"]=$this->db->get($tb);
                                              $this->load->view("table_vacation",$data);
                                          //     $this->load->view("table_vacation");
                                              
                         }
                }
                
                public function table_sick()
                {
                    if(    $this->user_model->authenlogin() == 1 )
                         {
                                 $tb="tb_sick";     
                                 $this->db->order_by("id_sick","desc");
                                 $data["query"]=$this->db->get($tb);
                                 $this->load->view("table_sick",$data);
                         }
                }
                
                 public function del_sick()
                {
                    if(    $this->user_model->authenlogin() == 1 )
                    {
                                           $id_sick=trim($this->uri->segment(3));
                                         if(  $id_sick  > 0  )
                                         {
                                              $tb="tb_sick";
                                              $this->db->where("id_sick",$id_sick);
                                              $ck=$this->db->delete($tb);
                                               if( $ck )
                                                {
                                                    echo 1;
                                                }
                                                else
                                                {
                                                    echo 0;
                                                }
                                             
                                         }

                    }
                    
                }

                public function del_vacation()
                {
                    if(    $this->user_model->authenlogin() == 1 )
                    {
                                              $id_vacation=trim($this->uri->segment(3));
                                         if(  $id_vacation  > 0  )
                                         {
                                               $tb="tb_vacation";
                                               $this->db->where("id_vacation",$id_vacation);
                                                $ck = $this->db->delete($tb);
                                                if( $ck )
                                                {
                                                    echo 1;
                                                }
                                                else
                                                {
                                                    echo 0;
                                                }
                                         }
                                              
                        
                    }
                    
                }
                
                public function export_data()//ส่งออกหนังสือ  http://10.87.196.170/document/index.php/welcome/export_data/3/1/2017-04-27
                {
                               
                                //http://10.87.196.170/document/report_pdf/docdb/dbreport.php/?type_record=3&type_document=1
                                /*
                                $type_record=$_REQUEST["type_record"];
$type_document=$_REQUEST["type_document"];
$select_date=$_REQUEST["select_date"];   //เลือกวันที่ในการ report
                                 */
                                
                                /*
                                   
          $str2="select  *  from  $tb  where  type_record=$type_record  and   type_document=$type_document     and   `date` >=  '$select_date'   limit 14,14   ";
         $query2=mysql_query($str2) or die("mysql error ");
         $num_rows2 = mysql_num_rows( $query2);
                                 * 
                                 * 
                                 */
                                
                    //http://10.87.196.170/document/report_pdf/docdb/dbreport.php/?type_record=3&type_document=2&select_date=
                    
                    if(    $this->user_model->authenlogin() == 1 )
                    {
                                 $type_record=$this->uri->segment(3);
                                 $type_document=$this->uri->segment(4); 
                                 $date=$this->uri->segment(5); 
                                 
                                 $tb="tb_main1";
                                 $data["title"]=$this->title;
                                 if(  $type_record != ""  &&    $type_document != ""  &&  $data == ""  )
                                 {
                                    $data["q"]=$this->db->get_where($tb,array("type_document"=>$type_document,"type_record"=> $type_record));    
                                 }
                                 elseif(   $type_record != ""  &&    $type_document != ""  &&   $date != ""   )
                                 {
                                     $data["q"]=$this->db->get_where($tb,array("type_document"=>$type_document,"type_record"=> $type_record,"date"=>$date  ));    
                                 }
                                 else
                                 {
                                     $data["q"]=$this->db->get($tb);    
                                 }
                                 $this->load->view("export",$data);
                    }           
                                
                }
                
                //   http://10.87.196.170/document/index.php/welcome/auto_main
                public function auto_main() //ค้นหาแบบ autocomplete
                {
                                echo  header('Content-type: application/json');
                                $tb="tb_main1";
                                $to=trim($this->input->get_post("to"));
                                $type_record=trim($this->input->get_post("type_record"));
                                 $this->db->like("to",$to);
                                $query=$this->db->get_where($tb,array("type_record"=>$type_record),5);
                                foreach($query->result() as $row)
                                {
                                       $rows[]=$row;
                                  //   $results[] = array('to' => $row->to );
                                }
                                echo json_encode($rows);
                            //    echo json_encode($results);
                              
                }

                //http://10.87.196.170/document/index.php/welcome/sr_tb_vacation
                public function sr_tb_vacation()  //สำหรับการค้นหาวันหยุด วันลา
                {
          
                    
                             $id_staff_sr=trim($this->input->get_post("id_staff_sr"));
                             $work_year=trim($this->input->get_post("work_year"));
                            
                            $make_year_begin=$work_year."-01-01";
                            $make_year_end=$work_year."-12-01";
                          
                             
                             //echo br();
                          //  $sr_tb_name=trim($this->input->get_post("sr_tb_name"));
                             //echo br();
                                              
                                /*
                                    <option value="1">แบบใบลาพักผ่อนประจำปี</option>
                                    <option value="2">แบบใบลาป่วย/ลาคลอดบุตร/ลากิจส่วนตัว</option>
                                 */

                     
                                  $tb="tb_vacation";
                                  $data["query"]=$this->db->get_where($tb,array("id_staff"=>$id_staff_sr,"date_begin >="=>$make_year_begin,"end_date <="=>$make_year_end));
                                  $query= $data["query"];
                                   $row= $data["query"]->num_rows();
                                   
                                   
                                  if( $row > 0 )
                                  {
                                      //  $this->load->view("table_vacation",$data);
                                          $tb2="tb_staff";
                                          $data["q_staff"]=$this->db->get_where($tb2,array("id_staff"=> $id_staff_sr));
                                          $row= $data["q_staff"]->row();
                                          $data["name"]=$row->name;
                                          $data["lastname"]=$row->lastname;
                                          
                                              
                                           $count_leave=0;
                                            foreach($query->result() as $row )
                                            {
                                                   $leave_row = $row->leave;
                                                   $data["count_leave"]  =+ $leave_row ;
                                                   $date_total_leave_row=$row->date_total_leave;
                                              
                                                   $data["count_date_total_leave"]=$row->date_total_leave;  //วันลาทั้งหมด
                                                   
                                                   $leave_thistime_row = $row->leave_thistime;  //ลาครั้งนี้
                                                   $data["count_leave_thistime_row"] =+  $leave_thistime_row;
                                                   
                                                   
                                                
                                                  
                                            }
                                            
                                            $data["total_count_date_total_leave"]  =  10  -  $data["count_date_total_leave"];
                                            
                                            $data["total_leave_thistime_row"]  =     10 -  $data["count_leave_thistime_row"];  //รวมวันลาที่เหลือ ลาครั้งนี้      
                                          
                                          //  $this->load->view("tb_leave",$data);
                                  }
                                  
                                  
                             
                                  
                                  
                               $tbsick="tb_sick";
                            //   $data["q_sick"]=$this->db->get_where( $tbsick,array("id_staff"=> $id_staff_sr));
                            //    $row=  $data["q_sick"]->row();
                               
                               /*
                                 $make_year_begin=$work_year."-01-01";
                            $make_year_end=$work_year."-12-01";
                                */
                                
                                  $data["query_sick"]=$this->db->get_where($tbsick,array("id_staff"=>$id_staff_sr,"begin_date1 >= "=>$make_year_begin,"end_date1 <= "=>$make_year_end));
                                  $query2=  $data["query_sick"];
                                  $row2= $query2->num_rows();
                                  $count_sick_person2 = 0;
                                  $count_confined2=0;
                                  $count_sick2_row=0;
                                  if( $row2 > 0 ) 
                                    {
                                             foreach(  $query2->result() as $row)
                                             {
                                                    $sick2_row  = $row->sick2;
                                                   // $data["count_sick2_row"]  +=   $sick2_row;
                                                 // $count_sick2_row    +=$sick2_row;
                                                    
                                                    //----- ลาป่วย
                                                    if( $sick2_row > 1 )
                                                    {
                                                        $count_sick2_row +=$sick2_row;
                                                       // $data["count_sick2_row"]  +=$sick2_row;
                                                    }
                                                    elseif(  $sick2_row <= 1  )
                                                    {
                                                         $count_sick2_row +=$sick2_row;
                                                       //  $data["count_sick2_row"]  = $sick2_row;
                                                    }
                                                   
                                                    
                                                  //---- กิจส่วนตัว-----  
                                                  $sick_person2=$row->sick_person2;
                                                    if( $sick_person2 > 1 )
                                                    {
                                                        $count_sick_person2  += $sick_person2;
                                                    }
                                                     elseif(  $sick_person2 <= 1  )
                                                    {
                                                         $count_sick_person2 = $sick_person2;
                                                    }
                                                    
                                                    
                                                    //------คลอดบุตร------
                                                    $confined2=$row->confined2;
                                                    $count_confined2 =+   $confined2;
                                                       
                                                    
                                             }
                                        
                                             // $count_sick2_row +=$sick2_row;
                                             $data["count_sick2_row"]  =$count_sick2_row;
                                             
                                             $data["total_count_sick2_row"]  =  10  -  $data["count_sick2_row"];
                                             
                                             //---------- กิจส่วนตัว-------
                                             $data["count_sick_person2"] = $count_sick_person2;
                                            $data["total_count_sick_person2"] = 10 - $count_sick_person2;
                                            
                                            //-----------คลอดบุตร---------
                                             $data["count_confined2"] =  $count_confined2;
                                             $data["total_count_confined2"]=10-$count_confined2;
                                            
                                       
                                    }
                                    
                                    
                                    
                                   
                                   
                                $this->load->view("tb_leave",$data);
                               
                               
                              
                        
                         
                              
                }


                public  function  call_tbstaff()
                {
                         $id_staff=trim($this->input->get_post("id_staff"));
                       //echo br();
                             $tb="tb_staff";
                             $q=$this->db->get_where($tb,array("id_staff"=>$id_staff));
                             $row=$q->row();
                             echo $row->position;
                             
                }
                public  function call_staff_name()
                {
                      $id_staff=trim($this->input->get_post("id_staff"));
                       //echo br();
                             $tb="tb_staff";
                             $q=$this->db->get_where($tb,array("id_staff"=>$id_staff));
                             $row=$q->row();
                             $name=$row->name;
                             $lastname=$row->lastname;
                             $prename=$row->prename;
                             echo      $prename.$name."        ".$lastname;
                }
                public  function  call_field_name()
                {
                       $tb="tb_staff";
                       $id_staff=trim($this->input->get_post("id_staff"));
                       //echo br();
                       $field=trim($this->input->get_post("field"));
                        // echo br();
                       $q=$this->db->get_where($tb,array("id_staff"=>$id_staff));
                        $row=$q->row();
                       echo $row->$field;
                      
                }
                
                
                public function  err_system()
                {
                    //http://192.168.2.112/document/index.php/welcome/err_system
                    
                    /*
                      echo "<h1>Error: 404 Not Found</h1>";
                      //echo "<br>";
                      echo  "<h4>Sorry, the requested URL ".base_url()."<h4>";
                     * 
                     */
                          
                         $this->user_model->err_model();
                         
                }
                
                
                
                
                
}

?>

