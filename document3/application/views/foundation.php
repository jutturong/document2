<div id="dlg_content_foundation" class="easyui-dialog" title="มูลนิธิตะวันฉาย ฯ "
data-options="iconCls:'icon-print' , closed:true,  "
style="width:400px;height:350px;padding:10px">

    <form id="f_search_foundation"  method="post"   novalidate="novalidate"    enctype="multipart/form-data" >



            <div style="margin-bottom:10px">

                <select    class="easyui-combobox"  required="true"   name="type_document_foundation" id="type_document_foundation" 
                           
                                data-options="
               onSelect:function()
               {

                   var  url ='<?=base_url()?>index.php/welcome/json_to_foundation/' +  $('#type_document_foundation').combobox('getValue');
                   //alert( url );
                   //$('#to').combobox('reload', url  );

               }
            "
                           
                           label="ประเภท" labelPosition="top" style="width:50%;height:60px">
    <option value="1">เอกสารรับ</option>
    <option value="2">เอกสารส่ง</option>
</select>

</div>


<!--  ของ -->
<div style="margin-bottom:10px">
    
    
    <!--
    <input class="easyui-combogrid"   type="autoCompleteBox"    id="to_foundation"     name="to_foundation"  labelPosition="left"  style="width:80%;height:60px"
                  data-options="
                  //   url:'<?=base_url()?>index.php/welcome/json_to',
                  
                    url:'<?=base_url()?>index.php/welcome/json_to_foundation' + '/' +  $('#type_document_foundation').combobox('getValue')  ,
                    
                    mode: 'remote',
                     method:'post',
                     //valueField:'id_academic',
                     //textField:'firstname_academic',
                     idField:'to',
                     textField:'to',
                     panelHeight:'auto',
                     labelPosition:'top',
                     fitColumns:true,
                     label:'ของ',
                     labelPosition:'top',
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
               
               id="to_foundation"     name="to_foundation"   style="widht:40px;height: 60px;"    />
    
    
 </div>


<!--
<div style="margin-bottom:10px">
                  <input class="easyui-textbox" label="เรื่อง:" labelPosition="top" style="width:90%;height:60px">
            </div>


            <div style="margin-bottom:10px">
                  <input class="easyui-textbox" label="จาก/ถึง" labelPosition="top" style="width:90%;height:60px">
            </div>
-->


            <div style="margin-bottom:10px">

                <input class="easyui-datebox"    label="วันที่/เดือน/ปี "  name="date_foundation"  id="date_foundation" labelPosition="top" style="width:80%;height:60px">
            </div>


        </form>



    <div style="text-align:center;padding:5px 0">


              <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search',size:'large',iconAlign:'left' "  onclick="
                 javascript:

               var   type_document= $('#type_document_foundation').val() ;
               var   date=$('#date_foundation').val();
                var   to= $('#to_foundation').val();

                 //  alert( type_document + '**' +  date  );
                  // alert( type_document   );
                //  alert( date   );


                  if(   type_document  > 0   )    	//type_document  1 เอกสารรับ   2 เอกสารส่ง
                         {

                              if(   type_document == 1 )
                              {
                                  $('#dia_datagrid_foundation').dialog({ title:'เอกสารรับ  มูลนิธิตะวันฉาย ฯ '  });
                              }
                              else if(    type_document == 2  )
                              {
                                  $('#dia_datagrid_foundation').dialog({ title:'เอกสารส่ง  มูลนิธิตะวันฉาย ฯ '  });
                               }


                                 /*
                                  $.ajax({
                                 type:'POST',
                                 data:$('#f_search_foundation').serialize(),
                                 url:'<?=base_url()?>index.php/welcome/search_foundation',
                                 dataType:'json'}).done(function(data)
                                          {

                                                  // alert(data);
                                                       $('#dia_datagrid_foundation').dialog('open');
                                                       $('#datagrid_foundation').datagrid('loadData',data);
                                           });
                               */
                                  
                                  var  url='<?=base_url()?>index.php/welcome/search_foundation2';
                                 $.ajax({
                                 type:'POST',
                                 data:$('#f_search_foundation').serialize(),
                                 url:url,
                                 
                                 dataType:'json'
                                // dataType:'text',
                             
                                  }).done(function(data)
                                          {

                                                    // alert(data);
                                                  
                                                      
                                                       $('#dia_datagrid_foundation').dialog('open');
                                                       $('#datagrid_foundation').datagrid('loadData',data);
                                                      
                                                       
                                           });




                               



                          }


              "  style="width: 80px;height: 40px;"  >ค้นหา</a>

              <a href="javascript:void(0)"  iconCls="icon-man"  size="large"  class="easyui-linkbutton"  onclick="
                   javascript:
                           
                          $('#type_document_foundation').combobox('setValue','') ;
                          $('#to_foundation').textbox('setValue','');
                          $('#date_foundation').datebox('setValue','');
                          
                           
                 "  style="width: 80px;height: 40px;"   >ล้าง</a>



              <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel',size:'large',iconAlign:'left'"
                 onclick="javascript:

                       // $('#to_foundation').combogrid('setValue','');
                      //   $('#date_foundation').datebox('setValue','');
                        //$('#dlg_content_foundation').dialog('close');
                        
                        $('#dlg_content_foundation').dialog('close');


                        "  style="width: 80px;height: 40px;"  >ปิด</a>






