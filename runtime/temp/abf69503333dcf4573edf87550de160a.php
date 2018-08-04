<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\phpStudy\WWW\filmreviews\public/../application/admin\view\q\index.html";i:1532872878;s:69:"D:\phpStudy\WWW\filmreviews\application\admin\view\template\base.html";i:1532754875;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            X-admin v1.0
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">

        <link rel="stylesheet" href="/filmreviews/public/static/css/x-admin.css" media="all">
    </head>
    <body>
        <div class="layui-layout layui-layout-admin">
            <div class="layui-header header header-demo">
                <div class="layui-main">
                    <a class="logo" href="./index.html">
                        X-admin v1.0
                    </a>
                    <ul class="layui-nav" lay-filter="" >
                      <li class="layui-nav-item"><img src="/filmreviews/public/static/images/logo.png" class="layui-circle" style="border: 2px solid #A9B7B7;" width="35px" alt=""></li>
                      <li class="layui-nav-item">
                        <a href="javascript:;">admin</a>
                        <dl class="layui-nav-child"> <!-- 二级菜单 -->
                          <dd><a href="">个人信息</a></dd>
                          <dd><a href="">切换帐号</a></dd>
                          <dd><a href="./login.html">退出</a></dd>
                        </dl>
                      </li>
                      <!-- <li class="layui-nav-item">
                        <a href="" title="消息">
                            <i class="layui-icon" style="top: 1px;">&#xe63a;</i>
                        </a>
                        </li> -->
                      <li class="layui-nav-item x-index"><a href="/">前台首页</a></li>
                    </ul>
                </div>
            </div>
            <div class="layui-side layui-bg-black x-side">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="side" id="cat">
                              
                    </ul>

                    
                </div>

            </div>
            <div class="layui-tab layui-tab-card site-demo-title x-main" lay-filter="x-tab" lay-allowclose="true">
                <div class="x-slide_left"></div>
                <ul class="layui-tab-title">
                    <li class="layui-this">
                        我的桌面
                        <i class="layui-icon layui-unselect layui-tab-close">ဆ</i>
                    </li>
                </ul>
                <div class="layui-tab-content site-demo site-demo-body">
                    <div class="layui-tab-item layui-show" >
                       
                      
 <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>会员管理</cite></a>
              <a><cite>管理员列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>

<div class="x-body">
    <form class="layui-form x-center" action="" style="width:80%">
        <div class="layui-form-pane" style="margin-top: 15px;">
          <div class="layui-form-item">
            <label class="layui-form-label">日期范围</label>
            <div class="layui-input-inline">
              <input class="layui-input" placeholder="开始日" id="LAY_demorange_s">
            </div>
            <div class="layui-input-inline">
              <input class="layui-input" placeholder="截止日" id="LAY_demorange_e">
            </div>
            <div class="layui-input-inline">
              <input type="text" name="username"  placeholder="请输入登录名" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline" style="width:80px">
                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </div>
          </div>
        </div> 
    </form>
    <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="admin_add('添加用户','<?php echo url('add'); ?>','600','500')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>

     <table class="layui-table">
                    <thead>
                        <tr>
                              <th width="25"><input type="checkbox"></th>
            <th width="">id</th>
            <th width="">资讯标题</th>
            <th> 缩略图</th>
            <th>发布时间</th>
            <th>分类</th>

                            <th>
                                操作
                            </th>
                        </tr>
                    </thead>
                  
                    <tbody>

                         <?php if(is_array($index) || $index instanceof \think\Collection || $index instanceof \think\Paginator): $i = 0; $__LIST__ = $index;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?php echo $vo['id']; ?>"></td>
                            <td><?php echo $vo['id']; ?></td>
                            <td><?php echo $vo['name']; ?></td>
                            <td><img src="<?php echo $vo['files']; ?>" style="width:100px; height: 50px;"></td>
                            <td><?php echo $vo['updatetime']; ?></td>
                            <td> 
                                <?php if(is_array($cat) || $cat instanceof \think\Collection || $cat instanceof \think\Paginator): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vso): $mod = ($i % 2 );++$i;if($vso['catid'] == $vo['catid']): ?><?php echo $vso['flmc']; endif; endforeach; endif; else: echo "" ;endif; ?>
                            </td>
                            <td class="td-manage">
                                <a style="text-decoration:none" onclick="admin_stop(this,'10001')" href="javascript:;" title="停用">
                                    <i class="layui-icon">&#xe601;</i>
                                </a>
                                <a title="编辑" href="javascript:;" onclick="admin_edit('编辑','<?php echo url('edit',['id' => $vo['id']]); ?>','<?php echo $vo['id']; ?>','','510')"
                                class="ml-5" style="text-decoration:none">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" href="javascript:;" onclick="admin_del(this,'<?php echo $vo['id']; ?>')" 
                                style="text-decoration:none">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                            </td>
                        </tr>

                        <?php endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
    </table>
    <div id="page"></div>
