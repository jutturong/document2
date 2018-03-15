
<!--  http://w3widgets.com/responsive-calendar/#options  -->
<script type="text/javascript"  >
     $(document).ready(function(){
           var  sr_time='<?=date("Y-m")?>';  
           $(".responsive-calendar").responsiveCalendar({ 
                       time: sr_time,
                       events:{
                                      <?php
                                           $tb="tb_calendar";
                                           $q=$this->db->get($tb);
                                           $num=$q->num_rows();
                                           foreach ($q->result() as $row)
                                           {
                                               $begin_date=$row->begin_date;
                                               $q2=$this->db->get_where($tb,array("begin_date"=>$begin_date));
                                               $num_work=$q2->num_rows();
                                               ?>
                                                    '<?=$begin_date?>':
                                                        {       'number':'<?=$num_work?>',
                                                                 'badgeClass': 'badge-warning',
                                                        },           
                                                <?php               
                                           }
                                        ?>
                                    },
                        onDayClick:function(events){ 
                                     key = addLeadingZero( $(this).data('month') )    +  '/'    +   addLeadingZero( $(this).data('day') )  +  '/'   +   $(this).data('year');
                                     $('#dia_form_calendar').dialog('open');  
                                     $('#begin_date').datebox('setValue',key);   //  ->แปลงให้เป็น   10/28/2017
                        },
                        onActiveDayClick(events){
                             $('#dia_form_calendar').dialog('close');  
                             var thisDayEvent, key;
                                  key = addLeadingZero( $(this).data('month') )    +  '/'    +   addLeadingZero( $(this).data('day') )  +  '/'   +   $(this).data('year');
                                  //--------------------------------------------------------------------------------------------
                                          var  url='<?=base_url()?>index.php/welcome/call_by_date_calendar';
                                          //dia_detail_main
                                                 $.post(url,{ begin_date: key },function(data)
                                                 { //begin function
                                                        //alert(data);
                                                           $.each(data,function(v,k){
                                                                  $('#dia_detail_main').dialog('open');
                                                                  $('#datagrid_detail_main').datagrid('loadData',data);     
                                                           });
                                                 },'json'); //end fuction
                                  //--------------------------------------------------------------------------------------------
                        },                           
           });
 
     });

                                    function addLeadingZero(num)
                                    {
                                                   if (num < 10) {
                                                     return "0" + num;
                                                   } else {
                                                     return "" + num;
                                                   }
                                    }
</script>



<!-- Responsive calendar - START -->
<div class="responsive-calendar">
  <div class="controls">
      <a class="pull-left" data-go="prev"><div class="btn"><i class="icon-chevron-left"></i></div></a>
      <h4><span data-head-year></span> <span data-head-month></span></h4>
      <a class="pull-right" data-go="next"><div class="btn"><i class="icon-chevron-right"></i></div></a>
  </div><hr/>
  <div class="day-headers">
    <div class="day header">Mon</div>
    <div class="day header">Tue</div>
    <div class="day header">Wed</div>
    <div class="day header">Thu</div>
    <div class="day header">Fri</div>
    <div class="day header">Sat</div>
    <div class="day header">Sun</div>
  </div>
  <div class="days" data-group="days">
    <!-- the place where days will be generated -->
  </div>
</div>
<!-- Responsive calendar - END -->