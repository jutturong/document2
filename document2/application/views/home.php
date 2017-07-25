<!DOCTYPE html>
<html>


<head>
    <title><?=$title?></title>

    <?php   @$this->load->view("import");   ?>

</head>


<body  onload="javascript:$('#panel_excellence').panel('close');   ">

    <div style="margin:0px 0 0px 0;"></div>
    <div class="easyui-panel" title="<?=$title?>" style="width:700px;height:500px;padding:10px;">
        <div class="easyui-layout" data-options="fit:true">
            <div data-options="region:'west',split:true" style="width:200px;padding:10px">
                <!-- Menu -->
                  <!--<div style="margin:5px 0;"></div>-->

                    <div class="easyui-panel" title="รายการหลัก" style="width:170px;">
                        <div class="easyui-menu" data-options="inline:true" style="width:100%">

                            <!--<div  data-options="iconCls:'icon-save'" >เอกสารรับ/ส่ง</div>-->
                             <div  data-options="iconCls:'layout-button-right' " >
                                       <span> เอกสารรับ/ส่ง </span>
                                       <div style="width:300px;">
                                            <div data-options="iconCls:'icon-large-picture' "  onclick="javascript:  $('#panel_excellence').panel('open');   " >ศูนย์การดูแล ฯ And Excellence</div>
                                            <div data-options="iconCls:'icon-large-picture'" >ศูนย์วิจัย ฯ</div>
                                            <div data-options="iconCls:'icon-large-picture'" >มูลนิธิตะวันฉาย ฯ</div>
                                       </div>
                             </div>



                           <div class="menu-sep"></div>

                           <div data-options=" iconCls:'layout-button-right'  ">
                              <span >ใบลา</span>
                                  <div style="width:300px;">
                                      <div data-options="iconCls:'icon-ok' ">ใบลาป่วย/ลาคลอดบตุร/ลากิจส่วนตัว</div>
                                      <div data-options="iconCls:'icon-ok' ">สรุปการลาพักผ่อน/ลาป่วยภายในหน่วยงาน</div>

                                  </div>
                           </div>

                            <div data-options="  iconCls:'icon-ok'  ">
                                  ตารางงาน
                            </div>

                           <div class="menu-sep"  ></div>
                           <div data-options="iconCls:'icon-reload'" onclick=" javascript: window.location.href='<?=base_url()?>index.php/welcome/index/'; " >Logout (ออกจากระบบ)</div>

                        </div>
                    </div>
                <!-- Menu -->



            </div>


            <!--
            <div data-options="region:'east'" style="width:100px;padding:10px">
                Right Content
            </div>
          -->


            <div data-options="region:'center'" style="padding:10px">



                     <!-- ######################### Excellence #######################-->
                     <div id="panel_excellence" class="easyui-panel" title=" เอกสาร รับ/ส่ง , ค้นหา , เพิ่ม "  iconCls="icon-print"  style="width:400px;height:150px;padding:10px;"  close="true" >
                                <div style="padding:5px 0;">
                                    <a href="#" class="easyui-linkbutton"  onclick=" javascript: $('#dlg_content_excellence').dialog('open'); $('#to').combogrid('setValue',''); $('#date').datebox('setValue',''); "   data-options="iconCls:'icon-large-smartart',size:'large',iconAlign:'top'">ค้นหา</a>
                                    <a href="#" class="easyui-linkbutton"  onclick=" javascript: $('#dia_select_excellence').dialog('open');  "   data-options="iconCls:'icon-large-chart',size:'large',iconAlign:'top'">เพิ่ม</a>
                                    <!--
                                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-large-shapes',size:'large',iconAlign:'top'">Shapes</a>
                                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-large-smartart',size:'large',iconAlign:'top'">SmartArt</a>
                                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-large-chart',size:'large',iconAlign:'top'">Chart</a>
                                  -->
                                </div>
                     </div>
                    <!-- ######################### Excellence #######################-->




            </div>



    </div>






<!--  Dialog ศูนย์การดูแล ฯ  And Excellence -->
<div id="dlg_content_excellence" class="easyui-dialog" title="ศูนย์การดูแล ฯ And Excellence"
data-options="iconCls:'icon-print' , closed:true,  "
style="width:400px;height:500px;padding:10px">



      <!--  <form id="f_search_excellence" method="post" action="<?=base_url()?>index.php/welcome/search_excellence/"  enctype="multipart/form-data" > -->
        <form id="f_search_excellence"  method="post"   novalidate="novalidate"    enctype="multipart/form-data" >



            <div style="margin-bottom:10px">

<select class="easyui-combobox" name="type_document" id="type_document" label="ประเภท" labelPosition="top" style="width:50%;height:60px">
    <option value="1">เอกสารรับ</option>
    <option value="2">เอกสารส่ง</option>
</select>

            </div>


