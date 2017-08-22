


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
                             { text:'Delete (ลบ)',   iconAlign:'top'  , iconCls:'icon-cancel',handler:function()
                                 {   
                                      $.messager.confirm('คุณต้อการลบข้อมูล','คุณต้องการลบข้อมูลหรือไม่',function(r)
                                          { 
                                                if(r)
                                                {
                                                      //alert('t');
                                                      var  row=$('#datagrid_vacation').datagrid('getSelected');
                                                      if(row)
                                                      {
                                                            var  id_vacation=row.id_vacation;
                                                            alert(id_vacation);
                                                      }
                                                }
                                                
                                          });
                                 } 
                              },
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
     style="width: 800px;height: 600px;"
     data-options="
         iconCls:'icon-print',
         
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
                          
                              // alert(data);
                               
                               
                               if(data=='1')
                               {
                                    $.messager.alert('สถานะการบันทึกข้อมูล','บันทึกข้อมูลสำเร็จ','info');
                               }
                               else if( data=='0' )
                               {
                                     $.messager.alert('สถานะการบันทึกข้อมูลผิดพลาด','บันทึกข้อมูลผิดพลาด','error');
                               }
                               
                               
                               
                          });
                    }},
                {
                     text:'Clear(ล้าง)',
                     iconAlign:'top',
                     iconCls:'icon-ok',
                     handler:function()
                     {
                          
                                    //prename   //combobox
                                    $('#id_staff').combobox('setText','');
                                    $('#prename').combobox('setText','');
                                    $('#first_name').textbox('setText','');
                                    $('#last_name').textbox('setText','');
                                    $('#position').textbox('setText','');
                                    
                                    $('#cumulative').numberbox('setText','');
                                    
                                    $('#rest').numberbox('setText','');
                                    
                                    
                                    $('#total').numberbox('setText','');
                                    
                                    $('#current').numberbox('setText','');
                                    
                                    $('#keep').numberbox('setText','');
                                    
                                    $('#wishes').numberbox('setText','');
                                    
                                    $('#leave').numberbox('setText','');
                                    
                                    //leave_thistime
                                    $('#date_total_leave').numberbox('setText','');
                                    
                                    //leave_thistime
                                     $('#leave_thistime').numberbox('setText',''); 
                                    
                                   // $('#date_total_leave').numberbox('setValue',total);
                                   
                                   
                                   $('#sign').textbox('setText','');
                                   
                                    $('#presign').combobox('setText','');
                                    
                                   $('#name_sign').textbox('setText','' );
                                   
                                   $('#lastname_sign').textbox('setText','');
                                   
                                   
                                   $('#work').textbox('setText','');
                                   
                                   $('#affiliation').textbox('setText','');
                                   
                                   $('#date_begin').datebox('setText','');
                                   
                                   $('#end_date').datebox('setText','');
                                   
                                   
                                   
                                   $('#house_number').textbox('setValue','');
                                   
                                   
                                   
                                   $('#road').textbox('setText','');
                                   
                                   $('#district').textbox('setText','');
                                   
                                   $('#city').textbox('setText','');
                                   
                                   $('#province').textbox('setText','');
                                   
                                   
                                   $('#tel_address').textbox('setText','');
                                   
                                   
                                   $('#allowed').combobox('setValue','');
                                   
                                   
                
                                    $('#allow_manager').combobox('setValue','');
                                   
                                    
                     }
                },    
                    
               { text:'Close(ปิด)',iconCls:'icon-cancel',iconAlign:'top',handler:function(){ $('#dia_fr_vacation').dialog('close'); }  },
               {  text:'Show(การแสดงผล)' , iconCls:'icon-print', iconAlign:'top'  , handler:function(){   $('#dia_main_vacation').dialog('open');    } },
               
         ]
     "

     >
    
    <form  id="fr_vacation">
        
        <table class="easyui-panel" style="padding: 10px;">
            
            <tr>
                
               
                <td   colspan="3" align="right">
                    <input class="easyui-switchbutton"  name="type_person5"   readonly="true"    id="type_person5"     value="5"   checked /> เจ้าหน้าที่ศูนย์ตะวันฉาย
                </td>
                
            </tr>
            
            <tr>
          
                <td >
                    
                </td >
                
                <td>
                    <input class="easyui-textbox"   id="write" name="write"  data-options=" iconCls:'icon-lock' ,value:'ศูนย์ตะวันฉายฯ'   "   style="width:200px;height: 40px;"   />
                </td>
                
                
            </tr>
            
            <tr>
                
              
                  <td  >
                    
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
                
                <td colspan="3">
                    
                    <select     id="id_staff"  name="id_staff"    labelPosition="top"    class="easyui-combogrid"
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

                                      
                                      var  id_staff  =   $('#id_staff').combogrid('getValue');

                                            $.ajax({
                                               //  url:'<?=base_url()?>index.php/welcome/json_staff',
                                               url:'<?=base_url()?>index.php/welcome/json_call_staff',
                                               data:$('#fr_vacation').serialize(),
                                               method:'post',
                                               dataType:'json',
                                               
                                            }).done(function(data)
                                               { 

                                                      
                                                      $.each(data,function(v,k)
                                                        {
                                                        
                                                             var  id_staff=k.id_staff;

                                                             if( id_staff == 1 )
                                                             {

                                                                  $('#prename').combobox('setValue',id_staff);
                                                                  
                                                             }
                                                             else if( id_staff == 2 )
                                                             {

                                                                  $('#prename').combobox('setValue',id_staff);
                                                                  
                                                             }
                                                             else if( id_staff == 3 )
                                                             {

                                                                  $('#prename').combobox('setValue',id_staff);
                                                                  
                                                             }
                                                             
                                                            // alert(k.position);
                                                             
                                                             $('#prename').combobox('setValue',k.prename );
                                                         
                                                             $('#first_name').textbox('setValue',k.name);
                                                         
                                                             $('#last_name').textbox('setValue',k.lastname);
                                                        
                                                             $('#position').textbox('setValue',k.position);
                                                             
                                                             var  fullname=k.name + '   ' + k.lastname;
                                                             $('#sign').textbox('setValue', fullname );
                                                             
                                                             
                                                             $('#presign').combobox('setValue',k.prename);
                                                             
                                                             $('#name_sign').textbox('setValue',k.name);
                                                             
                                                             $('#lastname_sign').textbox('setValue',k.lastname);
                                                             
                                                             
                                                        });
                                                        
                                                        
                                                    
                                                });
                                        
                                   }        
                                "
                                style="width:150px;height: 60px;"    >
                                           
                    </select>
                    
                    
              
                    <select  class="easyui-combobox"  name="prename" id="prename"  style="width:80px;height: 40px;"  >
                             <option value="1">นาย</option>
                              <option value="2">นาง</option>
                              <option value="3">นางสาว</option>
                    </select>
                    
                    <input class="easyui-textbox"  style="width:100px;height: 40px;"  prompt="ชื่อ"   id="first_name"  name="first_name"  data-options=" iconCls:'icon-man'  "   />
                    <input class="easyui-textbox"  style="width:130px;height: 40px;"   prompt="นามสกุล"  id="last_name"  name="last_name"  data-options=" iconCls:'icon-man'  "   />
                    <input class="easyui-textbox"  style="width:200px;height: 60px;"   prompt="ตำแหน่ง"   id="position"  name="position"   data-options="  label:'ตำแหน่ง', labelPosition:'top', iconCls:'icon-ok'   "    />
                      
                      
                </td>
                
            </tr>
            
            
            <tr>
                <td colspan="3">
             <input class="easyui-textbox"  style="width:250px;height: 40px;"  labelPosition="right"   id="affiliation"   name="affiliation"  data-options=" "  label="สังกัดหน่วยงาน" labelWidth="100px;"   value="-"  />
             
             <input class="easyui-textbox"  style="width:250px;height: 40px;"  labelPosition="right" id="work"  name="work"  label="งาน"  labelWidth="90px;" value="-"   />
              
             
              
               <input class="easyui-textbox"  style="width:220px;height: 40px;" labelAlign="right"  labelWidth="120px;"  label="คณะแพทยศาสตร์" labelPosition="left"   id="tel" name="tel"  data-options="  value:'043363123' "  />
              
             
            </td>
            </tr>
            
            <tr>
                <td>
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:250px;height: 40px;" labelAlign="right"  labelWidth="200px;"  label="มีวันลาสะสม (วัน) " labelPosition="left"
                          id="cumulative" name="cumulative"  />
              
                   <a href="#"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                              // alert('t');
                              
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                               // dataType:'text',
                               dataType:'json',
                                
                              }).done(function(data){
                              
                              
                                 //  alert(data);
                                 //var  cumulative
                                 $.each(data,function(v,k)
                                   {
                                       //alert(k.cumulative);
                                       var  cumulative=k.cumulative;
                                       $('#cumulative').numberbox('setValue', cumulative );
                                       
                                   });
                              
                              });
                             
                         }   "  /> Check วัน  </a>
                   
                   
                </td>
            </tr>
            
            
             <tr>
                <td>
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:250px;height: 40px;" labelAlign="right"  labelWidth="200px;"  label="
มีวันลาพักผ่อนในปีนี้ (วัน) " labelPosition="left"
 
                        name="rest"    id="rest"  />
              
                   <a href="#"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                              // alert('t');
                              
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                               // dataType:'text',
                               dataType:'json',
                                
                              }).done(function(data){
                              
                              
                                 //  alert(data);
                                 //var  cumulative
                                 $.each(data,function(v,k)
                                   {
                                       //alert(k.cumulative);
                                       var  rest=k.rest;
                                      // $('#rest').numberbox('setValue', rest );
                                      var   rest=10-k.cumulative
                                      $('#rest').numberbox('setValue', rest );
                                   });
                              
                              });
                             
                         }   "  /> Check วัน  </a>
                   
                   
                </td>
            </tr>
            
             <tr>
                <td>
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:250px;height: 40px;" labelAlign="right"  labelWidth="200px;"  label="
รวมวันลาเป็น (วัน) " labelPosition="left"
 
                        name="total"    id="total"  />
                   
                   
              
                   <a href="#"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                              // alert('t');
                              
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                               // dataType:'text',
                               dataType:'json',
                                
                              }).done(function(data){
                              
                              
                                 //  alert(data);
                                 //var  cumulative
                                 $.each(data,function(v,k)
                                   {
                                    
                                   
                                      $('#total').numberbox('setValue', k.total );
                                      
                                      
                                   });
                              
                              });
                             
                         }   "  /> Check วัน  </a>
                   
                   
                   
                   
                </td>
            </tr>
            
            
            <tr>
                <td>
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:250px;height: 40px;" labelAlign="right"  labelWidth="200px;"  label="

