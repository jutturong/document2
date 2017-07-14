<!DOCTYPE html>
<html>
<head>
<?=$this->load->view("import")?>
</head>
<body>

    <!--
    <h2>Basic PasswordBox</h2>
    <p>The passwordbox allows a user to enter passwords.</p>
  -->

  <div class="easyui-panel" style="width:400px;padding:50px 60px">
      <div style="margin-bottom:20px">
          <input class="easyui-textbox" prompt="Username" iconWidth="28" style="width:100%;height:34px;padding:10px;">
      </div>
      <div style="margin-bottom:20px">
          <input id="pass" class="easyui-passwordbox" prompt="Password" iconWidth="28" style="width:100%;height:34px;padding:10px">
      </div>

      <div style="margin:10px">
      <a href="<?=base_url()?>index.php/welcome/home/" class="easyui-linkbutton" data-options="iconCls:'icon-large-chart',size:'large',iconAlign:'top'">Login (เข้าสู่ระบบ)</a>
      <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove',size:'large',iconAlign:'top'  " >Clear (ล้าง)</a>
      </div>


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
