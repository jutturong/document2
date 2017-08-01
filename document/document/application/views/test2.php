<!DOCTYPE html>
  <html>
    <head>
      
        <?=$this->load->view("import")?>
      
      
           <meta charset="UTF-8">
           <title><?=$title?></title>
 
   
           <?php
                $cur_year = date("Y");  //วัน เดือน ปี  ในปัจจุบัน
           ?>
           
           
           
 <script type="text/javascript">
      $(function()
      {
          
            /*
            $( "#birds" ).on("keydown",function(event)
            { 
                
                    
                    if ( event.keyCode === $.ui.keyCode.TAB &&
                   $( this ).autocomplete( "instance" ).menu.active ) {
                    event.preventDefault();
                    
                    
             });
            */
    
    
        function log( message ) 
        {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
        }
    
    
    

            
            
             
            
      });
 </script>    
           
        
           
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
    
   
       //  ค้นหา  Modal  มูลนิธิตะวันฉายฯ 
      $(document).ready(function(){
             $('#modal_sr').modal();
             
             
                           
 
             ////http://10.87.196.170/document/index.php/welcome/auto 
                 var     url="<?=base_url()?>index.php/welcome/auto";
                 
               
                 
             
             
             
             
             $('#autocomplete11').autocomplete(
             {
                  
                        data: {
                                "Apple": null,
                                "Microsoft": null,
                                "Google": 'http://placehold.it/250x250'
                                 }
  
              });
         
            
            
      
      
          
              
              
    
            
            
            
                     /*
                      $('#autocomplete11').keyup(function()
                      {
                              //alert('t');
                              $.ajax({
                                  type:"POST",
                                  url:"<?=base_url()?>index.php/welcome/auto",
                                  dataType:"json",
                                  success:function(data)
                                     {
                                           $.each(data,function(k,v){
                                                   //alert(v.at);
                                                    $('#tags').append(v.at+'<br/>');
                                                 // response(v.at);
                                               
                                                   
                                           });
                                     }
                                  
                              });
                      });
                     */
                              
                     
                        
              
              
              
    
       });
      
      
      

   /*
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "<?=base_url()?>index.php/welcome/auto",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
*/
  

            

</script>
<!--  ลบข้อมูลในตาราง -->


           <script type="text/javascript">
              $(function(){
                  var send1='<?php echo $this->uri->segment(3);?>';
                  var ID='<?php echo $this->uri->segment(4);?>';
                  //alert( send1 );
                  //insert_success
                  if(  send1 == "insert_success"  )
                  {
                          
                                var $toastContent = $('<span>บันทึักข้อมูลสำเร็จ</span>');
                                Materialize.toast($toastContent, 5000,'rounded');
                                
                                $('#sub11').load("<?=base_url()?>index.php/welcome/subtable11");

                  }
                  
                  // redirect("welcome/homepage/insert_success_send11");  //หนังสือส่ง
                 else  if(  send1 == "insert_success_send11" ||   send1 =="insert_success_send21"  ||  send1 =='page1' )
                  {
                          
                                var $toastContent = $('<span>บันทึักข้อมูลสำเร็จ</span>');
                                Materialize.toast($toastContent, 5000,'rounded');
                                
                                $('#sub11').load("<?=base_url()?>index.php/welcome/subtable11");
 
                  }
                  
                  
                  //insert_success_receive21  //insert_success_send21
                      else  if(  send1 == "insert_success_receive21"   ||  send1 ==  "insert_success_send21"  ||  send1 =='page2'   )
                  {
                          
                                var $toastContent = $('<span>บันทึักข้อมูลสำเร็จ</span>');
                                Materialize.toast($toastContent, 5000,'rounded');
                                
                                $('#sub11').load("<?=base_url()?>index.php/welcome/table2/");
                                

                  } 
                  //insert_success_receive31
                  else  if(  send1 == "insert_success_receive31"   ||  send1 ==  "insert_success_send31"   ||  send1 =='page3'    )
                  {
                          
                                var $toastContent = $('<span>บันทึักข้อมูลสำเร็จ</span>');
                                Materialize.toast($toastContent, 5000,'rounded');
                                
                                $('#sub11').load("<?=base_url()?>index.php/welcome/table3/");
                                

                  } 
                  else  if(  send1 == "insert_main_academic"  )//หน้าหลักกิจกรรมทางวิชาการ
                  {
                               $('#sub11').load("<?=base_url()?>index.php/welcome/table_main_academic");
                  }
                  
                  else if( send1 == "man_calendar"  ) //หน้าปฏิทินหลัก
                  {
                        //http://10.87.196.170/document/index.php/welcome/calendar
                        $('#sub11').load("<?=base_url()?>index.php/welcome/calendar");
                  }
                  /*
                  else if (  send1 == ""  ) {
                      $('#sub11').load("");
                  }
*/
                  
                  // $('#sub11').load("<?=base_url()?>index.php/welcome/table_main_academic");
                  
                 
                
                 //ปรับปรุงการ update  ข้อมูลเป็นราย
                 //updateid
                   else  if( send1 == "updateid"    ) //หน้าปฏิทินหลัก
                  {
                          //http://10.87.196.170/document/index.php/welcome/calendar
                          //http://10.87.196.170/document/index.php/welcome/homepage/updateid/906
                         // alert(ID);
                         
                           // $('#sub11').load("<?=base_url()?>index.php/welcome/subtable11");
                            
                           $('#sub11').load("<?=base_url()?>index.php/welcome/loadformID/" + ID );
                  }
                  
                  
              });    
           </script>
       
           
           <script type="text/javascript">
               
   function  search_calendar1()  //ค้นหา
   {
             // alert('t');
               
              
            //http://localhost/document/index.php/welcome/search_main_calendar
              // alert(  $('#firstname_academic').val()   );
               // var   url= '<?=base_url()?>index.php/welcome/search_main_calendar/' +  $('#firstname_academic').val();
                //alert(url);
                
                 // alert(  '<?=base_url()?>index.php/welcome/search_main_calendar/' +  $('#firstname_academic').val()  );
                
                
                 $('#sub11').load("<?=base_url()?>index.php/welcome/search_main_calendar/"  +  $('#firstname_academic_sr').val()    );
              
            //   $('#sub11').load(url);
              
               //  return false;
   }
   
   

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
            function update_academic(id)
           {
                  //alert('t');
                  $('#sub11').load("<?=base_url()?>index.php/welcome/update_academic/" + id );
                 
           }
           
           
           
           function   main_academic() //ตารางหลักกิจกรรม
           {
                  //$('#sub11').load("<?=base_url()?>index.php/welcome/table_main_academic");
                 
                   $('#sub11').load("<?=base_url()?>index.php/welcome/calendar"  );
           }
           
           
            function   page_main_academic(page)
           {
                  $('#sub11').load("<?=base_url()?>index.php/welcome/page_table_main_academic/"  +  page  );
                  

           }
           
           
           
           function  page_main1(url) //แบ่งหน้า page
           {
                   //alert(url);
                  $('#sub11').load(url);
              
           }
           
           
           
      </script>
      
      
    </head>


      <!--  onload="javascript:   $('#modal2').modal('open');  "  -->
    <body  >


        

        
        
        
        

      
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
      <i class="large material-icons">recent_actors</i>
    </a>
    <ul>
        
        <!--
        <li><a href="#"  onclick=" window.location.assign('<?=base_url()?>index.php/welcome/export_data')  "  >test</a></li>
        -->
        
        <li><a class="btn-floating red"  onclick=" javascript: $('#modal2').modal('open');  " ><i class="material-icons">phonelink_lock</i></a>Login</li>
      <li><a class="btn-floating yellow darken-1"  onclick=" javascript: $('#modal1').modal('open');  "  ><i class="material-icons">print</i></a>View</li>
      <li><a class="btn-floating green"><i class="material-icons">offline_pin</i></a>Activity</li>
      
       
       
      <li><a class="btn-floating blue"  onclick="javascript:  window.location.assign('<?=base_url()?>index.php/welcome/logout')  "><i class="material-icons">power_settings_new</i></a>Logout</li>
    </ul>
          
          
  </div>
        
      
   
