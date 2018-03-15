<script type="text/javascript"   >
    
        $(function()
        {
            
                    $('#dia_sr3fc').dialog({

                          title:'ค้นหาเอกสาร รับ/ส่ง ทั้งหมด',
                          width:370,
                          height:270,
                          closed:true,
                          modal:true,
                          iconCls:'icon-man',
                          size:'large',
                          
                          /*
                          toolbar:[{
                                text:'ปิด',
                                iconCls:'icon-cancel',
                                
                                
                
                                  }]
                            */
                           
                           buttons:[
                               
                                {
                                    text:'ค้นหา',
                                    iconCls:'icon-search',
                                    size:'large',
                                   
                                    handler:function()
                                    {
                                          //alert('t');
                                         var    url='<?=base_url()?>index.php/welcome/searchall3function' 
                                          $.ajax({
                                              type:'POST',
                                              data:$('#fr_sr3fc').serialize(),
                                              url:url,
                                             // dataType:'text',
                                              dataType:'json',
                                              
                                          }).done(function(data)
                                          {
                                              
                                                // alert(data);
                                                 
                                                   $('#dia_sr3fc_sr').dialog('open');
                                                   //dg_sr3fc
                                                   $('#dg_sr3fc').datagrid('loadData',data);
                                                 
                                          });
                                        
                                    }
                              
                               
                               
                                 },
                                 {
                                    text:'ปิด',
                                    iconCls:'icon-cancel',
                                    size:'large',
                                    handler:function()
                                    {
                                        $('#txt_sr_to').textbox('setValue','');
                                        $('#dia_sr3fc').dialog('close');
                                    }
                                     
                                 },
                             
                                 ]
                           
                           
                              
                    });//end 1
                    
                    
                    

                    
                    
            
        });//end function

</script>


<div   class="easyui-dialog"      id="dia_sr3fc"  >
                 
    <form id="fr_sr3fc" class="easyui-form"  method="post"   enctype="multipart/form-data"  data-options="novalidate:true"  >
        
        
           <div class="easyui-panel" style="padding:5px">
        <ul class="easyui-tree">
            <li>
                <span>My Documents ( เอกสาร รับ/ส่ง ทั้ง 3 ส่วนงาน )</span>
                <ul>
                    <li data-options="state:'closed'">
                        <span>ศูนย์การดูและ ฯ และศูนย์ความเป็นเลิศ</span>
                        <!--
                        <ul>
                            <li>
                                <span>Friend</span>
                            </li>
                            <li>
                                <span>Wife</span>
                            </li>
                            <li>
                                <span>Company</span>
                            </li>
                        </ul>
                         -->
                    </li>
                    
                    <li data-options="state:'closed'">
                          <span>ศูนย์วิจัย ฯ </span>
                    </li>
                    
                      <li data-options="state:'closed'">
                          <span>มูลนิธิตะวันฉาย ฯ </span>
                    </li>
                    
                    
                    
                    <!--
                    <li>
                        <span>Program Files</span>
                        <ul>
                            <li>Intel</li>
                            <li>Java</li>
                            <li>Microsoft Office</li>
                            <li>Games</li>
                        </ul>
                    </li>
                    <li>index.html</li>
                    <li>about.html</li>
                    <li>welcome.html</li>
                    -->
                    
                    
                </ul>
            </li>
        </ul>
    </div>
        
        
        <div style="margin-top: 10px;margin-left: 10px;">

                   
            <input  label=" ชื่อ - นามสกุล "  name="txt_sr_to"  id="txt_sr_to"   class="easyui-textbox"  required="true"  style="width: 300px;height: 40px;margin:5px;"  />
                   
                   
                   <!--
                   <input   id="txt_sr_to"  name="txt_sr_to"  class="easyui-tagbox"  label=" ชื่อ - นามสกุล "   value="a"   style="width: 150px;height: 40px;margin:5px;"   />
                   -->
                   
        </div> 
        
        

        
        
                   
    </form>

           
         

      
</div>





