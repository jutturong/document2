

<div class="easyui-dialog" 
     data-options="
     closed:true,
     title:'ตารางงาน',
     iconCls:'icon-man',
     buttons:[
       { text:'ปิด',iconCls:'icon-cancel',size:'large',handler:function(){ $('#dia_main_calendar').dialog('close');  } }
     ],
     
     /*
     toolbar:[
     
     
        { text:'เพิ่ม',iconCls:'icon-man',size:'large',handler:function(){ alert('t'); }   }
     ]
     */
     
     "
     id="dia_main_calendar"
     style="width:500px;height: 550px;padding: 5px;"
     >
    
   <div class="easyui-calendar" 
        data-options="
        border:true,
        showWeek:true,
        formatter:function(date)
        {
           return date.getDate();
        },
        
        "
        style="width:400px;height:400px;"
        id="calendar_main"
        ></div>
    
</div>


<script type="text/javascript">
$(function()
{
    
    /*
        $('#calendar_main').calendar({
            styler:function(date)
            {
                if( date.getDate()==13)
                {
                    //alert('t');
                      return "  background-color:#ccc; ";
                     //return true;
                }
            }
            
        }); 
        */
       
       
        $.post('<?=base_url()?>index.php/welcome/call_json_calendar',function(data)
               {
                      $.each(data,function(v,k){
                            
                            var  begin_date=k.begin_date;
                          
                                 //alert(k.begin_date);
                               //alert( begin_date.length );
                                    if( begin_date.length >  0  )
                                    {
                                        //alert(k.begin_date);
                                           $('#calendar_main').calendar({
                                                styler:function(date)
                                                {
                                                    //return "  background-color:#ccc; ";
                                                      //var d = date.getDate();
                                                      // return "  background-color:red; ";
                                                         if( date.getDate()==  begin_date )
                                                         {
                                                              return "  background-color:#ccc; ";
                                                         }
                                                }
                                            });
                                    }
                              
                      });
                   
               },'json');
        
        
        
         $('#calendar_main').calendar({
             onSelect:function(date){
                 
                 //alert( date.getFullYear() + ":" + date.getMonth() + ":" +  date.getDate() );
                  var  begin_date= date.getMonth() + '/'  +   date.getDate()  +  '/'  +   date.getFullYear();    //10/27/2017
                 //alert(  begin_date  );
                  $('#dia_form_calendar').dialog('open');
                  $('#begin_date').datebox('setValue',begin_date); //ตั้งแต่วันที่
                 
             }
             
         });
         
         
         // $('#calendar_main').calendar('moveTo',new Date(2017,10,1));
    
});

</script>


