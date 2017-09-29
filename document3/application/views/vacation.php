<!--  

  ##----------------- รายการคำนวณจากยุ้ย 

(1->วันลาสะสม cumulative )  +  (2->วันลาพักผ่อนในปีนี้  rest  )   = (3->รวมวันลาเป็น total)

(3->รวมวันลาเป็น total ) - (4->ในปีนี้ลามาแล้ว current)  = (5->คงเหลือวันลาอีก keep)
ลามาแล้ววันทำการ  leave =   current->date_total_leave   ในปีนี้ลามาแล้ว
ลาครั้งนี้  leave_thistime    =   wishes    มีความประสงค์จะขอลา


-->



<!-- dia หน้าหลัก ลาพักผ่อนประจำปี -->
<div  id="dia_vacation"  title=" ลาพักผ่อนประจำปี "  class="easyui-dialog"  
      data-options=" 
      closed:true
      ,iconCls:'icon-print' 
      ,modal:'true' 
      ,buttons:[
         { text:'ปิด',iconCls:'icon-cancel',size:'large',iconAlign:'right',handler:function()
                {  
                     $('#dia_vacation').dialog('close');  
                }  
         }
      ]
      "  style="width:200px;height: 200px;  "   >
    
    <div style="margin-left: 15px ;margin-top: 15px;">
        
        <a href="javascript:void(0)"  onclick="javascript:   $('#dia_fr_vacation').dialog('open');  "  class="easyui-linkbutton" data-options=" iconCls:'icon-large-chart'  ,size:'large' , iconAlign:'top'  "   >ยืนใบลา</a>  
        
        <a href="javascript:void(0)"  onclick="
            javascript: 
                    
          // alert('t');  
           $('#dia_main_vacation').dialog('open');
           
           
           "  class="easyui-linkbutton"  data-options=" iconCls:'icon-large-shapes'  ,size:'large',  iconAlign:'top'  "  >แสดงผล</a>
     
        
    </div>
    
          
    
</div>
<!-- dia หน้าหลัก ลาพักผ่อนประจำปี -->



