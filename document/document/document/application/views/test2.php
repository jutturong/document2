<!DOCTYPE html>
  <html>
    <head>
      
        <?=$this->load->view("import")?>
      
      
           <meta charset="UTF-8">
           <title><?=$title?></title>
      
   
        
          
            
            
            
           
 <!--  ลบข้อมูลในตาราง -->
 <script type="text/javascript">
    function dia_delete(id,page)
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
                                window.location.assign("<?=base_url()?>index.php/welcome/delete/" + id + "/" + page );
                                
                                
                          }
                          else
                          {
                               //  alert(id);
                               
                          }
                        
                    });
          });
    }
</script>
<!--  ลบข้อมูลในตาราง -->


    
           
           <script type="text/javascript">
              $(function(){
                  var send1='<?php echo $this->uri->segment(3);?>';
                  //alert( send1 );
                  //insert_success
                  if(  send1 == "insert_success"  )
                  {
                          
                                var $toastContent = $('<span>บันทึักข้อมูลสำเร็จ</span>');
                                Materialize.toast($toastContent, 5000,'rounded');
                                
                                $('#sub11').load("<?=base_url()?>index.php/welcome/subtable11");

                  }
                  
                  // redirect("welcome/homepage/insert_success_send11");  //หนังสือส่ง
                 else  if(  send1 == "insert_success_send11" ||   send1 =="insert_success_send21"    )
                  {
                          
                                var $toastContent = $('<span>บันทึักข้อมูลสำเร็จ</span>');
                                Materialize.toast($toastContent, 5000,'rounded');
                                
                                $('#sub11').load("<?=base_url()?>index.php/welcome/subtable11");
                                

                  }
                  //insert_success_receive21  //insert_success_send21
                      else  if(  send1 == "insert_success_receive21"   ||  send1 ==  "insert_success_send21"   )
                  {
                          
                                var $toastContent = $('<span>บันทึักข้อมูลสำเร็จ</span>');
                                Materialize.toast($toastContent, 5000,'rounded');
                                
                                $('#sub11').load("<?=base_url()?>index.php/welcome/table2/");
                                

                  } 
                  //insert_success_receive31
                  else  if(  send1 == "insert_success_receive31"   ||  send1 ==  "insert_success_send31"   )
                  {
                          
                                var $toastContent = $('<span>บันทึักข้อมูลสำเร็จ</span>');
                                Materialize.toast($toastContent, 5000,'rounded');
                                
                                $('#sub11').load("<?=base_url()?>index.php/welcome/table3/");
                                

                  } 
                  
              });    
           </script>
           
           
           
      <script type="text/javascript">
        
         //------------------------ มูลนิธิตะวันฉายฯ------------------------------------  
        function popup1()  //แสดงรายการรับหนังสือ  มูลนิธิตะวันฉายฯ
        {
             // Materialize.toast('I am a toast!', 4000);// 4000 is the duration of the toast
                // Materialize.toast('แสดงรายการทะเบียนหนังสือรับ', 3000, 'rounded')
                   
              //$(".button-collapse").sideNav();
             
                 //$('#sub11').load("sub11.html");
                 
                 //Materialize.toast('แสดงรายการทะเบียนหนังสือรับ', 3000,'rounded');
                 $('#sub11').load("<?=base_url()?>index.php/welcome/formsub11");
                 
       } 
       
       

       
       //
      
      

       function  fr_receive1()  //form  หนังสือส่ง
       {
               //index.php/welcome/formsend11
                 $('#sub11').load("<?=base_url()?>index.php/welcome/formsend11");
       }
       
       
       
       
       
       
       function  table11() //โหลด table 
       {
           // index.php/welcome/subtable11/
                  
                $('#sub11').load("<?=base_url()?>index.php/welcome/subtable11");
                
                //$('#modal_table11').modal('open');
       }
       
       
         function  table2() //โหลด table 
       {
           // index.php/welcome/subtable11/
                  
                $('#sub11').load("<?=base_url()?>index.php/welcome/table2");
                
                //$('#modal_table11').modal('open');
       }
       
         function  table3() //โหลด table 
       {
           // index.php/welcome/subtable11/
                  
                $('#sub11').load("<?=base_url()?>index.php/welcome/table3");
                
                //$('#modal_table11').modal('open');
       }
       
      //---------------------------มูลนิธิตะวันฉายฯ----1----------------------- 
       function  receive11()  //รับ
       {
               $('#sub11').load("<?=base_url()?>index.php/welcome/receive11");
       }
       
       function  send11()  //ส่ง
       {
               $('#sub11').load("<?=base_url()?>index.php/welcome/send11");
       }
       
       //------------------------ ศูนย์การดูแล----3--------------------------------  
       function  receive21()  //รับ
       {
               $('#sub11').load("<?=base_url()?>index.php/welcome/receive21");
       }
        function  send21()  //ส่ง
       {
               $('#sub11').load("<?=base_url()?>index.php/welcome/send21");
       }
  
  
  //------------------------ ศูนย์วิจัย----2-----------------
         function  receive31()  //รับ
       {
               $('#sub11').load("<?=base_url()?>index.php/welcome/receive31");
       }
        function  send31()  //ส่ง
       {
               $('#sub11').load("<?=base_url()?>index.php/welcome/send31");
       }
       
       
       
      
    //--- modal popup---  
       $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
               //  $('.modal').modal();
               
               
  $('.modal').modal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      starting_top: '4%', // Starting top style attribute
      ending_top: '10%', // Ending top style attribute
      
      /*
      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        alert("Ready");
        console.log(modal, trigger);
      },
      
      
      complete: function() { alert('Closed'); } // Callback for Modal close
      */
      
      
    }
  );
      
      
      
      
  });
           
           