<!-- form  กิจกรรมทางวิชาการ -->
<div class="easyui-dialog" data-options="
     closed:true,
     title:'บันทึกกิจกรรมทางวิชาการ',
     iconCls:'icon-ok',
     size:'large', 
     buttons:[
     
     
       { text:'บันทึก',iconCls:'icon-save',size:'large',iconAlign:'left',handler:function()
             { //begin
                   //alert('t');
                   var  url='<?=base_url()?>/index.php/welcome/insert_calendar';
                   $.ajax({ //begin ajax
                       url: url,
                       method:'post',
                     //  dataType:'text',
                       dataType:'json',
                       data: $('#fr_calendar').serialize(),
                    }).done(function(data)
                    {//done begin
                    
                         //alert(data);

                         var  data=data.success;
                         if(  data==1  )
                         {
                              $.messager.alert('บันทึกสำเร็จ','บันทึกสำเร็จ','info');
                              $('#dia_form_calendar').dialog('close');
                         }
                         else if(  data==0  )
                         {
                              $.messager.alert('ไม่สามารถบันทึกข้อความได้','ไม่สามารถบันทึกได้','error');
                              $('#dia_form_calendar').dialog('close'); 
                         }
                         else if( data == 11  )
                                 {
                                      $.messager.alert('อยู่ในสถานะการแก้ไขข้อมูล','อยู่ในสถานะการแก้ไขข้อมูล','error');
                                      
                                 }

                         
                    });//done end ajax
                   
             
             } //end function
       },
       {
            text:'อัพเดทข้อมูล',iconCls:'icon-edit',size:'large',iconAlign:'left',
            handler:function()
            { //begin function
                     
                      $.ajax({
                             url:'<?=base_url()?>index.php/welcome/update_calendar',
                             //dataType:'text',
                              dataType:'json',
                             data: $('#fr_calendar').serialize(),
                             method:'post',
                             
                             
                          }).done(function(data)
                          { //begin function
                                //alert(data);
                                var   success=data.success;
                                //alert( success );
                                if(  success == 1 )
                                {
                                     $.messager.alert('สถานะการแก้ไขข้อมูลสำเร็จ','แก้ไขข้อมูลสำเร็จ','info');
                                }
                                else if(  success == 0  )
                                {
                                     $.messager.alert('สถานะการแก้ไขข้อมูลล้มเหลว','แก้ไขข้อมูลล้มเหลว','error');
                                }
                                 else if(  success == 11  )
                                 {
                                      $.messager.alert('กรุณาตรวจสอบวิธีการแก้ไขข้อมูล','ตรวจสอบการแก้ไขข้อมูลใหม่','error');
                                 }
                          
                          });//end function
                  
            
            } //end function
       },
       {
           text:'ล้าง',iconCls:'icon-ok',size:'large',iconAlign:'left',  
           handler:function()
           {   
                  //alert('t');   
                 
                  $('#activities').combobox('setValue','');
                  $('#begin_date').datebox('setValue','');
                  $('#end_date_calendar').datebox('setValue','');
                  $('#subject_calendar').textbox('setValue','');
                  $('#place').textbox('setValue','');
                  $('#detail').textbox('setValue','');
                  $('#expenses').textbox('setValue','');
                  $('#borrow').textbox('setValue','');
                  $('#remark').textbox('setValue','');
                  
                 $('#id_academic').textbox('setValue','');
                 $('#id_calendar').textbox('setValue','');
                 
               
                 
           }
   
       },
       
       { text:'ปิด',iconCls:'icon-cancel',size:'large',iconAlign:'left',handler:function(){ $('#dia_form_calendar').dialog('close');  } },
       
     ]
     
     "  id="dia_form_calendar"  style="width:350px;height: 400px;padding: 10px;"  >
    
    <form id="fr_calendar"  >
        <div style="padding: 5px;">
              <!-- /http://10.87.196.170/document2/index.php/welcome/json_academic-->
              <div class="easyui-combogrid" data-options="
                   url:'<?=base_url()?>index.php/welcome/json_academic',
                   method:'post',
                   label:'อาจารย์',
                   labelPosition:'left',
                   textField:'firstname_academic',
                   idField:'id_academic',
                   labelWidth:'80px',
                  columns:[[
                     { field:'firstname_academic',title:'ชื่อ', },
                     { field:'lastname_academic',title:'นามสกุล',  }
                    
                  ]]
                   
                  "  id="id_academic"  name="id_academic"  style="width:300px;height: 40px;"  >
                  
              </div>
        </div>
        <div  style="padding: 5px;">
            <input class="easyui-combobox"   data-options="
                   valueField:'id',
                   textField:'label',
                   label:'กิจกรรม',
                   labelAlign:'left',
                   labelWidth:'80px',
                   data:[
                     {  id:1,label:'วิทยากรในประเทศ'    },
                     {  id:2,label:'วิทยากรต่างประเทศ'    },
                     {  id:3,label:'ประชุมวิชาการในประเทศ'    },
                     {  id:3,label:'ประชุมวิชาการในประเทศ'    },
                     {  id:4,label:'ประชุมวิชาการต่างประเทศ'    },
                     {  id:5,label:'ประชุมอื่นๆ'    },
                     {  id:6,label:'อบรม / ดูงานในประเทศ'    },
                     {  id:6,label:'อบรม / ดูงานต่างประเทศ'    },
                     {  id:7,label:'บริการวิชาการ'    },
                     {  id:8,label:'ศิลปวัฒนธรรม'    },
                   ]
                   "
                   id="activities"   name="activities"
                   style="width:250px;height: 40px;"  />
        </div>
        
        <div style="padding: 5px">
            <input class="easyui-datebox"  
                   data-options=" label:'ตั้งแต่วันที่' , labelPosition:'left' , labelWidth:'80px',   "
                   style="width:230px;height: 40px;" id="begin_date"  name="begin_date"  >
        </div>
        
        <div style="padding: 5px">
             <input class="easyui-datebox"  
                   data-options=" label:'ถึงวันที่' , labelPosition:'left' , labelWidth:'80px',   "
                   style="width:230px;height: 40px;" id="end_date_calendar"  name="end_date_calendar"  >
        </div>
        
        <div style="padding: 5px">
            <input class="easyui-textbox"  data-options="
                   label:'หัวข้อ',
                   labelWidth:'80px',
                  
                   multiline:'true',
              
               
                   "
                   style="width:300px;height: 40px;"
                   id="subject_calendar" name="subject_calendar"
                   />
            
        </div>
        
        <div style="padding: 5px">
            <input class="easyui-textbox"  data-options="
                   label:'สถานที่',
                   labelWidth:'80px',
                   
                   multiline:'true',
                 
                  
                   "
                   id="place"  name="place"
                   style="width:300px;height: 40px;"
               
                   /> 
        </div>
        
        <div style="padding: 5px">
            <input class="easyui-textbox"  data-options="
                   label:'รายละเอียด',
                   labelWidth:'80px',
                   
                   multiline:'true',
                 
                  
                   "
                   id="detail"  name="detail"
                   style="width:300px;height: 40px;"
               
                   /> 
        </div>
        
        <div style="padding: 5px">
            <input class="easyui-numberbox"  data-options="
                   label:'ค่าใช้จ่าย(บาท)',
                   labelWidth:'100px',
                   precision:'2',
                   "
                   id="expenses"  name="expenses"
                   style="width:200px;height: 40px;"
                   
                   /> 
        </div>
        
                <div style="padding: 5px">
                    <input class="easyui-numberbox"  data-options="
                           label:'เงินยืม(บาท)',
                           labelWidth:'100px',
                           precision:'2',
                           "
                           id="borrow"  name="borrow"
                           style="width:200px;height: 40px;"
                           /> 
               </div>
        
                    <div style="padding: 5px">
                    <input class="easyui-textbox"  data-options="
                           label:'หมายเหตุ',
                           labelWidth:'80px',
                           
                           "
                           style="width:300px;height: 40px;"
                           id="remark" name="remark"
                           /> 
               </div>
        
                <div  style="padding: 5px;">
                    <input class="easyui-textbox" 
                           id="id_calendar"  name="id_calendar" 
                           data-options="
                           readonly:true,
                           
                           "
                           style="width:50px;height: 40px;"
                           />
                </div>
        
    </form>
    
