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

           <form class="col s12"     id="fr_vacation"  method="post"  enctype="multipart/form-data"  novalidate="novalidate" >



               <div class="row">
                   <div class="input-field col s8">


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
      <label for="type_person5">เจ้าหน้าที่ศูนย์ตะวันฉาย</label>

                   </div>
               </div>


        <div class="row">


             <div class="input-field col s8">
             </div>

        <div class="input-field col s4">
            <input placeholder="ศูนย์ตะวันฉายฯ" id="write" name="write"  type="text"  value="ศูนย์ตะวันฉายฯ"  class="validate">
               <!--<label for="write">เขียนที่</label>-->
        </div>


      </div>




          <div class="row">

                <div class="input-field col s9">
             </div>


                      <div class="input-field col s3">
                          <i class="material-icons prefix">today'll</i>
                          <input type="date"  id="date_write"  name="date_write"  class="datepicker"  >

                      </div>




                </div>




         <div class="row">

                 <div class="input-field col s3">
                     <input placeholder="Placeholder" id="subject"  name="subject" type="text" class="validate" value="ขอลาพักผ่อนประจำปี">

             </div>




           </div>




       <div class="row">

            <div class="input-field col s3">
                <input placeholder="Placeholder" id="study" name="study" type="text" class="validate" value="รองผู้อำนวยการฝ่ายบริหาร ศูนย์ตะวันฉาย" >
                  <!--<label for="study">เรียน</label>-->
             </div>

       </div>




       <div class="row">



           <div class="input-field col s1">


            </div>


           <!--
            <div class="input-field col s2">




                <input  type="radio" id="prename1"  value="1"  name="prename"    />
      <label for="prename1">นาย</label>

      <input  type="radio" id="prename2"   value="2"  name="prename" />
      <label for="prename2">นาง</label>

      <input class="with-gap"  type="radio" id="prename3"  value="3"   name="prename"  />
      <label for="prename3">นางสาว</label>



            </div>
           -->


            <div class="input-field col s3">


                 <!--    index.php/welcome/call_tbstaff  -->

                <select class="browser-default"  id="id_staff"  name="id_staff"   onchange="
                             javascript:
                             $.post('<?=base_url()?>index.php/welcome/call_tbstaff',{ 'id_staff':$('#id_staff').val()  },function(data)
                             {
                                     $('#position').val(data);
                             });

                              $.post('<?=base_url()?>index.php/welcome/call_staff_name',{ 'id_staff':$('#id_staff').val()  },function(data)
                             {
                                   //  $('#position').val(data);
                                   $('#sign').val(data);
                             });


                              $.post('<?=base_url()?>index.php/welcome/call_field_name',{ 'id_staff':$('#id_staff').val() ,'field':'name'  },function(data)
                             {
                                   //  $('#position').val(data);
                                 //  $('#sign').val(data);
                                     //  alert(data);
                                       $('#name_sign').val(data);
                                       $('#first_name').val(data);

                             });


                                 $.post('<?=base_url()?>index.php/welcome/call_field_name',{ 'id_staff':$('#id_staff').val() ,'field':'lastname'  },function(data)
                             {
                                   //  $('#position').val(data);
                                 //  $('#sign').val(data);
                                     //  alert(data);
                                       $('#lastname_sign').val(data);
                                       $('#last_name').val(data);
                             });


                               $.post('<?=base_url()?>index.php/welcome/call_field_name',{ 'id_staff':$('#id_staff').val() ,'field':'prename'  },function(data)
                             {

                                     //alert(data);
                                     if( data == 'นาย' )
                                     {
                                           $('#prename1').attr('checked',true);
                                           $('#presign1').attr('checked',true);
                                     }
                                     else if( data == 'นาง' )
                                     {
                                           $('#prename2').attr('checked',true);
                                           $('#presign2').attr('checked',true);
                                     }
                                     else if( data == 'นางสาว' )
                                     {
                                           $('#prename3').attr('checked',true);
                                           $('#presign3').attr('checked',true);
                                     }

                             });





                                                             " >
                            <option value="" disabled selected>ชื่อ-นามสกุล</option>
                            <!--
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            -->
                            <?=$this->user_model->tb_staff()?>
                </select>


             </div>



           <div class="input-field col s2">
               <input  type="radio" id="prename1"  value="1"  name="prename"    />
      <label for="prename1">นาย</label>

      <input  type="radio" id="prename2"   value="2"  name="prename"   />
      <label for="prename2">นาง</label>

      <input class="with-gap"  type="radio" id="prename3"  value="3"   name="prename"  />
