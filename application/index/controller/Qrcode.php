<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/13
 * Time: 13:16
 */

namespace app\index\controller;
use think\Request;
use think\captcha\Captcha;
class Qrcode
{
    function index()  ///创建验证码
    {
        $captcha = new Captcha();
        $captcha->imageW = 120;
        $captcha->imageH = 32;  //图片高
        $captcha->fontSize = 15;  //字体大小
        $captcha->length = 4;  //字符数
        $captcha->fontttf = '5.ttf';  //字体
        $captcha->expire = 30;  //有效期
        $captcha->useNoise = true;  //不添加杂点
        return $captcha->entry();
    }
    function check(){//验证码验证     code:1验证成功 code:0验证失败
        $req=Request::instance();
        $code= $req->get('code');
        $captcha = new Captcha();
        if($captcha->check($code))
            {
                $codeArray=array();
                $msg='success';
                $code=1;
                $codeArray['msg']=$msg;
                $codeArray['code']=$code;
                $json_data=json_encode($codeArray);
                return $json_data;
            }
        else
            {
                $codeArray=array();
                $msg='error';
                $code=0;
                $codeArray['msg']=$msg;
                $codeArray['code']=$code;
                $json_data=json_encode($codeArray);
                return $json_data;
            }
       }
    function test($v){
        echo $v;
    }
}