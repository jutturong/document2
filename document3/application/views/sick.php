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
<div  id="dia_form_sick"  title="  ยื่นใบลาป่วย/ลาคลอดบุตร/ลากิจส่วนตัว  "  class="easyui-dialog"  
      data-options=" 
      closed:false
      ,iconCls:'icon-print' 
      ,resizable:true
      ,modal:'true' 
      ,minimizable:true
      ,maximizable:true
      ,collapsible:true
      ,buttons:[
         {
            text:'แสดงข้อมูล',
            //iconCls:'icon-large-picture',
             iconCls:'icon-reload',
            size:'large',
            iconAlign:'top',
            handler:function()
            {
                   //alert('t');
                   //datagrid_sick
                   $('#dia_main_sick').dialog('open');
            }
         
         }
         ,
        {
             text:'Save(บันทึก)',iconCls:'icon-save',size:'large',iconAlign:'top',handler:function()
             {
                       //alert('t');
                       
             }
          
         },
             
         {
               text:'Clear(ล้างข้อมูล)',
               iconCls:'icon-man',
               iconAlign:'top',
               size:'large',
               handler:function()
                 {
                      //alert('t');
                      
                      
                    //   $('#sick1').numberbox('setValue','');
                     $('#sick1').textbox('setValue','');
                       
                       
                     //  $('#sick2').numberbox('setValue','');
                         $('#sick2').textbox('setValue','');
                         
                         
                    //   $('#total_sick').numberbox('setValue','');
                        $('#total_sick').textbox('setValue','');
                       
                      //  $('#sick_person1').numberbox('setValue','');
                          $('#sick_person1').textbox('setValue','');
                        
                       // $('#sick_person2').numberbox('setValue','');
                         $('#sick_person2').textbox('setValue','');
                         
                    
                       //  $('#total_sick_person').numberbox('setValue');
                            $('#total_sick_person').textbox('setValue');
                        
                            
                         //$('#confined1').numberbox('setValue','');
                           $('#confined1').textbox('setValue','');
                         //$('#confined2').numberbox('setValue','');
                          $('#confined2').textbox('setValue','');
                       //  $('#total_confined').numberbox('setValue','');
                         $('#total_confined').textbox('setValue','');
                         
                         $('#first_name_sick').textbox('setValue','');
                         $('#last_name_sick').textbox('setValue','');
                         $('#position_sick').textbox('setValue','');
                         
                         $('#prename_sick').combobox('setValue','');
                         
                         $('#count_date').numberbox('setValue','');
                         
                         $('#sign_prename').combobox('setValue','');
                         
                          
                         
                      
                 }
          }
          ,
         
         { text:'Close(ปิด)',iconCls:'icon-cancel',size:'large',iconAlign:'top',handler:function()
                {  
                        $('#dia_form_sick').dialog('close');  
                        //alert('t');
                }  
         }
         
      ]
      "  style="width:700px;height: 600px;  "   >
    
    
    
         <form  id="fr_sick">
        
        <table >
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
                    <input class="easyui-datebox"  required="true"  id="date_write1"  name="date_write1"  style="width:170px;height: 40px;"  />
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

                                        var  id_staff  =   $('#id_staff_sick').combogrid('getValue');

                                        $.ajax({
                                            //url:'<?=base_url()?>index.php/welcome/json_call_staff_sick/'  +   id_staff    ,
                                             url:'<?=base_url()?>index.php/welcome/json_call_staff_sick/'    ,
                                            data:  $('#fr_sick').serialize(),
                                            method:'post',
                                            dataType:'json',
                                            
                                        }).done(function(data){   
                                        
                                                   //alert(data);
                                                   $.each(data,function(v,k){
                                                   
                                                       var  id_staff=k.id_staff;
                                                      // alert(id_staff);
                                                       var  prename=k.prename;
                                                      // alert( prename );
                                                      

                                                       
                                                        if(  prename == 'นาย' )
                                                             {

                                                                  //alert( prename );
                                                                  
                                                                  $('#prename_sick').combobox('setValue',1);
                                                                  
                                                             }
                                                             else if( prename == 'นาง' )
                                                             {

                                                                  //$('#prename').combobox('setValue',2);
                                                                   // $('#presign').combobox('setValue',2);
                                                                     $('#prename_sick').combobox('setValue',2);
                                                                  
                                                             }
                                                             else if( prename == 'นางสาว'  )
                                                             {

                                                                  //$('#prename').combobox('setValue',3);
                                                                  // $('#presign').combobox('setValue',3);
                                                                    $('#prename_sick').combobox('setValue',3);
                                                                  
                                                             }
                                                       
                                                             
                                                               //alert(  k.name );
                                                             
                                                               $('#first_name_sick').textbox('setValue',k.name );
                                                               
                                                               
                                                               //last_name_sick
                                                               //       $('#last_name').textbox('setValue',k.lastname);
                                                               
                                                             
                                                               
                                                               //last_name_sick
                                                               
                                                                 $('#last_name_sick').textbox('setValue',k.lastname);
                                                               
                                                               //position
                                                               
                                                               $('#position_sick').textbox('setValue', k.position);
                                                               
                                                               
                                                              $('#sign_name').textbox('setValue',k.name);
                                                             // alert(k.first_name);
                                                              
                                                              $('#sign_lastname').textbox('setValue',k.lastname);
                                                               
                                                               
                                                              $('#sign_prename').combobox('setValue',k.prename);
                                                              
                                                              $('#firstname3').textbox('setValue',k.name);
                                                              
                                                              
                                                              $('#lastname3').textbox('setValue',k.lastname);
                                                              
                                                       
                                                   });
                                        
                                        });
                                        
                                   },
                                   
                                "
                                style="width:150px;height: 60px;"    >
                                           
                    </select>
                    
                    
                    <select  class="easyui-combobox"  name="prename_sick"   id="prename_sick"    required="true"  style="width:80px;height: 40px;"  >
                         <option  value=""> :: เลือก :: </option>
                             <option value="1">นาย</option>
                              <option value="2">นาง</option>
                              <option value="3">นางสาว</option>
                              
                    </select>
                    
                    <input class="easyui-textbox"   id="first_name_sick"  name="first_name_sick"   required="true"  style="width:100px;height: 40px;"  >
                    
                    
                    <input class="easyui-textbox"   id="last_name_sick"  name="last_name_sick"   required="true"   style="width:100px;height: 40px;"  >
                    
                    <input class="easyui-textbox"   id="position_sick"  name="position_sick"    required="true"  style="width:200px;height: 40px;"  >
                    
                    
                </td>
            </tr>
            
            <tr>
                <td>
                    
                         <input class="easyui-textbox"  prompt="สังกัดหน่วย"  id="affiliation"   name="affiliation"   style="width:200px;height: 40px;"  >
                         <input class="easyui-textbox"  prompt="งาน"    id="work"  name="work"   style="width:200px;height: 40px;"  >
                         <input class="easyui-textbox"  prompt="โทร."  label="คณะแพทยศาสตร์"  labelPosition="left"  labelWidth="120px" id="tel" name="tel"  data-options="value:'043363123'   "   style="width:220px;height: 40px;"  >
                         
                      
                </td>
            </tr>
            
            
           
            <tr>
                <td colspan="3">
                    
                    
                 
                    
                    <input    type="radio"   name="disease"    id="disease1"  value="1" > ป่วยด้วยโรค
                    
                    <input class="easyui-textbox"   id="disease_detail"  multiline="true"    name="disease_detail"  style="width:150px;height: 40px;"   />
                    
                   เกี่ยวข้องหรือมีสาเหตุจาก 
                   
                   
                   
                   <input    type="radio"   id="sick_disease1" name="sick_disease"   value="1" > จากการทำงาน
                    
                    <input        type="radio"    name="sick_disease"  id="sick_disease2"  > ไม่ใช่จากการทำงาน
                    
                </td>
            </tr>
            
            <tr>
                <td>
                    
                    
                     <input    type="radio"  name="disease"  id="disease3"  value="3" > กิจส่วนตัว
                       
                        เนื่องจาก
                        
                         <input class="easyui-textbox"  id="disease_person"   name="disease_person"    style="width:220px;height: 40px;"   />
                     
                     
                </td>
            </tr>
            
            
            <tr>
                <td>
                    <input   type="radio"  name="disease"  id="disease4"   name="disease"  value="4"  />
                      คลอดบุตร
                </td>
            </tr>
            
            
            
            <tr>
                <td>
                    <input class="easyui-datebox"    label="ตั่งแต่วันที่ "  required="true"  id="begin_date1"  name="begin_date1"   style="width:200px;height: 40px;"   />
                    <input class="easyui-datebox"    label="ถึงวันที่ "   required="true"   id="end_date1"  name="end_date1"    style="width:200px;height: 40px;"   />
                    
                    <input class="easyui-numberbox"  id="count_date" required="true"  name="count_date"    label="มีกำหนด (วัน)"   lebelPosition="left"   style="width:130px;height: 40px;" /> 
                </td>
            </tr>
            
            <tr>
                
                
                <td colspan="3">
                    ข้าพเจ้าได้ลา  
                    <input    type="radio"   name="me_leave"    onclick="
                              javascript:
                                     // alert('t');
                                     $('#btn_total_sick').linkbutton({ 'disabled':false  });
                                     $('#btn_total_sick_person').linkbutton({ 'disabled':true  });
                                     $('#btn_total_confined').linkbutton({ 'disabled':true  });
                                     
                                     
                                     $('#total_sick').textbox('setValue','');
                                     $('#total_sick_person').textbox('setValue','');
                                     $('#total_confined').textbox('setValue','');

                                     
                              "  id="me_leave1"  value="1"  style="width: 90px;height: 40px;"  >ป่วย
                    <input     type="radio"    name="me_leave"  onclick="
                                 javascript:
                                     $('#btn_total_sick').linkbutton({ 'disabled':true  });
                                     $('#btn_total_sick_person').linkbutton({ 'disabled':false  });
                                     $('#btn_total_confined').linkbutton({ 'disabled':true  });
                                     
                                     $('#total_sick').textbox('setValue','');
                                     $('#total_sick_person').textbox('setValue','');
                                     $('#total_confined').textbox('setValue','');
                                     
                               
                               "   id="me_leave2"     value="2"   style="width: 90px;height: 40px;" >กิจส่วนตัว    
                    <input     type="radio"    name="me_leave"  onclick="
                                 javascript:
                                     $('#btn_total_sick').linkbutton({ 'disabled':true  });
                                     $('#btn_total_sick_person').linkbutton({ 'disabled':true  });
                                     $('#btn_total_confined').linkbutton({ 'disabled':false  });
                                     
                                     $('#total_sick').textbox('setValue','');
                                     $('#total_sick_person').textbox('setValue','');
                                     $('#total_confined').textbox('setValue','');
                               
                               "  type="radio"     id="me_leave3"     value="2"   style="width: 90px;height: 40px;" >คลอดบุตร  
                </td>
            </tr>
            
            
            <tr>
                <td>
                    
                       ครั้งสุดท้ายตั้งแต่วันที่
                    
                    <input    class="easyui-datebox"   id="begin_date2"  name="begin_date2"     style="width: 130px;height: 40px;" />
                    
                     <input    class="easyui-datebox"  id="end_date2"  name="end_date2"    style="width: 130px;height: 40px;" />
                     
                     
                     <input class="easyui-numberbox"   label="มีกำหนด(วัน)"        id="count_date2"  name="count_date2"   style="width: 150px;height: 40px;"   />
                    
                    
                </td>
            </tr>
            
            
            <tr>
                <td>
                    
                      ในระหว่างลาจะติดต่อข้าพเจ้าได้ที่
                      
                    <a class="easyui-linkbutton"  iconCls="icon-man" iconAlign="top"  onClick="
                         javascript:
                                 
                                // alert('t');
                        //id_staff_sick
                        //easyui-combogrid
                        
                               var  id_staff_sick=  $('#id_staff_sick').combogrid('getValue');
                               
                               if(   id_staff_sick > 0  )
                               {
                                         //   alert(  id_staff_sick  );
                                            $.ajax({
                                                url:'<?=base_url()?>index.php/welcome/json_call_sick/'   ,
                                                data:  $('#fr_sick').serialize(),                                                
                                                method:'post',
                                                dataType:'json',
                                                
                                            }).done(function(data)
                                                 { 
                                                       $.each(data,function(v,k){
                                                               //alert(k.house_number);
                                                              $('#house_number').textbox('setValue',k.house_number);
                                                              //alert(k.road);
                                                              $('#road_sick').textbox('setValue',k.road);
                                                              $('#district_sick').textbox('setValue',k.district);
                                                              
                                                              $('#district2_sick').textbox('setValue',k.district2);
                                                              //alert( k.district2 );
                                                              $('#province_sick').textbox('setValue',k.province);
                                                              //alert(k.province);
                                                              $('#tel2_sick').textbox('setValue',k.tel2);
                                                              //alert(k.tel2);
                                                              
                                                
                                                              // alert(k.last_name);
                                                              
                                                              //sign_prename
                                                              
                                                               //alert(k.prename);
                                                               
                                                              
                                                       });
                                                       
                                                        
                                                 });

                                }
                               
                               
                       
                       " >เรียกดูที่อยู่</a>
                    
                  
                    
                    <input class="easyui-textbox"   prompt="บ้านเลขที"  id="house_number"  name="house_number"   style="width: 100px;height: 40px;"    />
                    
                     <input   class="easyui-textbox"     prompt="ถนน"   id="road_sick"  name="road_sick"    style="width: 150px;height: 40px;"   >
                    
                     <input    class="easyui-textbox"   prompt="ตำบล"   id="district_sick"  name="district_sick"    style="width: 150px;height: 40px;" >
                     
                      <input    class="easyui-textbox"     prompt="อำเภอ"    id="district2_sick"  name="district2_sick"    style="width: 150px;height: 40px;" >
                      
                      <input    class="easyui-textbox"     prompt="จังหวัด"    id="province_sick"  name="province_sick"    style="width: 200px;height: 40px;" >
                      
                       <input    class="easyui-textbox"     prompt="โทรศัพท์"  id="tel2_sick"  name="tel2_sick"     style="width: 160px;height: 40px;" >
                    
                </td>
            </tr>
          
       
            <tr>
                <td>
                    
                    
                    ขอแสดงความนั่บถือ
                    
                    
                    
                    
                    
                </td>
            </tr>
            
            <tr>
                <td>
                    
                    <input class="easyui-textbox"   label="(ลงชื่อ)"  labelPosition="left"   id="sign_name"   name="sign_name"   style="width: 200px;height: 40px;" />
                    <input class="easyui-textbox"     id="sign_lastname"   name="sign_lastname"    style="width: 140px;height: 40px;" />
                    
                </td>
            </tr>
            
            <tr>
                <td>
                   
                    <select class="easyui-combobox"    name="sign_prename"    id="sign_prename"   style="width: 140px;height: 40px;"  >
                         <option value=""> :: เลือก :: </option>
                        <option value="1">นาย</option>
                        <option value="2">นาง</option>
                        <option value="3">นางสาว</option>
                        
                    </select>
                    
                    
                     <input   class="easyui-textbox"  id="firstname3"   name="firstname3"  type="text" class="validate"  style="width: 150px;height: 40px;" />
                     
                      <input   class="easyui-textbox"  id="lastname3"   name="lastname3"   type="text" class="validate"  style="width: 150px;height: 40px;" />
                      
                      
                    
                </td>
            </tr>
            
            
            <tr>
                <td colspan="3"> 
           
            
            <table    style="padding: 2px;" class="easyui-panel">
                <tr>
                    
                    <td>
                        ประเภทการลา
                    </td>
                    
                    <td>
                        ลามาแล้ว (วันทำการ)
                    </td>
                    
                    <td>
                        ลาครั้้งนี้ (วันทำการ)
                    </td>
                    
                    <td>
                        รวมเป็น(วันทำการ)
                    </td>
                    
                </tr>
                
                <tr>
                    <td>
                        ป่วย
                    </td>
                    
                    <td>
                        <input  class="easyui-textbox"       id="sick1"  name="sick1"    type="text"  style="width:50px;height: 40px;" >
                   
                        <a href="javascript:void(0)"   class="easyui-linkbutton"    iconCls="icon-man"  data-options="
                        
                           iconAlign:'top',
                           onClick:function()
                           {
                              
                                   // var  url='<?=base_url()?>index.php/welcome/check_day_sick/' +  $('#id_staff_sick').combogrid('getValue')  ;
                                 var  url='<?=base_url()?>index.php/welcome/check_day_sick/' ;
                                 // alert(url);
                                 
                                 
                                 
                                  if(   $('#id_staff_sick').combogrid('getValue') > 0 )
                                  {
                                        $.ajax({
                                           url:url,
                                           //dataType:'text',
                                           dataType:'json',
                                           method:'post',
                                           data:$('#fr_sick').serialize(),


                                        }).done(function(data)
                                            { 
                                                  //alert(data);  
                                                    $.each(data,function(v,k)
                                                      {
                                                            var  sick1=k.sick1;
                                                            // alert(sick1);
                                                            // $('#sick1').numberbox('setValue',sick1);
                                                            
                                                             //$('#sick1').textbox('setValue', sick1 );
                                                             $('#sick1').textbox('setValue', k.total_sick );
                                                          
                                                         
                                                            
                                                       });
                                            });
                                    }
                                    else{
                                       $.messager.alert('เลือกชื่อ-นามสกุลก่อน','เลือกชื่อ-นามสกุลก่อน','error');
                                    }
                                      
                                 
                                
                                 
                                 
                           }
                           
                           "   >Check</a>
                       
                    </td>
                     <td>
                         <input  class="easyui-textbox"    id="sick2"   name="sick2"    type="text"  style="width:50px;height: 40px;" >
                         <a href="javascript:void(0)"     class="easyui-linkbutton"  iconCls="icon-man"  data-options=" 
                              
                               iconAlign:'top',
                               onClick:function()
                               {
                                     //alert('t');
                                     var  count_date=$('#count_date').numberbox('getValue');
                                     if( count_date > 0 )
                                     {
                                         // alert(count_date);
                                         //  $('#sick2').numberbox('setValue',count_date);
                                             $('#sick2').textbox('setValue',count_date);
                                           
                                     }
                                     else
                                     {
                                          $.messager.alert('ระบุจำนวนวันลา','ระบุจำนวนวันลาก่อน','error');
                                     }
                               },
                             
                             " >Check</a>
                          
                    </td>
                    
                     <td>
                         <input  class="easyui-textbox"     id="total_sick"   name="total_sick"     type="text"  style="width:50px;height: 40px;" >
                         
                         <a href="javascript:void(0)"  id="btn_total_sick"   class="easyui-linkbutton"  iconCls="icon-ok"  data-options="  
                                iconAlign:'top',
                                disabled:true,
                                  onClick:function()
                                  {
                                          
                                          var  sick1=  parseFloat( $('#sick1').textbox('getValue') );
                                          var   sick2= parseFloat(   $('#sick2').textbox('getValue') );
                                          var   total_sick=  parseFloat(  sick1+ sick2 );
                                          //alert(  total_sick  );
                                          if( total_sick > 0 )
                                          {
                                                 // $('#total_sick').numberbox('setValue',total_sick);
                                                   $('#total_sick').textbox('setValue',total_sick);
                                          }
                                          else
                                          {
                                               $.messager.alert('ระบุข้อมูลให้ครบ','ระบบข้อมูลให้ครบ','error');
                                          }
                                          
                                  }
                            
                            ">Check</a>
                         
                         
                    </td>
                    
                    
                </tr>
                
                <tr>
                    <td>
                        กิจส่วนตัว
                    </td>
                    
                     <td>
                         <input  class="easyui-textbox"        id="sick_person1"  name="sick_person1"    type="text"  style="width:50px;height: 40px;" >
                          
                         <a href="javascript:void(0)"  class="easyui-linkbutton"  iconCls="icon-man"  data-options="  
                              iconAlign:'top',
                             
                              onClick:function()
                              {
                                       var  url='<?=base_url()?>index.php/welcome/check_day_sick/' ;
                                       //sick_person1
                                       //sick_person1
                                       
                         
                                      
                                      
                                   if(   $('#id_staff_sick').combogrid('getValue') > 0 )
                                  {
                                      
                                                $.ajax({
                                                   url:url,
                                                   dataType:'json',
                                                   method:'post',
                                                   data:$('#fr_sick').serialize(),


                                                }).done(function(data){
                                                      // alert(data);
                                                       //sick_person1
                                                          $.each(data,function(v,k){
                                                                 var  sick_person1=k.sick_person1;
                                                               //  alert(sick_person1);
                                                                  // $('#sick_person1').numberbox('setValue',sick_person1);
                                                                  //  $('#sick_person1').textbox('setValue',sick_person1);
                                                                    //total_sick_person
                                                                     $('#sick_person1').textbox('setValue',k.total_sick_person);
                                                                 
                                                          });
                                                      
                                                });
                                      
                                   }
                                   else
                                   {
                                         $.messager.alert('เลือกชื่อ-นามสกุลก่อน','เลือกชื่อ-นามสกุลก่อน','error');
                                   }
                                   
                                      
                                       
                              },
                             
                             "  >Check</a>
                          
                    </td>
                     <td>
                         <input  class="easyui-textbox"        id="sick_person2"  name="sick_person2"    type="text"  style="width:50px;height: 40px;" >
                         
                         <a href="javascript:void(0)"    class="easyui-linkbutton"  iconCls="icon-man"  data-options="   
                              iconAlign:'top',
                            
                              onClick:function()
                              {
                                     var  count_date=$('#count_date').numberbox('getValue');
                                    
                                     
                                     if( count_date != '' )
                                     {
                                          //$('#sick_person2').numberbox('setValue',count_date);
                                           $('#sick_person2').textbox('setValue',count_date);
                                     }
                                     else if(  count_date  == ''   )
                                     {
                                          $.messager.alert('ระบุจำนวนวันก่อน','ระบุจำนวนวันก่อน','error');
                                     }
                                     
                              },
                              
                            "  >Check</a>
                         
                         
                    </td>
                     <td>
                         <input  class="easyui-textbox"     id="total_sick_person"  name="total_sick_person"    type="text"  style="width:50px;height: 40px;" >
                         
                         <a href="javascript:void(0)"    id="btn_total_sick_person"  class="easyui-linkbutton"    iconCls="icon-ok"  data-options="
                               iconAlign:'top',
                               disabled:false,
                               disabled:true,
                              onClick:function()
                              {
                              
                                    if(   $('#id_staff_sick').combogrid('getValue') != ''   )
                                    {
                                     var   sick_person1=    parseFloat  (  $('#sick_person1').numberbox('getValue') );
                                     var   sick_person2=   parseFloat   (  $('#sick_person2').numberbox('getValue') );
                                     var    total_sick_person=  parseFloat (  sick_person1 +  sick_person2  );
                                     //alert( total_sick_person  );
                                     // $('#total_sick_person').numberbox('setValue', total_sick_person);
                                      $('#total_sick_person').textbox('setValue', total_sick_person);
                                     
                                     }
                                     else
                                     {
                                           $.messager.alert('ระบุข้อมูลให้ครบ','ระบุข้อมูลให้ครบ','error'); 
                                     }
                              }
                            
                            " >Check</a>
                         
                         
                    </td>
                    
                    
                </tr>
                
                <tr>
                    <td>
                        คลอดบุตร
                    </td>
                    
                     <td>
                         <input  class="easyui-textbox"      id="confined1"  name="confined1"    type="text"  style="width:50px;height: 40px;" >
                        <!--   $confined1=trim($this->input->get_post("confined1"));  // ลามาแล้ว  วันทำการ  -->
                        <a href="javascript:void(0)"     class="easyui-linkbutton"    iconCls="icon-man"  data-options="  
                                iconAlign:'top',
                          
                                onClick:function()
                                {
                                
                                      
                                   if(   $('#id_staff_sick').combogrid('getValue') > 0 )
                                  {
                                      
                                       var  url='<?=base_url()?>index.php/welcome/check_day_sick/' ;
                                       $.ajax({
                                               url:url,
                                               dataType:'json',
                                               data:$('#fr_sick').serialize(),
                                               method:'post',
                                       
                                          }).done(function(data)
                                         {
                                                 // alert(data);
                                                  $.each(data,function(v,k){
                                                         //$('#confined1').numberbox('setValue',k.confined1);
                                                          $('#confined1').textbox('setValue',k.total_confined );
                                                  });
                                         });  
                                   
                                  }
                                  else
                                  {
                                       $.messager.alert('เลือกชื่อ-นามสกุลก่อน','เลือกชื่อ-นามสกุลก่อน','error');
                                  }
                                         
                                          
                                          
                                }
                           ">Check</a>
                        
                    </td>
                     <td>
                        <input  class="easyui-textbox"      id="confined2"  name="confined2"    type="text"  style="width:50px;height: 40px;" >
                        <a href="javascript:void(0)"  class="easyui-linkbutton"  iconCls="icon-man"  iconAlign="top"   style="width:50px;height: 40px;"   onclick="
                           javascript:
                                  // alert('t');
                                       var  count_date=$('#count_date').numberbox('getValue');
                                      // alert(count_date);
                                      if(    count_date  != '' )
                                      {
                                           //$('#confined2').numberbox('setValue',count_date);
                                           $('#confined2').textbox('setValue',count_date);
                                       } 
                                       else if(   count_date  == ''  )
                                       {
                                           $.messager.alert('ระบุจำนวนวันก่อน','ระบุจำนวนวันก่อน','error');
                                       }
                                       
                                       
                           "    >Check</a>
                        
                    </td>
                     <td>
                        <input  class="easyui-textbox"     labelPosition="right"    id="total_confined"  name="total_confined"    type="text"  style="width:50px;height: 40px;" >
                        <a href="javascript:void(0)"  disabled='true'   class="easyui-linkbutton"  id="btn_total_confined"  iconCls="icon-ok"  iconAlign="top"   onclick="
                             javascript:
                                     
            
                                      //alert('t');
                                     //  $.messager.alert('ระบุข้อมูลให้ครบ','ระบุข้อมูลให้ครบ','error');  

                                     //alert(  total_confined  );
                                     
                                    if(   $('#id_staff_sick').combogrid('getValue')  !=   ''    )
                                    {
                                                                             var     confined1=  parseFloat( $('#confined1').textbox('getValue') );
                                     //alert( confined1 );
                                          var      confined2= parseFloat(  $('#confined2').textbox('getValue')   );
                                     
                                          var    total_confined  =  parseFloat(   confined1  +  confined2    );
                                     
                                           $('#total_confined').textbox('setValue' ,  total_confined  );
                                        
                                    }
                                    else
                                    {
                                          $.messager.alert('ระบุข้อมูลให้ครบ','ระบุข้อมูลให้ครบ','error');
                                    }
                                   
                             
                                      
                                
                                     
                           
                           "  >Check</a>
                        
                    </td>
                    
                    
                </tr>
                
            </table>
            
                </td>
        </tr>
        
        <tr>
            <td>
                  <input class="easyui-textbox"  labelWidth="180px;"  label="(ลงชื่อ-นามสกุล)  ผู้ตรวจสอบ  "  labelPosition="left"    id="inspector_name"   name="inspector_name"  data-options=" value:'นงลักษณ์' , readonly:'true'   "   style="width: 280px;height: 40px;"   />
                  <input class="easyui-textbox"     id="inspector_lastname"   name="inspector_lastname"  data-options=" value:'พรมขอนยาง' , readonly:'true'   "   style="width: 100px;height: 40px;"   />
            </td>
        </tr>
        
        <tr>
            <td>
                 <input class="easyui-textbox"  labelWidth="100px;"  label="ตำแหน่ง"  labelPosition="left"    id="inspector_position"   name="inspector_position"  data-options=" value:'เจ้าหน้าที่ผู้ช่วยวิจัยและธุรการ' ,  readonly:'true'   "   style="width: 300px;height: 40px;"   />
              
            </td>
        </tr>
        
        <tr>
            <td>
                <input class="easyui-datebox"   label="วันที่"  labelPosition="left"  id="date_inspector"  name="date_inspector"  style="width:240px;height: 40px;">
            </td>
        </tr>
            
         
        <tr>
            
            <td>
                ความเห็นของผู้บังคับบัญชาชั้นต้น (โปรดระบุ ข้อ ก และ ข้อ ข)
            </td>
            
            
        </tr>
        
        <tr>
            <td>
                ก
            </td>
        </tr>
        <tr>
            <td>
                <input class="easyui-switchbutton"  id="supervisor_sick1"  name="supervisor_sick1"  data-options=" value:1   "  />  เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน
            </td>
        </tr>
        
        
        <tr>
            <td>
                <input class="easyui-switchbutton"  id="supervisor_sick2"  name="supervisor_sick2"  data-options=" value:1   "  />  ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน
            </td>
        </tr>
        
        
        <tr>
            <td>
                ข
            </td>
        </tr>
        
        <tr>
            <td>
                
                 <input class="easyui-switchbutton"  id="supervisor_agree1"  name="supervisor_agree1"  data-options=" value:1   "  />
                 เห็นด้วยควรอนุญาต
                 
                 
                 <input class="easyui-switchbutton"  id="supervisor_agree2"  name="supervisor_agree2"  data-options=" value:2   "  />
                 เห็นด้วยควรไม่อนุญาต
                 
                 
            </td>
        </tr>
        
        
        <tr>
            <td>
                <input   class="easyui-textbox"    id="first_name2"   name="first_name2"  label="(ลงชื่อ)"  labelPosition="left"   data-options="  value:'สุธีรา' ,readonly:'true'   "    style="width:180px;height: 40px;" >
                
                <input    class="easyui-textbox"   id="last_name2"  name="last_name2"      data-options="  value:'ประดับวงษ์' ,readonly:'true'    "    style="width:180px;height: 40px;" >
                
            </td>
        </tr>
        
        <tr>
            <td>
                <input     class="easyui-textbox"    label="ตำแหน่ง"  labelWidth="100px;"   id="postion2"  name="postion2"  readonly="true"    value="กรรมการและเลขานุการ"   style="width:280px;height: 40px;" >
            </td>
        </tr>
        
        
        <tr>
            <td>
                คำสั่งผู้บริหาร
            </td>
        </tr>
        
        <tr>
            <td>
                
                <!-- <input   id="manager_allow1" class="with-gap" name="manager_allow" value="1" type="radio"> -->
                <input class="easyui-switchbutton"    id="manager_allow1"  name="manager_allow1"  data-options="value:1    "   />  อนุญาต
                
                 <input class="easyui-switchbutton"   id="manager_allow2"  name="manager_allow2"  data-options="value:2    "   />  ไม่อนุญาต
                
            </td>
        </tr>
        
        
        <tr>
            <td>
                <input  class="easyui-textbox"   id="first_name3"   name="first_name3"   label="(ลงชื่อ)"  labelPosition="left" labelWidth="100px;"    data-options="   value:'รศ.พญ.นิรมล' ,readonly:true   "    style="width:240px;height: 40px;"   >
            
            <input    class="easyui-textbox"   id="last_name3"  name="last_name3"    data-options=" value:'พัจนสุนทร' ,readonly:true,      "      style="width:180px;height: 40px;" >
            
            </td>
        </tr>
        
        
        <tr>
            <td>
                    <input  class="easyui-textbox"  id="manager_position"  name="manager_position"    label="ตำแหน่ง"  labelPosition="left" labelWidth="100px;"    data-options="   value:'รองผู้อำนวยการฝ่ายบริหาร'  ,readonly:true,   "    style="width:350px;height: 40px;"   >
            </td>
        </tr>
        
        
        <tr>
            <td>
                หมายเหตุ 1
            
                ในปีงบประมาณหนึ่ง ลูกจ้างชั่วคราวมีสิทธิ์ลาป่วยโดยได้รับค่าจ้างระหว่างลาไม่เกิน 15 วันทำการ ลากิจส่วนตัว ไม่มีสิทธิ์ได้รับค่าจ้างในวันที่ลา 
            </td>

        </tr>
        
        
        <tr>
            <td>
                หมายเหตุ 2
            
                ใ้ห้บุคลากรตัดสินใจว่าการลาป่วยดังกล่าวนั้นได้เกี่ยวข้องหรือมีสาเหตุจากงานหรือไม่ หากลาป่วยเกิดจากการทำงาน หัวหน้างานโปรดสำเนาส่งมายังสำนักงานอาชีวอนามัยและความปลอดภัยเพื่อพิจารณาแก้ไขสาเหตุสภาพแวดล้อมในการทำงาน
            </td>
        </tr>
        
        </table  >
        
        
        
        
        
        
         </form>
        
 
    
    
</div>

<!--  ยื่นใบลาพักผ่อน -->
