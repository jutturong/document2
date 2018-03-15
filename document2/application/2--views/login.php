<!DOCTYPE html>
<html>
<head>
<?=$this->load->view("import")?>
    
    
    <script type="text/javascript">
        $(function()
        {
               //$('#us').textbox('setValue','root');
               //$('#ps').textbox('setValue','1234');
               
        });
    </script>
    
</head>
<body>

    <!--
    <h2>Basic PasswordBox</h2>
    <p>The passwordbox allows a user to enter passwords.</p>
  -->
  

  <div class="easyui-panel" style="width:400px;padding:50px 60px">
      
      <form id="fr_login"  method="post">
        <div style="margin-bottom:20px">
            <input class="easyui-textbox" id="us" name="us" data-options="  "  prompt="Username" iconWidth="28" style="width:100%;height:34px;padding:10px;">
        </div>
        <div style="margin-bottom:20px">
            <input id="pass" class="easyui-passwordbox"  id="ps"  name="ps"  data-options="  "   prompt="Password" iconWidth="28" style="width:100%;height:34px;padding:10px">
        </div>

        <div style="margin:10px">
        <a href="javascript:void(0);" class="easyui-linkbutton"
           
           onclick="javascript:
           
                //alert('t');
               //url:'<?=base_url()?>index.php/welcome/checklogin',
                 $.ajax({
                     url:'<?=base_url()?>index.php/welcome/checklogin',
                     dataType:'text',
                     method:'post',
                     data:$('#fr_login').serialize(),
                     
                 }).done(function(data)
                 {
                       //alert(data);
                         if( data==1)
                         {
                             
                             /*
                              // $.messager.alert('t','t',function(data){  },'info');
                              $.messager.progress({
                                  title:' รหัสผ่านถูกต้อง ',
                                  msg:'กรุณารอสักครู่ ...',
                                  fn:function()
                                  {
                                      //window.open('<?=base_url()?>index.php/welcome/home/');
                                      alert('t');
                                  }
                              });
                              */
                                 
                                 /*
                                 $.messager.alert({
                                      title:'รหัสผ่านถูกต้อง',
                                      msg:' click เพื่อเข้าสู่ระบบ ',
                                       fn:function(){
                                           //alert('t');
                                           $.messager.progress({value:100});
                                           window.open('<?=base_url()?>index.php/welcome/home/');
                                       },
                                     
                                 });
                              */
                                 
                                 /*
                                 $.messager.show({
                                      title:'รหัสผ่านถูกต้อง',
                                       msg:' click เพื่อเข้าสู่ระบบ ',
                                       showType:'show',
                                        fn:function(){
                                           //alert('t');
                                           //$.messager.progress({value:100});
                                           window.open('<?=base_url()?>index.php/welcome/home/');
                                       },
                                 });
                                 */
                                 
                                  // window.open('<?=base_url()?>index.php/welcome/home/');
                                  location.href='<?=base_url()?>index.php/welcome/home/';
                              
                         }else{
                                $.messager.alert('รหัสผ่านไม่ถูกต้อง','กรุณาตรวจสอบรหัสผ่านอีกครั้ง','error');
                       
                                     
                                 
                         }
                 });
                
           
           "
           
           data-options="iconCls:'icon-lock', selected:true , size:'large',iconAlign:'top'"  style="width:100px;height: 60px;  " >Login</a>
           <a href="javascript:void(0);" class="easyui-linkbutton"  onclick="
                 javascript:
                         //alert('t');
                        $('#us').textbox('setValue','');
                        $('#ps').passwordbox('setValue','');
                 
              " data-options="iconCls:'icon-cancel',size:'large',iconAlign:'top' ,
             
              
              " style="width:100px;height: 60px;"  >Clear</a>
        </div>
      </form>


  </div>
  <div id="viewer"></div>

  <script type="text/javascript">
      $('#pass').passwordbox({
          inputEvents: $.extend({}, $.fn.passwordbox.defaults.inputEvents, {
              keypress: function(e){
                  var char = String.fromCharCode(e.which);
                  $('#viewer').html(char).fadeIn(200, function(){
                      $(this).fadeOut();
                  });
              }
          })
      })
  </script>
  <style>
      #viewer{
          position: relative;
          padding: 0 60px;
          top: -70px;
          font-size: 54px;
          line-height: 60px;
      }
  </style>

  

</body>
</html>
