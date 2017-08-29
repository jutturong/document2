<script type="text/javascript">
    
 $(document).ready(function(){
    $('ul.tabs').tabs();
  });
  
  
  //--- วัน เดือน ปี
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format:'yyyy-mm-dd'
  });
     
     
</script>






<!--
http://materializecss.com/buttons.html
<a class="btn-large disabled">Button</a>
<a class="btn disabled">Button</a>
<a class="btn-flat disabled">Button</a>
<a class="btn-floating disabled"><i class="material-icons">add</i></a>
-->





<nav>
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="#!" class="breadcrumb"> <i class="material-icons">room</i> ใบลาพักผ่อน</a>
        <a href="#" class="breadcrumb"  onclick="javascript:  $('#sub11').load('<?=base_url()?>index.php/welcome/form_sick');  " >      กรอกแบบฟอร์ม </a>
        <a href="#!" onclick="javascript:  $('#sub11').load('<?=base_url()?>index.php/welcome/table_sick');   "  class="breadcrumb"> ข้อมูลทั้งหมด </a>
      </div>
    </div>
  </nav>




   <!--  begin  start -->
  <div class="row">
      
      
      <!--
      <form class="col s12"  action="<?=base_url()?>index.php/welcome/insert_vacation"   id="fr_vacation"  method="post"  enctype="multipart/form-data"  novalidate="novalidate" >
        -->
        
           <form class="col s12"     id="fr_sick"  method="post"  enctype="multipart/form-data"  novalidate="novalidate" >
        
        
               <div class="row">
                   <div class="col s3"></div>
                    <div class="col s3"></div>
                   <div class="input-field col s3">
                       
                       
                       <input type="hidden"  id="id_sick" name="id_sick"  value="<?=@$id_sick?>"  />
                       
                       <h6>
                           <i class=" material-icons">launch</i>    
                           แบบใบลาป่วย ลาคลอดบุตร ลากิจส่วนตัว
                       </h6>
                           
                      
                       
                   </div>
               </div>
               
               
               <div class="row">
                   <div class="input-field col s8">
                       
                       
     <!--
                       <input name="type_person" type="radio" id="type_person1"  value="1" readonly="readonly"   />
      <label for="type_person1">ข้าราชการ</label>
  
      <input name="type_person" type="radio" id="type_person2"  value="2" readonly="readonly"   />
      <label for="type_person2">พนักงานมหาวิทยาลัย</label>
    
      <input class="with-gap" name="type_person" type="radio" id="type_person3"  value="3"  readonly="readonly"   />
      <label for="type_person3">พนักงานราชการ</label>
   
      <input name="type_person" type="radio" id="type_person4"  value="4" readonly="readonly"   />
      <label for="type_person4">ลูกจ้างประจำ</label>
      -->
      
      
      <?php
        if( $type_person == 5 )
        {
      ?>
      <input name="type_person" type="radio"  id="type_person5"   value="5"  checked="checked" />
      <label for="type_person5">ลูกจ้างศูนย์ตะวันฉาย</label>     
      <?php
        }
        else
        {
      ?>
      <input name="type_person" type="radio"  id="type_person5"   value="5"   />
      <label for="type_person5">ลูกจ้างศูนย์ตะวันฉาย</label>     
      
      <?php
        }
      ?>
                   </div>
               </div>    
               
               
        <div class="row">
            
            
             <div class="input-field col s8">
             </div>   
            
        <div class="input-field col s4">
            <input placeholder="ศูนย์ตะวันฉายฯ" id="write" name="write"  type="text"  value="<?=@$write?>"  class="validate">
          <label for="write">เขียนที่</label>
        </div>
            

      </div>
        
        
        
        
          <div class="row">
              
                <div class="input-field col s9">
             </div>   
              
                    
                      <div class="input-field col s3">
                          <i class="material-icons prefix">today'll</i>
                          <input type="date"  id="date_write1"  name="date_write1" value="<?=@$date_write1?>"  class="datepicker"  >
          
                      </div>
                    
                    
            
              
                </div>  
    
        
        
        
         <div class="row">
             
                 <div class="input-field col s3">
                     <input placeholder="Placeholder" id="subject"  name="subject" type="text" class="validate" value="<?=@$subject?>">
          
             </div>
              
             
              
               
           </div>     
      
      
        
       
       <div class="row">
            
            <div class="input-field col s3">
                <input placeholder="Placeholder" id="study" name="study" type="text" class="validate" value="<?=@$study?>" />
          <label for="study">เรียน</label>
             </div>
        
       </div>
       
       
       
           
       <div class="row">
            
            <div class="input-field col s1">
            </div>  
                
           
            <div class="input-field col s2">
           
                
                <?php
              //  $prename ="";
                  if( $prename == 1 )
                  {
                ?>
                <input   class="with-gap"   type="radio" id="prename1"  value="1"  name="prename"  checked="checked"  />
      <label for="prename1">นาย</label>
  
      <input   class="with-gap"   type="radio" id="prename2"   value="2"  name="prename" />
      <label for="prename2">นาง</label>
 
      <input   class="with-gap"  type="radio" id="prename3"  value="3"   name="prename"  />
      <label for="prename3">นางสาว</label>
                <?php
                  }
                  elseif( $prename == 2  )
                  {
                ?>
          <input   class="with-gap"   type="radio" id="prename1"  value="1"  name="prename"    />
      <label for="prename1">นาย</label>
  
      <input   class="with-gap"   type="radio" id="prename2"   value="2"  name="prename" checked="checked"  />
      <label for="prename2">นาง</label>
 
      <input   class="with-gap"  type="radio" id="prename3"  value="3"   name="prename"  />
      <label for="prename3">นางสาว</label>

               <?php
                  }
                    elseif( $prename == 3  )
                    {
               ?>
       <input   class="with-gap"   type="radio" id="prename1"  value="1"  name="prename"    />
      <label for="prename1">นาย</label>
  
      <input   class="with-gap"   type="radio" id="prename2"   value="2"  name="prename"   />
      <label for="prename2">นาง</label>
 
      <input   class="with-gap"  type="radio" id="prename3"  value="3"   name="prename"  checked="checked" />
      <label for="prename3">นางสาว</label>
      
             <?php
                    }
                    else
                    {
             ?>
        <input   class="with-gap"   type="radio" id="prename1"  value="1"  name="prename"    />
      <label for="prename1">นาย</label>
  
      <input   class="with-gap"   type="radio" id="prename2"   value="2"  name="prename"   />
      <label for="prename2">นาง</label>
 
      <input   class="with-gap"  type="radio" id="prename3"  value="3"   name="prename"   />
      <label for="prename3">นางสาว</label>
      
      
      <?php
                    }
      ?>
   
            </div>  
           
           
            <div class="input-field col s3">
                <input placeholder="ชื่อ" id="first_name"  name="first_name" type="text" class="validate"  value="<?=@$first_name?>"   >
                     <label for="first_name">ชื่อ</label>
             </div>
           
           
              <div class="input-field col s3">
                  <input placeholder="นามสกุล" id="last_name"  name="last_name" type="text" class="validate"  value="<?=@$last_name?>" >
                     <label for="last_name">นามสกุล</label>
             </div>
           
           
              <div class="input-field col s3">
                  <input placeholder="ตำแหน่ง" id="position"  name="position"    type="text" class="validate"  value="<?=@$position?>" >
                     <label for="position">ตำแหน่ง</label>
             </div>
           
           
           
        
       </div>
      
        

       
        <div class="row">
            
            
                    <div class="input-field col s3">
                        <input placeholder="Placeholder" id="affiliation"   name="affiliation" value="<?=@$affiliation?>"  type="text" class="validate" >
                     <label for="affiliation">สังกัดหน่วย</label>
             </div>
            
            
             <div class="input-field col s3">
                 <input placeholder="งาน" id="work"  value="<?=@$work?>"  name="work" type="text" class="validate"  >
                     <label for="work">งาน</label>
             </div>
            
             <div class="input-field col s1">
                    
                     <label for="first_name">คณะแพทยศาสตร์</label>
             </div>
            
            
            
             <div class="input-field col s3">
                  <i class="material-icons prefix">phone</i>
                  <input placeholder="Placeholder" id="tel" name="tel"   type="tel" class="validate" value="<?=@$tel?>" >
                     <label for="tel">โทร.</label>
             </div>

        </div>
        
        
               <div class="row">
                   <div class="col s1"></div>
                   
                   <div class="col s2">
                       
                      
                       <?php
                        //$disease="";
                       //$sick_disease="";
                          if( @$disease == 1  &&  @$sick_disease ==1 )
                         {
                       ?>
                       <input name="disease" type="radio" id="disease1"  value="1"  checked="checked"  />
                  <label for="disease1">ป่วย  ด้วยโรค</label>
                   </div>
                   
                   
                   <div class="col s3">
                       <input id="disease_detail"  name="disease_detail"  value="<?=@$disease_detail?>"  type="text"   >
                       
                        
                   </div>
                   
                   <div class="col s2 ">
                   
 
                       
                       เกี่ยวข้องหรือมีสาเหตุจาก
                       
                   </div>
                   
                   
                   <div class="col s2">
                       <input name="sick_disease" type="radio" id="sick_disease1"   value="1"  checked="checked"  />
                  <label for="sick_disease1">จากการทำงาน</label>
                   </div>
                   
                   <div class="col s2">
                   <input name="sick_disease" type="radio" id="sick_disease2"   value="2" />
                  <label for="sick_disease2">ไม่ใช่จากการทำงาน</label>
                   </div>
                   
               </div>
               
               
               <div class="row">
                   <div class="col s1">
                       ขอลา
                   </div>
                   <div class="col s2">
                   <input name="disease" type="radio" id="disease3"  value="3" />
                  <label for="disease3">กิจส่วนตัว</label>
                   </div>
                   
                   <div class="col s1">
                       เนื่องจาก  
                        
                   </div>
                   
                   <div class="col s5">
                       <input id="disease_person"   name="disease_person"  type="text" data-length="10" value="<?=@$disease_person?>" >
                   </div>
                   
                   
               </div>
               
               <div class="row">
                   <div class="col s1">
                       
                   </div>
                   <div class="col s2">
                        <input    type="radio"   id="disease4"   name="disease"  value="4"  />
                        <label for="disease4">คลอดบุตร</label>
                   </div>
                   
                  <?php
                         }
                   else  if( @$disease == 1  &&  @$sick_disease ==2 )
                   {
                  ?>
                    <input name="disease" type="radio" id="disease1"  value="1"  checked="checked"  />
                  <label for="disease1">ป่วย  ด้วยโรค</label>
                   </div>
                   
                   
                   <div class="col s3">
                       <input id="disease_detail"  name="disease_detail"  value="<?=@$disease_detail?>"  type="text"   >
                       
                        
                   </div>
                   
                   <div class="col s2 ">
                   
 
                       
                       เกี่ยวข้องหรือมีสาเหตุจาก
                       
                   </div>
                   
                   
                   <div class="col s2">
                       <input name="sick_disease" type="radio" id="sick_disease1"   value="1"    />
                  <label for="sick_disease1">จากการทำงาน</label>
                   </div>
                   
                   <div class="col s2">
                   <input name="sick_disease" type="radio" id="sick_disease2"   value="2" checked="checked"  />
                  <label for="sick_disease2">ไม่ใช่จากการทำงาน</label>
                   </div>
                   
               </div>
               
               
               <div class="row">
                   <div class="col s1">
                       ขอลา
                   </div>
                   <div class="col s2">
                   <input name="disease" type="radio" id="disease3"  value="3" />
                  <label for="disease3">กิจส่วนตัว</label>
                   </div>
                   
                   <div class="col s1">
                       เนื่องจาก  
                        
                   </div>
                   
                   <div class="col s5">
                       <input id="disease_person"   name="disease_person"  type="text" data-length="10"  value="<?=@$disease_person?>">
                   </div>
                   
                   
               </div>
               
               <div class="row">
                   <div class="col s1">
                       
                   </div>
                   <div class="col s2">
                        <input    type="radio"   id="disease4"   name="disease"  value="4"  />
                        <label for="disease4">คลอดบุตร</label>
                   </div>
                   
                   
                   <?php
                   }  else  if( @$disease == 1  &&  @$sick_disease =="" )
                   {
                   ?>
                  <input name="disease" type="radio" id="disease1"  value="1"  checked="checked"  />
                  <label for="disease1">ป่วย  ด้วยโรค</label>
                   </div>
                   
                   
                   <div class="col s3">
                       <input id="disease_detail"  name="disease_detail"  value="<?=@$disease_detail?>"  type="text"   >
                       
                        
                   </div>
                   
                   <div class="col s2 ">
                   
 
                       
                       เกี่ยวข้องหรือมีสาเหตุจาก
                       
                   </div>
                   
                   
                   <div class="col s2">
                       <input name="sick_disease" type="radio" id="sick_disease1"   value="1"    />
                  <label for="sick_disease1">จากการทำงาน</label>
                   </div>
                   
                   <div class="col s2">
                   <input name="sick_disease" type="radio" id="sick_disease2"   value="2"   />
                  <label for="sick_disease2">ไม่ใช่จากการทำงาน</label>
                   </div>
                   
               </div>
               
               
               <div class="row">
                   <div class="col s1">
                       ขอลา
                   </div>
                   <div class="col s2">
                   <input name="disease" type="radio" id="disease3"  value="3" />
                  <label for="disease3">กิจส่วนตัว</label>
                   </div>
                   
                   <div class="col s1">
                       เนื่องจาก  
                        
                   </div>
                   
                   <div class="col s5">
                       <input id="disease_person"   name="disease_person"  type="text" data-length="10">
                   </div>
                   
                   
               </div>
               
               <div class="row">
                   <div class="col s1">
                       
                   </div>
                   <div class="col s2">
                        <input    type="radio"   id="disease4"   name="disease"  value="4"  />
                        <label for="disease4">คลอดบุตร</label>
                   </div>
                   
                   
                   <?php
                   }else  if( @$disease == 3  )
                         {
                   ?>
          
                      <input name="disease" type="radio" id="disease1"  value="1"    />
                  <label for="disease1">ป่วย  ด้วยโรค</label>
                   </div>
                   
                   
                   <div class="col s3">
                       <input id="disease_detail"  name="disease_detail"  value="<?=@$disease_detail?>"  type="text"   >
                       
                        
                   </div>
                   
                   <div class="col s2 ">
                   
 
                       
                       เกี่ยวข้องหรือมีสาเหตุจาก
                       
                   </div>
                   
                   
                   <div class="col s2">
                       <input name="sick_disease" type="radio" id="sick_disease1"   value="1"    />
                  <label for="sick_disease1">จากการทำงาน</label>
                   </div>
                   
                   <div class="col s2">
                   <input name="sick_disease" type="radio" id="sick_disease2"   value="2"   />
                  <label for="sick_disease2">ไม่ใช่จากการทำงาน</label>
                   </div>
                   
               </div>
               
               
               <div class="row">
                   <div class="col s1">
                       ขอลา
                   </div>
                   <div class="col s2">
                   <input name="disease" type="radio" id="disease3"  value="3" checked="checked" />
                  <label for="disease3">กิจส่วนตัว</label>
                   </div>
                   
                   <div class="col s1">
                       เนื่องจาก  
                        
                   </div>
                   
                   <div class="col s5">
                       <input id="disease_person"   name="disease_person"  type="text" data-length="10" value="<?=@$disease_person?>">
                   </div>
                   
                   
               </div>
               
               <div class="row">
                   <div class="col s1">
                       
                   </div>
                   <div class="col s2">
                        <input    type="radio"   id="disease4"   name="disease"  value="4"  />
                        <label for="disease4">คลอดบุตร</label>
                   </div>
                   
                   <?php
                         } else if( @$disease == 4 )
                         {
                   ?>
                    <input name="disease" type="radio" id="disease1"  value="1"    />
                  <label for="disease1">ป่วย  ด้วยโรค</label>
                   </div>
                   
                   
                   <div class="col s3">
                       <input id="disease_detail"  name="disease_detail"  value="<?=@$disease_detail?>"  type="text"   >
                       
                        
                   </div>
                   
                   <div class="col s2 ">
                   
 
                       
                       เกี่ยวข้องหรือมีสาเหตุจาก
                       
                   </div>
                   
                   
                   <div class="col s2">
                       <input name="sick_disease" type="radio" id="sick_disease1"   value="1"    />
                  <label for="sick_disease1">จากการทำงาน</label>
                   </div>
                   
                   <div class="col s2">
                   <input name="sick_disease" type="radio" id="sick_disease2"   value="2"   />
                  <label for="sick_disease2">ไม่ใช่จากการทำงาน</label>
                   </div>
                   
               </div>
               
               
               <div class="row">
                   <div class="col s1">
                       ขอลา
                   </div>
                   <div class="col s2">
                   <input name="disease" type="radio" id="disease3"  value="3" />
                  <label for="disease3">กิจส่วนตัว</label>
                   </div>
                   
                   <div class="col s1">
                       เนื่องจาก  
                        
                   </div>
                   
                   <div class="col s5">
                       <input id="disease_person"   name="disease_person"  type="text" data-length="10" value="<?=@$disease_person?>">
                   </div>
                   
                   
               </div>
               
               <div class="row">
                   <div class="col s1">
                       
                   </div>
                   <div class="col s2">
                        <input    type="radio"   id="disease4"   name="disease"  value="4" checked="checked"  />
                        <label for="disease4">คลอดบุตร</label>
                   </div>
                   
                   
                   <?php
                   
                         }else
                         {
                   ?>
                      <input name="disease" type="radio" id="disease1"  value="1"    />
                  <label for="disease1">ป่วย  ด้วยโรค</label>
                   </div>
                   
                   
                   <div class="col s3">
                       <input id="disease_detail"  name="disease_detail"  value="<?=@$disease_detail?>"  type="text"   >
                       
                        
                   </div>
                   
                   <div class="col s2 ">
                   
 
                       
                       เกี่ยวข้องหรือมีสาเหตุจาก
                       
                   </div>
                   
                   
                   <div class="col s2">
                       <input name="sick_disease" type="radio" id="sick_disease1"   value="1"    />
                  <label for="sick_disease1">จากการทำงาน</label>
                   </div>
                   
                   <div class="col s2">
                   <input name="sick_disease" type="radio" id="sick_disease2"   value="2"   />
                  <label for="sick_disease2">ไม่ใช่จากการทำงาน</label>
                   </div>
                   
               </div>
               
               
               <div class="row">
                   <div class="col s1">
                       ขอลา
                   </div>
                   <div class="col s2">
                   <input name="disease" type="radio" id="disease3"  value="3" />
                  <label for="disease3">กิจส่วนตัว</label>
                   </div>
                   
                   <div class="col s1">
                       เนื่องจาก  
                        
                   </div>
                   
                   <div class="col s5">
                       <input id="disease_person"   name="disease_person"  type="text" data-length="10" value="<?=@$disease_person?>">
                   </div>
                   
                   
               </div>
               
               <div class="row">
                   <div class="col s1">
                       
                   </div>
                   <div class="col s2">
                        <input    type="radio"   id="disease4"   name="disease"  value="4"   />
                        <label for="disease4">คลอดบุตร</label>
                   </div>
                   
                   
                   <?php
                         }
                   ?>
                   
               </div>
               
               
               <div class="row">
                   <div class="col s1">
                       
                   </div>
                   <div class="col s1">
                       ตั้งแต่วันที่ 
                   </div>
                   <div class="col s2">
                         <i class="material-icons prefix">today'll</i>
                         <input type="date"  id="begin_date1"  name="begin_date1"  value="<?=@$begin_date1?>"  class="datepicker"  >
                   </div>
                   <div class="col s1">
                       ถึงวันที่ 
                   </div>
                   <div class="col s2">
                         <i class="material-icons prefix">today'll</i>
                         <input type="date"  id="end_date1"  name="end_date1"  class="datepicker" value="<?=@$end_date1?>"  >
                   </div>
                   <div class="col s1">
                       มีกำหนด
                   </div>
                   <div class="col s1">
                               
                       <input id="count_date"  name="count_date"   type="text" data-length="10" value="<?=@$count_date?>">
                                
                   </div>
                   <div class="col s1">
                       วัน
                   </div>
                   
                   
                   
               </div>
               
               
               <div class="row">
                   <div class="col s1">
                       ข้าพเจ้าได้ลา
                   </div>
                   
                   
                   <?php
                      // $me_leave="";
                       if( $me_leave==1 )
                       {
                   ?>
                   <div class="col s1">
                       <input name="me_leave" type="radio"   id="me_leave1"  value="1" checked="checked" />
                           <label for="me_leave1">ป่วย</label>
                   </div>
                   <div class="col s1">
                           <input name="me_leave" type="radio"    id="me_leave2"     value="2" />
                           <label for="me_leave2">กิจส่วนตัว</label>
                   </div>
                   

                    <div class="col s3">
                           <input name="me_leave" type="radio"     id="me_leave3"      value="3"  />
                           <label for="me_leave3">คลอดบุตร     <?=nbs(3)?>       ครั้งสุดท้ายตั้งแต่วันที่ </label>

                   </div>
                   <?php
                       }elseif( $me_leave==2  )
                       {
                   ?>
                   <div class="col s1">
                       <input name="me_leave" type="radio"   id="me_leave1"  value="1"  />
                           <label for="me_leave1">ป่วย</label>
                   </div>
                   <div class="col s1">
                           <input name="me_leave" type="radio"    id="me_leave2"     value="2" checked="checked" />
                           <label for="me_leave2">กิจส่วนตัว</label>
                   </div>
                   

                    <div class="col s3">
                           <input name="me_leave" type="radio"     id="me_leave3"      value="3"  />
                           <label for="me_leave3">คลอดบุตร     <?=nbs(3)?>       ครั้งสุดท้ายตั้งแต่วันที่ </label>

                   </div>
                   
                   <?php
                       } elseif( $me_leave==3  )
                       {
                   ?>
                    <div class="col s1">
                       <input name="me_leave" type="radio"   id="me_leave1"  value="1"  />
                           <label for="me_leave1">ป่วย</label>
                   </div>
                   <div class="col s1">
                           <input name="me_leave" type="radio"    id="me_leave2"     value="2"  />
                           <label for="me_leave2">กิจส่วนตัว</label>
                   </div>
                   

                    <div class="col s3">
                           <input name="me_leave" type="radio"     id="me_leave3"      value="3" checked="checked"  />
                           <label for="me_leave3">คลอดบุตร     <?=nbs(3)?>       ครั้งสุดท้ายตั้งแต่วันที่ </label>

                   </div>
                   
                   <?php
                       }else
                       {
                   ?>
                   <div class="col s1">
                       <input name="me_leave" type="radio"   id="me_leave1"  value="1"  />
                           <label for="me_leave1">ป่วย</label>
                   </div>
                   <div class="col s1">
                           <input name="me_leave" type="radio"    id="me_leave2"     value="2"  />
                           <label for="me_leave2">กิจส่วนตัว</label>
                   </div>
                   

                    <div class="col s3">
                           <input name="me_leave" type="radio"     id="me_leave3"      value="3"   />
                           <label for="me_leave3">คลอดบุตร     <?=nbs(3)?>       ครั้งสุดท้ายตั้งแต่วันที่ </label>

                   </div>
                   
                   <?php
                       }
                   ?>
                   
                   <div class="col s2">
                                    <i class="material-icons prefix">today'll</i>
                                    <input type="date"  id="begin_date2"  name="begin_date2"  class="datepicker"  value="<?=@$begin_date2?>"  >
                   </div>
                   
                   <div class="col s1">
                       ถึงวันที่
                   </div>
                   
                   <div class="col s2">
                         <i class="material-icons prefix">today'll</i>
                         <input    type="date"    id="end_date2"  name="end_date2"   class="datepicker"  value="<?=@$end_date2?>"  >
                   </div>
                   
                   
                   <div class="col s1">
                      มีกำหนด
                     </div>
                   
                   <div class="col s1">
                       <input    id="count_date2"  name="count_date2"    type="text" data-length="10" value="<?=@$count_date2?>">
                   </div>
                   
                   <div class="col s1">
                       วัน
                   </div>
                   
                   
               </div>
               
               
               <div class="row">
          
                   
                    
                   
         
                   
                   <div class="col s2">
                       ในระหว่างลาจะติดต่อข้าพเจ้าได้ที่
                   </div>
                   
                   
               </div>
               
               
               <div class="row">
                   <div class="col s1">
                       บ้านเลขที่่
                   </div>
                   <div class="col s2">
                       <input id="house_number"  name="house_number"  type="text" data-length="10" value="<?=@$house_number?>">
                   </div>
                    <div class="col s1">
                       ถนน
                   </div>
                   <div class="col s2">
                       <input id="road"  name="road"  type="text" data-length="10" value="<?=@$road?>">
                   </div>
                   <div class="col s1">
                       ตำบล
                   </div>
                   <div class="col s2">
                       <input id="district"  name="district" type="text" data-length="10"  value="<?=@$district?>">
                   </div>
                  <div class="col s1">
                       อำเภอ
                   </div>
                   <div class="col s2">
                       <input id="district2"  name="district2"  type="text" data-length="10" value="<?=@$district2?>">
                   </div> 
                   
               </div>
               
               
               <div class="row" >
                   <div class="col s1">
                       จังหวัด
                   </div>
                   <div class="col s2">
                       <input id="province"  name="province" type="text" data-length="10" value="<?=@$province?>">
                   </div> 
                   
                   
                   <div class="col s1">
                       โทรศัพท์
                   </div>
                   <div class="col s2">
                       <input id="tel2"  name="tel2"  type="text" data-length="10" value="<?=@$tel2?>">
                   </div> 
                   
                   
               </div>
               
               <div class="row">
                   
                     <div class="col s8"></div>
                     
                     <div class="input-field col s2">
                         ขอแสดงความนับถือ
                     </div>
               </div>
               
               

     
        

               <div class="row">
                                <div class="col s5">

                                </div>

                                 <div class="col s1"></div>

                           <div class="col s2">
                               (ลงชื่อ)
                           </div>
                           <div class="col s2">
                               <input placeholder="" id="sign_name"   name="sign_name"  type="text" class="validate" value="<?=@$sign_name?>">
                           </div>
                              <div class="col s2">
                                  <input placeholder="" id="sign_lastname"   name="sign_lastname"  type="text" class="validate" value="<?=@$sign_lastname?>">
                           </div>
                    
                   
               </div>
               
               
                          <div class="row">
                                <div class="col s6">

                                </div>
                                <div class="col s2">
                                    
                                    
                                    
                                    <?php
                                    //$sign_prename="";
                                       if( @$sign_prename == 1  )
                                       {
                                    ?>
                                    <input  type="radio" id="sign_prename1"  value="1"  name="sign_prename"  checked="checked"    />
                                            <label for="sign_prename1">นาย</label>

                                            <input  type="radio" id="sign_prename2"   value="2"  name="sign_prename"  />
                                            <label for="sign_prename2">นาง</label>

                                            <input class="with-gap"  type="radio" id="sign_prename3"  value="3"   name="sign_prename"   />
                                            <label for="sign_prename3">นางสาว</label>                                   
                                    <?php
                                       }
                                       else if( @$sign_prename == 2 )
                                       {
                                    ?>
                                     <input  type="radio" id="sign_prename1"  value="1"  name="sign_prename"      />
                                            <label for="sign_prename1">นาย</label>

                                            <input  type="radio" id="sign_prename2"   value="2"  name="sign_prename" checked="checked"  />
                                            <label for="sign_prename2">นาง</label>

                                            <input class="with-gap"  type="radio" id="sign_prename3"  value="3"   name="sign_prename"   />
                                            <label for="sign_prename3">นางสาว</label>    
                                            
                                            <?php
                                       }else if( @$sign_prename == 3  )
                                       {
                                            ?>
                                           <input  type="radio" id="sign_prename1"  value="1"  name="sign_prename"      />
                                            <label for="sign_prename1">นาย</label>

                                            <input  type="radio" id="sign_prename2"   value="2"  name="sign_prename"   />
                                            <label for="sign_prename2">นาง</label>

                                            <input class="with-gap"  type="radio" id="sign_prename3"  value="3"   name="sign_prename"  checked="checked"  />
                                            <label for="sign_prename3">นางสาว</label>  
                                            
                                            <?php
                                       }else
                                       {
                                            ?>
                                              <input  type="radio" id="sign_prename1"  value="1"  name="sign_prename"      />
                                            <label for="sign_prename1">นาย</label>

                                            <input  type="radio" id="sign_prename2"   value="2"  name="sign_prename"   />
                                            <label for="sign_prename2">นาง</label>

                                            <input class="with-gap"  type="radio" id="sign_prename3"  value="3"   name="sign_prename"    />
                                            <label for="sign_prename3">นางสาว</label>  
                                            
                                            <?php
                                       }
                                            ?>
                                    
                                    
                                </div>
                             <div class="col s2">
                                 <input placeholder="" id="firstname3"   name="firstname3"  type="text" class="validate" value="<?=@$firstname3?>">
                           </div>
                              <div class="col s2">
                                  <input placeholder="" id="lastname3"   name="lastname3"  type="text" class="validate"  value="<?=@$lastname3?>">
                           </div>
                              
                   
                        </div>
               
               
        
                  <div class="row">
      
            
            <div class="input-field col s2">
                 
             </div>
            
              <div class="input-field col s2">
                     <label for="first_name">สถิติการลาในปีงบประมาณนี้</label>
             </div>
            

        </div>
               
               
               
               
        
          <div class="row">
              
               <div class="input-field col s1">
                   
               </div>
              
              
                   
         <div class="input-field col s4">
            <table  class="highlight" >
        <thead>
          <tr>
              <th    >ประเภทการลา </th>
              <th>ลามาแล้ว <br>(วันทำการ) </th>
              <th>ลาครั้งนี้ <br>(วันทำการ)</th>
               <th>รวมเป็น <br>(วันทำการ)</th>
          </tr>
        </thead>

        <tbody>
            

          <tr>
            <td>
               ป่วย
            </td>
            <td>
                <input placeholder="วัน"    id="sick1"  name="sick1"    type="text" class="validate" value="<?=@$sick1?>">
            </td>
            <td>
                <input placeholder="วัน" id="sick2"   name="sick2"  type="text" class="validate" value="<?=@$sick2?>">
            </td>
            <td>
                <input placeholder="วัน" id="total_sick"   name="total_sick"  type="text" class="validate" value="<?=@$total_sick?>">
            </td>
          </tr>
          
          <tr>
            <td>
               กิจส่วนตัว
            </td>
            <td>
                <input placeholder="วัน" id="sick_person1"  name="sick_person1"    type="text" class="validate"  value="<?=@$sick_person1?>">
            </td>
            <td>
                <input placeholder="วัน" id="sick_person2"   name="sick_person2"  type="text" class="validate"  value="<?=@$sick_person2?>">
            </td>
            <td>
                <input placeholder="วัน" id="total_sick_person"   name="total_sick_person"  type="text" class="validate" value="<?=@$total_sick_person?>">
            </td>
          </tr>
          
          <tr>
            <td>
               คลอดบุตร
            </td>
            <td>
                <input placeholder="วัน" id="confined1"  name="confined1"    type="text" class="validate" value="<?=@$confined1?>">
            </td>
            <td>
                <input placeholder="วัน" id="confined2"   name="confined2"  type="text" class="validate"  value="<?=@$confined2?>">
            </td>
            <td>
                <input placeholder="วัน" id="total_confined"   name="total_confined"  type="text" class="validate"  value="<?=@$total_confined?>">
            </td>
          </tr>
          

        </tbody>
      </table>
          </div> 
              
              
              <div class="col s1">
                  
              </div>
              
              <div class="col s6">
                   <table>
                                      
                                        
                                       

                                        <tbody>
                                            <tr>
                                              <th> ความเห็นของผู้บังคับบัญชาชั้นต้น   (โปรดระบุ ข้อ ก และ ข้อ ข)</th>
                                          </tr> 
                                            
                                       
                                          
                                          <tr>
                                            
                                             
                                              <?php
                                               //  $supervisor_sick="";
                                                  if( $supervisor_sick == 1)
                                                  {
                                              ?>
                                              <td>
                                                  ก
                                                  <br>
                                                  
                                                  <input name="supervisor_sick" type="radio" id="supervisor_sick1" value="1"  checked="checked" /> <label for="supervisor_sick1">เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน</label>           <input name="supervisor_sick" type="radio" id="supervisor_sick2"  value="2" /> <label for="supervisor_sick2">ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน</label>  
                                                     
                                              </td>
                                              <?php
                                                  }elseif(  $supervisor_sick == 2   )
                                                  {
                                              ?>
                                              
                                              
                                              <td>
                                                  ก
                                                  <br>
                                                  
                                                  <input name="supervisor_sick" type="radio" id="supervisor_sick1" value="1"  /> <label for="supervisor_sick1">เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน</label>           <input name="supervisor_sick" type="radio" id="supervisor_sick2"  value="2"  checked="checked" /> <label for="supervisor_sick2"  checked="checked" >ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน</label>  
                                                     
                                              </td>
                                              
                                              
                                            <?php
                                                  }else
                                                  {
                                            ?>
                                              <td>
                                                  ก
                                                  <br>
                                                  
                                                  <input name="supervisor_sick" type="radio" id="supervisor_sick1" value="1"  /> <label for="supervisor_sick1">เห็นด้วยกับเหตุผลการลาป่วยที่ระบุมีสาเหตุจากการทำงาน</label>           <input name="supervisor_sick" type="radio" id="supervisor_sick2"  value="2" /> <label for="supervisor_sick2"   >ไม่เห็นด้วยกับเหตุผลการลาป่วยที่เกิดจากการทำงาน</label>  
                                                     
                                              </td>
                                              
                                              <?php
                                                  }
                                              
                                              ?>

                                          </tr>
                                          
                                          <tr>
                                              
                                            <td>
                                                
                                                
                                                <?php  
                                                if( $supervisor_agree == 1 )
                                                {
                                                ?>
                                                ข
                                                <br>
                                                
                                                <input name="supervisor_agree" type="radio" id="supervisor_agree1"  value="1"  checked="checked" />   <label for="supervisor_agree1">เห็นด้วยควรอนุญาต</label>      <input  name="supervisor_agree"  type="radio" id="supervisor_agree2"  value="2"  /><label for="supervisor_agree2">เห็นด้วยควรไม่อนุญาต</label> 

                                                 <?php
                                                }elseif( $supervisor_agree == 2  )
                                                {
                                                 ?>
                                                   ข
                                                <br>
                                                         <input name="supervisor_agree" type="radio" id="supervisor_agree1"  value="1"   />   <label for="supervisor_agree1">เห็นด้วยควรอนุญาต</label>      <input  name="supervisor_agree"  type="radio" id="supervisor_agree2"  value="2" checked="checked" /><label for="supervisor_agree2">เห็นด้วยควรไม่อนุญาต</label> 
 
                                                
                                                <?php
                                                }else
                                                {
                                                ?>
                                                      <input name="supervisor_agree" type="radio" id="supervisor_agree1"  value="1"   />   <label for="supervisor_agree1">เห็นด้วยควรอนุญาต</label>      <input  name="supervisor_agree"  type="radio" id="supervisor_agree2"  value="2"  /><label for="supervisor_agree2">เห็นด้วยควรไม่อนุญาต</label> 
       
                                                         
                                                         
                                                         <?php
                                                }
                                                         ?>
                                                 
                                            </td>
                                            
                                          
                                            
                                            

                                          
                                            
                                          </tr>
                                        
                                          
                                          
                                          
                                          
                                        </tbody>
                                      </table>
              </div>
              
               
             
                  
                  
                   
  </div>
        

               
               
               
               <div class="row">
                   <div class="col s1"></div>
                   <div class="col s5">
                       <table>
                           
                           
                           <tr>
                               <td>
                                      (ลงชื่อ)  
                               </td>
                               
                               <td>
                                   <input placeholder="" id="inspector_name"   name="inspector_name"  type="text" class="validate" value="<?=@$inspector_name?>">
                                 
                               </td>
                                    
                               <td>
                                   <input placeholder="" id="inspector_lastname"   name="inspector_lastname"  type="text" class="validate"  value="<?=@$inspector_lastname?>">
                               </td>
                               
                               
                               <td>
                                   ผู้ตรวจสอบ
                               </td>
                           </tr>
                           
                             <tr>
                               <td>
                                      ตำแหน่ง
                               </td>
                               <td>
                                   
                                   <input placeholder="" id="inspector_position"   name="inspector_position"  type="text" class="validate"  value="<?=@$inspector_position?>">
                               
                               </td>
                               <td>
                                  
                               </td>
                           </tr>
                           
                           
                            <tr>
                               <td>
                                      วันที่
                               </td>
                               <td>
                                   
                             <i class="material-icons prefix">today'll</i>
                             <input type="date"  id="date_inspector"  name="date_inspector"  class="datepicker"  value="<?=@$date_inspector?>" >
                               
                               </td>
                               <td>
                                  
                               </td>
                           </tr>
                           
                           
                           
                       </table>
                   </div>
                   
                   
                   
                   
                   <div class="col s1">
                       
                   </div>
                   
                   <div class="col s5">
                       <table>
                           
                           
                           <tr>
                           <td>
                               (ลงชื่อ)    
                           </td> 
                           <td>
                               
                               <div class="input-field col s6">
                                   <input placeholder="" id="first_name2"   name="first_name2"   type="text" class="validate" value="<?=@$first_name2?>">
                               </div> 
                           
                               <div class="input-field col s6">
                                   <input placeholder="" id="last_name2"    name="last_name2"   type="text" class="validate" value="<?=@$last_name2?>">
                               </div> 
                             
                             
                           
                             
                           </td>
                           </tr>
                           
                           <tr>
                               <td>ตำแหน่ง</td>
                               <td>
                                   <input placeholder="" id="postion2"  name="postion2" type="text" class="validate" value="<?=@$postion2?>">
                               </td>
                           </tr>
                           
                           <tr>
                               <td>
                                   วันที่
                               </td>
                               <td>
                                   <input type="date"  id="commander_date"  name="commander_date"  class="datepicker" value="<?=@$commander_date?>">
                               </td>
                           </tr>
                           
                           <tr>
                               <td>
                                   <u>คำสั่งผู้บริหาร</u>  
                               </td>
                           </tr>
                           
                           <tr>
                               
                               
                               <?php
                                  //$manager_allow;
                                    if( $manager_allow == 1 )
                                    {
                               ?>
                               
                               <td>
                                   <input class="with-gap" name="manager_allow"  id="manager_allow1"  type="radio"  value="1" checked="checked"   />
                                                <label for="manager_allow1">อนุญาต</label>
                               </td>
                               <td>
                                   <input class="with-gap" name="manager_allow"   id="manager_allow2"  type="radio"   value="2"  />
                                                <label for="manager_allow2">ไม่อนุญาต</label>
                               </td>
                               <?php
                                    }
                                   elseif(  $manager_allow == 2  )
                                   {
                               ?>
                               
                               <td>
                                   <input class="with-gap" name="manager_allow"  id="manager_allow1"  type="radio"  value="1"   />
                                                <label for="manager_allow1">อนุญาต</label>
                               </td>
                               <td>
                                   <input class="with-gap" name="manager_allow"   id="manager_allow2"  type="radio"   value="2"  checked="checked"  />
                                                <label for="manager_allow2">ไม่อนุญาต</label>
                               </td>
                               
                               <?php
                               
                                   }
                                   else
                                   {
                               ?>
                               <td>
                                   <input class="with-gap" name="manager_allow"  id="manager_allow1"  type="radio"  value="1"   />
                                                <label for="manager_allow1">อนุญาต</label>
                               </td>
                               <td>
                                   <input class="with-gap" name="manager_allow"   id="manager_allow2"  type="radio"   value="2"   />
                                                <label for="manager_allow2">ไม่อนุญาต</label>
                               </td>
                               
                               <?php
                                   }
                               ?>
                               
                           </tr>
                           
                           <tr>
                               <td>
                                    (ลงชื่อ)
                               </td>
                               <td>
                               
                                 
                               <div class="input-field col s6">
                                   <input placeholder="" id="first_name3"  name="first_name3"   type="text" class="validate" value="<?=@$first_name3?>">
                               </div>
                                      
                               <div class="input-field col s6">
                                   <input placeholder="" id="last_name3"  name="last_name3"  type="text" class="validate" value="<?=@$last_name3?>">
                               </div>
                               
                               
                           </td> 
                           
                           </tr>
                           
                           <tr>
                               <td>ตำแหน่ง</td>
                               <td>
                                   <input placeholder="" id="manager_position"  name="manager_position"  type="text" class="validate" value="<?=@$manager_position?>">
                               </td>
                           </tr>
                           
                           <tr>
                               <td>
                                   วันที่
                               </td>
                               <td>
                                   <input type="date" id="date_manager"  name="date_manager"  class="datepicker"  value="<?=@$date_manager?>">
                               </td>
                           </tr>
                           
                       </table>
                   </div>
                   
                   
                   
                   
               </div>
               
               
               
               <div class="row">
                   <div class="input-field col s1">
                       
                   </div>
                   
                   <div class="input-field col s1">
                      หมายเหตุ 
                   </div>
                   
                    <div class="input-field col s1">
                      1 
                   </div>
                   
                   
                   <div class="input-field col s5">
                      ในปีงบประมาณหนึ่ง ลูกจ้างชั่วคราวมีสิทธิ์ลาป่วยโดยได้รับค่าจ้างระหว่างลาไม่เกิน 15 วันทำการ
                      ลากิจส่วนตัว  ไม่มีสิทธิ์ได้รับค่าจ้างในวันที่ลา
                   </div>
                   
               </div>
               
                <div class="row">
                   <div class="input-field col s1">
                       
                   </div>
                   
                   <div class="input-field col s1">
                      หมายเหตุ 
                   </div>
                   
                    <div class="input-field col s1">
                      2 
                   </div>
                   
                   
                   <div class="input-field col s5">
                      ใ้ห้บุคลากรตัดสินใจว่าการลาป่วยดังกล่าวนั้นได้เกี่ยวข้องหรือมีสาเหตุจากงานหรือไม่  หากลาป่วยเกิดจากการทำงาน
                      หัวหน้างานโปรดสำเนาส่งมายังสำนักงานอาชีวอนามัยและความปลอดภัยเพื่อพิจารณาแก้ไขสาเหตุสภาพแวดล้อมในการทำงาน
                   </div>
                   
               </div>
               
    
          
          
          <div class="row">
              
              <div class="input-field col s6">
                  
              </div>
              
              <div class="input-field col s2">
                  
                  
                  
              <!--   <a class="waves-effect waves-light btn-large"><i class="material-icons left">playlist_add</i> บันทึก </a> -->
                  <button class="btn-large waves-effect waves-light" type="button" name="action"  
                          onclick="javascript:  
                                     // alert('t');   
                                      $.post('<?=base_url()?>index.php/welcome/update_sick', $('#fr_sick').serialize(),
                                                    function(data)
                                                    {
                                                              //alert(data);
                                                              
                                                              
                                                              if( data == 1 )
                                                              {
                                                                       Materialize.toast('ปรับปรุงข้อมูลสำเร็จ', 3000, 'rounded');
                                                                     //  $('#modal_show_insert1').modal('open');
                                                                     //http://10.87.196.170/document/index.php/welcome/form_vacation
                                                                    // $('#sub11').load('<?=base_url()?>index.php/welcome/form_vacation');
                                                                    
                                                                     $('#sub11').load('<?=base_url()?>index.php/welcome/table_sick');
                                                               }
                                                               else if( data==0  )
                                                               {
                                                                        Materialize.toast('ปรับปรุงข้อมูลล้มเหลว', 3000, 'rounded');
                                                               }
                                                               
                                                               
                                                               
                                                       });
                                                            
                                                                  " >
                               Update
                                 <i class="material-icons right">playlist_add</i>
                 </button>
        
                 
                 
                 
              </div>
          </div>
        
        
              
          </div>
        
        




        
        
        
        
        
        
         
        
    </form>
  </div>
   
   
<!--  begin  start -->




<!-- Modal Structure -->
  <div id="modal_show_insert1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>