</div>

<!-- form  กิจกรรมทางวิชาการ -->


<!--  dialog datagrid -->
<div class="easyui-dialog"  data-options="
     closed:false,
     title:'ตารางงาน กิจกรรม',
     iconCls:'icon-man',
     size:'large',
     
            toolbar:[
                  { text:'รีโหลด' , iconCls:'icon-reload', size:'large', handler:function(){  $('#datagrid_detail_main').datagrid('reload');  }  },
                  { text:'แก้ไข', iconCls:'icon-edit', size:'large', 
                         handler:function()
                         { //begin function  
                         
                             // datagrid_detail_main
                              var  row=$('#datagrid_detail_main').datagrid('getSelected');
                              if( row )
                              {
                                     var  id_calendar=row.id_calendar;
                                     if(    id_calendar > 0   )
                                     { //begin if
                                     
                                          $('#dia_form_calendar').dialog('open');
                                          $('#id_calendar').textbox('setValue',id_calendar);
                                          
                                          
                                          
                                          $.post('<?=base_url()?>index.php/welcome/call_update_calendar', {  id_calendar : id_calendar   } ,
                                                function(data)
                                                { //begin function

                                                      //alert(data);
                                                      $.each(data,function(v,k)
                                                       { //each
                                                            var  id_academic=k.id_academic;
                                                            // alert( id_academic );
                                                            $('#id_academic').combogrid('setValue',id_academic);
                                                            var  activities=k.activities;
                                                            //alert( activities );
                                                            $('#activities').combobox('setValue',activities);
                                                            
                                                            
                                                            var   begin_date=k.begin_date;
                                                            //alert( 	begin_date );  //2017-10-26  ให้แปลงเป็น 09/27/2017
                                                            var  sp_begin=begin_date.split('-');
                                                            var conv_begin_date=sp_begin[1]+'/'+sp_begin[2]+'/'+sp_begin[0];
                                                            //alert( conv_begin_date  );
                                                            $('#begin_date').datebox('setValue',conv_begin_date);
                                                            
                                                            
                                                            var  end_date=k.end_date;
                                                           // alert( end_date );
                                                            var  sp_end=end_date.split('-');
                                                            
                                                            var conv_end_date=sp_end[1]+'/'+sp_end[2]+'/'+sp_end[0];
                                                            //alert( conv_end_date );
                                                            $('#end_date_calendar').datebox('setValue',conv_end_date );
                                                            
                                                            
                                                            var  subject=k.subject;
                                                           // alert( subject );
                                                            $('#subject_calendar').textbox('setValue',subject);
                                                            
                                                            
                                                            var place=k.place;
                                                            //alert( place );
                                                            $('#place').textbox('setValue',place);
                                                            
                                                            
                                                            var  detail=k.detail;
                                                            //alert( detail );
                                                            $('#detail').textbox('setValue',detail);
                                                            
                                                            var  expenses=k.expenses;
                                                            //alert( expenses );
                                                            $('#expenses').textbox('setValue',expenses);
                                                            
                                                            var  borrow=k.borrow;
                                                            //alert( borrow );
                                                            $('#borrow').textbox('setValue',borrow);
                                                            
                                                            
                                                            var  remark=k.remark;
                                                            //alert( remark );
                                                            $('#remark').textbox('setValue',remark);


                                                       }); //each

                                                },'json'); //end function
                                          
    
                                     } //end if
                              }     
                         } //end function
                   },
                   { text:'ลบ',iconCls:'icon-cancel', 
                        handler:function()
                        {//begin function  
                                var   row=  $('#datagrid_detail_main').datagrid('getSelected');
                                if( row )
                                {
                                      var   id_calendar=row.id_calendar;
                                      //alert( id_calendar );
                                       if(  id_calendar > 0 )
                                       {
                                              var  url='<?=base_url()?>index.php/welcome/delete_calendar';
                                              //alert(url);
                                              $.post(url,{ id_calendar:id_calendar  },function(data)
                                                 { //begin function
                                                       // alert(data);
                                                       var  success=data.success;
                                                       //alert( success );
                                                       if(  success == 1  )
                                                       {
                                                             $.messager.alert('ลบข้อมูลสำเร็จ','สถานะการลบข้อมูลสำเร็จ','info');
                                                             $('#datagrid_detail_main').datagrid('reload');
                                                             
                                                       }else if( success == 0 )
                                                       {
                                                              $.messager.alert('ลบข้อมูลผิดพลาด','ลบข้อมูลผิดพลาด','error');
                                                              $('#datagrid_detail_main').datagrid('reload');
                                                       }
                                                 
                                                 },'json');  //end function
                                       }
                                }
                        } //end function
                    },
            ],
     
            buttons:[
              { 
                  text:'ปิด',iconCls:'icon-cancel' , size:'large', iconAlign:'left'     ,handler:function()
                    { 
                        $('#dia_detail_main').dialog('close');   
                    } 
                  
               }
            ]
            
     
     "   
     id="dia_detail_main"
     style="width:550px;height: 300px;"
     >
    
    <div  class="easyui-datagrid"  data-options="
            url:'<?=base_url()?>index.php/welcome/call_date_calendar',
            singleSelect:true,
            rownumbers:true,
            resizable:false,
            
            columns:[[
              {  field:'firstname_academic', title:'อาจารย์',   },
              {  field:'lastname_academic',title:'นามสกุล', },
              {  field:'activities',title:'กิจกรรม', },
              {  field:'begin_date',title:'ตั้งแต่วันที่', },
              {  field:'end_date',title:'ถึงวันที่', },
              {  field:'subject',title:'หัวข้อ', },
              {  field:'place',title:'สถานที่', }, 
              {  field:'detail',title:'รายละเอียด', }, 
              {  field:'expenses',title:'ค่าใช้จ่าย(บาท)', }, 
              {  field:'borrow',title:'เงินยืม(บาท)', }, 
              {  field:'remark',title:'หมายเหตุ', }, 
              {  field:'remark',title:'หมายเหตุ', }, 
              {  field:'date_record',title:'วันที่บันทึก', }, 
            ]],

          "  
          id="datagrid_detail_main"
          >
        
    </div>
    
</div>
<!--  dialog datagrid -->


<!--  เลือกสถานะการบันทึกข้อมูล  -->


<!--  เลือกสถานะการบันทึกข้อมูล  -->