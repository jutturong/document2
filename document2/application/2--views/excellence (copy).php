_
<!--    ----------------------------------END  Excellence -------------------------------------------------------------->
<!--  Dialog ศูนย์การดูแล ฯ  And Excellence -->
<div id="dlg_content_excellence" class="easyui-dialog" title="ศูนย์การดูแล ฯ และศูนย์ความเป็นเลิศ"
data-options="iconCls:'icon-print' ,
closed:true,  "
style="width:400px;height:380px;padding:10px">



      <!--  <form id="f_search_excellence" method="post" action="<?=base_url()?>index.php/welcome/search_excellence/"  enctype="multipart/form-data" > -->
        <form id="f_search_excellence"  method="post"   novalidate="novalidate"    enctype="multipart/form-data" >



            <div style="margin-bottom:10px">

<select class="easyui-combobox" name="type_document" id="type_document" label="ประเภท"
        data-options="
           onSelect:function()
           {

               var  url ='<?=base_url()?>index.php/welcome/json_to/' +  $('#type_document').combobox('getValue');
               //alert( url );
               //$('#to').combobox('reload', url  );
               
           }
        "
        
        labelPosition="top" style="width:50%;height:60px">
  <!--  <option  >เลือก</option> -->
    <option value="1">เอกสารรับ</option>
    <option value="2">เอกสารส่ง</option>
</select>

            </div>


<!--  ของ -->
<div style="margin-bottom:10px">
    
    <!--
    <input class="easyui-combogrid"  type="autoCompleteBox"   id="to"   name="to"  labelPosition="left"  style="width:80%;height:60px"
                  data-options="
                     url:'<?=base_url()?>index.php/welcome/json_to/' +  $('#type_document').combobox('getValue')  ,
                     method:'post',
                     //valueField:'id_academic',
                     //textField:'firstname_academic',
                     idField:'to',
                     textField:'to',
                   //  panelHeight:'auto',
                   //  labelPosition:'top',
                     fitColumns:true,
                     label:'ของ',
                     labelPosition:'top',
                     mode: 'remote',
                     columns:[[
                      // { field:'pre_academic',title:'คำนำหน้า',width:'80px'  },
                      // { field:'firstname_academic',title:'ชื่อ',width:'100px' },
                      // { field:'lastname_academic',title:'นามสกุล',width:'100px' },
                         { field:'to',title:'ชื่อ-นามสกุล',widht:'150px' },
                     ]]
                  " >
    -->
    
    <input class="easyui-searchbox"    
           data-options="
          //   iconCls:'icon-man',
             size:'large',
             label:'ของ',
             labelPosition:'top',
             iconAlign:'right',
             labelWidth:'50px',
           "
           id="to"   name="to"  style="width:250px;height: 60px;"  />
    
    
 </div>





            <div style="margin-bottom:10px">
                <input class="easyui-textbox" label="เรื่อง:"  id="subject"   name="subject"   labelPosition="top" style="width:250px;height:60px">
            </div>

