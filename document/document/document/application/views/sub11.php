<script type="text/javascript">
    
    
      $(document).ready(function(){  
            Materialize.toast('แสดงรายการทะเบียนหนังสือรับ', 3000,'rounded');
    });
    
    
    
    /*
    $(function(){
        
        Materialize.toast('แสดงรายการทะเบียนหนังสือรับ', 3000,'rounded');
        
    });
    */
    

</script>



<script type="text/javascript">
    
    
$(function(){
    
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
    
});

  
/*
 $(function(){
     
     $('#btn_insert11').click(function(){

         $.ajax({
                                   type:'post',
                                    dataType: 'text',

                          //    mimeTypes:"multipart/form-data",
                          //   headers:{'Content-Type':'image/png','X-Requested-With':'XMLHttpRequest'},
                                   url:'<?=base_url()?>index.php/welcome/inserttable1',
                                   data: $('#fr_sub11').serialize(),
                                   success:function(data)
                                      {
                                                      alert(data);
                                          
                                      }
         
                    });
         
        
        
      
                    

 });
 
    });
*/
   


  
</script>

<script type="text/javascript">
    $(function(){
        
     /*
          $('#fr_sub11').submit(function(data){
              
              
                $.ajax({
                                   type:'post',
                                    dataType: 'text',
                          //    mimeTypes:"multipart/form-data",
                          //   headers:{'Content-Type':'image/png','X-Requested-With':'XMLHttpRequest'},
                                   url:'<?=base_url()?>index.php/welcome/inserttable1',
                                   data: $('#fr_sub11').serialize(),
                                   success:function(data)
                                      {
                                                      alert(data);
                                          
                                      }
         
                    });
              //  return  false;    
          });
      */
     
         
    
    /*
           $('#fr_sub11').on('submit',function(e){

                var actionurl = e.currentTarget.action;


                 $.ajax({
                url: actionurl,
                type: 'post',
                dataType: 'json',
                data: $('#fr_sub11').serialize(),
                success: function(data) {
                   // ... do something with the data...
                   alert(data);
                }
        });
    
    
  $.post( actionurl ,$('#fr_sub11').serialize() , function(data){ alert(data)  } );
    return false;

           });
         */
           
         
        
    });    
</script>


<!--  form record-->


<!--
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input disabled value="I am not editable" id="disabled" type="text" class="validate">
          <label for="disabled">Disabled</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          This is an inline input field:
          <div class="input-field inline">
            <input id="email" type="email" class="validate">
            <label for="email" data-error="wrong" data-success="right">Email</label>
          </div>
        </div>
      </div>
    </form>
  </div>
-->




  <div class="row">
      
   <!--   method="post" action="some_action" enctype="multipart/form-data" -->
     <!--  method="post" enctype="multipart/form-data"  --> 
     
    
     
      <!--   action="index.php/welcome/inserttable1"   -->
      <!--      -->
     <form class="col s12" id="fr_sub11"  action="<?=base_url()?>index.php/welcome/inserttable1"    accept-charset="UTF-8" method="post" enctype="multipart/form-data"  >
    
    
      <div class="row">
          
          
        <div class="input-field col s6">
            
          <i class="material-icons prefix">account_circle</i>
          <input id="registration_receive11" name="registration_receive11"  type="text"  placeholder="1.เลขทะเบียนรับ"  value="0001" />
          <label for="registration_receive11">1.เลขทะเบียนรับ</label>
          
          
        </div>
          
        <div class="input-field col s6">
            
        <!--  <i class="material-icons prefix">phone</i> -->
            <i class="material-icons prefix">account_circle</i>
            
            <input id="at_receive11" name="at_receive11"  type="text"  placeholder="2.ที่"  value="ศธ 0514.1.61.3/ว 3136" />
          
          <label for="at_receive11">2.ที่</label>
          
        </div>
          
            
          <div class="input-field col s6">
            
          <i class="material-icons prefix">today</i>
         <!-- <input id="icon_telephone" type="tel" class="validate"> -->
          
          
          <input type="date"  id="date1_receive11"  name="date1_receive11"  class="datepicker" />
        
          
                   
          <!-- <label for="date1">3.ลงวันที่</label>-->
                   
          
        </div>
          
          
          <div class="input-field col s6">
          <i class="material-icons prefix">toll</i>
          
          
          <input  id="from_receive11"  name="from_receive11"   type="text" class="validate"  value="รองอธิการบดีฝ่ายวิจัยและการถ่ายทอดเทคโนโลยี"   />
          
          <label for="from_receive11">4.จาก</label>
        </div>
          
          
          <div class="input-field col s6">
          <i class="material-icons prefix">toll</i>
          
          
          <input  id="to_receive11"  name="to_receive11"  type="text" class="validate"  value="ผู้อำนวยการมูลนิธิตะวันฉายฯ" />
          
          <label for="icon_telephone">5.ถึง</label>
        </div>
          
          
          <div class="input-field col s6">
          <i class="material-icons prefix">settings</i>
          
          
          <input  id="subject_receive11"  name="subject_receive11"  type="text" class="validate"  value="แจ้งผลการอนุมัติงบประมาณ ปีงบประมาณ 2560 และขอเชิญประชุม" />
          
          <label for="subject_receive11">6.เรื่อง</label>
        </div>
          
          
           <div class="input-field col s6">
          <i class="material-icons prefix">perm_identity</i>
          
          
          <input  id="practice_receive11" name="practice_receive11"  type="text" class="validate" value="ทราบ"  />
          
          <label for="practice_receive11">7.การปฏิบัติ</label>
        </div>
          
          
            <div class="input-field col s6">
          <i class="material-icons prefix">perm_identity</i>
          
          
          <input  id="note_receive11"  name="note_receive11"  type="text" class="validate"  value="ทราบและปฏฺิบัติตาม " >
          
          <label for="note_receive11">8.หมายเหตุ</label>
        </div>
          
          
          
          <div class="file-field input-field col s6">
                        <div class="btn">


                                  File 
                              <i class="material-icons "  >phonelink_setup</i>
                              <input  type='file'  id="file11"  name="file11"  multiple />
                              
                              
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text" placeholder="Upload one or more files">
                        </div>
              
              
    </div>
          
          
          
          
          
          <!--<div class="input-field col s6"> -->
          <!--  <div style="border-top: 300px;border-top-width:5px; border-right-width:5px; border-bottom-width:5px; border-left-width:5px;">-->
          <!-- <div style="padding:10px  0  10px  0"> </div>  -->

          <div class="button-collapse col s6">
                
            
              <button class="waves-effect waves-light btn-large" type="submit"  id="btn_insert11"  name="btn_insert11" >SAVE
    <i class="material-icons md-30">phonelink_ring</i>
  </button>
                
                
            </div>
          
          
      </div>
    
   
    </form>
    
    
   
    
  
  </div>
        