ในปีนี้ลามาแล้ว (วัน) " labelPosition="left"
 
 
                        name="current"    id="current"  />
                   
                   
              
                   <a href="#"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                              // alert('t');
                              
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                               // dataType:'text',
                               dataType:'json',
                                
                              }).done(function(data){
                              
                              
                                
                                 
                                 $.each(data,function(v,k)
                                   {
                                      
                                       var  rest=k.rest;
                                      // $('#rest').numberbox('setValue', rest );
                                      var   current=k.current;
                                      $('#current').numberbox('setValue', current );
                                   });
                              
                              });
                             
                         }   "  /> Check วัน  </a>
                   
                   
                   
                   
                </td>
            </tr>
            
            
            <tr>
                <td>
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:250px;height: 40px;" labelAlign="right"  labelWidth="200px;"  label="


คงเหลือวันลาอีก (วัน) " labelPosition="left"
 
 
 
                        name="keep"    id="keep"  />
                   
                   
              
                   <a href="#"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                              // alert('t');
                              
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                               // dataType:'text',
                               dataType:'json',
                                
                              }).done(function(data){
                              
                              
                                
                                 
                                 $.each(data,function(v,k)
                                   {
                                      
                                   
                                     var   keep=10- k.current;
                                      $('#keep').numberbox('setValue',  keep );
                                   
                                   
                                   });
                              
                              });
                             
                         }   "  /> Check วัน  </a>
                   
                   
                   
                   
                </td>
            </tr>
            
            
            <tr>
                 <td>
                     
                     
                <!-- <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >-->
                   <input class="easyui-numberbox"  style="width:300px;height: 40px;" labelAlign="right"  labelWidth="250px;" 
                        
                          label="
