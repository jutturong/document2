<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

        var   $title="ระบบโปรแกรมธุรการอิเล็กทรอนิค";

        var     $tb= "tb_main1";
       //    var   $tb= "tb_main1_test";   // `tb_main1_test`     // `tb_main1`

         
      var   $tb_vacation="tb_vacation";
      // var   $tb_vacation="tb_vacation_test";



        var  $total_day_vacation=10; //จำนวนวันลาทั้งหมดในปีแต่ละปี


           var   $tb_sick="tb_sick";
          // var   $tb_sick="tb_sick_test";



         public function __construct()
        {
                parent::__construct();
                // Your own constructor code
               // $this->load->library('encrypt');
							  $this->load->model("user_model");
        }

	public function index()
	{
		//$this->load->view('welcome_message');
		 //echo "testing";


                                    $sess_data=array(
                                                                     "sess_us"=>"",
                                                                     "sess_ps"=>"",
                                                                     //"sess_per"=> $check_per,
                                                                      
                                                                      "sess_login"=>0,
                                                               );

                                    $this->session->set_userdata($sess_data);
                                    $this->session->sess_destroy();



		  $data["title"]=$this->title;
		  //$this->load->view("home",$data);
		 $this->load->view("login",$data);
	}
        
        

                 public   function  checklogin()
                 {
                      $us=trim($this->input->get_post("us"));
                     //echo br();
                      $ps=trim(md5($this->input->get_post("ps")));
                     //echo br();

                     $tb_user="tb_user";

                     //$this->db->get_where($tb_user,array("username"=>us,"password"=>ps));
                     //echo $num_check=$query->num_rows();
                     //echo br();

                     $query=$this->db->get_where($tb_user,array("username"=>$us));
                     $row=$query->row();
                     $id_permission=$row->id_permission;
                     
                     $check_rows=$query->num_rows();
                     
                    //echo br();
                      if( $check_rows == 1 )
                      {


                          $sess_data=array(
                                   "sess_us"=>$us,
                                   "sess_ps"=>$ps,
                                   //"sess_per"=> $check_per,
                                    "sess_permission"=>$id_permission, //1=admin,2=user
                                    "sess_login"=>1,
                                    
                              
                             );



                           $this->session->set_userdata($sess_data);
                          $sess_login=$this->session->userdata("sess_login");  //test check  authentication login
                          if( $sess_login == 1)
                          {
                                //redirect("welcome/lhome");
                                 echo 1;
                          }
                          else
                              {
                                 //redirect("welcome/index");
                                 echo 0;

                              }


                      }

                 }
                 
                  #http://10.87.196.170/document3/index.php/welcome/load_calendar
                 public function load_calendar()
                 {
                        $this->user_model->login();  //for checklogin
                        $this->load->view("load_calendar"); 
                     
                 }
                 

                #http://10.87.196.170/document3/index.php/welcome/call_name_user
                 public  function call_name_user()
                 {
                       $this->user_model->login();  //for checklogin
                       $username=trim($this->input->get_post("username"));
                      //echo br();
                       $tb="tb_user";
                       $query=$this->db->get_where($tb,array("username"=>$username));
                       $num=$query->num_rows();
                       if( $num > 0 )
                       {
                                    foreach($query->result() as $row)
                                    {
                                        $rows[]=$row;
                                    }
                                     echo json_encode($rows);  
                       }
                 }
                 
                 #http://10.87.196.170/document3/index.php/welcome/call_user_vacation
                 public function call_user_vacation()
                 {
                      $this->user_model->login();  //for checklogin
                      $firstname=trim($this->input->get_post("firstname"));
                       if( $firstname != ""  )
                       {
                            $tb = $this->tb_vacation;
                            $query=$this->db->get_where($tb,array("first_name"=>$firstname));
                            $num=  $query->num_rows();
                            
                            
                              foreach($query->result() as $row )
                              {
                                   $rows[]=$row;
                                  
                              }
                                   echo json_encode($rows);
                              
                             
                       }
                       
                     
                 }
                 
            
                 
                  //-----------------------------excellence---------------------------------------------------
               #http://10.87.196.170/document2/index.php/welcome/number_excellence_receive
                 #http://10.87.196.170/document/index.php/welcome/number_excellence_receive
                public function  number_excellence_receive() // หนังสือรับ excellence
               {
                  // $this->user_model->login();  //for checklogin
                   //--เอกสารรับ---
                    //$type_document=1;  // 1=หนังสือรับ,2=หนังสื
                      $number_add=$this->user_model->count_id(3,1);  //count_id($type_record,$type_document)
                  //--เอกสารรับ---
                     echo   json_encode(array("number_add"=>$number_add));
               }

               #http://192.168.2.120/document2/index.php/welcome/number_excellence_send
               #http://10.87.196.170/document/index.php/welcome/number_excellence_receive
               public function  number_excellence_send() // หนังสือส่ง  excellence
               {
                  // $this->user_model->login();  //for checklogin
                   /*-------------1.เลขทะเบียนส่ง----------  */
                             // $tb="tb_main1";
                               $tb=$this->tb;
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


                                             if( $ex[1]  <  1  )
                                                  {
                                                       // echo "มีตัวอักษรปน";
                                                        $exe=explode(".",$ex[1]);
                                                       // echo $exe[1];
                                                         $sum_regis=$exe[1]+1;
                                                  }

                                     if( $num_rows_ck  < 10  )
                                     {
                                          $number_add="ศธ0514.7.1.2.3.4/00".$sum_regis ;
                                     }
                                     else if($num_rows_ck  < 100 )
                                     {
                                         $number_add="ศธ0514.7.1.2.3.4/0".$sum_regis ;
                                     }
                                    
                                     else
                                     {
                                        $number_add="ศธ0514.7.1.2.3.4/".$sum_regis ;
                                     }

                               }
                               else
                               {
                                  //$sum_regis=0001;
                                  $number_add="ศธ0514.7.1.2.3.4/"."001";
                               }

                               echo   json_encode(array("number_add"=>$number_add));
                              //-------------1.เลขทะเบียนส่ง----------
               }
                   //-----------------------------excellence---------------------------------------------------

                //-------#########---------- ศูนย์วิจัยฯ------------------------------------------------------------------------------
                #http://192.168.2.120/document2/index.php/welcome/number_research_receive
               #http://10.87.196.170/document/index.php/welcome/number_research_receive
               public function  number_research_receive() //หนังสือรับ
                {
                     $number_add=$this->user_model->count_id(2,1);
                      echo   json_encode(array("number_add"=>$number_add));
                }

                #http://192.168.2.120/document2/index.php/welcome/number_research_send
                #http://10.87.196.170/document/index.php/welcome/number_research_send
                public function  number_research_send() //หนังสือส่ง
                {
                     //------------------------ หนังสือรับ----------------------------------------
                                // $data["number_add"]=$this->user_model->count_id(2,1);
                               $data["number_add_21"]=$this->user_model->count_id(2,1);
                            //  echo br();
                                /*-------------1.เลขทะเบียนส่ง----------  */
                               // $tb="tb_main1";
                              $tb=$this->tb;
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

                                   
                                   if(  $num_rows_ck  <  10  )
                                   {
                                        $number_add="ศธ0514.7.1.2.3.4.1/00". $sum_regis_int ;
                                   }
                                   elseif( $num_rows_ck  <  100 )
                                   {
                                         $number_add="ศธ0514.7.1.2.3.4.1/0". $sum_regis_int ;
                                   }
                                  
                                   else
                                   {
                                      $number_add="ศธ0514.7.1.2.3.4.1/". $sum_regis_int ;
                                   }
                               }
                               else
                               {
                                  $number_add="ศธ0514.7.1.2.3.4.1/"."001";
                               }
                                 echo   json_encode(array("number_add"=>$number_add));
                }


               //-------#########---------- ศูนย์วิจัยฯ------------------------------------------------------------------------------

                //-------##############----------- มูลนิธิ-------------------------------------------------------------------
                # http://10.87.196.170/document2/index.php/welcome/number_foundation_receive
                 public function  number_foundation_receive() //หนังสือรับ
                {
                          //----------------- รับ -------------------------------
                                $number_add=$this->user_model->count_id(1,1);
                                echo   json_encode(array("number_add"=>$number_add));
                          //----------------- รับ -------------------------------
                }


                 # http://10.87.196.170/document2/index.php/welcome/number_foundation_send
                  public function  number_foundation_send() //หนังสือส่ง
                {
                                    /*-------------1.เลขทะเบียนส่ง----------  */
                              // $tb="tb_main1";
                                $tb=$this->tb;
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

                                 if( $num_row_ck < 10)
                                     {
                                          $number_add="ตวฉ/00".$sum_regis ;
                                     }
                                else if( $num_row_ck < 10)
                                     {
                                          $number_add="ตวฉ/0".$sum_regis ;
                                     }      
                         
                                else
                                {
                                     $number_add="ตวฉ/".$sum_regis ;
                                }
                                
                               }
                               else
                               {
                                  $number_add="ตวฉ/"."001";
                               }
                              // echo $data["number_add_12"];
                              echo   json_encode(array("number_add"=>$number_add));
                              /*-------------1.เลขทะเบียนส่ง----------  */
                }


               //-------##############----------- มูลนิธิ-------------------------------------------------------------------



                  // http://10.87.196.170/document2/index.php/welcome/home/          for   test
                  public function home()
	{
                         $this->user_model->login();  //for checklogin

	        //---###############---------excellence--------------------------------------------------------------
		//--เอกสารรับ---
		//$type_document=1;  // 1=หนังสือรับ,2=หนังสื
		/*
		1 	มูลนิธิตะวันฉายฯ
																														 2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
																														 3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ
		*/
		//	echo  $type_record=3; //ประเภทของตารางที่ทำการบันทึก    9
			  $data["number_add"]=$this->user_model->count_id(3,1);  //count_id($type_record,$type_document)
			 //$this->load->view("receive21",$data);
                              //--หนังสือส่ง--
                          /*
                           /*-------------1.เลขทะเบียนส่ง----------  */
                             // $tb="tb_main1";
                               $tb=$this->tb;
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


                                     $data["number_add_32"]="ศธ0514.7.1.2.3.4/".$sum_regis ;


                               }
                               else
                               {
                                  $data["number_add_32"]="ศธ0514.7.1.2.3.4/";
                               }
                               //echo  $data["number_add_32"];
                               //echo br();
                              //-------------1.เลขทะเบียนส่ง----------
                            //---###############---------excellence--------------------------------------------------------------







                                //-------#########---------- ศูนย์วิจัยฯ------------------------------------------------------------------------------
                                //------------------------ หนังสือรับ----------------------------------------
                                // $data["number_add"]=$this->user_model->count_id(2,1);
                               $data["number_add_21"]=$this->user_model->count_id(2,1);
                            //  echo br();
                                /*-------------1.เลขทะเบียนส่ง----------  */
                               // $tb="tb_main1";
                              $tb=$this->tb;
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

                                      $data["number_add_22"]="ศธ0514.7.1.2.3.4.1/". $sum_regis_int ;
                               }
                               else
                               {
                                  $data["number_add_22"]="ศธ0514.7.1.2.3.4.1/";
                               }
                               //echo  $data["number_add_22"];
                               //-------#########---------- ศูนย์วิจัยฯ------------------------------------------------------------------------------



                               //--------#####--------------------------มูลนิธิตะวันฉายฯ----------------------------------------------------------------


                                 //---------------------------มูลนิธิตะวันฉายฯ----1-----------------------
                               /*
                                            function  receive11()  //รับ
                                            {
                                                    $('#sub11').load("<?=base_url()?>index.php/welcome/receive11");
                                            }

                                            function  send11()  //ส่ง
                                            {
                                                    $('#sub11').load("<?=base_url()?>index.php/welcome/send11");
                                            }

                                *                                 */

                               //--------#####--------------------------มูลนิธิตะวันฉายฯ----------------------------------------------------------------
                                 //receive11()
                                 //----------------- รับ -------------------------------
                                $data["number_add_11"]=$this->user_model->count_id(1,1);
                                //echo br();
                                 //----------------- รับ -------------------------------

                                 /*-------------1.เลขทะเบียนส่ง----------  */
                              // $tb="tb_main1";
                                $tb=$this->tb;
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




                                 $data["number_add_12"]="ตวฉ/".$sum_regis ;
                               }
                               else
                               {
                                  $data["number_add_12"]="ตวฉ/";
                               }
                               //echo $data["number_add_12"];
                              // echo br();
                              /*-------------1.เลขทะเบียนส่ง----------  */
                              //--------#####--------------------------มูลนิธิตะวันฉายฯ----------------------------------------------------------------





		 $data["title"]=$this->title;
		 //$data["loadconent"]="receive_excellence";
		  //$data["loadconent"]="";
		 $this->load->view("home",$data);
	}




	//http://10.87.196.170/document2/index.php/welcome/json_academic
	public function json_academic() //json รายชื่อ อ.
	{
                       $this->user_model->login();  //for checklogin
		    $tb="tb_academic";
       $query=$this->db->get($tb);
			 foreach($query->result() as $row)
			 {
				   $rows[]=$row;
			 }
			 echo  json_encode($rows);
	}
        
        // กิจกรรม ปฏิทินอาจารย์
        //http://10.87.196.170/document2/index.php/welcome/delete_calendar
        public  function delete_calendar()
        {
              $this->user_model->login();  //for checklogin
              $id_calendar=trim($this->input->get_post("id_calendar"));
              if(    $id_calendar > 0  )
              {
                     $tb="tb_calendar";
                     $this->db->where("id_calendar",$id_calendar);
                      $ck=$this->db->delete($tb);
                     //  $ck=true;
                     if( $ck )
                     {
                         echo  json_encode(array("success"=>1));
                     }
                     elseif( !$ck )
                     {
                         echo  json_encode(array("success"=>0));
                     }  
              }     
        }
        
         //http://10.87.196.170/document3/index.php/welcome/call_date_calendar
public  function call_date_calendar()
{
      $this->user_model->login();  //for checklogin
      $tb1="tb_calendar";
      $tb2="tb_academic";
      $tb3="tb_activities";

      $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
      $this->db->join($tb3,$tb1.".activities=".$tb3.".id_activities","left");
       
      $query=$this->db->get($tb1);
      foreach($query->result() as $row)
      {
           $rows[]=$row;
      }
            echo json_encode($rows);

}

    //http://10.87.196.170/document3/index.php/welcome/search_calendar
     public function search_calendar() //ค้นหา จากตัวบุคคล
     {
          $this->user_model->login();  //for checklogin
             $sr_id_academic=trim($this->input->get_post("sr_id_academic"));
            //echo br();
             $sr_activities=trim($this->input->get_post("sr_activities"));
             // echo br();
              $sr_begin_date=trim($this->input->get_post("sr_begin_date"));
             // echo br();
              
             // $tb="tb_calendar";
                    $tb1="tb_calendar";
                    $tb2="tb_academic";
                    $tb3="tb_activities";
                    
              if(   $sr_id_academic  >  0  &&  $sr_activities == ""  &&   $sr_begin_date == ""  )
              {
                    $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                    $this->db->join($tb3,$tb1.".activities=".$tb3.".id_activities","left");
                    $q=$this->db->get_where($tb1,array($tb1.".id_academic"=>$sr_id_academic));   
                    $num=$q->num_rows();
                    if( $num > 0 )
                    {
                          //echo json_encode(array("success"=>1));
                        //  $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                       //   $query=$this->db->get($tb1);
                          foreach($q->result() as $row)
                          {
                              $rows[]=$row;
                          }
                            echo json_encode($rows);
                    } 
              }
              
              
              else if( $sr_activities != ""  &&    $sr_id_academic == ""  &&   $sr_begin_date == ""   )
              {
                  
                       $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                       $this->db->join($tb3,$tb1.".activities=".$tb3.".id_activities","left");
                       $q=$this->db->get_where($tb1,array($tb1.".activities"=>$sr_activities));
                       $num=$q->num_rows();
                       if( $num > 0 )
                       {
                          //echo json_encode(array("success"=>1));
                        //  $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                       //   $query=$this->db->get($tb1);
                          foreach($q->result() as $row)
                          {
                              $rows[]=$row;
                          }
                            echo json_encode($rows);
                         } 
                   
                   
              }
              else if( $sr_activities == ""  &&    $sr_id_academic == ""  &&   $sr_begin_date  != ""   )
              {
                  
                      //echo   $sr_begin_date;  // 10/28/2017
                       $ex = explode("/",$sr_begin_date);
                       $conv_begin_date =$ex[2]."-".$ex[0]."-".$ex[1];
                       
                       
                       $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                       $this->db->join($tb3,$tb1.".activities=".$tb3.".id_activities","left");
                       $q=$this->db->get_where($tb1,array($tb1.".begin_date"=>$conv_begin_date));
                       $num=$q->num_rows();
                        if( $num > 0 )
                       {
                          //echo json_encode(array("success"=>1));
                        //  $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                       //   $query=$this->db->get($tb1);
                          foreach($q->result() as $row)
                          {
                              $rows[]=$row;
                          }
                            echo json_encode($rows);
                         } 
                   
                   
              }
              
             else  if(   $sr_id_academic  >  0  &&  $sr_activities != ""  &&   $sr_begin_date == ""  )
              {
                   $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                    $this->db->join($tb3,$tb1.".activities=".$tb3.".id_activities","left");
                    $q=$this->db->get_where($tb1,array($tb1.".id_academic"=>$sr_id_academic,$tb1.".activities"=>$sr_activities));   
                    $num=$q->num_rows();
                    if( $num > 0 )
                    {
                          //echo json_encode(array("success"=>1));
                        //  $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                       //   $query=$this->db->get($tb1);
                          foreach($q->result() as $row)
                          {
                              $rows[]=$row;
                          }
                            echo json_encode($rows);
                    } 
                   
               }
              else  if(   $sr_id_academic  >  0  &&  $sr_activities == ""  &&   $sr_begin_date != ""  )
              {
                  
                      //echo   $sr_begin_date;  // 10/28/2017
                       $ex = explode("/",$sr_begin_date);
                       $conv_begin_date =$ex[2]."-".$ex[0]."-".$ex[1];
                       
                       
                       
                    $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                    $this->db->join($tb3,$tb1.".activities=".$tb3.".id_activities","left");
                    $q=$this->db->get_where($tb1,array($tb1.".id_academic"=>$sr_id_academic,$tb1.".begin_date"=>$conv_begin_date));   
                    $num=$q->num_rows();
                    if( $num > 0 )
                    {
                          //echo json_encode(array("success"=>1));
                        //  $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                       //   $query=$this->db->get($tb1);
                          foreach($q->result() as $row)
                          {
                              $rows[]=$row;
                          }
                            echo json_encode($rows);
                    } 
                     
              }
              else  if(   $sr_id_academic  >  0  &&  $sr_activities != ""  &&   $sr_begin_date != ""  )
              {
                  
                      //echo   $sr_begin_date;  // 10/28/2017
                       $ex = explode("/",$sr_begin_date);
                       $conv_begin_date =$ex[2]."-".$ex[0]."-".$ex[1];
                       
                       
                       
                    $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                    $this->db->join($tb3,$tb1.".activities=".$tb3.".id_activities","left");
                    $q=$this->db->get_where($tb1,array($tb1.".id_academic"=>$sr_id_academic,$tb1.".begin_date"=>$conv_begin_date,$tb1.".activities"=>$sr_activities));   
                    $num=$q->num_rows();
                    if( $num > 0 )
                    {
                          //echo json_encode(array("success"=>1));
                        //  $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                       //   $query=$this->db->get($tb1);
                          foreach($q->result() as $row)
                          {
                              $rows[]=$row;
                          }
                            echo json_encode($rows);
                    } 
                     
              }
               
             
               
              
         
     }


        //http://10.87.196.170/document2/index.php/welcome/call_by_date_calendar
        public   function    call_by_date_calendar()
        {
             $this->user_model->login();  //for checklogin
                $begin_date=trim($this->input->get_post("begin_date"));  //09/17/2017
           // echo br();
               $tb="tb_calendar";
               
             if(  $begin_date != ""  )
             {
                   $ex=explode("/",$begin_date);
                   $conv_begin_date= $ex[2]."-".$ex[0]."-".$ex[1];
                  // echo br();
                   
                   $query=$this->db->get_where($tb,array("begin_date"=>$conv_begin_date));
                     $ck=$query->num_rows();

                   
                   if( $ck  > 0 )
                   {
                         $tb1="tb_calendar";
                         $tb2="tb_academic";
                         $tb3="tb_activities";
                         
                         $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                         $this->db->join($tb3,$tb1.".activities=".$tb3.".id_activities","left");
                         
                         $query=$this->db->get_where($tb1,array($tb1.".begin_date"=>$conv_begin_date));
                         //echo   $query->num_rows();
                           foreach($query->result() as $row)
                            {
                                 $rows[]=$row;
                            }
                           echo json_encode($rows);
                   }

                  
             }
             else
             {
                                        $begin_date="";
                 
                 
                 
                 
                                        $tb1="tb_calendar";
                                          $tb2="tb_academic";
                                            $tb3="tb_activities";
                                            
                                          $this->db->join($tb2,$tb1.".id_academic=".$tb2.".id_academic","left");
                                           $this->db->join($tb3,$tb1.".activities=".$tb3.".id_activities","left");
                                           
                                          $query=$this->db->get();
                                          //echo   $query->num_rows();
                                            foreach($query->result() as $row)
                                             {
                                                  $rows[]=$row;
                                             }
                                            echo json_encode($rows);
                   
                 
                       //$this->call_date_calendar();
             }
             
             
             
             
             
            
        }

        //http://10.87.196.170/document2/index.php/welcome/insert_calendar
        public  function  insert_calendar()
        {
             $this->user_model->login();  //for checklogin
             $id_academic=trim($this->input->get_post("id_academic"));
             //echo br();
             
             $activities=trim($this->input->get_post("activities")); //กิจกรรม
            // echo br();
             
            $begin_date=trim($this->input->get_post("begin_date"));  //10/30/2017
           //echo br();
             
             
             if( $begin_date != "" )
             {
                  $ex=explode( "/", $begin_date );
                  $conv_begin_date=$ex[2]."-".$ex[0]."-".$ex[1];
                 
             }else
             {
                  $conv_begin_date="";
             }
             
             //echo $conv_begin_date;
             //echo br();
             
             $end_date=trim($this->input->get_post("end_date_calendar")); //ถึงวันที่
           // echo br();
             if(  $end_date != "" )
             {
                 $ex=explode("/",$end_date);
                 $conv_end_date=$ex[2]."-".$ex[0]."-".$ex[1];
             }
             else
             {
                 $conv_end_date="";
             }
             
             //echo  $conv_end_date;
             //echo br();
             
             $subject=trim($this->input->get_post("subject_calendar")); //หัวข้อ
              //echo br();
              
               $place=trim($this->input->get_post("place")); //สถานที่
             //echo br();
              
               $detail=trim($this->input->get_post("detail")); //รายละเอียด
              //echo br();
              
               $expenses=trim($this->input->get_post("expenses")); //ค่าใช้จ่าย
              //echo br();
              
              $borrow=trim($this->input->get_post("borrow")); //เงินยืม
             // echo br();
              
             $remark=trim($this->input->get_post("remark")); //หมายเหตุ
            // echo br();
             
             //วัน เวลาที่มีการบันทึก
             
             $date_record=date("Y-m-d");  //วันที่บันทึก
             //echo br();
             
            
             $data=array(
                // 'id_calendar'=>NULL,
                 'id_academic'=>$id_academic,
                 'activities'=>$activities,
                 'begin_date'=>$conv_begin_date,
                 'end_date'=>$conv_end_date,
                 'subject'=>$subject,
                 'place'=>$place,
                 'detail'=>$detail,
                 'expenses'=>$expenses, //ค่าใช้จ่าย
                 'borrow'=>$borrow, //เงินยืม
                 'remark'=>$remark,
                 'date_record'=>$date_record,  //วันที่บัีนทึก
             );
             
             //print_r($data);
             
               $id_calendar=trim($this->input->get_post("id_calendar"));
               
               
               if(    $id_calendar == ""  )
               { 
                            $tb="tb_calendar";


                            $ck=$this->db->insert($tb,$data);
                            if( $ck )
                            {  
                                echo json_encode(array("success"=>1)); 
                            }
                            elseif( !$ck )
                            {
                                echo json_encode(array("success"=>0)); 
                            }
               }
               else
               {
                    echo json_encode(array("success"=>11)); 
                   
               }
              
              
             
        }
        
    //http://10.87.196.170/document3/index.php/welcome/update_calendar  
   public function  update_calendar()
   {
       $this->user_model->login();  //for checklogin
       
        $this->user_model->login();  //for checklogin
             $id_academic=trim($this->input->get_post("id_academic"));
             //echo br();
             
             $activities=trim($this->input->get_post("activities")); //กิจกรรม
            // echo br();
             
            $begin_date=trim($this->input->get_post("begin_date"));  //10/30/2017
           //echo br();
             
             
             if( $begin_date != "" )
             {
                  $ex=explode( "/", $begin_date );
                  $conv_begin_date=$ex[2]."-".$ex[0]."-".$ex[1];
                 
             }else
             {
                  $conv_begin_date="";
             }
             
             //echo $conv_begin_date;
             //echo br();
             
             $end_date=trim($this->input->get_post("end_date_calendar")); //ถึงวันที่
           // echo br();
             if(  $end_date != "" )
             {
                 $ex=explode("/",$end_date);
                 $conv_end_date=$ex[2]."-".$ex[0]."-".$ex[1];
             }
             else
             {
                 $conv_end_date="";
             }
             
             //echo  $conv_end_date;
             //echo br();
             
             $subject=trim($this->input->get_post("subject_calendar")); //หัวข้อ
              //echo br();
              
               $place=trim($this->input->get_post("place")); //สถานที่
             //echo br();
              
               $detail=trim($this->input->get_post("detail")); //รายละเอียด
              //echo br();
              
               $expenses=trim($this->input->get_post("expenses")); //ค่าใช้จ่าย
              //echo br();
              
              $borrow=trim($this->input->get_post("borrow")); //เงินยืม
             // echo br();
              
             $remark=trim($this->input->get_post("remark")); //หมายเหตุ
            // echo br();
             
             //วัน เวลาที่มีการบันทึก
             
             $date_record=date("Y-m-d");  //วันที่บันทึก
             //echo br();
             
            $id_calendar=trim($this->input->get_post("id_calendar"));
            
            
             $data=array(
                // 'id_calendar'=>NULL,
                 'id_academic'=>$id_academic,
                 'activities'=>$activities,
                 'begin_date'=>$conv_begin_date,
                 'end_date'=>$conv_end_date,
                 'subject'=>$subject,
                 'place'=>$place,
                 'detail'=>$detail,
                 'expenses'=>$expenses, //ค่าใช้จ่าย
                 'borrow'=>$borrow, //เงินยืม
                 'remark'=>$remark,
              //   'date_record'=>$date_record,  //วันที่บัีนทึก
             );
             
            // print_r($data);
             
           if(  $id_calendar > 0   )  
           {   
                        $tb="tb_calendar";
                        $this->db->where("id_calendar",$id_calendar);
                        $ck=$this->db->update($tb,$data);
                        if( $ck )
                        {
                            echo  json_encode(array("success"=>1));
                        }
                        elseif( !$ck )
                        {
                            echo  json_encode(array("success"=>0));
                        }
           }
           else
           {
                echo  json_encode(array("success"=>11));
           }
                 
       
   }

 //http://10.87.196.170/document3/index.php/welcome/call_json_calendar
