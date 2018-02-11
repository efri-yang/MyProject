<?php
namespace app\admin\validate;
use think\Validate;

class UserLogin extends Validate {
	protected $rule = [

		'email' => 'require|email',
		'password' => 'require|min:6',
		'captcha' => 'require|captcha',
	];
	protected $message = [
		'email.require' => '邮箱不能为空',
		'email.email' => '请输入正确的邮箱',
		'password.require' => '密码不能为空',
		'password.min' => '密码的长度不能小于6位数',
		'captcha.require' => '请输入验证码',
		'captcha.captcha' => '验证码错误',
	];

}

?>