<script type="text/javascript" >

 // Initialize collapse button
  $(".button-collapse").sideNav({
          
            menuWidth: 300, // Default is 300
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true 
            
    });
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();
  
  
  //--- hint box
    $(document).ready(function()
    {
       $('.tooltipped').tooltip({delay: 50});
  });
  
  
  function  del(id)
  {
       // alert(id);
        var  cn=confirm('คุณแน่ใจว่าต้องการลบข้อมูลจริงหรือไม่');
        if( cn )
        {
             $.post('<?=base_url()?>index.php/welcome/del_vacation/'  + id ,function(data)
                {
                      // alert(data);
                       if(  data == 1 )
                       {
                             Materialize.toast('ลบข้อมูลสำเร็จ', 3000, 'rounded')
                            $('#sub11').load('<?=base_url()?>index.php/welcome/table_vacation');
                       }
                   else
                      {
                             Materialize.toast('ไม่สามารถลบข้อมูลได้', 3000, 'rounded')
                             $('#sub11').load('<?=base_url()?>index.php/welcome/table_vacation');
                      }
                       
                });
        }
  }
  
</script>

<nav>
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="#!" class="breadcrumb"> <i class="material-icons">room</i> ใบลาพักผ่อน</a>
        <a href="#" class="breadcrumb"  onclick="javascript:  $('#sub11').load('<?=base_url()?>index.php/welcome/form_vacation');  "  >      กรอกแบบฟอร์ม </a>
        <a href="#!" onclick="javascript:  $('#sub11').load('<?=base_url()?>index.php/welcome/table_vacation');   "  class="breadcrumb"> ข้อมูลทั้งหมด </a>
        
        <!--
        <a href="#!"  class="breadcrumb"  data-activates="slide-out"  > บริหารจัดการ </a>
        -->
      </div>
    </div>
  </nav>







  
  
  
  <!-- side nav  menu -->
     <!--  http://materializecss.com/side-nav.html  -->
     
      <table  class="striped" >
        <thead>
          <tr>
              
              <!--
              <th>
                  <i class="small  material-icons">view_stream</i>
                  วัน/เดือน/ปี</th>
              -->
              
              <th>
                    <i class="small  material-icons">class</i>
                  ชื่อ-นามสกุล</th>
              
              <th>
                  <!--
                  <i class="small  material-icons">payment</i>
                  -->
                  ออกรายงาน </th>
              
          </tr>
        </thead>

        <tbody>
            
            
            <!--
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            
            <td>  <a class="btn-large ">Button   <i class="material-icons right">picture_in_picture</i> </a>   </td> 
            
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
              <td>  <a class="btn-large ">Button   <i class="material-icons right">picture_in_picture</i> </a>   </td> 
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
             <td>  <a class="btn-large ">Button   <i class="material-icons right">picture_in_picture</i> </a>   </td> 
          </tr>
           -->
      
           <?php
               foreach ($query->result() as $row)
                   {
                             //   echo  $row->first_name;
                             $id_vacation=$row->id_vacation;
                    ?>
           
           
           
           
           
           <!-- side nav  menu -->
   <!--  http://materializecss.com/side-nav.html  -->
  <ul id="slide-out<?=$id_vacation?>" class="side-nav">
    <li><div class="userView">
      <div class="background">
        <img src="<?=base_url()?>images/office3.jpg">
      </div>
            
            
          
      <a href="#!user"><img class="circle" src="<?=base_url()?>images/yuna.jpg"></a>
      
      <a href="#!name"><span class="white-text name"><?=$row->first_name?><?=nbs(3)?><?=$row->last_name?></span></a>
      <a href="#!email"><span class="white-text email">(<?=$row->date_begin?>)<?=nbs(2)?>-<?=nbs(2)?>(<?=$row->end_date?>)</span></a>
      
       
      
    </div></li>
    <li>
        
        <!--
        <a href="#!"><i class="small  material-icons">perm_identity</i><?=$row->subject?></a>
         -->
         
    </li>
    
    <li>
        
        <!--
        <a href="#!">Second Link</a>
        -->
        
        <a class="waves-effect waves-light btn-large" onclick="  del(<?=$id_vacation?>)  "  >
              <i class="small  material-icons">shuffle</i>Delete
        </a>
        
    </li>
    
    <li><div class="divider"></div></li>
    
    <li>
        
        <!--
        <a class="subheader">Subheader</a>
         -->
         
         <a   onclick="javascript  :   $('#sub11').load('<?=base_url()?>index.php/welcome/load_update_vacation/'  +  <?=$id_vacation?>  );  "  class="waves-effect waves-light btn" >
               <i class="small  material-icons">settings_input_hdmi</i>Update
         </a>
    
    </li>
    
    <li>
        
        <!--
        <a class="waves-effect" href="#!">Third Link With Waves</a>
        -->
        <a class="waves-effect waves-light btn-large" onclick="  window.open('<?=base_url()?>report_pdf/docdb/report_vacation.php?id_vacation=<?=$row->id_vacation?>');   " ><i class="small  material-icons">person_pin</i>Report</a>
        
    </li>
    
    
  </ul>
<!-- side nav  menu -->





           <tr>
               
               <!--
                  <td>
                       <?=$row->date_write?>
                  </td>
                  -->
                  
                  
                  <td>
                      <i class="tiny  material-icons">room</i>
                           <!--  http://materializecss.com/side-nav.html  -->
                        <a  class="button-collapse"   data-activates="slide-out<?=$id_vacation?>"   >
                        
                                  

                                     <?=nbs(3)?>

                                <?=$row->first_name?>
                                <?=nbs(5)?>
                                <?=$row->last_name?>

                        </a>
      
    
   


      
      
                  </td>

                  <td>
                      
                      <i class="small  material-icons" onclick=" window.open('<?=base_url()?>report_pdf/docdb/report_vacation.php?id_vacation=<?=$row->id_vacation?>');  " >pause_circle_outline</i>
                      
                      
                      <!--
                      <a href="#" data-activates="slide-out" class="striped">
                          <i class="medium  material-icons">print</i>
                      </a>
                      -->
                      
                      
                  </td>
           </tr>
          
           
           
             
           
           

                          <?php
                   }
           ?>
          
          
        </tbody>
      </table>
     
     
     
     
     
     
     
     
     
     
     

            



