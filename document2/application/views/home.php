<!DOCTYPE html>
<html>


<head>
    <title><?=$title?></title>


    <?php   @$this->load->view("import");   ?>


</head>


<body  onload="javascript:$('#panel_excellence').panel('close')">

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
                                    <a href="#" class="easyui-linkbutton"  onclick=" javascript: $('#dlg_content_excellence').dialog('open');  "   data-options="iconCls:'icon-large-smartart',size:'large',iconAlign:'top'">ค้นหา</a>
                                    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-large-chart',size:'large',iconAlign:'top'">เพิ่ม</a>
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


<div style="margin-bottom:10px">
        <input class="easyui-combogrid"  labelPosition="left"  style="width:50%;height:60px"
                  data-options="
                     url:'<?=base_url()?>index.php/welcome/json_academic',
                     method:'post',
                     //valueField:'id_academic',
                     //textField:'firstname_academic',
                     idField:'id_academic',
                     textField:'firstname_academic',
                     panelHeight:'auto',
                     labelPosition:'top',
                     fitColumns:true,
                     label:'ของ',
                     labelPosition:'top',
                     columns:[[
                      // { field:'pre_academic',title:'คำนำหน้า',width:'80px'  },
                       { field:'firstname_academic',title:'ชื่อ',width:'100px' },
                       { field:'lastname_academic',title:'นามสกุล',width:'100px' },
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



                               $.ajax({
                                 type:'POST',
                                 data:$('#f_search_excellence').serialize(),
                                 url:'<?=base_url()?>index.php/welcome/search_excellence/',
                                 dataType:'json',
                                // contentType:'application/json',
                                 success:function(data)
                                 {
                                        // $('#dia_datagrid_excellence').dialog('open');
                                        // $('#datagrid_excellence').datagrid('loadData',data);


                                        //alert(data);
                                        $.each(data,function(v,k)
                                        {
                                                //alert(k.registration);
                                                // var  registration=k.registration;

                                                 $('#dia_datagrid_excellence').dialog('open');


                                              //   $('#datagrid_excellence').datagrid('loadData',data);
                                              /*
                                              $('#datagrid_excellence').datagrid('load',{
                                                at:k.at,

                                              });
                                              */

                                               $('#datagrid_excellence').datagrid({
                                                 columns:[[
                                                     {  field: k.at , },
                                                 ]]
                                               });


                                        });





                                 }

                               });




/*

                          if( $('#type_document').val() == 1  )  	// type_document  1 เอกสารรับ   2 เอกสารส่ง
                          {

                               $('#datagrid_excellence').datagrid({

                                url:'<?=base_url()?>index.php/welcome/search_excellence/' + $('#type_document').val() + '/'  +  $('#date').val() ,
                                method:'post',

                                 columns:[[
                                     { field:'ck',checkbox:true, },
                                     { field:'registration',title:'เลขรับ',align:'left'  },
                                     { field:'at',title:'เลขที่เอกสาร',align:'left' },
                                     { field:'date',title:'วันที่',align:'left' },
                                     {  field:'from',title:'จาก',align:'left' },
                                     {  field:'subject',title:'เรื่อง',align:'left' },
                                 ]]
                               });
                           }
                           else if(   $('#type_document').val() == 2   ) 	// type_document  1 เอกสารรับ   2 เอกสารส่ง
                           {

                             $('#datagrid_excellence').datagrid({
                              url:'<?=base_url()?>index.php/welcome/search_excellence/' + $('#type_document').val() + '/'  +  $('#date').val() ,
                              method:'post',

                               columns:[[
                                   { field:'ck',checkbox:true, },
                                   { field:'registration',title:'เลขส่ง',align:'left'  },
                                   { field:'at',title:'เลขที่เอกสาร',align:'left' },
                                   { field:'date',title:'วันที่',align:'left' },
                                   {  field:'from',title:'จาก',align:'left' },
                                    {  field:'subject',title:'เรื่อง',align:'left' },
                               ]]
                             });

                           }

*/





/*
                              var  url = '<?=base_url()?>index.php/welcome/search_excellence/';
                              $.getJSON(url, $('#f_search_excellence').serialize()  ,
                              function(data)
                              {
                                    var  data=data;
                                    //alert(data);
                                    $('#dia_datagrid_excellence').dialog('open');


                                    $.each(data,function(v,k){
                                        //alert(k.registration);

                                          $('#datagrid_excellence').datagrid({
                                            data:[
                                               { registration:k.registration  }
                                            ]
                                          });


                                    });


                              }
                              );

  */


              " >Search(ค้นหา)</a>





              <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel',size:'large',iconAlign:'left'"
                 onclick="javascript:
                       $('#dlg_content_excellence').dialog('close');

                        ">Close(ปิด)</a>


<!--
        <input type="submit" class="easyui-linkbutton"  value="Search(ค้นหา)"  ></input>
      -->

            <!--
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()" style="width:80px">Submit</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Clear</a>
          -->
        </div>
    </div>

    <script>
          $(function(){
              //alert('t');


          });
    </script>



</div>
<!--  Dialog ศูนย์การดูแล ฯ  And Excellence -->

<!--  Datagrid  ศูนย์การดูแล ฯ  And Excellence   -->
    <div id="dia_datagrid_excellence"  iconCls="icon-print"  title=" รายการเอกสาร รับ/ส่ง  " class="easyui-dialog"
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
            $('#dia_datagrid_excellence').dialog('close');

      }
    }]
    "
    style="width:700px;height:600px;" >


          <!--
           <div  id="datagrid_excellence" class="easyui-datagrid" style="width:680px;" accesskey="
                 data-options="
                      url:'<?=base_url()?>index.php/welcome/json_excellence',
                      method:'post',
                      columns:[[
                              {  field:'registration',title:'registration' }

                      ]]
                 "
           "  ></div>
         -->

         <div  id="datagrid_excellence"   />

<!--
         <table id="datagrid_excellence" class="easyui-datagrid" style="width:600px;height:250px"
         url="<?=base_url()?>index.php/welcome/json_excellence" toolbar="#tb"
         title="Load Data" iconCls="icon-save"
         rownumbers="true" pagination="true">
     <thead>
         <tr>
             <th field="registration" width="80"  width="80" align="right" >Item ID</th>
             <th field="at" width="80"  width="80" align="right">Product ID</th>



         </tr>
     </thead>
 </table>
-->




    </div>
<!--  Datagrid  ศูนย์การดูแล ฯ  And Excellence   -->


</body>


</html>
