<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpStudy\WWW\filmreviews\public/../application/admin\view\zixundetail\edit.html";i:1533375778;}*/ ?>
 <link rel="stylesheet" href="/filmreviews/public/static/css/x-admin.css" media="all">

   <div class="x-body">
            <form class="layui-form">


                
        <input type="hidden" name="id" value="<?php echo isset($vo['id'])?$vo['id']: ''; ?>">
        <div class="layui-form-item">
             <label for="username" class="layui-form-label">资讯id：</label>
            <div class="layui-input-inline"">
                <input type="text" class="layui-input" class="layui-input" required="" lay-verify="required" id="username"placeholder="资讯id" name="zxdid" value="<?php echo isset($vo['zxdid'])?$vo['zxdid']: ''; ?>" >
            </div>
             <div class="layui-form-mid layui-word-aux">
                     <span class="x-red">*</span>
            </div>
        </div>
        <div class="layui-form-item">
             <label for="username" class="layui-form-label">内容：</label>
            <div class="layui-input-inline"">
                <input type="text" class="layui-input" class="layui-input" required="" lay-verify="required" id="username"placeholder="内容" name="zxcontent" value="<?php echo isset($vo['zxcontent'])?$vo['zxcontent']: ''; ?>" >
            </div>
             <div class="layui-form-mid layui-word-aux">
                     <span class="x-red">*</span>
            </div>
        </div>
        <div class="layui-form-item">
             <label for="username" class="layui-form-label">资讯父ID：</label>
            <div class="layui-input-inline"">
              
                     <?php if($add == 'add'): ?>
                     
                        <select name="zxpid" lay-verify="required" id="zcySelect">
                           <option value="0">请选择</option> 
                          <?php if(is_array($zxdt) || $zxdt instanceof \think\Collection || $zxdt instanceof \think\Paginator): $i = 0; $__LIST__ = $zxdt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?>
                             <option value="<?php echo $vos['id']; ?>"><?php echo $vos['name']; ?></option>
                          <?php endforeach; endif; else: echo "" ;endif; ?>   
                        </select>
                       

                     <?php endif; if($add == ''): ?> 
                          <select name="zxpid" lay-verify="required" id="zcySelect">
                               <option value="0">请选择</option> 
                              <?php if(is_array($zxdt) || $zxdt instanceof \think\Collection || $zxdt instanceof \think\Paginator): $i = 0; $__LIST__ = $zxdt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?>

                         <option value="<?php echo $vos['id']; ?>" <?php if($vos['id'] == $vo['zxpid']): ?> selected <?php endif; ?>><?php echo $vos['name']; ?></option>
                              <?php endforeach; endif; else: echo "" ;endif; ?>   
                           </select>
                        <?php endif; ?>
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