มีความประสงค์จะขอลาพักผ่อนมีกำหนด (วัน) " labelPosition="left"      id="wishes" name="wishes"    />
 
 
 
                   
                   
                   
              
                  
                   
                   
                   
                   
                </td>
            </tr>
            
            
            <tr>
                <td>
                    
                    
                    <input class="easyui-datebox"  
                           label="ขอลาพักผ่อนตั่้งแต่วันที่" labelWidth="130px;"  labelPosition="right"  style="width:270px;height: 40px;"    id="date_begin"  name="date_begin"   />


                     <input class="easyui-datebox"  
                           label="ถึงวันที่" labelWidth="50px;"  labelPosition="right"  style="width:200px;height: 40px;"    id="end_date"  name="end_date"   />

 
                </td>
            </tr>
            
            
            <tr>
                <td colspan="3">
                    
                    
                    <div class="easyui-panel" style="width: 400px;height: 40px;padding: 10px;">ในระหว่างลาพักผ่อนครั้งนี้ หากมีราชการด่วนติดต่อได้ที่บ้านเลขที่</div>

                    
                   <!-- 
                    <input class="easyui-textbox"  
labelPosition="top"  labelWidth="310px"
labelWidth="250px"
     id="้house_number" 
     name="house_number"  
     
     prompt="บ้านเลขที่"  style="width:80px; height: 40px;"  />
                   -->
                    
                   <input class="easyui-textbox"   id="้house_number"  name="house_number"   prompt="บ้านเลขที่"  style="width:80px; height: 40px;"   />
                    
                      <input class="easyui-textbox"  