<!--
            //1 มูลนิธิตะวันฉายฯ                       
             ///2	ศูนย์วิจัยผู้่ป่วยปากแหว่งเพดานโหว่ฯ
            //3 ศูนย์การดูแลผู้ป่วยปากแหว่งเพดานโหว่ฯ
-->
      
      
      
      
  <!-- Dropdown Structure -->    
  <ul id="dropdown1" class="dropdown-content">
      
      <li><a href="#!"     onclick=" receive11() "    ><i class="tiny material-icons left">voicemail</i>หนังสือรับ</a></li>
      <li><a href="<?=base_url()?>report_pdf/docdb/dbreport.php/?type_record=1&type_document=1"  target="_blank"    ><i class="material-icons left">tab_unselected</i> ออกรายงาน</a></li>
  
    
  <li class="divider"></li>
  <li><a href="#!"   onclick=" send11() "  ><i class="tiny material-icons left">voicemail</i>หนังสือส่ง</a></li>
   <li>
       <a href="<?=base_url()?>report_pdf/docdb/dbreport.php/?type_record=1&type_document=1"  target="_blank"   >
          
           
           <i class="material-icons left">tab_unselected</i> ออกรายงาน</a>
   </li>
  
   <!--
    <li><a href="#modal_circular"><i class="material-icons left">phonelink_lock</i>ถึง(หนังสือเวียน)</a></li>
   -->
    
    <!--
   <li class="divider"></li>
   <li class="divider"></li>
    -->
   