//---- modal Login System----------
  $(document).ready(function(){
 
      //  $('#modal2').modal('open');
      
  });
          
  
  
  
  
  
      </script>
      
      
        <script type="text/javascript">

           //----- login เข้าสู่ระบบ
           $(document).ready(function(){
 
                   $('#btn_login').click(function(){
                               //alert('t');
                               $.ajax({
                                   type:'post',
                                   url:'<?=base_url()?>index.php/welcome/checklogin',
                                   data: $('#fr_login').serialize(),
                                   success:function(data)
                                      {
                                                //alert(data);
                                                
                                                
                                                /*
                                               if( data == '1' )
                                               {
                                                       //Materialize.toast('เข้าสู่ระบบ', 4000);
                                                        var  $toastContent = $('<span>ยินดีต้อนรับเข้าสู่ระบบธุรการ</span>');
                                                        Materialize.toast($toastContent,4000,'rounded',function(){
                                                                $('#modal2').modal('close');
                                                        });
                                               }
                                               else if( data == '0' )
                                               {
                                                      var $toastContent = $('<span>รหัสผ่านไม่ถูกต้อง</span>');
                                                     //  Materialize.toast($toastContent, 4000,'rounded') 
                                                        Materialize.toast($toastContent, 4000,'rounded', function()
                                                          {  
                                                                 // alert('กรุณาระบุรหัสผ่านใ้ห้ถูกต้อง')  
                                                                     Materialize.toast('ระบุรหัสผ่านให้ถูกต้องหรือติดต่้อผู้ดูแลระบบ', 4000) // 4000 is the duration of the toast
                                                            }  ); // 4000 is the duration of the toast
                                               }  
                                               */
                                                  
                                                  
                                               if( data == '0' )
                                               {
                                                      var $toastContent = $('<span>รหัสผ่านไม่ถูกต้อง</span>');
                                                     //  Materialize.toast($toastContent, 4000,'rounded') 
                                                        Materialize.toast($toastContent, 2000,'rounded', function()
                                                          {  
                                                                 // alert('กรุณาระบุรหัสผ่านใ้ห้ถูกต้อง')  
                                                                     Materialize.toast(' ติดต่อผู้ดูแลระบบ ', 4000 , 'rounded') // 4000 is the duration of the toast
                                                            }  ); // 4000 is the duration of the toast
                                               }  
                                               else{
                                                   
                                                         $.each(data,function(v,k){
                                                                            // alert(k.firstname);
                                                                            //Materialize.toast('เข้าสู่ระบบ', 4000);
                                                                       var  $toastContent = $('<span> '   +  k.firstname   +  '  ' +  k.lastname    +   '   :  เข้าสู่ระบบ </span>');
                                                                       Materialize.toast($toastContent,2000,'rounded',function(){
                                                                               $('#modal2').modal('close');
                                                                       });
                                                             
                                                         });
                                                         
                                               }
                                               
                                      }
                               });
                               
                       });

           });
           
           
           //------------- เพิ่มกิจกรรมทางวิชาการ-----------------
           function add_academic()
           {
                  //alert('t');
                  $('#sub11').load("<?=base_url()?>index.php/welcome/add_academic");
                 
           }
           
           
      </script>
      
      
    </head>



    <body>



      
      <!--  search 
       <nav>
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
      -->
   
      
      <!-- mobile menu -->
      <div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
        <li><a class="btn-floating red"  onclick="table11()" ><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>
        
      
   
