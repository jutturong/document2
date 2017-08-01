<script type="text/javascript">

  $(document).ready(function(){
               $("#slide-out").sideNav();
               $("#slide-out12").sideNav();
  
    
                $('ul.tabs').tabs(); 
  
    });
  
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
        
        function reload1()
        {
               $('#sub11').load("<?=base_url()?>index.php/welcome/subtable11");
            //   $('#sub11').load("<?=base_url()?>index.php/welcome/" + tb );
               //  alert('t');
        }
        
//    });
    
</script>


<script type="text/javascript" >
    
        $(document).ready(function() 
        {
       
           
              $('#date_table').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 ,// Creates a dropdown of 15 years to control year
    format:'yyyy-mm-dd',
    
  });
  
  /*
     selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format:'yyyy-mm-dd'
   */
  
  
       });
       
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
        

             
             
        
       <!-- <a class="btn-floating btn-large waves-effect waves-light red" onclick="report('<?=base_url()?>index.php/welcome/export_excel/1/1')"> -->
   <!--
       <a class="btn-floating btn-large waves-effect waves-light red" onclick="report('<?=base_url()?>report_pdf/docdb/dbreport.php/?type_record=1&type_document=1')"> 
   --> 
   
   
   
             <a class="btn-floating btn-large waves-effect waves-light red" onclick="report('<?=base_url()?>index.php/welcome/export_data/1/1/')" > 
                         
                 
                 
           <!-- http://10.87.196.170/document/report_pdf/docdb/dbreport.php/?type_record=3&type_document=2 -->
                 <i class="large material-icons">view_module</i>
             
           </a>
        
       

        
        
        <a class="btn-floating btn-large waves-effect waves-light red" onclick=" reload1() ">
                 <i class="large material-icons">forward_30</i>
             
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
            เลขทะเบี่ยนรับ : <?php echo  $rows->registration; ?>
      </span>
      <p> 
            ที่ : <?php  echo $rows->at; ?>
               <br>
            ลงวันที่ : <?php  echo $rows->date;  ?>
               <br>
            จาก : <?php  echo $rows->from;  ?>
                  <br>
            ถึง : <?php  echo $rows->to;  ?>
                   <br>
            เรื่อง : <?php  echo $rows->subject; ?>
  
                      

                     <!-- ต้องการลบข้อมูล -->
                     <span class="title">
                         <a href="#" class="secondary-content"  onclick="dia_delete(<?=$id?>,1)"><i class="material-icons  ">power_settings_new</i></a> 
                     </span>    
                     <!-- ต้องการลบข้อมูล -->
                     
                     <br>
                   
                   
                     <!-- update  form  -->
                    
                     <a class="modal-trigger waves-effect waves-light btn large" href="#" onclick="javascript:  window.location.href='<?=base_url()?>index.php/welcome/update_main/<?=$rows->id_main1?>'  " >
                          <i class=" material-icons  ">phonelink_setup</i> Update Data
                         
                     </a>
                   <!-- update  form  -->
                   
                   
                   <!-- หนังสือเวียน -->
                   <?=nbs(2)?>
                   <a class="modal-trigger waves-effect waves-light btn large" onclick="javascript:  $('#modal_circular').modal('open');   ">
                       <i class="large material-icons">picture_in_picture</i> หนังสือเวียน
                   </a>
                   
                   <script type="text/javascript">
                      $(function(){
                            $('#at_circle').val('<?=$rows->at?>');
                            // $('#at_circle').val('test');
                            $('#id_main1').val('<?=$rows->id_main1?>');
                      });
                   </script>
                   <!-- หนังสือเวียน -->
                   
                   
                     
                   <br>
                   <br>

              <!-- download  file -->
                  <?php
              if( strlen($rows->filename) >  0  )
              {
                   ?>
      <a href="<?=base_url()?>upload/<?php  echo  $rows->filename; ?>"  target="_blank">  
            <i class="material-icons  ">system_update_alt</i>
            </a>
         <?php
               }
            ?>
                   
                   
                   
                   
                     
 <!---  update form  แก้ไขข้อมูล เอกสาร รับ ส่ง   -->
 <ul id="slide-out" class="side-nav">
    <li><div class="userView">     
      <div class="background">
          <img src="<?=base_url()?>images/office2.jpg"  width="250">
      </div>
      <a href="#"><span class="white-text name"></span></a>
      <a href="#"><span class="white-text email"></span></a>
    </div>
    </li>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="registration" name="registration"  type="text"  placeholder="1.เลขทะเบียนส่ง"  value="<?=$rows->registration?>" />
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="at" name="at"  type="text"  placeholder="2.ที่"  value="<?=$rows->at?>" />
        </div> 
          <div class="input-field col s12">  
          <i class="material-icons prefix">today</i>
          <input type="date"  id="date1"  name="date1"  class="datepicker"  value="<?=$rows->date?>"/>
        </div>
          <div class="input-field col s12">
          <i class="material-icons prefix">toll</i>
          <input  id="from"  name="from"   type="text" class="validate"  value="<?=$rows->from?>"   />
        </div>
          <div class="input-field col s12">
          <i class="material-icons prefix">toll</i>
          <input  id="to"  name="to"  type="text" class="validate"  value="<?=$rows->to?>" />
        </div>
          <div class="input-field col s12">
          <i class="material-icons prefix">settings</i>
          <input  id="subject"  name="subject"  type="text" class="validate"  value="<?=$rows->subject?>" />
        </div>
           <div class="input-field col s12">
          <i class="material-icons prefix">perm_identity</i>
          <input  id="practice" name="practice"  type="text" class="validate"  value="<?=$rows->practice?>"  />
        </div>
            <div class="input-field col s12">
          <i class="material-icons prefix">perm_identity</i>
          <input  id="note"  name="note"  type="text" class="validate" value="<?=$rows->note?>"   >
        </div>
            <input type="hidden"  id="type_record"  name="type_record"  value="<?=$rows->type_record?>"  /> 
      </div>
      
 </ul>
 <!---  update form  แก้ไขข้อมูล เอกสาร รับ ส่ง   -->
      

      
  
      

      
      
      
    </li>
    <?php
                    }
    ?>

        
  </ul>    
             
         <?php  $this->user_model->call_page_main11("tb_main1",$this->limit,base_url()."index.php/welcome/page_main1");  ?> 
    
    </div>
 
    
    <div id="test2" class="col s12">
        
                
        <!--<a class="btn-floating btn-large waves-effect waves-light red" onclick="report('<?=base_url()?>index.php/welcome/export_excel/1/2')">-->
        <!--
              <a class="btn-floating btn-large waves-effect waves-light red" onclick="report('<?=base_url()?>report_pdf/docdb/dbreport.php/?type_record=1&type_document=2&select_date='  +  $('#date_table').val()    )"> 
         -->

 <a class="btn-floating btn-large waves-effect waves-light red" onclick="report('<?=base_url()?>index.php/welcome/export_data/1/2/'  +  $('#date_table').val()    )">          
                       
                          
                          
                 <i class="large material-icons">view_module</i>
             
        </a>
                       <br/>
                       <br/>
                     <label >วันที่ส่งออก </label>
                  <input type="date"  id="date_table"  name="date_table"  class="datepicker">
                
                 
                  
        <a class="btn-floating btn-large waves-effect waves-light red" onclick=" reload1() ">
                 <i class="large material-icons">forward_30</i>
             
        </a>
        
        
        
      <!--http://materializecss.com/collections.html -->
  <ul class="collection">
    <?php
           foreach($query2->result() as $rows)
                 {
                         $id=$rows->id_main1;
    ?>
      
      <li class="collection-item avatar">
          
          <!--
       <i class="material-icons circle">folder</i>
          -->
          
           
     
          
          <a href="#" data-activates="slide-out12" class="button-collapse"> 
                    <i class="material-icons circle">swap_vertical_circle</i>
          </a>
          
          
          
       
      <span class="title">
         เลขทะเบี่ยนรับ : <?php echo  $rows->registration; ?>
      </span>
      <p> 
         ที่ : <?php  echo $rows->at; ?>
               <br>
         ลงวันที่ : <?php  echo $rows->date;  ?>
               <br>
         จาก : <?php  echo $rows->from;  ?>
                  <br>
         ถึง : <?php  echo $rows->to;  ?>
                   <br>
         เรื่อง : <?php  echo $rows->subject; ?>
                     <br>
                     
                     
                     <span class="title">
                         <a href="#"    class="secondary-content"   onclick="dia_delete(<?=$id?>,'1')"  ><i class="material-icons">power_settings_new</i></a> 
                     </span>    
                     
                     
              
                  
                     <!-- update  form  -->
                    
                     <a class="modal-trigger waves-effect waves-light btn large" href="#" onclick="javascript:  window.location.href='<?=base_url()?>index.php/welcome/update_main/<?=$rows->id_main1?>'  " >
                          <i class=" material-icons  ">picture_in_picture</i>Update Data
                         
                     </a>
                   <!-- update  form  -->
                   
                   
                    <!-- หนังสือเวียน -->
                   <?=nbs(2)?>
                   <a class="modal-trigger waves-effect waves-light btn large" onclick="javascript:  $('#modal_circular').modal('open');   ">
                       <i class="large material-icons">picture_in_picture</i> หนังสือเวียน
                   
                   </a>
                   
                   <script type="text/javascript">
                      $(function(){
                            $('#at_circle').val('<?=$rows->at?>');
                            $('#id_main1').val('<?=$rows->id_main1?>');
                      });
                   </script>
                   <!-- หนังสือเวียน -->
                   
                   
                   
                   
                   <br>
                   <br>
             
                     
              
                  <?php
              if( strlen($rows->filename) >  0  )
              {
     ?>
      <a href="<?=base_url()?>upload/<?php  echo  $rows->filename; ?>"  target="_blank">  
            <i class="material-icons">system_update_alt</i>
            </a>
    <?php
              }
            ?>
              
  
                                    
 <!---  update form  แก้ไขข้อมูล เอกสาร รับ ส่ง   -->
 <ul id="slide-out12" class="side-nav">
    <li><div class="userView">     
      <div class="background">
          <img src="<?=base_url()?>images/office2.jpg"  width="250">
      </div>
      <a href="#"><span class="white-text name"></span></a>
      <a href="#"><span class="white-text email"></span></a>
    </div>
    </li>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="registration" name="registration"  type="text"  placeholder="1.เลขทะเบียนส่ง"  value="<?=$rows->registration?>" />
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="at" name="at"  type="text"  placeholder="2.ที่"  value="<?=$rows->at?>" />
        </div> 
          <div class="input-field col s12">  
          <i class="material-icons prefix">today</i>
          <input type="date"  id="date1"  name="date1"  class="datepicker"  value="<?=$rows->date?>"/>
        </div>
          <div class="input-field col s12">
          <i class="material-icons prefix">toll</i>
          <input  id="from"  name="from"   type="text" class="validate"  value="<?=$rows->from?>"   />
        </div>
          <div class="input-field col s12">
          <i class="material-icons prefix">toll</i>
          <input  id="to"  name="to"  type="text" class="validate"  value="<?=$rows->to?>" />
        </div>
          <div class="input-field col s12">
          <i class="material-icons prefix">settings</i>
          <input  id="subject"  name="subject"  type="text" class="validate"  value="<?=$rows->subject?>" />
        </div>
           <div class="input-field col s12">
          <i class="material-icons prefix">perm_identity</i>
          <input  id="practice" name="practice"  type="text" class="validate"  value="<?=$rows->practice?>"  />
        </div>
            <div class="input-field col s12">
          <i class="material-icons prefix">perm_identity</i>
          <input  id="note"  name="note"  type="text" class="validate" value="<?=$rows->note?>"   >
        </div>
            <input type="hidden"  id="type_record"  name="type_record"  value="<?=$rows->type_record?>"  /> 
      </div>
      
 </ul>
 <!---  update form  แก้ไขข้อมูล เอกสาร รับ ส่ง   -->   
                   
              
      </p>
      
      
      

      
  
      

      
      
      
    </li>
    <?php
                    }
    ?>
  </ul>
  <!--http://materializecss.com/collections.html -->    
        
        
       
        
        
        
          <?php  $this->user_model->call_page_main12("tb_main1",$this->limit,base_url()."index.php/welcome/page_main1");  ?>
        
    
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
  
  <!--
  <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!">2</a></li>
    <li class="waves-effect"><a href="#!">3</a></li>
    <li class="waves-effect"><a href="#!">4</a></li>
    <li class="waves-effect"><a href="#!">5</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
  -->
  

  
   
 
  
  
  
