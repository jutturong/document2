<!--  คู่มือการใช้งาน  http://w3widgets.com/responsive-calendar/#presentation   -->






<!DOCTYPE html>
<html lang="en">
    
    
  <head>
      
      
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta name="distributor" content="Global" />
    <meta itemprop="contentRating" content="General" />
    <meta name="robots" content="All" />
    <meta name="revisit-after" content="7 days" />
    <meta name="description" content="The source of truly unique and awesome jquery plugins." />
    <meta name="keywords" content="slider, carousel, responsive, swipe, one to one movement, touch devices, jquery, plugin, bootstrap compatible, html5, css3" />
    <meta name="author" content="w3widgets.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
    
    
    <!-- Bootstrap -->
    <!--  ลบเนื่องจากทำให้ css ชนกัน
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    -->
    
    
    <!-- Respomsive slider -->
   
      <script src="<?=base_url()?>responsive-calendar/0.9/js/responsive-calendar.js"></script>
     <link href="<?=base_url()?>responsive-calendar/0.9/css/responsive-calendar.css" rel="stylesheet" media="screen">
     
     
     
     
      <script type="text/javascript">
     
                $(document).ready(function() 
                {
                       $('#firstname_academic_sr').material_select(); //ชื่อ-นามสกุล

                });
                
              
    
    function  search_calendar1()  //ค้นหา
   {
            // alert('t');
             // alert( $('#firstname_academic_sr').val()  );
            //http://localhost/document/index.php/welcome/search_main_calendar
             $('#sub11').load("<?=base_url()?>index.php/welcome/search_main_calendar/"  +  $('#firstname_academic_sr').val()  , { "firstname_academic" :  $('#firstname_academic_sr').val()   }  );
           
              return false;
           
   }

    
       </script>  
  
  
  
     
  </head>
  
  <br/>
  <br/>
  
  <body>
      
   
      
     <!-- 
  <div class="row">
    <form class="col s12">
        
      <div class="row">
          

        <div class="input-field col s6">
            <select id="firstname_academic_sr" name="firstname_academic_sr" onchange=" search_calendar1()  " >
                        <option value="" disabled selected>Choose your option</option>
                        <?php   $this->user_model->select_academic();  ?>
                   </select>
                   <label> ชื่อ-นามสกุล : </label>
        </div>

          
      </div>
        

    </form>
  </div>
     --> 
      
      
       

    <div class="container">
      <!-- Responsive calendar - START -->
    	<div class="responsive-calendar">
        <div class="controls">
            <a class="pull-left" data-go="prev">    <div class="btn btn-primary">
                    <i class="material-icons left">fast_rewind</i> Prev</div></a>
            
            <!--
            <h4>
                <span data-head-year></span> <span data-head-month></span>
              <?=nbs(2)?><?php   echo  date("d");    ?><?=nbs(2)?>
            </h4>
            -->
            
              
            
                         <!--   <a class="btn-large disabled">       </a> -->
                         <h4>
                             <?=nbs(2)?>
                             <i class="material-icons">av_timer</i>  <?php   echo  date("d/m/Y");    ?>
                             <?=nbs(2)?>
                         </h4>
            
            <a class="pull-right" data-go="next"><div class="btn btn-primary"><i class="material-icons left">fast_forward</i>Next</div></a>
            
                    
            
            
                    
            
                                 
            
            
                         
            
            
                     
            
            
        </div>
            
            <hr/>
            
            
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
          
        </div>
            
      </div>
      
      <!-- Responsive calendar - END -->
      
      
    </div>
      
      
      <!--
    <script src="<?=base_url()?>responsive-calendar/0.9/js/jquery.js"></script>
      -->
    <script src="<?=base_url()?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>responsive-calendar/0.9/js/responsive-calendar.js"></script>
    
    
    <!--
    <script type="text/javascript"> 
      $(document).ready(function () {
            var  sr_time='<?=date("Y-m")?>';
        $(".responsive-calendar").responsiveCalendar({
         // time: '2013-05',
           time: sr_time ,
          events: {
            "2017-01-30": {"number": 5, "url": "http://w3widgets.com/responsive-slider"},
            "2017-02-26": {"number": 1, "url": "http://w3widgets.com"}, 
            "2017-02-03":{"number": 1}, 
              "2017-02-04":{"number": 2}, 
              "2017-02-08": {"number": 5, "badgeClass": "badge-warning", "url": "http://www.sanook.com"},
            "2017-03-12": {}}
        });
        
      });
    </script>
    -->
  
    

    
    
    
