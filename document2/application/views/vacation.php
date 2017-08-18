


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
                          singleSelect:true,
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


<!--  Dia  +  form  บันทึกผล -->
<div class="easyui-dialog" 
     id="dia_fr_vacation"
     style="width: 850px;height: 600px;"
     data-options="
         iconCls:'icon-save',
         
         closed:false,
         modal:true,
         minimizable:true,
         resizable:true,
         maximizable:true,
         
         title:' แบบฟอร์มใบลาพักผ่อนประจำปี  ',
         
         buttons:[
         
              { text:'บันทึกข้อมูล',iconCls:'icon-save',iconAlign:'top', handler:function()
                   {
                          //fr_vacation
                          $.ajax({
                              url:'<?=base_url()?>index.php/welcome/insert_vacation',
                              method:'post',
                              data:$('#fr_vacation').serialize(),
                          
                          }).done(function(data){
                               alert(data);
                          });
                    }},
              { text:'Close(ปิด)',iconCls:'icon-cancel',iconAlign:'top',handler:function(){ $('#dia_fr_vacation').dialog('close'); }  }
         ]
     "

     >
    
    <form  id="fr_vacation">
        
        <table>
            
            <tr>
                <td></td>
               
                <td style="width:200px;"  >
                    <input class="easyui-switchbutton"  name="type_person5"   readonly="true"    id="type_person5"    value="5"   checked> เจ้าหน้าที่ศูนย์ตะวันฉาย
                </td>
            </tr>
            
            <tr>
          
                <td  style="width:200px;">
                    
                </td >
                
                <td>
                    <input class="easyui-textbox"   id="write" name="write"  data-options=" iconCls:'icon-lock' ,value:'ศูนย์ตะวันฉายฯ'   "   style="width:200px;height: 40px;"   />
                </td>
                
                
            </tr>
            
            <tr>
                
              
                  <td  style="width:200px;">
                    
                </td >
                <td>
                    <input class="easyui-datebox"  id="date_write"  name="date_write" style="width:150px;height: 40px;"  >
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
                
                <td style="width:700px;">
                    
                    <select     id="id_staff"  name="id_staff"    labelPosition="top"    class="easyui-combogrid"
                                data-options="
                                   url:'<?=base_url()?>index.php/welcome/json_staff',
                                   panelWidth:200,
                                   idField:'id_staff',
                                   textField:'name',
                                   method:'post',
                                   fitColumns:true,
                                   label:'ชื่อ-นามสกุล',
                                   labelPosition:'left',
                                   singleSelect:true,
                                   
                                   
                                   columns:[[
                                     { field:'name',title:'ชื่อ', },
                                     { field:'lastname',title:'นามสกุล'  },
                                     
                                   ]]
                                   
                                   ,
                                   
                                   onChange:function()
                                   {
                                   
                                       
                                      //    var  row=$('#id_staff'').combogrid('getSelected');
                                        //var  alert(row.name);
                                      
                                      var  id_staff  =   $('#id_staff').combogrid('getValue');
                                       //  alert( $('#id_staff').combogrid('getValue') );
                                      // alert(   id_staff  );
                                            $.ajax({
                                               url:'<?=base_url()?>index.php/welcome/json_staff',
                                              // type:'text',
                                               //:'json',
                                               method:'post',
                                               dataType:'json',
                                               
                                            }).done(function(data)
                                               { 
                                                      //alert(data);  
                                                      //$('#first_name').textbox('setValue',
                                                      $.each(data,function(v,k)
                                                        {
                                                             alert(k.name);
                                                           
                                                        });
                                                    
                                                });
                                        
                                   }        
                                "
                                style="width:200px;height: 40px;"    >
                                           
                    </select>
                    
                    
              
                    <select  class="easyui-combobox"  name="prename" id="prename"  style="width:80px;height: 40px;"  >
                             <option value="1">นาย</option>
                              <option value="2">นาง</option>
                              <option value="3">นางสาว</option>
                    </select>
                    
                    <input class="easyui-textbox"  style="width:100px;height: 40px;"  prompt="ชื่อ"   id="first_name"  name="first_name"  data-options=" iconCls:'icon-man'  "   />
                    <input class="easyui-textbox"  style="width:100px;height: 40px;"   prompt="นามสกุล"  id="last_name"  name="last_name"  data-options=" iconCls:'icon-man'  "   />
                    <input class="easyui-textbox"  style="width:100px;height: 40px;"   prompt="ตำแหน่ง"   id="position"  name="position"      />
                      
                      
                </td>
                
            </tr>
            
            
            <tr>
                <td>
             <input class="easyui-textbox"  style="width:120px;height: 40px;"  prompt="สังกัดหน่วยงาน" labelPosition="left" id="affiliation"   name="affiliation"    />
             
              <input class="easyui-textbox"  style="width:120px;height: 40px;"  prompt="งาน" labelPosition="left" id="work"  name="work"   />
             
            </td>
            </tr>
            
            
            
        </table>
        
    </form>
    
</div>

<!--  Dia  +  form  บันทึกผล -->