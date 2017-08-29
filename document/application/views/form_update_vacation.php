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
        <a href="#" class="breadcrumb"  onclick="javascript:  $('#sub11').load('<?=base_url()?>index.php/welcome/form_vacation');  " >      กรอกแบบฟอร์ม </a>
        <a href="#!" onclick="javascript:  $('#sub11').load('<?=base_url()?>index.php/welcome/table_vacation');   "  class="breadcrumb"> ข้อมูลทั้งหมด </a>
      </div>
    </div>
  </nav>




   <!--  begin  start -->
  <div class="row">
      
      
      <!--
      <form class="col s12"  action="<?=base_url()?>index.php/welcome/insert_vacation"   id="fr_vacation"  method="post"  enctype="multipart/form-data"  novalidate="novalidate" >
        -->
        
           <form class="col s12"     id="fr_update_vacation"  method="post"  enctype="multipart/form-data"  novalidate="novalidate" >
        
        
       
               <div class="row">
                   <div class="input-field col s8">
                 
                       <input   type="hidden"   id="id_vacation"  name="id_vacation"  value="<?=$id_vacation?>"  />
                       
          <!--             
      <input name="type_person" type="radio" id="type_person1"  value="1"   />
      <label for="type_person1">ข้าราชการ</label>
  
      <input name="type_person" type="radio" id="type_person2"  value="2"  />
      <label for="type_person2">พนักงานมหาวิทยาลัย</label>
    
      <input class="with-gap" name="type_person" type="radio" id="type_person3"  value="3"   />
      <label for="type_person3">พนักงานราชการ</label>
   
      <input name="type_person" type="radio" id="type_person4"  value="4" />
      <label for="type_person4">ลูกจ้างประจำ</label>
         -->
      
   
      <input name="type_person" type="radio"  id="type_person5"   value="5"  checked="checked"  />
      <label for="type_person5">ลูกจ้างศูนย์ตะวันฉาย</label>               
                       
                   </div>
               </div>    
               
               
        <div class="row">
            
            
             <div class="input-field col s8">
             </div>   
            
        <div class="input-field col s4">
            <input    id="write" name="write"  type="text"  value="<?=@$write?>"  class="validate">
          <label for="write">เขียนที่</label>
        </div>
            

      </div>
        
        
        
        
          <div class="row">
              
                <div class="input-field col s9">
             </div>   
              
                    
                      <div class="input-field col s3">
                          <i class="material-icons prefix">today'll</i>
                          <input type="date"  id="date_write"  name="date_write"  value="<?=@$date_write?>"   class="datepicker"  >
          
                      </div>
                    
                    
            
              
                </div>  
    
        
        
        
         <div class="row">
             
                 <div class="input-field col s3">
                     <input  id="subject"  name="subject" type="text" class="validate" value="<?=@$subject?>">
          
             </div>
              
             
              
               
           </div>     
      
      
        
       
       <div class="row">
            
            <div class="input-field col s3">
                <input  id="study" name="study" type="text" class="validate" value="<?=@$study?>" >
          <label for="study">เรียน</label>
             </div>
        
       </div>
       
       
       
           
       <div class="row">
            
            <div class="input-field col s1">
            </div>  
                
           
            <div class="input-field col s2">
           
             <?php   
               //$prename="";
                       if( @$prename==1  )  
                       {
                 ?>
                
                <input  type="radio" id="prename1"  value="1"  name="prename"  checked="checked"   />
      <label for="prename1">นาย</label>
  
      <input  type="radio" id="prename2"   value="2"  name="prename" />
      <label for="prename2">นาง</label>
 
      <input class="with-gap"  type="radio" id="prename3"  value="3"   name="prename"  />
      <label for="prename3">นางสาว</label>
                  <?php
                       }
                       elseif(  @$prename==2   )
                       {
                  ?>
        <input  type="radio" id="prename1"  value="1"  name="prename"    />
      <label for="prename1">นาย</label>
  
      <input  type="radio" id="prename2"   value="2"  name="prename"   checked="checked"  />
      <label for="prename2">นาง</label>
 
  <input class="with-gap"  type="radio" id="prename3"  value="3"   name="prename"  />
      <label for="prename3">นางสาว</label>
      
                 <?php
                       }
                        elseif(  @$prename==3   )
                        {
                 ?>
       <input  type="radio" id="prename1"  value="1"  name="prename"    />
      <label for="prename1">นาย</label>
  
      <input  type="radio" id="prename2"   value="2"  name="prename"     />
      <label for="prename2">นาง</label>
 
  <input class="with-gap"  type="radio" id="prename3"  value="3"   name="prename"  checked="checked"   />
      <label for="prename3">นางสาว</label>
      
                 <?php
                        }else
                        {
                 ?>
       <input  type="radio" id="prename1"  value="1"  name="prename"     />
      <label for="prename1">นาย</label>
  
      <input  type="radio" id="prename2"   value="2"  name="prename"     />
      <label for="prename2">นาง</label>
 
  <input class="with-gap"  type="radio" id="prename3"  value="3"   name="prename"     />
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
                  <input placeholder="นามสกุล" id="last_name"  name="last_name" type="text" class="validate"   value="<?=@$last_name?>"  >
                     <label for="last_name">นามสกุล</label>
             </div>
           
           
              <div class="input-field col s3">
                  <input placeholder="ตำแหน่ง" id="position"  name="position"    type="text" class="validate"  value="<?=@$position?>"   >
                     <label for="position">ตำแหน่ง</label>
             </div>
           
           
           
        
       </div>
      
        

       
        <div class="row">
            
            
                    <div class="input-field col s3">
                        <input   id="affiliation"   name="affiliation"  type="text" class="validate" value="<?=@$affiliation?>" >
                     <label for="affiliation">สังกัดหน่วย</label>
             </div>
            
            
             <div class="input-field col s3">
                 <input  id="work"  name="work" type="text" class="validate"  value="<?=@$work?>"  >
                     <label for="work">งาน</label>
             </div>
            
             <div class="input-field col s1">
                    
                     <label for="first_name">คณะแพทยศาสตร์</label>
             </div>
            
            
            
             <div class="input-field col s3">
                  <i class="material-icons prefix">phone</i>
                  <input  id="tel" name="tel"  type="tel" class="validate" value="<?=@$tel?>" >
                     <label for="tel">โทร.</label>
             </div>

        </div>
        
        
        
        
        <div class="row">

             <div class="input-field col s1">
                 
             </div>
            
            <div class="input-field col s2">
                    
                <label for="first_name"  >มีวันลาสะสม</label>
                      
             </div>
            
            <div class="input-field col s3">
                <input placeholder=""  id="cumulative" name="cumulative"  value="<?=@$cumulative?>"   type="tel" class="validate"   >
            </div>
            
            
                <div class="input-field col s3">
               <label for="cumulative">วันทำการ</label>
            </div>

        </div>
        
        
                
        <div class="row">

             <div class="input-field col s1">
                 
             </div>
            
            <div class="input-field col s2">
                    
                     <label for="first_name">มีวันลาพักผ่อนในปีนี้</label>
                      
             </div>
            
            <div class="input-field col s3">
                <input   name="rest"    id="rest" type="tel" class="validate"  value="<?=@$rest?>" >
            </div>
            
            
                <div class="input-field col s3">
               <label for="first_name">วันทำการ</label>
            </div>

        </div>
        
                
        
        
        <div class="row">

             <div class="input-field col s1">
                 
             </div>
            
            <div class="input-field col s2">
                    
                     <label for="total">รวมวันลาเป็น</label>
                      
             </div>
            
            <div class="input-field col s3">
                <input  id="total"  name="total"  type="tel" class="validate"  value="<?=@$total?>" >
            </div>
            
            
                <div class="input-field col s3">
               <label for="first_name">วันทำการ</label>
            </div>

        </div>
        
        
        
        <div class="row">

             <div class="input-field col s1">
                 
             </div>
            
            <div class="input-field col s2">
                    
                     <label for="current">ในปีนี้ลามาแล้ว</label>
                      
             </div>
            
            <div class="input-field col s3">
                <input  id="current"  name="current"  type="tel"  value="<?=@$current?>"   class="validate" >
            </div>
            
            
                <div class="input-field col s3">
               <label for="first_name">วันทำการ</label>
            </div>

        </div>
        
        
        <div class="row">

             <div class="input-field col s1">
                 
             </div>
            
            <div class="input-field col s2">
                    
                     <label for="keep">คงเหลือวันลาอีก</label>
                      
             </div>
            
            <div class="input-field col s3">
                <input  id="keep" name="keep"  type="tel" class="validate" value="<?=@$keep?>" >
            </div>
            
            
                <div class="input-field col s3">
               <label for="first_name">วันทำการ</label>
            </div>

        </div>
        
        
        <div class="row">

             <div class="input-field col s1">
                 
             </div>
            
            <div class="input-field col s2">
                    
                     <label for="wishes">มีความประสงค์จะขอลาพักผ่อนมีกำหนด</label>
                      
             </div>
            
            <div class="input-field col s3">
                <input  id="wishes" name="wishes"  id="wishes"  value="<?=@$wishes?>"    type="tel" class="validate" >
            </div>
            
            
                <div class="input-field col s3">
               <label for="first_name">วันทำการ</label>
            </div>

        </div>
        
        
     <div class="row">

             
            
         
         
            <div class="input-field col s2">
                    
                     <label for="date_begin">ขอลาพักผ่อนตั่้งแต่วันที่</label>
                      
             </div>
         
         
          <div class="input-field col s2">
                          <i class="material-icons prefix">today'll</i>
                          <input type="date" id="date_begin"  value="<?=@$date_begin?>"  name="date_begin"  class="datepicker">
          
                      </div>
         
         
          <div class="input-field col s1">
                    
                     <label for="end_date">ถึงวันที่</label>
                      
             </div>
         
         
             <div class="input-field col s2">
                          <i class="material-icons prefix">today'll</i>
                          <input type="date"  id="end_date"  name="end_date"  value="<?=@$end_date?>"  class="datepicker">
          
                      </div>
         
         
            
           

        </div> 
        
        
        
           <div class="row">

             <div class="input-field col s1">
                 
             </div>
            
            <div class="input-field col s3">
                    
                     <label for="first_name">ในระหว่างลาพักผ่อนครั้งนี้  หากมีราชการด่วนติดต่อได้ที่บ้านเลขที่</label>
                      
             </div>
            
            <div class="input-field col s1">
                
                <input placeholder="บ้านเลขที่" id="้house_number" name="house_number"  value="<?=@$house_number?>"  type="tel" class="validate" >
                 <label for="house_number">บ้านเลขที่</label>
            </div>
               
                    
               
               
                   <div class="input-field col s2">
                        
                    
                       <input placeholder="ถนน" id="road"  name="road"   value="<?=@$road?>"  type="text" class="validate"    >
                         <label for="road">ถนน</label>
                         
                         
                         
                      
                    </div>
               
               
                 <div class="input-field col s2">
                     <input placeholder="ตำบล" id="district" name="district" type="text" class="validate"  value="<?=@$district?>"  >
                           <label for="district">ตำบล/แขวง</label>
                  </div>
               
                     <div class="input-field col s2">
                         <input placeholder="อำเภอ/เขต" id="city" name="city"  type="text" class="validate"  value="<?=@$city?>"  >
                           <label for="city">อำเภอ/เขต</label>
                  </div>
               
               
            
            
              

        </div>
        
        
        
        
          <div class="row">
              
                <div class="input-field col s1">
                 
             </div>
              
                  <div class="input-field col s2">
                      <input placeholder="จังหวัด" id="province" name="province"  type="text" class="validate" value="<?=@$province?>" >
                           <label for="province">จังหวัด</label>
                  </div>
              
              
              
               <div class="input-field col s2">
                  <i class="material-icons prefix">phone</i>
                  <input placeholder="Placeholder" id="tel_address"  name="tel_address"  type="tel" class="validate"  value="<?=@$tel_address?>"  >
                     <label for="tel_address">โทรศัพท์</label>
             </div>
              
              
              
          </div>
        
        
        <div class="row">
      
            
            <div class="input-field col s1">
                 
             </div>
            
              <div class="input-field col s2">
                     <label for="first_name">สถิติการลาในปีงบประมาณนี้</label>
             </div>
            
            
            
           
            
            
            
        </div>
        
        
      
        
        
          <div class="row">
              
               <div class="input-field col s1">
                   
               </div>
              
              
                   
         <div class="input-field col s2">
            <table  class="highlight" >
        <thead>
          <tr>
              <th    >ลามาแล้ว <br>(วันทำการ)</th>
              <th>ลาครั้งนี้ <br>(วันทำการ) </th>
              <th>รวมเป็น <br>(วันทำการ)</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
                <input placeholder="วัน" id="leave"  name="leave"  type="text" class="validate" value="<?=@$leave?>"  >
            </td>
            <td>
                <input placeholder="วัน" id="leave_thistime"  name="leave_thistime"  value="<?=@$leave_thistime?>"  type="text" class="validate">
            </td>
            <td>
                <input placeholder="วัน" id="date_total_leave"   name="date_total_leave"  value="<?=@$date_total_leave?>"  type="text" class="validate">
            </td>
          </tr>
          
         
          
        </tbody>
      </table>
          </div>   
              
               
                   
               
                  
                  
                   
  </div>
        
        
        <div class="row">
            <div class="input-field   col s7"></div>
            <div class="input-field   col s3">
                 <label >ขอแสดงความนับถือ</label>
            </div>
        </div>
        
        
        
        <div class="row">
            
        </div>
        
        <div class="row">
            
        </div>
        
        
        <div class="row">
            
            <div class="input-field col s6">
                
            </div> 
            
            <div class="input-field col s6">
                <input  id="sign"  name="sign" type="text" class="validate" value="<?=@$sign?>" >
                <label>(ลงชื่อ)</label>
            </div>
            
        </div>
        
        
        <div class="row">
    <div class="input-field col s6"></div>
    
   
    
    <div class="input-field col s2">
        
        <?php
          // $presign=3;
        
           if( $presign == 1 )
           {
        ?>
        <input name="presign" type="radio" id="presign1" value="1" checked="checked"  />
           <label for="presign1">นาย</label>
        
           
        
           <input name="presign" type="radio" id="presign2"   value="2" />
           <label for="presign2">นาง</label>
          
           
       
           <input name="presign" type="radio" id="presign3"  value="3" />
           <label for="presign3">นางสาว</label>
      <?php
           }
           elseif( $presign == 2 )
           {
      ?>
           
           <input name="presign" type="radio" id="presign1" value="1"  />
           <label for="presign1">นาย</label>
        
           
        
           <input name="presign" type="radio" id="presign2"   value="2"   checked="checked" />
           <label for="presign2">นาง</label>
          
           
       
           <input name="presign" type="radio" id="presign3"  value="3" />
           <label for="presign3">นางสาว</label>
           
           <?php
           }
           elseif( $presign == 3  )
           {
           ?>
           
           <input name="presign" type="radio" id="presign1" value="1"  />
           <label for="presign1">นาย</label>
        
           
        
           <input name="presign" type="radio" id="presign2"   value="2"   />
           <label for="presign2">นาง</label>
          
           
       
           <input name="presign" type="radio" id="presign3"  value="3"  checked="checked"  />
           <label for="presign3">นางสาว</label>
           
           
           <?php
           }
           else{
           
           ?>
           
            <input name="presign" type="radio" id="presign1" value="1"  />
           <label for="presign1">นาย</label>
        
           
        
           <input name="presign" type="radio" id="presign2"   value="2"   />
           <label for="presign2">นาง</label>
          
           
       
           <input name="presign" type="radio" id="presign3"  value="3"    />
           <label for="presign3">นางสาว</label>
           
           
           <?php
           }
           ?>

    </div>
    
    
    
    <div class="input-field col s2">
             
        <input type="text" id="autocomplete-input"  id="name_sign"  name="name_sign"  class="autocomplete" value="<?=$name_sign?>"  >
          <label for="name_sign">ชื่อ</label>
          
    </div>
    <div class="input-field col s2">
         
        <input type="text" id="autocomplete-input" class="autocomplete"  id="lastname_sign"  name="lastname_sign"  value="<?=$lastname_sign?>"  >
          <label for="lastname_sign">นามสกุล</label>
    </div>

</div>
        
        
        <div class="row">
            
            <div class="input-field col s7"></div>
            <div class="input-field col s3">
                <label>ความเห็นของผู้บังคับบัญชาชั้นต้น</label>
            </div>
        </div>
        
        
        
        <div class="row">
            <div class="input-field col s6"></div>
            <?php
            //$allowed ="";
            if( $allowed == 1 )
            {
               ?>
            <div class="input-field col s2">
                <input type="radio" class="filled-in"  name="allowed"  id="allowed1"  value="1"  checked="checked" />
      <label for="allowed1">เห็นควรอนุญาต</label>
            </div>
            
             <div class="input-field col s2">
                 <input type="radio" class="filled-in"  name="allowed"  id="allowed2"    value="2" />
      <label for="allowed2">ไม่เห็นควรอนุญาต</label>
            </div>
            
            <?php
            }
            elseif(   $allowed == 2  )
            {
            ?>
            <div class="input-field col s2">
                <input type="radio" class="filled-in"  name="allowed"  id="allowed1"  value="1"   />
      <label for="allowed1">เห็นควรอนุญาต</label>
            </div>
            
             <div class="input-field col s2">
                 <input type="radio" class="filled-in"  name="allowed"  id="allowed2"    value="2" checked="checked" />
      <label for="allowed2">ไม่เห็นควรอนุญาต</label>
            </div>
            
            
            <?php
            }else
            {
            ?>
            
            <div class="input-field col s2">
                <input type="radio" class="filled-in"  name="allowed"  id="allowed1"  value="1"   />
      <label for="allowed1">เห็นควรอนุญาต</label>
            </div>
            
             <div class="input-field col s2">
                 <input type="radio" class="filled-in"  name="allowed"  id="allowed2"    value="2"  />
      <label for="allowed2">ไม่เห็นควรอนุญาต</label>
            </div>
            
            <?php
            }
            ?>
            
        </div>
        
        
        
        
        <div class="row">
            
            <div class="input-field col s1">
                
            </div>
            
   
            
            
            <div class="input-field col s2">
                <input placeholder="" id="name_inspector"  name="name_inspector"  type="text" class="validate" value="<?=$name_inspector?>">
                <label for="name_inspector">(ลงชื่อ)</label>
            </div>
            <div class="input-field col s2">
                <input placeholder=""id="lastname_inspector"   name="lastname_inspector"    type="text" class="validate"  value="<?=$lastname_inspector?>">
                <label for="lastname_inspector">(นามสกุล)</label>
            </div>
            
            <div class="input-field col s1">
                
                <label for="test">ผู้ตรวจสอบ</label>
            </div>
            
            
            <div class="input-field col s2">
                <input placeholder="" id="name_commander"  name="name_commander"   type="text" class="validate"  value="<?=@$name_commander?>">
                <label for="name_commander">(ลงชื่อ)</label>
            </div>
                <div class="input-field col s2">
                    <input placeholder=""   id="lastname_commander"  name="lastname_commander"  value="<?=@$lastname_commander?>"  type="text" class="validate"   >
                <label for="lastname_commander">(นามสกุล)</label>
            </div>
            
            
            
        </div>
        
        
        <div class="row">
            
            <div class="input-field col s1">
                
            </div>  
            
            <div class="input-field col s4">
                <input placeholder="" id="position_inspector"  name="position_inspector"  type="text" class="validate"  value="<?=$position_inspector?>" >
                   <label for="position_inspector">ตำแหน่ง</label>
            </div>
            
            <div class="input-field col s1">
                
            </div>
            
            <div class="input-field col s4">
                <input placeholder="" id="position_commander"  name="position_commander"  type="text" class="validate"  value="<?=@$position_commander?>">
                   <label for="position_commander">ตำแหน่ง</label>
            </div>
        </div>
        
        
        <div class="row">
            
            
            <div class="input-field col s2">
                
            </div> 

            <div class="input-field col s2">
                <i class="material-icons prefix">today</i>
                <input type="date"  id="date_inspector"   name="date_inspector"   value="<?=$date_inspector?>"   class="datepicker">
            </div>
            
            <div class="input-field col s3">
                
            </div>
            
                 <div class="input-field col s2">
                <i class="material-icons prefix">today</i>
                <input type="date"  id="date_commander"  name="date_commander"  value="<?=@$date_commander?>"  class="datepicker">
            </div>

            
        </div>
              
        <div class="row">
            <div class="input-field col s7">
                
            </div>
            
            
            <div class="input-field col s2">
                <label>คำสั่งผู้บริหาร</label>
            </div>
            
        </div>
        
        <div class="row">
            
        <div class="input-field col s6">
            
        </div>
            
           <?php
            // $allow_manager="";
              if( $allow_manager == 1)
              {
           ?>
            
            <div class="input-field col s1">
                
                <input name="allow_manager"   id="allow_manager1"  value="1"  type="radio" checked="checked" />
           <label for="allow_manager1">อนุญาต</label>

            </div>
            
            <div class="input-field col s1">
                
            </div>

            <div class="input-field col s1">
                <input   name="allow_manager"   id="allow_manager2"  value="2"   type="radio"  />
           <label for="allow_manager2">ไม่อนุญาต</label>
          
            </div>
            <?php
              }
              elseif( $allow_manager == 2 )
              {
            ?>
            <div class="input-field col s1">
                
                <input name="allow_manager"   id="allow_manager1"  value="1"  type="radio"  />
           <label for="allow_manager1">อนุญาต</label>

            </div>
            
            <div class="input-field col s1">
                
            </div>

            <div class="input-field col s1">
                <input   name="allow_manager"   id="allow_manager2"  value="2"   type="radio" checked="checked" />
           <label for="allow_manager2">ไม่อนุญาต</label>
          
            </div>
            
            <?php
              }
              else
              {
            ?>
            <div class="input-field col s1">
                
                <input name="allow_manager"   id="allow_manager1"  value="1"  type="radio"  />
           <label for="allow_manager1">อนุญาต</label>

            </div>
            
            <div class="input-field col s1">
                
            </div>

            <div class="input-field col s1">
                <input   name="allow_manager"   id="allow_manager2"  value="2"   type="radio"  />
           <label for="allow_manager2">ไม่อนุญาต</label>
          
            </div>
            
            <?php
              }
            ?>
            
        </div>
        
        
        <div class="row">
            <div class="input-field col s6">
                
            </div>
             <div class="input-field col s2">
                 <input placeholder="" id="first_name2"   name="first_name2"  type="text" class="validate"  value="<?=@$first_name2?>"  >
                <label for="first_name2">(ลงชื่อ)</label>
            </div>
                <div class="input-field col s2">
                    <input placeholder="" id="last_name2"  name="last_name2"  type="text" class="validate" value="<?=@$last_name2?>" >
                <label for="last_name2">(นามสกุล)</label>
            </div>
        </div>
        
        <div class="row">
               
            <div class="input-field col s6">
                
            </div>
            
            <div class="input-field col s4">
                <input placeholder="" id="last_position"  name="last_position"  type="text" class="validate"  value="<?=@$last_position?>"  >
                   <label for="last_position">ตำแหน่ง</label>
               </div>
            
                   
        </div>
        
        <div class="row">
            
            
          

           
            
            <div class="input-field col s7">
                
            </div>
            
                 <div class="input-field col s2">
                <i class="material-icons prefix">today</i>
                <input type="date"  id="last_date"   name="last_date"  class="datepicker" value="<?=@$last_date?>"  >
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
                                      $.post('<?=base_url()?>index.php/welcome/update_vacation', $('#fr_update_vacation').serialize(),
                                                    function(data)
                                                    {
                                                            //  alert(data);
                                                              
                                                              
                                                              if( data == 1 )
                                                              {
                                                                       Materialize.toast('ปรับปรุงข้อมูลสำเร็จ', 3000, 'rounded');
                                                                     //  $('#modal_show_insert1').modal('open');
                                                                     //http://10.87.196.170/document/index.php/welcome/form_vacation
                                                                    // $('#sub11').load('<?=base_url()?>index.php/welcome/form_vacation');
                                                                    
                                                                   // $('#sub11').load('<?=base_url()?>index.php/welcome/table_vacation');
                                                                     $('#sub11').load('<?=base_url()?>index.php/welcome/table_vacation');
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