</div>

                    
                    </div>



                </div>
            </div>
            <div class="site-mobile-shade">
            </div>
        </div>
        

        <script src="/filmreviews/public/static/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/filmreviews/public/static/js/x-admin.js"></script>



        
       
            
                
<script src="/filmreviews/public/static/js/x-layui.js" charset="utf-8"></script>
<script type="text/javascript">
            layui.use(['laydate','element','laypage','layer'], function(){
                $ = layui.jquery;//jquery
              laydate = layui.laydate;//日期插件
              lement = layui.element();//面包导航
              laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层

              //以上模块根据需要引入

              laypage({
                cont: 'page'
                ,pages: 100
                ,first: 1
                ,last: 100
                ,prev: '<em><</em>'
                ,next: '<em>></em>'
              }); 
              
              var start = {
                min: laydate.now()
                ,max: '2099-06-16 23:59:59'
                ,istoday: false
                ,choose: function(datas){
                  end.min = datas; //开始日选好后，重置结束日的最小日期
                  end.start = datas //将结束日的初始值设定为开始日
                }
              };
              
              var end = {
                min: laydate.now()
                ,max: '2099-06-16 23:59:59'
                ,istoday: false
                ,choose: function(datas){
                  start.max = datas; //结束日选好后，重置开始日的最大日期
                }
              };
              
              document.getElementById('LAY_demorange_s').onclick = function(){
                start.elem = this;
                laydate(start);
              }
              document.getElementById('LAY_demorange_e').onclick = function(){
                end.elem = this
                laydate(end);
              }
              
            });

            //批量删除提交
             function delAll () {
                layer.confirm('确认要删除吗？',function(index){
                    //捉到所有被选中的，发异步进行删除
                    layer.msg('删除成功', {icon: 1});
                });
             }
             /*添加*/
            function admin_add(title,url,w,h){
                
                x_admin_show(title,url,w,h);
            }

             /*停用*/
            function admin_stop(obj,id){
                layer.confirm('确认要停用吗？',function(index){
                    //发异步把用户状态进行更改
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_start(this,id)" href="javascript:;" title="启用"><i class="layui-icon">&#xe62f;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span>');
                    $(obj).remove();
                    layer.msg('已停用!',{icon: 5,time:1000});
                });
            }

            /*启用*/
            function admin_start(obj,id){
                layer.confirm('确认要启用吗？',function(index){
                    //发异步把用户状态进行更改
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_stop(this,id)" href="javascript:;" title="停用"><i class="layui-icon">&#xe601;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>');
                    $(obj).remove();
                    layer.msg('已启用!',{icon: 6,time:1000});
                });
            }
            //编辑
            function admin_edit (title,url,id,w,h) {
                   
             
                x_admin_show(title,url,w,h); 
            }
            /*删除*/
            function admin_del(obj,id){
                layer.confirm('确认要删除吗？',function(index){
                     //发异步删除数据
                    var request='http://39.106.134.4<?php echo \think\Request::instance()->root(); ?>';
                    var controller='/admin/<?php echo \think\Request::instance()->controller(); ?>';
                    $.ajax({
                     url:request+controller+"/delete",
                      type:"POST",
                      data:{id:id},
                      dataType:"json",
                      success:function(res){
                        console.log(res);
                      }

                    })
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                });
            }
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
        <script type="text/javascript" src="/filmreviews/public/static/js/jquery.min.js"></script>
        <script type="text/javascript">
     
                    $.ajax({
                    url:"/filmreviews/public/index.php/admin/Template/base",
                      type:'GET',
                      dataType:'json',
                      
                      success:function(res){
                          console.log(res);
                            var str='';
                            for (var i =0;i<res.data.length;i++) {
                                var a=res.data[i].catcon;
                                console.log(a);
                                str+='<li class="layui-nav-item">'; 
                                // str+='<a class="javascript:;" href="<?php echo \think\Request::instance()->url(); ?>/'+a+'/index">';
                                 str+='<a class="javascript:;" href="<?php echo \think\Request::instance()->root(); ?>/admin/'+a+'/index">';
                                str+='<i class="layui-icon" style="top: 3px;">&#xe614;</i><cite>'+res.data[i].catname+'</cite></a></li>';
                            }
                            $('#cat').append(str);
                      },
                      fail:function(res){
                          console.log(res);
                      }
                    })
        </script>
    </body>
</html>