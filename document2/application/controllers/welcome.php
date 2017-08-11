<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

        var   $title="TAWANCHAI";
        var   $tb= "tb_main1_test";   // `tb_main1_test`     // `tb_main1`


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






		  $data["title"]=$this->title;
		  //$this->load->view("home",$data);
		 $this->load->view("login",$data);
	}

  public function home()
	{

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
                               //echo br();
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
		    $tb="tb_academic";
       $query=$this->db->get($tb);
			 foreach($query->result() as $row)
			 {
				   $rows[]=$row;
			 }
			 echo  json_encode($rows);
	}




//http://192.168.2.112/document2/index.php/welcome/json_excellence
public function json_excellence()  //ศูนย์การดูแล AND excellence
{
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



public function search_excellence()
{
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


                 //http://10.87.196.170/document2/index.php/welcome/insert_tb_main1
	public function insert_tb_main1_3() //excellence  "type_record"=>3
	{
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

        public function  search_research()
        {

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

          public function  update_tb_main1_2()//excellence  "type_record"=>3
                {
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




                public function insert_tb_main1_2() //excellence  "type_record"=>3
	{
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
                
                
                
                //http://10.87.196.170/document2/index.php/welcome/insert_tb_main1_send_3/#
                public function insert_tb_main1_send_research()  //เอกสารส่ง    //excellence  "type_record"=>3
                {
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

 public  function  update_send_research()
 {
     
 
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


}