public  function  call_json_calendar() //เรียกดูตารางกิจกรรม
{
       $this->user_model->login();  //for checklogin
       $tb="tb_calendar";
       $query=$this->db->get($tb);
       foreach($query->result() as $row)
       {
           $rows[]=$row;
       }
       echo json_encode($rows);
    
}


//http://10.87.196.170/document3/index.php/welcome/call_update_calendar
public  function call_update_calendar()
{
    $this->user_model->login();  //for checklogin
    $id_calendar =trim($this->input->get_post("id_calendar"));
    $tb1="tb_calendar";
    $query=$this->db->get($tb1);
    foreach($query->result() as $row)
    {
        $rows[]=$row;
    }
    echo json_encode($rows);
    
}

//http://10.87.196.170/document3/index.php/welcome/call_id_update_calendar
public function call_id_update_calendar()
{
     $this->user_model->login();  //for checklogin
     
    //id_calendar
     
    $id_calendar =trim($this->input->get_post("id_calendar"));
    $tb1="tb_calendar";
    
    $query=$this->db->get_where($tb1,array("id_calendar"=>$id_calendar));
    foreach($query->result() as $row)
    {
        $rows[]=$row;
    }
    echo json_encode($rows);
    
 
}




//http://10.87.196.170/document3/index.php/welcome/json_excellence
public function json_excellence()  //ศูนย์การดูแล AND excellence
{
      $this->user_model->login();  //for checklogin

    	//$tb="tb_main1";
          $tb=$this->tb;
          $this->db->order_by("id_main1","DESC");
			//$this->db->limit(30,0);
			$query=$this->db->get_where($tb,array("type_record"=>3),5);
			foreach($query->result() as $row)
			{
					$rows[]=$row;
			}
			 //echo  json_encode($rows);
			 echo json_encode($rows);
}

//http://10.87.196.170/document3/index.php/welcome/search_excellence_date_in  ค้นหาจากวันที่หนังสือเข้าและออก     ศูนย์การดูแลฯ
 public function search_excellence_date_in()  //ค้นหาจากวันที่หนังสือเข้าและออก     ศูนย์การดูแลฯ
         {
                 $this->user_model->login();  //for checklogin
               //  $date_book=trim($this->input->get_post("date_book")); //11/08/2017<br />
                 
                 
                 
                  $date_book=trim($this->input->get_post("date")); //11/08/2017<br />
                if(   strlen(   $date_book  )  >  0 )
                {
                       $ex=explode("/",$date_book);
                       $conv_date=   $ex[2]."-".$ex[0]."-".$ex[1];
                }
                else{
                    
                        $conv_date=  "";
                }
                
                   $type_record=3;  //ของจริง
                 //  $type_record=2; //simulate
                //echo br();
                
                   $type_document=trim($this->input->get_post("type_document")); 
                // echo br();
                 
                   
             
                $tb=$this->tb;
               
                 $q=$this->db->get_where($tb,array("date"=> $conv_date, "type_record"=>$type_record, "type_document"=>$type_document  ));  // ของจริง
               //  $q=$this->db->get($tb,10);
                 $num=$q->num_rows();
                
                
                if( $num > 0 ) //พบการค้นหา
               { 
                                foreach($q->result() as $row)
                                {
                                    $rows[]=$row;
                                }
                                  echo  json_encode($rows);
                }
                
     
                

         }

 public function search_excellence2()
        { //begin function
     
     
                        $this->user_model->login();  //for checklogin
                        $tb=$this->tb;
                        $to=trim($this->input->get_post("to"));
                     // echo br();
     
                        $date=trim($this->input->get_post("date"));
                      //echo br();
                      if( $date != "" )    //  09/13/2017
                      {
                            $ex=explode("/",$date);
                            $conv_date=$ex[2]."-".$ex[0]."-".$ex[1];

                      }
                      else
                      {
                          $conv_date = "";
                      }
                      
                      //echo $conv_date;
                     // echo br();

                      $type_record=3;
                      
                     $type_document=trim($this->input->get_post("type_document")); 
                
                     $subject=trim($this->input->get_post("subject"));
                   
                      
                      $tb=$this->tb;
                      
                      if(   $to  != ""   &&    $conv_date == "" )
                      {

                              $str="  SELECT   *  FROM  $tb  WHERE `to` LIKE ('%$to%')     AND   `type_record`=$type_record   AND   `type_document`=$type_document    ";
                              $query=$this->db->query( $str);
                              $num=$query->num_rows();
                              if( $num > 0 )
                              {
                                  foreach( $query -> result() as $row)
                                  {
                                      $rows[]=$row;
                                  }
                                     echo  json_encode($rows);
                              }
                        
                      }
                      elseif(   $conv_date != ""  &&   $to == ""   )  
                      {
                              // $str="  SELECT   *  FROM  $tb  WHERE   `date`='$conv_date'   AND   `type_record`=$type_record   AND   `type_document`=$type_document    ";  //ของเดิม
                               //date_record
                              $str="  SELECT   *  FROM  $tb  WHERE   `date_record`='$conv_date'   AND   `type_record`=$type_record   AND   `type_document`=$type_document    ";  //ของใหม่วันที่ลงรับเอกสาร
                               
                               $query=$this->db->query( $str);
                               $num=$query->num_rows();
                                 if( $num > 0 )
                                    {
                                        foreach( $query -> result() as $row)
                                        {
                                            $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                    }
                               
                      }
                      elseif( $to  != ""   &&    $conv_date != "" )  //ข้อมูลทดสอบ  ,   ส   ,   08/02/2017
                      {
                              // $str="  SELECT   *  FROM  $tb  WHERE       `to` LIKE ('%$to%')     AND      `date`='$conv_date'   AND       `type_record`=$type_record   AND   `type_document`=$type_document    ";
                                 //date_record
                                 $str="  SELECT   *  FROM  $tb  WHERE       `to` LIKE ('%$to%')     AND      `date_record`='$conv_date'   AND       `type_record`=$type_record   AND   `type_document`=$type_document    ";
                               
                               $query=$this->db->query( $str);
                               $num=$query->num_rows();
                               if( $num > 0 )
                                    {
                                        foreach( $query -> result() as $row)
                                        {
                                            $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                    }
                      }
                      //subject
                      elseif(  $subject  != ""      )  //เรื่องอย่างเดียว
                      {
                            $str="  SELECT   *  FROM  $tb  WHERE     `subject`    LIKE ('%$subject%')      AND       `type_record`=$type_record   AND   `type_document`=$type_document    ";
                                $query=$this->db->query( $str);
                                     $num=$query->num_rows();
                                     if( $num > 0 )
                                          {
                                              foreach( $query -> result() as $row)
                                              {
                                                  $rows[]=$row;
                                              }
                                                 echo  json_encode($rows);
                                          }
                          
                      }
                      
                      elseif(  $subject  != ""     &&    $conv_date != ""      )  //เรื่องและวัีนที่
                      {
                          
                            //$str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')          AND          `date`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                            //date_record 
                             $str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')          AND          `date_record`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                           
                            $query=$this->db->query( $str);
                                     $num=$query->num_rows();
                                     if( $num > 0 )
                                          {
                                              foreach( $query -> result() as $row)
                                              {
                                                  $rows[]=$row;
                                              }
                                                 echo  json_encode($rows);
                                          }
                          
                      } 
                       elseif(  $subject  != ""     &&    $conv_date != ""   &&    $to !=   ""      )  //เรื่องและวัีนที่
                       {
                           
                              // $str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')     AND    `to`  LIKE('%$to%')      AND          `date`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                              //date_record 
                                $str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')     AND    `to`  LIKE('%$to%')      AND          `date_record`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                              
                               $query=$this->db->query( $str);
                                     $num=$query->num_rows();
                                     if( $num > 0 )
                                          {
                                              foreach( $query -> result() as $row)
                                              {
                                                  $rows[]=$row;
                                              }
                                                 echo  json_encode($rows);
                                          }
                       }
                      
                      elseif( $to  == ""   &&    $conv_date == ""  &&   $subject  == ""   ) 
                      {
                           $str="  SELECT   *  FROM  $tb  WHERE      `type_record`=$type_record   AND   `type_document`=$type_document   ORDER  BY   `id_main1`   DESC   LIMIT  20   ";
                               $query=$this->db->query( $str);
                               $num=$query->num_rows();
                               if( $num > 0 )
                                    {
                                        foreach( $query -> result() as $row)
                                        {
                                            $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                    }
                          
                      }

    
        } //end function  


//http://10.87.196.170/document2/index.php/welcome/
public function search_excellence()
{
      $this->user_model->login();  //for checklogin

        // $tb="tb_main1";
				 // $tb="tb_main1_test";
           $tb=$this->tb;

            $type_document=trim($this->input->get_post("type_document"));
          //echo br();
            $date=trim($this->input->get_post("date"));  //การรับค่า => 07/28/2017
          //echo br();
          if(  $date != "" ) //ต้องแปลงให้เป็น  2017-01-26
                                  {
                                          $ex=explode("/",$date);
		       $conv_date=$ex[2]."-".$ex[0]."-".$ex[1];
		 }
          //echo    $conv_date;
          //echo br();

          $to=trim($this->input->get_post("to"));
          //echo br();



           if( $type_document  > 0  &&  $date !=   ""   &&   $to == ""    )
         	{
		$this->db->order_by("id_main1","DESC");
                                    // $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"date"=>$conv_date));
                                      $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"date"=>$conv_date));


                                        $check = $query->num_rows();
                                      if( $check  > 0  )
                                      {
                                           foreach($query->result() as $row)
                                        {
                                             $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                      }
            }

        else  if( $type_document  > 0  &&     $to != ""   &&  $date == ""  )
         	{
		$this->db->order_by("id_main1","DESC");
                                    // $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"date"=>$conv_date));
                                     $this->db->like("to",$to);
                                     //$query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"to"=>$to ));
                                     $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document ));

                                        $check = $query->num_rows();
                                      if( $check  > 0  )
                                      {
                                           foreach($query->result() as $row)
                                        {
                                             $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                      }
            }

            else if(  $type_document  > 0  &&  $date   !=   ""   &&   $to   !=   ""      )
            {
                 $this->db->order_by("id_main1","DESC");
                  $this->db->like("to",$to);
                // $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"to"=>$to , "date"=>$conv_date  ));
                   $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document , "date"=>$conv_date  ));
                   $check = $query->num_rows();
                                      if( $check  > 0  )
                                      {
                                           foreach($query->result() as $row)
                                        {
                                             $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                      }

            }

           else  if(  $type_document  > 0    &&   $date  == ""    &&   $to  ==   ""     )
           {
               $this->db->order_by("id_main1","DESC");
                                     $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document  ),20);
                                   //   $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document));


                                        $check = $query->num_rows();


                                      if( $check  > 0  )
                                      {
                                           foreach($query->result() as $row)
                                        {
                                             $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                      }

                                         //$this->load->view("export",$data);
           }





}