<!--
            <div style="margin-bottom:10px">
                  <input class="easyui-textbox" label="จาก/ถึง" labelPosition="top" style="width:90%;height:60px">
            </div>
  -->


            <div style="margin-bottom:10px">

                    <input class="easyui-datebox" label="วันที่/เดือน/ปี "  name="date"  id="date" labelPosition="top" style="width:80%;height:60px">
            </div>






        </form>
        <div style="text-align:center;padding:5px 0">


              <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search',size:'large',iconAlign:'left' "  onclick="
                 javascript:

               var   type_document= $('#type_document').val() ;
       
               var   date=$('#date').val();
               var   to= $('#to').val();
               
               

                     //alert(type_document);
                     
                  if(   type_document  > 0    )    	//type_document  1 เอกสารรับ   2 เอกสารส่ง
                          {
                              if(   type_document == 1 )
                              {
                                  $('#dia_datagrid_excellence').dialog({ title:'เอกสารรับศูนย์การดูและ ฯ และความเป็นเลิศ '  });
                              }
                              else if(    type_document == 2  )
                              {
                                  $('#dia_datagrid_excellence').dialog({ title:'เอกสารส่งศูนย์การดูและ ฯ และความเป็นเลิศ'  });
                               }

                              // $('#dia_datagrid_excellence').dialog('open');
                              // $('#dia_datagrid_excellence').dialog({ title:'test' });


                               /*
                                  $.ajax({
                                 type:'POST',
                                 data:$('#f_search_excellence').serialize(),
                                 url:'<?=base_url()?>index.php/welcome/search_excellence/',
                                 dataType:'json'}).done(function(data)
                                          {
                                                 $('#dia_datagrid_excellence').dialog('open');
                                                 $('#datagrid_excellence').datagrid('loadData',data);      
                                           });
                                 */
                                    
                                    var  url='<?=base_url()?>index.php/welcome/search_excellence2';
                                    $.ajax({
                                        
                                         data:$('#f_search_excellence').serialize(),
                                         url:url,
                                         method:'post',
                                     //    dataType:'text',
                                        dataType:'json',
                                         
                                    }).done(function(data){
                                        
                                           //  alert(data);
                                        
                                             
                                             $('#dia_datagrid_excellence').dialog('open');
                                             $('#datagrid_excellence').datagrid('loadData',data);   
                                             
                                             $('#dlg_content_excellence').dialog('close');                                          
                                            
                                        
                                    });



                          }


              " >ค้นหา</a>


            <a href="javascript:void(0)"  class="easyui-linkbutton"  style="width: 80px;height: 40px;" 
               onclick="
                 javascript: 
                         
                          //alert('t');
                          $('#type_document').combobox('setValue','');
                          $('#to').textbox('setValue','');
                          $('#date').datebox('setValue','');
                  
               "
               
               iconCls="icon-man"  >ล้าง</a>


              <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel',size:'large',iconAlign:'left'"
                 onclick="javascript:
                             
                     //   $('#to').combogrid('setValue','');
                      //  $('#date').datebox('setValue','');
                        
                        $('#dlg_content_excellence').dialog('close');


                        ">ปิด</a>





        </div>
    </div>





</div>







