<?php
	namespace app\admin\validate;
	use think\Validate;

	class UserRegister extends Validate{
			protected $rule=[
	            'username' => 'require',
	            'email' => 'require|email',
	            'password' => 'require|min:6'
       		];
        	protected  $message = [
	            'username.require' => '用户名不能为空',
	            'username.max' => '名称最多不能超过5个字符',
	            'email.require' => '邮箱不能为空',
	            'email.email' => '请输入正确的邮箱',
	            'password.require' => '密码不能为空',
	            'password.min' => '密码的长度不能小于6位数'
	        ];

	        
	}

?>