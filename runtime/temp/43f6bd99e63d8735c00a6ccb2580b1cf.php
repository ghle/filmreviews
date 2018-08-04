<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\phpStudy\WWW\filmreviews\public/../application/admin/view/index/index.html";i:1532615604;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin2.0</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/filmreviews/public/static/css/font.css">
	<link rel="stylesheet" href="/filmreviews/public/static/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/filmreviews/public/static/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/filmreviews/public/static/js/xadmin.js"></script>

</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">x-admin2.0-管理登录</div>
        <div id="darkbannerwrap"></div>
        
        <form method="post" class="layui-form" >
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    <script>
        $(function  () {
            layui.use('form', function(){
              var form = layui.form();
             
              //监听提交
              form.on('submit(login)', function(data){
            
                   $.post(
                    "<?php echo url('Admin/Index/login'); ?>",
                    {
                      username:data.field.username,
                      password:data.field.password
                    },
                    function(result){
                    
                        if (result.code==400) {
                           layer.msg(result.msg,function (argument) {
                             location.reload();
                           });

                        }
                        if (result.code==200) {
                           layer.msg(result.msg,function(){
                                location.href="<?php echo url('Admin/Dk/Index'); ?>";
                            });
                        }
                    });
                return false;
              });
            });
        })

        
    </script>

    
    <!-- 底部结束 -->
   
</body>
</html>