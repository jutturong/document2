<?php $this->load->view("import")?>
  <?php    header('Content-Type: text/html; charset=UTF-8');  ?>


<script type="text/javascript">

   function update_academic(id)
           {
                  //alert('t');
                  //$('#sub11').load("<?=base_url()?>index.php/welcome/update_academic/" + id );
                    window.open("<?=base_url()?>index.php/welcome/update_academic/" + id  , ""  ,  "width=900;height=500" );
           }
           
           
function dia_delete2(id)
    {
          $(document).ready(function()
          {
                    //    $('.modal').modal();
                   //  $('#modal_delete').modal('open');
                 //   $('#modal_delete1').modal('open');
                  Materialize.toast('Delete function', 1000, 'rounded' ,function()
                    {
                          //alert(id);
                          var  r=confirm("คุณต้องการลบข้อมูลหรือไม่");
                          if(r==true){
                                //alert(id);
                                window.location.assign("<?=base_url()?>index.php/welcome/del_main_academic/" + id + "/");
                                
                                
                          }
                          else
                          {
                               //  alert(id);
                               
                          }
                        
                    });
          });
    }
    
    

</script>









<div class="row">
      <form class="col s12">
      <div class="row">
          
          

      
        <div class="input-field col s12">
            
            
            <!--
            <ul class="collapsible" data-collapsible="accordion">
     
       <?php
            foreach($date_q->result() as $row)
            {
                 $id_firstname_academic=$row->id_firstname_academic;
                 $firstname_academic=$row->firstname_academic;
                 $lastname_academic=$row->lastname_academic;
                 $title=$row->title;
                 $begin_date=$row->begin_date;
                 $end_date=$row->end_date;
                 $place=$row->place;
                 $detail=$row->detail;
                 $expenses=$row->expenses;
                 $note=$row->note;
                 $begin_time=$row->begin_time;
                 
                 ?>
                             <li>
                                        <div class="collapsible-header"> <span class="new badge"></span>  <i class="material-icons">email</i><?= $firstname_academic?><?=nbs(3)?><?=$lastname_academic?>  <?=nbs(2)?> สถานที่ : <?=$place?> <?=nbs(2)?>  เวลา :  <?=$begin_time?></div>
                                        <div class="collapsible-body">
                                            
                                            <p>
                                                [ <?= $begin_date?>  ] [  <?=$end_date?> ]  
                                                <br/>
                                                หัวข้อ : <?=$title?>  
                                                <br/>
                                            
                                                รายละเอียด : <?=$detail?>
                                                <br/>
                                                หมายเหตุ : <?=$note?>
                                                
                                            </p>
                                            
                                            
                                        </div>
                             </li>
                             
                             
                             
                             
                             
                 <?php
            }
       ?>
  
</ul>
      -->
            
            
           
                    <div class="col s12 m12">
                      <div class="card blue-grey darken-1">
                          
                           <?php
            foreach($date_q->result() as $row)
            {
                 $id_main_academic=$row->id_main_academic;
                 $id_firstname_academic=$row->id_firstname_academic;
                 $firstname_academic=$row->firstname_academic;
                 $lastname_academic=$row->lastname_academic;
                 $title=$row->title;
                 $begin_date=$row->begin_date;
                 $end_date=$row->end_date;
                 $place=$row->place;
                 $detail=$row->detail;
                 $expenses=$row->expenses;
                 $note=$row->note;
                 $begin_time=$row->begin_time;
                 
                 ?>
                             
                             <div class="card-content white-text">
                            <h4><?= $firstname_academic?><?=nbs(3)?><?=$lastname_academic?>  <?=nbs(2)?> สถานที่ : <?=$place?> <?=nbs(2)?>  เวลา :  <?=$begin_time?> </h4> 
                                  
                            
                            
                            <a href="#!"  onclick= "dia_delete2(<?=$id_main_academic?>)"  class="secondary-content">
                                      <i class="material-icons">power_settings_new</i>
                                  </a>
                            
                            <?=nbs(5)?>
                            
                            <a href="#!"  onclick="update_academic(<?=$id_main_academic?>)"  class="secondary-content">
                                     <i class="material-icons circle" >folder</i>
                            </a>
                          
                                           <p>
                                                [ <?= $begin_date?>  ] [  <?=$end_date?> ]  
                                                <br/>
                                                หัวข้อ : <?=$title?>  
                                                <br/>
                                            
                                                รายละเอียด : <?=$detail?>
                                                <br/>
                                                หมายเหตุ : <?=$note?>
                                                
                                                <br/>
                                                    
                                               
                                                 
                                            </p>
                          
                          

                        </div>
                             
                             
                             
                             
                 <?php
            }
       ?>
                          
                        
                          
                          
                          



                      </div>
                    </div>
            
            
 
            
            
  
                 <div class="button-collapse col s6">
                
            
                     <button class="waves-effect waves-light btn-large" type="button"  id="btn_insert11"  name="btn_insert11"  onclick="javascript:  $(function(){   window.location.href='<?=base_url()?>index.php/welcome/index/man_calendar'; });         "  >
                                       Back
                                      <i class="material-icons md-30">av_timer</i>
                     </button>
                      <button class="waves-effect waves-light btn-large" type="button"  id="btn_insert11"  name="btn_insert11"  onclick="javascript :  window.open('<?=base_url()?>index.php/welcome/detail_calendar/2017-02-22');  "   >
                                       Refresh
                                       <i class="material-icons md-30" >forward_5</i>
                     </button>
                
                
                 </div>
            
            
          
        </div>
          
          
          
           
          
          
          
      </div>
     
     
      
      
    </form>
  </div>
