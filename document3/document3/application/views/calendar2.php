

<!--
<script>
$( document ).ready( function() {
  $(".responsive-calendar").responsiveCalendar({
    time: '2017-10',
    events: {
      "2017-10-30": {"number": 5, "badgeClass": "badge-warning", "url": "http://w3widgets.com/responsive-calendar"},
      "2017-10-26": {"number": 1, "badgeClass": "badge-warning", "url": "http://w3widgets.com"}, 
      "2017-10-03": {"number": 1, "badgeClass": "badge-error"}, 
      "2017-10-12": {}}
  });
});
</script>
-->

<script type="text/javascript">
    
    
    function clear_from()
    {
        $(function(){

              $('#activities').combobox('setValue','');
                  //$('#begin_date').datebox('setValue','');
                  $('#end_date_calendar').datebox('setValue','');
                  $('#subject_calendar').textbox('setValue','');
                  $('#place').textbox('setValue','');
                  $('#detail').textbox('setValue','');
                  $('#expenses').textbox('setValue','');
                  $('#borrow').textbox('setValue','');
                  $('#remark').textbox('setValue','');
                  
                 $('#id_academic').textbox('setValue','');
                 $('#id_calendar').textbox('setValue',''); 
        });            
                 
    }
    
    
 
     
    
    </script>
    



    
<div class="easyui-dialog"  data-options="
     closed:true,
     title:'ตารางงาน',
     iconCls:'icon-lock',
     size:'large',
     
     buttons:[
        {
           text:'ค้นหา',iconCls:'icon-search',size:'large', iconAlign:'left', 
           handler:function()
              { 
                    //alert('t'); 
                    $('#dia_search_calendar').dialog('open');
                    
              }
        },   
     
        { text:'รีโหลด',iconCls:'icon-reload',size:'large',iconAlign:'left',handler:function()
                          {   
                                       $('#load_calendar').load('<?=base_url()?>index.php/welcome/load_calendar');   
                          } 
        },
     
        { text:'เพิ่มข้อมูล',iconCls:'icon-add',size:'large',iconAlign:'left', 
                      handler:function()
                          {    
                                   $('#dia_form_calendar').dialog('open'); 
                                   clear_from();
                                   
                          } 
        },
        { text:'ปิด',iconCls:'icon-cancel',size:'large',iconAlign:'left',handler:function(){ $('#dia_main_calendar2').dialog('close');  }  },
        
     ]
     
     "  style="width:400px;height: 400px;padding: 0px;"  id="dia_main_calendar2"  name="dia_main_calendar2"  >
    
    


    <div  id="load_calendar">
          <?php   //$this->load->view("load_calendar");   ?>
    </div>


</div>






