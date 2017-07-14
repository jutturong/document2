<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	 var   $title="TAWANCHAI";


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
		 $data["title"]=$this->title;
		 //$data["loadconent"]="receive_excellence";
		  $data["loadconent"]="";
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

	/*
2017-01-26
	public  function tb_main1($id,$doc)  // query ตารางหลัก
			 {

					 if( $id > 0 )
						 {
								//  echo "T";
									$tb="tb_main1";


									$this->db->order_by("id_main1","DESC");

									return  $this->db->get_where($tb,array("type_record"=>$id,"type_document"=>$doc),$this->limit);
						 }

			 }

        //หน้งสือรับ
			 $data["title"]=$this->title;
			// $this->load->view("sub11",$data);

			$data["query"]=$this->user_model->tb_main1("3","1");
                 function tb_main1($id,$doc)
				return  $this->db->get_where($tb,array("type_record"=>$id,"type_document"=>$doc),$this->limit);


				$this->db->order_by("id_main1","DESC");
			//   return  $this->db->get_where($tb,array("type_record"=>$id,"type_document"=>$doc));

     //หนังสือส่ง
			$tb="tb_main1";
			//$data["query2"]=$this->db->get_where($tb,array("type_document"=>2,"type_record"=>2));
			 $data["query2"]=$this->user_model->tb_main1("3","2");
			 $this->db->order_by("id_main1","DESC");


	*/
      //http://10.87.196.170/document2/index.php/welcome/search_excellence
	    public function search_excellence() //ค้นหาจาก วัน เดือน ปี  ศูนย์การดูแล ฯ  And Excellence
			{
               //$type_document=trim($this->input->get_post("type_document"));
						 $type_document=trim($this->uri->segment(3));
             //echo br();
             $date4=trim($this->uri->segment(4)); //ส่งมาแบบ เดือน  วัีน  ปี   07/04/20107  ให้แปลงกลับเป็น ปี เดือน วัน
             $date5=trim($this->uri->segment(5));
             $date6=trim($this->uri->segment(6));


						 //  07/04/2017  ให้แปลงเป็น  2017-01-26
						 if( $date4  !=  ""   &&  $date5 != ""  &&    $date6 != ""  )
						 {
							    //$ex=explode("/", $date);
							    $conv_date= $date6."-".$date4."-".$date5;
									//$conv_date="2017-02-02";
						 }

						 $tb="tb_main1";
						// type_document  1 เอกสารรับ   2 เอกสารส่ง
						// type_record=3   ศูนย์การดูแล ฯ  And Excellence

						if( $type_document > 0 && $conv_date == "" )
						{
						 $this->db->order_by("id_main1","DESC");
             $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document));
					   }
					   elseif( $type_document > 0 && $conv_date != ""  )
						 {
							 $this->db->order_by("id_main1","DESC");
							 $query=$this->db->get_where($tb,array("type_record"=>3,"type_document"=>$type_document,"date"=>$conv_date ));
						 }


						 foreach($query->result() as $row)
						 {
							   $rows[]=$row;
						 }
						  echo  json_encode($rows);




			}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