<!-- datagrid  หลัก ในการลาทั้งหมด -->
<div  class="easyui-dialog"   id="dia_main_vacation" 
      style="width:450px;height: 400px;"
      data-options="
         closed: true
       , title : 'หน้าหลักลาพักผ่อนประจำปี'
       ,maximizable:false
       ,minimizable:true
      ,iconCls:'icon-ok' 
      ,collapsible:false
      
      ,buttons:[
      
        { text:'ปิด',  iconCls:'icon-cancel' ,iconAlign:'top',handler:function(){   $('#dia_main_vacation').dialog('close'); }  },
        {  text:'ยื่นใบลาพักร้อน',iconCls:'icon-man' , iconAlign:'top', handler:function(){  $('#dia_fr_vacation').dialog('open');   }    },
        
      ]
      
      "  >
          
                 <!-- datagird  ลาพักผ่อน -->
                 <div  class="easyui-datagrid"  id="datagrid_vacation"
                       data-options="
                       
                        //  url:'<?=base_url()?>index.php/welcome/json_vacation',
                          
                       //   url:'<?=base_url()?>index.php/welcome/json_vacation2',
                       
                     //  url:'json_staff'
                          url:'<?=base_url()?>index.php/welcome/json_staff',
                           
                           
                          rownumbers:true,
                          singleSelect:true,
                          columns:[[
                          
                           
                          /*
                            {  field:'first_name', title:'ชื่อ',align:'left',    },
                            {  field:'last_name',title:'นามสกุล', align: 'left' ,    },
                          */
                          
                              {  field:'name', title:'ชื่อ',align:'left',    },
                              {  field:'lastname', title:'ชื่อ',align:'left',    },
                              {  field:'position', title:'ตำแหน่ง',align:'left',    },
                          
                            
                          ]],
                          
                          
                          toolbar:[
                          
                         
                           
                            
                            /*
                            { text:'แก้ไข',  iconAlign:'top' ,  iconCls:'icon-edit',handler:function()
                                      {   //begin     
                                                 var  row=$('#datagrid_vacation').datagrid('getSelected');
                                                 if(row)
                                                 {
                                                      var  id_vacation=row.id_vacation;
                                                        if( id_vacation > 0 )
                                                        {
                                                              $('#dia_correct_vacation').dialog('open');  
                                                        }//end if2
                                                 
                                                 }//endif
                                      
                                      
                                      }  //end
                             },
                             { text:'ลบ',   iconAlign:'top'  , iconCls:'icon-cancel',handler:function()
                                 {   
                                      $.messager.confirm('คุณต้อการลบข้อมูล','คุณต้องการลบข้อมูลหรือไม่',function(r)
                                          { 
                                                if(r)
                                                {
                                                      //alert('t');
                                                      var  row=$('#datagrid_vacation').datagrid('getSelected');
                                                      if(row)
                                                      {
                                                            var  id_vacation=row.id_vacation;
                                                            //alert(id_vacation);
                                                            var  url='http://10.87.196.170/document2/index.php/welcome/delete_vacation/' + id_vacation;
                                                            $.post(url,{  id_vacation:id_vacation },function(data){
                                                                    //alert(data);
                                                                    if( data == 1 )
                                                                    {
                                                                          $.messager.alert('สถานะการลบข้อมูล','ลบข้อมูลสำเร็จ','info');
                                                                          $('#datagrid_vacation').datagrid('reload');
                                                                    }
                                                                    else if( data==0)
                                                                    {
                                                                          $.messager.alert('สถานะการลบข้อมูลผิดพลาด','ลบข้อมูลผิดพลาด','error');
                                                                          $('#datagrid_vacation').datagrid('reload');
                                                                    }
                                                            });
                                                      }
                                                }
                                                
                                          });
                                 } 
                              },
                             {  text:'ค้นหา' , iconAlign:'top',iconCls:'icon-search',handler:function(){  alert('t'); }  },
                             */
                             
                             { text:'รีโหลด', iconAlign:'top'   , iconCls:'icon-reload',handler:function(){ $('#datagrid_vacation').datagrid('reload'); }   },
                             
                             <?php
                               if(   $this->session->userdata("sess_permission") == 1     )
                               {
                             ?>
                             
                               { 
                                    text:'แสดงวันลาทั้งหมด' ,
                                    iconCls:'icon-man', 
                                    iconAlign:'top',
                                    handler:function()
                                    { //begin 
                                          //alert('t');
                                          var   url='<?=base_url()?>index.php/welcome/export_vacation';
                                          //alert(url);
                                          window.open(url);
                                    
                                       //end
                                    } 
                               },
                             
                             <?php
                               }
                             ?>
                              
                             <?php
                             //    "sess_us"=>$us,
                             //   $sess_login=$this->session->userdata("sess_login");  //test check  authentication login
                             if(   $this->session->userdata("sess_permission") == 1     )
                             {
                             ?>
                             {  text:'ตรวจสอบวันลา', iconCls:'icon-ok',  disabled:false  , iconAlign:'top', 
                                  handler:function()
                                 {   
                                       var  row=$('#datagrid_vacation').datagrid('getSelected');
                                       if( row )
                                       {
                                             // var  name=row.first_name;
                                              var  name=row.name;
                                              //alert(  name  );
                                              $.post('<?=base_url()?>index.php/welcome/check_date_vacation',{  name:name  },function(data)
                                                 {
                                                      var  date_total_leave=data.date_total_leave;
                                                      //alert( date_total_leave );
                                                        $.messager.alert('จำนวนวันลาพักผ่อนประจำปี', ' ลาพักผ่อนประจำปีทัั้งหมด  '  + date_total_leave + ' วัน' ,'info');
                                                 },'json'); 
                                       }
                                 }  
                             },
                             <?php
                             }
                             else
                             {
                             ?>
                             
                                {   
                                     text:'ตรวจสอบวันลาของตนเอง ' ,iconAlign:'top' , iconCls:'icon-ok' ,  
                                     handler:function(data)
                                     {
                                          var  url='<?=base_url()?>index.php/welcome/call_name_user';
                                          var   username='<?=$this->session->userdata("sess_us")?>';
                                          //alert(  username );
                                          $.post(url,{ username:username },function(data)
                                          {  
                                                 // alert(data); 
                                                 $.each(data,function(v,k){
                                                       var  firstname=k.firstname;
                                                       //alert( firstname );
                                                          $.post('<?=base_url()?>index.php/welcome/check_date_vacation',{  name: firstname  },function(data)
                                                 {
                                                      var  date_total_leave=data.date_total_leave;
                                                      //alert( date_total_leave );
                                                        $.messager.alert('จำนวนวันลาพักผ่อนประจำปี', ' ลาพักผ่อนประจำปีทัั้งหมด  '  + date_total_leave + ' วัน' ,'info');
                                                 },'json'); 
   
                                                 });
                                          },'json');
                                            
                                     }//end function
                                 },
                             
                             <?php
                             }
                             ?>
                             
                             /*
                             {  text:'ออกรายงาน',iconAlign:'top',iconCls:'icon-print',handler:function()
                                   {
                                        
                                          var  row=$('#datagrid_vacation').datagrid('getSelected');
                                          if( row )
                                          {    
                                               //    var  id_vacation=row.id_vacation;
                                                 // var  url='<?=base_url()?>report_pdf/docdb/report_vacation.php?id_vacation='  + id_vacation   ;
                                                   var  url='http://10.87.196.170/document3/report_pdf/docdb/report_vacation.php?id_vacation='  + id_vacation   ;
                                                 window.open(url);    
                                           }
                                   } 
                              }
                              */
                              
                              
                              <?php
                                if(   $this->session->userdata("sess_permission") == 1  )
                                {
                              ?>
                              {     text:'เลือกรายชื่อเพื่อจะออกรายงาน',iconAlign:'top',iconCls:'icon-print',handler:function()
                                     {
                                          //alert('t');
                                           //datagrid_vacation
                                           var  row=$('#datagrid_vacation').datagrid('getSelected');
                                           if( row )
                                           {
                                                //  var  first_name=row.first_name;
                                                  var  first_name=row.name;
                                                   //alert( first_name );
                                                                $.post('<?=base_url()?>index.php/welcome/call_user_vacation', { firstname:first_name  } ,function(data)
                                                                     {
                                                                                   $('#dia_user_vacation').dialog('open');
                                                                                   $('#datagrid_user_vacation').datagrid('loadData',data);
                                                                     },'json');  
                                           }
                                     } //end  function
                              }
                              <?php
                                }elseif(  $this->session->userdata("sess_permission") == 2  ) 
                                {
                              ?>
                              {
                                   text:'ตรวจสอบการลาทั้งหมดของตนเอง',iconAlign:'top',iconCls:'icon-print',handler:function(data)
                                   {
                                             var   username='<?=$this->session->userdata("sess_us")?>';
                                             var  url='<?=base_url()?>index.php/welcome/call_name_user';
                                             $.post(url,{  username:username  },function(data)
                                             {
                                                           $.each(data,function(v,k){  
                                                                     var    firstname=k.firstname;
                                                                     $.post('<?=base_url()?>index.php/welcome/call_user_vacation', { firstname:firstname  } ,function(data)
                                                                     {
                                                                                $('#dia_user_vacation').dialog('open');
                                                                                $('#datagrid_user_vacation').datagrid('loadData',data);
                                                                     },'json'); //end post function
                                                           }); //end function each
                                             },'json');//end function     
                                    }        
                              }
                              <?php
                                }
                              ?>
                          ] 
                       "
                       >
                 </div>
                 <!-- datagird  ลาพักผ่อน -->
    
</div>
<!-- datagrid  หลัก ในการลาทั้งหมด -->