</div>
    
    
    
    
   <!--  Dialog  การค้นหา  AND  datagrid  -->
    <div id="dia_datagrid_foundation"  iconCls="icon-print"    class="easyui-dialog"
    data-options="
    closed:true,
    maximizable:true,
    resizable:true,
    buttons:[{
      text:'ปิด',
      iconCls:'icon-cancel',
      size:'large',
      handler:function()
      {
          
             $('#dia_datagrid_foundation').dialog('close');

      }
    }]
    "
    style="width:700px;height:400px;" >


           <div  id="datagrid_foundation"   class="easyui-datagrid"
                 data-options="
                 url:'<?=base_url()?>index.php/welcome/json_foundation',
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
                     //{  text:'Refresh' ,iconCls:'icon-reload',handler:function(){  $('#datagrid_foundation').datagrid('reload');  }   },
                    {  text:'ส่งออก',iconCls:'icon-print',size:'large',handler:function()
                           {

                               // window.open( '<?=base_url()?>index.php/welcome/export_data/'+  '1'  +  '/'  +  $('#type_document_foundation').combobox('getValue')  +  '/'    +    $('#to_foundation').combogrid('getValue') + '/' + $('#date_foundation').datebox('getValue')   );
                           
                                var  to  =     $('#to_foundation').combogrid('getValue');
                                var  date  =  $('#date_foundation').datebox('getValue');
                                
                                 if(  to == ''  &&  date == '' )
                                    {
                                    //ไม่ระบุอะไรเลย
                                  
                                      var  url= '<?=base_url()?>index.php/welcome/export_data1/'+  '1'  +  '/'  +   $('#type_document_foundation').combobox('getValue');
                                     }
                                     
                                else if(  to == ''  &&  date != ''    )
                                    {
                                   //ระบุแค่วันที่
                                     var  url= '<?=base_url()?>index.php/welcome/export_data2/'+  '1'  +  '/'  +  $('#type_document_foundation').combobox('getValue')  + '/'  +   date;
                                    } 
                                    
                                    else if(    to != ''  &&  date == ''    )
                                   {
                                   //ระบุแค่ชื่อ
                                    var  url= '<?=base_url()?>index.php/welcome/export_data3/'+  '1'  +  '/'  +  $('#type_document_foundation').combobox('getValue') + '/'  +   to;
                                   }
                                   
                                   else if(   to != ''  &&  date != ''   )
                                   {
                                    //ระบุทั้งชื่อและวันที่
                                   var  url = '<?=base_url()?>index.php/welcome/export_data/'+  '1'  +  '/'  +   $('#type_document_foundation').combobox('getValue')  +  '/'    +   to  + '/' +  date; 
                                   }
                                   
                                    window.open(url);
                               
                           },

                     },
                     {
                        text:'ดาวน์โหลด',iconCls:'icon-large-picture',size:'lagre',handler:function()
                         {
                              var  row=$('#datagrid_foundation').datagrid('getSelected');
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
                        text:'แก้ไขข้อมูล', size:'large'  ,iconCls:'icon-edit',handler:function()
                         {
                              var  row=$('#datagrid_foundation').datagrid('getSelected');
                              var  id_main1=row.id_main1;
                              //   $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง

                              //หนังสือรับ
                              //alert(id_main1);
                              
                              
                               if(  id_main1 >  0  &&  row.type_document == 1  )
                               {
                                        
                                    
                                      
                                          
                                          $('#dia_insert_foundation').dialog('open');
                                          $('#registration_foundation_receive21').textbox('setValue',row.registration); //เลขรับ
                                          $('#at_foundation_receive21').textbox('setValue',row.at);  //เลขที่เอกสาร
                                          $('#date1_foundation_receive21').datebox('setValue','');
                                          
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
                                               $('#date1_foundation_receive21').datebox('setValue',dmy_conv ); //วันที่รับ
                                               
                                           }
                                           
                                           
                                           $('#from_foundation_receive21').textbox('setValue',row.from);  //'จาก'
                                           $('#to_foundation_receive21').textbox('setValue',row.to); //ถึง
                                           $('#subject_foundation_receive21').textbox('setValue',row.subject); //'เรื่อง
                                           $('#practice_foundation_receive21').textbox('setValue',row.practice);  //การปฏฺิบัติ
                                           $('#note_foundation_receive21').textbox('setValue',row.note); //หมายเหตุ
                                       
                                           $('#id_main1_foundation').textbox('setValue',row.id_main1);
                                          

                               }
                               else if( id_main1 >  0  &&  row.type_document == 2  )  //หนังสือส่ง
                               {
                                     //alert('หนังสือส่ง');
                                     //dia_insert_send_foundation
                                     $('#dia_insert_send_foundation').dialog('open');

                                      //alert(row.registration);
                                     
                                         $('#registration_send21_foundation').textbox('setValue', row.registration );

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
                                              $('#date1_send21_foundation').datebox('setValue',dmy_conv ); //วันที่รับ
                                           }
                                           else
                                           {
                                              $('#date1_send21_foundation').datebox('setValue','' ); //วันที่รับ
                                           }

                                              $('#from_send21_foundation').textbox('setValue',row.from); //จาก
                                              $('#to_send21_foundation').textbox('setValue',row.to); //ถึง
                                              $('#subject_send21_foundation').textbox('setValue',row.subject); //เรื่อง       6
                                              $('#practice_send21_foundation').textbox('setValue',row.practice); //การปฏฺิบัติ       7
                                              $('#note_send21_foundation').textbox('setValue',row.note); //หมายเหตุ      8

                                              $('#id_main1_send_foundation').textbox('setValue',row.id_main1);

                               }

                          }
                     },
                     {
                        text:'ลบข้อมูล',  iconCls:'icon-cancel',size:'large',handler:function()
                                {
                                        var  row=$('#datagrid_foundation').datagrid('getSelected');

                                       $.messager.confirm('Delete Date Status','คุณแน่ใจว่าต้องการลบข้อมูล',function(r){

                                       if( r )
                                       {
                                                   // $.messager.progress();

                                                    if( row.id_main1 > 0 )
                                                    {

                                                          //alert(row.id_main1);
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

                                                                    //$('#datagrid_foundation').datagrid('reload');
                                                                      location.reload();


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
<!--  Dialog  การค้นหา  AND  datagrid  -->



<!--  Dialog หนังสือรับหรือหนังสือส่ง -->
<div class="easyui-dialog" data-options="closed:true"  id="dia_select_foundation"  iconCls="icon-search"  title="ประเภทเอกสาร มูลนิธิตะวันฉาย ฯ  รับ/ส่ง" style="width:400px;height:120px;padding:5px" >

       <div  style="margin-top:5px;margin-left:20px;"  >
            <input class="easyui-combobox" id="select_foundation" style="width:100px;height:60px;" data-options="
                 showItemIcon:true,
                 data:[
                     { value:'1',text:'รับ',iconCls:'icon-edit',size:'large' },
                     { value:'2',text:'ส่ง',iconCls:'icon-print',size:'large' },
                 ],
                 editable:false,
                 panelHeight:'auto',
                 label:'ประเภทของเอกสาร',
                 labelPosition:'top',

            "   />
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok"  style="margin-left:10px;width:80px;height:40px" onclick="
               javascript:
                  // $('#dia_insert_foundation').dialog('open');

                  if( $('#select_foundation').combobox('getValue') == 1   )
                  {
                      
                      
                      /*
                       $('#dia_insert_foundation').dialog('open');

                        $('#registration_foundation_receive21').textbox('setValue','<?=@$number_add_21?>');
                     

                        $('#date1_receive21').datebox('setValue','');
                        $('#at_receive21').textbox('setText',''); //เลขที่เอกสาร
                        $('#from_receive21').textbox('setText',''); //จาก       4
                        $('#to_receive21').textbox('setText',''); //ถึง        5
                        $('#subject_receive21').textbox('setText',''); //เรื่อง       6
                        $('#practice_receive21').textbox('setText',''); //การปฏฺิบัติ       7
                        $('#note_receive21').textbox('setText',''); //หมายเหตุ      8
                        $('#id_main1').textbox('setText','');
                        */
                           
                            
                                                $('#dia_insert_foundation').dialog('open'); 
                                                
                                                
                                               // $('#registration_foundation_receive21').textbox('setValue','<?=@$number_add_11?>');
                                                
                                                
                                                var  url_='<?=base_url()?>index.php/welcome/number_foundation_receive';
                                      //alert(url_);
                                     
                                      $.post(url_,function(data)
                                        {
                                                var  number_add  =data.number_add;
                                               // alert( number_add );
                                                $('#registration_foundation_receive21').textbox('setValue',number_add);  
                                        },'json');
                                                
                                                
                                                $('#at_foundation_receive21').textbox('setValue','');  //เลขที่เอกสาร
                                                $('#date1_foundation_receive21').datebox('setValue','');
                                                $('#from_foundation_receive21').textbox('setValue','');  //'จาก'
                                                $('#to_foundation_receive21').textbox('setValue',''); //ถึง
                                                $('#subject_foundation_receive21').textbox('setValue',''); //'เรื่อง
                                                $('#practice_foundation_receive21').textbox('setValue','');  //การปฏฺิบัติ
                                                $('#note_foundation_receive21').textbox('setValue',''); //หมายเหตุ
                                                 $('#id_main1_foundation').textbox('setValue',''); 
                                                 
                                                 
                        
                        

                  }
                  else if(  $('#select_foundation').combobox('getValue') == 2 )
                  {
                      //alert(  $('#select_foundation').combobox('getValue')  );
                      //alert('t');

                                                           /*
                                                            $('#dia_insert_send_foundation').dialog('open');

                                                            $('#registration_send21_foundation').textbox('setValue','<?=@$number_add_22?>');
                                                            $('#date1_send21_foundation').datebox('setValue','');    //date1_send21_foundation

                                                            $('#from_send21_foundation').textbox('setText',''); //จาก       4  //from_send21_foundation
                                                            $('#to_send21_foundation').textbox('setText',''); //ถึง        5    //to_send21_foundation
                                                            $('#subject_send21_foundation').textbox('setText',''); //เรื่อง       6    //subject_send21_foundation
                                                            $('#practice_send21_foundation').textbox('setText',''); //การปฏฺิบัติ       7    //practice_send21_foundation
                                                            $('#note_send21_foundation').textbox('setText',''); //หมายเหตุ      8    //note_send21_foundation
                                                           */

                                               

                                            $('#dia_insert_send_foundation').dialog('open');
                                            
                                            
                                         //   $('#registration_send21_foundation').textbox('setValue','<?=@$number_add_12?>');
                                            
                                            
                                              var  url_='<?=base_url()?>index.php/welcome/number_foundation_send';
                                      //alert(url_);
                                     
                                      $.post(url_,function(data)
                                        {
                                                var  number_add  =data.number_add;
                                               // alert( number_add );
                                                $('#registration_send21_foundation').textbox('setValue',number_add);  
                                        },'json');
                                            
                                            
                                            
                                             $('#date1_send21_foundation').datebox('setValue','');    //date1_send21_foundation
                                            $('#from_send21_foundation').textbox('setText',''); //จาก       4
                                            $('#to_send21_foundation').textbox('setText',''); //ถึง        5
                                            $('#subject_send21_foundation').textbox('setText',''); //เรื่อง       6
                                            $('#practice_send21_foundation').textbox('setText',''); //การปฏฺิบัติ       7
                                            $('#note_send21_foundation').textbox('setText',''); //หมายเหตุ      8
                                            
                                            
                                            
                  }
            " >ต่อไป</a>

            <a href="javascript:void(0)" iconCls='icon-cancel' style="margin-left:10px;width:100px;height:40px" class="easyui-linkbutton"  onclick=" javascript: $('#dia_select_foundation').dialog('close');  "  >ปิด</a>

       </div>
</div>
<!--  Dialog หนังสือรับหรือหนังสือส่ง -->





<!--  Dialog  หนังสือรับ + form -->
<div id="dia_insert_foundation"   style="width:400px;height:700px;padding:5px;margin-top:10px;"  iconCls="icon-print"  title=" รายการเอกสารรับ  " class="easyui-dialog"
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

                  $('#f_insert_foundation').form('submit',{
                    url:'<?=base_url()?>index.php/welcome/insert_send_foundation/',
                    success:function(data)
                    {
                          //$registration_receive21
                          //  $('#registration_receive21').textbox('setValue','<?=@$number_add_21?>');

                         //  alert(data);

                          if( data == 1)
                          {

                               $.messager.alert('บันทึกข้อมูลสำเร็จ','สถานะการบันทึกข้อมูลสำเร็จ','info');
                             
                             
                                         $('#registration_foundation_receive21').textbox('setText','');  //registration_foundation_receive21

                                         $('#date1_foundation_receive21').datebox('setValue','');

                                         $('#at_foundation_receive21').textbox('setText',''); //เลขที่เอกสาร
                                         $('#from_foundation_receive21').textbox('setText',''); //จาก       4
                                         $('#to_foundation_receive21').textbox('setText',''); //ถึง        5
                                         $('#subject_foundation_receive21').textbox('setText',''); //เรื่อง       6
                                         $('#practice_foundation_receive21').textbox('setText',''); //การปฏฺิบัติ       7
                                         $('#note_foundation_receive21').textbox('setText',''); //หมายเหตุ      8

                                          $('#dia_insert_foundation').dialog('close');
                                       //   $('#dia_select_foundation').dialog('close');   
                                          
                             


                          }
                          else if( data == 0 )
                          {
                          
                          
                           $.messager.alert('บันทึกข้อมูลผิดพลาด','สถานะการบันทึกข้อมูลผิดพลาด','error');
                            
                      
                            
                            
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

                    $('#f_insert_foundation').form('submit',{
                     url:'<?=base_url()?>index.php/welcome/update_send_foundation/',
                            success:function(data)
                            {
                                     //alert(data);
                                    
                                    
                                     
                                    if( data == 1)
                                    {
                                        $.messager.confirm('แก้ไขข้อมูลสำเร็จ (Success Insert)','คุณต้องการแ้ก้ไขข้อมูลอีกหรือไม่',function(r)
                                        {
                                                 if(r)
                                                    {
                                                    
                                                    

                                                           $('#registration_foundation_receive21').textbox('setText','');
                                                           $('#date1_foundation_receive21').datebox('setValue','');
                                                           $('#at_foundation_receive21').textbox('setText',''); //เลขที่เอกสาร
                                                           $('#from_foundation_receive21').textbox('setText',''); //จาก       4
                                                           $('#to_foundation_receive21').textbox('setText',''); //ถึง        5
                                                           $('#subject_foundation_receive21').textbox('setText',''); //เรื่อง       6
                                                           $('#practice_foundation_receive21').textbox('setText',''); //การปฏฺิบัติ       7
                                                           $('#note_foundation_receive21').textbox('setText',''); //หมายเหตุ      8


                                                           $.messager.progress();
                                                           
                                                           location.reload();
                                                           
                                                           
                                                           
                                                           
                                                           
                                                           
                                                           
                                                         //  $('#dia_insert_excellence').dialog('open');
                                                        //  $('#dia_select_excellence').dialog('open');
                                                        
                                                        
                                                        /*
                                                         $('#dia_insert_foundation').dialog('open');
                                          $('#registration_foundation_receive21').textbox('setValue',row.registration); //เลขรับ
                                          $('#at_foundation_receive21').textbox('setValue',row.at);  //เลขที่เอกสาร
                                          $('#date1_foundation_receive21').datebox('setValue','');
                                          
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
                                               $('#date1_foundation_receive21').datebox('setValue',dmy_conv ); //วันที่รับ
                                               
                                           }
                                           
                                           
                                           $('#from_foundation_receive21').textbox('setValue',row.from);  //'จาก'
                                           $('#to_foundation_receive21').textbox('setValue',row.to); //ถึง
                                           $('#subject_foundation_receive21').textbox('setValue',row.subject); //'เรื่อง
                                           $('#practice_foundation_receive21').textbox('setValue',row.practice);  //การปฏฺิบัติ
                                           $('#note_foundation_receive21').textbox('setValue',row.note); //หมายเหตุ
                                       
                                           $('#id_main1_foundation').textbox('setValue',row.id_main1);
                                                        
                                                        */
                                                        
                                                        

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

                                       $.messager.progress();
                                       location.reload();


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

             $('#dia_insert_foundation').dialog('close');
      }
    },

    ]
    "
   >






<form id="f_insert_foundation"  method="post" action="<?=base_url()?>index.php/welcome/insert_send_foundation" novalidate="novalidate"    enctype="multipart/form-data" >

             <div style="margin-left:10px;margin-top: 10px;">
                 <input class="easyui-textbox"   name="registration_foundation_receive21" id="registration_foundation_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'เลขรับ'  ,  labelPosition:'top'  ,  required:true, readonly:true    "   value="<?=@$number_add_11?>"  />
            </div>

            <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="at_foundation_receive21" id="at_foundation_receive21"    style="width:70% ; height: 60px;"   data-options=" label:'เลขที่เอกสาร',  labelPosition:'top'  ,  required:false,    "   />
            </div>

             <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-datebox" label="วันที่รับ "  name="date1_foundation_receive21"  id="date1_foundation_receive21" labelPosition="top" style="width:70%;height:60px"  data-options=" required:true,  ">
            </div>

              <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="from_foundation_receive21" id="from_foundation_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'จาก'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>

             <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="to_foundation_receive21" id="to_foundation_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'ถึง'  ,  labelPosition:'top'  ,  required:true,    "   />
            </div>

            <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="subject_foundation_receive21" id="subject_foundation_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'เรื่อง'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>

           <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="practice_foundation_receive21" id="practice_foundation_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'การปฏฺิบัติ'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>


             <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="note_foundation_receive21" id="note_foundation_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'หมายเหตุ'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>

                <div style="margin-left: 10px;margin-top: 10px; ">
                    <input class="easyui-filebox"  id="file21_foundation" name="file21_foundation" style="width:70%; height: 60px; "   data-options=" label:'แนบ file (ถ้ามี) '  ,  labelPosition:'top'  " />
               </div>


                    <div   style="margin-left:10px;margin-top: 10px;"  >
                        <input class="easyui-textbox"   id="id_main1_foundation"  name="id_main1_foundation"     style="width:40px;height: 40px;"  data-options=" readonly:true,  "    />
                    </div>


</form>



    </div>
<!--  Dialog  หนังสือรับ + form -->




<!-- หนังสือส่ง -- >
<!-- หนังสือส่งออก   Dialog      ศูนย์การดูแล ฯ  And Excellence  -->
<div   id="dia_insert_send_foundation"  class="easyui-dialog"  style="width:400px;height:600px;padding:5px;margin-top:10px;"
     data-options="
       closed:true,
       buttons:[
           {
                      text:'บันทึก',
                      iconCls:'icon-save',
                      size:'large',
                      handler:function(){
                            $('#f_insert_foundation_send').form('submit',{
                                   url:'<?=base_url()?>index.php/welcome/insert_tb_main1_send_foundation',
                                   success:function(data)
                                   {
                                   
                                          //alert(data);
                                          
                                         
                                       if( data == 1 )
                                       {  
                                       
                                       
                                                         $.messager.alert('สถานะการบันทึกข้อมูลสำเร็จ','สถานะการบันทึกข้อมูลสำเร็จ','info');
                                                
                                                
                                                
                                                            $('#date1_send21_foundation').datebox('setText','');
                                                         
                                                          
                                                            $('#from_send21_foundation').textbox('setText',''); //จาก       4
                                                            $('#to_send21_foundation').textbox('setText',''); //ถึง        5
                                                            $('#subject_send21_foundation').textbox('setText',''); //เรื่อง       6
                                                            $('#practice_send21_foundation').textbox('setText',''); //การปฏฺิบัติ       7
                                                            $('#note_send21_foundation').textbox('setText',''); //หมายเหตุ      8

                                                             //   $('#dia_select_foundation').dialog('close'); 
                                                                 $('#dia_insert_send_foundation').dialog('close');
                                                                 
                                                                 
                                                                 
                                                
                                           }
                                           else{
                                           
                                                     $.messager.alert('สถานะการบันทึกข้อมูลผิดพลาด','สถานะการบันทึกข้อมูลผิดพลาด','error');
                                               
                                           }
                                              
                                                
                                                
                                   }
                            });

                      },

            },
            {
            text:'แก้ไข',
            iconCls:'icon-edit',
            size:'large',
            handler:function()
                    {
                           //alert('t');
                           
                           
                           $('#f_insert_foundation_send').form('submit',{
                             url:'<?=base_url()?>index.php/welcome/update_send_foundation2',
                             success:function(data)
                             {
                                   //alert(data);

                                    
                                    if( data == 1 )
                                    {
                                            $.messager.confirm('แก้ไขข้อมูลสำเร็จ (Success Insert)','คุณต้องการแ้ก้ไขข้อมูลอีกหรือไม่',function(r)
                                              {
                                                    if(r)
                                                    {
                                                            $('#date1_send21_foundation').datebox('setText','');
                                                          //   $('#to_send21').textbox('setText',''); //เลขที่เอกสาร
                                                          
                                                            $('#from_send21_foundation').textbox('setText',''); //จาก       4
                                                            $('#to_send21_foundation').textbox('setText',''); //ถึง        5
                                                            $('#subject_send21_foundation').textbox('setText',''); //เรื่อง       6
                                                            $('#practice_send21_foundation').textbox('setText',''); //การปฏฺิบัติ       7
                                                            $('#note_send21_foundation').textbox('setText',''); //หมายเหตุ      8
                                                            $.messager.progress(); 
                                                            location.reload();
                                                    }

                                               });
                                    }
                                    else if( data==0 )
                                    {
                                                       //$.messager.alert('สถานะการแก้ไขข้อมูล',' แ้ก้ไขข้อมูลผิดพลาด (Error Update!)  ');
                                                      //$('#registration_receive21').textbox('setText','');
                                                      $.messager.alert({
                                                        title:'สถานะการบันทึกข้อมูล',
                                                        iconCls:'icon-cancel',
                                                        msg:'บันทึกข้อมูลผิดพลาด (Error Insert)',

                                                      });
                                    }
                                    
                                    
                                    
                             }

                           });

                    }
            },
            {
                    text:'ปิด',
                    iconCls:'icon-cancel',
                    size:'large',
                    handler:function()
                    {
                        //alert('t');
                          $('#dia_insert_send_foundation').dialog('close');


                    }
            },


       ]
     "
     iconCls="icon-print"  title=" รายการเอกสารส่ง  "  >

    <form id="f_insert_foundation_send"  method="post"  novalidate="novalidate"    enctype="multipart/form-data" >

            <div style="margin-left:10px;margin-top: 10px;">
                <input class="easyui-textbox"   id="registration_send21_foundation" name="registration_send21_foundation"  style="width:70% ; height: 60px;"  data-options=" label:'เลขส่ง'  ,  labelPosition:'top'  ,  required:false,  "   />
            </div>

         <div style="margin-left:10px;margin-top: 10px;">
                <input class="easyui-datebox" label="วันที่ส่งออก "   id="date1_send21_foundation"  name="date1_send21_foundation"   labelPosition="top" style="width:70%;height:60px"  data-options=" required:true,  ">
         </div>

          <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"  id="from_send21_foundation"  name="from_send21_foundation"  style="width:70% ; height: 60px;"  data-options=" label:'จาก'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>

         <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"  id="to_send21_foundation"  name="to_send21_foundation"  style="width:70% ; height: 60px;"  data-options=" label:'ถึง'  ,  labelPosition:'top'  ,  required:true,    "   />
          </div>


         <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"    id="subject_send21_foundation"  name="subject_send21_foundation"    style="width:70% ; height: 60px;"  data-options=" label:'เรื่อง'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>

          <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   id="practice_send21_foundation" name="practice_send21_foundation"   style="width:70% ; height: 60px;"  data-options=" label:'การปฏิบัติ'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>

         <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"  id="note_send21_foundation"  name="note_send21_foundation"   style="width:70% ; height: 60px;"  data-options=" label:'หมายเหตุ'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>


           <div style="margin-left: 10px;margin-top: 10px; ">
                    <input class="easyui-filebox"  id="file21_send21_foundation"  name="file21_send21_foundation"  style="width:70%; height: 60px; "   data-options=" label:'แนบ file (ถ้ามี) '  ,  labelPosition:'top'  " />
            </div>

             <div   style="margin-left:10px;margin-top: 10px;"  >
                        <input class="easyui-textbox"   id="id_main1_send_foundation"  name="id_main1_send_foundation"     style="width:40px;height: 40px;"  data-options=" readonly:true,  "    />
             </div>

    </form>
</div>

<!-- หนังสือส่งออก   Dialog      ศูนย์การดูแล ฯ  And Excellence  -->
