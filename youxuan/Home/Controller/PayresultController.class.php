<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/7
 * Time: 22:51
 */
namespace Home\Controller;
use Home\Common\BaseController;
class PayresultController extends BaseController {
    function index()
   {
       $getordernum=I('ordernum');
       $gettotal=I('total');
       $goods=M('order')->where('onumber='.$getordernum)->select();
       $goodid='';
       foreach ($goods as $k=>$v){
           $goodid.=$v['oid'].'-';
       }
       $goodid = substr($goodid,0,strlen($goodid)-1);
      /// var_dump($goodid);
       $this->goods=$goods;
       $this->goodid=$goodid;
       $this->ordernum=$getordernum;
       $this->total=$gettotal;
       $this->sid=$goods[0]['osid'];
      $this->display('Payresult/index');
    }


}