<?php

namespace app\admin;

use think\Model;
use think\View;
use think\Request;
use think\Session;
use think\Db;
use think\Config;
use think\Loader;
use think\Exception;
use think\File;
use think\exception\HttpException;
use app\admin\logic\Pub as PubLogic;
use think\Controller  as C;

class Controller extends C
{
   
   protected $request;
   protected $view;

    /**
     * 首页
     * @return mixed
     */
    public function index()
    {

        $this->request=Request::instance();
   
        $index = db($this->request->controller())->select();

         $cat=db('fenlei')->select();

          $zxdt=db('q')->select();

          $this->assign("zxdt",$zxdt);
       
         $this->assign("cat",$cat);
           $dy=db('daoyan')->select();
          $this->assign("dy", $dy);

        $this->assign('index',$index);

        return $this->fetch();

       
    }

    /**
     * 添加
     * @return mixed
     */
    public function add()
    {
        
        

        $controller = $this->request->controller();

      

        if ($this->request->isPost()) {
            
          
            // 插入
            $data = $this->request->except(['id','file']);
            $data['updatetime']=date('Y-m-d H:i:s');

            $res=db($controller)->insert($data);

        } else {

             $vo =db('q')->select();

             $cat=db('fenlei')->select();
                // 电影详情
            $dxiang=db('dianyingdetail')->select();

            $zxdt=db('q')->select();

            $dy=db('daoyan')->select();

            $this->assign("zxdt",$zxdt);
            $this->assign("dy", $dy);
            $this->view->assign("dxiang", $dxiang);
            $this->assign("add", 'add');
            $this->assign("vo", $vo);
            $this->assign("cat",$cat);
            // 添加
            return $this->view->fetch(isset($this->template) ? $this->template : 'edit');
        }
    }


      /**
     * 编辑
     * @return mixed
     */
    public function edit()
    {
        


        $controller = $this->request->controller();

        if ($this->request->isAjax()) {
            // 更新
            $data = $this->request->except(['file']);
            $data['updatetime']=date('Y-m-d H:i:s');
            // $data = $this->request->post();
          
            if (!$data['id']) {
                return ajax_return_adv_error("缺少参数ID");
            }

           $res=db($controller)->where(['id' => $data['id']])->update($data);;
          
        } else {
            // 编辑
            $id = $this->request->param('id');
            if (!$id) {
                throw new HttpException(404, "缺少参数ID");
            }
            $vo =db($controller)->find($id);
            if (!$vo) {
                throw new HttpException(404, '该记录不存在');
            }
            // 分类
            $cat=db('fenlei')->select();

            $this->assign("cat",$cat);
            $this->assign("add",'');

            // 电影详情
            $dxiang=db('dianyingdetail')->select();
            $dy=db('daoyan')->select();
            $zxdt=db('q')->select();

            $this->view->assign("dxiang", $dxiang);
            $this->assign("zxdt",$zxdt);
            $this->assign("dy", $dy);
            $this->view->assign("vo", $vo);

            return $this->view->fetch();
        }
    }


    /**
     * 默认删除操作
     */
    public function delete()
    {
           $data = $this->request->post();
          
        $res=db($this->request->controller())->where(['id' => $data['id']])->delete();
    }


     /**
     * 文件上传
     */
    public function upload()
    {
        $file = $this->request->file('file');

        $path = ROOT_PATH . 'public/tmp/uploads/';
 
        $info = $file->move($path);


        if (!$info) {
          echo "文件上传失败";
        }
        $data ='/filmreviews/public/tmp/uploads/' . $info->getSaveName();
        $insert = [
            'name'     => $data,
            'original' => $info->getInfo('name'),
            'type'     => $info->getInfo('type')
           
        ];



        Db::name('File')->insert($insert);


        $this->return_msg(200,'success',$data);die;

    }

      public function return_msg($code, $msg = '', $data = [])
    {
        $return_data['code'] = $code;
        $return_data['msg'] = $msg;
        $return_data['data'] = $data;
        echo json_encode($return_data);die;
    }




}
