<?php
namespace app\index\model;
use think\Model;
use think\captcha\Captcha;

class Qrcode extends Model
{
    public function createCode()  ///创建验证码
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
    public function check($code)
    {//验证码验证

        $captcha = new Captcha();
        if ($captcha->check($code))
            return true;
        else
            return false;
    }

}