<!--  Dialog  การค้นหา  ศูนย์การดูแล ฯ  And Excellence   -->
    <div id="dia_datagrid_excellence"  iconCls="icon-print"    class="easyui-dialog"
    data-options="
    closed:true,
    maximizable:true,
    resizable:true,
    buttons:[{
      text:'ปิด',
      iconCls:'icon-cancel',

      handler:function()
      {
          //alert('t');
             // $('#to').combobox('setValue')='';
             $('#dia_datagrid_excellence').dialog('close');

      }
    }]
    "
    style="width:700px;height:400px;" >


           <div  id="datagrid_excellence"   class="easyui-datagrid" 
                 data-options="
                 url:'<?=base_url()?>index.php/welcome/json_excellence',
                 singleSelect:true,
                 pagination:true,
                 columns:[[

                                   { field:'ck',checkbox:true, },
                                   { field:'registration',title:'เลขส่ง',align:'left'  },
                                   { field:'at',title:'เลขที่เอกสาร',align:'left' },
                                   { field:'date',title:'วันที่',align:'left' },
                                   {  field:'from',title:'จาก',align:'left' },
                                    {  field:'to',title:'ของ', align:'left' },
                                    {  field:'subject',title:'เรื่อง',align:'left' },
                                    {  
                                         field:'filename',title:'Download file',align:'left',
                                                        
                                    
                                    
                                    }
                 ]],
                 toolbar:[
                     //{  text:'รีโหลด' ,iconCls:'icon-reload',handler:function(){  $('#datagrid_excellence').datagrid('reload');  }   },
                 
                    {  text:'ส่งออก',iconCls:'icon-print',size:'large',handler:function()
                           {
                                // alert('t');
                               //  window.open( '<?=base_url()?>index.php/welcome/export_data/' +  $('#f_search_excellence').serialize()  , 'PopUp', 'width=100,height=100' );
                                //   window.open( '<?=base_url()?>index.php/welcome/export_data/' +  $('#f_search_excellence').serialize()  );
                                // type_record =>3,
                                //window.open( '<?=base_url()?>index.php/welcome/export_data/'+  '3'  +  '/'  +  $('#type_document').combobox('getValue')  +  '/'    +    $('#to').combogrid('getValue') + '/' + $('#date').datebox('getValue')   );
                                
                                
                                
                                  
                                    //ค้นหาจากชื่อ
                                 //   var  to  =   $('#to').combogrid('getValue') ;
                                    var  to  =   $('#to').textbox('getValue') ; 
                                    //ค้นหาจากวันที่ 
                                    var   date = $('#date').datebox('getValue') ;
                                    
                                  
                                    if(  to == ''  &&  date == '' )
                                    {
                                    //ไม่ระบุอะไรเลย
                                    // var  url= '<?=base_url()?>index.php/welcome/export_data/'+  '3'  +  '/'  +  $('#type_document').combobox('getValue')  +  '/'    +    $('#to').combogrid('getValue') + '/' + $('#date').datebox('getValue') ;
                                      var  url= '<?=base_url()?>index.php/welcome/export_data1/'+  '3'  +  '/'  +  $('#type_document').combobox('getValue');
                                     }
                                     
                                    else if(  to == ''  &&  date != ''    )
                                    {
                                   //ระบุแค่วันที่
                                     var  url= '<?=base_url()?>index.php/welcome/export_data2/'+  '3'  +  '/'  +  $('#type_document').combobox('getValue') + '/'  +   date;
                                    } 
                                    
                                    
                                   else if(    to != ''  &&  date == ''    )
                                   {
                                   //ระบุแค่ชื่อ
                                    var  url= '<?=base_url()?>index.php/welcome/export_data3/'+  '3'  +  '/'  +  $('#type_document').combobox('getValue') + '/'  +   to;
                                   }
                                   
                                   else if(   to != ''  &&  date != ''   )
                                   {
                                    //ระบุทั้งชื่อและวันที่
                                   var  url = '<?=base_url()?>index.php/welcome/export_data/'+  '3'  +  '/'  +  $('#type_document').combobox('getValue')  +  '/'    +    $('#to').textbox('getValue') + '/' + $('#date').datebox('getValue'); 
                                   }
                                    
                                       // alert( url );  
                                       window.open(url);
                                     
                                },
                         
                     },
                     {
                        text:'ดาวน์โหลด',iconCls:'icon-large-picture',size:'lagre',handler:function()
                         {
                              var  row=$('#datagrid_excellence').datagrid('getSelected');
                              if( row )
                              {
                                   var  filename=row.filename;
                                       if( filename.length > 0 )
                                       {
                                             var  url='<?=base_url()?>upload/' + filename  ;
                                              //alert(  url  );
                                              window.open(url,'','width=500,height=500');
                                       }
                                   
                              }
                         }
                     },
                     {
                        text:'แก้ไข', size:'large'  ,iconCls:'icon-edit',handler:function()
                         {
                              var  row=$('#datagrid_excellence').datagrid('getSelected');
                              var  id_main1=row.id_main1;
                              //   $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง 
                              
                              //หนังสือรับ
                               if(  id_main1 >  0  &&  row.type_document == 1  )
                               {
                                      //alert(id_main1);
                                      $('#dia_insert_excellence').dialog('open');
                                      
                                      
                                        $('#registration_receive21').textbox('setValue',row.registration); //เลขรับ
                                        $('#at_receive21').textbox('setValue',row.at);  //เลขที่เอกสาร
                                        
                                         $('#date1_receive21').datebox('setValue','');
                                         

                                          //2017-07-14    database  =>    07/13/2017
                                          var  date_db=row.date;
                                          if(  date_db.length   >  3  )
                                          {
                                               var  str  = date_db.split('-');
                                               //alert(str[0]);
                                               var    y=str[0];
                                               var    m=str[1];
                                               var    d=str[2];
                                               var     dmy_conv= m + '/' + d + '/'  + y;
                                              // alert(dmy_conv);
                                               //$('#dd').datebox('setValue', '6/1/2012');	
                                              $('#date1_receive21').datebox('setValue',dmy_conv ); //วันที่รับ     
                                           }

                                         $('#from_receive21').textbox('setValue',row.from);  //'จาก'
                                        
                                         $('#to_receive21').textbox('setValue',row.to); //ถึง
                                         
                                         
                                          $('#subject_receive21').textbox('setValue',row.subject); //'เรื่อง
                                        
                                          
                                          $('#practice_receive21').textbox('setValue',row.practice);  //การปฏฺิบัติ
                                          
                                          $('#note_receive21').textbox('setValue',row.note); //หมายเหตุ
                                          
                                          $('#id_main1').textbox('setValue',row.id_main1); // id
                                        
                                       
                                        
                                        
                               }
                               else if( id_main1 >  0  &&  row.type_document == 2  )  //หนังสือส่ง 
                               {
                                     //alert('หนังสือส่ง');
                                     //dia_insert_send_excellence
                                     $('#dia_insert_send_excellence').dialog('open');
                                     
                                    
                                     
                                         //alert(row.registration);
                                         $('#registration_send21').textbox('setText', '' );   
                                         $('#registration_send21').textbox('setValue', row.registration );
                                      
                                       var  date_db=row.date;
                                          if(  date_db.length   >  3  )
                                          {
                                               var  str  = date_db.split('-');
                                               //alert(str[0]);
                                               var    y=str[0];
                                               var    m=str[1];
                                               var    d=str[2];
                                               var     dmy_conv= m + '/' + d + '/'  + y;
                                              // alert(dmy_conv);
                                               //$('#dd').datebox('setValue', '6/1/2012');	
                                              $('#date1_send21').datebox('setValue',dmy_conv ); //วันที่รับ     
                                           }
                                           else
                                           {
                                              $('#date1_send21').datebox('setValue','' ); //วันที่รับ 
                                           }
                                           
                                              $('#from_send21').textbox('setValue',row.from); //จาก  
                                              $('#to_send21').textbox('setValue',row.to); //ถึง  
                                              $('#subject_send21').textbox('setValue',row.subject); //เรื่อง       6
                                              $('#practice_send21').textbox('setValue',row.practice); //การปฏฺิบัติ       7
                                              $('#note_send21').textbox('setValue',row.note); //หมายเหตุ      8
                                              
                                              $('#id_main1_send_excellence').textbox('setValue',row.id_main1); 

                               }
                              
                          }
                     },
                     {
                        text:'ลบข้อมูล',  iconCls:'icon-cancel',size:'large',handler:function()
                                {
                                        var  row=$('#datagrid_excellence').datagrid('getSelected');
                                        
                                        
                                       
                                       
                                       $.messager.confirm('Delete Date Status','คุณแน่ใจว่าต้องการลบข้อมูล',function(r){
                                       
                                       if( r )
                                       {
                                                   // $.messager.progress();
                                                    
                                                    if( row.id_main1 > 0 )
                                                    {
                                                          $.post('<?=base_url()?>index.php/welcome/delete_tb_main1_3/',{ id_main1: row.id_main1  },function(data)
                                                          {
                                                                    // alert(data);
                                                                  if( data == 1 )
                                                                  {
                                                                  
                                                                       
                                                                       $.messager.alert({
                                                                           title:'สถานะของการลบข้อมูล',
                                                                           msg:'ลบข้อมูลสำเร็จ',
                                                                           
                                                                       });
                                                                       
                                                                       
                                                                      //$.messager.alert('สถานะการลบขอ้มูล','ลบข้อมูลสำเร็จ');

                                                                       $('#datagrid_excellence').datagrid('reload');
                                                                    //  location.reload();
                                                                    
                                                                    
                                                                   }
                                                                   else{
                                                                     
                                                                      $.messager.alert({
                                                                           title:'สถานะของการลบข้อมูล',
                                                                           msg:'ลบข้อมูลผิดพลาด',
                                                                      
                                                                           
                                                                       });
                                                                   
                                                                   }
                                                                    
                                                                    
                                                          });
                                                          
                                                       
                                                          
                                                          
                                                    }
                                       
                                       }
                                       
                                      
                                       
                                       
                                       });
                                       
                                       
                                       
                                       
                                       
                                       
                                }
                     }
                 ]

                 "
                 style="width:680px;height:300px"  >

    </div>
