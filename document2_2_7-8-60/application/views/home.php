<!DOCTYPE html>
<html>


<head>

    <title><?=$title?></title>

    <?php   @$this->load->view("import");   ?>

</head>

<!--
<body  onload="javascript:$('#panel_excellence').panel('close');     ">
-->
    <body >

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
                                            <div data-options="iconCls:'icon-large-picture' "  onclick="javascript:  $('#panel_excellence').panel('open'); $('#panel_research').panel('close');   " >ศูนย์การดูแล ฯ And Excellence</div>
                                            <div data-options="iconCls:'icon-large-picture'"  onclick="javascript:  $('#panel_research').panel('open'); $('#panel_excellence').panel('close');    " >ศูนย์วิจัย ฯ</div>
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
                     <div id="panel_excellence" class="easyui-panel" title=" เอกสาร รับ/ส่ง  ศูนย์การดูแล ฯ And Excellence , ค้นหา , เพิ่ม "  iconCls="icon-print"  style="width:400px;height:150px;padding:10px;"  closed="true" >
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
                    
                    
                    <!--  ##-------------      ศูนย์วิจัย ฯ ------------------- ##  -->
                     <div id="panel_research" class="easyui-panel" title=" เอกสาร รับ/ส่ง ศูนย์วิจัย ฯ  , ค้นหา , เพิ่ม "  iconCls="icon-print"  style="width:400px;height:150px;padding:10px;"  closed="true" >
                                <div style="padding:5px 0;">
                                    
                                    <a href="#" class="easyui-linkbutton"  onclick=" javascript: $('#dlg_content_research').dialog('open'); $('#to_research').combogrid('setValue',''); $('#date_research').datebox('setValue',''); "   data-options="iconCls:'icon-large-smartart',size:'large',iconAlign:'top'">ค้นหา</a>
                                    <a href="#" class="easyui-linkbutton"  onclick=" javascript: $('#dia_select_research').dialog('open');  "   data-options="iconCls:'icon-large-chart',size:'large',iconAlign:'top'">เพิ่ม</a>
                                  
                      
                                </div>
                     </div>
                     <!--  ##-------------      ศูนย์วิจัย ฯ ------------------- ##  -->



            </div>



    </div>


        <!--  excellence -->
        <?=$this->load->view("excellence")?>
        <!--  excellence -->
        
        <!-- ศูนย์ฯวิัจัย -->
        <?=$this->load->view("research")?>
         <!-- ศูนย์ฯวิัจัย -->

</body>


</html>