<label for="prename3">นางสาว</label>
           </div>


              <div class="input-field col s2">

                  <input placeholder="ชื่อ" id="first_name"  name="first_name" type="text" class="validate"    >
                          <!-- <label for="first_name">ชื่อ</label> -->

             </div>


           <div class="input-field col s2">
                 <input placeholder="นามสกุล" id="last_name"  name="last_name" type="text" class="validate"  >
                          <!-- <label for="last_name">นามสกุล</label> -->
           </div>





            <div class="input-field col s2">


                <input placeholder="ตำแหน่ง" id="position"  name="position"    type="text" class="validate"  readonly="true"  >
                   <!--  <label for="position">ตำแหน่ง</label>  -->


             </div>




       </div>




        <div class="row">


                    <div class="input-field col s3">
                        <input placeholder="สังกัดหน่วย" id="affiliation"   name="affiliation"  type="text" class="validate" >
                     <label for="affiliation">สังกัดหน่วย</label>
             </div>


             <div class="input-field col s3">
                 <input placeholder="งาน" id="work"  name="work" type="text" class="validate"  >
                     <label for="work">งาน</label>
             </div>

             <div class="input-field col s1">

                     <label for="first_name">คณะแพทยศาสตร์</label>
             </div>



             <div class="input-field col s3">
                  <i class="material-icons prefix">phone</i>
                  <input placeholder="Placeholder" id="tel" name="tel"  type="tel" class="validate" value="043363123" >
                       <!-- <label for="tel">โทร.</label> -->
             </div>

        </div>




        <div class="row">

             <div class="input-field col s1">

             </div>

            <div class="input-field col s2">

                <label for="first_name"  >มีวันลาสะสม</label>

             </div>

            <div class="input-field col s3">
                <input placeholder=""  id="cumulative" name="cumulative"   type="tel" class="validate"   >
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
                <input   name="rest"    id="rest" type="tel" class="validate" >
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
                <input  id="total"  name="total"  type="tel" class="validate" >
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
                <input  id="current"  name="current"  type="tel"   class="validate" >
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
                <input  id="keep" name="keep"  type="tel" class="validate" >
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
                <input  id="wishes" name="wishes"  id="wishes"     type="tel" class="validate"   required   />
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
                          <input type="date" id="date_begin"  name="date_begin"  class="datepicker"  required />

                      </div>


          <div class="input-field col s1">

                     <label for="end_date">ถึงวันที่</label>

             </div>


             <div class="input-field col s2">
                          <i class="material-icons prefix">today'll</i>
                          <input type="date"  id="end_date"  name="end_date"    class="datepicker"  required >

                      </div>





        </div>



           <div class="row">

             <div class="input-field col s1">

             </div>

            <div class="input-field col s3">

                     <label for="first_name">ในระหว่างลาพักผ่อนครั้งนี้  หากมีราชการด่วนติดต่อได้ที่บ้านเลขที่</label>

             </div>

            <div class="input-field col s1">

                <input placeholder="บ้านเลขที่" id="้house_number" name="house_number"    type="tel" class="validate" >
                 <label for="house_number">บ้านเลขที่</label>
            </div>




                   <div class="input-field col s2">


                       <input placeholder="ถนน" id="road"  name="road" type="text" class="validate"    >
                         <label for="road">ถนน</label>




                    </div>


                 <div class="input-field col s2">
                     <input placeholder="ตำบล" id="district" name="district" type="text" class="validate"   >
                           <label for="district">ตำบล/แขวง</label>
                  </div>

                     <div class="input-field col s2">
                         <input placeholder="อำเภอ/เขต" id="city" name="city"  type="text" class="validate"  >
                           <label for="city">อำเภอ/เขต</label>
                  </div>






        </div>




          <div class="row">

                <div class="input-field col s1">

             </div>

                  <div class="input-field col s2">
                      <input placeholder="จังหวัด" id="province" name="province"  type="text" class="validate"  >
                           <label for="province">จังหวัด</label>
                  </div>



               <div class="input-field col s2">
                  <i class="material-icons prefix">phone</i>
                  <input placeholder="โทรศัพท์" id="tel_address"  name="tel_address"  type="tel" class="validate"  >
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
                <input placeholder="วัน" id="leave"  name="leave"  type="text" class="validate" >
            </td>
            <td>
                <input placeholder="วัน" id="leave_thistime"  name="leave_thistime"    type="text" class="validate">
            </td>
            <td>
                <input placeholder="วัน" id="date_total_leave"   name="date_total_leave"  type="text" class="validate">
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
                <input  id="sign"  name="sign" type="text" class="validate"  readonly="true"  >
               <!-- <label>(ลงชื่อ)</label>-->
            </div>

        </div>


        <div class="row">
    <div class="input-field col s6"></div>



    <div class="input-field col s2">


        <input name="presign" type="radio" id="presign1" value="1"  />
           <label for="presign1">นาย</label>



           <input name="presign" type="radio" id="presign2"   value="2" />
           <label for="presign2">นาง</label>



           <input name="presign" type="radio" id="presign3"  value="3" />
           <label for="presign3">นางสาว</label>


    </div>



    <div class="input-field col s2">

        <input type="text"   id="name_sign"  name="name_sign"  class="autocomplete"   readonly="true"  >
          <!--<label for="name_sign">ชื่อ</label>-->

    </div>
    <div class="input-field col s2">

        <input type="text"  class="autocomplete"  id="lastname_sign"  name="lastname_sign"   readonly="true"  >
          <!--<label for="lastname_sign">นามสกุล</label>-->
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

            <div class="input-field col s2">
                <input type="radio" class="filled-in"  name="allowed"  id="allowed1"  value="1"  />
      <label for="allowed1">เห็นควรอนุญาต</label>
            </div>

             <div class="input-field col s2">
                 <input type="radio" class="filled-in"  name="allowed"  id="allowed2"    value="2" />
      <label for="allowed2">ไม่เห็นควรอนุญาต</label>
            </div>


        </div>




        <div class="row">

            <div class="input-field col s1">

            </div>




            <div class="input-field col s2">
                <input placeholder="" id="name_inspector"  name="name_inspector"  type="text" class="validate" value="นงลักษณ์" >
                <!--<label for="name_inspector">(ลงชื่อ)</label>-->
            </div>
            <div class="input-field col s2">
                <input placeholder=""id="lastname_inspector"   name="lastname_inspector"    type="text" class="validate" value="พรมขอนยาง">
                <!--<label for="lastname_inspector">(นามสกุล)</label>-->
            </div>

            <div class="input-field col s1">

                <label for="test">ผู้ตรวจสอบ</label>
            </div>


            <div class="input-field col s2">
                <input placeholder="" id="name_commander"  name="name_commander"   type="text" class="validate"  value="สุธีรา">
                <label for="name_commander">(ลงชื่อ)</label>
            </div>
                <div class="input-field col s2">
                    <input placeholder=""   id="lastname_commander"  name="lastname_commander"   type="text" class="validate"  value="ประดับวงษ์"  >
                <label for="lastname_commander">(นามสกุล)</label>
            </div>



        </div>


        <div class="row">

            <div class="input-field col s1">

            </div>

            <div class="input-field col s4">
                <input placeholder="" id="position_inspector"  name="position_inspector"  type="text" class="validate"  value="เจ้าหน้าที่ผู้ช่วยวิัจัยและธุรการ">
                  <!-- <label for="position_inspector">ตำแหน่ง</label>-->
            </div>

            <div class="input-field col s1">

            </div>

            <div class="input-field col s4">
                <input placeholder="" id="position_commander"  name="position_commander"  type="text" class="validate" value="กรรมการและเลขานุการ">
                   <label for="position_commander">ตำแหน่ง</label>
            </div>
        </div>


        <div class="row">


            <div class="input-field col s2">

            </div>

            <div class="input-field col s2">
                <i class="material-icons prefix">today</i>
                <input type="date"  id="date_inspector"   name="date_inspector"     class="datepicker">
            </div>

            <div class="input-field col s3">

            </div>

            
                <!--
                 <div class="input-field col s2">
                <i class="material-icons prefix">today</i>
               
                <input type="date"  id="date_commander"  name="date_commander"   class="datepicker" readonly="true">
                
                </div>
                -->


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



            <div class="input-field col s1">

                <input name="allow_manager"   id="allow_manager1"  value="1"  type="radio" />
           <label for="allow_manager1">อนุญาต</label>




            </div>

            <div class="input-field col s1">

            </div>



            <div class="input-field col s1">
                <input   name="allow_manager"   id="allow_manager2"  value="2"   type="radio"  />
           <label for="allow_manager2">ไม่อนุญาต</label>

            </div>



        </div>


        <div class="row">
            <div class="input-field col s6">

            </div>
             <div class="input-field col s2">
                 <input placeholder="" id="first_name2"   name="first_name2"  type="text" class="validate"  value="รศ.พญ.นิรมล">
                   <!-- <label for="first_name2">(ลงชื่อ)</label> -->
            </div>
                <div class="input-field col s2">
                    <input placeholder="" id="last_name2"  name="last_name2"  type="text" class="validate"  value="พัจนสุนทร">
                     <!--<label for="last_name2">(นามสกุล)</label>-->
            </div>
        </div>

        <div class="row">

            <div class="input-field col s6">

            </div>

            <div class="input-field col s4">
                <input placeholder="" id="last_position"  name="last_position"  type="text" class="validate"  value="รองผู้อำนวยการฝ่ายบริหาร"  >
                     <!--<label for="last_position">ตำแหน่ง</label>-->
               </div>


        </div>

        <div class="row">






            <div class="input-field col s7">

            </div>

            
            <!--
                 <div class="input-field col s2">
                <i class="material-icons prefix">today</i>
                <input type="date"  id="last_date"   name="last_date"  class="datepicker"  >
            </div>
               -->
               

        </div>


          <div class="row">

              <div class="input-field col s6">

              </div>

              <div class="input-field col s2">



              <!--   <a class="waves-effect waves-light btn-large"><i class="material-icons left">playlist_add</i> บันทึก </a> -->



                  <button class="btn-large waves-effect waves-light" type="button" name="action"
                          onclick="javascript:
                                     // alert('t');
                                      $.post('<?=base_url()?>index.php/welcome/insert_vacation', $('#fr_vacation').serialize(),
                                                    function(data)
                                                    {
                                                              //alert(data);
                                                              if( data == 1 )
                                                              {
                                                                       Materialize.toast('บันทึกข้อมูลสำเร็จ', 3000, 'rounded');
                                                                     //  $('#modal_show_insert1').modal('open');
                                                                     //http://10.87.196.170/document/index.php/welcome/form_vacation
                                                                    // $('#sub11').load('<?=base_url()?>index.php/welcome/form_vacation');

                                                                     $('#sub11').load('<?=base_url()?>index.php/welcome/table_vacation');
                                                               }
                                                               else if( data==0  )
                                                               {
                                                                        Materialize.toast('บันทึกข้อมูลล้มเหลว', 3000, 'rounded');
                                                               }


                                                       });

                                                                  " >

                                 บันทึก
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
