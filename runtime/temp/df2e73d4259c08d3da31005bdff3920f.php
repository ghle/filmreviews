<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\phpStudy\WWW\filmreviews\public/../application/admin/view/daoyan/edit.html";i:1532873566;}*/ ?>
 <link rel="stylesheet" href="/filmreviews/public/static/css/x-admin.css" media="all">

   <div class="x-body">
            <form class="layui-form">


                
        <input type="hidden" name="id" value="<?php echo isset($vo['id'])?$vo['id']: ''; ?>">
        <div class="layui-form-item">
             <label for="username" class="layui-form-label">DID：</label>
            <div class="layui-input-inline"">
                <input type="text" class="layui-input" class="layui-input" required="" lay-verify="required" id="username"placeholder="DID" name="did" value="<?php echo isset($vo['did'])?$vo['did']: ''; ?>" >
            </div>
             <div class="layui-form-mid layui-word-aux">
                     <span class="x-red">*</span>
            </div>
        </div>
        <div class="layui-form-item">
             <label for="username" class="layui-form-label">导演/演员姓名：</label>
            <div class="layui-input-inline"">
                <input type="text" class="layui-input" class="layui-input" required="" lay-verify="required" id="username"placeholder="导演/演员姓名" name="dyyyxm" value="<?php echo isset($vo['dyyyxm'])?$vo['dyyyxm']: ''; ?>" >
            </div>
             <div class="layui-form-mid layui-word-aux">
                     <span class="x-red">*</span>
            </div>
        </div>


              <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>导演照骗：
                    </label>
                    <div class="layui-input-inline">
                      <div class="site-demo-upbar">

                        <input type="file" name="file" class="layui-upload-file" id="test">
                      </div>
                      
                          <input type="text" class="layui-input" id="file"  name="daoyanicon" value="<?php echo isset($vo['daoyanicon'])?$vo['daoyanicon']: ''; ?>">
                   
                    </div>
                </div>
        <div class="layui-form-item">
             <label for="username" class="layui-form-label">导演/演员身份：</label>
            <div class="layui-input-inline"">
                <input type="text" class="layui-input" class="layui-input" required="" lay-verify="required" id="username"placeholder="导演/演员身份" name="is_roles" value="<?php echo isset($vo['is_roles'])?$vo['is_roles']: ''; ?>" >
            </div>
             <div class="layui-form-mid layui-word-aux">
                     <span class="x-red">*</span>
            </div>
        </div>

          <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="save" lay-submit="">
                        保存
                    </button>
                </div>
    </form>
</div>



   <script src="/filmreviews/public/static/lib/layui/layui.js" charset="utf-8">   </script>
 <script src="/filmreviews/public/static/js/x-layui.js" charset="utf-8">
        </script>
          <script src="/filmreviews/public/static/lib/layui/layui.js" charset="utf-8"> </script>
 <script>

            layui.use(['form','layer'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;
            
              //自定义验证规则
              form.verify({
                nikename: function(value){
                  if(value.length < 5){
                    return '昵称至少得5个字符啊';
                  }
                }
                ,pass: [/(.+){6,12}$/, '密码必须6到12位']
                ,repass: function(value){
                    if($('#L_pass').val()!=$('#L_repass').val()){
                        return '两次密码不一致';
                    }
                }
              });

              //监听提交
              form.on('submit(save)', function(data){
                console.log(data);
            
                if (data.field.id=='') {
                       //发异步，把数据提交给php
                    $.ajax({
                       url:"http://localhost<?php echo \think\Request::instance()->baseUrl(); ?>",
                      type:'POST',
                      dataType:'json',
                      data:data.field,
                      success:function(res){
                            console.log(res);
                      },
                      fail:function(res){
                          console.log(res);
                      }
                    })
                }else{
                  
                  //发异步，把数据提交给php
                    $.ajax({
                      url:"http://localhost<?php echo \think\Request::instance()->baseUrl(); ?>",
                      type:'POST',
                      dataType:'json',
                      data:data.field,
                      success:function(res){
                            console.log(res);
                      },
                      fail:function(res){
                          console.log(res);
                      }
                    })
                }

                
                
                layer.alert("保存成功", {icon: 6},function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
                return false;
              });
              
              
            });


        </script>

         <script>
            layui.use(['form','layer','upload'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;


              // //图片上传接口
              // layui.upload({
              //   url: './upload.json' //上传接口
              //   ,success: function(res){ //上传成功后的回调
              //       console.log(res);
              //     $('#LAY_demo_upload').attr('src',res.url);
              //   }
              // });

               
              //图片上传接口
              layui.upload({
                url: '/filmreviews/public/index.php/admin/<?php echo \think\Request::instance()->controller(); ?>/upload' //上传接口
                ,success: function(res){ //上传成功后的回调
                    console.log(res.data);
                  $('#file').attr("value",res.data);
                }
              });
            
            

              //监听提交
              form.on('submit(add)', function(data){
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("增加成功", {icon: 6},function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
                return false;
              });
              
              
            });
        </script>
        
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>

