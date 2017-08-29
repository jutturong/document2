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
      

     <form class="col s12" id="fr_sub11"  action="<?=base_url()?>index.php/welcome/insert_academic"    accept-charset="UTF-8" method="post" enctype="multipart/form-data"  >
    
    
      <div class="row">

                    <div class="input-field col s6">
                                 <select id="firstname_academic" name="firstname_academic" >
                                          <option value="" disabled selected>Choose your option</option>
                                          <option value="1">ศ.บวรศิลป์  เชาว์ชื่น</option>
                                          <option value="2">สุธีรา-ประดับวงษ์</option>
                                          <option value="">นงลักษณ์  พรมขอนยาง</option>
                                          <option value="">ภาวิณี  รูปพรม</option>
                                          
                                          <option value="">ศุภชัย วงศ์ชื่น</option>
                                          <option value="">จัตุรงค์ เจริญฤทธิ์</option>

                                 </select>
                                           <label> ชื่อ-นามสกุล : </label>
                     </div>
          
                  <div class="input-field col s6">
                            <select id="activities" name="activities" >
                                     <option value="" disabled selected>Choose your option</option>
                                     <option value="1">วิทยากรในประเทศ</option>
                                     <option value="2">วิทยากรต่างประเทศ</option>
                                     <option value="3">ประชุมวิชาการในประเทศ</option>
                                     <option value="4">ประชุมวิชาการต่างประเทศ</option>
                                     <option value="5">ประชุมอื่นๆ</option>
                                     <option value="6">อบรม/ดูงานในประเทศ</option>
                                     <option value="7">อบรม/ดูงานต่างประเทศ</option>
                                     <option value="8">บริการวิชาการ</option>
                                     <option value="9">ศิลปวัฒนธรรม</option>
                            </select>
                                      <label> กิจกรรม : </label>
                 </div>
          
          
           <div class="input-field col s6">
                             <i class="material-icons prefix">today</i>
                            <input type="date" id="begin_date"  name="begin_date"   class="datepicker"  />   
                            <!-- <label> ตั้งแต่วันที่ : </label> -->
           </div>
          
           <div class="input-field col s6">
                             <i class="material-icons prefix">today</i>
                            <input type="date" id="end_date"  name="end_date"   class="datepicker"  />   
                            <!-- <label> ตั้งแต่วันที่ : </label> -->
           </div>

          
        <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="title" name="title"  type="text"  placeholder="หัวข้อ"  value="" />
                    <label for="title">หัวข้อ</label>
        </div>
          
           <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="place" name="place"  type="text"  placeholder="สถานที่"  value="" />
                    <label for="place">สถานที่</label>
        </div>
          
          
          <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="place" name="place"  type="text"  placeholder="รายละเอียด"  value="" />
                    <label for="place">รายละเอียด</label>
         </div>
          
          
         <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="expenses" name="expenses"  type="text"  placeholder="ค่าใช้จ่าย"  value="" />
                    <label for="expenses">ค่าใช้จ่าย</label>
         </div>
          
          
         <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="borrow" name="borrow"  type="text"  placeholder="เงินยืม"  value="" />
                    <label for="borrow">เงินยืม </label>
         </div>
          
          
         <div class="input-field col s6">
                     <i class="material-icons prefix">account_circle</i>
                    <input id="note" name="note"  type="text"  placeholder="หมายเหตุ"  value="" />
                    <label for="note">หมายเหตุ </label>
         </div>
          
          
          <div class="button-collapse col s6">
                
            
              <button class="waves-effect waves-light btn-large" type="submit"  id="btn_academic"  name="btn_academic" >SAVE
                                  <i class="material-icons md-30">phonelink_ring</i>
              </button>
                
                
            </div>
          
          
          
          
      </div>
    
   
    </form>
    
    
   
    
  
  </div>
        
