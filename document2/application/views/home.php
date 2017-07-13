<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="easyui/demo/demo.css">
    <script type="text/javascript" src="easyui/jquery.min.js"></script>
    <script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
</head>


<body>

     <!--
    <h2>Inline Menu</h2>
    <p>The inline menu stays inside its parent container.</p>
      <div style="margin:20px 0;"></div>
  -->


  <div style="margin:5px 0;"></div>

    <div class="easyui-panel" title="รายการหลัก" style="width:150px;">
        <div class="easyui-menu" data-options="inline:true" style="width:100%">

            <div  data-options="iconCls:'icon-save'" onclick="javascript:alert('new')">เอกสารรับ/ส่ง</div>
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

           <div class="menu-sep"></div>
           <div data-options="iconCls:'icon-reload'">Logout</div>

             <!--
            <div>
                <span>Open</span>
                <div style="width:150px;">
                    <div><b>Word</b></div>
                    <div>Excel</div>
                    <div>PowerPoint</div>
                    <div>
                        <span>M1</span>
                        <div style="width:120px;">
                            <div>sub1</div>
                            <div>sub2</div>
                            <div>
                                <span>Sub</span>
                                <div style="width:80px;">
                                    <div onclick="javascript:alert('sub21')">sub21</div>
                                    <div>sub22</div>
                                    <div>sub23</div>
                                </div>
                            </div>
                            <div>sub3</div>
                        </div>
                    </div>
                    <div>
                        <span>Window Demos</span>
                        <div style="width:120px;">
                            <div data-options="href:'window.html'">Window</div>
                            <div data-options="href:'dialog.html'">Dialog</div>
                            <div><a href="http://www.jeasyui.com" target="_blank">EasyUI</a></div>
                        </div>
                    </div>
                </div>
            </div>
          -->

            <!--
            <div data-options="iconCls:'icon-save'">Save</div>
            <div data-options="iconCls:'icon-print',disabled:true">Print</div>
            <div class="menu-sep"></div>


            <div>Exit</div>
          -->


        </div>
    </div>
</body>


</html>
