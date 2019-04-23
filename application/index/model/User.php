<?php
namespace app\index\model;
use think\Model;

class User extends Model{

    protected function getTypeAttr($type){ //读取器 修改type字段类型值
        $Type=['0'=>'普通用户','1'=>'VIP会员'];
        return $Type[$type];
    }
    protected function getRegTimeAttr($reg_time){//修改器 将时间戳转换为Y:M:D格式
        return date('Y-m-d', $reg_time);
    }
}