<!--  Dialog  การค้นหา  ศูนย์การดูแล ฯ  And Excellence   -->

<!--  Dialog หนังสือรับหรือหนังสือส่ง -->
<div class="easyui-dialog" data-options="closed:true"  id="dia_select_excellence"  iconCls="icon-search"  title="ประเภทเอกสาร รับ/ส่ง" style="width:400px;height:120px;padding:5px" >

       <div  style="margin-top:5px;margin-left:20px;"  >
            <input class="easyui-combobox" id="select_excellence" style="width:100px;height:60px;" data-options="
                 showItemIcon:true,
                 data:[
                     { value:'',text:'เลือก' },
                     { value:'1',text:'รับ' },
                     { value:'2',text:'ส่ง' },
                 ],
                 editable:false,
                 panelHeight:'auto',
                 label:'ประเภทของเอกสาร',
                 labelPosition:'top',

            "   />
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok"  style="margin-left:10px;width:80px;height:40px" onclick="
               javascript:
                  // $('#dia_insert_excellence').dialog('open');

                  if( $('#select_excellence').combobox('getValue') == 1   )
                  {
                      //alert(   $('#select_excellence').combobox('getValue')  );
                       $('#dia_insert_excellence').dialog('open');

                        //number_add
                      //  $('#registration_receive21').textbox('setValue','<?=@$number_add?>');      
                        
                        
                        
                                    var  url_='<?=base_url()?>index.php/welcome/number_excellence_receive';
                                    //alert(url_);
                                    
                                      $.post(url_,function(data)
                                        {
                                                var  number_add  =data.number_add;
                                               // alert( number_add );
                                                $('#registration_receive21').textbox('setValue',number_add);  
                                        },'json');
                                      
                                        
                      
                      
                        $('#date1_receive21').datebox('setValue','');                   
                        $('#at_receive21').textbox('setText',''); //เลขที่เอกสาร
                        $('#from_receive21').textbox('setText',''); //จาก       4
                        $('#to_receive21').textbox('setText',''); //ถึง        5
                        $('#subject_receive21').textbox('setText',''); //เรื่อง       6
                        $('#practice_receive21').textbox('setText',''); //การปฏฺิบัติ       7
                        $('#note_receive21').textbox('setText',''); //หมายเหตุ      8
                        $('#id_main1').textbox('setText','');
   
                  }
                  else if(  $('#select_excellence').combobox('getValue') == 2 )
                  {
                      //alert(  $('#select_excellence').combobox('getValue')  );
                      //alert('t');
                      
                                           //$('#dia_insert_send_research').dialog('open');
                                           
                                          // dia_insert_send_excellence
                                          
                                           $('#dia_insert_send_excellence').dialog('open');
                                           
                                           
                       
                                                           
                                                            
                                                            
                                                           
                                      
                                      
                          
                                        
                                        
                                                            
                                                         //   var  add='<?=$number_add_32?>';
                                                       //   $('#registration_send21').textbox('setValue',add);
                                                       
                                                         
                                                         
                                                         
                                                         
                                      var  url_='<?=base_url()?>index.php/welcome/number_excellence_send';
                                      //alert(url_);
                                     
                                      $.post(url_,function(data)
                                        {
                                                var  number_add  =data.number_add;
                                                //alert( number_add );
                                                $('#registration_send21').textbox('setValue',number_add);  
                                        },'json');
                                       
                                                
                                                   
                                                    var  url_='<?=base_url()?>index.php/welcome/number_excellence_receive';
                                                   
                                                         
                                                            $('#date1_send21').datebox('setValue','');  
                                                         
                                                            $('#from_send21').textbox('setText',''); //จาก       4
                                                            $('#to_send21').textbox('setText',''); //ถึง        5
                                                            $('#subject_send21').textbox('setText',''); //เรื่อง       6
                                                            $('#practice_send21').textbox('setText',''); //การปฏฺิบัติ       7
                                                            $('#note_send21').textbox('setText',''); //หมายเหตุ      8
                                                     
                                                          
                                                          
                                                         
                       
                  }
            " >ต่อไป</a>

            <a href="javascript:void(0)" iconCls='icon-cancel' style="margin-left:10px;width:100px;height:40px" class="easyui-linkbutton"  onclick=" javascript: $('#dia_select_excellence').dialog('close');  " >ปิด</a>

       </div>
