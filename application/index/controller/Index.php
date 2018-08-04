<?php
namespace app\index\controller;

class Index extends Common
{
  /**
   * @function [资讯分类接口]
   * @Author   lucky
   * @DateTime 2018-07-28
   * @version  [version]
   * @return   [type]  [description]
   */
  public function fenlei()
  {
  	
  	$fenlei=db('fenlei')->field('flmc,id')->order('id desc')->select();

  	if ($fenlei) {

  		$this->return_msg(200,'返回数据成功',$fenlei);

  	}else{

  		$this->return_msg(400,'返回数据失败');
  	}
  	
  }

/**
 * @function [资讯列表接口]
 * @Author   lucky
 * @DateTime 2018-07-28
 * @version  [version]
 * @return   [type]        [description]
 */
  public function wenzhang()
  {
  	
  	$wenzhang=db('q')->alias('wen')->join('fenlei f ','wen.catid=f.catid')->join('zixundetail d','d.zxpid=wen.id')->select();

  	if ($wenzhang) {

  		$this->return_msg(200,'返回数据成功',$wenzhang);

  	}else{

  		$this->return_msg(400,'返回数据失败');
  	}
  	
  }
  
  
    /**
      @function [搜索接口]
     * @Author   lucky
     * @DateTime 2018-07-31
     * @version  [version]
     * @return   [type]        [description]
     */
    public function search()
    {
        $param=$this->params;

        if(empty($param['dytips'])){
            return $this->return_msg(400,'返回数据为空','');die;
        }
       
        $map['dytips'] = ['like',"%".$param["dytips"]."%"];

        $res=db('dianying')->where($map)->select();

        if ($res) {

            return $this->return_msg(200,'返回成功',$res);

        }else{

            return $this->return_msg(400,'返回数据为空','');
        }

    }

    /**
     * @function [首页电影列表]
     * @Author   lucky
     * @DateTime 2018-08-02
     * @version  [version]
     * @return   [type]        [description]
     */
    public function indexlist()
    {

      $res=db('dianying')->select();

      if ($res) {
            return $this->return_msg(200,'返回成功',$res);

        }else{
            return $this->return_msg(400,'返回数据为空','');
        }
    }
    /**
     * @function [电影详情接口]
     * @Author   lucky
     * @DateTime 2018-08-02
     * @version  [version]
     * @return   [type]        [description]
     */
    public function dianyingxiangqing()
    {
      $param=$this->params;

      $id=$param['id'];

      $res=db('dianying')
            ->alias('dy')
            ->join('dianyingdetail dyxq','dy.deid=dyxq.deid')
            ->join('daoyan dyl','dyl.did=dyxq.dperson')
            ->where('dy.id',$id)
            ->select();

      if ($res) {
            return $this->return_msg(200,'返回成功',$res);
      }else{
            return $this->return_msg(400,'返回数据为空','');
      }
    }

    /**
     * @function [资讯详情接口]
     * @Author   lucky
     * @DateTime 2018-08-03
     * @version  [version]
     * @param    string        $value [description]
     * @return   [type]               [description]
     */
    public function zixundetail()
    {

      $dat=$this->params;

      if (empty($dat)) {
        return $this->return_msg(400,'参数不能为空');
      }

      $res=db('zixundetail')->alias('z')
                            ->join('q zxp','z.zxpid=zxp.id')
                            ->where('zxdid',$dat['id'])->find();

      if ($res) {
            return $this->return_msg(200,'返回成功',$res);
      }else{
            return $this->return_msg(400,'返回数据为空','');
      }

    }


}
