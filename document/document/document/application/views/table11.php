<script type="text/javascript">

  $(".button-collapse").sideNav();
    
  $('ul.tabs').tabs(); 
  
  
 /*   
  $(document).ready(function(){
      
      
    $('ul.tabs').tabs();
    
    
  });
*/


/*
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
       // $('#modal_table11').modal('open');
         $('#modal_table11').modal('open');
  });
  */
  
</script>


<script type="text/javascript">
    
 //  $(function(){
        
        function report(page)
        {
              //alert(page);
              window.open(page);
        }
        
//    });
    
</script>






<div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a   class="active"   href="#test1">ทะเบียนหนังสือรับ</a></li>
        <li class="tab col s3"><a  href="#test2">ทะเบียนหนังสือส่ง</a></li>
        
        <!-- <li class="tab col s3 disabled">-->
       <!-- <li class="tab col s3 "><a href="#test3"> ออกรายงาน ( Report ) </a></li> -->
         <!--
        <li class="tab col s3"><a href="#test4">Test 4</a></li>
        -->
        
      </ul>
    </div>
    <div id="test1" class="col s12">
      
        
        <!--
        <a class="btn-floating btn-large waves-effect waves-light red" onclick="report('<?=base_url()?>report_pdf/docdb/dbreport.php?type_record=1&&type_document=1')">
                 <i class="large material-icons">view_module</i>
             
        </a>
        -->
        

             
             
        
        <a class="btn-floating btn-large waves-effect waves-light red" onclick="report('<?=base_url()?>index.php/welcome/export_excel/1/1')">
                 <i class="large material-icons">view_module</i>
             
        </a>
        
       

        
        
  <!--http://materializecss.com/collections.html -->
  <ul class="collection">
    <?php
           foreach($query->result() as $rows)
                 {
                      $id=$rows->id_main1;
                     // $id=$this->encrypt->encode($id);
    ?>
      
      <li class="collection-item avatar">
          
          
          <a href="#" data-activates="slide-out" class="button-collapse"> 
                    <i class="material-icons circle">swap_vertical_circle</i>
          </a>
                         
          <!--
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                      -->
       
      <span class="title">
          <?php echo  $rows->registration; ?>
      </span>
      <p> 
               <?php  echo $rows->at; ?>
               <br>
               <?php  echo $rows->date;  ?>
               <br>
                <?php  echo $rows->from;  ?>
                  <br>
                  <?php  echo $rows->to;  ?>
                   <br>
                    <?php  echo $rows->subject; ?>
                     <br>
                     <br>
                      
                     <!-- form dialog -->
                    
                     <a class="modal-trigger waves-effect waves-light btn large" href="#" onclick="javascript:  window.location.href='<?=base_url()?>index.php/welcome/update_main/<?=$rows->id_main1?>'  " >
                          <i class=" material-icons  ">perm_identity</i>
                         
                     </a>
                    <!-- form dialog -->

                     <br>
                     <br>
                     
                     <!-- ต้องการลบข้อมูล -->
                     <span class="title">
                         <a href="#" class="secondary-content"  onclick="dia_delete(<?=$id?>,1)"><i class="material-icons large ">power_settings_new</i></a> 
                     </span>    
                     <!-- ต้องการลบข้อมูล -->
                     
                     
                     
                     
                   
                     
     
              
                  <?php
              if( strlen($rows->filename) >  0  )
              {
     ?>
      <a href="<?=base_url()?>upload/<?php  echo  $rows->filename; ?>"  target="_blank">  
            <i class="material-icons large ">play_for_work</i>
            </a>
    
                     
 <!---  update form  แก้ไขข้อมูล เอกสาร รับ ส่ง   -->
 <ul id="slide-out" class="side-nav">
    <li><div class="userView">
            
            
      <div class="background">
          
        
          <img src="<?=base_url()?>images/office2.jpg"  width="250">
          
        
      </div>
        
       <!--     
      <a href="#!user"><img class="circle" src="<?=base_url()?>images/yuna.jpg"></a>
      -->
      <a href="#"><span class="white-text name"></span></a>
      <a href="#"><span class="white-text email"></span></a>
           
      
    </div>
    
    </li>
    
    <!--
    <li><a href="#"><i class="material-icons">cloud</i>First </a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    -->
    
    
    <form class="col s12" id="fr_send"  action="<?=base_url()?>index.php/welcome/update_main"    accept-charset="UTF-8" method="post" enctype="multipart/form-data"  >
    
    
      <div class="row">
          
          
        <div class="input-field col s12">
            
          <i class="material-icons prefix">account_circle</i>
          <input id="registration" name="registration"  type="text"  placeholder="1.เลขทะเบียนส่ง"  value="<?=$rows->registration?>" />
          
          <!--
          <label for="registration">1.เลขทะเบียนส่ง</label>
          -->
          
        </div>
          
        <div class="input-field col s12">
            
        <!--  <i class="material-icons prefix">phone</i> -->
            <i class="material-icons prefix">account_circle</i>
            
            <input id="at" name="at"  type="text"  placeholder="2.ที่"  value="<?=$rows->at?>" />
          
            <!--
          <label for="at">2.ที่</label>
            -->
          
        </div>
          
            
          <div class="input-field col s12">
            
          <i class="material-icons prefix">today</i>
         <!-- <input id="icon_telephone" type="tel" class="validate"> -->
          
          
          <input type="date"  id="date1"  name="date1"  class="datepicker"  value="<?=$rows->date?>"/>
        
          
                   
          <!-- <label for="date1">3.ลงวันที่</label>-->
                   
          
        </div>
          
          
          <div class="input-field col s12">
          <i class="material-icons prefix">toll</i>
          
          
          <input  id="from"  name="from"   type="text" class="validate"  value="<?=$rows->from?>"   />
          
          <!--
          <label for="from">4.จาก</label>
          -->
          
        </div>
          
          
          <div class="input-field col s12">
          <i class="material-icons prefix">toll</i>
          
          
          <input  id="to"  name="to"  type="text" class="validate"  value="<?=$rows->to?>" />
          
          <!--
          <label for="to">5.ถึง</label>
          -->
          
        </div>
          
          
          <div class="input-field col s12">
          <i class="material-icons prefix">settings</i>
          
          
          <input  id="subject"  name="subject"  type="text" class="validate"  value="<?=$rows->subject?>" />
          <!--
          <label for="subject">6.เรื่อง</label>
          -->
        </div>
          
          
           <div class="input-field col s12">
          <i class="material-icons prefix">perm_identity</i>
          
          
          <input  id="practice" name="practice"  type="text" class="validate"  value="<?=$rows->practice?>"  />
          <!--
          <label for="practice">7.การปฏิบัติ</label>
          -->
        </div>
          
          
            <div class="input-field col s12">
          <i class="material-icons prefix">perm_identity</i>
          
          
          <input  id="note"  name="note"  type="text" class="validate" value="<?=$rows->note?>"   >
          <!--
          <label for="note">8.หมายเหตุ</label>
          -->
        </div>
          
          
          <!--
          <div class="file-field input-field col s12">
                        <div class="btn">


                                  File 
                              <i class="material-icons "  >phonelink_setup</i>
                              <input  type='file'  id="file"  name="file"  multiple />
                              
                              
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text" placeholder="Upload one or more files">
                        </div>
              
              
          </div>
          -->
          
          
            <input type="hidden"  id="type_record"  name="type_record"  value="<?=$rows->type_record?>"  /> 
          
          
          <!--<div class="input-field col s6"> -->
          <!--  <div style="border-top: 300px;border-top-width:5px; border-right-width:5px; border-bottom-width:5px; border-left-width:5px;">-->
          <!-- <div style="padding:10px  0  10px  0"> </div>  -->

         
        <!--
         <div class="button-collapse col s12">
                
            
              <button class="waves-effect waves-light btn-large" type="submit"  id="btn_insert"  name="btn_insert" >
                  SAVE
                               <i class="material-icons md-30">phonelink_ring</i>
             </button>
           
                
         </div>
          -->
          
          
          
      </div>
    
   
    </form>
    
     <!---  update form  แก้ไขข้อมูล เอกสาร รับ ส่ง   -->
     
     
     
    <?php
              }
            ?>
              
              
              
      </p>
      
      
      

      
  
      

      
      
      
    </li>
    <?php
                    }
    ?>
  </ul>
  <!--http://materializecss.com/collections.html -->  
        
        
             
        
    
    </div>
 
    
    <div id="test2" class="col s12">
        
                
        <a class="btn-floating btn-large waves-effect waves-light red" onclick="report('<?=base_url()?>index.php/welcome/export_excel/1/2')">
                 <i class="large material-icons">view_module</i>
             
        </a>
        
        
      <!--http://materializecss.com/collections.html -->
  <ul class="collection">
    <?php
           foreach($query2->result() as $rows)
                 {
                         $id=$rows->id_main1;
    ?>
      
      <li class="collection-item avatar">
       <i class="material-icons circle">folder</i>
       
      <span class="title">
          <?php echo  $rows->registration; ?>
      </span>
      <p> 
               <?php  echo $rows->at; ?>
               <br>
               <?php  echo $rows->date;  ?>
               <br>
                <?php  echo $rows->from;  ?>
                  <br>
                  <?php  echo $rows->to;  ?>
                   <br>
                    <?php  echo $rows->subject; ?>
                     <br>
                     
                     
                     <span class="title">
                         <a href="#"    class="secondary-content"   onclick="dia_delete(<?=$id?>,'1')"  ><i class="material-icons">power_settings_new</i></a> 
                     </span>    
                     
     
              
                  <?php
              if( strlen($rows->filename) >  0  )
              {
     ?>
      <a href="<?=base_url()?>upload/<?php  echo  $rows->filename; ?>"  target="_blank">  
            <i class="material-icons">play_for_work</i>
            </a>
    <?php
              }
            ?>
              
              
              
      </p>
      
      
      

      
  
      

      
      
      
    </li>
    <?php
                    }
    ?>
  </ul>
  <!--http://materializecss.com/collections.html -->    
        
        
       
        
        
        
        
        
    
    </div>
    
   
    <!--
    <div id="test3" class="col s12">
    
         <a class="btn-floating btn-large waves-effect waves-light red"><i class="large material-icons">email</i></a>
    
    </div>
    -->
    
    
  </div>







 <!-- Modal Structure  table มูลนิธีตะวันฉาย -->
 <!--
  <div id="modal_table11" class="modal">
    <div class="modal-content">
        

       
       


      
            


      
      
      
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
  -->
  
  
      <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>    

  
  
  
  
  <!-- Modal Structure  table มูลนิธีตะวันฉาย -->
  
  
  <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!">2</a></li>
    <li class="waves-effect"><a href="#!">3</a></li>
    <li class="waves-effect"><a href="#!">4</a></li>
    <li class="waves-effect"><a href="#!">5</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
  
  
  
 
  
  
  