labelPosition="left"  labelWidth="310px"
id="road"  name="road"   prompt="ถนน"  style="width:150px; height: 40px;"  />
                      
                      

                      
                      
                        <input class="easyui-textbox"  
labelPosition="left"  labelWidth="310px"
id="district" name="district"   prompt="ตำบล/แขวง"  style="width:170px; height: 40px;"  />
                        
                        
                                      <input class="easyui-textbox"  
labelPosition="left"  labelWidth="310px"
id="city" name="city"   prompt="อำเภอ/เขต"  style="width:170px; height: 40px;"  />          
                      
                      
                                        <input class="easyui-textbox"  
labelPosition="left"  labelWidth="310px"
id="province" name="province"   prompt="จังหวัด"  style="width:170px; height: 40px;"  />   
                                        
                          
                                          <input class="easyui-textbox"  
labelPosition="left"  labelWidth="310px"
 id="tel_address"  name="tel_address"    prompt="โทรศัพท์"  style="width:170px; height: 40px;"  />   
                                        
                    
                </td>
                
            </tr>
            
            
            <tr>
                <td  colspan="3">
                    
                 <table  class="easyui-panel"  style="padding: 2px;">
                <tr>
                <td>
                    <input class="easyui-numberbox"   label="ลามาแล้ว
(วันทำการ)"   labelPosition="top"  labelWidth="150px;"   id="leave"  name="leave"   style="width:50px;height: 60px;">
                
                    
                    <a href="#"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                              // alert('t');
                              
                              $.ajax({
                                url:'<?=base_url()?>index.php/welcome/check_vacation',
                                data:$('#fr_vacation').serialize(),
                               // dataType:'text',
                               dataType:'json',
                                
                              }).done(function(data){

                                 
                                 $.each(data,function(v,k)
                                   {
                                      
                                   
                                     var   leave=k.leave;
                                      $('#leave').numberbox('setValue',  leave );
                                   
                                   
                                   });
                              
                              });
                             
                         }   "  /> Check วัน  </a>
                    
                    
                    
                  
                   
                </td>
                
                <td>
                    
                      <input class="easyui-numberbox"   label="ลาครั้งนี้
(วันทำการ) "   labelPosition="top"  labelWidth="150px;"   id="leave_thistime"  name="leave_thistime"   style="width:50px;height: 60px;">
                      
                         <a href="#"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                               // alert('t');
                               
                               //wishes
                               
                               $('#leave_thistime').numberbox('setValue', $('#wishes').numberbox('getValue') );
                             
                             
                         }   "  /> Check วัน  </a>
                      
                </td>
                
                <td>
                    
                      <input class="easyui-numberbox"   label="รวมเป็น 
(วันทำการ) "   labelPosition="top"  labelWidth="150px;"  id="date_total_leave"   name="date_total_leave"   style="width:50px;height: 60px;">
                      
                        <a href="#"  class="easyui-linkbutton"   data-options="  iconCls:'icon-ok'  ,labelPostion:'top',   iconAlign:'top' 
                         ,onClick:function()
                         {
                               // alert('t');
                               
                               //wishes
                               
                              // $('#leave_thistime').numberbox('setValue', $('#wishes').numberbox('getValue') );
                              
                           //   var  total=  $('#leave_thistime').numberbox('getValue') +  $('#wishes').numberbox('getValue');
                               var  total=  $('#leave_thistime').numberbox('getValue') ;
                             // total
                             
                           //  $('#date_total_leave').numberbox('setValue',total);
                             var    total = parseInt(  $('#leave').numberbox('getValue') ) +  parseInt(  $('#leave_thistime').numberbox('getValue') );
                             
                            // alert(total);
                             
                             $('#date_total_leave').numberbox('setValue',total);
                             
                         }   "  /> Check วัน  </a>
                      
                      
                      
                </td>
         
            <tr>
                
                <td colspan="3">
                    <input class="easyui-textbox"  label="