/*
 type_record
 1 	มูลนิธิตะวันฉายฯ
 2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
 3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ

 */

                                                  //http://10.87.196.170/document2/index.php/welcome/json_to
			public function json_to() //สำหรับ excellence  //เอกสารถึงใคร  type_record"=>3   ,  ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ
			{
                                                                      //$tb="tb_main1";
                                                                      $tb=$this->tb;
                                                                       $to = isset($_POST['q']) ? strval($_POST['q']) : '';
                                                                      $type_document=trim( $this->uri->segment(3) );
                                                                      //$type_document=1;
                                                                     //  $this->db->order_by("id_main1","desc");
                                                                     // $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document),25);
                                                                      $query=$this->db->query(" select   *   from    $tb      where      `type_record` = 3   AND    `type_document`=$type_document   AND  `to` like('%$to%')   LIMIT   30   ");
				    foreach($query->result() as $row)
				        {
				              $rows[]=$row;
				         }
				     echo  json_encode($rows);

			}
                                                    //http://10.87.196.170/document3/index.php/welcome/json_to_research
                                                     public function json_to_research()//เอกสารถึงใคร  type_record"=>2   ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
			{
                                                                      //$tb="tb_main1";
                                                                      $tb=$this->tb;

                                                                     $to = isset($_POST['q']) ? strval($_POST['q']) : '';

                                                                        $type_document=trim( $this->uri->segment(3) );
                                                                       // $type_document=1;
				//$this->db->like("to",$to);				 //$this->db->like('to');

                                                                      //$query=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>$type_document),25);
                                                                      $query=$this->db->query(" select   *   from    $tb      where      `type_record` = 2   AND    `type_document`=$type_document   AND  `to` like('%$to%')   LIMIT   30    ");


				    foreach($query->result() as $row)
				        {
				              $rows[]=$row;
				         }
				               echo  json_encode($rows);

			}
                                                         //http://10.87.196.170/document3/index.php/welcome/json_to_foundation
                                                        public function  json_to_foundation()//เอกสารถึงใคร  type_record"=>1 	มูลนิธิตะวันฉายฯ
                                                        {
                                                                                                      //$tb="tb_main1";
                                                                                                      $tb=$this->tb;

                                                                                                       $to = isset($_POST['q']) ? strval($_POST['q']) : '';

                                                                                                        $type_document=trim( $this->uri->segment(3) );
                                                                                                      //  $type_document=1;


                                                                    //  $query=$this->db->get_where($tb,array("type_record"=>1,"type_document"=>$type_document),25);
                                                                      $query=$this->db->query(" select   *   from    $tb      where      `type_record` = 1   AND    `type_document`=$type_document   AND  `to` like('%$to%')    LIMIT   30    ");



                                                                    foreach($query->result() as $row)
                                                                        {
                                                                              $rows[]=$row;
                                                                         }
                                                                               echo  json_encode($rows);

                                                        }
                //http://10.87.196.170/document3/index.php/welcome/export_sick
                 public function export_sick()
                 {
                          $this->user_model->login();  //for checklogin
                          $tb=$this->tb_sick;
                          $tb1="tb_staff";
                          $str1=" SELECT   *  FROM   $tb1    ";
                          $query1=$this->db->query($str1);
                          $num=$query1->num_rows();
                            if( $num > 0 )
                            {
                                  $data["q"]= $query1;
                                  $data["title"]=$this->title;
                                  $this->load->view("export_sick",$data);
                                
                            }
                 }
                                                        

               //http://10.87.196.170/document3/index.php/welcome/export_vacation
                public  function export_vacation()  //แสดงจำนวนวันลาทั้งหมด
                {
                        $this->user_model->login();  //for checklogin
                        $tb=$this->tb_vacation;
                        
                        $tb1="tb_staff";
                        $str1=" SELECT   *  FROM   $tb1    ";
                        $query1=$this->db->query($str1);
                        
                        $num=$query1->num_rows();
                        if( $num > 0 )
                        {
                               $data["q"]= $query1;
                               $data["title"]=$this->title;
                                
                                  //export_vacation
                                $this->load->view("export_vacation",$data);
                        }
                       
                        
                    
                }

                 //http://10.87.196.170/document2/index.php/welcome/export_data
                 public function export_data()//พิ่มพ์หนังสือ
                {
                      $this->user_model->login();  //for checklogin

                            header('Content-Type: text/html; charset=utf-8');


                       $type_record=trim($this->uri->segment(3));


                          $type_document=trim($this->uri->segment(4));


                         $to=urldecode($this->uri->segment(5));


                             $m=trim($this->uri->segment(6));
                            //echo br();

                             $d=trim($this->uri->segment(7));
                            //echo br();

                             $y=trim($this->uri->segment(8));
                            //echo br();

                             $conv_date=$y."-".$m."-".$d;
                            //echo $dmy;
                             //echo br();

                             // $tb="tb_main1";
                             //$tb="tb_main1_test";
                               $tb= $this->tb;
                            

                               //$this->db->order_by("id_main1","DESC");
                               
                               
/*
		if(  $type_record > 0  && $type_document > 0   &&  strlen($to) == 0   &&   strlen($conv_date) <= 2   )
		{
		     $data["q"]=$this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>$type_document));
		     $data["title"]=$this->title;
		     $this->load->view("export",$data);
	                   }
		  else if( $type_record > 0  &&  $type_document > 0   &&  strlen($to) > 0   &&   strlen($conv_date) <= 2   )
		 {
			  $data["q"]=$this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>$type_document,"to"=>$to));
			  $data["title"]=$this->title;
			  $this->load->view("export",$data);
		  }
		   else if( $type_record > 0  &&  $type_document > 0   &&  strlen($to) > 0   &&   strlen($conv_date) > 2 )
		 {
                                                                                                                                                            
		     //  $data["q"]=$this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>$type_document,"to"=>$to,"date"=>$conv_date));
                                         $data["q"]=$this->db->query("  SELECT  *  FROM  $tb  WHERE  `to`  LIKE('%$to%')   AND   `type_record`=$type_record   AND  `type_document`=$type_document   AND  'date'='$conv_date'     ");
		      $data["title"]=$this->title;
		     $this->load->view("export",$data);
		 }
 
 */
                               
                               
                        if( $to != ""  &&  $type_record != ""  &&   $type_document != ""   &&   $conv_date != ""    )   
                        {    
                                     $str="   SELECT   *  FROM    $tb    WHERE    `to`   LIKE('%$to%')    AND   `type_record`=$type_record     AND  `type_document`=$type_document   AND  `date`='$conv_date'     ;";
                                     $data["q"]=$this->db->query($str);
                                   
                                    // $data["q"]->num_rows();
                                     $data["title"]=$this->title;
                                     $this->load->view("export",$data);
                        }            
                               

                }//end function 

                  //http://10.87.196.170/document2/index.php/welcome/export_data1
                  public function export_data1()// //ไม่ระบุอะไรเลย
                    {
                         $this->user_model->login();  //for checklogin
                         $this->db->order_by("id_main1","DESC");

                            header('Content-Type: text/html; charset=utf-8');
                            $type_record=trim($this->uri->segment(3));
                            $type_document=trim($this->uri->segment(4));
                            /*
                             $to=urldecode($this->uri->segment(5));
                               $m=trim($this->uri->segment(6));
                               $d=trim($this->uri->segment(7));
                               $y=trim($this->uri->segment(8));
                               $conv_date=$y."-".$m."-".$d;
                             */

                            $tb= $this->tb;
                            $data["q"]=$this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>$type_document),20);
                            $data["title"]=$this->title;
                            $this->load->view("export",$data);
                    }

                     //  http://10.87.196.170/document3/index.php/welcome/export_data2/2/2/11/01/2017
                       public function export_data2()// //ระบุแค่วันที่
                        {
                             $this->user_model->login();  //for checklogin
                             $this->db->order_by("id_main1","DESC");

                                header('Content-Type: text/html; charset=utf-8');
                           
                               $type_record=trim($this->uri->segment(3));
                               // echo br();
                                
                                $type_document=trim($this->uri->segment(4));


                             /*
                             echo     $to=urldecode($this->uri->segment(5));
                             echo br();
                              *
                              */

                                   $m=trim($this->uri->segment(5));
                                   $d=trim($this->uri->segment(6));
                                   $y=trim($this->uri->segment(7));
                                   $conv_date=$y."-".$m."-".$d;

                                  //echo   $conv_date;
                                //   echo br();

                              if(  strlen($conv_date) >  2  )
                               {
                                   
                                   
                             $tb= $this->tb;
                             $data["q"]=$this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>$type_document,"date_record"=>$conv_date));
                   $data["title"]=$this->title;
                   $this->load->view("export",$data);
                   
                   
                               }
                   
                   

                        }

                        public function export_data3()// //ระบุแค่ชื่อ
                        {
                             $this->user_model->login();  //for checklogin
                             $this->db->order_by("id_main1","DESC");
                                header('Content-Type: text/html; charset=utf-8');
                              $type_record=trim($this->uri->segment(3));


                              $type_document=trim($this->uri->segment(4));


                              $too=trim(urldecode($this->uri->segment(5)));
                               //นางดารณี ปราการกมานันท์ (ภาควิชาวิสัญญีวิทยา)

                              //echo br();

                                   /*
                                   $m=trim($this->uri->segment(5));
                                   $d=trim($this->uri->segment(6));
                                   $y=trim($this->uri->segment(7));
                                   $conv_date=$y."-".$m."-".$d;
                                   */

                              
                              /*
                                    if( $too != ""  )
                                    {
                                            $tb= $this->tb;
                                            $data["q"]=$this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>$type_document,"to"=>$too));
                                         //    $data["q"]=$this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>$type_document,"to"=>"นางดารณี ปราการกมานันท์ (ภาควิชาวิสัญญีวิทยา)"));

                                             $data["q"]->num_rows();
                                           // echo br();
                                            $data["title"]=$this->title;
                                            $this->load->view("export",$data);
                                    }
                                   */
                              
                               if( $too != ""  )
                               {
                                     $tb= $this->tb;
                                     $str=" SELECT  *  FROM    $tb   WHERE   `to`    like('%$too%')   AND   `type_record`=$type_record   AND   `type_document`=$type_document  ;    ";
                                     $data["q"]=$this->db->query($str);
                                       //echo    $data["q"]->num_rows();
                                       $data["title"]=$this->title;
                                        $this->load->view("export",$data);
                                     
                               }
                                   
                                   
                                    
                                    

                        }

                //http://10.87.196.170/document2/index.php/welcome/update_tb_main1_3
                public function delete_tb_main1_3()
                        {
                            $this->user_model->login();  //for checklogin


                                 $id_main1=trim($this->input->get_post("id_main1"));

                               if( $id_main1 > 0 )
                               {
                                          $tb= $this->tb;
                                         $this->db->where("id_main1",$id_main1);
                                          $ck= $this->db->delete($tb);
                                        // $ck=1;
                                        // $ck=0;
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



                //http://10.87.196.170/document2/index.php/welcome/update_tb_main1_3
                public function  update_tb_main1_3()//excellence  "type_record"=>3
                {
                      $this->user_model->login();  //for checklogin


                     header('Content-Type: text/html; charset=UTF-8');
                       //echo "<br>";

                         $id_main1=trim($this->input->get_post("id_main1"));
                        //echo br();
                        $registration_receive21=trim($this->input->get_post("registration_receive21"));   //เลขทะเบียนส่ง   1


                        $at_receive21=trim($this->input->get_post("at_receive21"));  //ที่       2
	     // echo br();												  //echo  "<br>";
	       $date1_receive21=trim($this->input->get_post("date1_receive21")); //ลงวันที่           3


                      //07/25/2017
	    if(  strlen($date1_receive21) > 0    )
	    {
		 $ex=explode("/",$date1_receive21);
	                  $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
                              //echo br();
	    }

	      $from_receive21=trim($this->input->get_post("from_receive21")); //จาก       4
	     //echo br();
	      $to_receive21=trim($this->input->get_post("to_receive21"));  //ถึง        5
	    //echo br();
	      $subject_receive21=trim($this->input->get_post("subject_receive21"));  //เรื่อง       6
	    // echo br();
	     $practice_receive21=trim($this->input->get_post("practice_receive21"));  //การปฏฺิบัติ       7
	    // echo br();
	      $note_receive21=trim($this->input->get_post("note_receive21")); //หมายเหตุ      8
	   //  echo br();
	      $type_record=3; //ประเภทของตารางที่ทำการบันทึก    9
	      $type_document=1;  // 1=หนังสือรับ,2=หนังสือส่ง

 //------------------------------- upload file-------------------------------------------
                        // print_r($_FILES)
	        $file1name = $_FILES["file21"]['name'];  // ชื่อของไฟล์      10
	     // echo br();
	      $file1tmp  =$_FILES['file21']["tmp_name"]; // tmp folder

	      $file1Type= $_FILES['file21']["type"]; //type of file

	      $file1Size= $_FILES['file21']["size"]; //size

	      $file1ErrorMsg = $_FILES['file21']["error"]; // 0=false 1=true


	       date_default_timezone_set("Asia/Bangkok");
	       $sess_timerecord=date("Y-m-d H:s:00");


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if(   $file1name != ""  )
																																										 {

																																										     $data=array(
																																											 "registration"=> $registration_receive21,
																																											 "at"=> $at_receive21,
																																											 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																				"filename"=>$file1name,
																																																				 "type_document"=>$type_document,
																																																				 "date_record"=>$sess_timerecord,
																																																		 );



																																																 $cp=copy($file1tmp ,  "upload/". $file1name );

																																										  }
																																										 else
																																										 {
																																													 $data=array(
																																																				 "registration"=>$registration_receive21,
																																																				 "at"=> $at_receive21,
																																																				 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																			//  "filename"=>$file1name,
																																																				"type_document"=>$type_document,
																																																			 "date_record"=>$sess_timerecord,
																																																		 );

																																										 }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                $tb= $this->tb;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if(  $id_main1 >  0   &&  strlen($id_main1) > 0  )
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        $this->db->where("id_main1", $id_main1);

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


                 //http://10.87.196.170/document2/index.php/welcome/insert_tb_main1_3
	public function insert_tb_main1_3() //excellence  "type_record"=>3
	{
	      $this->user_model->login();  //for checklogin


	     header('Content-Type: text/html; charset=UTF-8');

																			 //echo print_r($_POST);
																			 //echo  "<hr>";
																			 #-- หนังสือรับ หนังสือเ้ข้า  มูลนิธิตะวันฉายฯ
																	$registration_receive21=trim($this->input->get_post("registration_receive21"));   //เลขทะเบียนส่ง   1
														  //echo "<br>";
														      $at_receive21=trim($this->input->get_post("at_receive21"));  //ที่       2
														  //echo  "<br>";
															 $date1_receive21=trim($this->input->get_post("date1_receive21")); //ลงวันที่           3
                              //07/25/2017
															if(  strlen($date1_receive21) > 0    )
															{
																   $ex=explode("/",$date1_receive21);
																	    $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
																	 //echo br();
															}

														     $from_receive21=trim($this->input->get_post("from_receive21")); //จาก       4
															 //echo  "<br>";
															 $to_receive21=trim($this->input->get_post("to_receive21"));  //ถึง        5
															 //echo  "<br>";
															 $subject_receive21=trim($this->input->get_post("subject_receive21"));  //เรื่อง       6
															 //echo  "<br>";
															  $practice_receive21=trim($this->input->get_post("practice_receive21"));  //การปฏฺิบัติ       7
															  //echo  "<br>";
															 $note_receive21=trim($this->input->get_post("note_receive21")); //หมายเหตุ      8
															 //echo  "<br>";
																																				 // <input type="hidden"  id="type_record11"  name="type_record11"  value="1"  />
																																			/*

																																												 1 	มูลนิธิตะวันฉายฯ
																												 2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
																												 3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ

																																			 */
																																			 //"type_record"=>3
																  $type_record=3; //ประเภทของตารางที่ทำการบันทึก    9
																		//echo br();																//  echo  "<br>";
																 $type_document=1;  // 1=หนังสือรับ,2=หนังสือส่ง
	                                  //echo br();
																																		//		$date1_receive21_time=trim($this->input->get_post("date1_receive21_time")); //ประเภทของตารางที่ทำการบันทึก    9


																																		 //  print_r($_FILES);

																																											 //------------------------------- upload file-------------------------------------------
																																									// print_r($_FILES)
																$file1name = $_FILES["file21"]['name'];  // ชื่อของไฟล์      10
														    //echo br();
																 $file1tmp  =$_FILES['file21']["tmp_name"]; // tmp folder
																//echo br();
																 $file1Type= $_FILES['file21']["type"]; //type of file
																 //echo br();
																 $file1Size= $_FILES['file21']["size"]; //size
																 //echo br();
																 $file1ErrorMsg = $_FILES['file21']["error"]; // 0=false 1=true
															  //echo br();

																  date_default_timezone_set("Asia/Bangkok");
														      $sess_timerecord=date("Y-m-d H:s:00");




																																								if(   $file1name != ""  )
																																										 {

																																																		 $data=array(
																																																				 "registration"=> $registration_receive21,
																																																				 "at"=> $at_receive21,
																																																				 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																				"filename"=>$file1name,
																																																				 "type_document"=>$type_document,
																																																				 "date_record"=>$sess_timerecord,
																																																		 );



																																																 $cp=copy($file1tmp ,  "upload/". $file1name );

																																										  }
																																										 else
																																										 {
																																													 $data=array(
																																																				 "registration"=>$registration_receive21,
																																																				 "at"=> $at_receive21,
																																																				 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																			//  "filename"=>$file1name,
																																																				"type_document"=>$type_document,
																																																			 "date_record"=>$sess_timerecord,
																																																		 );

																																										 }

																			  //print_r($data);


																				 //$tb="tb_main1";
																				 // `tb_main1_test`

																				// $tb="tb_main1_test";
																				 $tb= $this->tb;




																				$ck=$this->db->insert($tb,$data);

																				   //$ck=1;
                                                                                                                                                                                                                                                                                                                                                                //  $ck=0;
                                                                                                                                                                                                                                                                                                                                                                  
                                                                                                                                                                                                                                                                                                                                                                  if( $ck )
																				 {
																					 echo "1";
																				 }
																				 else {
																				 	echo "0";
																				 }



		}



              //http://10.87.196.170/document2/index.php/welcome/insert_tb_main1_send_3/#
                public function insert_tb_main1_send_3()  //เอกสารส่ง    //excellence  "type_record"=>3
                {
                       $this->user_model->login();  //for checklogin


                           $registration_send21=trim($this->input->get_post("registration_send21"));   //เลขทะเบียนส่ง   1
                           //echo br();

                           $date1_send21=trim($this->input->get_post("date1_send21")); //ลงวันที่           3
                          // echo br();

                           if(  strlen( $date1_send21) > 0    )
		{
	                            $ex=explode("/", $date1_send21);
		          $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
		            //echo br();
		 }




                                 $from_send21=trim($this->input->get_post("from_send21")); //จาก       4
     

                                 $to_send21=trim($this->input->get_post("to_send21"));  //ถึง        5
                           //echo br();

                                  $subject_send21=trim($this->input->get_post("subject_send21"));  //เรื่อง       6
                           //echo br();

                                    $practice_send21=trim($this->input->get_post("practice_send21"));  //การปฏฺิบัติ       7
                         // echo br();

                                    $note_send21=trim($this->input->get_post("note_send21")); //หมายเหตุ      8
                         // echo br();

                           //$at_send21=trim($this->input->get_post("at_send21"));  //ที่       2




                                                                        
                                                                       /*

                                                                                          1 	มูลนิธิตะวันฉายฯ
		                                                      2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
	                                                      	3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ

                                                                        */
                                                                   // $type_record=trim($this->input->get_post("type_record21")); //ประเภทของตารางที่ทำการบันทึก    9
                                                             $type_record=3;


                                                             $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง


                                                              //   $date1_record21_time=trim($this->input->get_post("date1_record21_time"));

                                                                                         //------------------------------- upload file-------------------------------------------
                                                                                   // print_r($_FILES)
                                                                                  $file1name = $_FILES["file21"]['name'];  // ชื่อของไฟล์      10
                                                                    //echo br();
                                                                                 $file1tmp  =$_FILES['file21']["tmp_name"]; // tmp folder
                                                                                //  echo br();
                                                                                 $file1Type= $_FILES['file21']["type"]; //type of file
                                                                                //  echo br();
                                                                                $file1Size= $_FILES['file21']["size"]; //size
                                                                                //  echo br();
                                                                                  $file1ErrorMsg = $_FILES['file21']["error"]; // 0=false 1=true
                                                                                // echo br();

                                                               date_default_timezone_set("Asia/Bangkok");
		                            $sess_timerecord=date("Y-m-d H:s:00");



 if(   $file1name != ""  )
     {
$data=array(
      "registration"=>  $registration_send21 ,

   "date"=>$conv_date1_receive21,
   "from"=>$from_send21,
    "to"=> $to_send21,
  "subject"=>$subject_send21,
    "practice"=> $practice_send21,
    "note"=>$note_send21,
    "type_record"=>  $type_record,
    "filename"=>$file1name,
     "type_document"=>$type_document,
     "date_record"=>$sess_timerecord,
    );
 $cp=copy($file1tmp ,  "upload/". $file1name );
 
 
     }//end if

     else{
       $data=array(
 "registration"=> $registration_send21 ,

 "date"=>$conv_date1_receive21,
 "from"=>$from_send21,
  "to"=> $to_send21,
  "subject"=>$subject_send21,
  "practice"=> $practice_send21,
  "note"=>$note_send21,
  "type_record"=>  $type_record,
  "filename"=>$file1name,
 "type_document"=>$type_document,
  "date_record"=>$sess_timerecord,
 );

     }
     
    // print_r($data);
     

     $tb=$this->tb;
     $ck=$this->db->insert($tb,$data);

     
     if( $ck )
     {
         echo 1;
     }
     else
     {
         echo 0;
     }
   

}//end function

        //http://10.87.196.170/document2/index.php/welcome/update_tb_main1_send_3
        public function update_tb_main1_send_3()
        {
               $this->user_model->login();  //for checklogin



              $id_main1_send_excellence=trim($this->input->get_post("id_main1_send_excellence"));
              //echo br();

               $registration_send21=trim($this->input->get_post("registration_send21"));   //เลขทะเบียนส่ง   1
             //  echo br();

                       $date1_send21=trim($this->input->get_post("date1_send21")); //ลงวันที่           3


                           if(  strlen( $date1_send21) > 0    )
		{
	                            $ex=explode("/", $date1_send21);
		          $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
		          // echo br();
		 }



                              $from_send21=trim($this->input->get_post("from_send21")); //จาก       4
                         //  echo br();

                                  $to_send21=trim($this->input->get_post("to_send21"));  //ถึง        5
                          // echo br();

                             $subject_send21=trim($this->input->get_post("subject_send21"));  //เรื่อง       6
                          // echo br();

                                 $practice_send21=trim($this->input->get_post("practice_send21"));  //การปฏฺิบัติ       7
                         //echo br();

                                  $note_send21=trim($this->input->get_post("note_send21")); //หมายเหตุ      8
                        //  echo br();







                                                                       /*

                                                                                          1 	มูลนิธิตะวันฉายฯ
		                                                      2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
	                                                      	3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ

                                                                        */
                                                                   // $type_record=trim($this->input->get_post("type_record21")); //ประเภทของตารางที่ทำการบันทึก    9
                                                             $type_record=3;


                                                             $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง




                                                                                         //------------------------------- upload file-------------------------------------------
                                                                                   // print_r($_FILES)
                                                                             $file1name = $_FILES["file21"]['name'];  // ชื่อของไฟล์      10
                                                         //echo br();
                                                                                 $file1tmp  =$_FILES['file21']["tmp_name"]; // tmp folder
                                                                                //  echo br();
                                                                                 $file1Type= $_FILES['file21']["type"]; //type of file
                                                                                //  echo br();
                                                                                $file1Size= $_FILES['file21']["size"]; //size
                                                                                //  echo br();
                                                                                  $file1ErrorMsg = $_FILES['file21']["error"]; // 0=false 1=true
                                                                                // echo br();

                                                               date_default_timezone_set("Asia/Bangkok");
		                          $sess_timerecord=date("Y-m-d H:s:00");
                                                       //  echo br();



                                                          if(   $file1name != ""  )
     {
$data=array(
      "registration"=>  $registration_send21 ,
     // "at"=> $at_receive21,
    "date"=>$conv_date1_receive21,
   "from"=>$from_send21,
    "to"=> $to_send21,
   "subject"=>$subject_send21,
    "practice"=> $practice_send21,
    "note"=>$note_send21,
     "type_record"=>  $type_record,
    "filename"=>$file1name,
     "type_document"=>$type_document,
     "date_record"=>$sess_timerecord,
    );
 $cp=copy($file1tmp ,  "upload/". $file1name );
     }//end if

     else{
       $data=array(
 "registration"=> $registration_send21 ,
 //"at"=> $at_receive21,
 "date"=>$conv_date1_receive21,
 "from"=>$from_send21,
  "to"=> $to_send21,
  "subject"=>$subject_send21,
  "practice"=> $practice_send21,
  "note"=>$note_send21,
  "type_record"=>  $type_record,
  "filename"=>$file1name,
 "type_document"=>$type_document,
  "date_record"=>$sess_timerecord,
 );

     }


     //print_r($data);

                   if(  $id_main1_send_excellence > 0 )
                   {
                         $tb= $this->tb;
                         $this->db->where("id_main1", $id_main1_send_excellence );
                         $ck=$this->db->update($tb,$data);
                         if( $ck )
                         { echo 1;}
                         else{  echo 0; }
                   }

        }
        //--------------END excellence-------------------------------------------------------------
        /*
              // $type_record=3;
                1 	มูลนิธิตะวันฉายฯ
	 2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
	3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ
                 // $type_record=trim($this->input->get_post("type_record21")); //ประเภทของตารางที่ทำการบันทึก    9
                // $type_record=3;
                 //  $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง
         */

        //http://10.87.196.170/document2/index.php/welcome/home/json_research
        public function json_research() // 2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
        {
              $this->user_model->login();  //for checklogin

               $tb=$this->tb;
               $this->db->order_by("id_main1","DESC");
			//$this->db->limit(30,0);
			$query=$this->db->get_where($tb,array("type_record"=>2),5);
			foreach($query->result() as $row)
			{
					$rows[]=$row;
			}
			 //echo  json_encode($rows);
			 echo json_encode($rows);

        }

        /*
         public function json_foundation() //
        {
              $this->user_model->login();  //for checklogin

               $tb=$this->tb;
               $this->db->order_by("id_main1","DESC");
			//$this->db->limit(30,0);
			$query=$this->db->get_where($tb,array("type_record"=>2),5);
			foreach($query->result() as $row)
			{
					$rows[]=$row;
			}
			 //echo  json_encode($rows);
			 echo json_encode($rows);

        }
        */

             public function  search_research2()
              {
                     $this->user_model->login();  //for checklogin
                     $tb=$this->tb;
                       $to=trim($this->input->get_post("to_research"));
                      //echo br();
                       $date=trim($this->input->get_post("date_research"));
                      //echo br();
                      if( $date != "" )    //  09/13/2017
                      {
                            $ex=explode("/",$date);
                            $conv_date=$ex[2]."-".$ex[0]."-".$ex[1];

                      }
                      else
                      {
                          $conv_date = "";
                      }
                       //echo  $conv_date;
                       
                       //"type_record"=>2
                       $type_record=2;
                      
                        $type_document=trim($this->input->get_post("type_document_research")); 
                      // echo br();
                        
                        $subject =trim($this->input->get_post("subject_research")); 
                        
                       
                       if(   $to  != ""   &&    $conv_date == "" )
                      {

                              $str="  SELECT   *  FROM  $tb  WHERE `to` LIKE ('%$to%')     AND   `type_record`=$type_record   AND   `type_document`=$type_document    ";
                              
                              $query=$this->db->query( $str);
                              $num=$query->num_rows();
                            
                              if( $num > 0 )
                              {
                                  foreach( $query -> result() as $row)
                                  {
                                      $rows[]=$row;
                                  }
                                     echo  json_encode($rows);
                              }
                            
                      }
                      elseif(   $conv_date != ""  &&   $to == ""   )    //2017-03-16
                      {
                             //  $str="  SELECT   *  FROM  $tb  WHERE   `date`='$conv_date'   AND   `type_record`=$type_record   AND   `type_document`=$type_document    ";
                              //date_record
                                 $str="  SELECT   *  FROM  $tb  WHERE   `date_record`='$conv_date'   AND   `type_record`=$type_record   AND   `type_document`=$type_document    ";
                               $query=$this->db->query( $str);
                               $num=$query->num_rows();
                                 if( $num > 0 )
                                    {
                                        foreach( $query -> result() as $row)
                                        {
                                            $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                    }  
                      }
                      elseif( $to  != ""   &&    $conv_date != "" )  //ข้อมูลทดสอบ  ,   ส   ,   08/02/2017
                      {
                             //  $str="  SELECT   *  FROM  $tb  WHERE       `to` LIKE ('%$to%')     AND      `date`='$conv_date'   AND       `type_record`=$type_record   AND   `type_document`=$type_document    ";
                                 //date_record
                          $str="  SELECT   *  FROM  $tb  WHERE       `to` LIKE ('%$to%')     AND      `date_record`='$conv_date'   AND       `type_record`=$type_record   AND   `type_document`=$type_document    ";
                               $query=$this->db->query( $str);
                               $num=$query->num_rows();
                               if( $num > 0 )
                                    {
                                        foreach( $query -> result() as $row)
                                        {
                                            $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                    }
                      }
                      
                      elseif(  $subject  != ""      )  //เรื่องอย่างเดียว
                      {
                            $str="  SELECT   *  FROM  $tb  WHERE     `subject`    LIKE ('%$subject%')      AND       `type_record`=$type_record   AND   `type_document`=$type_document    ";
                                $query=$this->db->query( $str);
                                     $num=$query->num_rows();
                                     if( $num > 0 )
                                          {
                                              foreach( $query -> result() as $row)
                                              {
                                                  $rows[]=$row;
                                              }
                                                 echo  json_encode($rows);
                                          }
                          
                      }
                      
                      elseif(  $subject  != ""     &&    $conv_date != ""      )  //เรื่องและวัีนที่
                      {
                          
                            //$str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')          AND          `date`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                               //date_record
                          $str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')          AND          `date_record`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                              
                            $query=$this->db->query( $str);
                                     $num=$query->num_rows();
                                     if( $num > 0 )
                                          {
                                              foreach( $query -> result() as $row)
                                              {
                                                  $rows[]=$row;
                                              }
                                                 echo  json_encode($rows);
                                          }
                          
                      } 
                       elseif(  $subject  != ""     &&    $conv_date != ""   &&    $to !=   ""      )  //เรื่องและวัีนที่
                       {
                              // $str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')     AND    `to`  LIKE('%$to%')      AND          `date`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                               //date_record
                            $str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')     AND    `to`  LIKE('%$to%')      AND          `date_record`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                               $query=$this->db->query( $str);
                                     $num=$query->num_rows();
                                     if( $num > 0 )
                                          {
                                              foreach( $query -> result() as $row)
                                              {
                                                  $rows[]=$row;
                                              }
                                                 echo  json_encode($rows);
                                          }
                       }
                      
                      
                       elseif( $to  == ""   &&    $conv_date == "" ) 
                      {
                           $str="  SELECT   *  FROM  $tb  WHERE      `type_record`=$type_record   AND   `type_document`=$type_document   ORDER  BY   `id_main1`   DESC   LIMIT  20   ";
                               $query=$this->db->query( $str);
                               $num=$query->num_rows();
                               if( $num > 0 )
                                    {
                                        foreach( $query -> result() as $row)
                                        {
                                            $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                    }
                          
                      }
                       
                 
               }
               
        //------------------- ค้นหาจาก วันที่ลงรับหนังสือ       
                public function search_research_date_in()  //ค้นหาจากวันที่หนังสือเข้าและออก     ศูนย์การดูแลฯ
         {
                 $this->user_model->login();  //for checklogin
               //  $date_book=trim($this->input->get_post("date_book")); //11/08/2017<br />
                 
                 
                 
                  $date_book=trim($this->input->get_post("date_research")); //11/08/2017<br />
                if(   strlen(   $date_book  )  >  0 )
                {
                       $ex=explode("/",$date_book);
                       $conv_date=   $ex[2]."-".$ex[0]."-".$ex[1];
                }
                else{
                    
                        $conv_date=  "";
                }
                
               // echo    $conv_date;
               // echo br();
                
                  $type_record=2;  //ของจริง
             
         
                
                   $type_document=trim($this->input->get_post("type_document_research")); 
                // echo br();
                 
                   
             
                $tb=$this->tb;
               
                $q=$this->db->get_where($tb,array("date"=> $conv_date, "type_record"=>$type_record, "type_document"=>$type_document  ));  // ของจริง
               // $q=$this->db->get($tb,10);
                 $num=$q->num_rows();
                
                
                if( $num > 0 ) //พบการค้นหา
               { 
                                foreach($q->result() as $row)
                                {
                                    $rows[]=$row;
                                }
                                  echo  json_encode($rows);
                }
                
     
                

         }
               
               


        //http://10.87.196.170/document2/index.php/welcome/home/search_research
        public function  search_research()
        {
               $this->user_model->login();  //for checklogin


              $tb=$this->tb;

              $type_document=trim($this->input->get_post("type_document_research"));
          // echo br();
             $date=trim($this->input->get_post("date_research"));  //การรับค่า => 07/28/2017
            //echo br();
            $to=trim($this->input->get_post("to_research"));
         //echo br();

          if(  $date != "" ) //ต้องแปลงให้เป็น  2017-01-26
                                  {
                                          $ex=explode("/",$date);
		       $conv_date=$ex[2]."-".$ex[0]."-".$ex[1];  //2017-08-01
		 }

                //echo $conv_date;


       /*
    if(  $type_document > 0 &&  $to != ""  &&  $date == ""  )
         {
              $this->db->order_by("id_main1","DESC");
              $query=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>$type_document,"to"=>$to),10);
                    $check = $query->num_rows();
                  //echo br();
                    if(  $check  > 0  )
                    {
                             foreach($query->result() as $row)
                              {
                                     $rows[]=$row;
                              }
                             echo  json_encode($rows);
                    }
         }
    elseif( $type_document > 0 &&  $to == ""  &&  $date != ""   )
    {
              $this->db->order_by("id_main1","DESC");
              $query=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>$type_document,"date"=>$conv_date),10);
                   $check = $query->num_rows();
                  //echo br();
                    if(  $check  > 0  )
                    {
                             foreach($query->result() as $row)
                              {
                                     $rows[]=$row;
                              }
                             echo  json_encode($rows);
                    }
    }
   else  if(  $type_document > 0   &&  $to  == ""  &&   $date ==""  )
   {
         $this->db->order_by("id_main1","DESC");
         $query=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>$type_document),10);

           $check = $query->num_rows();
          //echo br();
           if(  $check  > 0  )
           {
                    foreach($query->result() as $row)
                     {
                            $rows[]=$row;
                     }
                    echo  json_encode($rows);
           }
     }
 */

                 if(  $date != "" )
                 {
                   $this->db->order_by("id_main1","DESC");
                   $query=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>$type_document, "date"=>$conv_date));
                   $check = $query->num_rows();
                  //echo br();
                    if(  $check  > 0  )
                    {
                             foreach($query->result() as $row)
                              {
                                     $rows[]=$row;
                              }
                             echo  json_encode($rows);
                    }
                 }
                 else  if(  $to != "" )
                 {
                   $this->db->order_by("id_main1","DESC");
                   $query=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>$type_document, "to"=>$to));
                   $check = $query->num_rows();
                  //echo br();
                    if(  $check  > 0  )
                    {
                             foreach($query->result() as $row)
                              {
                                     $rows[]=$row;
                              }
                             echo  json_encode($rows);
                    }
                 }

               else  if( $to != ""  &&  $date != "" )
                 {
                   $this->db->order_by("id_main1","DESC");
                   $query=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>$type_document, "to"=>$to,  "date"=>$conv_date));
                   $check = $query->num_rows();
                  //echo br();
                    if(  $check  > 0  )
                    {
                             foreach($query->result() as $row)
                              {
                                     $rows[]=$row;
                              }
                             echo  json_encode($rows);
                    }
                 }
                 elseif(  $to != ""  &&  $date == ""   )
                 {
                     $this->db->order_by("id_main1","DESC");
                   $query=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>$type_document, "to"=>$to ));
                   $check = $query->num_rows();
                  //echo br();
                    if(  $check  > 0  )
                    {
                             foreach($query->result() as $row)
                              {
                                     $rows[]=$row;
                              }
                             echo  json_encode($rows);
                    }
                 }
                 elseif( $to == ""  &&  $date != ""  )
                 {
                     $this->db->order_by("id_main1","DESC");
                   $query=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>$type_document,  "date"=>$conv_date ));
                   $check = $query->num_rows();
                  //echo br();
                    if(  $check  > 0  )
                    {
                             foreach($query->result() as $row)
                              {
                                     $rows[]=$row;
                              }
                             echo  json_encode($rows);
                    }
                 }
                 else
                 {
                                        $this->db->order_by("id_main1","DESC");
                            $query=$this->db->get_where($tb,array("type_record"=>2,"type_document"=>$type_document),10);

                              $check = $query->num_rows();
                             //echo br();
                              if(  $check  > 0  )
                              {
                                       foreach($query->result() as $row)
                                        {
                                               $rows[]=$row;
                                        }
                                       echo  json_encode($rows);
                              }
                 }



        }//end function


           /*
              // $type_record=3;
                1 	มูลนิธิตะวันฉายฯ
	 2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
	3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ
                 // $type_record=trim($this->input->get_post("type_record21")); //ประเภทของตารางที่ทำการบันทึก    9
                // $type_record=3;
                 //  $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง
         */

        //http://10.87.196.170/document2/index.php/welcome/home/update_tb_main1_2
          public function  update_tb_main1_2()//excellence  "type_record"=>3
                {
                     $this->user_model->login();  //for checklogin


                     header('Content-Type: text/html; charset=UTF-8');
                       //echo "<br>";

                         $id_main1=trim($this->input->get_post("id_main1_research"));
                      //echo br();

                       $registration_receive21=trim($this->input->get_post("registration_research_receive21"));   //เลขทะเบียนส่ง   1
                     // echo br();

                      $at_receive21=trim($this->input->get_post("at_research_receive21"));  //ที่       2
	    //echo br();


	    $date1_receive21=trim($this->input->get_post("date1_research_receive21")); //ลงวันที่           3
                      //07/25/2017
	    if(  strlen($date1_receive21) > 0    )
	    {
		 $ex=explode("/",$date1_receive21);
	                  $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
                              //echo br();
	    }
                         //echo  $conv_date1_receive21;
                        //echo br();

	      $from_receive21=trim($this->input->get_post("from_research_receive21")); //จาก       4
	 // echo br();
	      $to_receive21=trim($this->input->get_post("to_research_receive21"));  //ถึง        5
	  // echo br();
	      $subject_receive21=trim($this->input->get_post("subject_research_receive21"));  //เรื่อง       6
	   // echo br();
	     $practice_receive21=trim($this->input->get_post("practice_research_receive21"));  //การปฏฺิบัติ       7
	   //  echo br();
	     $note_receive21=trim($this->input->get_post("note_research_receive21")); //หมายเหตุ      8
	    //echo br();


	      $type_record=2; //ประเภทของตารางที่ทำการบันทึก    9
	      $type_document=1;  // 1=หนังสือรับ,2=หนังสือส่ง


                  // $type_record=3;
             //   1 	มูลนิธิตะวันฉายฯ
	// 2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ

 //------------------------------- upload file-------------------------------------------
                        // print_r($_FILES)
	        $file1name = $_FILES["file21_research"]['name'];  // ชื่อของไฟล์      10
	 // echo br();
	      $file1tmp  =$_FILES['file21_research']["tmp_name"]; // tmp folder

	      $file1Type= $_FILES['file21_research']["type"]; //type of file

	      $file1Size= $_FILES['file21_research']["size"]; //size

	      $file1ErrorMsg = $_FILES['file21_research']["error"]; // 0=false 1=true


	       date_default_timezone_set("Asia/Bangkok");
	       $sess_timerecord=date("Y-m-d H:s:00");




                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if(   $file1name != ""  )
																																										 {

																																										     $data=array(
																																											 "registration"=> $registration_receive21,
																																											 "at"=> $at_receive21,
																																											 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																				"filename"=>$file1name,
																																																				 "type_document"=>$type_document,
																																																				 "date_record"=>$sess_timerecord,
																																																		 );



																																											 $cp=copy($file1tmp ,  "upload/". $file1name );

																																										  }
																																										 else
																																										 {
																																													 $data=array(
																																																				 "registration"=>$registration_receive21,
																																																				 "at"=> $at_receive21,
																																																				 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																			//  "filename"=>$file1name,
																																																				"type_document"=>$type_document,
																																																			 "date_record"=>$sess_timerecord,
																																																		 );

																																										 }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                $tb= $this->tb;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if(  $id_main1 >  0   &&  strlen($id_main1) > 0  )
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        $this->db->where("id_main1", $id_main1);

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        $ck=$this->db->update($tb,$data);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       // $ck=0;

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



       // http://10.87.196.170/document2/index.php/welcome/home/update_tb_main1_2
                public function insert_tb_main1_2() //excellence  "type_record"=>3
	{
	  $this->user_model->login();  //for checklogin

          								    								    /*
                      echo   $registration_receive21=trim($this->input->get_post('registration_receive21'));
											echo br();
										 //echo  't';
										 */

										 header('Content-Type: text/html; charset=UTF-8');

																			 //echo print_r($_POST);
																			 //echo  "<hr>";
																			 #-- หนังสือรับ หนังสือเ้ข้า  มูลนิธิตะวันฉายฯ
												 		$registration_receive21=trim($this->input->get_post("registration_research_receive21"));   //เลขทะเบียนส่ง   1   //registration_research_receive21
											                  //echo "<br>";
												 		      $at_receive21=trim($this->input->get_post("at_research_receive21"));  //ที่       2   //at_research_receive21
												//echo  "<br>";
															 $date1_receive21=trim($this->input->get_post("date1_research_receive21")); //ลงวันที่           3  //date1_research_receive21
                              //07/25/2017
															if(  strlen($date1_receive21) > 0    )
															{
																   $ex=explode("/",$date1_receive21);
																	    $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
																	 //echo br();
															}
                                                                                                                                                                                                                    //echo $conv_date1_receive21;
                                                                                                                                                                                                                   // echo  "<br>";
												   $from_receive21=trim($this->input->get_post("from_research_receive21")); //จาก       4   //from_research_receive21
												//echo br();
												  $to_receive21=trim($this->input->get_post("to_research_receive21"));  //ถึง        5    //to_research_receive21
												//echo br();
												  $subject_receive21=trim($this->input->get_post("subject_research_receive21"));  //เรื่อง       6   //subject_research_receive21
												//echo br();
												  $practice_receive21=trim($this->input->get_post("practice_research_receive21"));  //การปฏฺิบัติ       7  //practice_research_receive21
												//echo br();
												 $note_receive21=trim($this->input->get_post("note_research_receive21")); //หมายเหตุ      8  //note_research_receive21
												//echo br();
																																				 // <input type="hidden"  id="type_record11"  name="type_record11"  value="1"  />
																																			/*

																																												 1 	มูลนิธิตะวันฉายฯ
																												 2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
																												 3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ

																																			 */
																																			 //"type_record"=>3
												$type_record=2; //ประเภทของตารางที่ทำการบันทึก    9
																		//echo br();																//  echo  "<br>";
												$type_document=1;  // 1=หนังสือรับ,2=หนังสือส่ง
	                                  //echo br();
																																		//		$date1_receive21_time=trim($this->input->get_post("date1_receive21_time")); //ประเภทของตารางที่ทำการบันทึก    9


																																		 //  print_r($_FILES);

																																											 //------------------------------- upload file-------------------------------------------
																																									// print_r($_FILES)
																$file1name = $_FILES["file21_research"]['name'];  // ชื่อของไฟล์      10
														//echo br();
																 $file1tmp  =$_FILES['file21_research']["tmp_name"]; // tmp folder
																//echo br();
																 $file1Type= $_FILES['file21_research']["type"]; //type of file
																 //echo br();
																 $file1Size= $_FILES['file21_research']["size"]; //size
																 //echo br();
																 $file1ErrorMsg = $_FILES['file21_research']["error"]; // 0=false 1=true
															  //echo br();

																  date_default_timezone_set("Asia/Bangkok");
														                                     $sess_timerecord=date("Y-m-d H:s:00");




																																								if(   $file1name != ""  )
																																										 {

																																																		 $data=array(
																																																				 "registration"=> $registration_receive21,
																																																				 "at"=> $at_receive21,
																																																				 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																				"filename"=>$file1name,
																																																				 "type_document"=>$type_document,
																																																				 "date_record"=>$sess_timerecord,
																																																		 );



																																																 $cp=copy($file1tmp ,  "upload/". $file1name );

																																										  }
																																										 else
																																										 {
																																													 $data=array(
																																																				 "registration"=>$registration_receive21,
																																																				 "at"=> $at_receive21,
																																																				 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																			//  "filename"=>$file1name,
																																																				"type_document"=>$type_document,
																																																			 "date_record"=>$sess_timerecord,
																																																		 );

																																										 }

																			  //print_r($data);


																				 //$tb="tb_main1";
																				 // `tb_main1_test`

																				// $tb="tb_main1_test";

																				 $tb= $this->tb;
																				 $ck=$this->db->insert($tb,$data);
																				// $ck=1;
                                                                                                                                                                                                                                                                                                                                                                // $ck=0;
                                                                                                                                                                                                                                                                                                                                                                  if( $ck )
																				 {
																					 echo "1";
																				 }
																				 else {
																				 	echo "0";
																				 }





		}//end function



                //http://10.87.196.170/document2/index.php/welcome/insert_tb_main1_send_research
                public function insert_tb_main1_send_research()  //เอกสารส่ง    //excellence  "type_record"=>3
                {

                      $this->user_model->login();  //for checklogin


                            $id_main1_send_research=trim($this->input->get_post("id_main1_send_research"));
                          //echo br();

                           $registration_send21=trim($this->input->get_post("registration_send21_research"));   //เลขทะเบียนส่ง   1
                        // echo br();

                            $date1_send21=trim($this->input->get_post("date1_send21_research")); //ลงวันที่           3
                          //echo br();

                           if(  strlen( $date1_send21) > 0    )
		{
	                            $ex=explode("/", $date1_send21);
		          $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
		            //echo br();
		 }

                           //echo   $conv_date1_receive21;
                           //echo br();


                               $from_send21=trim($this->input->get_post("from_send21_research")); //จาก       4
                            //echo br();

                                $to_send21=trim($this->input->get_post("to_send21_research"));  //ถึง        5
                           // echo br();

                                  $subject_send21=trim($this->input->get_post("subject_send21_research"));  //เรื่อง       6
                            //echo br();

                             $practice_send21=trim($this->input->get_post("practice_send21_research"));  //การปฏฺิบัติ       7
                           //echo br();

                             $note_send21=trim($this->input->get_post("note_send21_research")); //หมายเหตุ      8
                           //echo br();

                           //$at_send21=trim($this->input->get_post("at_send21"));  //ที่       2

                                                                                    //      1 	มูลนิธิตะวันฉายฯ
		                                                 //     2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
	                                                      //	3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ


                                                                   // $type_record=trim($this->input->get_post("type_record21")); //ประเภทของตารางที่ทำการบันทึก    9
                                                             $type_record=2;


                                                             $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง


                                                              //   $date1_record21_time=trim($this->input->get_post("date1_record21_time"));

                                                                                         //------------------------------- upload file-------------------------------------------
                                                                                   // print_r($_FILES)
                                                                                $file1name = $_FILES["file21_send21_research"]['name'];  // ชื่อของไฟล์      10
                                                                         //echo br();
                                                                                 $file1tmp  =$_FILES['file21_send21_research']["tmp_name"]; // tmp folder
                                                                                //  echo br();
                                                                                 $file1Type= $_FILES['file21_send21_research']["type"]; //type of file
                                                                                //  echo br();
                                                                                $file1Size= $_FILES['file21_send21_research']["size"]; //size
                                                                                //  echo br();
                                                                                  $file1ErrorMsg = $_FILES['file21_send21_research']["error"]; // 0=false 1=true
                                                                                // echo br();

                                                               date_default_timezone_set("Asia/Bangkok");
		                            $sess_timerecord=date("Y-m-d H:s:00");



 if(   $file1name != ""  )
     {


$data=array(
      "registration"=>  $registration_send21 ,
     // "at"=> $at_receive21,
    "date"=>$conv_date1_receive21,
   "from"=>$from_send21,
    "to"=> $to_send21,
   "subject"=>$subject_send21,
    "practice"=> $practice_send21,
    "note"=>$note_send21,
     "type_record"=>  $type_record,
    "filename"=>$file1name,
     "type_document"=>$type_document,
     "date_record"=>$sess_timerecord,
    );
            $cp=copy($file1tmp ,  "upload/". $file1name );
     }//end if
     else{
       $data=array(
 "registration"=> $registration_send21 ,
 //"at"=> $at_receive21,
 "date"=>$conv_date1_receive21,
 "from"=>$from_send21,
  "to"=> $to_send21,
  "subject"=>$subject_send21,
  "practice"=> $practice_send21,
  "note"=>$note_send21,
  "type_record"=>  $type_record,
  "filename"=>$file1name,
 "type_document"=>$type_document,
  "date_record"=>$sess_timerecord,
 );
     }


     if( $id_main1_send_research == ""   )
     {
                    // print_r($data);
                   $tb= $this->tb;
                   $ck=$this->db->insert($tb,$data);
                  // $ck=1;
                  // $ck=0;
                   if( $ck )
                   {
                       echo 1;
                   }
                   else
                   {
                       echo 0;
                   }
      }


}//end function

 // http://10.87.196.170/document2/index.php/welcome/update_send_research

 public  function  update_send_research()
 {
     $this->user_model->login();  //for checklogin


                               $id_main1_send_research=trim($this->input->get_post("id_main1_send_research"));
                          // echo br();

                           $registration_send21=trim($this->input->get_post("registration_send21_research"));   //เลขทะเบียนส่ง   1
                        // echo br();

                            $date1_send21=trim($this->input->get_post("date1_send21_research")); //ลงวันที่           3
                          //echo br();

                           if(  strlen( $date1_send21) > 0    )
		{
	                            $ex=explode("/", $date1_send21);
		          $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
		            //echo br();
		 }

                           //echo   $conv_date1_receive21;
                           //echo br();


                               $from_send21=trim($this->input->get_post("from_send21_research")); //จาก       4
                            //echo br();

                                $to_send21=trim($this->input->get_post("to_send21_research"));  //ถึง        5
                           // echo br();

                                  $subject_send21=trim($this->input->get_post("subject_send21_research"));  //เรื่อง       6
                            //echo br();

                             $practice_send21=trim($this->input->get_post("practice_send21_research"));  //การปฏฺิบัติ       7
                           //echo br();

                             $note_send21=trim($this->input->get_post("note_send21_research")); //หมายเหตุ      8
                           //echo br();

                           //$at_send21=trim($this->input->get_post("at_send21"));  //ที่       2

                                                                                    //      1 	มูลนิธิตะวันฉายฯ
		                                                 //     2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
	                                                      //	3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ


                                                                   // $type_record=trim($this->input->get_post("type_record21")); //ประเภทของตารางที่ทำการบันทึก    9
                                                             $type_record=2;


                                                             $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง


                                                              //   $date1_record21_time=trim($this->input->get_post("date1_record21_time"));

                                                                                         //------------------------------- upload file-------------------------------------------
                                                                                   // print_r($_FILES)
                                                                                $file1name = $_FILES["file21_send21_research"]['name'];  // ชื่อของไฟล์      10
                                                                         //echo br();
                                                                                 $file1tmp  =$_FILES['file21_send21_research']["tmp_name"]; // tmp folder
                                                                                //  echo br();
                                                                                 $file1Type= $_FILES['file21_send21_research']["type"]; //type of file
                                                                                //  echo br();
                                                                                $file1Size= $_FILES['file21_send21_research']["size"]; //size
                                                                                //  echo br();
                                                                                  $file1ErrorMsg = $_FILES['file21_send21_research']["error"]; // 0=false 1=true
                                                                                // echo br();

                                                               date_default_timezone_set("Asia/Bangkok");
		                            $sess_timerecord=date("Y-m-d H:s:00");



 if(   $file1name != ""  )
     {


$data=array(
      "registration"=>  $registration_send21 ,
     // "at"=> $at_receive21,
    "date"=>$conv_date1_receive21,
   "from"=>$from_send21,
    "to"=> $to_send21,
   "subject"=>$subject_send21,
    "practice"=> $practice_send21,
    "note"=>$note_send21,
     "type_record"=>  $type_record,
    "filename"=>$file1name,
     "type_document"=>$type_document,
     "date_record"=>$sess_timerecord,
    );
            $cp=copy($file1tmp ,  "upload/". $file1name );
     }//end if
     else{
       $data=array(
 "registration"=> $registration_send21 ,
 //"at"=> $at_receive21,
 "date"=>$conv_date1_receive21,
 "from"=>$from_send21,
  "to"=> $to_send21,
  "subject"=>$subject_send21,
  "practice"=> $practice_send21,
  "note"=>$note_send21,
  "type_record"=>  $type_record,
  "filename"=>$file1name,
 "type_document"=>$type_document,
  "date_record"=>$sess_timerecord,
 );
     }

        // print_r($data);
         if( $id_main1_send_research  > 0 &&  $id_main1_send_research != ""  )
         {
               $tb=$this->tb;
               $this->db->where("id_main1",$id_main1_send_research);
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

 ##---------------- มูลนิธิ----------------------------------------
                   // $type_record=3;
             //   1 	มูลนิธิตะวันฉายฯ
	// 2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ


 // http://10.87.196.170/document2/index.php/welcome/json_foundation

  public function json_foundation()
        {
              $this->user_model->login();  //for checklogin

               $tb=$this->tb;
               $this->db->order_by("id_main1","DESC");
			//$this->db->limit(30,0);
			$query=$this->db->get_where($tb,array("type_record"=>1),5);
			foreach($query->result() as $row)
			{
					$rows[]=$row;
			}
			 //echo  json_encode($rows);
			 echo json_encode($rows);


        }

        
        
        public function search_foundation_date_in()  //ค้นหาจากวันที่หนังสือเข้าและออก     ศูนย์การดูแลฯ
         {
                 $this->user_model->login();  //for checklogin
               //  $date_book=trim($this->input->get_post("date_book")); //11/08/2017<br />
                 
                 
                 
                  $date_book=trim($this->input->get_post("date_foundation")); //11/08/2017<br />
                if(   strlen(   $date_book  )  >  0 )
                {
                       $ex=explode("/",$date_book);
                       $conv_date=   $ex[2]."-".$ex[0]."-".$ex[1];
                }
                else{
                    
                        $conv_date=  "";
                }
                
                 $type_record=1;  //ของจริง
                 //  $type_record=2; //simulate
                //echo br();
                
                   $type_document=trim($this->input->get_post("type_document_foundation")); 
                // echo br();
                 
                   
             
                $tb=$this->tb;
               
                 $q=$this->db->get_where($tb,array("date"=> $conv_date, "type_record"=>$type_record, "type_document"=>$type_document  ));  // ของจริง
               //  $q=$this->db->get($tb,10);
                 $num=$q->num_rows();
                
                
                if( $num > 0 ) //พบการค้นหา
               { 
                                foreach($q->result() as $row)
                                {
                                    $rows[]=$row;
                                }
                                  echo  json_encode($rows);
                }
                
     
                

         }
        
        
        public function  search_foundation2()
        {
              $this->user_model->login();  //for checklogin
              $tb=$this->tb;
             $to=trim($this->input->get_post("to_foundation"));
             
               $date=trim($this->input->get_post("date_foundation"));
             // echo br();
              if( $date != "" )    //  09/13/2017
                      {
                            $ex=explode("/",$date);
                            $conv_date=$ex[2]."-".$ex[0]."-".$ex[1];

                      }
                         else
                      {
                          $conv_date = "";
                      }
                      
                       //echo $conv_date; 
                       //echo br();
                       
                       //"type_record"=>1
                        $type_record=1;
                        
                      $type_document=trim($this->input->get_post("type_document_foundation")); 
                     //echo br(); 
                      
                      $subject=trim($this->input->get_post("subject_foundation")); 
                      
                     
                      if(   $to  != ""   &&    $conv_date == "" )
                      {

                              $str="  SELECT   *  FROM  $tb  WHERE `to` LIKE ('%$to%')     AND   `type_record`=$type_record   AND   `type_document`=$type_document    ";
                              $query=$this->db->query( $str);
                              $num=$query->num_rows();
                              if( $num > 0 )
                              {
                                  foreach( $query -> result() as $row)
                                  {
                                      $rows[]=$row;
                                  }
                                     echo  json_encode($rows);
                              }
                        
                      }
                      elseif(   $conv_date != ""  &&   $to == ""   )  //2017-01-26
                      {
                             //  $str="  SELECT   *  FROM  $tb  WHERE   `date`='$conv_date'   AND   `type_record`=$type_record   AND   `type_document`=$type_document    ";
                               //date_record
                                  $str="  SELECT   *  FROM  $tb  WHERE   `date_record`='$conv_date'   AND   `type_record`=$type_record   AND   `type_document`=$type_document    ";
                               
                               $query=$this->db->query( $str);
                               $num=$query->num_rows();
                                 if( $num > 0 )
                                    {
                                        foreach( $query -> result() as $row)
                                        {
                                            $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                    }
                               
                      }
                      elseif( $to  != ""   &&    $conv_date != "" )  //ข้อมูลทดสอบ  ,   ส   ,   08/02/2017
                      {
                               //$str="  SELECT   *  FROM  $tb  WHERE       `to` LIKE ('%$to%')     AND      `date`='$conv_date'   AND       `type_record`=$type_record   AND   `type_document`=$type_document    ";
                               //date_record
                               $str="  SELECT   *  FROM  $tb  WHERE       `to` LIKE ('%$to%')     AND      `date_record`='$conv_date'   AND       `type_record`=$type_record   AND   `type_document`=$type_document    "; 
                               
                               $query=$this->db->query( $str);
                               $num=$query->num_rows();
                               if( $num > 0 )
                                    {
                                        foreach( $query -> result() as $row)
                                        {
                                            $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                    }
                      }
                      
                      elseif(  $subject  != ""      )  //เรื่องอย่างเดียว
                      {
                            $str="  SELECT   *  FROM  $tb  WHERE     `subject`    LIKE ('%$subject%')      AND       `type_record`=$type_record   AND   `type_document`=$type_document    ";
                                $query=$this->db->query( $str);
                                     $num=$query->num_rows();
                                     if( $num > 0 )
                                          {
                                              foreach( $query -> result() as $row)
                                              {
                                                  $rows[]=$row;
                                              }
                                                 echo  json_encode($rows);
                                          }
                          
                      }
                      
                      elseif(  $subject  != ""     &&    $conv_date != ""      )  //เรื่องและวัีนที่
                      {
                          
                            //$str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')          AND          `date`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                            //date_record  
                           $str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')          AND          `date_record`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                         
                             
                            $query=$this->db->query( $str);
                                     $num=$query->num_rows();
                                     if( $num > 0 )
                                          {
                                              foreach( $query -> result() as $row)
                                              {
                                                  $rows[]=$row;
                                              }
                                                 echo  json_encode($rows);
                                          }
                          
                      } 
                       elseif(  $subject  != ""     &&    $conv_date != ""   &&    $to !=   ""      )  //เรื่องและวัีนที่
                       {
                            //   $str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')     AND    `to`  LIKE('%$to%')      AND          `date`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                            //  date_record
                           
                            $str="  SELECT   *  FROM  $tb      WHERE     `subject`    LIKE ('%$subject%')     AND    `to`  LIKE('%$to%')      AND          `date_record`='$conv_date'        AND         `type_record`=$type_record   AND   `type_document`=$type_document    ";
                          
                               
                               $query=$this->db->query( $str);
                                     $num=$query->num_rows();
                                     if( $num > 0 )
                                          {
                                              foreach( $query -> result() as $row)
                                              {
                                                  $rows[]=$row;
                                              }
                                                 echo  json_encode($rows);
                                          }
                       }
                      
                      
                     elseif( $to  == ""   &&    $conv_date == "" ) 
                      {
                           $str="  SELECT   *  FROM  $tb  WHERE      `type_record`=$type_record   AND   `type_document`=$type_document   ORDER  BY   `id_main1`   DESC   LIMIT  20   ";
                               $query=$this->db->query( $str);
                               $num=$query->num_rows();
                               if( $num > 0 )
                                    {
                                        foreach( $query -> result() as $row)
                                        {
                                            $rows[]=$row;
                                        }
                                           echo  json_encode($rows);
                                    }
                          
                      }
                     
                     
                
        }


   //  http://10.87.196.170/document2/index.php/welcome/search_foundation
  public function  search_foundation()
        {
              $this->user_model->login();  //for checklogin


              $tb=$this->tb;

              $type_document=trim($this->input->get_post("type_document_foundation"));
          // echo br();
             $date=trim($this->input->get_post("date_foundation"));  //การรับค่า => 07/28/2017
            //echo br();
            $to=trim($this->input->get_post("to_foundation"));
         //echo br();

          if(  $date != "" ) //ต้องแปลงให้เป็น  2017-01-26
                                  {
                                          $ex=explode("/",$date);
		       $conv_date=$ex[2]."-".$ex[0]."-".$ex[1];  //2017-08-01
		 }



             if(   $date != "" )
                 {
                   $this->db->order_by("id_main1","DESC");
                   $query=$this->db->get_where($tb,array("type_record"=>1,"type_document"=>$type_document,  "date"=>$conv_date));
                   $check = $query->num_rows();
                  //echo br();
                    if(  $check  > 0  )
                    {
                             foreach($query->result() as $row)
                              {
                                     $rows[]=$row;
                              }
                             echo  json_encode($rows);
                    }
                 }
            else     if( $to != ""  &&  $date != "" )
                 {
                   $this->db->order_by("id_main1","DESC");
                   $query=$this->db->get_where($tb,array("type_record"=>1,"type_document"=>$type_document, "to"=>$to,  "date"=>$conv_date));
                   $check = $query->num_rows();
                  //echo br();
                    if(  $check  > 0  )
                    {
                             foreach($query->result() as $row)
                              {
                                     $rows[]=$row;
                              }
                             echo  json_encode($rows);
                    }
                 }
                 elseif(  $to != ""  &&  $date == ""   )
                 {
                     $this->db->order_by("id_main1","DESC");
                   $query=$this->db->get_where($tb,array("type_record"=>1,"type_document"=>$type_document, "to"=>$to ));
                   $check = $query->num_rows();
                  //echo br();
                    if(  $check  > 0  )
                    {
                             foreach($query->result() as $row)
                              {
                                     $rows[]=$row;
                              }
                             echo  json_encode($rows);
                    }
                 }
                 elseif( $to == ""  &&  $date != ""  )
                 {
                     $this->db->order_by("id_main1","DESC");
                   $query=$this->db->get_where($tb,array("type_record"=>1,"type_document"=>$type_document,  "date"=>$conv_date ));
                   $check = $query->num_rows();
                  //echo br();
                    if(  $check  > 0  )
                    {
                             foreach($query->result() as $row)
                              {
                                     $rows[]=$row;
                              }
                             echo  json_encode($rows);
                    }
                 }
                 else
                 {
                                        $this->db->order_by("id_main1","DESC");
                            $query=$this->db->get_where($tb,array("type_record"=>1,"type_document"=>$type_document),10);

                              $check = $query->num_rows();
                             //echo br();
                              if(  $check  > 0  )
                              {
                                       foreach($query->result() as $row)
                                        {
                                               $rows[]=$row;
                                        }
                                       echo  json_encode($rows);
                              }
                 }



        }//end function


         //http://10.87.196.170/document2/index.php/welcome/insert_send_foundation
	public function insert_send_foundation() //excellence  "type_record"=>3
	{
	    $this->user_model->login();  //for checklogin

        								    								    /*
                      echo   $registration_receive21=trim($this->input->get_post('registration_receive21'));
											echo br();
										 //echo  't';
										 */

										 header('Content-Type: text/html; charset=UTF-8');

																			 //echo print_r($_POST);
																			 //echo  "<hr>";
                                                                                                                                                         //
                                                                                                                                                         //
																			 #-- หนังสือรับ หนังสือเ้ข้า  มูลนิธิตะวันฉายฯ


                                                                                                                                                              $id_main1_foundation=trim($this->input->get_post("id_main1_foundation"));
																	$registration_receive21=trim($this->input->get_post("registration_foundation_receive21"));   //เลขทะเบียนส่ง   1
														  //echo "<br>";
														      $at_receive21=trim($this->input->get_post("at_foundation_receive21"));  //ที่       2
														  //echo  "<br>";
															 $date1_receive21=trim($this->input->get_post("date1_foundation_receive21")); //ลงวันที่           3
                              //07/25/2017
															if(  strlen($date1_receive21) > 0    )
															{
																   $ex=explode("/",$date1_receive21);
																	    $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
																	 //echo br();
															}

														     $from_receive21=trim($this->input->get_post("from_foundation_receive21")); //จาก       4
															 //echo  "<br>";
															 $to_receive21=trim($this->input->get_post("to_foundation_receive21"));  //ถึง        5
															 //echo  "<br>";
															 $subject_receive21=trim($this->input->get_post("subject_foundation_receive21"));  //เรื่อง       6
															 //echo  "<br>";
															  $practice_receive21=trim($this->input->get_post("practice_foundation_receive21"));  //การปฏฺิบัติ       7
															  //echo  "<br>";
															 $note_receive21=trim($this->input->get_post("note_foundation_receive21")); //หมายเหตุ      8
															 //echo  "<br>";
																																				 // <input type="hidden"  id="type_record11"  name="type_record11"  value="1"  />
																																			/*

																																												 1 	มูลนิธิตะวันฉายฯ
																												 2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
																												 3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ

																																			 */
																																			 //"type_record"=>3
																  $type_record=1; //ประเภทของตารางที่ทำการบันทึก    9
																		//echo br();																//  echo  "<br>";
																 $type_document=1;  // 1=หนังสือรับ,2=หนังสือส่ง
	                                  //echo br();
																																		//		$date1_receive21_time=trim($this->input->get_post("date1_receive21_time")); //ประเภทของตารางที่ทำการบันทึก    9


																																		 //  print_r($_FILES);

																																											 //------------------------------- upload file-------------------------------------------
																																									// print_r($_FILES)
																$file1name = $_FILES["file21_foundation"]['name'];  // ชื่อของไฟล์      10
														    //echo br();
																 $file1tmp  =$_FILES['file21_foundation']["tmp_name"]; // tmp folder
																//echo br();
																 $file1Type= $_FILES['file21_foundation']["type"]; //type of file
																 //echo br();
																 $file1Size= $_FILES['file21_foundation']["size"]; //size
																 //echo br();
																 $file1ErrorMsg = $_FILES['file21_foundation']["error"]; // 0=false 1=true
															  //echo br();

																  date_default_timezone_set("Asia/Bangkok");
														      $sess_timerecord=date("Y-m-d H:s:00");




																																								if(   $file1name != ""  )
																																										 {

																																																		 $data=array(
																																																				 "registration"=> $registration_receive21,
																																																				 "at"=> $at_receive21,
																																																				 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																				"filename"=>$file1name,
																																																				 "type_document"=>$type_document,
																																																				 "date_record"=>$sess_timerecord,
																																																		 );



																																																 $cp=copy($file1tmp ,  "upload/". $file1name );

																																										  }
																																										 else
																																										 {
																																													 $data=array(
																																																				 "registration"=>$registration_receive21,
																																																				 "at"=> $at_receive21,
																																																				 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																			//  "filename"=>$file1name,
																																																				"type_document"=>$type_document,
																																																			 "date_record"=>$sess_timerecord,
																																																		 );

																																										 }

																			  //print_r($data);


																				 //$tb="tb_main1";
																				 // `tb_main1_test`

																				// $tb="tb_main1_test";



                                                                                                                                                                                                                                                                                                                                                 if(  $id_main1_foundation == "")
                                                                                                                                                                                                                                                                                                                                                 {
                                                                                                                                                                                                                                                                                                                                                        //echo   print_r($data);
                                                                                                                                                                                                                                                                                                                                                       $tb=$this->tb;
                                                                                                                                                                                                                                                                                                                                                       $ck=$this->db->insert($tb,$data);
                                                                                                                                                                                                                                                                                                                                                    //   $ck=1;
                                                                                                                                                                                                                                                                                                                                                     //  $ck=0;
                                                                                                                                                                                                                                                                                                                                                       if($ck)
                                                                                                                                                                                                                                                                                                                                                       {
                                                                                                                                                                                                                                                                                                                                                           echo 1;
                                                                                                                                                                                                                                                                                                                                                       }
                                                                                                                                                                                                                                                                                                                                                       else
                                                                                                                                                                                                                                                                                                                                                       {
                                                                                                                                                                                                                                                                                                                                                           echo 0;
                                                                                                                                                                                                                                                                                                                                                       }
                                                                                                                                                                                                                                                                                                                                                 }

		}
                // http://10.87.196.170/document2/index.php/welcome/update_send_foundation
                public function update_send_foundation() //excellence  "type_record"=>3
	{
	    $this->user_model->login();  //for checklogin


        								    								    								    /*
                      echo   $registration_receive21=trim($this->input->get_post('registration_receive21'));
											echo br();
										 //echo  't';
										 */

										 header('Content-Type: text/html; charset=UTF-8');

																			 //echo print_r($_POST);
																			 //echo  "<hr>";
                                                                                                                                                         //
                                                                                                                                                         //
																			 #-- หนังสือรับ หนังสือเ้ข้า  มูลนิธิตะวันฉายฯ


                                                                                                                                                              $id_main1_foundation=trim($this->input->get_post("id_main1_foundation"));
																	$registration_receive21=trim($this->input->get_post("registration_foundation_receive21"));   //เลขทะเบียนส่ง   1
														  //echo "<br>";
														      $at_receive21=trim($this->input->get_post("at_foundation_receive21"));  //ที่       2
														  //echo  "<br>";
															 $date1_receive21=trim($this->input->get_post("date1_foundation_receive21")); //ลงวันที่           3
                              //07/25/2017
															if(  strlen($date1_receive21) > 0    )
															{
																   $ex=explode("/",$date1_receive21);
																	    $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
																	 //echo br();
															}

														     $from_receive21=trim($this->input->get_post("from_foundation_receive21")); //จาก       4
															 //echo  "<br>";
															 $to_receive21=trim($this->input->get_post("to_foundation_receive21"));  //ถึง        5
															 //echo  "<br>";
															 $subject_receive21=trim($this->input->get_post("subject_foundation_receive21"));  //เรื่อง       6
															 //echo  "<br>";
															  $practice_receive21=trim($this->input->get_post("practice_foundation_receive21"));  //การปฏฺิบัติ       7
															  //echo  "<br>";
															 $note_receive21=trim($this->input->get_post("note_foundation_receive21")); //หมายเหตุ      8
															 //echo  "<br>";
																																				 // <input type="hidden"  id="type_record11"  name="type_record11"  value="1"  />
																																			/*

																																												 1 	มูลนิธิตะวันฉายฯ
																												 2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
																												 3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ

																																			 */
																																			 //"type_record"=>3
																  $type_record=1; //ประเภทของตารางที่ทำการบันทึก    9
																		//echo br();																//  echo  "<br>";
																 $type_document=1;  // 1=หนังสือรับ,2=หนังสือส่ง
	                                  //echo br();
																																		//		$date1_receive21_time=trim($this->input->get_post("date1_receive21_time")); //ประเภทของตารางที่ทำการบันทึก    9


																																		 //  print_r($_FILES);

																																											 //------------------------------- upload file-------------------------------------------
																																									// print_r($_FILES)
																$file1name = $_FILES["file21_foundation"]['name'];  // ชื่อของไฟล์      10
														    //echo br();
																 $file1tmp  =$_FILES['file21_foundation']["tmp_name"]; // tmp folder
																//echo br();
																 $file1Type= $_FILES['file21_foundation']["type"]; //type of file
																 //echo br();
																 $file1Size= $_FILES['file21_foundation']["size"]; //size
																 //echo br();
																 $file1ErrorMsg = $_FILES['file21_foundation']["error"]; // 0=false 1=true
															  //echo br();

																  date_default_timezone_set("Asia/Bangkok");
														      $sess_timerecord=date("Y-m-d H:s:00");




																																								if(   $file1name != ""  )
																																										 {

																																																		 $data=array(
																																																				 "registration"=> $registration_receive21,
																																																				 "at"=> $at_receive21,
																																																				 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																				"filename"=>$file1name,
																																																				 "type_document"=>$type_document,
																																																				 "date_record"=>$sess_timerecord,
																																																		 );



																																																 $cp=copy($file1tmp ,  "upload/". $file1name );

																																										  }
																																										 else
																																										 {
																																													 $data=array(
																																																				 "registration"=>$registration_receive21,
																																																				 "at"=> $at_receive21,
																																																				 "date"=>$conv_date1_receive21,
																																																				 "from"=>$from_receive21,
																																																				 "to"=> $to_receive21,
																																																				"subject"=>$subject_receive21,
																																																				"practice"=>$practice_receive21,
																																																				"note"=>$note_receive21,
																																																				"type_record"=> $type_record,
																																																			//  "filename"=>$file1name,
																																																				"type_document"=>$type_document,
																																																			 "date_record"=>$sess_timerecord,
																																																		 );

																																										 }

																			  //print_r($data);


																				 //$tb="tb_main1";
																				 // `tb_main1_test`

																				// $tb="tb_main1_test";



                                                                                                                                                                                                                                                                                                                                                 if( $id_main1_foundation > 0  ||  $id_main1_foundation != "")
                                                                                                                                                                                                                                                                                                                                                 {
                                                                                                                                                                                                                                                                                                                                                        //echo   print_r($data);
                                                                                                                                                                                                                                                                                                                                                       $tb=$this->tb;
                                                                                                                                                                                                                                                                                                                                                      // $ck=$this->db->insert($tb,$data);
                                                                                                                                                                                                                                                                                                                                                       $this->db->where("id_main1",$id_main1_foundation);
                                                                                                                                                                                                                                                                                                                                                       $ck=$this->db->update($tb,$data);
                                                                                                                                                                                                                                                                                                                                                       if($ck)
                                                                                                                                                                                                                                                                                                                                                       {
                                                                                                                                                                                                                                                                                                                                                           echo 1;
                                                                                                                                                                                                                                                                                                                                                       }
                                                                                                                                                                                                                                                                                                                                                       else
                                                                                                                                                                                                                                                                                                                                                       {
                                                                                                                                                                                                                                                                                                                                                           echo 0;
                                                                                                                                                                                                                                                                                                                                                       }
                                                                                                                                                                                                                                                                                                                                                 }

		}
               // http://10.87.196.170/document2/index.php/welcome/insert_tb_main1_send_foundation
               public function insert_tb_main1_send_foundation()  //หนังสือส่ง  มูลนิธิ
                {
                     $this->user_model->login();  //for checklogin

                            $id_main1_send_research=trim($this->input->get_post("id_main1_send_foundation"));
                          //echo br();

                           $registration_send21=trim($this->input->get_post("registration_send21_foundation"));   //เลขทะเบียนส่ง   1
                        // echo br();

                            $date1_send21=trim($this->input->get_post("date1_send21_foundation")); //ลงวันที่           3
                          //echo br();

                           if(  strlen( $date1_send21) > 0    )
		{
	                            $ex=explode("/", $date1_send21);
		          $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
		            //echo br();
		 }

                           //echo   $conv_date1_receive21;
                           //echo br();


                               $from_send21=trim($this->input->get_post("from_send21_foundation")); //จาก       4
                            //echo br();

                                $to_send21=trim($this->input->get_post("to_send21_foundation"));  //ถึง        5
                           // echo br();

                                  $subject_send21=trim($this->input->get_post("subject_send21_foundation"));  //เรื่อง       6
                            //echo br();

                             $practice_send21=trim($this->input->get_post("practice_send21_foundation"));  //การปฏฺิบัติ       7
                           //echo br();

                             $note_send21=trim($this->input->get_post("note_send21_foundation")); //หมายเหตุ      8
                           //echo br();

                           //$at_send21=trim($this->input->get_post("at_send21"));  //ที่       2

                                                                                    //      1 	มูลนิธิตะวันฉายฯ
		                                                 //     2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
	                                                      //	3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ


                                                                   // $type_record=trim($this->input->get_post("type_record21")); //ประเภทของตารางที่ทำการบันทึก    9
                                                             $type_record=1;


                                                             $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง


                                                              //   $date1_record21_time=trim($this->input->get_post("date1_record21_time"));

                                                                                         //------------------------------- upload file-------------------------------------------
                                                                                   // print_r($_FILES)
                                                                                $file1name = $_FILES["file21_send21_foundation"]['name'];  // ชื่อของไฟล์      10
                                                                         //echo br();
                                                                                 $file1tmp  =$_FILES['file21_send21_foundation']["tmp_name"]; // tmp folder
                                                                                //  echo br();
                                                                                 $file1Type= $_FILES['file21_send21_foundation']["type"]; //type of file
                                                                                //  echo br();
                                                                                $file1Size= $_FILES['file21_send21_foundation']["size"]; //size
                                                                                //  echo br();
                                                                                  $file1ErrorMsg = $_FILES['file21_send21_foundation']["error"]; // 0=false 1=true
                                                                                // echo br();

                                                               date_default_timezone_set("Asia/Bangkok");
		                            $sess_timerecord=date("Y-m-d H:s:00");



 if(   $file1name != ""  )
     {


$data=array(
      "registration"=>  $registration_send21 ,
     // "at"=> $at_receive21,
    "date"=>$conv_date1_receive21,
   "from"=>$from_send21,
    "to"=> $to_send21,
   "subject"=>$subject_send21,
    "practice"=> $practice_send21,
    "note"=>$note_send21,
     "type_record"=>  $type_record,
    "filename"=>$file1name,
     "type_document"=>$type_document,
     "date_record"=>$sess_timerecord,
    );
            $cp=copy($file1tmp ,  "upload/". $file1name );
     }//end if
     else{
       $data=array(
 "registration"=> $registration_send21 ,
 //"at"=> $at_receive21,
 "date"=>$conv_date1_receive21,
 "from"=>$from_send21,
  "to"=> $to_send21,
  "subject"=>$subject_send21,
  "practice"=> $practice_send21,
  "note"=>$note_send21,
  "type_record"=>  $type_record,
  "filename"=>$file1name,
 "type_document"=>$type_document,
  "date_record"=>$sess_timerecord,
 );
     }

       // print_r($data);


  //   if( $id_main1_send_research == ""   )
  //   {
                    // print_r($data);
                 $tb= $this->tb;
                  $ck=$this->db->insert($tb,$data);
                  // $ck=1;
                   //$ck=0;
                   if( $ck )
                   {
                       echo 1;
                   }
                   else
                   {
                       echo 0;
                   }
   //   }

     
     


}//end function

         // http://10.87.196.170/document2/index.php/welcome/update_send_foundation2
          public  function update_send_foundation2()
          {
              $this->user_model->login();  //for checklogin


               {
                            $id_main1_send_research=trim($this->input->get_post("id_main1_send_foundation"));
                          //echo br();

                           $registration_send21=trim($this->input->get_post("registration_send21_foundation"));   //เลขทะเบียนส่ง   1
                        // echo br();

                            $date1_send21=trim($this->input->get_post("date1_send21_foundation")); //ลงวันที่           3
                          //echo br();

                           if(  strlen( $date1_send21) > 0    )
		{
	                            $ex=explode("/", $date1_send21);
		          $conv_date1_receive21 = $ex[2]."-".$ex[0]."-".$ex[1];
		            //echo br();
		 }

                           //echo   $conv_date1_receive21;
                           //echo br();


                               $from_send21=trim($this->input->get_post("from_send21_foundation")); //จาก       4
                            //echo br();

                                $to_send21=trim($this->input->get_post("to_send21_foundation"));  //ถึง        5
                           // echo br();

                                  $subject_send21=trim($this->input->get_post("subject_send21_foundation"));  //เรื่อง       6
                            //echo br();

                             $practice_send21=trim($this->input->get_post("practice_send21_foundation"));  //การปฏฺิบัติ       7
                           //echo br();

                             $note_send21=trim($this->input->get_post("note_send21_foundation")); //หมายเหตุ      8
                           //echo br();

                           //$at_send21=trim($this->input->get_post("at_send21"));  //ที่       2

                                                                                    //      1 	มูลนิธิตะวันฉายฯ
		                                                 //     2 	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
	                                                      //	3 	ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ


                                                                   // $type_record=trim($this->input->get_post("type_record21")); //ประเภทของตารางที่ทำการบันทึก    9
                                                             $type_record=1;


                                                             $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง


                                                              //   $date1_record21_time=trim($this->input->get_post("date1_record21_time"));

                                                                                         //------------------------------- upload file-------------------------------------------
                                                                                   // print_r($_FILES)
                                                                                $file1name = $_FILES["file21_send21_foundation"]['name'];  // ชื่อของไฟล์      10
                                                                         //echo br();
                                                                                 $file1tmp  =$_FILES['file21_send21_foundation']["tmp_name"]; // tmp folder
                                                                                //  echo br();
                                                                                 $file1Type= $_FILES['file21_send21_foundation']["type"]; //type of file
                                                                                //  echo br();
                                                                                $file1Size= $_FILES['file21_send21_foundation']["size"]; //size
                                                                                //  echo br();
                                                                                  $file1ErrorMsg = $_FILES['file21_send21_foundation']["error"]; // 0=false 1=true
                                                                                // echo br();

                                                               date_default_timezone_set("Asia/Bangkok");
		                            $sess_timerecord=date("Y-m-d H:s:00");



 if(   $file1name != ""  )
     {


$data=array(
      "registration"=>  $registration_send21 ,
     // "at"=> $at_receive21,
    "date"=>$conv_date1_receive21,
   "from"=>$from_send21,
    "to"=> $to_send21,
   "subject"=>$subject_send21,
    "practice"=> $practice_send21,
    "note"=>$note_send21,
     "type_record"=>  $type_record,
    "filename"=>$file1name,
     "type_document"=>$type_document,
     "date_record"=>$sess_timerecord,
    );
            $cp=copy($file1tmp ,  "upload/". $file1name );
     }//end if
     else{
       $data=array(
 "registration"=> $registration_send21 ,
 //"at"=> $at_receive21,
 "date"=>$conv_date1_receive21,
 "from"=>$from_send21,
  "to"=> $to_send21,
  "subject"=>$subject_send21,
  "practice"=> $practice_send21,
  "note"=>$note_send21,
  "type_record"=>  $type_record,
  "filename"=>$file1name,
 "type_document"=>$type_document,
  "date_record"=>$sess_timerecord,
 );
     }

        //print_r($data);


     if( $id_main1_send_research != ""   &&    $id_main1_send_research > 0  )
     {
                    // print_r($data);
                   $tb= $this->tb;
                   $this->db->where("id_main1",$id_main1_send_research);
                  $ck=$this->db->update($tb,$data);
                  // $ck=1;
                   //$ck=0;
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
          }//end function
      
     //http://10.87.196.170/document3/index.php/welcome/check_date_sick  
     public  function check_date_sick()  //ตรวจสอบ วันลาป่วย
     {
          $this->user_model->login();  //for checklogin
             $name=trim($this->input->get_post("first_name"));
            //echo br();
            $tb=$this->tb_sick;
             $this->db->order_by("id_sick","DESC");
            $query= $this->db->get_where($tb,array("first_name"=>$name),1);
             $num= $query->num_rows();
             if( $num > 0 )
             {
                     foreach($query->result() as $row)
                     {
                         $rows[]=$row;
                     }
                     echo json_encode($rows);
             }
            
         
     }
          
          
          
      //http://10.87.196.170/document3/index.php/welcome/check_date_vacation
     public function check_date_vacation()
     {
             $this->user_model->login();  //for checklogin
          //  header('Content-Type: text/html; charset=utf-8');
                   $tb_vacation=$this->tb_vacation;
                   $tb_staff="tb_staff";
                   
               $name=trim($this->input->get_post("name"));
             //echo br();
             
             $this->db->order_by("id_vacation","DESC");
             $query=$this->db->get_where($tb_vacation,array("first_name"=>$name));
              $num=$query->num_rows();
             if( $num > 0 )
             {
                  $row=$query->row();
                   $date_total_leave=$row->date_total_leave;
                   echo  json_encode(array("date_total_leave"=>$date_total_leave)); 
             }
          
             
    
         
     }
         
     //http://10.87.196.170/document3/index.php/welcome/json_vacation2
     public function json_vacation2()
             {
         
         
                 $this->user_model->login();  //for checklogin
                   $tb_vacation=$this->tb_vacation;
                   $tb_staff="tb_staff";
                 
                  
                 $str=" SELECT    DISTINCT   `first_name`,`last_name`   FROM      $tb_vacation    order by     `id_vacation`  DESC  ; ";
                 $query=$this->db->query( $str);
                 $num=$query->num_rows();
                 if( $num > 0)
                 {
                     foreach($query->result()as $row)
                     {
                         $rows[]=$row;
                     }
                       echo json_encode($rows);      
                 }
                 

                 /*
                  $this->db->join($tb_vacation,  $tb_staff.".name=".$tb_vacation.".first_name"   ,"left");
                  $query = $this->db->get( $tb_staff );
                  foreach( $query->result() as $row )
                  {
                       $rows[]=$row;
                  }
                  echo  json_encode($rows);
                 */
                 
                 
                  /* 
                 $query=$this->db->get($tb_staff);
                    foreach( $query->result() as $row )
                           {
                                $rows[]=$row;
                           }
                   echo  json_encode($rows);
                   */
                   
         
             }     

      //http://192.168.2.112/document3/index.php/welcome/json_del_vacation       
     public  function json_del_vacation()
             { //begin
                   $this->user_model->login();  //for checklogin
                 $tb1="tb_delete_vacation";
                  $tb2="tb_vacation";
                  
                 // $this->db->join($tb2,$tb2.".id_vacation=".$tb1.".id_vacation","rigth");
                  
                  $this->db->join($tb2, $tb1.".id_vacation=".$tb2.".id_vacation","left");
                  
                  $this->db->order_by( $tb1.".id_vacation","DESC");
                  $query=$this->db->get($tb1);
                  foreach($query->result() as $row)
                  {
                        $rows[]=$row;
                  }
                  echo json_encode($rows);
             } //end  
             
       public function del_vacation() //ยกเลิกวันลา
       {
            $this->user_model->login();  //for checklogin
            $id_vacation=trim($this->input->get_post("id_vacation"));
            
             $tb1="tb_delete_vacation";
             
             $tb2="tb_vacation";
             
             $this->db->where("id_vacation",$id_vacation);
             $ck1=$this->db->delete($tb1);
             
             $this->db->where("id_vacation",$id_vacation);
             $ck2=$this->db->delete($tb2);
             
             if( $ck1 &&  $ck2 )
             {
                   echo json_encode(array("success"=>1));
                 
             }
             else{
                  echo json_encode(array("success"=>0));
             }//end else
           
       }
             
     public function cancel_vacation()  //ยกเลิกวันลา
     {
          $this->user_model->login();  //for checklogin
          $id_vacation=trim($this->input->get_post("id_vacation"));
          //echo br();
          $tb="tb_delete_vacation";
          $query=$this->db->get_where($tb,array("id_vacation"=>$id_vacation));
          $num= $query->num_rows();
          
          
          
          if(   $num  == 0 )
          {
                        
                                    $data=array(
                                        "id_vacation"=>$id_vacation,
                              );
                    // print_r($data);
                     $ck=$this->db->insert($tb,$data);
                     if( $ck )
                     {
                         echo json_encode(array('success'=>1));
                     }
                     elseif( !$ck )
                     {
                         echo json_encode(array('success'=>0));
                     }
          }else
          {
                    echo json_encode(array('success'=>11));
              
          } 
          
          
          
     } //end function
             
   #--------------- vacation ลาพักผ่อนประจำปี-----------------------
    //http://10.87.196.170/document2/index.php/welcome/json_vacation
     public   function   json_vacation()
             {
                       $this->user_model->login();  //for checklogin
                       // $tb="tb_vacation";
                       $tb=$this->tb_vacation;
                        $this->db->order_by("id_vacation","DESC");
                        $q=$this->db->get($tb,20);
                        foreach($q->result() as $row)
                        {
                            $rows[]=$row;
                        }
                        echo json_encode($rows);
              }  //end function

              /*
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

               */

       public function  update_vacation()
       {
              $this->user_model->login();  //for checklogin
             // $pass_update=trim($this->input->get_post("pass_update"));
              $id_vacation=trim($this->input->get_post("id_vacation"));
            //  if(  $pass_update  == "update1234"   )
                //  {
                          $tb=$this->tb_vacation;
                          $q=$this->db->get_where($tb,array("id_vacation"=>$id_vacation));
                          foreach($q->result() as $row)
                          {
                              $rows[]=$row;
                          }
                              echo  json_encode($rows);
                          //echo  json_encode(array("test"=>"success"));
                //  }

       }

       public function  update_table_vacation()  //update  table
       {
             $this->user_model->login();  //for checklogin


             $id_vacation_update=trim($this->input->get_post("id_vacation_update"));



               $type_person5=trim($this->input->get_post("type_person5"));
         //echo br();

             $write=trim($this->input->get_post("write"));  //เขียนที่    1
             //echo br();


              $date_write=trim($this->input->get_post("date_write"));  //วันเดือนปี ที่เขียน   2
           // echo br();

            if(  $date_write != "" ) //08/22/2017
            {
                $ex=explode("/",$date_write);
                 $date_write_conv=$ex[2]."-".$ex[0]."-".$ex[1];
                //echo br();
            }else{
                 $date_write_conv="";
            }




            $subject=trim($this->input->get_post("subject"));  //เรื่อง   3
           // echo br();

            $study=trim($this->input->get_post("study"));  //เรียน   4
            // echo br();

            $prename=trim($this->input->get_post("prename")); //คำนำหน้าชื่อ   5
             // echo br();


            $first_name=trim($this->input->get_post("first_name"));  //ชื่อ    6
            // echo br();

            $last_name=trim($this->input->get_post("last_name")); //นามสกุล   7
            //  echo br();

            $position=trim($this->input->get_post("position"));  //ตำแหน่ง   8
             //  echo br();

             $affiliation=trim($this->input->get_post("affiliation")); //สังกัด   9
           //    echo br();

             $work=trim($this->input->get_post("work")); //งาน   10
             //   echo br();

          $tel=trim($this->input->get_post("tel")); //โทร    11
              //  echo br();

                $cumulative=trim($this->input->get_post("cumulative")); //วันลาสะสม   12
             //   echo br();

               $rest=trim($this->input->get_post('rest')); //วันลาที่เหลืออยู่      13
             //   echo  br();

           $total=trim($this->input->get_post('total'));  //รวมวันลาเป็น      14
              //  echo  br();

             $current=trim($this->input->get_post("current"));  //ในปีนี้ลามาแล้ว     15
              //  echo  br();

             $keep=trim($this->input->get_post("keep"));  //คงเหลือวันลาอีก      16
               //  echo  br();



               $wishes=trim($this->input->get_post("wishes"));  //มีความประสงค์จะขอลาพักผ่อนมีกำหนด    17
                 //echo  br();

                $date_begin=trim($this->input->get_post("date_begin"));  //ขอลาพักผ่อนตั้งแต่วันที่        18
               //  echo  br();
                  if(  $date_begin != "" ) //08/22/2017
                    {
                        $ex=explode("/",$date_begin);
                         $date_begin_conv=$ex[2]."-".$ex[0]."-".$ex[1];
                        //echo br();
                    }else
                    {
                        $date_begin_conv="";
                    }


                 $end_date=trim($this->input->get_post("end_date"));  //ขอลาพักผ่อน ถึงวันที่        19
               // echo  br();
                if(  $end_date != "" ) //08/22/2017
                    {
                        $ex=explode("/",$end_date);
                         $end_date_conv=$ex[2]."-".$ex[0]."-".$ex[1];
                        //echo br();

                    }
                    else{
                        $end_date_conv="";
                    }


                   $house_number=trim($this->input->get_post("house_number"));  //บ้านเลขที่        20
                //echo  br();

                   $road=trim($this->input->get_post("road"));  //ถนน        21
                 //echo  br();

                    $district=trim($this->input->get_post("district")); //ตำบล        22
                 //echo  br();

                   $city=trim($this->input->get_post("city"));  //อำเภอ         23
                 //echo  br();

                  $province=trim($this->input->get_post("province"));  //จังหวัด        24
                 //echo  br();

                 $tel_address=trim($this->input->get_post("tel_address")); //โทรศํพท์  เบอร์โทรศํพท์หลังจากจังหวัด      25
                //echo  br();

                 $leave=trim($this->input->get_post("leave"));  //ลามาแล้ว       26
                 //echo  br();

                    $leave_thistime=trim($this->input->get_post("leave_thistime"));  //ลาครั้งนี้ วันทำการ      27
                 // echo  br();

                    $date_total_leave=trim($this->input->get_post("date_total_leave"));  //รวมเป็น วันทำการ       28
                 // echo  br();

                    $sign=trim($this->input->get_post("sign"));  //ลงชื่อขอแสดงความนับถือ       29
                 // echo  br();

                     $presign=trim($this->input->get_post("presign"));  //คำนำหน้าชื่อ  ขอแสดงความนับถือ         30
                  //echo  br();

                  $name_sign=trim($this->input->get_post("name_sign"));    //ชื่อ ขอแสดงความนับถือ       31
                 //echo  br();

                  $lastname_sign=trim($this->input->get_post("lastname_sign"));  //นามสกุล  ขอแสดงความนับถือ      32
                 // echo  br();

                 $name_inspector=trim($this->input->get_post("name_inspector"));  //ลงชื่อผู้ตรวจสอบ        34
                 // echo  br();             // echo  br();

                  $lastname_inspector=trim($this->input->get_post("lastname_inspector"));  //นามสกุลผู้ตรวจสอบ     35
                 // echo  br();

                  $position_inspector=trim($this->input->get_post("position_inspector")); //ตำแหน่งผู้ตรวจสอบ      38
                 // echo br();


                    $position_commander=trim($this->input->get_post("position_commander"));  //ตำแหน่งของผู้บังคับบัญชา     39
                   //echo br();


                 $date_inspector=trim($this->input->get_post("date_inspector"));  //วันที่ ผู้ตรวจสอบ     40
                 // echo br();
                 if(  $date_inspector  != "" ) //08/22/2017
                    {
                        $ex=explode("/",$date_inspector);
                         $date_inspector_conv=$ex[2]."-".$ex[0]."-".$ex[1];
                       // echo br();

                    }
                    elseif( $date_inspector =="" )
                    {
                         $date_inspector_conv="";
                    }

                    

                   $allowed=trim($this->input->get_post("allowed"));  //เห็นควรอนุญาตหรือไม่        33
                  //echo  br();


                          $name_commander=trim($this->input->get_post("name_commander"));  //ชื่อผู้บังคับบั้ญชา ชั้นต้น    36
                   //echo  br();

                     $lastname_commander=trim($this->input->get_post("lastname_commander"));  //นามสกุลผู้บังคับบัญชา  ชั้นต้น    37
                   //echo br();

                    $position_commander=trim($this->input->get_post("position_commander"));  //ตำแหน่งของผู้บังคับบัญชา    ชั้นต้น    39
                   //echo br();

                $allow_manager=trim($this->input->get_post("allow_manager"));  //ผู้บริหาร อนุญาตหรือไม่      42
                 // echo br();


                    $first_name2=trim($this->input->get_post("first_name2"));  // ชื่อผู้บริหาร   43
                //  echo br();

                    $last_name2=trim($this->input->get_post("last_name2"));  //นามสกุล ผู้บริหาร    44
                //  echo br();


                  $last_position=trim($this->input->get_post("last_position"));  //ตำแหน่ง ผู้บริหาร      45
                 // echo br();


                  //----------- ปรับปรุงรายการคำนวณ-----------------
                  /*
            มีวันลาสะสม (วัน) =cumulative

มีวันลาพักผ่อนในปีนี้ (วัน)=rest

รวมวันลาเป็น  = total  = cumulative +  rest

ในปีนี้ลามาแล้ว (วัน)= current

คงเหลือวันลาอีก (วัน)=keep
                   */



                 $date_total_leave_cal=$leave + $leave_thistime; //รวมเป็นวันทำการ=ลามาแล้ว+ลาครั้งนี้


                    $current_cal=$date_total_leave_cal;  //ในปีนี้ลามาแล้ว       ปรับปรุงเพิ่ม


                  $rest_cal =  $rest - $wishes;



                  /*
ปรับสูตรใหม่ใช้สูตรของยุ้ย
                  1+2=3
                  3-4=5
               และที่สำคัญต้องแก้ไข  ในปีนี้ลามาแล้ว (วัน)=    $('#current').textbox('setValue', k.date_total_leave );  (รวมเป็นวันทำการ)

                   */




                  /*
 มีวันลาสะสม (วัน) =cumulative    ให้fix เป็น 0 ยกเว้นเมย์ เป็น 1

มีวันลาพักผ่อนในปีนี้ (วัน)=rest   ให้ทุกคนเป็น 10 ยกเว้นเบส 5

รวมวันลาเป็น  = total  = cumulative +  rest

ในปีนี้ลามาแล้ว (วัน)= current

คงเหลือวันลาอีก (วัน)=keep


   มีความประสงค์จะขอลาพักผ่อน = wishes

รวมเป็น(วันทำการ)=date_total_leave


ลามาแล้ว (วันทำการ)=leave

ลาครั้งนี้(วันทำการ)=leave_thistime

รวมเป็นวันทำการ=date_total_leave

                   ปรับคงเหลือวันลา
                   คงเหลือวันลาอีก (วัน)= id="keep"
รวมวันลาเป็น (วัน)  name="total"    id="total"  -
ในปีนี้ลามาแล้ว (วัน)   name="current"    id="current"

     keep=total-current
     $('#keep').numberbox('setValue', keep_cal );


                   */




     //----------- ปรับปรุงรายการคำนวณ-----------------

                   date_default_timezone_set("Asia/Bangkok");
                  // $date_rec=date("Y-m-d H:s:00");  //วันที่ทำการบันทึก เผื่อต้องการ query
                   $date_rec=date("Y-m-d");  //วันที่ทำการบันทึก เผื่อต้องการ query


                $data=array(
                                             "write"=>$write,   //1
                                             "date_write"=>$date_write_conv,   //2
                                             "subject"=>$subject,    //3
                                             "study"=>$study,   //4
                                             "prename"=>$prename,   //5
                                             "first_name"=>$first_name,    //6
                                             "last_name"  =>$last_name,    //7
                                              "position"=> $position,     //8
                                              "affiliation"=> $affiliation,     //9
                                              "work"=>$work,    //10
                                               "tel"=>$tel,    //11
                                              "rest"=>$rest,
                                            "total"=> $total,
                                             "current"=>$current,
                                                "keep"=>$keep,
                                             "wishes"=>$wishes,
                                             "date_begin"=>$date_begin_conv,
                                            "end_date"=>$end_date_conv,
                                             "house_number"=>$house_number,
                                             "road"=>$road,
                                             "district"=>$district,
                                              "city"=>$city,
                                             "province"=>$province,
                                              "tel_address"=>$tel_address,
                                               "leave"=>$leave,    //12
                                             "leave_thistime"=>$leave_thistime,     //13
                                             "date_total_leave"=>$date_total_leave_cal,  //ปรับปรุง
                                             "sign"=> $sign,     //15
                                              "presign"=>$presign,    //16
                                            "name_sign"=>$name_sign,     //17
                                             "lastname_sign"=>$lastname_sign,     //18
                                       //       "allowed"=>$allowed,      //19
                                            "name_inspector"=>$name_inspector,     //20
                                             "lastname_inspector"=>$lastname_inspector,      //21
                                            "name_commander"=>$name_commander,        //22
                                           "lastname_commander"=>$lastname_commander,      //23
                                           "position_inspector"=>$position_inspector,       //24
                                           "position_commander"=>$position_commander,       //25
                                     //       "date_inspector"=>$date_inspector_conv,       //26    //error
                                     //      "allow_manager"=>$allow_manager,        //28
                                          "first_name2"=>$first_name2,       //29
                                          "last_name2"=>$last_name2,       //30
                                          "last_position"=>$last_position,      //31
                                             "date_rec"=>$date_rec,
                                 );
        
                                $tb=$this->tb_vacation;
                                $this->db->where("id_vacation",$id_vacation_update);
                                $ck= $this->db->update($tb,$data);
                               if( $ck )
                               {
                                  echo   json_encode(array("success"=>1));
                               }elseif( !$ck )
                               {
                                  echo   json_encode(array("success"=>0));
                               }
                                 

       }


      //http://10.87.196.170/document2/index.php/welcome/insert_vacation
      public   function   insert_vacation()
      {
             //header('Content-Type: text/html; charset=UTF-8');

            $this->user_model->login();  //for checklogin

             $type_person5=trim($this->input->get_post("type_person5"));
         //echo br();

             $write=trim($this->input->get_post("write"));  //เขียนที่    1
             //echo br();


              $date_write=trim($this->input->get_post("date_write"));  //วันเดือนปี ที่เขียน   2
           // echo br();

            if(  $date_write != "" ) //08/22/2017
            {
                $ex=explode("/",$date_write);
                 $date_write_conv=$ex[2]."-".$ex[0]."-".$ex[1];
                //echo br();

            }




            $subject=trim($this->input->get_post("subject"));  //เรื่อง   3
           // echo br();

            $study=trim($this->input->get_post("study"));  //เรียน   4
            // echo br();

            $prename=trim($this->input->get_post("prename")); //คำนำหน้าชื่อ   5
             // echo br();


            $first_name=trim($this->input->get_post("first_name"));  //ชื่อ    6
            // echo br();

            $last_name=trim($this->input->get_post("last_name")); //นามสกุล   7
            //  echo br();

            $position=trim($this->input->get_post("position"));  //ตำแหน่ง   8
             //  echo br();

             $affiliation=trim($this->input->get_post("affiliation")); //สังกัด   9
           //    echo br();

             $work=trim($this->input->get_post("work")); //งาน   10
             //   echo br();

          $tel=trim($this->input->get_post("tel")); //โทร    11
              //  echo br();

                $cumulative=trim($this->input->get_post("cumulative")); //วันลาสะสม   12
             //   echo br();

               $rest=trim($this->input->get_post('rest')); //วันลาที่เหลืออยู่      13
             //   echo  br();

           $total=trim($this->input->get_post('total'));  //รวมวันลาเป็น      14
              //  echo  br();

             $current=trim($this->input->get_post("current"));  //ในปีนี้ลามาแล้ว     15
              //  echo  br();

             $keep=trim($this->input->get_post("keep"));  //คงเหลือวันลาอีก      16
               //  echo  br();



               $wishes=trim($this->input->get_post("wishes"));  //มีความประสงค์จะขอลาพักผ่อนมีกำหนด    17
                 //echo  br();

                $date_begin=trim($this->input->get_post("date_begin"));  //ขอลาพักผ่อนตั้งแต่วันที่        18
               //  echo  br();
                  if(  $date_begin != "" ) //08/22/2017
                    {
                        $ex=explode("/",$date_begin);
                         $date_begin_conv=$ex[2]."-".$ex[0]."-".$ex[1];
                        //echo br();

                    }


                 $end_date=trim($this->input->get_post("end_date"));  //ขอลาพักผ่อน ถึงวันที่        19
               // echo  br();
                if(  $end_date != "" ) //08/22/2017
                    {
                        $ex=explode("/",$end_date);
                         $end_date_conv=$ex[2]."-".$ex[0]."-".$ex[1];
                        //echo br();

                    }


                   $house_number=trim($this->input->get_post("house_number"));  //บ้านเลขที่        20
                //echo  br();

                   $road=trim($this->input->get_post("road"));  //ถนน        21
                 //echo  br();

                    $district=trim($this->input->get_post("district")); //ตำบล        22
                 //echo  br();

                   $city=trim($this->input->get_post("city"));  //อำเภอ         23
                 //echo  br();

                  $province=trim($this->input->get_post("province"));  //จังหวัด        24
                 //echo  br();

                 $tel_address=trim($this->input->get_post("tel_address")); //โทรศํพท์  เบอร์โทรศํพท์หลังจากจังหวัด      25
                //echo  br();

                 $leave=trim($this->input->get_post("leave"));  //ลามาแล้ว       26
                 //echo  br();

                    $leave_thistime=trim($this->input->get_post("leave_thistime"));  //ลาครั้งนี้ วันทำการ      27
                 // echo  br();

                    $date_total_leave=trim($this->input->get_post("date_total_leave"));  //รวมเป็น วันทำการ       28
                 // echo  br();

                    $sign=trim($this->input->get_post("sign"));  //ลงชื่อขอแสดงความนับถือ       29
                 // echo  br();

                     $presign=trim($this->input->get_post("presign"));  //คำนำหน้าชื่อ  ขอแสดงความนับถือ         30
                  //echo  br();

                  $name_sign=trim($this->input->get_post("name_sign"));    //ชื่อ ขอแสดงความนับถือ       31
                 //echo  br();

                  $lastname_sign=trim($this->input->get_post("lastname_sign"));  //นามสกุล  ขอแสดงความนับถือ      32
                 // echo  br();

                 $name_inspector=trim($this->input->get_post("name_inspector"));  //ลงชื่อผู้ตรวจสอบ        34
                 // echo  br();             // echo  br();

                  $lastname_inspector=trim($this->input->get_post("lastname_inspector"));  //นามสกุลผู้ตรวจสอบ     35
                 // echo  br();

                  $position_inspector=trim($this->input->get_post("position_inspector")); //ตำแหน่งผู้ตรวจสอบ      38
                 // echo br();


                    $position_commander=trim($this->input->get_post("position_commander"));  //ตำแหน่งของผู้บังคับบัญชา     39
                   //echo br();


                 $date_inspector=trim($this->input->get_post("date_inspector"));  //วันที่ ผู้ตรวจสอบ     40
                 // echo br();
                 if(  $date_inspector  != "" ) //08/22/2017
                    {
                        $ex=explode("/",$date_inspector);
                         $date_inspector_conv=$ex[2]."-".$ex[0]."-".$ex[1];
                       // echo br();

                    }


                   $allowed=trim($this->input->get_post("allowed"));  //เห็นควรอนุญาตหรือไม่        33
                  //echo  br();


                          $name_commander=trim($this->input->get_post("name_commander"));  //ชื่อผู้บังคับบั้ญชา ชั้นต้น    36
                   //echo  br();

                     $lastname_commander=trim($this->input->get_post("lastname_commander"));  //นามสกุลผู้บังคับบัญชา  ชั้นต้น    37
                   //echo br();

                    $position_commander=trim($this->input->get_post("position_commander"));  //ตำแหน่งของผู้บังคับบัญชา    ชั้นต้น    39
                   //echo br();

                $allow_manager=trim($this->input->get_post("allow_manager"));  //ผู้บริหาร อนุญาตหรือไม่      42
                 // echo br();


                    $first_name2=trim($this->input->get_post("first_name2"));  // ชื่อผู้บริหาร   43
                //  echo br();

                    $last_name2=trim($this->input->get_post("last_name2"));  //นามสกุล ผู้บริหาร    44
                //  echo br();


                  $last_position=trim($this->input->get_post("last_position"));  //ตำแหน่ง ผู้บริหาร      45
                 // echo br();


                  //----------- ปรับปรุงรายการคำนวณ-----------------
                  /*
            มีวันลาสะสม (วัน) =cumulative

มีวันลาพักผ่อนในปีนี้ (วัน)=rest

รวมวันลาเป็น  = total  = cumulative +  rest

ในปีนี้ลามาแล้ว (วัน)= current

คงเหลือวันลาอีก (วัน)=keep

   $wishes=trim($this->input->get_post("wishes"));  //มีความประสงค์จะขอลาพักผ่อนมีกำหนด    17
                   */



                 $date_total_leave_cal=$leave + $leave_thistime; //รวมเป็นวันทำการ=ลามาแล้ว+ลาครั้งนี้


                    $current_cal=$date_total_leave_cal;  //ในปีนี้ลามาแล้ว       ปรับปรุงเพิ่ม


                  $rest_cal =  $rest - $wishes;



                  /*
ปรับสูตรใหม่ใช้สูตรของยุ้ย
                  1+2=3
                  3-4=5
               และที่สำคัญต้องแก้ไข  ในปีนี้ลามาแล้ว (วัน)=    $('#current').textbox('setValue', k.date_total_leave );  (รวมเป็นวันทำการ)

                   */




                  /*
 มีวันลาสะสม (วัน) =cumulative    ให้fix เป็น 0 ยกเว้นเมย์ เป็น 1

มีวันลาพักผ่อนในปีนี้ (วัน)=rest   ให้ทุกคนเป็น 10 ยกเว้นเบส 5

รวมวันลาเป็น  = total  = cumulative +  rest

ในปีนี้ลามาแล้ว (วัน)= current

คงเหลือวันลาอีก (วัน)=keep


   มีความประสงค์จะขอลาพักผ่อน = wishes

รวมเป็น(วันทำการ)=date_total_leave


ลามาแล้ว (วันทำการ)=leave

ลาครั้งนี้(วันทำการ)=leave_thistime

รวมเป็นวันทำการ=date_total_leave

                   ปรับคงเหลือวันลา
                   คงเหลือวันลาอีก (วัน)= id="keep"
รวมวันลาเป็น (วัน)  name="total"    id="total"  -
ในปีนี้ลามาแล้ว (วัน)   name="current"    id="current"

     keep=total-current
     $('#keep').numberbox('setValue', keep_cal );


                   */




     //----------- ปรับปรุงรายการคำนวณ-----------------

                   date_default_timezone_set("Asia/Bangkok");
                  // $date_rec=date("Y-m-d H:s:00");  //วันที่ทำการบันทึก เผื่อต้องการ query
                   $date_rec=date("Y-m-d");  //วันที่ทำการบันทึก เผื่อต้องการ query

               if(   $date_inspector  != ""     )
               {
                $data=array(
                                             "write"=>$write,   //1
                                             "date_write"=>$date_write_conv,   //2
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
                                       //      "rest"=>$rest_cal,


                                              "total"=> $total,
                                              //  "total"=> $total_cal,


                                             "current"=>$current,
                                         //   "current"=>$current_cal,  //ในปีนี้ลามาแล้ว       ปรับปรุงเพิ่ม

                                                "keep"=>$keep,
                                          //  "keep"=>  $keep_cal,   //วันลาคงเหลือ keep =  วันลารวม - ลาครั้งนี้  keep =   $keep_cal= $total - $leave_thistime;

                                             "wishes"=>$wishes,

                                             "date_begin"=>$date_begin_conv,
                                             "end_date"=>$end_date_conv,

                                             "house_number"=>$house_number,
                                             "road"=>$road,
                                             "district"=>$district,
                                             "city"=>$city,
                                             "province"=>$province,
                                              "tel_address"=>$tel_address,
                                               "leave"=>$leave,    //12
                                            //  "leave"=>$date_total_leave,    //ปรับปรุงรวมวันลาใหม่ โดยการรวมวันลาที่เหลืออยู่


                                              "leave_thistime"=>$leave_thistime,     //13

                                           //   "date_total_leave"=>$date_total_leave,     //14
                                                "date_total_leave"=>$date_total_leave_cal,  //ปรับปรุง


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


                                             "date_inspector"=>$date_inspector_conv,       //26    //error



                                        //    "date_commander"=>$date_commander_conv,        //27
                                            "allow_manager"=>$allow_manager,        //28
                                           "first_name2"=>$first_name2,       //29
                                           "last_name2"=>$last_name2,       //30
                                          "last_position"=>$last_position,      //31
                                       //   "last_date"=>$last_date,       //32
                                    //     "type_person"=>$type_person,
                                   //     "id_staff"=>$id_staff,

                                             "date_rec"=>$date_rec,
                                 );
               }
                else
                    {
                    $data=array(
                                             "write"=>$write,   //1
                                             "date_write"=>$date_write_conv,   //2
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
                                         //      "rest"=>$rest_cal,


                                              "total"=> $total,
                                          //   "total"=> $total_cal,

                                             "current"=>$current,
                                           //   "current"=>$current_cal,  //ในปีนี้ลามาแล้ว       ปรับปรุงเพิ่ม


                                            "keep"=>$keep,
                                            //   "keep"=>  $keep_cal,    //วันลาคงเหลือ keep =  วันลารวม - ลาครั้งนี้  keep =   $keep_cal= $total - $leave_thistime;


                                             "wishes"=>$wishes,
                                             "date_begin"=>$date_begin_conv,
                                             "end_date"=>$end_date_conv,
                                             "house_number"=>$house_number,
                                             "road"=>$road,
                                             "district"=>$district,
                                             "city"=>$city,
                                             "province"=>$province,
                                              "tel_address"=>$tel_address,
                                              "leave"=>$leave,    //12
                                            //  "leave"=>$date_total_leave,    //ปรับปรุงรวมวันลาใหม่ โดยการรวมวันลาที่เหลืออยู่
                                              "leave_thistime"=>$leave_thistime,     //13

                                           //   "date_total_leave"=>$date_total_leave,     //14
                                               "date_total_leave"=>$date_total_leave_cal,  //ปรับปรุง

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

                                           //  "date_inspector"=>$date_inspector_conv,       //26    //error



                                        //    "date_commander"=>$date_commander_conv,        //27
                                            "allow_manager"=>$allow_manager,        //28
                                           "first_name2"=>$first_name2,       //29
                                           "last_name2"=>$last_name2,       //30
                                          "last_position"=>$last_position,      //31
                                       //   "last_date"=>$last_date,       //32
                                    //     "type_person"=>$type_person,
                                   //     "id_staff"=>$id_staff,
                                                "date_rec"=>$date_rec,
                                 );

                    }



                                 // print_r($data);
                                  //echo br();



                                $tb=$this->tb_vacation;
                               $ck_insert=$this->db->insert($tb,$data); //ตรวจสอบการ insert
                            // echo br();
                             //   $ck_insert=1;
                                
                              //  $ck_insert=0;
                                
                       
                                 
                                 
                                if(  $ck_insert    )
                                   {
                                                     $id_vacation =  $this->db->insert_id();
                                                     echo json_encode(array("success"=>1,"id_vacation"=>$id_vacation));
                              
                                   }
                                   else
                                   {
                                                     echo json_encode(array("success"=>0));
                                   }
                                






      } //end function


   #---------delete-------------------------
      //http://10.87.196.170/document2/index.php/welcome/delete_vacation
    public   function  delete_vacation()
    {
            $this->user_model->login();  //for checklogin
            $id_vacation=trim($this->input->get_post("id_vacation"));
           // echo br();
               $tb=$this->tb_vacation;
               if( $id_vacation > 0 )
               {
                   $this->db->where("id_vacation",$id_vacation);
                   $ck=$this->db->delete($tb);
                   //$ck=true;
                   //$ck=false;
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

   #-------------sick  ลาป่วยประจำปี---------------------------------------
    //http://192.168.2.120/document3/index.php/welcome/name_call_sick
   public  function   name_call_sick() // เรียกข้อมูลจาก sick ด้วย ชื่อ
   {
          $this->user_model->login();  //for checklogin
           $first_name=trim($this->input->get_post("first_name"));
           $tb=$this->tb_sick;
             $query=$this->db->get_where($tb,array("first_name"=>$first_name));
             $num=$query->num_rows();
             if( $num > 0 )
                 { //if
                       foreach($query->result() as $row)
                       {
                           $rows[]=$row;
                       }//end  foreach
                        echo  json_encode($rows);
                 }//end if
   }
    
     //http://10.87.196.170/document2/index.php/welcome/json_sick
     public   function   json_sick()
     {
                 $this->user_model->login();  //for checklogin
                // $tb="tb_sick";
                        $tb=$this->tb_sick;
                        $this->db->order_by("id_sick","DESC");
                        $q=$this->db->get($tb,30);
                        foreach($q->result() as $row)
                        {
                            $rows[]=$row;
                        }
                        echo json_encode($rows);
     }
     
    // http://10.87.196.170/document3/index.php/welcome/call_date_sick
     public  function   call_date_sick()  //ดึงวันลาป่วยตามวันที่ลา
     {
                $this->user_model->login();  //for checklogin 
                 $first_name=$this->input->get_post("first_name");
                //echo br();
                
                $tb_sick=$this->tb_sick;
                $this->db->order_by("id_sick","DESC");
                $query=$this->db->get_where($tb_sick,array("first_name"=>$first_name));
                $num =   $query->num_rows();
                
                if(  $num > 0 )
                {
                    foreach($query->result() as $row)
                    {
                        $rows[]=$row;
                    }
                    echo json_encode($rows);
                }   
                
         
     }
     
     
     

       //http://10.87.196.170/document2/index.php/welcome/json_call_sick/74
          public   function   json_call_sick()
                {
                            $this->user_model->login();  //for checklogin

                                 $tb_sick=$this->tb_sick;


                              $id_sick=trim($this->uri->segment(3));


                              $first_name_sick=trim($this->input->get_post("first_name_sick"));
                              $this->db->order_by("id_sick","ASC");
                              $q=$this->db->get_where($tb_sick,array("first_name"=> $first_name_sick),1);

                              $check =  $q->num_rows();
                             if( $check > 0 )
                             {
                                    foreach($q->result() as $row )
                                    {
                                        $rows[]=$row;
                                    }
                                    echo json_encode($rows);
                             }

                }


     public  function  check_day_sick()
     {

            //id_staff_sick
            $id_staff_sick=trim($this->input->get_post("id_staff_sick"));
           //echo br();
            //$tb_sick="tb_sick";
              $tb_sick= $this->tb_sick;
           $tb_staff="tb_staff";

           if( $id_staff_sick > 0 )
           {
                $this->db->join($tb_sick,  $tb_staff.".name=".$tb_sick.".first_name","right" );

                $q=$this->db->get_where($tb_staff,array(  $tb_staff.".id_staff"=>$id_staff_sick));
                $this->db->order_by(  $tb_sick.".id_sick","desc");
                //$q=$this->db->get();
                  $check = $q->num_rows();
                  if( $check > 0 )
                  {
                      foreach($q->result() as $row)
                      {
                          $rows[]=$row;
                      }
                      echo json_encode($rows);
                  }


           }

     }



     //http://10.87.196.170/document2/index.php/welcome/json_staff
     public function json_staff()
     {
         $this->user_model->login();  //for checklogin
          $tb="tb_staff";
        //  $this->db->order_by("id_staff","DESC");
                        $q=$this->db->get($tb);
                        foreach($q->result() as $row)
                        {
                            $rows[]=$row;
                        }
                        echo json_encode($rows);

     }

    //  http://10.87.196.170/document3/index.php/welcome/json_call_staff
     public function json_call_staff()
     {
          $this->user_model->login();  //for checklogin
            $tb="tb_staff";
            $id_staff=trim($this->input->get_post("id_staff"));

            if( $id_staff > 0 )
            {
            $q=$this->db->get_where($tb,array("id_staff"=>$id_staff));
                        foreach($q->result() as $row)
                        {
                            $rows[]=$row;
                        }
                        echo json_encode($rows);
            }


     }

         //  http://10.87.196.170/document3/index.php/welcome/json_call_staff_sick
     public function json_call_staff_sick()
     {
          $this->user_model->login();  //for checklogin
           $tb="tb_staff";

            $id_staff=trim($this->input->get_post("id_staff_sick"));
            // $id_staff=trim($this->uri->segment(3));


            $q=$this->db->get_where($tb,array("id_staff"=>$id_staff));
                        foreach($q->result() as $row)
                        {
                            $rows[]=$row;
                        }
                        echo json_encode($rows);



     }

     



     //มีวันลาสะสม   ตรวจสอบวันลาสะสม
     public   function check_vacation()
     {

          $this->user_model->login();  //for checklogin
         //  $tb="tb_vacation";
            $tb=$this->tb_vacation;
            $first_name=trim($this->input->get_post("first_name"));
          //echo br();
            $this->db->order_by("id_vacation","DESC");

            $q=$this->db->get_where($tb,array("first_name"=>$first_name),1);
            foreach($q->result() as $row)
            {
                $rows[]=$row;
            }
            echo  json_encode($rows);


     }

     //http://10.87.196.170/document3/index.php/welcome/call_update_tbsick
     public function call_update_tbsick()
     {
              $this->user_model->login();  //for checklogin
             //echo  $id_sick=trim($this->input->get_post("id_sick_update"));
              $id_sick=trim(  $this->uri->segment(3) );
              //echo br();

              if( $id_sick > 0 )
              {

                     $tb=$this->tb_sick;
                     $q = $this->db->get_where($tb,array("id_sick"=>$id_sick));
                     $check = $q->num_rows();
                     //echo $check;
                     if($check > 0 )
                     {
                         foreach($q->result() as $row)
                         {
                             $rows[]=$row;
                         }
                              echo json_encode($rows);

                     }

              }

     }
    //http://10.87.196.170/document3/index.php/welcome/update_tbsick
     public  function  update_tbsick()
     {
              $this->user_model->login();  //for checklogin
              //id_sick_update
               header('Content-Type: text/html; charset=UTF-8');


              $id_sick=trim($this->input->get_post("id_sick_update"));
              //echo br();

              /* #---------------------------------------------------------- code insert ---------------------------------------------- */

                $type_person=trim($this->input->get_post("type_person"));  //ประเภทของพนักงาน
                  //echo br();
                     $write=trim($this->input->get_post("write"));  //เขึยนที่
                  //echo br();
                   $date_write1=trim($this->input->get_post("date_write1"));  //วันที่
                  //echo br();
                              if(    $date_write1  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/",$date_write1);
                                       $conv_date_write1 =  $ex[2]."-".$ex[0]."-".$ex[1];
                                       //echo br();

                              }
                             else {
                                       $conv_date_write1 ="";

                             }

                     $subject=trim($this->input->get_post("subject"));  //เรื่อง   3
                   // echo br();
                      $study=trim($this->input->get_post("study"));  //เรียน   4
                   // echo br();

                    //  เรียกจาก   id_staff_sick
                      $prename=trim($this->input->get_post("prename_sick")); //คำนำหน้าชื่อ   5
                    //echo br();
                     $first_name=trim($this->input->get_post("first_name_sick"));  //ชื่อ    6
                  //  echo br();

                     $last_name=trim($this->input->get_post("last_name_sick")); //นามสกุล   7
                   // echo br();

                      $position=trim($this->input->get_post("position_sick"));  //ตำแหน่ง   8
                    //echo br();

                     $affiliation=trim($this->input->get_post("affiliation")); //สังกัด   9
                  //  echo br();

                    $work=trim($this->input->get_post("work")); //งาน   10
                   // echo br();

                     $tel=trim($this->input->get_post("tel")); //โทร    11
                   // echo br();

                    /*
                    echo  $cumulative=trim($this->input->get_post("cumulative")); //วันลาสะสม   12
                    echo br();
                    */

                                            //--------------------------------------------------------------------------
                       $disease=trim($this->input->get_post("disease"));    //  1=ป่วยด้วยโรค   2=จากการทำงาน   3=กิจส่วนตัว  4=คลอดบุตร
                    // echo br();

                                          //------------- เพิ่มเติม ----------------------
                       $sick_disease=trim($this->input->get_post("sick_disease"));  // ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน
                   //  echo br();


                           $disease_detail=trim($this->input->get_post("disease_detail"));  // เกี่ยวข้องหรือมีสาเหตุจาก
                   //  echo br();




                        $disease_person=trim($this->input->get_post("disease_person")); //กิจส่วนตัว เนื่องจาก
                    // echo br();


                          $begin_date1=trim($this->input->get_post("begin_date1"));  //ตั้งแต่วันที่
                   //  echo br();
                      if(     $begin_date1  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/", $begin_date1 );
                                       $conv_begin_date1 =  $ex[2]."-".$ex[0]."-".$ex[1];
                                      // echo br();

                              }
                    else {

                              $conv_begin_date1="";
                    }



                  $end_date1=trim($this->input->get_post("end_date1"));  //ถึงวันที่
                  //echo br();
                         if(     $end_date1  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/", $end_date1 );
                                        $conv_end_date1 =  $ex[2]."-".$ex[0]."-".$ex[1];
                                     //  echo br();

                              }
                              else
                              {
                                    $conv_end_date1 = "";
                              }


                                         //-----------------------------------------------------------------------------

                   $count_date=trim($this->input->get_post("count_date"));  //มีกำหนด วัน
                // echo br();


                   $me_leave=trim($this->input->get_post("me_leave"));  //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
              //  echo br();

                                         //----------------- ข้าพเจ้าได้ลา มีกำหนดวัน
                        $begin_date2=trim($this->input->get_post("begin_date2"));  //ตั้งแต่วันที่
               // echo br();
                    if(      $begin_date2  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/",  $begin_date2 );
                                        $conv_begin_date2 =  $ex[2]."-".$ex[0]."-".$ex[1];
                                       //echo br();

                              }
                              else
                              {
                                  $conv_begin_date2="";
                              }

                 $end_date2=trim($this->input->get_post("end_date2"));  //ถึงวันที่
               // echo br();
                     if(      $end_date2  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/",  $end_date2 );
                                        $conv_end_date2 =  $ex[2]."-".$ex[0]."-".$ex[1];
                                      // echo br();

                              }
 else {
     $conv_end_date2="";
 }



                          $count_date2=trim($this->input->get_post("count_date2"));   //กำหนด วัน
                   //  echo br();
                                         //----------------------------------------------------------------------------------

                       $house_number=trim($this->input->get_post("house_number"));  //บ้านเลขที่
                  //  echo br();


                          $road=trim($this->input->get_post("road_sick"));  //ถนน
                  //   echo br();

                         $district=trim($this->input->get_post("district_sick"));  //ตำบล
                  //  echo br();

                      $district2=trim($this->input->get_post("district2_sick"));  //อำเภอ
                 //   echo br();

                     $province=trim($this->input->get_post("province_sick"));  //จังหวัด
                  //  echo br();

                                         //-------------------------------------------------------------------------------------

                     $tel2=trim($this->input->get_post("tel2_sick")); //โทรศํพท์
                   // echo br();

                   $sign_name=trim($this->input->get_post("sign_name"));  //ขอแสดงความนับถือ  ชื่อ
                 //  echo br();

                    $sign_lastname=trim($this->input->get_post("sign_lastname"));   //ขอแสดงความนับถือ  นามสกุล
                //  echo br();

                    $sign_prename=trim($this->input->get_post("sign_prename"));  //คำนำหน้าลงท้าย ช่ื่อ  1=นาย  2=นาง  3=นางสาว
                //  echo br();

                    $firstname3=trim($this->input->get_post("firstname3"));  //  ลงชื่อ  ชื่อ
               //   echo br();

                                          //-------------------------------------------------------------------------------------------------------------

                     $lastname3=trim($this->input->get_post("lastname3"));  //  ลงชื่อ  นามสกุล
                 // echo br();


                                         //---------------- ป่วย------------------------
                   $sick1=trim($this->input->get_post("sick1"));  // ป่วย  ลามาแล้ว  วันทำการ
               //  echo br();

                   $sick2=trim($this->input->get_post("sick2"));  // ป่วย     ลาครั้งนี้   วันทำการ
                 //echo br();

                  $total_sick=trim($this->input->get_post("total_sick"));  //รวมเป็น  วันทำการ
                // echo br();
                                          //---------------- ป่วย------------------------

                                          //----------------กิจส่วนตัว--------------------
                  $sick_person1=trim($this->input->get_post("sick_person1"));  // ลามาแล้ว  วันทำการ
              //   echo br();

                                          //------------------------------------------------------------------------------------------------------------------


                    $sick_person2=trim($this->input->get_post("sick_person2")); //  ลาครั้งนี้   วันทำการ
                // echo br();

                  $total_sick_person=trim($this->input->get_post("total_sick_person"));  //รวมเป็น  วันทำการ
               //  echo br();
                                          //----------------กิจส่วนตัว--------------------


                                          //----------------- คลอดบุตร---------------------
                $confined1=trim($this->input->get_post("confined1"));  // ลามาแล้ว  วันทำการ
               //  echo br();

                     $confined2=trim($this->input->get_post("confined2"));  // ลามาแล้ว  วันทำการ
                 // echo br();

                   $total_confined=trim($this->input->get_post("total_confined"));  //รวมเป็น  วันทำการ
                 // echo br();

                                          //--------------------------------------------------------------------------------------------------------------------

                       $inspector_name=trim($this->input->get_post("inspector_name"));  //ชื่อ ผู้ตรวจสอบ
               //  echo br();

                     $inspector_lastname=trim($this->input->get_post("inspector_lastname"));   //นามสกุล ผู้ตรวจสอบ
                // echo br();


                      $inspector_position=trim($this->input->get_post("inspector_position"));  //  ตำแหน่ง   ผู้ตรวจสอบ
                 // echo br();


                     $date_inspector=trim($this->input->get_post("date_inspector"));  //  วัน เดือน ปี   ผู้ตรวจสอบ
                //  echo br();

                           if(       $date_inspector  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/",   $date_inspector );
                                      $conv_date_inspector =  $ex[2]."-".$ex[0]."-".$ex[1];
                                      // echo br();

                              }
                              else
                              {
                                   $conv_date_inspector ="";
                              }


                                          //-------------ความเห็นของผู้บังคับบัญชาชั้นต้น (โปรดระบุ ข้อ ก และ ข้อ ข)
                                     $supervisor_sick=trim($this->input->get_post("supervisor_sick"));  // 1=เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน     2=ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน
                                 //  echo br();

                                          //--------------------------------------------------------------------------------------------------------------------

                                    $supervisor_agree=trim($this->input->get_post("supervisor_agree"));  //1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                                //   echo br();


                                       $first_name2=trim($this->input->get_post("first_name2"));  //ลงชื่อ  ความเห็นของผู้บังคับบัญชา
                                   // echo br();

                                       $last_name2=trim($this->input->get_post("last_name2"));   //ลงชื่อ  นามสกุล ผู้บังคับบัญชา
                                    //echo br();

                                         $postion2=trim($this->input->get_post("postion2"));  //ตำแหน่ง ผู้บังคับบัญชา
                                   //  echo br();

                                     /*
                                     echo       $commander_date=trim($this->input->get_post("commander_date"));  //วัน เดือน ปี   ความเห็นของผู้บังคับบัญชาชั้นต้น
                                     echo br();
                                       */
                                           //--------------------------------------------------------------------------------------------------------------------


                                      $manager_allow=trim($this->input->get_post("manager_allow"));   // คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                                     // echo  br();


                                       $first_name3=trim($this->input->get_post("first_name3"));   //ลงชื่อ  คำสั่งผู้บริหาร
                                     // echo  br();

                                          $last_name3=trim($this->input->get_post("last_name3"));  //ลงชื่อ นามสกุล
                                       //echo  br();

                                         $manager_position=trim($this->input->get_post("manager_position")); //ตำแหน่ง
                                      // echo  br();

                                        //    $date_manager=trim($this->input->get_post("date_manager"));  //วัน เดือน ปี คำสั่งผู้บริหาร
                                          // echo  br();


                                     //       $id_staff_sick=trim($this->input->get_post("id_staff_sick"));

                                         if(  $conv_date_write1 != ""  )
                                         {  //begin  if
                                           
                                             $data=array(
                                                 "type_person"=>$type_person,   //ประเภทของพนักงาน        2
                                                 "write"=> $write    , //เขึยนที่                              3
                                                 "date_write1"=>$conv_date_write1,    //วันที่                   4
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
                                                 "begin_date1"=> $conv_begin_date1, //ตั้งแต่วันที่
                                                   "end_date1"=>$conv_end_date1, //ถึงวันที่
                                                 "count_date"=> $count_date,   //มีกำหนด วัน
                                                 "me_leave"=>$me_leave,  //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
                                                   "begin_date2"=> $conv_begin_date2,  //ตั้งแต่วันที่
                                                      "end_date2"=>$conv_end_date2,   //ถึงวันที่
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
                                            //       "date_inspector"=>$conv_date_inspector, //  วัน เดือน ปี   ผู้ตรวจสอบ
                                              //      "supervisor_sick"=> $supervisor_sick, // 1=เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน     2=ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน
                                             //       "supervisor_agree"=>$supervisor_agree, //1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                                                    "first_name2"=> $first_name2,//ลงชื่อ  ความเห็นของผู้บังคับบัญชา
                                                    "last_name2"=>$last_name2,   //ลงชื่อ  นามสกุล ผู้บังคับบัญชา
                                                    "postion2"=>$postion2,   //ตำแหน่ง ผู้บังคับบัญชา                                           
                                             //       "manager_allow"=>$manager_allow,    // คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                                                    "first_name3"=>$first_name3,  //ลงชื่อ  คำสั่งผู้บริหาร
                                                   "last_name3"=> $last_name3,  //ลงชื่อ นามสกุล
                                                    "manager_position"=> $manager_position,   //ตำแหน่ง
                                                   "sick_disease"=>$sick_disease,        //   $sick_disease=trim($this->input->get_post("sick_disease"));  // ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน      
                                             );
                                             
                                             
                                         }  //end  if
                                         else if(  $conv_date_write1 == "" )
                                             {  // else if
                                             
                                             
                                             $data=array(
                                                 "type_person"=>$type_person,   //ประเภทของพนักงาน        2
                                                 "write"=> $write    , //เขึยนที่                              3
                                              //   "date_write1"=>$conv_date_write1,    //วันที่                   4
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
                                                 "begin_date1"=> $conv_begin_date1, //ตั้งแต่วันที่
                                                   "end_date1"=>$conv_end_date1, //ถึงวันที่
                                                 "count_date"=> $count_date,   //มีกำหนด วัน
                                                 "me_leave"=>$me_leave,  //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
                                                   "begin_date2"=> $conv_begin_date2,  //ตั้งแต่วันที่
                                                      "end_date2"=>$conv_end_date2,   //ถึงวันที่
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
                                            //       "date_inspector"=>$conv_date_inspector, //  วัน เดือน ปี   ผู้ตรวจสอบ
                                              //      "supervisor_sick"=> $supervisor_sick, // 1=เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน     2=ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน
                                             //       "supervisor_agree"=>$supervisor_agree, //1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                                                    "first_name2"=> $first_name2,//ลงชื่อ  ความเห็นของผู้บังคับบัญชา
                                                    "last_name2"=>$last_name2,   //ลงชื่อ  นามสกุล ผู้บังคับบัญชา
                                                    "postion2"=>$postion2,   //ตำแหน่ง ผู้บังคับบัญชา                                           
                                             //       "manager_allow"=>$manager_allow,    // คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                                                    "first_name3"=>$first_name3,  //ลงชื่อ  คำสั่งผู้บริหาร
                                                   "last_name3"=> $last_name3,  //ลงชื่อ นามสกุล
                                                    "manager_position"=> $manager_position,   //ตำแหน่ง
                                                   "sick_disease"=>$sick_disease,        //   $sick_disease=trim($this->input->get_post("sick_disease"));  // ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน      
                                             );
                                             
                                         }    // end else
                                             // print_r($data);
                                           //  $id_sick=trim($this->input->get_post("id_sick_update"));
                                       if(  $id_sick  > 0   )
                                       { //if
                                             $tb=$this->tb_sick;
                                             $this->db->where("id_sick" , $id_sick  );
                                           $ck=  $this->db->update($tb,$data);
                                              if( $ck )
                                              {
                                                  echo json_encode(array("success"=>1));
                                              }
                                              else
                                              {
                                                  echo json_encode(array("success"=>0));
                                              }       
                                       }// end if




               /* #---------------------------------------------------------- code insert ---------------------------------------------- */





     }

    //http://10.87.196.170/document3/index.php/welcome/del_tbsick
     public  function del_tbsick()
     {
             $this->user_model->login();  //for checklogin
              $id_sick=$this->uri->segment(3);
            // echo br();
             if( $id_sick > 0 )
             {
                  $tb=$this->tb_sick;
                  $this->db->where("id_sick",$id_sick);
                  $ck=$this->db->delete($tb);
               //  $ck=true;
                 // $ck=false;
                  if( $ck )
                  {
                      echo json_encode(array("success"=>1));
                  }
                  elseif( !$ck ){
                      echo  json_encode(array("success"=>0));
                  }
             }

     }

      //http://10.87.196.170/document3/index.php/welcome/insert_sick
     public   function  insert_sick()
     {
                $this->user_model->login();  //for checklogin
                header('Content-Type: text/html; charset=UTF-8');
                    $type_person=trim($this->input->get_post("type_person"));  //ประเภทของพนักงาน
                  //echo br();
                     $write=trim($this->input->get_post("write"));  //เขึยนที่
                  //echo br();
                   $date_write1=trim($this->input->get_post("date_write1"));  //วันที่
                  //echo br();
                              if(    $date_write1  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/",$date_write1);
                                       $conv_date_write1 =  $ex[2]."-".$ex[0]."-".$ex[1];
                                       //echo br();

                              }
                             else {
                                       $conv_date_write1 ="";

                             }

                     $subject=trim($this->input->get_post("subject"));  //เรื่อง   3
                   // echo br();
                      $study=trim($this->input->get_post("study"));  //เรียน   4
                   // echo br();

                    //  เรียกจาก   id_staff_sick
                      $prename=trim($this->input->get_post("prename_sick")); //คำนำหน้าชื่อ   5
                    //echo br();
                     $first_name=trim($this->input->get_post("first_name_sick"));  //ชื่อ    6
                  //  echo br();

                     $last_name=trim($this->input->get_post("last_name_sick")); //นามสกุล   7
                   // echo br();

                      $position=trim($this->input->get_post("position_sick"));  //ตำแหน่ง   8
                    //echo br();

                     $affiliation=trim($this->input->get_post("affiliation")); //สังกัด   9
                  //  echo br();

                    $work=trim($this->input->get_post("work")); //งาน   10
                   // echo br();

                     $tel=trim($this->input->get_post("tel")); //โทร    11
                   // echo br();

                    /*
                    echo  $cumulative=trim($this->input->get_post("cumulative")); //วันลาสะสม   12
                    echo br();
                    */

                                            //--------------------------------------------------------------------------
                       $disease=trim($this->input->get_post("disease"));    //  1=ป่วยด้วยโรค   2=จากการทำงาน   3=กิจส่วนตัว  4=คลอดบุตร
                    // echo br();

                                          //------------- เพิ่มเติม ----------------------
                       $sick_disease=trim($this->input->get_post("sick_disease"));  // ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน
                   //  echo br();


                           $disease_detail=trim($this->input->get_post("disease_detail"));  // เกี่ยวข้องหรือมีสาเหตุจาก
                   //  echo br();




                        $disease_person=trim($this->input->get_post("disease_person")); //กิจส่วนตัว เนื่องจาก
                    // echo br();


                          $begin_date1=trim($this->input->get_post("begin_date1"));  //ตั้งแต่วันที่
                   //  echo br();
                      if(     $begin_date1  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/", $begin_date1 );
                                       $conv_begin_date1 =  $ex[2]."-".$ex[0]."-".$ex[1];
                                      // echo br();

                              }
                    else {

                              $conv_begin_date1="";
                    }



                  $end_date1=trim($this->input->get_post("end_date1"));  //ถึงวันที่
                  //echo br();
                         if(     $end_date1  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/", $end_date1 );
                                        $conv_end_date1 =  $ex[2]."-".$ex[0]."-".$ex[1];
                                     //  echo br();

                              }
                              else
                              {
                                    $conv_end_date1 = "";
                              }


                                         //-----------------------------------------------------------------------------

                   $count_date=trim($this->input->get_post("count_date"));  //มีกำหนด วัน
                // echo br();


                   $me_leave=trim($this->input->get_post("me_leave"));  //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา
              //  echo br();

                                         //----------------- ข้าพเจ้าได้ลา มีกำหนดวัน
                        $begin_date2=trim($this->input->get_post("begin_date2"));  //ตั้งแต่วันที่
               // echo br();
                    if(      $begin_date2  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/",  $begin_date2 );
                                        $conv_begin_date2 =  $ex[2]."-".$ex[0]."-".$ex[1];
                                       //echo br();

                              }
                              else
                              {
                                  $conv_begin_date2="";
                              }

                 $end_date2=trim($this->input->get_post("end_date2"));  //ถึงวันที่
               // echo br();
                     if(      $end_date2  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/",  $end_date2 );
                                        $conv_end_date2 =  $ex[2]."-".$ex[0]."-".$ex[1];
                                      // echo br();

                              }
 else {
     $conv_end_date2="";
 }



                          $count_date2=trim($this->input->get_post("count_date2"));   //กำหนด วัน
                   //  echo br();
                                         //----------------------------------------------------------------------------------

                       $house_number=trim($this->input->get_post("house_number"));  //บ้านเลขที่
                  //  echo br();


                          $road=trim($this->input->get_post("road_sick"));  //ถนน
                  //   echo br();

                         $district=trim($this->input->get_post("district_sick"));  //ตำบล
                  //  echo br();

                      $district2=trim($this->input->get_post("district2_sick"));  //อำเภอ
                 //   echo br();

                     $province=trim($this->input->get_post("province_sick"));  //จังหวัด
                  //  echo br();

                                         //-------------------------------------------------------------------------------------

                     $tel2=trim($this->input->get_post("tel2_sick")); //โทรศํพท์
                   // echo br();

                   $sign_name=trim($this->input->get_post("sign_name"));  //ขอแสดงความนับถือ  ชื่อ
                 //  echo br();

                    $sign_lastname=trim($this->input->get_post("sign_lastname"));   //ขอแสดงความนับถือ  นามสกุล
                //  echo br();

                    $sign_prename=trim($this->input->get_post("sign_prename"));  //คำนำหน้าลงท้าย ช่ื่อ  1=นาย  2=นาง  3=นางสาว
                //  echo br();

                    $firstname3=trim($this->input->get_post("firstname3"));  //  ลงชื่อ  ชื่อ
               //   echo br();

                                          //-------------------------------------------------------------------------------------------------------------

                     $lastname3=trim($this->input->get_post("lastname3"));  //  ลงชื่อ  นามสกุล
                 // echo br();


                                         //---------------- ป่วย------------------------
                   $sick1=trim($this->input->get_post("sick1"));  // ป่วย  ลามาแล้ว  วันทำการ
               //  echo br();

                   $sick2=trim($this->input->get_post("sick2"));  // ป่วย     ลาครั้งนี้   วันทำการ
                 //echo br();

                  $total_sick=trim($this->input->get_post("total_sick"));  //รวมเป็น  วันทำการ
                // echo br();
                                          //---------------- ป่วย------------------------

                                          //----------------กิจส่วนตัว--------------------
                  $sick_person1=trim($this->input->get_post("sick_person1"));  // ลามาแล้ว  วันทำการ
              //   echo br();

                                          //------------------------------------------------------------------------------------------------------------------


                    $sick_person2=trim($this->input->get_post("sick_person2")); //  ลาครั้งนี้   วันทำการ
                // echo br();

                  $total_sick_person=trim($this->input->get_post("total_sick_person"));  //รวมเป็น  วันทำการ
               //  echo br();
                                          //----------------กิจส่วนตัว--------------------


                                          //----------------- คลอดบุตร---------------------
                $confined1=trim($this->input->get_post("confined1"));  // ลามาแล้ว  วันทำการ
               //  echo br();

                     $confined2=trim($this->input->get_post("confined2"));  // ลามาแล้ว  วันทำการ
                 // echo br();

                   $total_confined=trim($this->input->get_post("total_confined"));  //รวมเป็น  วันทำการ
                 // echo br();

                                          //--------------------------------------------------------------------------------------------------------------------

                       $inspector_name=trim($this->input->get_post("inspector_name"));  //ชื่อ ผู้ตรวจสอบ
               //  echo br();

                     $inspector_lastname=trim($this->input->get_post("inspector_lastname"));   //นามสกุล ผู้ตรวจสอบ
                // echo br();


                      $inspector_position=trim($this->input->get_post("inspector_position"));  //  ตำแหน่ง   ผู้ตรวจสอบ
                 // echo br();


                     $date_inspector=trim($this->input->get_post("date_inspector"));  //  วัน เดือน ปี   ผู้ตรวจสอบ
                //  echo br();

                           if(       $date_inspector  != ""  )  //09/15/2017
                              {
                                       $ex=explode("/",   $date_inspector );
                                      $conv_date_inspector =  $ex[2]."-".$ex[0]."-".$ex[1];
                                      // echo br();

                              }
                              else
                              {
                                   $conv_date_inspector ="";
                              }


                                          //-------------ความเห็นของผู้บังคับบัญชาชั้นต้น (โปรดระบุ ข้อ ก และ ข้อ ข)
                                     $supervisor_sick=trim($this->input->get_post("supervisor_sick"));  // 1=เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน     2=ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน
                                 //  echo br();

                                          //--------------------------------------------------------------------------------------------------------------------

                                    $supervisor_agree=trim($this->input->get_post("supervisor_agree"));  //1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                                //   echo br();


                                       $first_name2=trim($this->input->get_post("first_name2"));  //ลงชื่อ  ความเห็นของผู้บังคับบัญชา
                                   // echo br();

                                       $last_name2=trim($this->input->get_post("last_name2"));   //ลงชื่อ  นามสกุล ผู้บังคับบัญชา
                                    //echo br();

                                         $postion2=trim($this->input->get_post("postion2"));  //ตำแหน่ง ผู้บังคับบัญชา
                                   //  echo br();

                                     /*
                                     echo       $commander_date=trim($this->input->get_post("commander_date"));  //วัน เดือน ปี   ความเห็นของผู้บังคับบัญชาชั้นต้น
                                     echo br();
                                       */
                                           //--------------------------------------------------------------------------------------------------------------------


                                      $manager_allow=trim($this->input->get_post("manager_allow"));   // คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                                     // echo  br();


                                       $first_name3=trim($this->input->get_post("first_name3"));   //ลงชื่อ  คำสั่งผู้บริหาร
                                     // echo  br();

                                          $last_name3=trim($this->input->get_post("last_name3"));  //ลงชื่อ นามสกุล
                                       //echo  br();

                                         $manager_position=trim($this->input->get_post("manager_position")); //ตำแหน่ง
                                      // echo  br();

                                        //    $date_manager=trim($this->input->get_post("date_manager"));  //วัน เดือน ปี คำสั่งผู้บริหาร
                                          // echo  br();


                                     //       $id_staff_sick=trim($this->input->get_post("id_staff_sick"));



                                             $data=array(
                                                 "type_person"=>$type_person,   //ประเภทของพนักงาน        2
                                                 "write"=> $write    , //เขึยนที่
                                                 //                                      3
                                                 "date_write1"=>$conv_date_write1,    //วันที่                   4


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

                                                 "begin_date1"=> $conv_begin_date1, //ตั้งแต่วันที่



                                                // "end_date1"=>$end_date1, //ถึงวันที่
                                                   "end_date1"=>$conv_end_date1, //ถึงวันที่


                                                 "count_date"=> $count_date,   //มีกำหนด วัน
                                                 "me_leave"=>$me_leave,  //1=ป่วย  2=กิจส่วนตัว  3=คลอดบุตร      //ข้าพเจ้าไ้ด้ลา

                                                  //     "cumulative"=>$cumulative, //วันลาสะสม   12

                                                  //  "begin_date2"=> $begin_date2,  //ตั้งแต่วันที่
                                                   "begin_date2"=> $conv_begin_date2,  //ตั้งแต่วันที่


                                                  //  "end_date2"=>$end_date2,   //ถึงวันที่
                                                      "end_date2"=>$conv_end_date2,   //ถึงวันที่


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


                                                  // "date_inspector"=>$date_inspector, //  วัน เดือน ปี   ผู้ตรวจสอบ
                                                   "date_inspector"=>$conv_date_inspector, //  วัน เดือน ปี   ผู้ตรวจสอบ



                                                    "supervisor_sick"=> $supervisor_sick, // 1=เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน     2=ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน
                                                    "supervisor_agree"=>$supervisor_agree, //1=เห็นด้วยควรอนุญาต    2=เห็นด้วยควรไม่อนุญาต
                                                    "first_name2"=> $first_name2,//ลงชื่อ  ความเห็นของผู้บังคับบัญชา
                                                    "last_name2"=>$last_name2,   //ลงชื่อ  นามสกุล ผู้บังคับบัญชา
                                                    "postion2"=>$postion2,   //ตำแหน่ง ผู้บังคับบัญชา
                                                  //  "commander_date"=>$commander_date,  //วัน เดือน ปี   ความเห็นของผู้บังคับบัญชาชั้นต้น
                                                    "manager_allow"=>$manager_allow,    // คำสั่งผู้บริหาร  1=อนุญาต  2=ไม่อนุญาต
                                                    "first_name3"=>$first_name3,  //ลงชื่อ  คำสั่งผู้บริหาร
                                                   "last_name3"=> $last_name3,  //ลงชื่อ นามสกุล
                                                    "manager_position"=> $manager_position,   //ตำแหน่ง
                                                  //  "date_manager"=>$date_manager,  //วัน เดือน ปี คำสั่งผู้บริหาร

                                                    "sick_disease"=>$sick_disease,        //   $sick_disease=trim($this->input->get_post("sick_disease"));  // ป่วย  1=จากการทำงาน  2=ไม่ใช่จากการทำงาน

                                                  // "id_staff"=>$id_staff_sick,
                                           );


                                            //  print_r($data);

                                             $tb=$this->tb_sick;
                                             $ck=$this->db->insert($tb,$data);
                                            // $ck=true;
                                             if( $ck )
                                             {
                                                  //echo 1;
                                                  echo json_encode(array("success"=>1));
                                             }
                                              else
                                              {
                                                  //echo 0;
                                                  echo json_encode(array("success"=>0));
                                              }




     }







}