</ul>
  
   <ul id="dropdown2" class="dropdown-content">
      
       <li><a href="#!" onclick=" receive21()"><i class="tiny material-icons left">voicemail</i>หนังสือรับ</a></li>
   <li><a href="<?=base_url()?>report_pdf/docdb/dbreport.php/?type_record=3&type_document=1" target="_blank"    ><i class="material-icons left">tab_unselected</i> ออกรายงาน</a></li>
    
    
  <li class="divider"></li>
  <li><a href="#!" onclick=" send21()  "><i class="tiny material-icons left">voicemail</i>หนังสือส่ง</a></li>
  <!--onclick="report('<?=base_url()?>index.php/welcome/export_excel/3/2')" -->
   <li><a href="<?=base_url()?>report_pdf/docdb/dbreport.php/?type_record=3&type_document=1"  target="_blank"     > <i class="tiny material-icons left">tab_unselected</i> ออกรายงาน</a></li>
   <!-- <li><a href="#modal_circular"><i class="material-icons left">phonelink_lock</i>ถึง(หนังสือเวียน)</a></li> -->
   <li class="divider"></li>
   <li class="divider"></li>
  
   </ul>
  
  
     <ul id="dropdown3" class="dropdown-content">
      
        <li><a href="#!"   onclick=" receive31()" ><i class="tiny material-icons left">voicemail</i>หนังสือรับ</a></li>
        <!--onclick="report('<?=base_url()?>index.php/welcome/export_excel/2/1')"  -->
   <li><a href="<?=base_url()?>report_pdf/docdb/dbreport.php/?type_record=2&type_document=1"    target="_blank"    ><i class="tiny material-icons left">tab_unselected</i> ออกรายงาน</a></li>
  
    
  <li class="divider"></li>
  <li><a href="#!" onclick=" send31()  " ><i class="tiny material-icons left">voicemail</i>หนังสือส่ง</a></li>
  <!-- onclick="report('<?=base_url()?>index.php/welcome/export_excel/2/2')" -->
   <li><a href="<?=base_url()?>report_pdf/docdb/dbreport.php/?type_record=2&type_document=2" target="_blank"  > <i class="tiny material-icons left">tab_unselected</i> ออกรายงาน</a></li>
  <!-- <li><a href="#modal_circular"><i class="material-icons left">phonelink_lock</i>ถึง(หนังสือเวียน)</a></li> -->
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
          
          <li><a href="#modal_show_academic"   ><i class="material-icons left">zoom_in</i>ค้นหากิจกรรม</a></li>
          
          
           <li><a href="#"   onclick="main_academic()" ><i class="material-icons left">perm_identity</i>แสดงกิจกรรมหลัก</a></li>
           
           
          
        
  
   </ul>
  
  
     <ul id="dropdown5" class="dropdown-content">
      
         <li><a href="#"  onclick="  $('#sub11').load('<?=base_url()?>index.php/welcome/form_vacation');  ">    <i class="tiny material-icons left">redeem</i>แบบใบลาพักผ่อนประจำปี </a> </a></li>

         <li><a href="#"  onclick=" $('#sub11').load('<?=base_url()?>index.php/welcome/form_sick');   "   >    <i class="tiny material-icons left">airplay</i>แบบใบลาป่วย/ลาคลอดบุตร/ลากิจส่วนตัว</a> </a></li>
                
  
         <li class="divider"></li>
         
         
         <li><a href="#modal_sum_vacation"     >    <i class="tiny material-icons left">today</i>สรุปการลาพักผ่อน/ลาป่วย ภายในหน่วยงาน</a> </a></li>
                
  
    
  <!--
  <li><a href="#" ><i class="tiny material-icons left">airplay</i>แบบใบลาป่วย</a></li>
   -->
  
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
      <a href="../../report_pdf/docdb/dbreport.php"></a>
      -->
      
      <!--
      <ul class="right hide-on-med-and-down">
      -->
      <ul class="nav-wrapper">
      
        
          <!--
             <li><a href="javascript: $('#modal2').modal('open');  "><i class="material-icons left">perm_identity</i>เข้าสู่ระบบ</a></li>
            --> 
             
         
          
         
              <!--<li><a href="#modal_circular"><i class="material-icons left">phonelink_lock</i>หนังสือเวียน</a></li>-->
         
               <li><a href="#"  onclick=" javascript: $('#modal2').modal('open');  "><i class="material-icons left">phonelink_lock</i>  </a></li>
               
               <li><a href="<?=base_url()?>index.php/welcome/logout/"><i class="material-icons left">settings_power</i></a></li>
               
               
         <li>
             <a class="dropdown-button" href="#modal_sr"    ><i class="material-icons left">zoom_in</i> Search </a>
         </li>
         
         
           <li >
             <a class="dropdown-button" href="#!" data-activates="dropdown2"><i class="material-icons left  red">perm_identity</i> ศูนย์การดูแล ฯ And  Excellence<i class="material-icons right">arrow_drop_down</i></a>
         </li>
         
         
           <li>
             <a class="dropdown-button" href="#!" data-activates="dropdown3"><i class="material-icons left green">perm_identity</i>    ศูนย์วิจัย  ฯ    <i class="material-icons right">arrow_drop_down</i></a>
         </li>
         
         
         
         <li>
             <a class="dropdown-button" href="#!"     data-activates="dropdown1"><i class="material-icons left blue">perm_identity</i> มูลนิธิตะวันฉาย  ฯ<i class="material-icons right">arrow_drop_down</i></a>
         </li>
          
         
         
           
         
         
         
       
         
      
         
          <li>
             <a class="dropdown-button" href="#modal1" data-activates=""><i class="material-icons left">print</i> แสดงผลการบันทึก</a>
         </li>
         
         
         
           <li>
             <a class="dropdown-button" href="#" data-activates="dropdown4"><i class="material-icons left">offline_pin</i> ตารางงานผู้บริหาร </a>
         </li>
         
         
         
           <li>
             <a class="dropdown-button" href="#"   data-activates="dropdown5"><i class="material-icons left">supervisor_account</i> ใบลาพักผ่อน/ใบลาป่วย <i class="material-icons right">arrow_drop_down</i></a>
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
        


