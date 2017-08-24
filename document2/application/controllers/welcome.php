<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

        var   $title="TAWANCHAI";
        var   $tb= "tb_main1_test";   // `tb_main1_test`     // `tb_main1`
       // var   $tb_vacation="tb_vacation";
        var   $tb_vacation="tb_vacation_test";
        
        var  $total_day_vacation=10; //จำนวนวันลาทั้งหมดในปีแต่ละปี


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
                     $check_rows=$query->num_rows();
                    //echo br();
                      if( $check_rows == 1 )
                      {
                          
                          
                          $sess_data=array(
                                   "sess_us"=>$us,
                                   "sess_ps"=>$ps,
                                   //"sess_per"=> $check_per,  
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




//http://10.87.196.170/document2/index.php/welcome/json_excellence
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


//http://10.87.196.170/document2/index.php/welcome/search_excellence
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



          if( $type_document  > 0  &&   strlen($date) >  0    &&   strlen($to)  > 0  )
         	{
		$this->db->order_by("id_main1","DESC");
                                    // $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"date"=>$conv_date));
                                      $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"to"=>$to,"date"=>$conv_date));


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
           elseif(  $type_document  > 0   &&   strlen($to)  >  0   &&   strlen($date) == 0      )
           {
               $this->db->order_by("id_main1","DESC");
                                    // $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"date"=>$conv_date));
                                      $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"to"=>$to));


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
            elseif(  $type_document  > 0   &&   strlen($to)  ==  0   &&   strlen($date) > 0      )
           {
               $this->db->order_by("id_main1","DESC");
                                     $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"date"=>$conv_date));
                                    //  $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"to"=>$to));


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

           elseif( $type_document  > 0  &&   $date ==  ""   &&  $to ==  ""     )
           {
               $this->db->order_by("id_main1","DESC");
                                     $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"date"=>$conv_date),20);
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





                                                  //http://10.87.196.170/document2/index.php/welcome/json_to
			public function json_to()//เอกสารถึงใคร
			{
         $tb="tb_main1";
								 //$this->db->like('to');
				$query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>1),10);
								 foreach($query->result() as $row)
								 {
										 $rows[]=$row;
								 }
									echo  json_encode($rows);

			}




                 //http://10.87.196.170/document2/index.php/welcome/export_data
                 public function export_data()//พิ่มพ์หนังสือ
                {
                      $this->user_model->login();  //for checklogin

                            header('Content-Type: text/html; charset=utf-8');


                             $type_record=trim($this->uri->segment(3));

                            $type_document=trim($this->uri->segment(4));
                            //echo br();

                            $to=urldecode($this->uri->segment(5));
                            //echo br();

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

                               $this->db->order_by("id_main1","DESC");

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
																						$data["q"]=$this->db->get_where($tb,array("type_record"=>$type_record,"type_document"=>$type_document,"to"=>$to,"date"=>$conv_date));
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
          								    /*
                      echo   $registration_receive21=trim($this->input->get_post('registration_receive21'));
											echo br();
										 //echo  't';
										 */

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
																				 // $ck=1;
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

                           //echo   $conv_date1_receive21;
                           //echo br();


                                 $from_send21=trim($this->input->get_post("from_send21")); //จาก       4
                           //echo br();

                                 $to_send21=trim($this->input->get_post("to_send21"));  //ถึง        5
                           //echo br();

                                  $subject_send21=trim($this->input->get_post("subject_send21"));  //เรื่อง       6
                           //echo br();

                                    $practice_send21=trim($this->input->get_post("practice_send21"));  //การปฏฺิบัติ       7
                         // echo br();

                                    $note_send21=trim($this->input->get_post("note_send21")); //หมายเหตุ      8
                         // echo br();

                           //$at_send21=trim($this->input->get_post("at_send21"));  //ที่       2




                                                                          // <input type="hidden"  id="type_record11"  name="type_record11"  value="1"  />
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
     $tb= $this->tb;
     $ck=$this->db->insert($tb,$data);
   //  $ck=1;
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
        public function json_research()
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

                 if( $to != ""  &&  $date != "" )
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

   
                 if( $to != ""  &&  $date != "" )
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
            
        //print_r($data);
     
     
     if( $id_main1_send_research == ""   )
     {      
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
      }
     
     

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
                   */
                
                  
            
                 $date_total_leave_cal=$leave + $leave_thistime; //รวมเป็นวันทำการ=ลามาแล้ว+ลาครั้งนี้
   
                 //$current_cal=$date_total_leave_cal;  //ในปีนี้ลามาแล้ว       ปรับปรุงเพิ่ม
                    $current_cal=$date_total_leave_cal;  //ในปีนี้ลามาแล้ว       ปรับปรุงเพิ่ม
              //  $current_cal=  $leave + leave_thistime
                 
              //   $keep_cal= $total - $leave_thistime;  //วันลาคงเหลือ keep =  วันลารวม - ลาครั้งนี้    keep =  total - leave_thistime
                //  $keep_cal= $this->total_day_vacation-  $date_total_leave_cal;  
                  
                  $rest_cal =  $rest - $wishes;
                  
                //  $total_cal=   $total    -    $wishes;
                  
                //  $total_cal=  $cumulative + $rest_cal;
                  
                  
                  
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
                                            //   "cumulative"=>$cumulative,
                    
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
                                         //      "cumulative"=>$cumulative,
                        
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
                
                
                
                                  print_r($data);
                                  echo br();
               
                    
                    
                                $tb=$this->tb_vacation;
                                $ck_insert=$this->db->insert($tb,$data); //ตรวจสอบการ insert
                                //$ck_insert=1;
                              //  $ck_insert=0;
                                if(  $ck_insert    )
                                   {
                                                   echo 1;  
                                   }
                                   else
                                   {
                                                  echo 0;
                                   }
                 
          
                                
                                   
                               

                
      } //end function    

      public function test()
      {
          echo "t";
      }
      
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
     //http://10.87.196.170/document2/index.php/welcome/json_sick
     public   function   json_sick()    
     {
                 $this->user_model->login();  //for checklogin
                 $tb="tb_sick";
                 $this->db->order_by("id_sick","DESC");
                        $q=$this->db->get($tb,10);
                        foreach($q->result() as $row)
                        {
                            $rows[]=$row;
                        }
                        echo json_encode($rows);
     }
     
     

     //http://10.87.196.170/document2/index.php/welcome/json_staff
     public function json_staff()
     {
         //$this->user_model->login();  //for checklogin
          $tb="tb_staff";
        //  $this->db->order_by("id_staff","DESC");
                        $q=$this->db->get($tb);
                        foreach($q->result() as $row)
                        {
                            $rows[]=$row;
                        }
                        echo json_encode($rows);
         
     }
     
     public function json_call_staff()
     {
          //$this->user_model->login();  //for checklogin
            $tb="tb_staff";
            $id_staff=trim($this->input->get_post("id_staff"));
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
         
          //$this->user_model->login();  //for checklogin
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
     
     
     
    
     
     
              
   

}