<!--  Dia  +  form  บันทึกผล -->
<div class="easyui-dialog" 
     id="dia_fr_vacation"
     style="width: 800px;height: 600px;"
     data-options="
         iconCls:'icon-print',
         closed:true,
         modal:true,
         minimizable:true,
         resizable:true,
         maximizable:true,
         
         title:' แบบฟอร์มใบลาพักผ่อนประจำปี  ',
         
         buttons:[
               {
                   text:'แก้ไข้ข้อมูล',iconCls:'icon-edit', iconAlign:'top', handler:function()
                   { 
                          //alert('t');  
                          
                         //id_vacation_update
                         var  id_vacation_update=$('#id_vacation_update').textbox('getValue');
                         if( id_vacation_update > 0 )
                         {
                                // alert(id_vacation_update);
                               //  id_vacation_update
                               //  fr_vacation
                               $.ajax({
                                 url:'<?=base_url()?>index.php/welcome/update_table_vacation/',
                               //  dataType:'text',
                                 dataType:'json',
                                 method:'post',
                                 data:$('#fr_vacation').serialize(),
                                 
                               }).done(function(data)
                                    {
                                            
                                               //success
                                               var  ck=data.success;
                                               //alert(data.success);
                                               if( ck )
                                               {

                                                       $.messager.alert(
                                                       {
                                                          title:'สถานะการ update ข้อมูล',
                                                          msg:'สถานะการ update ข้อมูลสำเร็จ',
                                                          fn:function(){
                                                          
                                                          
                                                               $('#dia_fr_vacation').dialog('close');
                                                               $('#dia_main_vacation').dialog('open');
                                                               $('#dia_correct_vacation').dialog('close');
                                                               
                                                               
                                                               
                                                               
                                                          }//end
                                                       });
                                                    
                                               }
                                               else{
                                                    $.messager.alert(' สถานะการ  update  ข้อมูล',' การ update  ข้อมูลผิดพลาด ','error');
                                               }
                                               
                                    });
                                 
                         }
                        
                   },
               },
              { text:'บันทึกข้อมูล',iconCls:'icon-save',iconAlign:'top', handler:function()
                   {
                   
                          //fr_vacation
                          $.ajax({
                        
                          
                              url:'<?=base_url()?>index.php/welcome/insert_vacation',
                              
                             // url:'<?=base_url()?>index.php/welcome/test',
                              
                              
                              
                              method:'post',
                              data:$('#fr_vacation').serialize(),
                          
                          }).done(function(data)
                          {
                          
                               
                               // alert(data);
                             
                               
                               
                               
                               if(data=='1')
                               {
                                    $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลสำเร็จ','info');
                                    $('#datagrid_vacation').datagrid('reload');
                                     $('#dia_main_vacation').dialog('open');
                                     $('#datagrid_vacation').datagrid('reload');
                               }
                               else if( data=='0' )
                               {
                                     $.messager.alert('สถานะการบันทึกข้อมูลผิดพลาด','บันทึกข้อมูลผิดพลาด','error');
                                     $('#datagrid_vacation').datagrid('reload');
                               }
                               
                               
                               
                               
                               
                          });
                    }},
                {
                     text:'ล้าง',
                     iconAlign:'top',
                     iconCls:'icon-ok',
                     handler:function()
                     {
                          
                                  // $('#fr_vacation').form('clear');
                                   //prename   //combobox
                                   $('#house_number').textbox('setText','');
                                     
                                     
                                    $('#date_write').datebox('setText','');
                                    
                                    $('#id_staff').combobox('setText','');
                                    $('#prename').combobox('setText','');
                                    $('#first_name').textbox('setText','');
                                    $('#last_name').textbox('setText','');
                                    $('#position').textbox('setText','');
                                    
                                    $('#cumulative').numberbox('setText','');
                                    
                                    $('#rest').numberbox('setText','');
                                    
                                    
                                    $('#total').numberbox('setText','');
                                    
                                    $('#current').numberbox('setText','');
                                    
                                    $('#keep').numberbox('setText','');
                                    
                                    $('#wishes').numberbox('setText','');
                                    
                                    $('#leave').numberbox('setText','');
                                    
                                    //leave_thistime
                                    $('#date_total_leave').numberbox('setText','');
                                    
                                    //leave_thistime
                                     $('#leave_thistime').numberbox('setText',''); 
                                    
                                   // $('#date_total_leave').numberbox('setValue',total);
                                   
                                   
                                   $('#sign').textbox('setText','');
                                   
                                    $('#presign').combobox('setText','');
                                    
                                   $('#name_sign').textbox('setText','' );
                                   
                                   $('#lastname_sign').textbox('setText','');
                                   
                                   
                                   $('#work').textbox('setText','');
                                   
                                   $('#affiliation').textbox('setText','');
                                   
                                   $('#date_begin').datebox('setText','');
                                   
                                   $('#end_date').datebox('setText','');
                                   
                                   
                                   
                                 // 
                               //  $('#house_number').textbox('clear');
                               //   $('#house_number').textbox('setValue','test');
                              //   alert('t');
                                   
                                   
                                   
                                   $('#road').textbox('setText','');
                                   
                                   $('#district').textbox('setText','');
                                   
                                   $('#city').textbox('setText','');
                                   
                                   $('#province').textbox('setText','');
                                   
                                   
                                   $('#tel_address').textbox('setText','');
                                   
                                   
                                   $('#allowed').combobox('setValue','');
                                   
                                   
                
                                    $('#allow_manager').combobox('setValue','');
                                   
                                    
                     }
                },    
                    
               { text:'ปิด',iconCls:'icon-cancel',iconAlign:'top',handler:function(){ $('#dia_fr_vacation').dialog('close'); }  },
               {  text:'การแสดงผล' , iconCls:'icon-print', iconAlign:'top'  , handler:function(){   $('#dia_main_vacation').dialog('open');     $('#datagrid_vacation').datagrid('reload');  } },
               
         ]
     "

     >
    
    <form  id="fr_vacation">
        
        <table class="easyui-panel" style="padding: 10px;">
            
            <tr>
                
               
                <td   colspan="3" align="right">
                    <input class="easyui-switchbutton"  name="type_person5"   readonly="true"    id="type_person5"     value="5"   checked /> เจ้าหน้าที่ศูนย์ตะวันฉาย
                </td>
                
            </tr>
            
            <tr>
          
                <td >
                    
                </td >
                
                <td>
                    <input class="easyui-textbox"   id="write" name="write"  data-options=" iconCls:'icon-lock' ,value:'ศูนย์ตะวันฉายฯ'   "   style="width:200px;height: 40px;"   />
                </td>
                
                
            </tr>
            
            <tr>
                
              
                  <td  >
                    
                </td >
                <td>
                    <input class="easyui-datebox"  id="date_write"  name="date_write" style="width:150px;height: 40px;"    required="true"  />
                </td>
            </tr>
            
            
            <tr>
               
                <td>
                    <input class="easyui-textbox"   id="subject"  name="subject"  data-options=" value:'ขอลาพักผ่อนประจำปี'  "   style="width:150px;height: 40px;"    >
                </td>
            </tr>
            
               <tr>
               
                <td>
                    <input class="easyui-textbox"    id="study" name="study"   data-options=" value:'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย'  "   style="width:400px;height: 40px;"    >
                </td>
            </tr>
            
            
            <tr  >
                
                <td colspan="3">
                    
                    <select     id="id_staff"  name="id_staff"    labelPosition="top"    class="easyui-combogrid"
                                data-options="
                                   url:'<?=base_url()?>index.php/welcome/json_staff',
                                   panelWidth:200,
                                   idField:'id_staff',
                                   textField:'name',
                                   method:'post',
                                   fitColumns:true,
                                   label:'ชื่อ-นามสกุล',
                                   labelPosition:'top',
                                   singleSelect:true,
                                   
                                   
                                   columns:[[
                                     { field:'name',title:'ชื่อ', },
                                     { field:'lastname',title:'นามสกุล'  },
                                     
                                   ]]
                                   
                                   ,
                                   
                                   onChange:function()
                                   {

                                      
                                      var  id_staff  =   $('#id_staff').combogrid('getValue');

                                            $.ajax({
                                               //  url:'<?=base_url()?>index.php/welcome/json_staff',
                                               url:'<?=base_url()?>index.php/welcome/json_call_staff',
                                               data:$('#fr_vacation').serialize(),
                                               method:'post',
                                               dataType:'json',
                                               
                                            }).done(function(data)
                                               { 

                                                      
                                                      $.each(data,function(v,k)
                                                        {
                                                        
                                                             var  id_staff=k.id_staff;
                                                             
                                                             var  prename=k.prename;

                                                             
                                                             if(  prename == 'นาย' )
                                                             {

                                                                  $('#prename').combobox('setValue',1);
                                                                  //presign
                                                                  $('#presign').combobox('setValue',1);
                                                                  
                                                             }
                                                             else if( prename == 'นาง' )
                                                             {

                                                                  $('#prename').combobox('setValue',2);
                                                                    $('#presign').combobox('setValue',2);
                                                                  
                                                             }
                                                             else if( prename == 'นางสาว'  )
                                                             {

                                                                  $('#prename').combobox('setValue',3);
                                                                    $('#presign').combobox('setValue',3);
                                                                  
                                                             }
                                                             
                                                            // alert(k.position);
                                                             
                                                        //     $('#prename').combobox('setValue',k.prename );
                                                         
                                                             $('#first_name').textbox('setValue',k.name);
                                                         
                                                             $('#last_name').textbox('setValue',k.lastname);
                                                        
                                                             $('#position').textbox('setValue',k.position);
                                                             
                                                             var  fullname=k.name + '   ' + k.lastname;
                                                             $('#sign').textbox('setValue', fullname );
                                                             
                                                             
                                                       //      $('#presign').combobox('setValue',k.prename);
                                                             
                                                             $('#name_sign').textbox('setValue',k.name);
                                                             
                                                             $('#lastname_sign').textbox('setValue',k.lastname);
                                                             
                                                             
                                                        });
                                                        
                                                        
                                                    
                                                });
                                        
                                   }        
                                "
                                style="width:150px;height: 60px;"    >
                                           
                    </select>
                    
                    
              
                    <select  class="easyui-combobox"  name="prename" id="prename"  style="width:80px;height: 40px;"  >
                             <option value="1">นาย</option>
                              <option value="2">นาง</option>
                              <option value="3">นางสาว</option>
                    </select>
                    
                    <input class="easyui-textbox"  style="width:100px;height: 40px;"  prompt="ชื่อ"   id="first_name"  name="first_name"  data-options=" iconCls:'icon-man'  "   />
                    <input class="easyui-textbox"  style="width:130px;height: 40px;"   prompt="นามสกุล"  id="last_name"  name="last_name"  data-options=" iconCls:'icon-man'  "   />
                    <input class="easyui-textbox"  style="width:300px;height: 60px;"   prompt="ตำแหน่ง"   id="position"  name="position"   data-options="  label:'ตำแหน่ง', labelPosition:'top', iconCls:'icon-ok'   "    />
                      
                      
                </td>
                
            </tr>
            
            
            <tr>
                <td colspan="3">
             <input class="easyui-textbox"  style="width:250px;height: 40px;"  labelPosition="right"   id="affiliation"   name="affiliation"  data-options=" "  label="สังกัดหน่วยงาน" labelWidth="100px;"   data-options="  value:'-',   "   />
             
             <input class="easyui-textbox"  style="width:250px;height: 40px;"  labelPosition="right" id="work"  name="work"  label="งาน"  labelWidth="90px;"    data-options=" value:'-',   "   />
              
             
              
               <input class="easyui-numberbox"  style="width:220px;height: 40px;" labelAlign="right"  labelWidth="120px;"  label="คณะแพทยศาสตร์" labelPosition="left"   id="tel" name="tel"  data-options="  value:'043363123'  ,prefix:0  "  />
              
             
            </td>
            </tr>
            
            <tr>
                <td>
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:250px;height: 40px;" labelAlign="right"  labelWidth="200px;"  label="มีวันลาสะสม (วัน) " labelPosition="left"
                          id="cumulative" name="cumulative"  required="true"  readonly="true"  />
              
                   <a href="javascript:void(0)"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                              // alert('t');
                              
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                               // dataType:'text',
                               dataType:'json',
                                
                              }).done(function(data){
                              
                              
                                 //  alert(data);
                                 //var  cumulative
                                 $.each(data,function(v,k)
                                   {
                                       //alert(k.cumulative);
                                       var  cumulative=k.cumulative;
                                       $('#cumulative').numberbox('setValue', cumulative );
                                       
                                   });
                              
                              });
                             
                         }   "  /> Check วัน  </a>
                   
                   
                </td>
            </tr>
            
            
             <tr>
                <td>
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:250px;height: 40px;" labelAlign="right"  labelWidth="200px;"  label="
มีวันลาพักผ่อนในปีนี้ (วัน) " labelPosition="left"
 