<!-- load content -->
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
          
          
           <li  >
            
            <a href="javascript:void(0)"   onclick="table2()"    ><i class="material-icons left red">perm_identity</i>ศูนย์การดูแลฯ And Excellence</a> 
        </li>
        
            <li>
            
              <a href="javascript:void(0)"    onclick="table3()"    ><i class="material-icons left green">perm_identity</i>ศูนย์วิจัยผู้ป่วยปากแหว่งเพดานโหว่ฯ</a> 
        
        </li>
        
          <li >
              
              <a href="javascript:void(0)"  onclick="table11()"       ><i class="material-icons left blue">perm_identity</i>มูลนิธิตะวันฉายฯ</a> 
          
          </li>
          

      </ul>
        
        
        
        
    </div>
  </nav>
      
  </div>
          
        


  



  <!-- Modal Structure   Modal Login System -->
 <!-- <div id="modal2" class="modal modal-fixed-footer"> -->
  <div id="modal2" class="modal">
      
    <div class="modal-content">
      <h4>
               <i class="large material-icons">vpn_key</i>
                  ยินดีต้อนรับเข้าสู่ระบบโปรแกรมธุรการ</h4>
      <!--<p>โปรแกรมธุรการ</p>--> 
      
      
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
                  
                  <?=nbs(70)?>
                  <button class=" btn waves-effect waves-light" type="button" name="action"  id="btn_login" >
                    <i class="large material-icons md-30">lock_open</i>
                    
                    
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
  
 
 
 <!--  รายการค้นหาหลัก -->
 <script type="text/javascript">
     


                // alert('t');
                 
                 /*
                  $.ajax({
                      type:'POST',
                      data: $('#fr_sr_main1').serialize(),
                      url:'<?=base_url()?>index.php/welcome/search_tb_main1',
                      dataType:'json',
                      contentType:'application/json',
                      success:function(data)
                        {
                              alert(data);
                        }
                      
                   });
         */
            
            
            
            /*
            $.getJSON("<?=base_url()?>index.php/welcome/search_tb_main1",  { data: $('#fr_sr_main1').serialize()  }   ,function(data)
             {
                 alert(data);
             },"json");
               */
                  
                  
                  
         //$('#fr_sr_main1').submit(function(){  return false; });
        
       

  $(function()
     {
         
         
         /*
                $('#btn_sr_main1').click(function()
                {
                     var  url='<?=base_url()?>index.php/welcome/search_tb_main1';
                    
                    
                    
                       $('#sub11').load(url, $('#main_from').serialize() , function(data)
                            {   
                                     //  Materialize.toast(' แสดงผลการค้นหา ', 4000 , 'rounded') // 4000 is the duration of the toast
                                     //  $('#modal_show_academic').modal('close');
                                           alert(data);
                            } );



                });
           */
              
              
              $('#main_from').submit(function(event)
              { 
                       //alert('t'); 
                       
                       
                          //  var  url='<?=base_url()?>index.php/welcome/search_tb_main1';
                               var  url='<?=base_url()?>index.php/welcome/sarch_by_id';
                               $('#sub11').load(url,  $('#main_from').serialize()   ,function(data)
                                { 
                                      // alert(data);  
                                      Materialize.toast(' แสดงผลการค้นหา ', 4000 , 'rounded') // 4000 is the duration of the toast
                                      //$('#modal_sr').modal('close');
                                });
                                
                                
               
                       return false;
               });
       
     });
     
       
    
    
      $(document).ready(function() 
      {
                       $('select').material_select();
      });
     
     
 
 </script>
 
 
 <!--  แสดงกิจกรรมทางวิชาการ -->
 <script type="text/javascript">
     
    $(document).ready(function() 
    {
           $('#firstname_academic_sr').material_select(); //ชื่อ-นามสกุล
           
           
           
           $('#activities').material_select(); //กิจกรรม
           
           
          $('#begin_date').pickadate({
               // selectMonths:true,
                   selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year
                    monday:'Mon',
                  // format:'dd-mm-yyyy',
                    format:'yyyy-mm-dd',
           });
           
           
           
           
                $('#begin_date_main').pickadate({
               // selectMonths:true,
                   selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year
                    monday:'Mon',
                  // format:'dd-mm-yyyy',
                    format:'yyyy-mm-dd',
           });
           
           
           $('#end_date_main').pickadate({
               // selectMonths:true,
                   selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year
                    monday:'Mon',
                  // format:'dd-mm-yyyy',
                    format:'yyyy-mm-dd',
           });
           
           
           
            $('#end_date').pickadate({
               // selectMonths:true,
                   selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year
                    monday:'Mon',
                  // format:'dd-mm-yyyy',
                    format:'yyyy-mm-dd',
           });
           
           //-----form search--------
           
           /*
           $('#fr_sr_academic').submit(function(event){
                   alert('t');
                   
                   return false;
           });
           */
          
          
          
          $('#btn_academic').click(function(){
                   var  url="<?=base_url()?>index.php/welcome/search_main_academic";
                  $('#sub11').load(url, $('#fr_sr_academic').serialize() , function(data)
                  {   
                             Materialize.toast(' แสดงผลการค้นหา ', 4000 , 'rounded') // 4000 is the duration of the toast
                            // $('#modal_show_academic').modal('close');
                  } );
          });
           
           
           
           
           
    });
    
    
           
 </script>
 
 
 
 

 
 
 
 
 

 
 <!--      class="modal "   -->
 <div id="modal_show_academic"   class="modal "   >
     <!-- <form id="fr_sr_academic" action="<?=base_url()?>index.php/welcome/search_main_academic"> -->
         
     <div class="modal-content" >
         
         
         <div class="input-field col s6">
             <select id="firstname_academic_sr" name="firstname_academic_sr"  onchange="search_calendar1() " >
                                          
                                          <option value="" disabled selected>Choose your option</option>
                                             <?php   $this->user_model->select_academic();  ?>
                                               
                                 </select>
                                           <label> ชื่อ-นามสกุล : </label>
          </div>

         
         <!--
         <div class="input-field col s6">
                             <i class="material-icons prefix">today</i>
                            <input type="date" id="begin_date"  name="begin_date"   class="datepicker"  />   
                          
           </div>
         
          <div class="input-field col s6">
                             <i class="material-icons prefix">today</i>
                            <input type="date" id="end_date"  name="end_date"   class="datepicker"  />   
                            
           </div>
          -->
         
         
         
          <!--
         <button class="waves-effect waves-light btn-large" type="button"   onclick="search_calendar1()"   id="btn_academic"  name="btn_academic" >
                  SEARCH
         <i class="material-icons md-30">assignment_ind</i>
         </button>
         
         <button class="waves-effect waves-light btn-large" type="reset"  id="btn_academic"  name="btn_academic" >
                  CLEAR
                                  <i class="material-icons md-30">tab_unselected</i>
         </button>
          -->
         
         
          
     </div>
     
     
     
     
     
     <div class="modal-footer">
         <a href="#" class="modal-action modal-close waves-effect  waves-green btn-flat"  > ปิด (Close) </a>
     </div>
          
          
        
     
 </div>
 <!--  แสดงกิจกรรมทางวิชาการ -->

 
 
   <!--  Modal   การค้นหาหลัก -->
  <div id="modal_sr" class="modal">
       <!--  #http://localhost/document/index.php/welcome/search_tb_main1 -->
       <form    id="search_main"     >
          
    <div class="modal-content">
      
          
          
     <!-- <i class="material-icons  circle">perm_identity</i>-->
      
        <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">zoom_in</i></a>
            
          <?=nbs(5)?>
          Main Search
      
          
      <!--
      <p>A bunch of text</p>
      -->
      
      <div class="row">
          <div class="col s12">
               <div class="row">
                  
                        <div class="input-field col s6">
     <select  name="type_record"   id="type_record"   >
      <option value="" disabled selected>  :: เลือกข้อมูล ::  </option>
      <option value="1">มูลนิธิตะวันฉาย ฯ</option>
      <option value="2">ศูนย์วิจัย ฯ</option>
      <option value="3">ศูนย์การดูแล ฯ</option>
    </select>
    <label>เลือกข้อมูล</label>
  </div>
                  
               </div>
           </div>
      </div>
      
      
      
       <div class="row">
           
                    
           
           
           
                     <div class="col s4">
                      <div class="row">
                        <div class="input-field col s12">
                            
                            
                          <i class="material-icons prefix">today</i>
                          
                          <input type="date" class="datepicker" id="begin_date_main"  name="begin_date_main"  onchange="
                                 javascript:
                                       var  begin_date_main =  $('#begin_date_main').val();
                                       //alert(begin_date_main);
                                       var  end_date_main=$('#end_date_main').val();
                                       var  url='<?=base_url()?>index.php/welcome/search_by_date';
                                        //  alert('กำลังประมวลผล');
                                    $('#sub11').html('');
                                        $('#sub11').load(url, {  'begin_date_main': $('#begin_date_main').val()  , 'end_date_main':$('#end_date_main').val()  ,'type_record':$('#type_record').val() ,  },function(data)
                                        {
                                            
                                        }  );
                                 
                                 "  />
                                 
                                 
                        </div>
                      </div>
                    </div>
                     
                     
                      <div class="col s4">
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">today</i>
                          
                          <input type="date" class="datepicker" id="end_date_main"   name="end_date_main" onchange="
                                 javascript:
                                       var  begin_date_main =  $('#begin_date_main').val();
                                       //alert(begin_date_main);
                                       var  end_date_main=$('#end_date_main').val();
                                       var  url='<?=base_url()?>index.php/welcome/search_by_date';
                                       //   alert('กำลังประมวลผล');
                                    $('#sub11').html('');
                                      $('#sub11').load(url, {  'begin_date_main': $('#begin_date_main').val()  , 'end_date_main':$('#end_date_main').val()  ,'type_record':$('#type_record').val() ,  },function(data)
                                        {
                                            
                                        }  );
                                 
                                 "   />
                                 
                                 
                        </div>
                      </div>
                     
                          
                          
                    </div>
           
           
            <div class="col s4">
                      <div class="row">
                        <div class="input-field col s12">
                           <a class="waves-effect waves-light btn-large"  onclick=" 
                           javascript:
                                   var  url='<?=base_url()?>index.php/welcome/search_by_date';
                                 //  alert(url);
                                  //  alert('กำลังประมวลผล');
                                    $('#sub11').html('');
                                    $('#sub11').load(url, {  'begin_date_main': $('#begin_date_main').val()  , 'end_date_main':$('#end_date_main').val()  ,'type_record':$('#type_record').val() ,  },function(data)
                                        {
                                            
                                        }  );
                                        
                             
                             "    ><i class="material-icons left">zoom_in</i>Search</a>  
                                 
                                 
                        </div>
                      </div>
                     
                          
                          
                    </div>
           
    
                  
       
                     
    
                         <div class="col s5">
                      <div class="row">
                     
                              <div class="ui-widget">
                                  
                                  <!--
                                  <input  type="text"  readonly="readonly"  name="id_main1"  id="id_main1"  />
                                  -->
                                   
  <label for="to">ถึง : </label>
  
  
  <input id="to"  onkeypress=" ">

  
