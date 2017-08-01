<?php $this->load->view("import")?>
  <?php    header('Content-Type: text/html; charset=UTF-8');  ?>


<script type="text/javascript">
    
      $(document).ready(function(){  
            Materialize.toast('เพิ่มกิจกรรมทางวิชาการ', 3000,'rounded');
    });
    
    
    $(document).ready(function() 
    {
           $('#firstname_academic').material_select(); //ชื่อ-นามสกุล
           $('#activities').material_select(); //กิจกรรม
           
           $('#begin_date').pickadate({
               // selectMonths:true,
                   selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year
                    monday:'Mon',
                  // format:'dd-mm-yyyy',
                    format:'yyyy-mm-dd',
           });
           
         $('#end_date').pickadate({
               // selectMonths:true,
                   selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year
                    monday:'Mon',
                  // format:'dd-mm-yyyy',
                    format:'yyyy-mm-dd',
           });
           
           
           
    });
    

    
</script>


<div  style="padding: 10px;"  >
    
</div>

 <div class="row">
      

     <form class="col s12" id="fr_sub11"  action="<?=base_url()?>index.php/welcome/update_tb_main_academic"    accept-charset="UTF-8" method="post" enctype="multipart/form-data"  >
    
    
      <div class="row">
          
          <input type="hidden"  name="id_main_academic"  id="id_main_academic"  value="<?=$id_main_academic?>"    />

                    <div class="input-field col s6">
                        
                     
                        
                                 <select id="firstname_academic" name="firstname_academic" >
                                          
                                          <option value="" disabled selected>Choose your option</option>
                                            
                                            
                                          <!--
                                          <option value="1">บวรศิลป์  เชาว์ชื่น</option>
                                          
                                          <option value="2">ไชยวิทย์  ธนไพศาล</option>
                                          
                                           <option value="3">ปรารถนา  เชาว์ชื่น</option>
                                           
                                          <option value="4">สมศักดิ์  กิจสหวงศ์</option>
                                          
                                          <option value="5">เบญจมาศ  พระธานี</option> 
                                          
                                          <option value="6">จารุณี  รัตนยาติกุล</option>
                                          
                                          <option value="7">นิรมล  พัจนสุนทร</option>
                                          
                                          <option value="8">รัตนา  ดวงฤดีสวัสดิ์</option>
                                          
                                           <option value="9">สุธีรา  ประดับวงษ์</option>
                                           
                                          <option value="10">กมลวรรณ  เจนวิถีสุข</option>
                                          
                                           <option value="11">พลากร  สุรกุลประภา</option>
                                           
                                          <option value="12">ถวัลย์วงค์  รัตนสิริ</option>
                                          
                                           <option value="13">วิชัย  ชี้เจริญ</option>
                                           
                                           <option value="14">Keith  Godfrey</option>
                                           
                                           <option value="15">ผกาพรรณ  เกียรติชูสกุล</option>
                                           
                                           <option value="16">ศิรินารถ  ศรีกาญจนเพริศ</option>
                                           
                                           <option value="17">ธีระพร  รัตนาเอนกชัย</option>
                                           
                                           <option value="18">กฤษณา  เลิศสุขประเสริฐ</option>
                                           
                                           <option value="19">วิมลรัตน์  กฤษณะประกรกิจ</option>
                                           
                                           <option value="20">สุชาติ  อารีมิตร</option>
                                           
                                           <option value="21">มณฑล  เมฆอนันต์ธวัช</option>
                                           
                                           <option value="22">สงวนศักดิ์  ธนาวิรัตนานิจ</option>
                                           
                                           <option value="23">สุปราณี  เทวินบุรานุวงศ์</option>
                                           
                                           <option value="24">พรรณรัตน์  มณีรัตนรังษี</option>
                                           
                                             <option value="25">อรอุมา  อังวราวงศ์</option>
                                           
                                            <option value="26">มนเทียร  มโนสุดประสิทธิ์</option>
                                            
                                            <option value="27">วรัญญู  คงกันกง</option>

                                              <option value="28">ดาราวรรณ  อักษรวรรณ</option>
                                              
                                               <option value="29">รุ่งทิวา  รินทรานุรักษ์</option>
                                               
                                                <option value="30">ดวงใจ  สุคนธมาน</option>
                                                
                                               <option value="31">เบญจพร  นิตินาวาการ</option>
                                             -->
                                             <?php   //$this->user_model->select_academic();  ?>
                                             <?php    $this->user_model->update_select_academic($id_firstname_academic);  ?>
                                               
                                 </select>
                                           <label> ชื่อ-นามสกุล : </label>
                     </div>
          
                  <div class="input-field col s6">
                            <select id="activities" name="activities" >
                                     <option value="" disabled selected>Choose your option</option>
                                            <?php   $this->user_model->update_select_activities($id_activities); ?>
                            </select>
                                      <label> กิจกรรม : </label>
                 </div>
          
          
           <div class="input-field col s6">
                             <i class="material-icons prefix">today</i>
                             <input type="date" id="begin_date"  name="begin_date"   class="datepicker"  value="<?=@$begin_date?>" />   
                            <!-- <label> ตั้งแต่วันที่ : </label> -->
           </div>
          
           <div class="input-field col s6">
                             <i class="material-icons prefix">today</i>
                             <input type="date" id="end_date"  name="end_date"   class="datepicker" value="<?=@$end_date?>"  />   
                            <!-- <label> ตั้งแต่วันที่ : </label> -->
           </div>

          
          
           <div class="input-field col s6">
          <i class="material-icons prefix">restore</i>
          <input id="begin_time"  name="begin_time"  type="tel" class="validate"  data-length="10"  value="<?=@$begin_time?>" />
          <label for="begin_time">เวลานัดหมาย</label>
        </div>
          
          
          <!--
            <div class="input-field col s6">
          <i class="material-icons prefix">restore</i>
          <input id="end_time"  name="end_time"  type="tel" class="validate"  data-length="10"  value="<?=@$end_time?>"   />
          <label for="end_time">Finish 00:00:00</label>
        </div>
          -->
          
          
          
        <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="title" name="title"  type="text"  placeholder="หัวข้อ"  value="<?=@$title?>" />
                   <!-- <label for="title">หัวข้อ</label> -->
        </div>
          
           <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="place" name="place"  type="text"  placeholder="สถานที่"  value="<?=@$place?>" />
                   <!-- <label for="place">สถานที่</label> -->
        </div>
          
          
          <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="detail" name="detail"  type="text"  placeholder="รายละเอียด"  value="<?=@$detail?>" />
                   <!-- <label for="detail">รายละเอียด</label>-->
         </div>
          
          
         <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="expenses" name="expenses"  type="text"  placeholder="ค่าใช้จ่าย"  value="<?=@$expenses?>" />
                   <!-- <label for="expenses">ค่าใช้จ่าย</label>-->
         </div>
          
          
         <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="borrow" name="borrow"  type="text"  placeholder="เงินยืม"  value="<?=@$borrow?>" />
                  <!--  <label for="borrow">เงินยืม </label> -->
         </div>
          
          
         <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="note" name="note"  type="text"  placeholder="หมายเหตุ"  value="<?=@$note?>" />
                  <!--  <label for="note">หมายเหตุ </label> -->
         </div>
          
          
          <div class="button-collapse col s6">
                
            
              <button class="waves-effect waves-light btn-large" type="submit"  id="btn_academic"  name="btn_academic" >
                                  UPDATE
                                  <i class="material-icons md-30">phonelink_ring</i>
              </button>
                
                
            </div>
          
          
          
          
      </div>
    
   
    </form>
    
    
   
    
  
  </div>
        
