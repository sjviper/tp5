<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/13
 * Time: 13:16
 */

namespace app\index\controller;
use app\index\model\Qrcode as Qcode;
class Qrcode
{
    //创建验证码
    public function index(){
        $qrcode=new Qcode();
        return $qrcode->createCode();
    }
}