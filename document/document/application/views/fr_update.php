<!DOCTYPE html>
  <html>
      
      
    <head>
      
        <?=$this->load->view("import")?>
      
      
           <meta charset="UTF-8">
           <title><?=$title?></title>
           
           <script type="text/javascript">
               
           $(function()
           {
    
    
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    monday:'Mon',
  // format:'dd-mm-yyyy',
    format:'yyyy-mm-dd',
  });
    
    
             });

         </script>
           
    </head>
    
    
    
    <body>


 <?php  //form_open("welcome/update_tablemain")?>
    
    <form class="col s12" id="fr_send"  action="<?=base_url()?>index.php/welcome/update_tablemain"    accept-charset="UTF-8" method="post" enctype="multipart/form-data"  >
        
        
      <div class="row">
          
          
        <div class="input-field col s12">
            
            <input type="hidden"  id="id_main1"  name="id_main1"  value="<?=$id_main1?>"   />
            
          <i class="material-icons prefix">account_circle</i>
          <input id="registration" name="registration"  type="text"  placeholder="1.เลขทะเบียนส่ง"  value="<?=$registration?>" />
          <label for="registration">1.เลขทะเบียนส่ง</label>
          
          
        </div>
         
          
        <div class="input-field col s12">
            
        <!--  <i class="material-icons prefix">phone</i> -->
            <i class="material-icons prefix">account_circle</i>
            
            <input id="at" name="at"  type="text"  placeholder="2.ที่"  value="<?=$at?>" />
          
          <label for="at">2.ที่</label>
          
        </div>
          
            
          <div class="input-field col s12">
            
          <i class="material-icons prefix">today</i>
         <!-- <input id="icon_telephone" type="tel" class="validate"> -->
          
          
          <input type="date"  id="date1"  name="date1"  class="datepicker"  value="<?=$date?>"/>
        
          
                   
          <!-- <label for="date1">3.ลงวันที่</label>-->
                   
          
        </div>
          
          
          <div class="input-field col s12">
          <i class="material-icons prefix">toll</i>
          
          
          <input  id="from"  name="from"   type="text" class="validate"  value="<?=$from?>"   />
          
          <label for="from">4.จาก</label>
        </div>
          
          
          <div class="input-field col s12">
          <i class="material-icons prefix">toll</i>
          
          
          <input  id="to"  name="to"  type="text" class="validate"  value="<?=$to?>" />
          
          <label for="to">5.ถึง</label>
        </div>
          
          
          <div class="input-field col s12">
          <i class="material-icons prefix">settings</i>
          
          
          <input  id="subject"  name="subject"  type="text" class="validate"  value="<?=$subject?>" />
          
          <label for="subject">6.เรื่อง</label>
        </div>
          
          
           <div class="input-field col s12">
          <i class="material-icons prefix">perm_identity</i>
          
          
          <input  id="practice" name="practice"  type="text" class="validate"  value="<?=$practice?>"  />
          
          <label for="practice">7.การปฏิบัติ</label>
        </div>
          
          
            <div class="input-field col s12">
          <i class="material-icons prefix">perm_identity</i>
          
          
          <input  id="note"  name="note"  type="text" class="validate" value="<?=$note?>"   >
          
          <label for="note">8.หมายเหตุ</label>
        </div>
          
          
          
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
        
          
          
            <input type="hidden"  id="type_record"  name="type_record"  value=""  /> 
            
            
                <input type="hidden"  id="page"  name="page"  value="1"  /> 
          
          
          <!--<div class="input-field col s6"> -->
          <!--  <div style="border-top: 300px;border-top-width:5px; border-right-width:5px; border-bottom-width:5px; border-left-width:5px;">-->
          <!-- <div style="padding:10px  0  10px  0"> </div>  -->

         
        
         <div class="button-collapse col s12">
                
            
             <button class="waves-effect waves-light btn-large" type="submit"  onclick="" >
                  Update
                               <i class="material-icons md-30">phonelink_ring</i>
             </button>
           
                
         </div>
          
          
          
          
      </div>
    
   
    </form>
      
        
        
      <?php  //form_close()?>


    </body>