name="rest"    id="rest"    required="true"  readonly="true"  />
              
                   <a href="javascript:void(0)"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                              // alert('t');
                              
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                               // dataType:'text',
                               dataType:'json',
                                
                              }).done(function(data){
                              
                              
                                 //  alert(data);
                                 //var  cumulative
                                 $.each(data,function(v,k)
                                   {
                                       //alert(k.cumulative);
                                       var  rest=k.rest;
                                      // $('#rest').numberbox('setValue', rest );
                                     // var   rest=10-k.cumulative
                                      $('#rest').numberbox('setValue', k.rest );
                                   });
                              
                              });
                             
                         }   "  /> Check วัน  </a>
                   
                   
                </td>
            </tr>
            
             <tr>
                <td>
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:250px;height: 40px;" labelAlign="right"  labelWidth="200px;"  label="
รวมวันลาเป็น (วัน) " labelPosition="left"
 
                        name="total"    id="total"  required="true"    readonly="true"    />
                   
                   
              
                   <a href="javascript:void(0)"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                              // alert('t');
                              
                              
                              /*
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                               // dataType:'text',
                               dataType:'json',
                                
                              }).done(function(data){
                              
                              
                                 //  alert(data);
                                 //var  cumulative
                                 $.each(data,function(v,k)
                                   {
                                    
                                   
                                      $('#total').numberbox('setValue', k.total );
                                      
                                      
                                   });
                              
                              });
                              */
                              
                              
                              var  total=  parseInt( $('#cumulative').numberbox('getValue') ) +  parseInt(  $('#rest').numberbox('getValue') );
                             $('#total').numberbox('setValue', total  );
                             
                         }   "  /> Check วัน  </a>
                   
                   
                   
                   
                </td>
            </tr>
            
            
            <tr>
                <td>
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:250px;height: 40px;" labelAlign="right"  labelWidth="200px;"  label="

