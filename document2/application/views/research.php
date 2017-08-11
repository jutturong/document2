<div id="dlg_content_research" class="easyui-dialog" title="ศูนย์วิจัย ฯ "
data-options="iconCls:'icon-print' , closed:true,  "
style="width:400px;height:500px;padding:10px">

    <form id="f_search_research"  method="post"   novalidate="novalidate"    enctype="multipart/form-data" >



            <div style="margin-bottom:10px">

                <select    class="easyui-combobox"  required="true"   name="type_document_research" id="type_document_research" label="ประเภท" labelPosition="top" style="width:50%;height:60px">
    <option value="1">เอกสารรับ</option>
    <option value="2">เอกสารส่ง</option>
</select>

            </div>


<!--  ของ -->
<div style="margin-bottom:10px">
    <input class="easyui-combogrid"  id="to_research"   name="to_research"  labelPosition="left"  style="width:80%;height:60px"
                  data-options="
                     url:'<?=base_url()?>index.php/welcome/json_to',
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
 </div>




            <div style="margin-bottom:10px">
                  <input class="easyui-textbox" label="เรื่อง:" labelPosition="top" style="width:90%;height:60px">
            </div>


            <div style="margin-bottom:10px">
                  <input class="easyui-textbox" label="จาก/ถึง" labelPosition="top" style="width:90%;height:60px">
            </div>

            <div style="margin-bottom:10px">

                <input class="easyui-datebox"    label="วันที่/เดือน/ปี "  name="date_research"  id="date_research" labelPosition="top" style="width:80%;height:60px">
            </div>


        </form>



    <div style="text-align:center;padding:5px 0">


              <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search',size:'large',iconAlign:'left' "  onclick="
                 javascript:

               var   type_document= $('#type_document_research').val() ;
               var   date=$('#date_research').val();
                var   to= $('#to_research').val();

                 //  alert( type_document + '**' +  date  );
                  // alert( type_document   );
                //  alert( date   );


                  if(   type_document  > 0   )    	//type_document  1 เอกสารรับ   2 เอกสารส่ง
                         {

                              if(   type_document == 1 )
                              {
                                  $('#dia_datagrid_research').dialog({ title:'เอกสารรับ  ศูนย์วิจัย ฯ '  });
                              }
                              else if(    type_document == 2  )
                              {
                                  $('#dia_datagrid_research').dialog({ title:'เอกสารส่ง  ศูนย์วิจัย ฯ '  });
                               }



                                  $.ajax({
                                 type:'POST',
                                 data:$('#f_search_research').serialize(),
                                 url:'<?=base_url()?>index.php/welcome/search_research',
                                 dataType:'json'}).done(function(data)
                                          {

                                                  // alert(data);
                                                       $('#dia_datagrid_research').dialog('open');
                                                       $('#datagrid_research').datagrid('loadData',data);
                                           });




                                /*
                                                       $.ajax({
                                 type:'POST',
                                 data:$('#f_search_research').serialize(),
                                 url:'<?=base_url()?>index.php/welcome/search_research',
                                 dataType:'text'}).done(function(data)
                                          {

                                                   //alert(data);
                                                   // $('#dia_datagrid_research').dialog('open');
                                                   // $('#datagrid_research').datagrid('loadData',data);
                                           });
                                           */



                          }


              " >Search(ค้นหา)</a>





              <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel',size:'large',iconAlign:'left'"
                 onclick="javascript:

                        $('#to_research').combogrid('setValue','');
                         $('#date_research').datebox('setValue','');
                        $('#dlg_content_research').dialog('close');


                        ">Close(ปิด)</a>






