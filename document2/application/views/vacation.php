

<!-- dia หน้าหลัก ลาพักผ่อนประจำปี -->
<div  id="dia_vacation"  title=" ลาพักผ่อนประจำปี "  class="easyui-dialog"  
      data-options=" closed:true 
      ,iconCls:'icon-print' 
      ,modal:'true' 
      ,buttons:[
         { text:'Close(ปิด)',iconCls:'icon-cancel',size:'large',iconAlign:'right',handler:function()
                {  
                     $('#dia_vacation').dialog('close');  
                }  
         }
      ]
      "  style="width:200px;height: 200px;  "   >
    
    <div style="margin-left: 15px ;margin-top: 15px;">
        
        <a href="#"  onclick="javascript: alert('t');  "  class="easyui-linkbutton" data-options=" iconCls:'icon-large-chart'  ,size:'large' , iconAlign:'top'  "   >ยืนใบลา</a>  
        
        <a href="#"  onclick="
            javascript: 
                    
          // alert('t');  
           $('#dia_main_vacation').dialog('open');
           
           
           "  class="easyui-linkbutton"  data-options=" iconCls:'icon-large-shapes'  ,size:'large',  iconAlign:'top'  "  >แสดงผล</a>
     
        
    </div>
    
          
    
</div>
<!-- dia หน้าหลัก ลาพักผ่อนประจำปี -->



<!-- datagrid  หลัก ในการลาทั้งหมด -->
<div  class="easyui-dialog"   id="dia_main_vacation" 
      style="width:500px;height: 400px;"
      data-options=" closed:true, title:'หน้าหลักลาพักผ่อนประจำปี' 
       ,maximizable:false
       ,minimizable:true
      ,iconCls:'icon-large-shapes' 
      ,collapsible:false
      ,buttons:[
      
        { text:'Close(ปิด)',  iconCls:'icon-cancel' ,iconAlign:'top',handler:function(){   $('#dia_main_vacation').dialog('close'); }  },
        
      ]
      
      "  >
          
                 <!-- datagird  ลาพักผ่อน -->
                 <div  class="easyui-datagrid"  id="datagrid_vacation"
                       data-options="
                       
                          url:'<?=base_url()?>index.php/welcome/json_vacation',
                          rownumbers:true,
                          singleSelected:true,
                          columns:[[
                          
                            {  field:'first_name', title:'ชื่อ',align:'left',    },
                            {  field:'last_name',title:'นามสกุล', align: 'left' ,    },
                            {  field:'keep',title:'วันลาคงเหลือ',align:'left',    },
                            { field:'cumulative',title:'วันลาสะสม',align:'left', },
                            
                          ]],
                          toolbar:[
                          
                            { text:'Reload', iconAlign:'top'   , iconCls:'icon-reload',handler:function(){ $('#datagrid_vacation').datagrid('reload'); }   },
                            { text:'Edit (แก้ไข)',  iconAlign:'top' ,  iconCls:'icon-edit',handler:function(){      } },
                             { text:'Delete (ลบ)',   iconAlign:'top'  , iconCls:'icon-cancel',handler:function(){   } },
                             {  text:'Search (ค้นหา)' , iconAlign:'top',iconCls:'icon-search',handler:function(){  alert('t'); }  },
                             {  text:'Report (ออกรายงาน)',iconAlign:'top',iconCls:'icon-print',handler:function()
                                   {
                                        
                                          var  row=$('#datagrid_vacation').datagrid('getSelected');
                                          if( row )
                                          {
                                                  
                                                   var  id_vacation=row.id_vacation;
                                                   //$.messager.progress({ value:100, });
                                                  // alert(id_vacation);
                                                  var  url='<?=base_url()?>report_pdf/docdb/report_vacation.php?id_vacation='  + id_vacation   ;
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