</div>
<!--  Dialog หนังสือรับหรือหนังสือส่ง -->


<!--  เอกสารรับ   Dialog  การเพิ่ม    ศูนย์การดูแล ฯ  And Excellence   -->
    <div id="dia_insert_excellence"   style="width:400px;height:700px;padding:5px;margin-top:10px;"  iconCls="icon-print"  title=" รายการเอกสารรับ  " class="easyui-dialog"
    data-options="
    closed:true,
    maximizable:true,
    resizable:true,
    modal:true,

    buttons:[


       {
           text:'บันทึก',
           iconCls:'icon-save',
           size:'large',

           handler:function(){
                  //alert('t');

                  $('#f_insert_excellence').form('submit',{
                    url:'<?=base_url()?>index.php/welcome/insert_tb_main1_3/',
                    success:function(data)
                    {

                           //alert(data);
                    
                          if( data == 1)
                          {
                                          
                                         $.messager.alert('สถานะการบันทึกข้อมูลสำเร็จ','สถานะการบันทึกข้อมูลสำเร็จ','info');

                                        $('#registration_receive21').textbox('setText','');
                                         
                                         $('#date1_receive21').datebox('setValue','');  
                                         
                                         
                                         $('#at_receive21').textbox('setText',''); //เลขที่เอกสาร
                                         $('#from_receive21').textbox('setText',''); //จาก       4
                                         $('#to_receive21').textbox('setText',''); //ถึง        5
                                         $('#subject_receive21').textbox('setText',''); //เรื่อง       6
                                         $('#practice_receive21').textbox('setText',''); //การปฏฺิบัติ       7
                                         $('#note_receive21').textbox('setText',''); //หมายเหตุ      8

                                         $('#dia_insert_excellence').dialog('close');
                                         $('#dia_select_excellence').dialog('close');
                                         
                                         

                          }
                          else if( data == 0 )
                          {
                              $('#dia_insert_excellence').dialog('close');
                              $.messager.alert('สถานะการบันทึกข้อมูลผิดพลาด','สถานะการบันทึกข้อมูลผิดพลาด','error');
                              
                              
                                   $('#dia_insert_excellence').dialog('close');
                                    $('#dia_select_excellence').dialog('close');

                          }


                    }
                  });


           }
        },
        {
            text:'แก้ไข',
            iconCls:'icon-edit',
            size:'large',
            handler:function()
              {

                    $('#f_insert_excellence').form('submit',{ 
                     url:'<?=base_url()?>index.php/welcome/update_tb_main1_3/',
                            success:function(data)
                            {
                                     //  alert(data);
                                     
                                     
                          if( data == 1)
                          {

                             $.messager.confirm('แก้ไขข้อมูลสำเร็จ (Success Insert)','คุณต้องการแ้ก้ไขข้อมูลอีกหรือไม่',function(r)
                             {
                                  if(r)
                                  {
                                         $('#registration_receive21').textbox('setText','');
                                         
                                         $('#date1_receive21').datebox('setValue','');  
                                         
                                         
                                         $('#at_receive21').textbox('setText',''); //เลขที่เอกสาร
                                         $('#from_receive21').textbox('setText',''); //จาก       4
                                         $('#to_receive21').textbox('setText',''); //ถึง        5
                                         $('#subject_receive21').textbox('setText',''); //เรื่อง       6
                                         $('#practice_receive21').textbox('setText',''); //การปฏฺิบัติ       7
                                         $('#note_receive21').textbox('setText',''); //หมายเหตุ      8
                                         
                                         
                                         //$('#dia_insert_excellence').dialog('close');
                                       //  $('#dia_select_excellence').datagrid('reload');
                                       
                                       
                                       $('#dia_insert_excellence').dialog('close');
                                       $('#datagrid_excellence').datagrid('reload');
                                       
                                         
                                        // $.messager.progress(); 
                                         
                                     //   location.reload();
                                           
                                       //  $('#dia_insert_excellence').dialog('open');
                                      //  $('#dia_select_excellence').dialog('open'); 
                                  }
                             
                             });


                          }
                          else if( data == 0 )
                          {
                          
                          
                            //$.messager.alert('สถานะการแก้ไขข้อมูล',' แ้ก้ไขข้อมูลผิดพลาด (Error Update!)  ');
                            //$('#registration_receive21').textbox('setText','');
                            $.messager.alert({
                              title:'สถานะการบันทึกข้อมูล',
                              iconCls:'icon-cancel',
                              msg:'บันทึกข้อมูลผิดพลาด (Error Insert)',

                            });
                            
                                $('#dia_insert_excellence').dialog('close');
                                $('#datagrid_excellence').datagrid('reload');
                            
                          }      
                                     
                                     

                            }
               });   
              }
        }
        ,
    {
      text:'ปิด',
      iconCls:'icon-cancel',
      size:'large',
      handler:function()
      {
          //alert('t');

            $('#dia_insert_excellence').dialog('close');

      }
    },

    ]
    "
   >