</div>





    <!--  Dialog  การค้นหา  ศูนย์การดูแล ฯ  And Excellence   -->
    <div id="dia_datagrid_research"  iconCls="icon-print"    class="easyui-dialog"
    data-options="
    closed:true,
    maximizable:true,
    resizable:true,
    buttons:[{
      text:'Close(ปิด)',
      iconCls:'icon-cancel',

      handler:function()
      {
          //alert('t');
             // $('#to').combobox('setValue')='';
             $('#dia_datagrid_research').dialog('close');

      }
    }]
    "
    style="width:700px;height:400px;" >


           <div  id="datagrid_research"   class="easyui-datagrid"
                 data-options="
                 url:'<?=base_url()?>index.php/welcome/json_research',
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
                     //{  text:'Refresh' ,iconCls:'icon-reload',handler:function(){  $('#datagrid_research').datagrid('reload');  }   },
                    {  text:'Export',iconCls:'icon-print',size:'large',handler:function()
                           {

                                window.open( '<?=base_url()?>index.php/welcome/export_data/'+  '2'  +  '/'  +  $('#type_document_research').combobox('getValue')  +  '/'    +    $('#to_research').combogrid('getValue') + '/' + $('#date_research').datebox('getValue')   );
                            },

                     },
                     {
                        text:'Download file',iconCls:'icon-large-picture',size:'lagre',handler:function()
                         {
                              var  row=$('#datagrid_research').datagrid('getSelected');
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
                        text:'Edit(แก้ไขข้อมูล)', size:'large'  ,iconCls:'icon-edit',handler:function()
                         {
                              var  row=$('#datagrid_research').datagrid('getSelected');
                              var  id_main1=row.id_main1;
                              //   $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง

                              //หนังสือรับ
                               if(  id_main1 >  0  &&  row.type_document == 1  )
                               {
                                      //alert(id_main1);




                                         $('#dia_insert_research').dialog('open');
                                         $('#registration_research_receive21').textbox('setValue',row.registration); //เลขรับ
                                         $('#at_research_receive21').textbox('setValue',row.at);  //เลขที่เอกสาร
                                         $('#date1_research_receive21').datebox('setValue','');

                                         //alert(row.date);

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
                                               $('#date1_research_receive21').datebox('setValue',dmy_conv ); //วันที่รับ
                                               //   $('#date1_research_receive21').datebox('setValue','');
                                           }


                                           $('#from_research_receive21').textbox('setValue',row.from);  //'จาก'
                                           $('#to_research_receive21').textbox('setValue',row.to); //ถึง
                                           $('#subject_research_receive21').textbox('setValue',row.subject); //'เรื่อง
                                           $('#practice_research_receive21').textbox('setValue',row.practice);  //การปฏฺิบัติ
                                           $('#note_research_receive21').textbox('setValue',row.note); //หมายเหตุ
                                         //  $('#id_research_main1').textbox('setValue',row.id_main1); // id
                                           $('#id_main1_research').textbox('setValue',row.id_main1);


                               }
                               else if( id_main1 >  0  &&  row.type_document == 2  )  //หนังสือส่ง
                               {
                                     //alert('หนังสือส่ง');
                                     //dia_insert_send_research
                                     $('#dia_insert_send_research').dialog('open');

                                      //alert(row.registration);
                                     
                                         $('#registration_send21_research').textbox('setValue', row.registration );

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
                                              $('#date1_send21_research').datebox('setValue',dmy_conv ); //วันที่รับ
                                           }
                                           else
                                           {
                                              $('#date1_send21_research').datebox('setValue','' ); //วันที่รับ
                                           }

                                              $('#from_send21_research').textbox('setValue',row.from); //จาก
                                              $('#to_send21_research').textbox('setValue',row.to); //ถึง
                                              $('#subject_send21_research').textbox('setValue',row.subject); //เรื่อง       6
                                              $('#practice_send21_research').textbox('setValue',row.practice); //การปฏฺิบัติ       7
                                              $('#note_send21_research').textbox('setValue',row.note); //หมายเหตุ      8

                                              $('#id_main1_send_research').textbox('setValue',row.id_main1);

                               }

                          }
                     },
                     {
                        text:'Delete (ลบข้อมูล)',  iconCls:'icon-cancel',size:'large',handler:function()
                                {
                                        var  row=$('#datagrid_research').datagrid('getSelected');

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

                                                                    //$('#datagrid_research').datagrid('reload');
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
<!--  Dialog  การค้นหา  ศูนย์การดูแล ฯ  And Excellence   -->




<!--  Dialog หนังสือรับหรือหนังสือส่ง -->
<div class="easyui-dialog" data-options="closed:true"  id="dia_select_research"  iconCls="icon-search"  title="ประเภทเอกสาร ศูนย์วิจัย ฯ  รับ/ส่ง" style="width:400px;height:120px;padding:5px" >

       <div  style="margin-top:5px;margin-left:20px;"  >
            <input class="easyui-combobox" id="select_research" style="width:100px;height:60px;" data-options="
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
                  // $('#dia_insert_research').dialog('open');

                  if( $('#select_research').combobox('getValue') == 1   )
                  {
                      //alert(   $('#select_research').combobox('getValue')  );
                       $('#dia_insert_research').dialog('open');

                        $('#registration_research_receive21').textbox('setValue','<?=@$number_add_21?>');
                      //registration_research_receive21

                        $('#date1_receive21').datebox('setValue','');
                        $('#at_receive21').textbox('setText',''); //เลขที่เอกสาร
                        $('#from_receive21').textbox('setText',''); //จาก       4
                        $('#to_receive21').textbox('setText',''); //ถึง        5
                        $('#subject_receive21').textbox('setText',''); //เรื่อง       6
                        $('#practice_receive21').textbox('setText',''); //การปฏฺิบัติ       7
                        $('#note_receive21').textbox('setText',''); //หมายเหตุ      8
                        $('#id_main1').textbox('setText','');

                  }
                  else if(  $('#select_research').combobox('getValue') == 2 )
                  {
                      //alert(  $('#select_research').combobox('getValue')  );
                      //alert('t');

                                           $('#dia_insert_send_research').dialog('open');


                                                            //$('#registration_send21_research').textbox('setText','');    //registration_send21_research
                                                            $('#registration_send21_research').textbox('setValue','<?=@$number_add_22?>');
                                                            $('#date1_send21_research').datebox('setValue','');    //date1_send21_research

                                                            $('#from_send21_research').textbox('setText',''); //จาก       4  //from_send21_research
                                                            $('#to_send21_research').textbox('setText',''); //ถึง        5    //to_send21_research
                                                            $('#subject_send21_research').textbox('setText',''); //เรื่อง       6    //subject_send21_research
                                                            $('#practice_send21_research').textbox('setText',''); //การปฏฺิบัติ       7    //practice_send21_research
                                                            $('#note_send21_research').textbox('setText',''); //หมายเหตุ      8    //note_send21_research


                                                            //
                                                            //
                                                          //  location.reload();

                                           //registration_receive21



                  }
            " >ต่อไป</a>

            <a href="javascript:void(0)" iconCls='icon-cancel' style="margin-left:10px;width:100px;height:40px" class="easyui-linkbutton"  onclick=" javascript: $('#dia_select_research').dialog('close');  "  >Close(ปิด)</a>

       </div>
</div>
<!--  Dialog หนังสือรับหรือหนังสือส่ง -->




<!--  เอกสารรับ   Dialog  การเพิ่ม    ศูนย์การดูแล ฯ  And Excellence   -->
    <div id="dia_insert_research"   style="width:400px;height:700px;padding:5px;margin-top:10px;"  iconCls="icon-print"  title=" รายการเอกสารรับ  " class="easyui-dialog"
    data-options="
    closed:true,
    maximizable:true,
    resizable:true,
    modal:true,

    buttons:[


       {
           text:'Insert (บันทึก)',
           iconCls:'icon-save',
           size:'large',

           handler:function(){
                  //alert('t');

                  $('#f_insert_research').form('submit',{
                    url:'<?=base_url()?>index.php/welcome/insert_tb_main1_2/',
                    success:function(data)
                    {
                          //$registration_receive21
                          //  $('#registration_receive21').textbox('setValue','<?=@$number_add_21?>');

                           //alert(data);



                          if( data == 1)
                          {
                             $.messager.confirm('บันทึกข้อมูลสำเร็จ (Success Insert)','บันทึกข้อมูลแล้ว คุณต้องการบันทึกข้อมูลอีกหรือไม่',function(r)
                             {
                                  if(r)
                                  {
                                         $('#registration_research_receive21').textbox('setText','');  //registration_research_receive21

                                         $('#date1_research_receive21').datebox('setValue','');


                                         $('#at_research_receive21').textbox('setText',''); //เลขที่เอกสาร
                                         $('#from_research_receive21').textbox('setText',''); //จาก       4
                                         $('#to_research_receive21').textbox('setText',''); //ถึง        5
                                         $('#subject_research_receive21').textbox('setText',''); //เรื่อง       6
                                         $('#practice_research_receive21').textbox('setText',''); //การปฏฺิบัติ       7
                                         $('#note_research_receive21').textbox('setText',''); //หมายเหตุ      8


                                         location.reload();
                                       //  $('#dia_insert_excellence').dialog('open');
                                      //  $('#dia_select_excellence').dialog('open');
                                  }

                             });


                          }
                          else if( data == 0 )
                          {
                            //$.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลผิดพลาด ( Error  Insert )');
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
            text:'Update (แก้ไข)',
            iconCls:'icon-edit',
            size:'large',
            handler:function()
              {

                    $('#f_insert_research').form('submit',{
                     url:'<?=base_url()?>index.php/welcome/update_tb_main1_2/',
                            success:function(data)
                            {
                                    // alert(data);
                                    if( data == 1)
                                    {
                                        $.messager.confirm('แก้ไขข้อมูลสำเร็จ (Success Insert)','คุณต้องการแ้ก้ไขข้อมูลอีกหรือไม่',function(r)
                                        {
                                                 if(r)
                                                    {

                                                           $('#registration_research_receive21').textbox('setText','');
                                                           $('#date1_research_receive21').datebox('setValue','');
                                                           $('#at_research_receive21').textbox('setText',''); //เลขที่เอกสาร
                                                           $('#from_research_receive21').textbox('setText',''); //จาก       4
                                                           $('#to_research_receive21').textbox('setText',''); //ถึง        5
                                                           $('#subject_research_receive21').textbox('setText',''); //เรื่อง       6
                                                           $('#practice_research_receive21').textbox('setText',''); //การปฏฺิบัติ       7
                                                           $('#note_research_receive21').textbox('setText',''); //หมายเหตุ      8


                                                           $.messager.progress();
                                                           location.reload();
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

                                       $.messager.progress();
                                       location.reload();


                                    }

                            }
               });
              }
        }
        ,
    {
      text:'Close(ปิด)',
      iconCls:'icon-cancel',
      size:'large',
      handler:function()
      {

             $('#dia_insert_research').dialog('close');
      }
    },

    ]
    "
   >






<form id="f_insert_research"  method="post" action="<?=base_url()?>index.php/welcome/insert_tb_main1_3" novalidate="novalidate"    enctype="multipart/form-data" >

             <div style="margin-left:10px;margin-top: 10px;">
                 <input class="easyui-textbox"   name="registration_research_receive21" id="registration_research_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'เลขรับ'  ,  labelPosition:'top'  ,     "   value="<?=@$number_add_21?>"  />
            </div>

            <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="at_research_receive21" id="at_research_receive21"    style="width:70% ; height: 60px;"   data-options=" label:'เลขที่เอกสาร',  labelPosition:'top'  ,  required:false,    "   />
            </div>

             <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-datebox" label="วันที่รับ "  name="date1_research_receive21"  id="date1_research_receive21" labelPosition="top" style="width:70%;height:60px"  data-options=" required:true,  ">
            </div>

              <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="from_research_receive21" id="from_research_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'จาก'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>

             <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="to_research_receive21" id="to_research_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'ถึง'  ,  labelPosition:'top'  ,  required:true,    "   />
            </div>

            <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="subject_research_receive21" id="subject_research_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'เรื่อง'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>

           <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="practice_research_receive21" id="practice_research_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'การปฏฺิบัติ'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>


             <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   name="note_research_receive21" id="note_research_receive21"  style="width:70% ; height: 60px;"  data-options=" label:'หมายเหตุ'  ,  labelPosition:'top'  ,  required:false,    "   />
            </div>

                <div style="margin-left: 10px;margin-top: 10px; ">
                    <input class="easyui-filebox"  id="file21_research" name="file21_research" style="width:70%; height: 60px; "   data-options=" label:'แนบ file (ถ้ามี) '  ,  labelPosition:'top'  " />
               </div>


                    <div   style="margin-left:10px;margin-top: 10px;"  >
                        <input class="easyui-textbox"   id="id_main1_research"  name="id_main1_research"     style="width:40px;height: 40px;"  data-options=" readonly:true,  "    />
                    </div>


</form>



    </div>
<!--  เอกสารรับ   Dialog  การเพิ่ม    ศูนย์การดูแล ฯ  And Excellence   -->



<!-- หนังสือส่ง -- >
<!-- หนังสือส่งออก   Dialog      ศูนย์การดูแล ฯ  And Excellence  -->
<div   id="dia_insert_send_research"  class="easyui-dialog"  style="width:400px;height:600px;padding:5px;margin-top:10px;"
     data-options="
       closed:true,
       buttons:[
           {
                      text:'Insert (บันทึก)',
                      iconCls:'icon-save',
                      size:'large',
                      handler:function(){
                            $('#f_insert_research_send').form('submit',{
                                   url:'<?=base_url()?>index.php/welcome/insert_tb_main1_send_research',
                                   success:function(data)
                                   {
                                          //alert(data);
                                          
                                          
                                       if( data == 1 )
                                       {  
                                            $.messager.confirm('บันทึกข้อมูลสำเร็จ (Success Insert)','คุณต้องการบันทึกข้อมูลอีกหรือไม่',function(r)
                                                {
                                                     if(r)
                                                     {

                                                        
                                                            $('#registration_send21_research').textbox('setValue','<?=@$number_add_22?>');
                                                            
                                                           
                                                            $('#date1_send21_research').datebox('setText','');
                                                          //   $('#to_send21').textbox('setText',''); //เลขที่เอกสาร
                                                          
                                                            $('#from_send21_research').textbox('setText',''); //จาก       4
                                                            $('#to_send21_research').textbox('setText',''); //ถึง        5
                                                            $('#subject_send21_research').textbox('setText',''); //เรื่อง       6
                                                            $('#practice_send21_research').textbox('setText',''); //การปฏฺิบัติ       7
                                                            $('#note_send21_research').textbox('setText',''); //หมายเหตุ      8
                                                            location.reload();
                                                           //  $('#dia_insert_excellence').dialog('open');
                                                          //  $('#dia_select_excellence').dialog('open');
                                                          

                                                     }
                                                     
                                                });
                                           }
                                                
                                                
                                                
                                   }
                            });

                      },

            },
            {
            text:'Update (แก้ไข)',
            iconCls:'icon-edit',
            size:'large',
            handler:function()
                    {
                           //alert('t');
                           $('#f_insert_research_send').form('submit',{
                             url:'<?=base_url()?>index.php/welcome/update_send_research',
                             success:function(data)
                             {
                                   // alert(data);

                                    
                                    if( data == 1 )
                                    {
                                            $.messager.confirm('แก้ไขข้อมูลสำเร็จ (Success Insert)','คุณต้องการแ้ก้ไขข้อมูลอีกหรือไม่',function(r)
                                              {
                                                    if(r)
                                                    {
                                                            $('#date1_send21_research').datebox('setText','');
                                                          //   $('#to_send21').textbox('setText',''); //เลขที่เอกสาร
                                                          
                                                            $('#from_send21_research').textbox('setText',''); //จาก       4
                                                            $('#to_send21_research').textbox('setText',''); //ถึง        5
                                                            $('#subject_send21_research').textbox('setText',''); //เรื่อง       6
                                                            $('#practice_send21_research').textbox('setText',''); //การปฏฺิบัติ       7
                                                            $('#note_send21_research').textbox('setText',''); //หมายเหตุ      8
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
                    text:'Close(ปิด)',
                    iconCls:'icon-cancel',
                    size:'large',
                    handler:function()
                    {
                        //alert('t');
                          $('#dia_insert_send_research').dialog('close');


                    }
            },


       ]
     "
     iconCls="icon-print"  title=" รายการเอกสารส่ง  "  >

    <form id="f_insert_research_send"  method="post"  novalidate="novalidate"    enctype="multipart/form-data" >

            <div style="margin-left:10px;margin-top: 10px;">
                <input class="easyui-textbox"   id="registration_send21_research" name="registration_send21_research"  style="width:70% ; height: 60px;"  data-options=" label:'เลขส่ง'  ,  labelPosition:'top'  ,  required:false,  "   />
            </div>

         <div style="margin-left:10px;margin-top: 10px;">
                <input class="easyui-datebox" label="วันที่รับ "   id="date1_send21_research"  name="date1_send21_research"   labelPosition="top" style="width:70%;height:60px"  data-options=" required:true,  ">
         </div>

          <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"  id="from_send21_research"  name="from_send21_research"  style="width:70% ; height: 60px;"  data-options=" label:'จาก'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>

         <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"  id="to_send21_research"  name="to_send21_research"  style="width:70% ; height: 60px;"  data-options=" label:'ถึง'  ,  labelPosition:'top'  ,  required:true,    "   />
          </div>


         <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"    id="subject_send21_research"  name="subject_send21_research"    style="width:70% ; height: 60px;"  data-options=" label:'เรื่อง'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>

          <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"   id="practice_send21_research" name="practice_send21_research"   style="width:70% ; height: 60px;"  data-options=" label:'การปฏิบัติ'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>

         <div style="margin-left: 10px;margin-top: 10px; ">
               <input class="easyui-textbox"  id="note_send21_research"  name="note_send21_research"   style="width:70% ; height: 60px;"  data-options=" label:'หมายเหตุ'  ,  labelPosition:'top'  ,  required:false,    "   />
          </div>


           <div style="margin-left: 10px;margin-top: 10px; ">
                    <input class="easyui-filebox"  id="file21_send21_research"  name="file21_send21_research"  style="width:70%; height: 60px; "   data-options=" label:'แนบ file (ถ้ามี) '  ,  labelPosition:'top'  " />
            </div>

             <div   style="margin-left:10px;margin-top: 10px;"  >
                        <input class="easyui-textbox"   id="id_main1_send_research"  name="id_main1_send_research"     style="width:40px;height: 40px;"  data-options=" readonly:true,  "    />
             </div>

    </form>
</div>

<!-- หนังสือส่งออก   Dialog      ศูนย์การดูแล ฯ  And Excellence  -->
