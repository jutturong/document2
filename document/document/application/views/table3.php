<script type="text/javascript">

  $(document).ready(function(){
    $('ul.tabs').tabs();
    
    
  });


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
        
        
        <a class="btn-floating btn-large waves-effect waves-light red" onclick="report('<?=base_url()?>index.php/welcome/export_excel/2/1')">
            
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
                                 <a href="#!"  onclick="dia_delete(<?=$id?>,3)"  class="secondary-content"><i class="material-icons">power_settings_new</i></a> 
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
 
    
    <div id="test2" class="col s12">
        
                
        <a class="btn-floating btn-large waves-effect waves-light red" onclick="report('<?=base_url()?>index.php/welcome/export_excel/2/2')">
                 <i class="large material-icons">view_module</i>
             
        </a>
    
        
        <!--http://materializecss.com/collections.html -->
  <ul class="collection">
    <?php
           foreach($query->result() as $rows)
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
                                 <a href="#!"   onclick="dia_delete(<?=$id?>,3)"  class="secondary-content"><i class="material-icons">power_settings_new</i></a> 
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