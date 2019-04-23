<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/2
 * Time: 21:27
 */

namespace app\index\controller;
use think\Controller;

class Api extends Controller
{
    public function index(){
        $this->assign("msg",'API使用文档');
        return $this->fetch();
    }
    public function doc(){
        $this->assign('msg','Hello View');
        return $this->fetch();
    }

}