ขอแสดงความนับถือ
"   labelPosition="top"  labelWidth="150px;"  iconCls="icon-man"   id="sign"  name="sign" style="width:200px;height: 60px;"  />
               
                    <select  class="easyui-combobox"  name="presign" id="presign"  style="width:80px;height: 40px;"  >
                             <option value="1">นาย</option>
                              <option value="2">นาง</option>
                              <option value="3">นางสาว</option>
                    </select>
                    
                    
                     <input class="easyui-textbox"   labelWidth="150px;"     id="name_sign"  name="name_sign" style="width:150px;height: 40px;"  />
                     
                     <input class="easyui-textbox"   labelWidth="150px;"    id="lastname_sign"  name="lastname_sign"  style="width:200px;height: 40px;"  />
                     
                     
                </td>
                
                
            </tr>
            
           
            
            
           
     
            <tr>
                <td colspan="3">
                    
                      <input class="easyui-textbox"  id="name_inspector"  data-options="label:'ผู้ตรวจสอบ ชื่อ-นามสกุล ' , labelPosition:'top',   "  name="name_inspector" style="width:150px;height: 60px;"    value="นงลักษณ์" readonly="true"  >
                      <input class="easyui-textbox"  id="lastname_inspector"   name="lastname_inspector"    style="width:150px;height: 40px;"   value="พรมขอนยาง" readonly="true"  >
                      <input class="easyui-textbox"   id="position_inspector"  name="position_inspector"   style="width:200px;height: 40px;"   value="เจ้าหน้าที่ผู้ช่วยวิัจัยและธุรการ" readonly="true"  >
                      <input class="easyui-datebox"     id="date_inspector"   name="date_inspector"  style="width: 150px;height: 40px;" />
                      
                      
                </td>
            </tr>
            
            <tr>
                <td colspan="3">
                    
                    <input class="easyui-combobox"   name="allowed"  id="allowed"   data-options=" 
                           label:'ความเห็นของผู้บังคับบัญชาชั้นต้น',
                           labelPosition:'top',
                           labelWidth:'auto',
                           showItemIcon:true,
                           data:[ 
                              {  value:'',text:'เลือก',iconCls:'icon-man' },
                              {  value:'1',text:'เห็นควรอนุญาต' ,  iconCls:'icon-ok'  },
                              {  value:'2',text:'ไม่เห็นควรอนุญาต'   ,iconCls:'icon-cancel'   },
                              
                           ],
                           
                           
                           "  style="width:180px;height: 60px;"   />
                    
                    
                    <input class="easyui-textbox"   id="name_commander"  name="name_commander"   data-options="    value:'สุธีรา' ,    "   style="width:100px;height: 40px;"  />
                    <input class="easyui-textbox"   id="lastname_commander"  name="lastname_commander"   data-options="    value:'ประดับวงษ์' ,    "   style="width:100px;height: 40px;"  />
                    <input class="easyui-textbox"   id="position_commander"  name="position_commander"  data-options="    value:'กรรมการและเลขานุการ' ,    "   style="width:200px;height: 40px;"  />
                    
                </td>
            </tr>
            
            
            <tr>
                <td colspan="3">
                    
                    <input class="easyui-combobox"    name="allow_manager"   id="allow_manager"   data-options=" 
                           label:'คำสั่งผู้บริหาร',


                           labelPosition:'top',
                           labelWidth:'auto',
                           showItemIcon:true,
                           data:[ 
                              {  value:'',text:'เลือก',iconCls:'icon-man' },
                              {  value:'1',text:'เห็นควรอนุญาต' ,  iconCls:'icon-ok'  },
                              {  value:'2',text:'ไม่เห็นควรอนุญาต'   ,iconCls:'icon-cancel'   },
                              
                           ],
                           
                           
                           "  style="width:180px;height: 60px;"   />
                    
                    
                    <input class="easyui-textbox"   id="first_name2"   name="first_name2"  data-options="    value:'รศ.พญ.นิรมล' ,    "   style="width:100px;height: 40px;"  />
                    <input class="easyui-textbox"   id="last_name2"  name="last_name2"    data-options="    value:'พัจนสุนทร' ,    "   style="width:100px;height: 40px;"  />
                    <input class="easyui-textbox"  id="last_position"  name="last_position"   data-options="    value:'รองผู้อำนวยการฝ่ายบริหาร' ,    "   style="width:200px;height: 40px;"  />
                    
                    
                    
                </td>
            </tr>
           
            
    </table>   
                    
                </td>
            </tr>
            
            
            
        </table>       
            
            
            
            

          
            
        
                   

            
            
     
        
    </form>
    
</div>

<!--  Dia  +  form  บันทึกผล -->