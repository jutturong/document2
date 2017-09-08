<!-- dia หน้าหลัก ลาพักผ่อนประจำปี -->
<div  id="dia_sick"  title=" ใบลาป่วย/ลาคลอดบตุร/ลากิจส่วนตัว "  class="easyui-dialog"  
      data-options=" closed:true 
      ,iconCls:'icon-print' 
      ,modal:'true' 
      ,buttons:[
         { text:'Close(ปิด)',iconCls:'icon-cancel',size:'large',iconAlign:'right',handler:function()
                {  
                     $('#dia_sick').dialog('close');  
                }  
         }
      ]
      "  style="width:300px;height: 200px;  "   >
    
    <div style="margin-left: 15px ;margin-top: 15px;">
        
        <a href="#"  onclick="javascript: alert('t');  "  class="easyui-linkbutton" data-options=" iconCls:'icon-large-chart'  ,size:'large' , iconAlign:'top'  "   >ยืนใบลา</a>  
        
        <a href="#"  onclick="
            javascript: 
                    
          // alert('t');  
           $('#dia_main_sick').dialog('open');
           
           
           "  class="easyui-linkbutton"  data-options=" iconCls:'icon-large-shapes'  ,size:'large',  iconAlign:'top'  "  >แสดงผล</a>
     
        
    </div>
    
          
    
</div>
<!-- dia หน้าหลัก ลาพักผ่อนประจำปี -->




<!-- datagrid  หลัก ในการลาทั้งหมด -->
<div  class="easyui-dialog"   id="dia_main_sick" 
      style="width:520px;height: 400px;"
      data-options=" closed:true, title:'หน้าหลักลาพักผ่อนประจำปี' 
       ,maximizable:false
       ,minimizable:true
      ,iconCls:'icon-large-shapes' 
      ,collapsible:false
      ,buttons:[
      
        { text:'Close(ปิด)',  iconCls:'icon-cancel' ,iconAlign:'top',handler:function(){   $('#dia_main_sick').dialog('close'); }  },
        
      ]
      
      "  >
          
                 <!-- datagird  ลาพักผ่อน -->
                 <div  class="easyui-datagrid"  id="datagrid_sick"
                       data-options="
                       
                          url:'<?=base_url()?>index.php/welcome/json_sick',
                          rownumbers:true,
                          singleSelect:true,
                          columns:[[
                          
                            {  field:'first_name', title:'ชื่อ',align:'left',    },
                            {  field:'last_name',title:'นามสกุล', align: 'left' ,    },
                            {  field:'total_sick',title:'ลาป่วยทั้งหมด',align:'left',    },
                            {  field:'total_sick_person',title:'ลากิจทั้งหมด',align:'left',    },
                            {  field:'total_sick_person',title:'ลาคลอดบุตรทั้้้งหมด',align:'left', width:200   },
                             
                             
                          ]],
                          toolbar:[
                          
                            { text:'Reload', iconAlign:'top'   , iconCls:'icon-reload',handler:function(){ $('#datagrid_sick').datagrid('reload'); }   },
                            { text:'Edit (แก้ไข)',  iconAlign:'top' ,  iconCls:'icon-edit',handler:function(){      } },
                             { text:'Delete (ลบ)',   iconAlign:'top'  , iconCls:'icon-cancel',handler:function(){   } },
                             {  text:'Search (ค้นหา)' , iconAlign:'top',iconCls:'icon-search',handler:function(){  alert('t'); }  },
                             {  text:'Report (ออกรายงาน)',iconAlign:'top',iconCls:'icon-print',handler:function()
                                   {
                                        
                                          var  row=$('#datagrid_sick').datagrid('getSelected');
                                          if( row )
                                          {
                                                  
                                                   var  id_sick=row.id_sick;
                                                   //$.messager.progress({ value:100, });
                                                  // alert(id_sick);
                                                    var  url='<?=base_url()?>report_pdf/docdb/report_sick.php?id_sick='  + id_sick   ;
                                                 //location.href=url;
                                                  window.open(url);
      
                                           }
                                   } 
                              }

                          ]
                         
                          
                          
                       "
                       >
                 </div>
                 <!-- datagird  ลาพักผ่อน -->
    
</div>
<!-- datagrid  หลัก ในการลาทั้งหมด -->



<!--  ยื่นใบลาพักผ่อน -->
<!-- dia หน้าหลัก ลาพักผ่อนประจำปี -->
<div  id="dia_sick"  title=" ยื่นใบลาป่วย/ลาคลอดบุตร/ลากิจส่วนตัว  "  class="easyui-dialog"  
      data-options=" 
      closed:false
      ,iconCls:'icon-print' 
      ,resizable:true
      ,modal:'true' 
      ,minimizable:true
      ,maximizable:true
      ,collapsible:true
      ,buttons:[
         { text:'Close(ปิด)',iconCls:'icon-cancel',size:'large',iconAlign:'right',handler:function()
                {  
                     $('#dia_sick').dialog('close');  
                }  
         }
      ]
      "  style="width:600px;height: 600px;  "   >
    
    
    <div class="easyui-panel"  >
        
        
        <table   >
            <tr>
                
                <td colspan="3" align="right">
                        <input class="easyui-switchbutton" name="type_person"  id="type_person5"   data-options="  value:5, readonly:true,     "  checked="true">เจ้าหน้าที่ศูนย์ตะวันฉาย
                </td>
            </tr>
            
            <tr>
                <td colspan="3" align="right">
                       <input class="easyui-textbox"  id="write" name="write"   style="width:200px; height: 40px;"  data-options="  value:'ศูนย์ตะวันฉาย', readonly:'true',  "  />
                </td>
            </tr>
            
            <tr>
                <td colspan="3" align="right">
                    <input class="easyui-datebox"  id="date_write1"  name="date_write1"  style="width:170px;height: 40px;"  />
                </td>
            </tr>
        
            <tr>
                <td colspan="3"  align="left">
                    <input class="easyui-textbox"   id="subject"  name="subject"   data-options=" value:'ขอลาพักผ่อนประจำปี'     "    style="width:200px;height: 40px;"    />
                </td>
            </tr>
            
            <tr>
                <td>
                    <input class="easyui-textbox"   id="study" name="study"   prompt="เรียน"  data-options="  value:'รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย'  ,    "    style="width:300px;height: 40px;"    />
                </td>
            </tr>
            
        
            <tr>
                <td>
                    <select     id="id_staff_sick"  name="id_staff_sick"    labelPosition="top"    class="easyui-combogrid"
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

                                      alert('t');
                                     
                                        
                                                
                                                
                                                
                                   }        
                                "
                                style="width:150px;height: 60px;"    >
                                           
                    </select>
                    
                    
                     <select  class="easyui-combobox"  name="prename"   id="prename"    style="width:80px;height: 40px;"  >
                             <option value="1">นาย</option>
                              <option value="2">นาง</option>
                              <option value="3">นางสาว</option>
                    </select>
                    
                    
                    
                </td>
            </tr>
        
       
         
        </table  >
        
        
    </div>
    
    
</div>

<!--  ยื่นใบลาพักผ่อน -->
