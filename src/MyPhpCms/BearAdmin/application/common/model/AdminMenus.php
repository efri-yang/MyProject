<?php
/**
 * 后台菜单模型
 * @author yupoxiong<i@yufuping.com>
 * @version 1.0
 */

namespace app\common\model;

use think\Model;

class AdminMenus extends Model
{
    //use SoftDelete;
    protected $name = 'admin_menus';
    protected $autoWriteTimestamp = true;

    //关联权限
    public function authRule()
    {
    	//hasOne('关联模型名','外键名','主键名',['模型别名定义'],'join类型');
        return $this->hasOne('AuthRules','menu_id','menu_id');
    }
}