<div class="easyui-dialog" 
      id="dia_sr3fc_sr"
     data-options="
         closed:true,
         title:'ค้นหาเอกสาร รับ/ส่ง ทั้งหมด',
         iconCls:'icon-search', 
         buttons:[
           {   
             text:'ปิด',
             iconCls:'icon-cancel',
             size:'large',
             handler:function()
                {
                    $('#dia_sr3fc_sr').dialog('close');
                }
           },
         ]
     "
     style="width:900px;height:300px;" 
    >
    
    <div class="easyui-datagrid" 
         id='dg_sr3fc'
         data-options="
         url:'<?=base_url()?>index.php/welcome/json_foundation',
         singleSelect:true,
         pagination:true,
          columns:[[

                                   { field:'ck',checkbox:true, },
                                   { field:'registration',title:'เลขส่ง',align:'left'  },
                                   { field:'at',title:'เลขที่เอกสาร',align:'left' },
                                   
                                      { field:'date_record',title:'วันทีลง รับ/ส่ง',align:'left' },
                                   
                                   { field:'date',title:'วันที่',align:'left' },
                                   {  field:'from',title:'จาก',align:'left' },
                                    {  field:'to',title:'ของ', align:'left' },
                                    {  field:'subject',title:'เรื่อง',align:'left' },
                                    {
                                         field:'filename',title:'Download file',align:'left',



                                    }
                 ]],
                  toolbar:[
                     //{  text:'Refresh' ,iconCls:'icon-reload',handler:function(){  $('#datagrid_foundation').datagrid('reload');  }   },
                    {  text:'ส่งออก',iconCls:'icon-print',size:'large',handler:function()
                           {

                               // window.open( '<?=base_url()?>index.php/welcome/export_data/'+  '1'  +  '/'  +  $('#type_document_foundation').combobox('getValue')  +  '/'    +    $('#to_foundation').combogrid('getValue') + '/' + $('#date_foundation').datebox('getValue')   );
                           
                                //var  to  =     $('#to_foundation').combogrid('getValue');
                                 var  to  =     $('#to_foundation').textbox('getValue');
                           //     var  date  =  $('#date_foundation').datebox('getValue');
                                
                                var  row=$('#dg_sr3fc').datagrid('getSelected');  //ทำการแยก วัน-เดือน-ปี ออกมา
                                // http://10.87.196.170/document3/index.php/welcome/export_data2/2/2/03/14/2018  ตัวอย่างการส่งข้อมูลวันที่ออกไป
                                
                                if( row )
                                {
                                       var  date_searching=row.date;
                                      // alert(date_searching);  // วันที่แสดงผลดังนี้   2018-01-10  
                                       //ให้ทำการแยกการค้นหาแบบ  เดือน-วัน-ปี     ให้ส่งมาแบบ  เดือน-วัน-ปี  => 01/10/2018
                                        var  split_date=date_searching.split('-');
                                        //ให้จัดแบบ เดือน วัน ปี   ตัวอย่าง 01/10/2018
                                        var   split_date2=  split_date[1] +  '/'  +  split_date[2]  +  '/'  +  split_date[0]   ;
                                        //alert(  split_date2 ); 
                                        //ตัวอย่างการส่งออก   http://10.87.196.170/document3/index.php/welcome/export_dataALL/01/10/2018/01/10/2018
                                        
                                         //var  date=  split_date2;
                                         
                                         var   	id_main1=row.id_main1;
                                         
                                         
                                         //alert( 	id_main1  );
                                         
                                         var  url = '<?=base_url()?>index.php/welcome/export_dataALL/'  +  id_main1  ;
                                         
                                          window.open(url);
                                }
                               
                                
                                /*
                                 if(  to == ''  &&  date == '' )
                                    {
                                    //ไม่ระบุอะไรเลย
                                  
                                      var  url= '<?=base_url()?>index.php/welcome/export_data1/'+  '1'  +  '/'  +   $('#type_document_foundation').combobox('getValue');
                                     }
                                     
                                else if(  to == ''  &&  date != ''    )
                                    {
                                    
                                      //ระบุแค่วันที่
                                   
                                     // http://10.87.196.170/document3/index.php/welcome/export_data2/2/2/03/14/2018  ตัวอย่างการส่งข้อมูลวันที่ออกไป
                                     
                                     
                                     var  url= '<?=base_url()?>index.php/welcome/export_data2/'+  '1'  +  '/'  +  $('#type_document_foundation').combobox('getValue')  + '/'  +   date;
                                     
                                     
                                    } 
                                    
                                    else if(    to != ''  &&  date == ''    )
                                   {
                                   //ระบุแค่ชื่อ
                                    var  url= '<?=base_url()?>index.php/welcome/export_data3/'+  '1'  +  '/'  +  $('#type_document_foundation').combobox('getValue') + '/'  +   to;
                                   }
                                   
                                   else if(   to != ''  &&  date != ''   )
                                   {
                                    //ระบุทั้งชื่อและวันที่
                                   var  url = '<?=base_url()?>index.php/welcome/export_data/'+  '1'  +  '/'  +   $('#type_document_foundation').combobox('getValue')  +  '/'    +   to  + '/' +  date; 
                                   }

                                    window.open(url);
                                  */
                               
                           },

                     },
                     {
                        text:'ดาวน์โหลด',iconCls:'icon-large-picture',size:'lagre',handler:function()
                         {
                              var  row=$('#datagrid_foundation').datagrid('getSelected');
                              if( row )
                              {
                                   var  filename=row.filename;
                                       if( filename.length > 0 )
                                       {
                                             var  url='<?=base_url()?>upload/' + filename  ;
                                              //alert(  url  );
                                              window.open(url,'','width=500,height=500');
                                       }

                              }
                         }
                     },
                     {
                        text:'แก้ไขข้อมูล', size:'large'  ,iconCls:'icon-edit',handler:function()
                         {
                              var  row=$('#datagrid_foundation').datagrid('getSelected');
                              var  id_main1=row.id_main1;
                              //   $type_document=2;  // 1=หนังสือรับ,2=หนังสือส่ง

                              //หนังสือรับ
                              //alert(id_main1);
                              
                              
                               if(  id_main1 >  0  &&  row.type_document == 1  )
                               {
                                        
                                    
                                      
                                          
                                          $('#dia_insert_foundation').dialog('open');
                                          $('#registration_foundation_receive21').textbox('setValue',row.registration); //เลขรับ
                                          $('#at_foundation_receive21').textbox('setValue',row.at);  //เลขที่เอกสาร
                                          $('#date1_foundation_receive21').datebox('setValue','');
                                          
                                           var  date_db=row.date;
                                          if(  date_db.length   >  3  )
                                          {
                                               var  str  = date_db.split('-');
                                               //alert(str[0]);
                                               var    y=str[0];
                                               var    m=str[1];
                                               var    d=str[2];
                                               var     dmy_conv= m + '/' + d + '/'  + y;
                                              // alert(dmy_conv);
                                               //$('#dd').datebox('setValue', '6/1/2012');
                                               $('#date1_foundation_receive21').datebox('setValue',dmy_conv ); //วันที่รับ
                                               
                                           }
                                           
                                           
                                           $('#from_foundation_receive21').textbox('setValue',row.from);  //'จาก'
                                           $('#to_foundation_receive21').textbox('setValue',row.to); //ถึง
                                           $('#subject_foundation_receive21').textbox('setValue',row.subject); //'เรื่อง
                                           $('#practice_foundation_receive21').textbox('setValue',row.practice);  //การปฏฺิบัติ
                                           $('#note_foundation_receive21').textbox('setValue',row.note); //หมายเหตุ
                                       
                                           $('#id_main1_foundation').textbox('setValue',row.id_main1);
                                          

                               }
                               else if( id_main1 >  0  &&  row.type_document == 2  )  //หนังสือส่ง
                               {
                                     //alert('หนังสือส่ง');
                                     //dia_insert_send_foundation
                                     $('#dia_insert_send_foundation').dialog('open');

                                      //alert(row.registration);
                                     
                                         $('#registration_send21_foundation').textbox('setValue', row.registration );

                                       var  date_db=row.date;
                                          if(  date_db.length   >  3  )
                                          {
                                               var  str  = date_db.split('-');
                                               //alert(str[0]);
                                               var    y=str[0];
                                               var    m=str[1];
                                               var    d=str[2];
                                               var     dmy_conv= m + '/' + d + '/'  + y;
                                              // alert(dmy_conv);
                                               //$('#dd').datebox('setValue', '6/1/2012');
                                              $('#date1_send21_foundation').datebox('setValue',dmy_conv ); //วันที่รับ
                                           }
                                           else
                                           {
                                              $('#date1_send21_foundation').datebox('setValue','' ); //วันที่รับ
                                           }

                                              $('#from_send21_foundation').textbox('setValue',row.from); //จาก
                                              $('#to_send21_foundation').textbox('setValue',row.to); //ถึง
                                              $('#subject_send21_foundation').textbox('setValue',row.subject); //เรื่อง       6
                                              $('#practice_send21_foundation').textbox('setValue',row.practice); //การปฏฺิบัติ       7
                                              $('#note_send21_foundation').textbox('setValue',row.note); //หมายเหตุ      8

                                              $('#id_main1_send_foundation').textbox('setValue',row.id_main1);

                               }

                          }
                     },
                     {
                        text:'ลบข้อมูล',  iconCls:'icon-cancel',size:'large',handler:function()
                                {
                                        var  row=$('#datagrid_foundation').datagrid('getSelected');

                                       $.messager.confirm('Delete Date Status','คุณแน่ใจว่าต้องการลบข้อมูล',function(r){

                                       if( r )
                                       {
                                                   // $.messager.progress();

                                                    if( row.id_main1 > 0 )
                                                    {

                                                          //alert(row.id_main1);
                                                          $.post('<?=base_url()?>index.php/welcome/delete_tb_main1_3/',{ id_main1: row.id_main1  },function(data)
                                                          {
                                                                    // alert(data);
                                                                  if( data == 1 )
                                                                  {


                                                                       $.messager.alert({
                                                                           title:'สถานะของการลบข้อมูล',
                                                                           msg:'ลบข้อมูลสำเร็จ',

                                                                       });


                                                                      //$.messager.alert('สถานะการลบขอ้มูล','ลบข้อมูลสำเร็จ');

                                                                    $('#datagrid_foundation').datagrid('reload');
                                                                     // location.reload();


                                                                   }
                                                                   else{

                                                                      $.messager.alert({
                                                                           title:'สถานะของการลบข้อมูล',
                                                                           msg:'ลบข้อมูลผิดพลาด',


                                                                       });

                                                                   }


                                                          });

                                                    }

                                       }

                                       });


                                }
                     }
                 ]
                 
         "
         ></div>
         
</div> 

    


