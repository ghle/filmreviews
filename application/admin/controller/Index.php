<?php
namespace app\admin\controller;

use app\admin\Controller;

class Index extends Controller
{
   
    public function Index($value='')
    {

      return $this->fetch();
    }

    public function welcome($value='')
    {
         return $this->fetch('welcome');
    }

    public function login()
    {
    	$account=input('post.username');
    	$password=input('post.password');

    	$res=db('admin_user')->where('account',$account)->find();

    	

    	if ($password==$res['password']&&$account==$res['account']) {

    		return $this->resturn_res(200,'登陆成功',$res);

    	}else{

    		return $this->resturn_res(400,'登陆失败');
    	}
    }

    public function resturn_res($code='',$msg='',$da=[])
    {
    	$data['code']=$code;
    	$data['msg']=$msg;
    	$data['data']=$da;
    	return json($data);
    }
}