ในปีนี้ลามาแล้ว (วัน) " labelPosition="left"
 
 
                        name="current"    id="current"   required="true"  precision="1"   readonly="true"   />
                   
                   
              
                   <a href="javascript:void(0)"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                              // alert('t');
                              
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                               // dataType:'text',
                               dataType:'json',
                                
                              }).done(function(data){
                              
                              
                                
                                 
                                 $.each(data,function(v,k)
                                   {
                                      
                                       var  rest=k.rest;
                                      // $('#rest').numberbox('setValue', rest );
                                      var   current=k.current;
                                     // $('#current').numberbox('setValue', current );
                                     
                                     //alert(k.current);
                                     
                                     //$('#current').textbox('setValue', k.current );
                                     
                                     //ปรับสูตรใหม่
                                    // date_total_leave
                                      $('#current').textbox('setValue', k.date_total_leave );
                                      
                                      
                                   });
                              
                              });
                             
                         }   "  /> Check วัน  </a>
                   
                   
                   
                   
                </td>
            </tr>
            
            
            <tr>
                <td>
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:250px;height: 40px;" labelAlign="right"  labelWidth="200px;"  label="


คงเหลือวันลาอีก (วัน) " labelPosition="left"
 
 
 
                        name="keep"    id="keep"   required="true"  precision="1" readonly="true"  />
                   
                   
              
                   <a href="javascript:void(0)"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                         
                         
                              // alert('t');
                              
                              /*
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                               // dataType:'text',
                               dataType:'json',
                                
                              }).done(function(data){
                              
                              
                                
                                 
                                 $.each(data,function(v,k)
                                   {
                                      
                                   
                                     //var   keep=10- k.current;
                                     $('#keep').numberbox('setValue',  k.keep );
                                   
                                   
                                   });
                                  
                                
                              
                              });
                              */
                              
                             // keep=total-current
                              var   keep_cal =$('#total').numberbox('getValue') -  $('#current').numberbox('getValue');
                             $('#keep').numberbox('setValue', keep_cal );
                             
                         }   "  /> Check วัน  </a>
                   
                   
                   
                   
                </td>
            </tr>
            
            
            <tr>
                 <td>
                     
                     
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:300px;height: 40px;" labelAlign="right"  labelWidth="250px;" 
                        
                          label="
                          มีความประสงค์จะขอลาพักผ่อนมีกำหนด (วัน) " labelPosition="left"    precision="2"    id="wishes" name="wishes"   required="true"    />
 
 
 
                   
                   
                   
              
                  
                   
                   
                   
                   
                </td>
            </tr>
            
            
            <tr>
                <td>
                    
                    
                    <input class="easyui-datebox"  
                           label="ขอลาพักผ่อนตั่้งแต่วันที่" labelWidth="130px;"  labelPosition="right"  style="width:270px;height: 40px;"  required="true"    id="date_begin"  name="date_begin"   />


                     <input class="easyui-datebox"  
                           label="ถึงวันที่" labelWidth="50px;"  labelPosition="right"  style="width:200px;height: 40px;"    id="end_date"  name="end_date"   required="true"   />

 
                </td>
            </tr>
            
            
            <tr>
                <td colspan="3">
                    
                    
                    <div class="easyui-panel" style="width: 500px;height: 60px;padding: 2px;">
                        
                        
                        
                             ในระหว่างลาพักผ่อนครั้งนี้ หากมีราชการด่วนติดต่อได้ที่บ้านเลขที่
                        
                       
                    
                    
                    <a href="javascript:void(0)"  class="easyui-linkbutton"  iconCls="icon-ok"  iconAlign="top"  onclick="
                         javascirpt:
                                 
                               var  url='<?=base_url()?>index.php/welcome/check_vacation';
                       
                               $.ajax({
                                   url:url,
                                   method:'post',
                                  // dataType:'text',
                                  dataType:'json',
                                   data: $('#fr_vacation').serialize(),
                               }).done(function(data)
                                   {
                                         //alert(data);
                                         
                                         $.each(data,function(v,k){
                                             
                                          //house_number
                                          //district
                                          //city
                                          //province
                                          //tel_address
                                          //alert(k.house_number);
                                               
                                                //alert(k.house_number);
                                                $('#house_number').textbox('setValue',k.house_number);
                                              
                                              
                                               
                                            
                                                
                                                $('#road').textbox('setValue',k.road);
                                                $('#district').textbox('setValue',k.district);
                                                $('#city').textbox('setValue',k.city);
                                                $('#province').textbox('setValue',k.province);
                                                $('#tel_address').textbox('setValue',k.tel_address);
                                                 
                                         });
                                         
                                        
                                   });
                       
                       "   >Check Address</a>
                    
                    </div>
                    
                    
                   
                    <input class="easyui-textbox" prompt="บ้่านเลขที่"   data-options=" multiline:true,  "      id="้house_number"     name="house_number"       style="width:100px; height: 40px;"  />

                   
                    
                      <input class="easyui-textbox"  
labelPosition="left"  labelWidth="310px"
id="road"  name="road"   prompt="ถนน"  style="width:150px; height: 40px;"  />
                      
                      

                      
                      
                        <input class="easyui-textbox"  
labelPosition="left"  labelWidth="310px"
id="district" name="district"   prompt="ตำบล/แขวง"  style="width:170px; height: 40px;"  />
                        
                        
                                      <input class="easyui-textbox"  
labelPosition="left"  labelWidth="310px"
id="city" name="city"   prompt="อำเภอ/เขต"  style="width:170px; height: 40px;"  />          
                      
                      
                                        <input class="easyui-textbox"  
labelPosition="left"  labelWidth="310px"
id="province" name="province"   prompt="จังหวัด"  style="width:170px; height: 40px;"  />   
                                        
                          
                                          <input class="easyui-textbox"  
labelPosition="left"  labelWidth="310px"
 id="tel_address"  name="tel_address"    prompt="โทรศัพท์"  style="width:170px; height: 40px;"  />   
                                        
                    
                </td>
                
            </tr>
            
            
            <tr>
                <td  colspan="3">
                    
                 <table  class="easyui-panel"  style="padding: 2px;">
                <tr>
                <td>
                    <input class="easyui-numberbox"   label="ลามาแล้ว
(วันทำการ)"   labelPosition="top"  labelWidth="150px;"   id="leave"  name="leave"   style="width:50px;height: 60px;"   required="true"   precision="1" readonly="true" >
                
                    
                    <a href="javascript:void(0)"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                              //alert('t');
                              
                             
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                             
                               dataType:'json',
                                
                              }).done(function(data){

                                 
                                 $.each(data,function(v,k)
                                   {
                                      
                                   
                                   //  var   leave=k.leave;
                                     // $('#leave').numberbox('setValue',  leave );
                                   //   k.date_total_leave
                                         $('#leave').numberbox('setValue'  ,  k.date_total_leave    );
                                   
                                   });

                              });
                             
                              
                              
                          
                                 //   $('#leave').numberbox('setValue', $('#current').numberbox('getValue')  );
                                //   $('#current').textbox('setValue', k.date_total_leave ); 
                                     
                                     
                             
                         }   "  /> Check วัน  </a>
                    
                    
                    
                  
                   
                </td>
                
                <td>
                    
                      <input class="easyui-numberbox"   label="ลาครั้งนี้