<!--  ของ -->
<div style="margin-bottom:10px">
        <input class="easyui-combogrid"  id="to"  required="true"  name="to"  labelPosition="left"  style="width:80%;height:60px"
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

                    <input class="easyui-datebox" label="วันที่/เดือน/ปี "  name="date"  id="date" labelPosition="top" style="width:80%;height:60px">
            </div>






        </form>
        <div style="text-align:center;padding:5px 0">


              <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search',size:'large',iconAlign:'left' "  onclick="
                 javascript:

               var   type_document= $('#type_document').val() ;
               var   date=$('#date').val();
               var   to= $('#to').val();

                  if(   type_document  > 0  &&  to != ''  )    	//type_document  1 เอกสารรับ   2 เอกสารส่ง
                          {
                              if(   type_document == 1 )
                              {
                                  $('#dia_datagrid_excellence').dialog({ title:'เอกสารรับ'  });
                              }
                              else if(    type_document == 2  )
                              {
                                  $('#dia_datagrid_excellence').dialog({ title:'เอกสารส่ง'  });
                               }

                               $('#dia_datagrid_excellence').dialog('open');
                              // $('#dia_datagrid_excellence').dialog({ title:'test' });


                                  $.ajax({
                                 type:'POST',
                                 data:$('#f_search_excellence').serialize(),
                                 url:'<?=base_url()?>index.php/welcome/search_excellence/',
                                 dataType:'json'}).done(function(data)
                                          {

                                              //   $('#dia_datagrid_excellence').dialog('open');

                                                 $('#datagrid_excellence').datagrid('loadData',data);
                                           });




                          }


              " >Search(ค้นหา)</a>





              <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel',size:'large',iconAlign:'left'"
                 onclick="javascript:
                        $('#to').combogrid('setValue','');
                        $('#date').datebox('setValue','');
                        $('#dlg_content_excellence').dialog('close');


                        ">Close(ปิด)</a>





        </div>
    </div>





</div>







<!--  Dialog  การค้นหา  ศูนย์การดูแล ฯ  And Excellence   -->
    <div id="dia_datagrid_excellence"  iconCls="icon-print"   class="easyui-dialog"
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
             $('#dia_datagrid_excellence').dialog('close');

      }
    }]
    "
    style="width:700px;height:400px;" >


           <div  id="datagrid_excellence"
                 data-options="
                 url:'<?=base_url()?>index.php/welcome/json_excellence',
                 columns:[[

                                   { field:'ck',checkbox:true, },
                                   { field:'registration',title:'เลขส่ง',align:'left'  },
                                   { field:'at',title:'เลขที่เอกสาร',align:'left' },
                                   { field:'date',title:'วันที่',align:'left' },
                                   {  field:'from',title:'จาก',align:'left' },
                                    {  field:'to',title:'ของ', align:'left' },
                                    {  field:'subject',title:'เรื่อง',align:'left' },
                 ]],
                 toolbar:[
                     //{  text:'Refresh' ,iconCls:'icon-reload',handler:function(){  $('#datagrid_excellence').datagrid('reload');  }   },
                    {  text:'Export',iconCls:'icon-print',size:'large',handler:function()
                           {
                                // alert('t');
                               //  window.open( '<?=base_url()?>index.php/welcome/export_data/' +  $('#f_search_excellence').serialize()  , 'PopUp', 'width=100,height=100' );
                                //   window.open( '<?=base_url()?>index.php/welcome/export_data/' +  $('#f_search_excellence').serialize()  );
                                // type_record =>3,
                                window.open( '<?=base_url()?>index.php/welcome/export_data/'+  '3'  +  '/'  +  $('#type_document').combobox('getValue')  +  '/'    +    $('#to').combogrid('getValue') + '/' + $('#date').datebox('getValue')   );




                            }
                     }
                 ]

                 "
                 class="easyui-datagrid"  style="width:680px;height:300px"       />

    </div>
<!--  Dialog  การค้นหา  ศูนย์การดูแล ฯ  And Excellence   -->

<!--  Dialog หนังสือรับหรือหนังสือส่ง -->
<div class="easyui-dialog" data-options="closed:true"  id="dia_select_excellence"  iconCls="icon-search"  title="ประเภทเอกสาร รับ/ส่ง" style="width:400px;height:120px;padding:5px" >

       <div  style="margin-top:5px;margin-left:20px;"  >
            <input class="easyui-combobox" id="select_excellence" style="width:100px;height:60px;" data-options="
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
                  // $('#dia_insert_excellence').dialog('open');

                  if( $('#select_excellence').combobox('getValue') == 1   )
                  {
                      //alert(   $('#select_excellence').combobox('getValue')  );
                       $('#dia_insert_excellence').dialog('open');
                  }

            " >ต่อไป</a>

            <a href="javascript:void(0)" iconCls='icon-cancel' style="margin-left:10px;width:100px;height:40px" class="easyui-linkbutton"  onclick=" javascript: $('#dia_select_excellence').dialog('close');  "  >Close(ปิด)</a>

       </div>
</div>
<!--  Dialog หนังสือรับหรือหนังสือส่ง -->


<!--  เอกสารรับ   Dialog  การเพิ่ม    ศูนย์การดูแล ฯ  And Excellence   -->
    <div id="dia_insert_excellence"   style="width:400px;height:720px;padding:5px;margin-top:10px;"  iconCls="icon-print"  title=" รายการเอกสารรับ  " class="easyui-dialog"
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
                          //$registration_receive21
                          //$('#registration_receive21').textbox('setValue','<?=@$number_add?>');

                          // alert(data);
                          if( data == 1)
                          {
                            //$.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลแล้ว ( Success Insert )');
                             $.messager.alert({
                               title:'สถานะการบันทึกข้อมูล',
                               iconCls:'icon-ok',
                               msg:'บันทึกข้อมูลสำเร็จ (Success Insert)',
                               fn:function()
                                 {
                                   $('#registration_receive21').textbox('setText','');
                                   location.reload();
                                 }
                             });
                          }
                          else if( data == 0 )
                          {
                            //$.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลแล้ว ( Success Insert )');
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




</form>



    </div>
<!--  เอกสารรับ   Dialog  การเพิ่ม    ศูนย์การดูแล ฯ  And Excellence   -->



</body>


</html>