</div>
                          

 

                     
           </div>
                             
                             

                             
                             
                    </div>
           
           
           
           
           
           
           
           <div class="col s4">
                      <div class="row">
                        <div class="input-field col s12">
                           <a class="waves-effect waves-light btn-large"  onclick=" 
                        javascript:
      $('#sub11').html('');
      var   type_record=$('#type_record').val();
 
               if(   type_record  >  0 )
               {

                              $('#sub11').load('<?=base_url()?>index.php/welcome/sarch_by_to' ,    {  'to':$('#from').val(), 'type_record' : $('#type_record').val() }      ,  function(data)
                             {  
                                 //alert(data); 
                             }  );
                             
                             
               }          
                                        
                             
                             "    ><i class="material-icons left">zoom_in</i>Search</a>  
                                 
                                 
                        </div>
                      </div>
                     
                          
                          
                    </div>   
           
           
           
           
                     
                     
                     
         
            
             
             


           
     </div>
      
      
            <div class="row">
                
                
          <div class="col s5">
               <div class="row">
                  
          <label for="subject">เรื่อง : </label>
  
  
  <input id="subject"  onkeypress=" ">
                  
               </div>
           </div>
                
               <div class="col s5">
               <div class="row">
                  
           <a class="waves-effect waves-light btn-large"  onclick=" 
            
              javascript:
      $('#sub11').html('');
      var   type_record=$('#type_record').val();
        if(   type_record  >  0 )
               {
                     $('#sub11').load('<?=base_url()?>index.php/welcome/search_by_search' ,    {  'subject':$('#subject').val(), 'type_record' : $('#type_record').val() , 'fieldname':'subject'  }      ,  function(data)
                             {  
                                  //alert(data); 
                             }  );
                   
               }
      
                                        
                             
                             "    ><i class="material-icons left">zoom_in</i>Search</a>  
                                 
                  
               </div>
           </div>   

      </div>
      
      
     
            <div class="row">
                
                
          <div class="col s5">
               <div class="row">
                  
          <label for="from">จาก : </label>
  
  
  <input id="from"  onkeypress=" ">
                  
               </div>
           </div>
                
               <div class="col s5">
               <div class="row">
                  
           <a class="waves-effect waves-light btn-large"  onclick=" 
            
              javascript:
      $('#sub11').html('');
      var   type_record=$('#type_record').val();
        if(   type_record  >  0 )
               {
                     $('#sub11').load('<?=base_url()?>index.php/welcome/search_by_search' ,    {  'subject':$('#from').val(), 'type_record' : $('#type_record').val() , 'fieldname':'from'  }      ,  function(data)
                             {  
                                  //alert(data); 
                             }  );
                   
               }
      
                                        
                             
                             "    ><i class="material-icons left">zoom_in</i>Search</a>  
                                 
                  
               </div>
           </div>   

      </div> 
      
      
      <div class="row">
                
                
          <div class="col s5">
               <div class="row">
                  
          <label for="at">ที่ : </label>
  
  
  <input id="at"  onkeypress=" ">
                  
               </div>
           </div>
                
               <div class="col s5">
               <div class="row">
                  
           <a class="waves-effect waves-light btn-large"  onclick=" 
            
              javascript:
      $('#sub11').html('');
      var   type_record=$('#type_record').val();
        if(   type_record  >  0 )
               {
                     $('#sub11').load('<?=base_url()?>index.php/welcome/search_by_search' ,    {  'subject':$('#at').val(), 'type_record' : $('#type_record').val() , 'fieldname':'at'  }      ,  function(data)
                             {  
                                  //alert(data); 
                             }  );
                   
               }
      
                                        
                             
                             "    ><i class="material-icons left">zoom_in</i>Search</a>  
                                 
                  
               </div>
           </div>   

      </div> 
      
      
      
      
      
    </div>
      

    <div class="modal-footer">
        
     
        <!--
        <a class="waves-effect waves-light btn-large"  onclick="javascript:  $(function(){ $('#modal_sr').modal('close');  } );  "  ><i class="material-icons left">mic_off</i>Close</a>
        -->
        
        
        <!--
        <a href="#!"    class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        -->
        
        <!--
        <a class="waves-effect waves-light btn-large"   onclick="action_main1()"  ><i class="material-icons left">person_pin</i>Search</a>
        -->
        
        <!--
        <button class="btn waves-effect waves-light btn-large" type="submit" name="action"   id="btn_sr_main1"   >Search
                     <i class="material-icons right">person_pin</i>
       </button>
        -->
        
        
        <!--
        <a class="waves-effect waves-light btn-large"  onclick=" 
              javascript: 
                  //  $('#birds').val('');   $('#log').val('');  
              $('#sub11').load('<?=base_url()?>index.php/welcome/sarch_by_to' ,    {  'to':$('#to').val(), 'type_record' : $('#type_record').val() }      ,  function(data)
                             {  
                                 //alert(data); 
                             }  );
                             
                             "    ><i class="material-icons left">mic_off</i>Search</a>  
                             
         -->                    
       
       <a class="waves-effect waves-light btn-large"  onclick="javascript:  $(function(){ $('#modal_sr').modal('close');  } );  "  ><i class="material-icons left">mic_off</i>Close</a>
       
      
     
  
    
    </div>
      
      
      </form> 
      
  </div>
 <!-- ค้นหา  Modal  มูลนิธิตะวันฉายฯ า -->

 
   
 
 
  <!-- dialog หนังสือเวียน -->
  
  <div id="modal_circular" class="modal">
      <!--   <?=base_url()?>report_pdf/docdb/dbreport.php/?type_record=2&type_document=2  -->
      <!--  action="<?=base_url()?>report_pdf/docdb/queryheader.php"  -->
      
      <!--  http://10.87.196.170/document/report_pdf/docdb/queryheader.php   -->
      <!--  report_pdf/docdb/report_circle.php  -->
      <!--  report_pdf/docdb/queryheader.php  -->
      <form  id="fr_header_report" class="col s12"  action="<?=base_url()?>report_pdf/docdb/report_circle.php"   method="post"  enctype="multipart/form-data"  novalidate="novalidate"    >   
    <div class="modal-content">
        

      
       
        <div class="input-field col s6">
          <i class="material-icons prefix">picture_in_picture</i>
          <input    id="at_circle" name="at_circle"  class="validate">
          <!--<label for="icon_prefix">First Name</label>-->
          
          <input type="hidden"  id="id_main1"  name="id_main1"  />
          
        </div>
        

        <!--  1  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name1" name="head_name1">
                <option value="" disabled selected>Choose your option</option>
                 <?=$this->user_model->select_header()?>   
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory1"  name="factory1"  >
                <option value="" disabled selected>Choose your option</option>
                <?=$this->user_model->select_factory()?>   
        </select>
        </div>
      </div>
         <!--  1  -->
         
         <!--  2  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name2" name="head_name2">
                <option value="" disabled selected>Choose your option</option>
                
                 <?=$this->user_model->select_header()?>   
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory2"  name="factory2"  >
                <option value="" disabled selected>Choose your option</option>
                
              
                 <?=$this->user_model->select_factory()?>   
        </select>
        </div>
      </div>
         <!--  2  -->
        
             <!--  3  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name3" name="head_name3">
                <option value="" disabled selected>Choose your option</option>
                
               
                  <?=$this->user_model->select_header()?>   
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory3"  name="factory3"  >
                <option value="" disabled selected>Choose your option</option>
                
               <?=$this->user_model->select_factory()?>  
                
                
        </select>
        </div>
      </div>
         <!--  3  -->         
         
         
          <!--  4  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name4" name="head_name4">
                <option value="" disabled selected>Choose your option</option>
                
                
                    <?=$this->user_model->select_header()?>   
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory4"  name="factory4"  >
                <option value="" disabled selected>Choose your option</option>
                
             <?=$this->user_model->select_factory()?>  
                
                
        </select>
        </div>
      </div>
         <!--  4  -->   
         
         
           <!--  5  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name5" name="head_name5">
                <option value="" disabled selected>Choose your option</option>
                
                 <?=$this->user_model->select_header()?> 
             
                
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory5"  name="factory5"  >
                <option value="" disabled selected>Choose your option</option>
                
                   <?=$this->user_model->select_factory()?>   
               
                
                
        </select>
        </div>
      </div>
         <!--  5  --> 
         
        
          <!--  6  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name6" name="head_name6">
                <option value="" disabled selected>Choose your option</option>
                
                
                
                 <?=$this->user_model->select_header()?>   
                
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory6"  name="factory6"  >
                <option value="" disabled selected>Choose your option</option>
                
                <?=$this->user_model->select_factory()?>   
               
                
                
                
        </select>
        </div>
      </div>
         <!--  6  --> 
         
         
         <!--  7  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name7" name="head_name7">
                <option value="" disabled selected>Choose your option</option>
                
                
                
                 <?=$this->user_model->select_header()?>   
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory7"  name="factory7"  >
                <option value="" disabled selected>Choose your option</option>
                 <?=$this->user_model->select_factory()?>  
               
                
                
        </select>
        </div>
      </div>
         <!--  7  -->
        
         
           <!--  8  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name8" name="head_name8">
                <option value="" disabled selected>Choose your option</option>
                
                
                
                 <?=$this->user_model->select_header()?>
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory8"  name="factory8"  >
                <option value="" disabled selected>Choose your option</option>
                
                <?=$this->user_model->select_factory()?>   
                  
                
                
        </select>
        </div>
      </div>
         <!--  8  -->
         
         
          <!--  9  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name9" name="head_name9">
                <option value="" disabled selected>Choose your option</option>
                
                 
                  <?=$this->user_model->select_header()?>   
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory9"  name="factory9"  >
                <option value="" disabled selected>Choose your option</option>
                <?=$this->user_model->select_factory()?>  
                
              
                
                
        </select>
        </div>
      </div>
         <!--  9  -->
              
        
          <!--  10  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name10" name="head_name10">
                <option value="" disabled selected>Choose your option</option>
                
                
                
                   <?=$this->user_model->select_header()?>
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory10"  name="factory10"  >
                <option value="" disabled selected>Choose your option</option>
                 <?=$this->user_model->select_factory()?>  
                
             
                
                
                
        </select>
        </div>
      </div>
         <!--  10  -->
         
                   <!--  11  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name11" name="head_name11">
                <option value="" disabled selected>Choose your option</option>
                
                
                  <?=$this->user_model->select_header()?>   
                
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory11"  name="factory11"  >
                <option value="" disabled selected>Choose your option</option>
                <?=$this->user_model->select_factory()?> 
                
              
                
                
                
        </select>
        </div>
      </div>
         <!--  11  -->
         
         
     <!--  12  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name12" name="head_name12">
                <option value="" disabled selected>Choose your option</option>
                
                
                
                <?=$this->user_model->select_header()?>
                
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory12"  name="factory12"  >
                <option value="" disabled selected>Choose your option</option>
                <?=$this->user_model->select_factory()?>   
                
                
                
                
                
        </select>
        </div>
      </div>
         <!--  12  -->
         
           <!--  13  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name13" name="head_name13">
                <option value="" disabled selected>Choose your option</option>
                
               
                <?=$this->user_model->select_header()?>   
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory13"  name="factory13"  >
                <option value="" disabled selected>Choose your option</option>
                 <?=$this->user_model->select_factory()?>   
                
                
                
                
        </select>
        </div>
      </div>
         <!--  13  -->
         
          <!--  14  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name14" name="head_name14">
                <option value="" disabled selected>Choose your option</option>
                
               
                 <?=$this->user_model->select_header()?>   
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory14"  name="factory14"  >
                <option value="" disabled selected>Choose your option</option>
                 <?=$this->user_model->select_factory()?>   
                
               
                
                
        </select>
        </div>
      </div>
         <!--  14  -->
         
          <!--  15  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name15" name="head_name15">
                <option value="" disabled selected>Choose your option</option>
                
                
                
                 <?=$this->user_model->select_header()?>   
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory15"  name="factory15"  >
                <option value="" disabled selected>Choose your option</option>+
                 <?=$this->user_model->select_factory()?> 
                
               
                
                
                
        </select>
        </div>
      </div>
         <!--  15  -->
  
         
          <!--  16  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name16" name="head_name16">
                <option value="" disabled selected>Choose your option</option>
                
                 <?=$this->user_model->select_header()?>  
                  
                
                
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory16"  name="factory16"  >
                <option value="" disabled selected>Choose your option</option>
                <?=$this->user_model->select_factory()?> 
                
                
                
                
        </select>
        </div>
      </div>
         <!--  16  -->
         
           <!--  17  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name17" name="head_name17">
                <option value="" disabled selected>Choose your option</option>
                
                
              
                
                <?=$this->user_model->select_header()?>  
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory17"  name="factory17"  >
                <option value="" disabled selected>Choose your option</option>
                  <?=$this->user_model->select_factory()?>   
                
                 
                
                
                
        </select>
        </div>
      </div>
         <!--  17  -->
         
         <!--  18  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name18" name="head_name18">
                <option value="" disabled selected>Choose your option</option>
                
                
                
                   <?=$this->user_model->select_header()?>  
                
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory18"  name="factory18"  >
                <option value="" disabled selected>Choose your option</option>
                 <?=$this->user_model->select_factory()?>  
                
              
                
                
                
        </select>
        </div>
      </div>
         <!--  18  -->
         
            <!--  19  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name19" name="head_name19">
                <option value="" disabled selected>Choose your option</option>
                
                
                  <?=$this->user_model->select_header()?>   
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory19"  name="factory19"  >
                <option value="" disabled selected>Choose your option</option>
                <?=$this->user_model->select_factory()?>   
                
              
                
                
                
        </select>
        </div>
      </div>
         <!--  19  -->
         
         
          <!--  20  -->
     <div class="row">
        <div class="input-field col s6">
            
            <select   id="head_name20" name="head_name20">
                <option value="" disabled selected>Choose your option</option>
                
                
                  
                 <?=$this->user_model->select_header()?>  
                
                
        </select>  
        </div>
        <div class="input-field col s6">
            
            <select  id="factory20"  name="factory20"  >
                <option value="" disabled selected>Choose your option</option>
                <?=$this->user_model->select_factory()?> 
                
                
                
                
                
        </select>
        </div>
      </div>
         <!--  20  -->
         
    </div>
      
    
      
    <div class="modal-footer">
        
       <!-- 
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
       
       <?=base_url()?>report_pdf/docdb/dbreport.php/?type_record=2&type_document=2
       
       
       -->
       
       <!-- <?=base_url()?>report_pdf/docdb/queryheader.php -->
       <!--
       <a class="waves-effect waves-light btn-large" onclick=" javascript:  $('#fr_header_report').form('submit',function(data){  alert(data);  });  " >
      <i class="material-icons">add</i>
            Report
      </a>
       -->
       
       
       <button type="submit"  class="waves-effect waves-light btn-large" >
            <i class="material-icons">add</i>
            Report
       </button>
     
       
       <a class="btn-large " onclick=" javascript: $(function(){  $('#modal_circular').modal('close');  })  " ><i class="large material-icons">power_settings_new</i>Close</a>
       
      
    </div>
      
          </form>
  </div>
     <!-- dialog หนังสือเวียน -->
 
 
     
          
     
     
     <!--  วันลาพักผ่อน ประจำปี -->
     
     
     
     <script type="text/javascript">
   
   
   $(function()
   {
       
                $('#date_begin_sr_vacation').pickadate({
                  selectMonths: true, // Creates a dropdown to control month
                  selectYears: 15, // Creates a dropdown of 15 years to control year
                  format:'yyyy-mm-dd',
                  
                });
                
                
                 $('#end_date_sr_vacation').pickadate({
                  selectMonths: true, // Creates a dropdown to control month
                  selectYears: 15, // Creates a dropdown of 15 years to control year
                  format:'yyyy-mm-dd',
                  
                });
                
                
  
   });

  
        
     </script>

      <!-- Modal Structure -->
  <div id="modal_sum_vacation" class="modal modal-fixed-footer">
    <div class="modal-content">
        <!--
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
        -->
        <h6>
              <i class=" material-icons">person_pin</i>    สรุปการลาพักผ่อน/ลาป่วยภายในหน่วยงาน
        </h6>
        
        <div class="input-field col s3">
            <select class="browser-default"  id="work_year"  name="work_year"   onchange="" >
                <option value="" disabled selected>เลือกปี</option>
                <!--  $cur_year   -->
                <?php
                    $max_year =  $cur_year + 1;
                    $nagative=$cur_year-1;
                    for($min= $nagative;$min<=$max_year;$min++)
                    {
                          ?>
                                  <option value="<?=$min?>" ><?=$min?></option>
                          <?php
                    }
                ?>
                
            </select>
        </div>
        
        
        <div class="input-field col s3">
            
                     
             <!--  <i class="tiny material-icons prefix">account_circle</i> -->
            <!--
            <input  type="text" class="validate"   id="first_name_vacation_sr"  name="first_name_vacation_sr"  >
                    
            
                      
            <input  type="text" class="validate" id="last_name_vacation_sr"   name="last_name_vacation_sr">
                     
              -->      
              
              <select class="browser-default"  id="id_staff_sr"  name="id_staff_sr"   onchange="" >
                    <option value="" disabled selected>ชื่อ-นามสกุล</option>
                    <?=$this->user_model->tb_staff()?>
              </select> 
                      
        </div>
        
        
        
       

        
        <div class="input-field col s12">   
            <a class="waves-effect waves-light btn-large"  onclick="javascript:
               //alert('t');
              //$.post('<?=base_url()?>index.php/welcome/sr_tb_vacation',{},function(data){    });
               $('#sub11').load('<?=base_url()?>index.php/welcome/sr_tb_vacation',
                   {  
                        'id_staff_sr':$('#id_staff_sr').val(),
                        'work_year':$('#work_year').val(),
                        
                      //  'sr_tb_name':$('#sr_tb_name').val(), 
                    },
                   function(){  });
               "   ><i class="material-icons right">perm_identity</i>ค้นหา</a>
        </div>
    </div>

    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">
                     <i class="material-icons">loyalty</i>
                        Close ( ปิด )
      </a>
    </div>

  </div>
      
     <!--  วันลาพักผ่อน ประจำปี -->
     
     
 
    </body>
  </html>