<form id="f_insert_excellence"  method="post" action="<?=base_url()?>index.php/welcome/insert_tb_main1_3" novalidate="novalidate"    enctype="multipart/form-data" >

             <div style="margin-left:10px;margin-top: 10px;">
                <input class="easyui-textbox"   name="registration_receive21" id="registration_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'เลขรับ'  ,  labelPosition:'top'  ,  required:true, value:'<?=@$number_add?>'    "    />
            </div>

            <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="at_receive21" id="at_receive21"    style="width:70% ; height: 60px;"   data-options=" label:'เลขที่เอกสาร',  labelPosition:'top'  ,  required:false,    "   />
            </div>

             <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-datebox" label="วันที่รับ "  name="date1_receive21"  id="date1_receive21" labelPosition="top" style="width:70%;height:60px"  data-options=" required:true,  ">
            </div>

              <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="from_receive21" id="from_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'จาก'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>

             <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="to_receive21" id="to_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'ถึง'  ,  labelPosition:'top'  ,  required:true,    "   />
            </div>

            <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="subject_receive21" id="subject_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'เรื่อง'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>

           <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="practice_receive21" id="practice_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'การปฏฺิบัติ'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>


             <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="note_receive21" id="note_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'หมายเหตุ'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>

                <div style="margin-left: 10px;margin-top: 10px; ">
                    <input class="easyui-filebox"  id="file21" name="file21" style="width:70%; height: 60px; "   data-options=" label:'แนบ file (ถ้ามี) '  ,  labelPosition:'top'  " />
               </div>

              
                    <div   style="margin-left:10px;margin-top: 10px;"  >
                        <input class="easyui-textbox"   id="id_main1"  name="id_main1"     style="width:40px;height: 40px;"  data-options=" readonly:true,  "    />
                    </div>