<script type="text/javascript"> 
          
          
         /*
          $(document).ready(function () {
               var  sr_time='<?=date("Y-m")?>';      
                $(".responsive-calendar").responsiveCalendar({
                   //  time: '2017-02',
           time: sr_time ,
          events:
                  {
                      
            "2017-02-02": {"number": 1, "url": "http://w3widgets.com" , }, 
           "2017-02-03":{"number": 1 , dayClick:function(){ alert('t'); }  }, 
              "2017-02-04":{"number": 2}, 
              "2017-02-08": {"number": 5, "badgeClass": "badge-warning", "url": "http://www.sanook.com"},
           "2017-03-12": {}

                    }

                         });
        });
        */
           
         
         
  /*        
 function dia_delete2(id)
    {
          $(document).ready(function()
          {
                    //    $('.modal').modal();
                   //  $('#modal_delete').modal('open');
                 //   $('#modal_delete1').modal('open');
                  Materialize.toast('Delete function', 1000, 'rounded' ,function()
                    {
                          //alert(id);
                          var  r=confirm("คุณต้องการลบข้อมูลหรือไม่");
                          if(r==true){
                                //alert(id);
                                window.location.assign("<?=base_url()?>index.php/welcome/del_main_academic/" + id + "/");
                                
                                
                          }
                          else
                          {
                               //  alert(id);
                               
                          }
                        
                    });
          });
    }
    */
    
    
                   
         $(document).ready(function () { 
                     var  sr_time='<?=date("Y-m")?>';  
                     $(".responsive-calendar").responsiveCalendar({  
                     //   $("#calendar").responsiveCalendar({   
                                  time: sr_time ,   
                                  left:   'title',
                                  events:
                                    {

                            /*
                               "2017-02-01": {"number": 1, "url": "http://w3widgets.com" , }, 
                              "2017-02-02": {"number": 1, "url": "http://w3widgets.com" , }, 
                             "2017-02-03":{"number": 1 , dayClick:function(){ alert('t'); }  }, 
                                "2017-02-04":{"number": 2}, 
                                "2017-02-08": {"number": 5, "badgeClass": "badge-warning", "url": "http://www.sanook.com"},
                             "2017-03-12": {},
                            */ 
                   
                   // "url" : '<?=base_url()?>index.php/welcome/detail_calendar/',  
                             
                              <?php
                                        $tbrow="tb_main_academic";
                                        foreach($q->result() as $row)
                                        {
                                                 
                                                 $begin_date=$row->begin_date;
                                                 // echo br();
                                                 $end_date=$row->end_date;
                                                //echo br();
                                                    
                                                    $qn=$this->db->get_where($tbrow,array("begin_date"=>$begin_date));
                                                    $num_q=  $qn->num_rows();
                                                      ?>
                                                               "<?=$begin_date?>": 
                                                                    {"number":  <?=$num_q?>   , 
                                                                     // "badgeClass": "badge-warning" ,
                                                                    //  "class": "active special" ,  
                                                                    //  "badgeClass": "badge-error",
                                                                      "url" : '<?=base_url()?>index.php/welcome/detail_calendar/<?=$begin_date?>'   , 
                                                                   },                 
                                                      <?php
                                        }
                                 ?>
                                        

                                      },
                                              
                                   
                                    onDayHover: function(events) 
                                   { 
                                            // alert('Day was clicked')
                                            //  alert(events);
                                           //modal_calendar1
                                           
                                              // $('#modal_calendar1').modal('open');

                                           
                                         //  $(document).ready(function()
                                           //  {
                                                  
                                                          // $('#modal_calendar1').modal('open');
                                            // });  
                                           
                                         //    var  url=  '<?=base_url()?>index.php/welcome/detail_calendar/'';
                                         //    window.open('<?=base_url()?>index.php/welcome/detail_calendar/','','width=500,height=500');
                                         

                                   }
                                   ,
                                        
                                                
                                           /*
                                   onActiveDayHover:function(events)
                                   {
                                          //alert('Day was clicked');
                                           <?php
                                                 $tbrow2="tb_main_academic";
                                                 foreach($q->result() as $row)
                                                 {
                                                
                                                 $begin_date=$row->begin_date;
                                                 // echo br();
                                                 $end_date=$row->end_date;
                                                //echo br();
                                                      ?>
                                                            alert('<?=$begin_date?>');
                                                      <?php
                                                 }
                                           ?>
                                   }
                                                       */
                                      
                    
                      });
               
               
            
                 /*  
              $(".responsive-calendar").click(function()
              {
                  
                 // $(function(){
                      
                        //alert('t'); 
                     //   $('#modal_calendar').modal();
                   
                //  });

               });
               */
               
               
               
                    /*              
                   $(".responsive-calendar").responsiveCalendar({ 
                         onDayClick: function(events) { alert('Day was clicked') }
                   });
                  */
                 
                      
         });
  
</script>  
      
        

        
     
  </body>
  
  
  
</html>