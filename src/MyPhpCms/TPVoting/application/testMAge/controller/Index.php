<?php
namespace app\testMAge\controller;
use think\Controller;
use think\Request;

class Index extends Controller {
	public function index() {
		$request = Request::instance();
		echo $request->url();

	}

}
?>