</form>



    </div>
<!--  เอกสารรับ   Dialog  การเพิ่ม    ศูนย์การดูแล ฯ  And Excellence   -->



<!-- หนังสือส่งออก   Dialog      ศูนย์การดูแล ฯ  And Excellence  -->
<div   id="dia_insert_send_excellence"  class="easyui-dialog"  style="width:400px;height:600px;padding:5px;margin-top:10px;" 
     data-options="
       closed:true,
       buttons:[ 
           {
                      text:'บันทึก',
                      iconCls:'icon-save',
                      size:'large',
                      handler:function(){
                            $('#f_insert_send_excellence').form('submit',{
                                   url:'<?=base_url()?>index.php/welcome/insert_tb_main1_send_3',
                                   success:function(data)
                                   {
                                                            $('#registration_send21').textbox('setText','');
                                                            $('#date1_send21').datebox('setValue','');  
                                                            $('#from_send21').textbox('setText',''); //จาก       4
                                                            $('#to_send21').textbox('setText',''); //ถึง        5
                                                            $('#subject_send21').textbox('setText',''); //เรื่อง       6
                                                            $('#practice_send21').textbox('setText',''); //การปฏฺิบัติ       7
                                                            $('#note_send21').textbox('setText',''); //หมายเหตุ      8   
  
                                                           //  alert(data);

                                                            if( data == 1 )
                                                            {
                                                                 $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลสำเร็จ','info'); 
                                                                 $('#dia_insert_send_excellence').dialog('close');
                                                                 $('#dia_select_excellence').dialog('close');
                                                                 
                                                                 
                                                            }
                                                            else if( data == 0   )
                                                            {
                                                                  $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลผิดพลาด','error');
                                                                  
                                                                  $('#dia_insert_send_excellence').dialog('close');
                                                                    $('#dia_select_excellence').dialog('close');
                                                                  
                                                            }

                                                           
            
                                   }
                            });
                  
                      },
                      
            },
            
            {
            text:'แก้ไข',
         
            size:'large',
            handler:function()
                    {
                         
                           $('#f_insert_send_excellence').form('submit',{
                             url:'<?=base_url()?>index.php/welcome/update_tb_main1_send_3',
                             success:function(data)
                             {
                                    //alert(data);
                                    if( data == 1 )
                                    {
                                            $.messager.confirm('แก้ไขข้อมูลสำเร็จ (Success Insert)','คุณต้องการแ้ก้ไขข้อมูลอีกหรือไม่',function(r)
                                              {
                                                    if(r)
                                                    {
                                                            $('#registration_send21').textbox('setText','');
                                                            $('#date1_send21').datebox('setValue','');  
                                                          //   $('#to_send21').textbox('setText',''); //เลขที่เอกสาร
                                                            $('#from_send21').textbox('setText',''); //จาก       4
                                                            $('#to_send21').textbox('setText',''); //ถึง        5
                                                            $('#subject_send21').textbox('setText',''); //เรื่อง       6
                                                            $('#practice_send21').textbox('setText',''); //การปฏฺิบัติ       7
                                                            $('#note_send21').textbox('setText',''); //หมายเหตุ      8 
                                                            
                                                            
                                                            $('#dia_insert_send_excellence').dialog('close');
                                                            
                                                            
                                                            $('#datagrid_excellence').datagrid('reload');
                                                            
                                                            
                                                       
                                                    }
                                  
                                               });
                                    }
                                    else if( data==0 )
                                    {
                                                      $.messager.alert('สถานะการแก้ไขข้อมูล',' แ้ก้ไขข้อมูลผิดพลาด (Error Update!)  ','error');
                                                      //$('#registration_receive21').textbox('setText','');
                                                      
                                                         $('#dia_insert_send_excellence').dialog('close');
                                                         
                                    }
                             }
                             
                           });
                          
                    }
            }
            ,
            
            {
                    text:'ปิด',
                    iconCls:'icon-cancel',
                    size:'large',
                    handler:function()
                    {
                        //alert('t');
                          $('#dia_insert_send_excellence').dialog('close');


                    }
            },
            
       
       ]
     "
     iconCls="icon-print"  title=" รายการเอกสารส่ง  "  >
    
    <form id="f_insert_send_excellence"  method="post"  novalidate="novalidate"    enctype="multipart/form-data" >
        
            <div style="margin-left:10px;margin-top: 10px;">
                <input class="easyui-textbox"   id="registration_send21" name="registration_send21"  style="width:70% ; height: 60px;"  data-options=" label:'เลขส่ง'  ,  labelPosition:'top'   "    />
            </div>
        
        
        
        
        
         <div style="margin-left:10px;margin-top: 10px;">
                <input class="easyui-datebox" label="วันที่ส่งออก "   id="date1_send21"  name="date1_send21"   labelPosition="top" style="width:70%;height:60px"  data-options=" required:true,  ">
         </div>
        
          <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"  id="from_send21"  name="from_send21"  style="width:70% ; height: 60px;"  data-options=" label:'จาก'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>
        
         <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"  id="to_send21"  name="to_send21"  style="width:70% ; height: 60px;"  data-options=" label:'ถึง'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>
        
        
         <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"    id="subject_send21"  name="subject_send21"    style="width:70% ; height: 60px;"  data-options=" label:'เรื่อง'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>
        
          <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   id="practice_send21" name="practice_send21"   style="width:70% ; height: 60px;"  data-options=" label:'การปฏิบัติ'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>
        
         <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"  id="note_send21"  name="note_send21"   style="width:70% ; height: 60px;"  data-options=" label:'หมายเหตุ'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>
        
        
           <div style="margin-left: 10px;margin-top: 10px; ">
                    <input class="easyui-filebox"  id="file21"  name="file21"  style="width:70%; height: 60px; "   data-options=" label:'แนบ file (ถ้ามี) '  ,  labelPosition:'top'  " />
            </div>
        
             <div   style="margin-left:10px;margin-top: 10px;"  >
                        <input class="easyui-textbox"   id="id_main1_send_excellence"  name="id_main1_send_excellence"     style="width:40px;height: 40px;"  data-options=" readonly:true,  "    />
             </div>
        
    </form>
</div>

<!-- หนังสือส่งออก   Dialog      ศูนย์การดูแล ฯ  And Excellence  -->

<!--    ----------------------------------END  Excellence -------------------------------------------------------------->