(วันทำการ) "   labelPosition="top"  labelWidth="150px;"   id="leave_thistime"  name="leave_thistime"   style="width:50px;height: 60px;"   required="true"  precision="1" readonly="true" >
                      
                         <a href="javascript:void(0)"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                               // alert('t');
                               
                               //wishes
                               
                               $('#leave_thistime').numberbox('setValue', $('#wishes').numberbox('getValue') );
                             
                             
                         }   "  /> Check วัน  </a>
                      
                </td>
                
                <td>
                    
                      <input class="easyui-numberbox"   label="รวมเป็น 
(วันทำการ) "   labelPosition="top"  labelWidth="150px;"  id="date_total_leave"   name="date_total_leave"   style="width:50px;height: 60px;"  required="true"  precision="1" readonly="true" >
                      
                        <a href="javascript:void(0)"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                               // alert('t');
                               
                               //wishes
                               
                              // $('#leave_thistime').numberbox('setValue', $('#wishes').numberbox('getValue') );
                              
                           //   var  total=  $('#leave_thistime').numberbox('getValue') +  $('#wishes').numberbox('getValue');
                               var  total=  $('#leave_thistime').numberbox('getValue') ;
                             // total
                             
                           //  $('#date_total_leave').numberbox('setValue',total);
                             var    total = parseInt(  $('#leave').numberbox('getValue') ) +  parseInt(  $('#leave_thistime').numberbox('getValue') );
                             
                            // alert(total);
                             
                             $('#date_total_leave').numberbox('setValue',total);
                             
                         }   "  /> Check วัน  </a>
                      
                      
                      
                </td>
         
            <tr>
                
                <td colspan="3">
                    <input class="easyui-textbox"  label="
ขอแสดงความนับถือ
"   labelPosition="top"  labelWidth="150px;"  iconCls="icon-man"   id="sign"  name="sign" style="width:200px;height: 60px;"  />
               
                    <select  class="easyui-combobox"  name="presign" id="presign"  style="width:80px;height: 40px;"  >
                             <option value="1">นาย</option>
                              <option value="2">นาง</option>
                              <option value="3">นางสาว</option>
                    </select>
                    
                    
                     <input class="easyui-textbox"   labelWidth="150px;"     id="name_sign"  name="name_sign" style="width:150px;height: 40px;"  />
                     
                     
                     <input class="easyui-textbox"   labelWidth="150px;"    id="lastname_sign"  name="lastname_sign"  style="width:200px;height: 40px;"  />
                     
                     
                </td>
                
                
            </tr>
            
           
            
            
           
     
            <tr>
                <td colspan="3">
                    
                      <input class="easyui-textbox"  id="name_inspector"  data-options="label:'ผู้ตรวจสอบ ชื่อ-นามสกุล ' , labelPosition:'top', value:'นงลักษณ์'   "  name="name_inspector" style="width:150px;height: 60px;"     >
                      <input class="easyui-textbox"  id="lastname_inspector"   name="lastname_inspector"    style="width:150px;height: 40px;"   data-options="  value:'พรมขอนยาง',   "     >
                      <input class="easyui-textbox"   id="position_inspector"  name="position_inspector"   style="width:200px;height: 40px;"  data-options="value:'เจ้าหน้าที่ผู้ช่วยวิัจัยและธุรการ'  "    >
                      <input class="easyui-datebox"     id="date_inspector"   name="date_inspector"  style="width: 150px;height: 40px;" />
                      
                      
                </td>
            </tr>
            
            <tr>
                <td colspan="3">
                    
                    <input class="easyui-combobox"   name="allowed"  id="allowed"   data-options=" 
                           label:'ความเห็นของผู้บังคับบัญชาชั้นต้น',
                           labelPosition:'top',
                           labelWidth:'auto',
                           showItemIcon:true,
                           data:[ 
                              {  value:'',text:'เลือก',iconCls:'icon-man' },
                              {  value:'1',text:'เห็นควรอนุญาต' ,  iconCls:'icon-ok'  },
                              {  value:'2',text:'ไม่เห็นควรอนุญาต'   ,iconCls:'icon-cancel'   },
                              
                           ],
                           
                           
                           "  style="width:180px;height: 60px;"   />
                    
                    
                    <input class="easyui-textbox"   id="name_commander"  name="name_commander"   data-options="    value:'สุธีรา' ,    "   style="width:100px;height: 40px;"  />
                    <input class="easyui-textbox"   id="lastname_commander"  name="lastname_commander"   data-options="    value:'ประดับวงษ์' ,    "   style="width:100px;height: 40px;"  />
                    <input class="easyui-textbox"   id="position_commander"  name="position_commander"  data-options="    value:'กรรมการและเลขานุการ' ,    "   style="width:200px;height: 40px;"  />
                    
                </td>
            </tr>
            
            
            <tr>
                <td colspan="3">
                    
                    <input class="easyui-combobox"    name="allow_manager"   id="allow_manager"   data-options=" 
                           label:'คำสั่งผู้บริหาร',


                           labelPosition:'top',
                           labelWidth:'auto',
                           showItemIcon:true,
                           data:[ 
                              {  value:'',text:'เลือก',iconCls:'icon-man' },
                              {  value:'1',text:'เห็นควรอนุญาต' ,  iconCls:'icon-ok'  },
                              {  value:'2',text:'ไม่เห็นควรอนุญาต'   ,iconCls:'icon-cancel'   },
                              
                           ],
                           
                           
                           "  style="width:180px;height: 60px;"   />
                    
                    
                    <input class="easyui-textbox"   id="first_name2"   name="first_name2"  data-options="    value:'รศ.พญ.นิรมล' ,    "   style="width:100px;height: 40px;"  />
                    <input class="easyui-textbox"   id="last_name2"  name="last_name2"    data-options="    value:'พัจนสุนทร' ,    "   style="width:100px;height: 40px;"  />
                    <input class="easyui-textbox"  id="last_position"  name="last_position"   data-options="    value:'รองผู้อำนวยการฝ่ายบริหาร' ,    "   style="width:200px;height: 40px;"  />
                    
                    
                    
                </td>
            </tr>
           
            
    </table>   
                    
                </td>
            </tr>
            
            
            <tr>
                <td>
                    <input class="easyui-textbox"  id="id_vacation_update" name="id_vacation_update"  data-options="  readonly:true,  "  style="width:60px;height: 40px;"  />
                </td>
            </tr>
            
        </table>       
            
            
            
            

          
            
        
                   

            
            
     
        
    </form>
    
</div>

<!--  Dia  +  form  บันทึกผล -->



