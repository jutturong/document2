<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public function count_id($type_record,$type_document)
                {
                    $tb="tb_main1";
                 //   $type_document=1; //หนังสือรับ
                  //  $type_record=1; //มูลนิธิตะวันฉาย
                    $this->db->order_by("id_main1","DESC");
                    $q=$this->db->get_where($tb,array("type_document"=>$type_document,"type_record"=>$type_record),1);
                  //  return  $q->num_rows();
                    $row=$q->row();
                    $number=$q->num_rows();
                        if(  $number  == 0   )
                        {
                           $number_add = "0001";
                        }
                        else{

                             $registration=  $row->registration;
                            // $registration=1000;  //test

                             $number_add=  (int)$registration + 1;
                            // return $number_add;
                           if(     $registration  >= 0  &&   $registration < 9 )
                             {

                                   //$number_add = "0002";
                                 //0000
                                   $number_add="000".$number_add;
                             }
                             else  if(      $registration  >=  9  &&   $registration < 99  )
                             {
                                  //0000
                                   //$number_add = "0002";
                                   $number_add="00".$number_add;
                             }
                             else  if(      $registration  >=  99  &&   $registration < 999  )
                             {
                                  //0000
                                   //$number_add = "0002";
                                   $number_add="0".$number_add;
                             }
                            else
                             {
                                     $number_add= $number_add;
                             }
                        }
                                 return  $number_add;
                }




}
        ?>