<!--  dialog datagrid -->
<div class="easyui-dialog"  data-options="
     closed:true,
     title:'ตารางงานกิจกรรม',
     iconCls:'icon-man',
     size:'large',
     
            toolbar:[
                  { text:'รีโหลด' , iconCls:'icon-reload', size:'large', handler:function()
                         { //begin function
                              $('#datagrid_detail_main').datagrid('reload'); 
                              $('#load_calendar').load('<?=base_url()?>index.php/welcome/load_calendar');  
                         } //end function 
                   }, //end text
                  { text:'แก้ไข', iconCls:'icon-edit', size:'large', 
                         handler:function()
                         { //begin function  
                         
                             //alert('test');
                             
                            //clear_from();
                            //------------------------------------------------
                              $('#activities').combobox('setValue','');
                                //$('#begin_date').datebox('setValue','');
                                $('#end_date_calendar').datebox('setValue','');
                                $('#subject_calendar').textbox('setValue','');
                                $('#place').textbox('setValue','');
                                $('#detail').textbox('setValue','');
                                $('#expenses').textbox('setValue','');
                                $('#borrow').textbox('setValue','');
                                $('#remark').textbox('setValue','');
                  
                                $('#id_academic').textbox('setValue','');
                                $('#id_calendar').textbox('setValue','');
                            //-------------------------------------------------
                            
                             // datagrid_detail_main
                              var  row=$('#datagrid_detail_main').datagrid('getSelected');
                              if( row )
                              {
                                     var  id_calendar=row.id_calendar;
                                     //alert(  id_calendar );
                                     
                                     if(    id_calendar > 0   )
                                     { //begin if
                                     
                                          $('#dia_form_calendar').dialog('open');
                                          $('#id_calendar').textbox('setValue',id_calendar);
                                          
                                          
                                          
                                          $.post('<?=base_url()?>index.php/welcome/call_id_update_calendar', {  id_calendar : id_calendar   } ,
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
                   {
                      text:'บันทึกข้อมูลเพิ่ม',iconCls:'icon-add',size:'large',
                      handler:function()
                        {
                        
                        
                            $('#dia_form_calendar').dialog('open');
                            clear_from();
                            
                            
                            
                            
                        }
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
                                                             
                                                                  //---------------------------------------------------------------------------------------------------------------
                                                                        //call_by_date_calendar
                                                                        var  url='<?=base_url()?>index.php/welcome/call_by_date_calendar';
                                                                        var  begin_date=$('#begin_date').datebox('getValue');
                                                                        //alert( begin_date);
                                                                        $.post(url,{ begin_date: begin_date },function(data)
                                                                        {

                                                                                 $('#dia_detail_main').dialog('open');
                                                                                 $('#datagrid_detail_main').datagrid('loadData',data);

                                                                        },'json' );
                                                                  //---------------------------------------------------------------------------------------------------------------- 
                                                                  $('#load_calendar').load('<?=base_url()?>index.php/welcome/load_calendar');  
                                                             
                                                             
                                                       }else if( success == 0 )
                                                       {
                                                              $.messager.alert('ลบข้อมูลผิดพลาด','ลบข้อมูลผิดพลาด','error');
                                                              $('#datagrid_detail_main').datagrid('reload');
                                                              
                                                                  //---------------------------------------------------------------------------------------------------------------
                                                                        //call_by_date_calendar
                                                                        var  url='<?=base_url()?>index.php/welcome/call_by_date_calendar';
                                                                        var  begin_date=$('#begin_date').datebox('getValue');
                                                                        //alert( begin_date);
                                                                        $.post(url,{ begin_date: begin_date },function(data)
                                                                        {

                                                                                 $('#dia_detail_main').dialog('open');
                                                                                 $('#datagrid_detail_main').datagrid('loadData',data);

                                                                        },'json' );
                                                                  //---------------------------------------------------------------------------------------------------------------- 
                                                                   $('#load_calendar').load('<?=base_url()?>index.php/welcome/load_calendar');  
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
              {  field:'firstname_academic', title:'ชื่อ'  },
              {  field:'lastname_academic',title:'นามสกุล' },
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
                              
                               $('#load_calendar').load('<?=base_url()?>index.php/welcome/load_calendar');    
                               
                               
                               
                         }
                         else if(  data==0  )
                         {
                              $.messager.alert('ไม่สามารถบันทึกข้อความได้','ไม่สามารถบันทึกได้','error');
                              $('#dia_form_calendar').dialog('close'); 
                               $('#load_calendar').load('<?=base_url()?>index.php/welcome/load_calendar');      
                         }
                         else if( data == 11  )
                                 {
                                      $.messager.alert('อยู่ในสถานะการแก้ไขข้อมูล','อยู่ในสถานะการแก้ไขข้อมูล','error');
                                      $('#load_calendar').load('<?=base_url()?>index.php/welcome/load_calendar');      
                                      
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
                                            //---------------------------------------------------------------------------------------------------------------
                                             //call_by_date_calendar
                                             var  url='<?=base_url()?>index.php/welcome/call_by_date_calendar';
                                             var  begin_date=$('#begin_date').datebox('getValue');
                                             //alert( begin_date);
                                             $.post(url,{ begin_date: begin_date },function(data)
                                             {

                                                      $('#dia_detail_main').dialog('open');
                                                      $('#datagrid_detail_main').datagrid('loadData',data);

                                             },'json' );
                                             //---------------------------------------------------------------------------------------------------------------- 
                                              $('#load_calendar').load('<?=base_url()?>index.php/welcome/load_calendar');  
                                }
                                else if(  success == 0  )
                                {
                                        $.messager.alert('สถานะการแก้ไขข้อมูลล้มเหลว','แก้ไขข้อมูลล้มเหลว','error');
                                            //---------------------------------------------------------------------------------------------------------------
                                            //call_by_date_calendar
                                            var  url='<?=base_url()?>index.php/welcome/call_by_date_calendar';
                                            var  begin_date=$('#begin_date').datebox('getValue');
                                            //alert( begin_date);
                                            $.post(url,{ begin_date: begin_date },function(data)
                                            {

                                                     $('#dia_detail_main').dialog('open');
                                                     $('#datagrid_detail_main').datagrid('loadData',data);

                                            },'json' );
                                            //----------------------------------------------------------------------------------------------------------------
                                             $('#load_calendar').load('<?=base_url()?>index.php/welcome/load_calendar');  
                                }
                                 else if(  success == 11  )
                                 {
                                        $.messager.alert('กรุณาตรวจสอบวิธีการแก้ไขข้อมูล','ตรวจสอบการแก้ไขข้อมูลใหม่','error');
                                                //---------------------------------------------------------------------------------------------------------------
                                             //call_by_date_calendar
                                             var  url='<?=base_url()?>index.php/welcome/call_by_date_calendar';
                                             var  begin_date=$('#begin_date').datebox('getValue');
                                             //alert( begin_date);
                                             $.post(url,{ begin_date: begin_date },function(data)
                                             {

                                                      $('#dia_detail_main').dialog('open');
                                                      $('#datagrid_detail_main').datagrid('loadData',data);

                                             },'json' );
                                             //----------------------------------------------------------------------------------------------------------------
                                              $('#load_calendar').load('<?=base_url()?>index.php/welcome/load_calendar');  
                                 }
                                 
                                 $('#dia_form_calendar').dialog('close');  
                          
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
       {
           text:'แสดงข้อมูลทั้งหมด', iconCls:'icon-add',size:'large',iconAlign:'left',
           handler:function()
           {
                 //alert('t');
                  $('#dia_detail_main').dialog('open');
                
           }
       },  
       { text:'ปิด',iconCls:'icon-cancel',size:'large',iconAlign:'left',handler:function(){ $('#dia_form_calendar').dialog('close');  } },
       
     ]
     
     "  id="dia_form_calendar"  style="width:500px;height: 500px;padding: 10px;"  >
    
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
<div class="easyui-dialog"
     data-options="
       closed:true,
       title:'ค้นหากิจกรรมทางวิชาการ',
       iconCls:'icon-search',
       size:'large',
       buttons:[
       
          { text:'ค้นหา',iconCls:'icon-search',size:'large', 
              handler:function()
                 {  
                     
                      
                      var  url='<?=base_url()?>index.php/welcome/search_calendar';
                     
                     // alert(url);   
                      
                     
                      
                      $.ajax({
                         url:url,
                         data:$('#fr_search').serialize(),
                       //  dataType:'text',
                         dataType:'json',
                         method:'post',
                         
                      }).done(function(data)
                      {
                      
                          //   alert(data);
                       
                           
                           $('#dia_detail_main').dialog('open');
                           $('#datagrid_detail_main').datagrid('loadData',data);
                           
                           
                      });//end function
                      
                      
                      
                  } 
           },
           {
             text:'ล้าง',iconCls:'icon-cancel',size:'large',handler:function()
                {
                     $('#sr_id_academic').combogrid('setValue','');
                     $('#sr_activities').combobox('setValue','');
                     $('#sr_begin_date').datebox('setValue','');
                }
           },
          { text:'ปิด',iconCls:'icon-cancel',size:'large',
               handler:function(){   $('#dia_search_calendar').dialog('close');   }  }
          
       ]
       
       
     "
     
     id="dia_search_calendar"  style="width:400px;height: 250px;"  >
    
        
    <form  id="fr_search"  >
        

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

                              "  id="sr_id_academic"  name="sr_id_academic"  style="width:300px;height: 40px;"  >

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
                   id="sr_activities"   name="sr_activities"
                   style="width:250px;height: 40px;"  />
        </div>
        
                <div style="padding: 5px">
                        <input class="easyui-datebox"  
                               data-options=" label:'ตั้งแต่วันที่' , labelPosition:'left' , labelWidth:'80px',   "
                               style="width:230px;height: 40px;" id="sr_begin_date"  name="sr_begin_date"  >
               </div>
        
        

          </form>
   
    
</div>
<!-- dialog การค้นหากิจกรรม -->