<!--  dialog  password  แก้ไขข้อมุล การลาพักผ่อน -->
<div class="easyui-dialog"  id="dia_correct_vacation"  data-options="
      closed:true,
      title:' คุณต้องการแก้ไขวันลาของเจ้าหน้าที่ภายในหน่วยงาน   ',
      iconCls:'icon-man',
      modal:true,
      resizable:true,
      minimizable:false,
      collabsible:true,
      buttons:[
         { text:'Close(ปิด)',  iconAlign:'top'   , iconCls:'icon-cancel',handler:function(){
                 $('#dia_correct_vacation').dialog('close');
         
             } //endfunction
         },
         {
             text:'Submit', iconCls:'icon-lock',   iconAlign:'top'  , handler:function()
             {
                  
                    var  row=$('#datagrid_vacation').datagrid('getSelected');
                   if( row )
                   {
                   
                          //  var   id_vacation=row.id_vacation;
                             // alert(id_vacation);
                             
                             
                              
                             if( id_vacation > 0 )
                             {
                              
                                    $.post('<?=base_url()?>index.php/welcome/update_vacation',{  pass_update: $('#pass_update').passwordbox('getValue') , id_vacation : id_vacation   },function(data)
                                      { 

                                            
                                              $.each(data,function(v,k){
                                               
                                                    
                                                      
                                                            
                                                            $('#dia_fr_vacation').dialog('open');
                                                            
                                                            
                                                            var  date_write=k.date_write;  // format  date 08/25/2017
                                                            
                                                            if( date_write.length > 0 )
                                                            {
                                                                 var  ex=date_write.split('-');
                                                                 var  date_write_conv= ex[1]  +   '/'  +  ex[2]  +  '/'  +  ex[0]  ;
                                                                 $('#date_write').datebox('setValue',date_write_conv);
                                                            }

                                                            var   id_vacation=k.id_vacation;
                                                            $('#id_vacation_update').textbox('setValue',k.id_vacation);
                                                            
                                                            
                                                            var  prename=k.prename;
                                                            //alert(prename);
                                                            $('#prename').combobox('setValue',prename);
                                                            
                                                            $('#first_name').textbox('setValue',k.first_name);
                                                            
                                                            $('#last_name').textbox('setValue',k.last_name);
                                                            
                                                            $('#position').textbox('setValue',k.position);
                                                            
                                                            $('#affiliation').textbox('setValue',k.affiliation);
                                                            
                                                            $('#work').textbox('setValue',k.work);
                                                            
                                                            
                                                           $('#tel').numberbox('setValue',k.tel);
                                                           
                                                           $('#cumulative').numberbox('setValue',k.cumulative);
                                                           
                                                           
                                                           $('#rest').numberbox('setValue',k.rest);
                                                           
                                                            $('#total').numberbox('setValue',k.total);
                                                            
                                                            
                                                           $('#current').numberbox('setValue',k.current);
                                                           
                                                           
                                                            $('#keep').numberbox('setValue',k.keep);
                                                            
                                                            
                                                            $('#wishes').numberbox('setValue',k.wishes);
                                                            
                                                            
                                                            //date_begin
                                                            var  date_begin=k.date_begin;
                                                             if( date_begin.length > 0 )
                                                            {
                                                                 var  ex=date_begin.split('-');
                                                                 var  date_begin_conv= ex[1]  +   '/'  +  ex[2]  +  '/'  +  ex[0]  ;
                                                                 $('#date_begin').datebox('setValue',date_write_conv);
                                                            }
                                                            
                                                            
                                                            //end_date
                                                            var  end_date=k.end_date;
                                                              if( end_date.length > 0 )
                                                            {
                                                                 var  ex=date_begin.split('-');
                                                                 var  date_begin_conv= ex[1]  +   '/'  +  ex[2]  +  '/'  +  ex[0]  ;
                                                                 $('#end_date').datebox('setValue',date_write_conv);
                                                            }
                                                            
                                                            
                                                            $('#house_number').textbox('setValue',k.house_number);
                                                            
                                                            $('#road').textbox('setValue',k.road);
                                                            
                                                              $('#district').textbox('setValue',k.district);
                                                            
                                                            $('#city').textbox('setValue',k.city);
                                                            
                                                            $('#province').textbox('setValue',k.province);
                                                            
                                                            $('#tel_address').textbox('setValue',k.tel_address);
                                                            
                                                            $('#leave').numberbox('setValue',k.leave);
                                                            
                                                            $('#leave_thistime').numberbox('setValue',k.leave_thistime);
                                                            
                                                            $('#date_total_leave').numberbox('setValue',k.date_total_leave);
                                                            
                                                            $('#presign').combobox('setValue',k.presign);
                                                            
                                                            $('#sign').textbox('setValue',k.sign);
                                                            
                                                            $('#presign').combobox('setValue',k.presign);
                                                            
                                                            $('#name_sign').textbox('setValue',k.name_sign);
                                                            
                                                            $('#lastname_sign').textbox('setValue',k.lastname_sign);
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                              });

                                      },'json'); //end function
                             
                             }
                   
                   }
                   
                   
                   
                    
                    
                                        
             }//end function
         },
         {
              text:'ล้าง', iconCls:'icon-reload',iconAlign:'top', handler:function()
               {
                     $('#pass_update').passwordbox('clear');
               }
         }
        
      ]
      
      
      
     
      " style="width:350px;height: 200px;padding: 10px;">
    
    <input class="easyui-passwordbox"  id="pass_update"  data-options=" value:'update1234' ,  showEye:true,   "  prompt=" ระบุรหัสผ่าน (Password) " iconWidth="28"  label="ระบุรหัสผ่าน "  lableWidth="100px;"  labelPosition="top"  style="width:200px;height: 80px;padding: 10px;"   />
    
</div>


<!--  dialog  password  แก้ไขข้อมุล การลาพักผ่อน -->



<!--  ##################   dialog  วันลาส่วนตัว ################ -->