<!--
            //1 มูลนิธิตะวันฉายฯ                       
             ///2	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
            //3 ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ
-->
      
      
      
      
  <!-- Dropdown Structure -->    
  <ul id="dropdown1" class="dropdown-content">
      
      <li><a href="#!"     onclick=" receive11() "    ><i class="material-icons left">contacts</i>ทะเบียนหนังสือรับ</a></li>
   <li><a href="#!"   onclick="report('<?=base_url()?>index.php/welcome/export_excel/1/1')" ><i class="material-icons left">perm_identity</i> ออกรายงาน</a></li>
    <li><a href="#!"><i class="material-icons left">search</i>ค้นหาหนังสือรับ</a></li>
    
  <li class="divider"></li>
  <li><a href="#!"   onclick=" send11() "  ><i class="material-icons left">contacts</i>ทะเบียนหนังสือส่ง</a></li>
   <li><a href="#!"  onclick="report('<?=base_url()?>index.php/welcome/export_excel/1/2')" > <i class="material-icons left">perm_identity</i> ออกรายงาน</a></li>
    <li><a href="#!"><i class="material-icons left">search</i>ค้นหาหนังสือส่ง</a></li>
   <li class="divider"></li>
   <li class="divider"></li>
   

</ul>
  
   <ul id="dropdown2" class="dropdown-content">
      
       <li><a href="#!" onclick=" receive21()"><i class="material-icons left">contacts</i>ทะเบียนหนังสือรับ</a></li>
   <li><a href="#!"   onclick="report('<?=base_url()?>index.php/welcome/export_excel/3/1')"  ><i class="material-icons left">perm_identity</i> ออกรายงาน</a></li>
    <li><a href="#!"><i class="material-icons left">search</i>ค้นหาหนังสือรับ</a></li>
    
  <li class="divider"></li>
  <li><a href="#!" onclick=" send21()  "><i class="material-icons left">contacts</i>ทะเบียนหนังสือส่ง</a></li>
   <li><a href="#!"   onclick="report('<?=base_url()?>index.php/welcome/export_excel/3/2')"    > <i class="material-icons left">perm_identity</i> ออกรายงาน</a></li>
    <li><a href="#!"><i class="material-icons left">search</i>ค้นหาหนังสือส่ง</a></li>
   <li class="divider"></li>
   <li class="divider"></li>
  
   </ul>
  
  
     <ul id="dropdown3" class="dropdown-content">
      
        <li><a href="#!"   onclick=" receive31()" ><i class="material-icons left">contacts</i>ทะเบียนหนังสือรับ</a></li>
   <li><a href="#!"  onclick="report('<?=base_url()?>index.php/welcome/export_excel/2/1')"    ><i class="material-icons left">perm_identity</i> ออกรายงาน</a></li>
    <li><a href="#!"><i class="material-icons left">search</i>ค้นหาหนังสือรับ</a></li>
    
  <li class="divider"></li>
  <li><a href="#!" onclick=" send31()  " ><i class="material-icons left">contacts</i>ทะเบียนหนังสือส่ง</a></li>
   <li><a href="#!"  onclick="report('<?=base_url()?>index.php/welcome/export_excel/2/2')"  > <i class="material-icons left">perm_identity</i> ออกรายงาน</a></li>
    <li><a href="#!"><i class="material-icons left">search</i>ค้นหาหนังสือส่ง</a></li>
   <li class="divider"></li>
   <li class="divider"></li>
  
   </ul>
  
  
    <ul id="dropdown4" class="dropdown-content">
      
        <!--
        <li><a href="#!"   onclick=" receive31()" ><i class="material-icons left">contacts</i>ทะเบียนหนังสือรับ</a></li>
   <li><a href="#!"><i class="material-icons left">perm_identity</i> ออกรายงาน</a></li>
    <li><a href="#!"><i class="material-icons left">search</i>ค้นหาหนังสือรับ</a></li>
    
  <li class="divider"></li>
  <li><a href="#!" onclick=" send31()  " ><i class="material-icons left">contacts</i>ทะเบียนหนังสือส่ง</a></li>
   <li><a href="#!"> <i class="material-icons left">perm_identity</i> ออกรายงาน</a></li>
    <li><a href="#!"><i class="material-icons left">search</i>ค้นหาหนังสือส่ง</a></li>
   <li class="divider"></li>
   <li class="divider"></li>
        -->
        
          <li><a href="#!"   onclick="add_academic()" ><i class="material-icons left">sort_by_alpha</i>เพิ่มกิจกรรม</a></li>
          <li class="divider"></li>
          <li><a href="#modal_show_academic"   onclick="" ><i class="material-icons left">work</i>แสดงกิจกรรม</a></li>
  
   </ul>
  
  
   
   
      <!--  mobile menu -->  
   <!--   
  <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Logo</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
    </div>
  </nav>
        -->  
        
        

 <nav>
    <div class="nav-wrapper">
      <!--  
      <a href="#!" class="brand-logo">Logo</a>
      -->
      
      <!--
      <ul class="right hide-on-med-and-down">
      -->
      <ul class="nav-wrapper">
      
        
             <li><a href="javascript: $('#modal2').modal('open');  "><i class="material-icons left">perm_identity</i>เข้าสู่ระบบ</a></li>
         
             <li><a href="<?=base_url()?>index.php/welcome/logout/"><i class="material-icons left">settings_power</i>ออกจากระบบ</a></li>
         
         
         
         
         <li>
             <a class="dropdown-button" href="#!"     data-activates="dropdown1"><i class="material-icons left">view_week</i> มูลนิธิตะวันฉาย  ฯ<i class="material-icons right">arrow_drop_down</i></a>
         </li>
          
         
         
             <li>
             <a class="dropdown-button" href="#!" data-activates="dropdown3"><i class="material-icons left">view_week</i>    ศูนย์วิจัย  ฯ    <i class="material-icons right">arrow_drop_down</i></a>
         </li>
         
         
         
         <li>
             <a class="dropdown-button" href="#!" data-activates="dropdown2"><i class="material-icons left">view_week</i> ศูนย์การดูแล  ฯ<i class="material-icons right">arrow_drop_down</i></a>
         </li>
         
      
         
          <li>
             <a class="dropdown-button" href="#modal1" data-activates=""><i class="material-icons right">vpn_key</i> แสดงผลการบันทึก</a>
         </li>
         
         
         
           <li>
             <a class="dropdown-button" href="#" data-activates="dropdown4"><i class="material-icons right">group_work</i> กิจกรรมทางวิชาการ </a>
         </li>
         
         
       
         
         
         <!--
        <li>
            <a href="sass.html"><i class="material-icons left">search</i>Link with Left Icon</a>
        </li>
        
        <li>
            <a href="badges.html"><i class="material-icons right">view_module</i>Link with Right Icon</a>
        </li>
         -->
        
      
      
      </ul>
    </div>
  </nav>
        



  <span id="sub11"></span>





  
  
  <!-- Modal Trigger -->


  <!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
   
      <!--
      <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
      
      
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
      -->
      
      
      <nav>
    <div class="nav-wrapper">
       <!-- 
      <a href="#" class="brand-logo right">Logo</a>
        -->
      <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li>
              
              <a href="javascript:void(0)"  onclick="table11()"       ><i class="material-icons left">perm_identity</i>มูลนิธิตะวันฉายฯ</a> 
          
          </li>
          
          <li>
            
              <a href="javascript:void(0)"    onclick="table3()"    ><i class="material-icons left">perm_identity</i>ศูนย์วิจัยผู้ป่วยปากแหว่งเพดานโหว่ฯ</a> 
        
        </li>
        
        
        <li>
            
            <a href="javascript:void(0)"   onclick="table2()"    ><i class="material-icons left">perm_identity</i>ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ</a> 
        </li>
        
      </ul>
        
        
        
        
    </div>
  </nav>
      
  </div>
          
        


  



  <!-- Modal Structure   Modal Login System -->
 <!-- <div id="modal2" class="modal modal-fixed-footer"> -->
  <div id="modal2" class="modal">
      
    <div class="modal-content">
      <!--<h4>เข้าสู่ระบบ</h4>-->
      <!-- <p>A bunch of text</p> -->
      
      
      <div class="row">
    <form class="col s12"   id="fr_login"  method="post"  enctype="multipart/form-data"  novalidate="novalidate" >
        
      <div class="row">
        <div class="input-field col s6">
            <input placeholder="Username" id="us"  name="us"  type="text" class="validate"  value="root">
          <label for="us">User name</label>
        </div>
          

        
        
      <div class="row">
        <div class="input-field col s6">
            <input id="ps"  name="ps"  type="password" class="validate"  value="root1234">
          <label for="ps">Password</label>
        </div>
      </div>
        

        
         <div class="row">
              <div class="input-field col s12">
                  <button class="btn waves-effect waves-light" type="button" name="action"  id="btn_login" >
                    <i class="material-icons md-30">lock_open</i>
           </button>
              </div>
         </div>   
        
  </div>
        
            </form>

          
          
    </div>
      
      <!--
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
      -->
      
    
      
  </div>
  </div>        
  

 
 <!--  แสดงกิจกรรมทางวิชาการ -->
 <script type="text/javascript">
     
    $(document).ready(function() 
    {
           $('#firstname_academic').material_select(); //ชื่อ-นามสกุล
           
           $('#activities').material_select(); //กิจกรรม
           
           
          $('#begin_date').pickadate({
               // selectMonths:true,
                   selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year
                    monday:'Mon',
                  // format:'dd-mm-yyyy',
                    format:'yyyy-mm-dd',
           });
           
           
           
           
    });
    
    

           
           
           
 </script>
 
 <!--      class="modal "   -->
 <div id="modal_show_academic"   class="modal "   >
     <div class="modal-content" >
         
             <div class="input-field col s6">
                                 <select id="firstname_academic" name="firstname_academic" >
                                          <option value="" disabled selected>Choose your option</option>
                                          <option value="1">ศ.บวรศิลป์  เชาว์ชื่น</option>
                                          <option value="2">สุธีรา-ประดับวงษ์</option>
                                          <option value="">นงลักษณ์  พรมขอนยาง</option>
                                          <option value="">ภาวิณี  รูปพรม</option>
                                          
                                          <option value="">ศุภชัย วงศ์ชื่น</option>
                                          <option value="">จัตุรงค์ เจริญฤทธิ์</option>

                                 </select>
                                           <label> ชื่อ-นามสกุล : </label>
             </div>
         
         
         
         <div class="input-field col s6">
                            <select id="activities" name="activities" >
                                     <option value="" disabled selected>Choose your option</option>
                                     <option value="1">วิทยากรในประเทศ</option>
                                     <option value="2">วิทยากรต่างประเทศ</option>
                                     <option value="3">ประชุมวิชาการในประเทศ</option>
                                     <option value="4">ประชุมวิชาการต่างประเทศ</option>
                                     <option value="5">ประชุมอื่นๆ</option>
                                     <option value="6">อบรม/ดูงานในประเทศ</option>
                                     <option value="7">อบรม/ดูงานต่างประเทศ</option>
                                     <option value="8">บริการวิชาการ</option>
                                     <option value="9">ศิลปวัฒนธรรม</option>
                            </select>
                                      <label> กิจกรรม : </label>
         </div>
         
         
       
         <div class="input-field col s6">
                             <i class="material-icons prefix">today</i>
                            <input type="date" id="begin_date"  name="begin_date"   class="datepicker"  />   
                            <!-- <label> ตั้งแต่วันที่ : </label> -->
           </div>
         
         
             <button class="waves-effect waves-light btn-large" type="submit"  id="btn_academic"  name="btn_academic" >
                  SEARCH
                                  <i class="material-icons md-30">assignment_ind</i>
              </button>
         
         
         
          
     </div>
     
     
     
     
     
     <div class="modal-footer">
         <a href="#" class="modal-action modal-close waves-effect  waves-green btn-flat"  >Close</a>
     </div>
 </div>
 <!--  แสดงกิจกรรมทางวิชาการ -->

 
 
 
 

 
   
  
 
 
 
    </body>
  </html>