<div class="easyui-dialog"  id="dia_user_vacation"  data-options="
     
     iconCls:'icon-man',
     closed:true,
     title:'จำนวนครั้งที่ลาในแต่ละครั้ง',
     toolbar:[
     
     
       {  text:'ออกรายงาน',iconCls:'icon-print',   iconAlign:'top'  , handler:function(data)
            {  
                 // alert('test'); 
                   //datagrid_user_vacation
                   var  row=$('#datagrid_user_vacation').datagrid('getSelected');
                   if(row)
                   {
                   
                          //alert('t');
                           var  	id_vacation=row.id_vacation;
                          // alert( id_vacation  );
                           var  url='http://10.87.196.170/document3/report_pdf/docdb/report_vacation.php?id_vacation='  + id_vacation   ;
                           window.open(url); 
                        
                   }
                   
                   
             }   
       }
       
       <?php
            if( $this->session->userdata("sess_permission") == 1   )         
            {
       ?>
             ,{
                 text:'แก้ไขข้อมูล',
                 iconCls:'icon-edit',
                 iconAlign:'top',
                 handler:function()
                 {
                     
                      // id_vacation
                      var  row=$('#datagrid_user_vacation').datagrid('getSelected');
                      if( row )
                      {
                              var  id_vacation=row.id_vacation;
                              if(    id_vacation  >  0  )
                              {
                              
                                   //$('#dia_correct_vacation').dialog('open');
                                       $.post('<?=base_url()?>index.php/welcome/update_vacation',{   id_vacation : id_vacation    },function(data)
                                       {  //begin function
                                       
                                                 //alert(data);
                                                 
                                                  $.each(data,function(v,k){
                                                  
                                                       //-------------------------begin----------------------
                                                      $('#dia_fr_vacation').dialog('open');
                                                       
                                                       var  date_write=k.date_write;  // format  date 08/25/2017
                                                       
                                                            
                                                            if( date_write.length > 0 )
                                                            {
                                                                 var  ex=date_write.split('-');
                                                                 var  date_write_conv= ex[1]  +   '/'  +  ex[2]  +  '/'  +  ex[0]  ;
                                                                 $('#date_write').datebox('setValue',date_write_conv);
                                                            }
                                                               //alert(  date_write_conv   );
                                                               
                                                               var   id_vacation=k.id_vacation;
                                                            $('#id_vacation_update').textbox('setValue',k.id_vacation);
                                                            
                                                            
                                                            var  prename=k.prename;
                                                            //alert(prename);
                                                            $('#prename').combobox('setValue',prename);
                                                            
                                                            $('#first_name').textbox('setValue',k.first_name);
                                                            
                                                            $('#last_name').textbox('setValue',k.last_name);
                                                            
                                                            $('#position').textbox('setValue',k.position);
                                                            
                                                            $('#affiliation').textbox('setValue',k.affiliation);
                                                            
                                                            $('#work').textbox('setValue',k.work);
                                                            
                                                            
                                                           $('#tel').numberbox('setValue',k.tel);
                                                           
                                                           $('#cumulative').numberbox('setValue',k.cumulative);
                                                           
                                                           
                                                           $('#rest').numberbox('setValue',k.rest);
                                                           
                                                            $('#total').numberbox('setValue',k.total);
                                                            
                                                            
                                                           $('#current').numberbox('setValue',k.current);
                                                           
                                                           
                                                            $('#keep').numberbox('setValue',k.keep);
                                                            
                                                            
                                                            $('#wishes').numberbox('setValue',k.wishes);
                                                            
                                                            
                                                            //date_begin
                                                            var  date_begin=k.date_begin;
                                                             if( date_begin.length > 0 )
                                                            {
                                                                 var  ex=date_begin.split('-');
                                                                 var  date_begin_conv= ex[1]  +   '/'  +  ex[2]  +  '/'  +  ex[0]  ;
                                                                 $('#date_begin').datebox('setValue',date_write_conv);
                                                            }
                                                            
                                                            
                                                            //end_date
                                                            var  end_date=k.end_date;
                                                              if( end_date.length > 0 )
                                                            {
                                                                 var  ex=date_begin.split('-');
                                                                 var  date_begin_conv= ex[1]  +   '/'  +  ex[2]  +  '/'  +  ex[0]  ;
                                                                 $('#end_date').datebox('setValue',date_write_conv);
                                                            }
                                                            
                                                            
                                                            $('#house_number').textbox('setValue',k.house_number);
                                                            
                                                            $('#road').textbox('setValue',k.road);
                                                            
                                                              $('#district').textbox('setValue',k.district);
                                                            
                                                            $('#city').textbox('setValue',k.city);
                                                            
                                                            $('#province').textbox('setValue',k.province);
                                                            
                                                            $('#tel_address').textbox('setValue',k.tel_address);
                                                            
                                                            $('#leave').numberbox('setValue',k.leave);
                                                            
                                                            $('#leave_thistime').numberbox('setValue',k.leave_thistime);
                                                            
                                                            $('#date_total_leave').numberbox('setValue',k.date_total_leave);
                                                            
                                                            $('#presign').combobox('setValue',k.presign);
                                                            
                                                            $('#sign').textbox('setValue',k.sign);
                                                            
                                                            $('#presign').combobox('setValue',k.presign);
                                                            
                                                            $('#name_sign').textbox('setValue',k.name_sign);
                                                            
                                                            $('#lastname_sign').textbox('setValue',k.lastname_sign);
                                                               
                                                               
                                                       
                                                       
                                                       //--------------------------end-------------------------
                                                       
                                                  
                                                  });  //end each

                                        },'json'); //end post
                                  
                                   
                                   
                              }
    
                      }
                 }
             },
             {
                   text:'ลบ',  iconCls:'icon-cancel',iconAlign:'top',
                   handler:function()
                   { //begin function 
                           //alert('t');
                           var    row=$('#datagrid_user_vacation').datagrid('getSelected');
                           if( row )
                           {
                                 var  id_vacation=row.id_vacation;
                                // alert( id_vacation );
                                 var  url='<?=base_url()?>index.php/welcome/delete_vacation/';
                                 $.post(url,{id_vacation:id_vacation  },function(data){
                                 
                                         //alert(data);
                                         if( data == 1 )
                                         {
                                                    $.messager.alert('สถานะการลบข้อมูล','การลบข้อมูลสำเร็จ','info');
                                                    $('#dia_user_vacation').dialog('close');
                                               
                                         }//end if
                                         else{
                                                     $.messager.alert('สถานะการลบข้อมูล','การลบข้อมูลผิดพลาด','error');
                                                     $('#dia_user_vacation').dialog('close');
                                         }
  
                                 });//end function
                           } //end if
                   } //end function
             
             }
       
       <?php
            }
       ?>
       
 
       ]
          ,
          
       buttons:[
         {  
         
         text:'ปิดหน้าต่าง',
         iconCls:'icon-cancel',
         iconAlign:'top',
         handler:function( data )
                    {
                           $('#dia_user_vacation').dialog('close');

                    }
       
         
         }
       
       ]
         
       "  style="width:400px;height: 300px;"    >
    
    <div  class="easyui-datagrid"
          id="datagrid_user_vacation"
          data-options="
            url:'<?=base_url()?>index.php/welcome/json_vacation',
            singleSelect:true,
            rownumbers:true,
            columns:[[  
            
               
                     {  field:'first_name',title:'ชื่อ'    },
                     {  field:'last_name',title:'นามสกุล'  },
                     { field:'date_total_leave', title:'วันลาที่เหลือ' },
                     
            
            ]]
          
          "
            >
        
    </div>
    
</div>
<!--  ##################   dialog  วันลาส่วนตัว ################ -->